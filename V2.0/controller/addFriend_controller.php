<?php
require_once '../include/session.php';
require_once '../model/friends_dao.php';

// AJAX request for add friend
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_SESSION['logged']['id'];
    $friend_id = htmlentities($_POST['friend_id']);
    addFriend($user_id, $friend_id);
}

if (isset($_GET['friend_id'])) {
    $user_id = $_SESSION['logged']['id'];
    $friend_id = htmlentities($_GET['friend_id']);
    isFriend($user_id, $friend_id);
}