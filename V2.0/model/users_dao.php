<?php
require_once 'db_config.php';

function registerUser($first_name, $last_name, $email, $password, $gender, $birthday, $profile_pic, $profile_cover) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password, gender, birthday, profile_pic, profile_cover) 
                                VALUES (?,?,?,?,?,?,?,?)");
    return $statement->execute(array($first_name, $last_name, $email, $password, $gender, $birthday, $profile_pic, $profile_cover));
}

function regUserExist($email) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT COUNT(*) AS count FROM users WHERE email = ?");
    $statement->execute(array($email));
    $row = $statement->fetch();
    return $row['count'] > 0;
}

function loginSession($email) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $statement->execute(array($email));
    $user = $statement->fetch();
    $logged_user['id'] = $user['id'];
    $logged_user['first_name'] = $user['first_name'];
    $logged_user['last_name'] = $user['last_name'];
    $logged_user['email'] = $user['email'];
    $logged_user['reg_date'] = $user['reg_date'];
    $logged_user['gender'] = $user['gender'];
    $logged_user['birthday'] = $user['birthday'];
    $logged_user['relation_status'] = $user['relation_status'];
    $logged_user['profile_pic'] = $user['profile_pic'];
    $logged_user['profile_cover'] = $user['profile_cover'];
    $_SESSION['logged'] = $logged_user;
}

function userPassCheck($email, $password) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT COUNT(*) as count FROM users WHERE email = ? AND password = ?");
    $statement->execute(array($email, $password));
    $row = $statement->fetch(); // return first row of table
    return $row['count'] > 0;
}