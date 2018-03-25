<?php

require_once '../include/session.php';
require_once '../model/users_dao.php';

if (isset($_POST['login'])) {
    $email = htmlentities($_POST['email']);
    $password = htmlentities(sha1($_POST['password']));
    $error = false;

    if (empty($email) || empty($password)) {
        $error = "All fields are required! Please fill in them";
        header("location: ../view/login.php?error=" . htmlentities($error));
    }
    elseif(userPassCheck($email, $password)) {
        loginSession($email);
        header('location: ../view/main.php');
    }
    else {
        $error = 'Wrong email or password!';
        header("location: ../view/login.php?error=" . htmlentities($error));
    }
}