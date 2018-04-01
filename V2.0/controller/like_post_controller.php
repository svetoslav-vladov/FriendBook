<?php

require_once '../include/session.php';
require_once '../model/like_post_dao.php';


//AJAX REQUEST for like a post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_SESSION['logged']['id'];
    $post_id = htmlentities($_POST['post_id']);
    likePost($post_id, $user_id);
}
//function for like post
if (isset($_GET['post_id'])) {
    $user_id = $_SESSION['logged']['id'];
    $post_id = htmlentities($_GET['post_id']);
    isLiked($post_id, $user_id);
}