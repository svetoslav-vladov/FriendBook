<?php

require_once '../include/session.php';
require_once '../model/posts_dao.php';

if (isset($_POST['add_post'])) {
    $user_id = $_SESSION['logged']['id'];
    $current_post = htmlentities($_POST['desc']);
    $current_post = trim($current_post);
    $error = false;

    if (empty($current_post)) {
        $error = "You can't create empty post, Please fill the post!";
        header("location: ../view/main.php?error=" . htmlentities($error));
    }
    elseif(mb_strlen($current_post) > 1500) {
        $error = 'Your post contains too many characters! Please enter no more than 1500 characters.';
        header("location: ../view/main.php?error=" . htmlentities($error));
    }
    if (!$error) {
        if (isset($_POST['user_id'])) {
            $id = htmlentities($_POST['user_id']);
            addPost($user_id, $current_post);
            header("location: ../view/profile.php?id=" . $id);
        }else {
            addPost($user_id, $current_post);
            header("location: ../view/main.php");
        }
    }
}
