<?php
class Home extends Controller{
    public function index($name = ''){
        $data=false;
        require 'userManager.php';
        $loginController = new UserManager();
        if($loginController->getLoggedInUser(session_id()) && $name != 'loggedin'){
            header("Location: /ProjektDuckHelp/public/home/index/loggedin/");
        }

        if($name == 'register'){
            $loginController->checkUser();
        }
        else if($name == 'login'){
            $loginController->logIn();
        }
        else if ($name == 'loggedin'){
            if($loginController->getLoggedInUser(session_id())){
            $data = true;
            }
        }else if ($name == 'logout'){
            if($loginController->getLoggedInUser(session_id())){
                $loginController->logout();
            }
        }

        $this->view('home/index',['isLoggedIn'=>$data, 'error'=> $name]);
    }
}
?>