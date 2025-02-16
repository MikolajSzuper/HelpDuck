<?php
class GameModel{
    private $level;
    private $road;

    private $playerid;
    private $date;

    public function __construct($level, $road, $playerid){
        $this->level = $level;
        $this->road = $road;
        $this->playerid = $playerid;
        $this->date = date("Y-m-d H:i:s");
    }
    public function getLevel(){
        return $this->level;
    }
    public function getRoad(){
        return $this->road;
    }
    public function getplayerid(){
        return $this->playerid;
    }
    public function getDate(){
        return $this->date;
    }
    public function sendToDb(){
        $db = new Database();
        $sql = "INSERT INTO played_games VALUES (NULL, '".$this->getLevel()."', '".$this->getRoad()."', '".$this->getplayerid()."','".$this->getDate()."')";
        $db->insert($sql);
    }
}
?>