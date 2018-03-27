<?php
require_once 'db_config.php';

function addPost($user_id, $description){
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("INSERT INTO posts (user_id, description) 
                                VALUES (?,?);");
    $statement->execute(array($user_id, $description));
}

function getAllPosts() {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT posts.id AS post_id, posts.description, posts.create_date, users.id AS user_id, users.first_name, users.last_name, users.profile_pic, users.profile_cover
                                FROM posts
                                JOIN users ON posts.user_id = users.id WHERE ?
                                ORDER BY posts.create_date DESC ");
    $statement->execute(array(1));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}