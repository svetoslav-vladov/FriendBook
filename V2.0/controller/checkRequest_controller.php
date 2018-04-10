<?php
require_once '../include/session.php';
require_once '../model/check_for_request_dao.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $user_id = $_SESSION['logged']['id'];
    $accepted_status = 0;
    $result = checkForRequest($_SESSION['logged']['id']);
    echo json_encode($result);
}