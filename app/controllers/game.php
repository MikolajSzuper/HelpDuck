<?php
class Game extends Controller {
    public function index($name='')
    {
        $data = false;
        if(!$this->chechAuth()){
            header('Location: /ProjektDuckHelp/public/home/index/');
        }else{
            $data=true;
            if($name == 'endturn'){
                $this->saveDataFromJS();
            }
        }
        if($name != 'endturn'){
        $this->view('game/index',['isLoggedIn'=>$data, 'error'=> $name]);
        }
    }
    private function saveDataFromJS(){
        error_log("Metoda saveDataFromJS zostala wywolana");
        require_once __DIR__ .'../../models/GameModel.php';

        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true); 

        $args = [
            'id_level' => FILTER_VALIDATE_INT,
            'id_road' => FILTER_VALIDATE_INT
        ];
            $data = filter_var_array($data, $args);
            $errors = "";
            foreach ($data as $key => $val) {
                if ($val === false or $val === NULL or $val=="") {
                    $errors .= $key . " ";
            }
            }
        if ($errors === "") {
            $db = new Database();
            $sessionid = session_id();
            $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '$sessionid'";
            $result = $db->selectOnlyresult($sql);

            $gamemod=new GameModel($data['id_level'], $data['id_road'], $result);
            $gamemod->sendToDb();

            echo json_encode(['status' => 'success', 'message' => 'Dane zapisane pomyślnie.']);   
        } 
        else {
            echo json_encode(['status' => 'error', 'message' => 'Brak wymaganych danych.']);
        }
    }
}
?>