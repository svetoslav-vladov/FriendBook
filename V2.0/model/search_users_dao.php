<?php
require_once 'db_config.php';

function getAllUsers($logged_user_id) {
    $pdo = $GLOBALS['pdo'];
    $statement = $pdo->prepare("SELECT id, first_name, last_name, gender, profile_pic
                                FROM users 
                                WHERE id != ?");
    $statement->execute(array($logged_user_id));
    $result = $statement->fetchAll();
    return $result;
}