<?php

    require_once 'db_config.php';

    function insertSettings($user_id, $new_user_data){
        $user_id = intval($user_id);

        $pdo = $GLOBALS['pdo'];
        $statement = $pdo->prepare("UPDATE users 
                                    SET first_name=:first_name, last_name=:last_name, gender=:gender, 
                                    birthday=:birthday, relation_status=:relation_status,
                                    display_name=:display_name, country_id=:country, mobile_number=:mobile_number,
                                    www=:website, skype=:skype_name
                                    WHERE id=:user_id;");


        $statement->bindParam(':first_name',$new_user_data['first_name'], \PDO::PARAM_STR);
        $statement->bindParam(':last_name',$new_user_data['last_name'], \PDO::PARAM_STR);
        $statement->bindParam(':gender',$new_user_data['gender'], PDO::PARAM_STR);
        $statement->bindParam(':birthday',$new_user_data['birthday'], PDO::PARAM_STR);
        $statement->bindParam(':relation_status',$new_user_data['relation_status'], PDO::PARAM_STR);
        $statement->bindParam(':display_name',$new_user_data['display_name'], PDO::PARAM_STR);
        $statement->bindParam(':country',$new_user_data['country'], PDO::PARAM_INT);
        $statement->bindParam(':mobile_number',$new_user_data['mobile_number'], PDO::PARAM_STR);
        $statement->bindParam(':website',$new_user_data['website'], PDO::PARAM_STR);
        $statement->bindParam(':skype_name',$new_user_data['skype_name'], PDO::PARAM_STR);

        $statement->bindParam(':user_id',intval($user_id), \PDO::PARAM_INT);


        return $statement->execute();


    }

    function getUserDetailsForCheck($user_id){
        $pdo = $GLOBALS['pdo'];
        $statement = $pdo->prepare("SELECT first_name, last_name, gender, birthday, relation_status,
                                    display_name, country_id, mobile_number, www, skype FROM users WHERE id = ?");
        $statement->execute(array($user_id));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }