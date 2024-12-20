<?php
class Scoreboards extends Controller {
    public function index($name='')
    {
        $data = false;
        if(!$this->chechAuth()){
            header('Location: /ProjektDuckHelp/public/home/index/');
        }else{
            $data=true;
        }
        $db = new Database();
        
        $data2 = $this->bestLevel($db);
        $data3 = $this->newestUsers($db);

        $this->view('scoreboards/index',['isLoggedIn'=>$data, 'best5'=>$data2,'newest5'=>$data3, 'error'=> $name]);
    }

    private function bestLevel($db){
        $sql = "SELECT userid, level FROM played_games ORDER BY level DESC LIMIT 5";
        $result1 = $db->selectOnlyresultTable($sql);

        $data = [];
        foreach ($result1 as $row) {
            $userId = $row['userid'];
            $level = $row['level'];

            $sql = "SELECT login FROM users WHERE id = '$userId'";
            $result2 = $db->selectOnlyresultTable($sql);

            if (!empty($result2)) {
                $login = $result2[0]['login'];
                $data[] = ['name' => $login, 'level' => $level];
            }
        }
        return $data;
    }

    private function newestUsers($db) {
        $sql = "SELECT login, date FROM users ORDER BY date DESC LIMIT 5";
        $result = $db->selectOnlyresultTable($sql);

        $data = [];
        foreach ($result as $row) {
            $formattedDate = date('Y-m-d H:i', strtotime($row['date']));
            $data[] = ['name' => $row['login'], 'registration_date' => $formattedDate];
        }
        return $data;
    }
}
?>