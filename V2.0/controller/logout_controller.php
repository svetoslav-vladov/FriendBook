<?php
require_once '../include/session.php';
    if (isset($_SESSION['logged'])){
        session_destroy();
        header('location: ../view/login.php');
    }
?>