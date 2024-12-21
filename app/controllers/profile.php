<?php
class Profile extends Controller {
    public function index($name='')
    {
        $data = false;
        require 'userManager.php';
        $changeController = new UserManager();
        if(!$this->chechAuth()){
            header('Location: /ProjektDuckHelp/public/home/index/');
        }else{
            $data=true;
        }

        if($name == 'changePass'){
            $changeController->changePassword();
        }
        else if($name == 'changeEmail'){
            $changeController->changeEmail();
        }

        $db = new Database();
        $sessionId = session_id();
        $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '$sessionId'";
        $result = $db->selectOnlyresultTable($sql);
        $userId = $result[0]['userId'];
        $sql = "SELECT login, email FROM users WHERE id = '$userId'";
        $userResult = $db->selectOnlyresultTable($sql);
        $userInfo = $userResult[0];

        $this->view('profile/index',['isLoggedIn'=>$data,'userInfo'=>$userInfo, 'error'=> $name]);
    }
}
?>