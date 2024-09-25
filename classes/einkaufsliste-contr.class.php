<?php

class EinkaufslisteController extends Einkaufsliste{

    public function __construct() {}

    public function getAll(){
        return $this->getAllLists();
    }

    public function getProducts($id){
        return $this->getAllProducts($id);
    }
}