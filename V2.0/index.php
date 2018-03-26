<?php
    require_once "./include/session.php";
    if(isset($_SESSION["logged"])){
        header('location: ./view/main.php');
    }
    else{
        header('location: ./view/login.php');
    }
