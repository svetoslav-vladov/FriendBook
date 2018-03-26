<?php
require_once 'db_config.php';

function addPost($user_id, $description){
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("INSERT INTO posts (user_id, description) 
                                VALUES (?,?);");
    $statement->execute(array($user_id, $description));
}