<?php

class LoginController extends Login{
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function login(){
        if($this->isEmpty() == false){
            header('location: ../index.php?error=emptyInput');
            exit();
        }
        if($this->invalidEmail() == false){
            header('location: ../index.php?error=invalidEmail');
            exit();
        }

        $this->getUser($this->email, $this->password);
    }

    private function isEmpty(){
        if (empty($this->email) || empty($this->password)) {
            return false;
        } else {
            return true;
        }
    }

    private function invalidEmail(){
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) == false) {
            return false;
        } else {
            return true;
        }
    }
}