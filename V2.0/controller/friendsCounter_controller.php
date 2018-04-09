<?php

require_once '../include/session.php';
require_once '../model/friends_dao.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    getCountFriends($_SESSION['logged']['id']);
}