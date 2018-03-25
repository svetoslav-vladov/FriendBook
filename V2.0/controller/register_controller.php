<?php

session_start(['cookie_httponly' => true]);

require_once '../model/users_dao.php';

if (isset($_POST['register'])) {
    $first_name = htmlentities($_POST['first_name']);
    $last_name = htmlentities($_POST['last_name']);
    $email = htmlentities($_POST['email']);
    $password = htmlentities(sha1($_POST['password']));
    $confirm_pass = htmlentities(sha1($_POST['confirm_pass']));
    $gender = htmlentities($_POST['gender']);
    $birthday = htmlentities($_POST['b_day']);
    $profile_pic = $GLOBALS['default_profile_pic'];
    $cover_pic = $GLOBALS['default_cover_pic'];

    $error = false;
    $success = false;

    if (regUserExist($email)) {
        $error = 'Email already exists! Please try another.';
        header("location: ../view/register.php?error=" . htmlentities($error));
    }
    elseif($password !== $confirm_pass) {
        $error = 'Password miss match!';
        header("location: ../view/register.php?error=" . htmlentities($error));
    }
    elseif(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_pass) || empty($gender) || empty($birthday)) {
        $error = 'All inputs are required! Please fill in them';
        header("location: ../view/register.php?error=" . htmlentities($error));
    }
    else {
        registerUser($first_name, $last_name, $email, $password, $gender, $birthday, $profile_pic, $cover_pic);
        $success = 'Successfuly registered!';
        header("location: ../view/register.php?success=" . htmlentities($success));
    }

}