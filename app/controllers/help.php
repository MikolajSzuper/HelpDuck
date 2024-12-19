<?php
class Help extends Controller {
    public function index($name='')
    {
        $data = false;
        if(!$this->chechAuth()){
            header('Location: /ProjektDuckHelp/public/home/index/');
        }else{
            $data=true;
        }

        $this->view('help/index',['isLoggedIn'=>$data, 'error'=> $name]);
    }
}
?>