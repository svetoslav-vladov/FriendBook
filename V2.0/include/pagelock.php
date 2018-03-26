<?php
    if(!isset($_SESSION["logged"])){
        header("location:./login.php?error=No%access%for%guests");
        die("No access for guests");
    }
?>