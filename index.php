<?php
    session_start(['cookie_httponly' => true]);
    // all DB
    require_once "./include/config.php";
    require_once "./include/functions.php";
    require_once "./include/controller.php";
    // To handle errors not sure yet
    require_once "./include/error_handler.php";

    // for testing
    // $error = "username do not exists";

    if(isset($_GET["page"]) && $_GET["page"] == "logout"){
        session_destroy();
        header("location:index.php?page=login");
        die();
    }

    require_once "./include/header.php";

    //front controller
    if(isset($error) && $error){
        if (isset($_POST['register'])) {
            require_once 'register.php';
            echo "<div class='warning-box'>$error</div>";
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


