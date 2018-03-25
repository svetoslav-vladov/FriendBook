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