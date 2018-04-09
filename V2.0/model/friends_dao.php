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

function getAllFriends($user_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT id, first_name, last_name, email, birthday, gender, profile_pic, profile_cover
                                FROM users
                                JOIN friends ON friends.friend_id = users.id
                                WHERE friends.user_id = ?");
    $statement->execute(array($user_id));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
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

function getCountFriends($post_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT COUNT(*) AS friend_count
                                FROM friends
                                WHERE user_id = ?");
    $statement->execute(array($post_id));
    echo $statement->fetch()['friend_count'];
}