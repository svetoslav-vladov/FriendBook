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

    function uploadCoverPicture($user_id, $cover_url){


        $pdo = $GLOBALS['pdo'];
        $statement = $pdo->prepare("UPDATE users 
                                        SET profile_cover=:cover_url WHERE id=:user_id;");

        $statement->bindParam(':user_id',$user_id, PDO::PARAM_INT);
        $statement->bindParam(':cover_url',$cover_url, PDO::PARAM_STR);


        return $statement->execute();
    }

    function getProfileImages($user_id){

        $pdo = $GLOBALS['pdo'];
        $statement = $pdo->prepare("SELECT img_url 
                                    FROM user_photos 
                                    WHERE user_id = :user_id;");

        $statement->bindParam(':user_id',$user_id, PDO::PARAM_INT);

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);


    }

    function uploadPhotos($user_id, $img_url){

        $pdo = $GLOBALS['pdo'];

        $statement = $pdo->prepare("INSERT INTO user_photos (user_id, img_url) 
                                VALUES (:user_id,:img_url)");


        $statement->bindParam(':user_id',$user_id, PDO::PARAM_INT);
        $statement->bindParam(':img_url',$img_url, PDO::PARAM_STR);

        return $statement->execute();


    }