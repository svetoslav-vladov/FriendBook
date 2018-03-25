<?php
    session_start(['cookie_httponly' => true]);
    // all DB
    require_once "./include/config.php";
    require_once "./include/functions.php";
    require_once "./include/controller.php";
    // To handle errors not sure yet
    require_once "./include/error_handler.php";



    require_once "./include/header.php";

    //front controller
    if(isset($error) && $error){
        if (isset($_POST['register'])) {
            echo "<div class='warning-box'>$error</div>";
            require_once 'register.php';

        }
        if (isset($_POST['login'])) {
            echo "<div class='warning-box'>$error</div>";
            require_once 'login.php';
        }
        if (isset($_POST['add-post'])) {
            echo "<div class='warning-box'>$error</div>";
            require_once 'main.php';
        }
    }
    elseif(isset($_GET["page"])) {
        $page_name = $_GET["page"];
        $page = htmlentities($_GET["page"]);
        if(isset($_SESSION["logged"])){
            require_once "$page.php";
        }
        elseif ($page === "register"){
            require_once "./register.php";
        }
        else{
            require_once "./login.php";
        }
    }
    else{
        if (isset($_SESSION["logged"])) {
            require_once "./main.php";
        }
        else {
            require_once "./login.php";
        }
    }

    require_once "./include/footer.php";


