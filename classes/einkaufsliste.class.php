<?php
session_start();

class Einkaufsliste extends Dbh{

    public function getAllLists(){
        $stmt = $this->connect()->prepare("SELECT * FROM liste WHERE benutzer_id = ?;");

        $userId = $_SESSION["userId"];
        
        if(!$stmt->execute([$userId])){
            $stmt = null;
            header("location: ../einkaufsliste.php");
            exit();
        }

        $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lists;
    }

    public function getAllProducts($listId){
        $stmt = $this->connect()->prepare("
        SELECT 
            ka.bezeichnung AS kategorie, 
            s.bezeichnung AS shop, 
            lp.gekauft, 
            lp.menge,
            pro.bezeichung AS produkt
        FROM liste_produkt lp
            JOIN produkt pro ON pro.id = lp.produkt_id
            JOIN shop s ON s.id = lp.shop_id
            JOIN kategorie ka ON ka.id = pro.kategorie_id
        WHERE lp.liste_id = ? and pro.benutzer_id = ?
        ORDER BY kategorie_id;"
        );

        $userId = $_SESSION["userId"];

        if(!$stmt->execute([$listId, $userId])){
            $stmt = null;
            header("location: ../einkaufsliste.php");
            exit();
        }

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}