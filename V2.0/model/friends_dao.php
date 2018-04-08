<?php
require_once 'db_config.php';

function addFriend($user_id, $friend_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("INSERT INTO friends (user_id, friend_id) 
                                VALUES (?,?)");
    return $statement->execute(array($user_id, $friend_id));
}

function deleteFriend($user_id, $friend_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("DELETE FROM friends WHERE user_id = ? AND friend_id = ?");
    return $statement->execute(array($user_id, $friend_id));
}

function getAllFriends($logged_user_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT users.id, first_name, last_name
                                FROM users
                                JOIN friends ON friends.friend_id = users.id
                                WHERE friends.user_id = ?");
    $statement->execute(array($logged_user_id));
    $result = $statement->fetchAll();
    return $result;
}

function isFriend($user_id, $friend_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT COUNT(*) AS isFriend
                                FROM friends
                                WHERE user_id = ? AND friend_id = ?");
    $statement->execute(array($user_id, $friend_id));
    echo $statement->fetch()['isFriend'];
}