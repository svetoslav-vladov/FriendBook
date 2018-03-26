<?php
    if(!isset($_SESSION["logged"])){
        $msg = "Access denied, please login";
        header("location:./login.php?error=$msg");
        die("No access for guests");
    }
?>