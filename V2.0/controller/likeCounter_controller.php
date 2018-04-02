<?php
require_once '../include/session.php';
require_once '../model/like_post_dao.php';

if (isset($_GET['post_id'])) {
    $post_id = htmlentities($_GET['post_id']);
    getCountLikes($post_id);
}