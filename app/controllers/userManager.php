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
        if($userId == -2){
            header("Location: /ProjektDuckHelp/public/home/index/wrongPassword/");
            return $userId;
        }
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

    public function changePassword() {
             $db = new Database();
             $args = [
                'oldPass' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'newPass' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
                ];
        
                $data = filter_input_array(INPUT_POST, $args);
                $errors = "";
                foreach ($data as $key => $val) {
                    if ($val === false or $val === NULL or $val=="") {
                        $errors .= $key . " ";
                }
                }
            if ($errors === "") {
                $oldPassword = $data['oldPass'];
                $newPassword = $data['newPass'];

            $sessionId = session_id();
            $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '$sessionId'";
            $result = $db->selectOnlyresultTable($sql);

                $userId = $result[0]['userId'];
                // Pobierz hasło użytkownika z bazy danych
                $sql = "SELECT password FROM users WHERE id = '$userId'";
                $userResult = $db->selectOnlyresultTable($sql);
    
                    $hashedPassword = $userResult[0]['password'];
    
                    // Sprawdź, czy stare hasło jest poprawne
                    if (password_verify($oldPassword, $hashedPassword)) {
                        // Hashuj nowe hasło
                        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
                        // Zaktualizuj hasło w bazie danych
                        $sql = "UPDATE users SET password = '$newHashedPassword' WHERE id = '$userId'";
                        if ($db->update($sql)) {
                            header("Location: /ProjektDuckHelp/public/profile/index/passwordChanged/");
                        } else {
                            header("Location: /ProjektDuckHelp/public/profile/index/passwordNotChanged/");
                        }
                    } else {
                        // Stare hasło jest niepoprawne
                        header("Location: /ProjektDuckHelp/public/profile/index/incorrectOldPassword/");
                    }
                
            } else {
                header("Location: /ProjektDuckHelp/public/profile/index/incorrectData/");
            }
            
    }

    public function changeEmail() {
        $db = new Database();
        $args = [
           'newEmail' => FILTER_SANITIZE_EMAIL
           ];
   
           $data = filter_input_array(INPUT_POST, $args);
           $errors = "";
           foreach ($data as $key => $val) {
               if ($val === false or $val === NULL or $val=="") {
                   $errors .= $key . " ";
           }
           }
       if ($errors === "") {
           $newEmail = $data['newEmail'];

           if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            header("Location: /ProjektDuckHelp/public/profile/index/incorrectData/");
            exit();
            }

       $sessionId = session_id();
       $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '$sessionId'";
       $result = $db->selectOnlyresultTable($sql);

       $userId = $result[0]['userId'];

        $sql = "UPDATE users SET email = '$newEmail' WHERE id = '$userId'";
                   if ($db->update($sql)) {
                       header("Location: /ProjektDuckHelp/public/profile/index/emailChanged/");
                   } else {
                       header("Location: /ProjektDuckHelp/public/profile/index/emailNotChanged/");
                   }
           
       } else {
           header("Location: /ProjektDuckHelp/public/profile/index/incorrectData/");
       }
       
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