<?php
require_once '../include/session.php';
require_once '../model/posts_dao.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $result = getLikedPosts($_SESSION['logged']['id']);;
    echo json_encode($result);
}