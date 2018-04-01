<?php

require_once 'db_config.php';

function likePost($post_id, $user_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("INSERT INTO likes (post_id, user_id) 
                                VALUES (?,?)");
    return $statement->execute(array($post_id, $user_id));
}

function isLiked($post_id, $user_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT COUNT(*) AS isLike 
                                FROM likes
                                WHERE post_id = ? AND user_id = ?");
    $statement->execute(array($post_id, $user_id));
    $result = $statement->fetch(); // return first row of table
    return $result['isLike'] > 0;
}