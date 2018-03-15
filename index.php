<?php
    session_start();
    // all DB
    require_once "./include/config.php";
    require_once "./include/functions.php";
    require_once "./include/controller.php";
    // To handle errors not sure yet
    require_once "./include/error_handler.php";

    // for testing
    // $error = "username do not exists";

    require_once "./include/header.php";

    //front controller
    if(isset($error) && $error){
        echo "<div class='warning-box'>$error</div>";
    }
    if(isset($_GET["page"])){
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
        if(isset($_SESSION["logged"])){
            require_once "./main.php";
        }
        else{
            require_once "./login.php";
        }
    }

    require_once "./include/footer.php";


