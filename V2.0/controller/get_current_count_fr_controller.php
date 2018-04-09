<?php
require_once '../include/session.php';
require_once '../model/friends_dao.php';

if (isset($_GET['id'])) {
    $userId = htmlentities($_GET['id']);
    getCountFriends($userId);
}