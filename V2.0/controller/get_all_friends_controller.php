<?php

require_once '../include/session.php';
require_once '../model/friends_dao.php';

if (isset($_GET['id'])) {
    $userId = htmlentities($_GET['id']);
    $result = getAllFriends($userId);
    echo json_encode($result);
}
else{
    $userId = $_SESSION['logged']['id'];
    $result = getAllFriends($userId);
    echo json_encode($result);

}