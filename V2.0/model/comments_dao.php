<?php

require_once 'db_config.php';

function addComment($description, $post_id, $owner_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("INSERT INTO comments (description, post_id, owner_id) 
                                VALUES (?,?,?)");
    return $statement->execute(array($description, $post_id, $owner_id));
}

function getAllCommentsForCurrentPost($post_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT comments.id AS comment_id , comments.description, comment_date, post_id, owner_id, profile_pic, first_name, last_name
                                FROM comments
                                JOIN users ON users.id = comments.owner_id
                                JOIN posts ON posts.id = comments.post_id
                                WHERE posts.id = ?
                                ORDER BY comments.comment_date;");
    $statement->execute(array($post_id));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}