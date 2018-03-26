<?php

require_once '../include/session.php';
require_once '../model/posts_dao.php';

if (isset($_POST['add_post'])) {
    $user_id = $_SESSION['logged']['id'];
    $current_post = htmlentities($_POST['desc']);
    $current_post = trim($current_post);
    $error = false;

    if (empty($current_post)) {
        $error = 'Please fill post!';
        header("location: ../view/main.php?error=" . htmlentities($error));
    }
    elseif(mb_strlen($current_post) > 1500) {
        $error = 'Your post contains many characters! Please enter fewer characters.';
        header("location: ../view/main.php?error=" . htmlentities($error));
    }
    if (!$error) {
        addPost($user_id, $current_post);
        header("location: ../view/main.php");
    }
}
