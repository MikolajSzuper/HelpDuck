<?php
class UserManager{

    protected $user;
    public function logIn() {
        $db = new Database();
        $args = [
        'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ];

        $data = filter_input_array(INPUT_POST, $args);
        $login = $data['username'];
        $passwd = $data['password'];
        $userId = $db->selectUser($login, $passwd, "users");
        if ($userId >= 0) { 
            session_start();
          $sql = "DELETE FROM logged_in_users WHERE userid = '".$userId."'";
          $db->delete($sql);
          $date = date("Y-m-d H:i:s");
          $sql = "INSERT INTO logged_in_users VALUES ('".session_id()."', '".$userId."', '".$date."')";
          $db->insert($sql);
            unset($db);
          header("Location: /ProjektDuckHelp/public/home/index/loggedin/");
        }else{
            header("Location: /ProjektDuckHelp/public/home/index/userNoExists/");
        }
        return $userId;
        }

    public function logout() {
            $db = new Database();
              $sql = "DELETE FROM logged_in_users WHERE sessionId = '".session_id()."'";
              $db->delete($sql);
              unset($db);
              if (filter_input( INPUT_COOKIE,session_name() )) {
              setcookie(session_name(), '', time() - 42000, '/'); }
              session_destroy();
              session_start();
              header("Location: /ProjektDuckHelp/public/home/index/");
        }
           
        public function getLoggedInUser($sessionId) {
            $db = new Database();
            $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '$sessionId'";
            $result = $db->selectOnlyresult($sql);
            unset($db);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    public function checkUser()
    { 
        $args = [
            'username' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_\-]{2,25}$/']
            ],
            'password' => FILTER_DEFAULT, 
            'email' => FILTER_VALIDATE_EMAIL
        ];
            $data = filter_input_array(INPUT_POST, $args);
            $errors = "";
            foreach ($data as $key => $val) {
                if ($val === false or $val === NULL or $val=="") {
                    $errors .= $key . " ";
            }
            }
        if ($errors === "") {
            require_once __DIR__ .'../../models/User.php';
            $this->user=new User($data['username'], $data['password'],$data['email'],1);
            $db = new Database();
            
            $login = $this->user->getLogin();
                $sql = "SELECT COUNT(*) as count FROM users WHERE login = '$login'";
                $result = $db->selectOnlyResult($sql);
                if ($result > 0) {
                    // Użytkownik z takim loginem już istnieje
                    header("Location: /ProjektDuckHelp/public/home/index/userExists/");
                } else {
            $sql = "INSERT INTO users VALUES (NULL, '".$this->user->getLogin()."', '".$this->user->getEmail()."', '".$this->user->getPassword()."','".$this->user->getRole()."', '".$this->user->getDate()."')";
            $db->insert($sql);
            unset($db);
            header("Location: /ProjektDuckHelp/public/home/index/registerSuccess/");
                }
        } 
        else {
            header("Location: /ProjektDuckHelp/public/home/index/incorrectData/".$errors);
        }
    }
}
?>