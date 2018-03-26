<?php

    if(isset($_GET["error"])){
        $error = htmlentities($_GET["error"]);
        echo "<div class='err_msg'>$error!!!</div>";
    }
    elseif(isset($_GET["success"])){
        $success = htmlentities($_GET["success"]);
        echo "<div class='ok_msg'>$success!!!</div>";
    }
?>