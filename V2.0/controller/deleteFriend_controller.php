<?php
require_once '../include/session.php';
require_once '../model/friends_dao.php';

// AJAX request for delete friend
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_SESSION['logged']['id'];
    $friend_id = htmlentities($_POST['friend_id']);
    deleteFriend($user_id, $friend_id);

}