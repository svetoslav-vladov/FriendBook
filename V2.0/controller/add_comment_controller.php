<?php

require_once '../include/session.php';
require_once '../model/comments_dao.php';

//AJAX REQUEST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_SESSION['logged']['id'];
    $post_id = htmlentities($_POST['post_id']);
    $comment_desc = htmlentities($_POST['comment_description']);
    $comment_desc = trim($comment_desc);
    if (isset($_POST['user_id'])) {
        $id = htmlentities($_POST['user_id']);
        addComment($comment_desc, $post_id, $user_id);
        header("location: ../view/profile.php?id=" . $id);
    }else {
        addComment($comment_desc, $post_id, $user_id);
        header("location: ../view/main.php");
    }
}
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $result = getAllCommentsForCurrentPost($post_id);
    echo json_encode($result);
}