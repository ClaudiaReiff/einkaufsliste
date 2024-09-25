<?php
class Login extends Dbh{
    public function getUser($email, $password){
        $stmt = $this->connect()->prepare("SELECT * FROM benutzer WHERE email = ?;");

        if(!$stmt->execute([$email])){
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        $hashedPwd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $verifiedPwd = password_verify($password, $hashedPwd[0]["password"]);

        if($verifiedPwd == false){
            $stmt = null;
            header("location: ../index.php");
            exit();
        } 
        elseif($verifiedPwd == true){
            $stmt = $this->connect()->prepare("SELECT * FROM benutzer WHERE email = ?;");

            if(!$stmt->execute([$email])){
                $stmt = null;
                header("location: ../index.php");
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userId"] = $user[0]["id"];
            $_SESSION["email"] = $user[0]["email"];
        }

        $stmt = null;
    }
}
