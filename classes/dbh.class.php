<?php

class Dbh {
    public function connect(){
        $username = "root";
        $password = "";
        
        try { 
            $dbh = new PDO('mysql:host=localhost;dbname=einkaufsliste', $username, $password);
            //Set PDO error mode to exception
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage() . "</br>";
            die();
        }
    }
}