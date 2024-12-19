<?php
class User{
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;
    private $login;
    private $password;
    private $email;
    private $role;
    private $date;

    public function __construct($login, $password, $email, $role){
        $this->login = $login;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->email = $email;
        $this->role = $role;
        $this->date = date("Y-m-d H:i:s");
    }

    public function isAdmin(){
        return $this->role == self::STATUS_ADMIN;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function getDate() {
        return $this->date;
    }
}
?>