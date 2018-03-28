<?php

require_once '../include/session.php';
require_once '../model/comments_dao.php';

if (isset($_POST['add_comment'])) {
    $user_id = $_SESSION['logged']['id'];
    $post_id = htmlentities($_POST['post_id']);
    $comment_desc = htmlentities($_POST['comment_description']);
    $comment_desc = trim($comment_desc);
    $error = false;

    if (empty($comment_desc)) {
        $error = "You can't create empty comment, Please fill the post!";
        header("location: ../view/main.php?error=" . htmlentities($error));
    }
    elseif(mb_strlen($comment_desc) > 1500) {
        $error = 'Your comment contains too many characters! Please enter no more than 1500 characters.';
        header("location: ../view/main.php?error=" . htmlentities($error));
    }
    if (!$error) {
        if (isset($_POST['user_id'])) {
            $id = htmlentities($_POST['user_id']);
            addComment($comment_desc, $post_id, $user_id);
            header("location: ../view/profile.php?id=" . $id);
        }else {
            addComment($comment_desc, $post_id, $user_id);
            header("location: ../view/main.php");
        }
    }
}