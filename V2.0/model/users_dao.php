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

function getSuggestedUsers($user_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT id, first_name, last_name, email, birthday, gender, profile_pic, profile_cover, relation_status 
                                FROM users 
                                WHERE id != ? LIMIT 10;");
    $statement->execute(array($user_id));
    $result = $statement->fetchAll();
    $suggested_users = [];
    foreach ($result as $user) {
        $usr = [];
        $usr['id'] = $user['id'];
        $usr['first_name'] = $user['first_name'];
        $usr['last_name'] = $user['last_name'];
        $usr['email'] = $user['email'];
        $usr['birthday'] = $user['birthday'];
        $usr['gender'] = $user['gender'];
        $usr['profile_pic'] = $user['profile_pic'];
        $usr['profile_cover'] = $user['profile_cover'];
        $usr['relation_status'] = $user['relation_status'];
        $suggested_users[] = $usr;
    }
    return $suggested_users;
}

function getUserImgInfo($user_id) {
    // This function return information for all posts and information for the owner of the posts
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT profile_pic, profile_cover
                                FROM users 
                                WHERE users.id = ? 
                                ");
    $statement->execute(array($user_id));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}