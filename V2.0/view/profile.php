<?php
    require_once '../include/session.php';
    require_once "../model/posts_dao.php";

    echo '<pre>';
    var_dump(getOwnPosts($_GET['id']));
    echo '</pre>';
?>

