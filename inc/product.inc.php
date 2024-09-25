<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){
    //Get data
    $name = $_POST['name'];
    $notiz = $_POST['notiz'];
    $menge = $_POST['menge'];
    $shop = $_POST['shop'];
    $category = $_POST['category'];

    //Includes
    include '../classes/dbh.class.php';
    include '../classes/product.class.php';
    include '../classes/product-contr.class.php';

    //Instaniate
    try {
        $product = new ProductController();
        $product->addProduct($name, $notiz, $menge, $shop, $category);
    
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    //Route
    //header('location: ../einkaufsliste.php');
}