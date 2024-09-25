<?php
class Signup extends Dbh{
    public function checkUser($email){
        $stmt = $this->connect()->prepare("SELECT * FROM benutzer WHERE email = ?;");

        if(!$stmt->execute([$email])){
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        if($stmt->rowCount() > 0){
            return false;
        } else {
            return true;
        }
    }

    public function setUser($password, $email){
        $stmt = $this->connect()->prepare("INSERT INTO benutzer (email, password) VALUES (?,?);");

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute([$email, $hashedPassword])){
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        $stmt = null;
    }
}
