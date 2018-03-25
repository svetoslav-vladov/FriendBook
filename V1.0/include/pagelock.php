<?php
    if(!isset($_SESSION["logged"])){
        header("location:./index.php");
        die("No access for guests");
    }
?>