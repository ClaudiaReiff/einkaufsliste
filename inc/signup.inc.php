<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Get data
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];

    //Includes
    include '../classes/dbh.class.php';
    include '../classes/signup.class.php';
    include '../classes/signup-contr.class.php';

    //Instantiate object
    $signUp = new SignupController($email, $password, $pwdRepeat);
    
    //Validate & signup
    $signUp->signUp();

    //Route
    header("location: ../index.php");
}