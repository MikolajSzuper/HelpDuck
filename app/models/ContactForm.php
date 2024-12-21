<?php
class ContactForm{
    private $message;
    private $userid;

    private $date;

    public function __construct($message, $userid){
        $this->message = $message;
        $this->userid = $userid;
        $this->date = date("Y-m-d H:i:s");
    }

    public function getUserId() {
        return $this->userid;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getDate() {
        return $this->date;
    }
    public function sendToDb(){
        $db = new Database();
        $sql = "INSERT INTO contact_form VALUES (NULL, '".$this->getMessage()."', '".$this->getUserId()."', '".$this->getDate()."')";
        $db->insert($sql);
    }
}
?>