<?php
require_once '../include/session.php';
require_once '../model/friends_dao.php';

// AJAX request for add friend
if (isset($_POST['friend_id'])) {
    $user_id = $_SESSION['logged']['id'];
    $friend_id = htmlentities($_POST['friend_id']);
    $request_status = 1;
    $accepted_status = 0;
    sendRequestToFriend($user_id, $friend_id, $request_status, $accepted_status);
}

if (isset($_GET['friend_id'])) {
    $user_id = $_SESSION['logged']['id'];
    $friend_id = htmlentities($_GET['friend_id']);
    $request_status = 1;
    isSendRequest($user_id, $friend_id, $request_status);
}

if (isset($_POST['friendId'])) {
    $user_id = $_SESSION['logged']['id'];
    $friend_id = htmlentities($_POST['friendId']);
    $req_status = 1;
    stopRequestToFriend($user_id, $friend_id);
}
