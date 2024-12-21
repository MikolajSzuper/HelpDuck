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
        if($name == 'sendMessage'){
            $this->sendMessage();
        }

        $this->view('help/index',['isLoggedIn'=>$data, 'error'=> $name]);
    }

    private function sendMessage(){
        $args = [
            'message' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_\-]{4,500}$/']
        ];
            $data = filter_input_array(INPUT_POST, $args);
            $errors = "";
            foreach ($data as $key => $val) {
                if ($val === false or $val === NULL or $val=="") {
                    $errors .= $key . " ";
            }
            }
        if ($errors === "") {
            require_once __DIR__ .'../../models/ContactForm.php';
            $db = new Database();
            $sessionId = session_id();
            $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '$sessionId'";
            $result = $db->selectOnlyresultTable($sql);
            $userId = $result[0]['userId'];

            $contactForm = new ContactForm($data['message'], $userId);
            $contactForm->sendToDb();
        }
    }
}
?>