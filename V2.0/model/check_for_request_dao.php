<?php
require_once 'db_config.php';
function checkForRequest($accept_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT users.id, users.first_name, users.last_name
                                FROM users
                                JOIN friend_requests ON friend_requests.requested_user_id = users.id
                                WHERE friend_requests.accepted_user_id = ?");
    $statement->execute(array($accept_id));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}