<?php
    require_once 'db_config.php';
    function uploadProfilePicture($user_id, $picture_url){


        $pdo = $GLOBALS['pdo'];
        $statement = $pdo->prepare("UPDATE users 
                                    SET profile_pic=:picture_url WHERE id=:user_id;");

        $statement->bindParam(':user_id',$user_id, PDO::PARAM_INT);
        $statement->bindParam(':picture_url',$picture_url, PDO::PARAM_STR);


        return $statement->execute();
    }