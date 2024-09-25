<?php

class SignupController extends Signup{
    private $email;
    private $password;
    private $passwordRepeat;

    public function __construct($email, $password, $passwordRepeat) {
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    public function signUp(){
        if($this->isEmpty() == false){
            header('location: ../index.php?error=emptyInput');
            exit();
        }
        if($this->passwordMatch() == false){
            header('location: ../index.php?error=pwdMatch');
            exit();
        }
        if($this->invalidEmail() == false){
            header('location: ../index.php?error=invalidEmail');
            exit();
        }
        if($this->emailTaken() == false){
            header('location: ../index.php?error=emailTaken');
            exit();
        }

        $this->setUser($this->password, $this->email);
    }

    private function isEmpty(){
        if (empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
            return false;
        } else {
            return true;
        }
    }

    private function passwordMatch(){
        if ($this->password != $this->passwordRepeat) {
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

    private function emailTaken(){
        if ($this->checkUser($this->email) == false) {
            return false;
        } else {
            return true;
        }
    }
}