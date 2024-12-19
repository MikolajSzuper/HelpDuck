<?php
class Help extends Controller {
    public function index()
    {
        if($this->chechAuth()){
            $this->view(view: 'help/index');
        }else{
            header('Location: /ProjektDuckHelp/public/home/index');
        }
    }
}
?>