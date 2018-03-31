<?php

require_once '../include/session.php';
require_once '../model/search_users_dao.php';

$users = getAllUsers($_SESSION['logged']['id']);

if (isset($_GET['search'])) {
    $searched_user = htmlentities($_GET['search']);
    $logged_user_id = $_SESSION['logged']['id'];
    $result = [];
    $found = false;
    $counter = 0;
    foreach ($users as $user) {
        if(strstr(strtolower($user["first_name"]), strtolower($searched_user))
            || strstr(strtolower($user["last_name"]), strtolower($searched_user))) {
            $result[] = [
                'id' => $user['id'],
                'first_name' =>$user['first_name'],
                'last_name' => $user['last_name'],
                'profile_pic' => $user['profile_pic'],
                'gender' => $user['gender']
            ];
            $found = true;
            $counter++;
        }
        if ($counter == 5) {
            break;
        }
    }
    if (!$found) {
        echo "Not found!";
    }else {
        echo json_encode($result);
    }
}
