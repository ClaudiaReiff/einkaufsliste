<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Get data
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    //Includes
    include '../classes/dbh.class.php';
    include '../classes/login.class.php';
    include '../classes/login-contr.class.php';

    //Instantiate object
    $login = new LoginController($email, $password);
    
    //Validate & signup
    $login->login();

    //Route
    header("location: ../index.php");
}