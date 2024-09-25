<?php

session_start();

class Product extends Dbh{
    public function getAllShops(){
        $stmt = $this->connect()->prepare("SELECT * FROM shop WHERE benutzer_id = ?;");

        $userId = $_SESSION["userId"];

        if(!$stmt->execute([$userId])){
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        $shops = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $shops;
    }

    public function getAllCategories(){
        $stmt = $this->connect()->prepare("SELECT * FROM kategorie WHERE benutzer_id = ?;");

        $userId = $_SESSION["userId"];

        if(!$stmt->execute([$userId])){
            $stmt = null;
            header("location: ../index.php");
            exit();
        }

        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

    public function insertProduct($name, $notiz, $menge, $shop, $category){
        //Fetch product if already exists
        $stmt = $this->connect()->prepare("SELECT id FROM produkt WHERE bezeichung = ? AND benutzer_id = ?;");

        $userId = $_SESSION["userId"];

        if(!$stmt->execute([$name, $userId])){
            echo "Wrong";
            $stmt = null;
            //header("location: ../product.php");
            //exit();
        }
    }
}