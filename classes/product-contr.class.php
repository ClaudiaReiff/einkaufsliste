<?php

class ProductController extends Product{
    public function getShops(){
        return $this->getAllShops();
    }

    public function getCategories(){
        return $this->getAllCategories();
    }

    public function addProduct($name, $notiz, $menge, $shop, $category){
        if(empty($name) || empty($notiz) || empty($menge) || empty($shop) || empty($category)){
            header("location: ../product.php");
            exit();
        }

        $this->insertProduct($name, $notiz, $menge, $shop, $category);
    }
}