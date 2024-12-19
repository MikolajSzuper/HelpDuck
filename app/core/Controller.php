<?php
class Controller{

    protected function model($model)  {
        require_once "../app/models/" . $model . ".php";
        return new $model();
    }

    protected function view($view, $data = array()) {
        require_once "../app/views/" . $view . ".php";
    }

    protected function chechAuth() {
        $db = new Database();
        $session_id = session_id();
        $result = $db->selectOnlyResult("SELECT COUNT(*) AS count FROM logged_in_users WHERE sessionId = '".$session_id."'");
        unset($db);
        return $result > 0? true : false;
    }
}
?>