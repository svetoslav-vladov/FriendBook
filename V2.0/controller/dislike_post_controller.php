<?php
require_once '../include/session.php';
require_once '../model/like_post_dao.php';

if (isset($_POST['post_id'])) {
    $user_id = $_SESSION['logged']['id'];
    $post_id = htmlentities($_POST['post_id']);
    dislikePost($post_id, $user_id);
}