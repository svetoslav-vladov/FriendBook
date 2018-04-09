<?php
    require_once '../include/session.php';
    require_once '../model/settings_dao.php';

    if(isset($_POST['general'])){
        // working with objects
        $data = json_decode($_POST['data']);

        $first_name = htmlentities($data->first_name);
        $last_name = htmlentities($data->last_name);
        $display_name = htmlentities($data->display_name);
        $relation_status = htmlentities($data->relation_status);
        $gender = htmlentities($data->gender);
        $birthday = htmlentities($data->birthday);
        $country = htmlentities($data->country);
        $website = htmlentities($data->website);
        $mobile_number = htmlentities($data->mobile_number);
        $skype_name = htmlentities($data->skype_name);

        $user_id = $_SESSION['logged']['id'];

        try{
            $user_in_db_info = getUserDetailsForCheck($user_id);

            if(strlen($first_name) > 0){
                $first_name = $data->first_name;
            }
            else{
                $first_name = $user_in_db_info[0]["first_name"];
            }

            if(strlen($last_name) > 0){
                $last_name = $data->last_name;
            }
            else{
                $last_name = $user_in_db_info[0]["last_name"];
            }

            if(strlen($gender) > 0){
                $gender = $data->gender;
            }
            else{
                $gender = $user_in_db_info[0]["gender"];
            }

            if(strlen($birthday) > 0){
                $birthday = $data->birthday;
            }
            else{
                $birthday = $user_in_db_info[0]["birthday"];
            }

            if(strlen($country) > 0){
                $country = $data->country_id;
            }
            else{
                $country = $user_in_db_info[0]["country_id"];
            }


            if(is_null($user_in_db_info[0]["relation_status"]) ||
                strlen($relation_status) > 0){
                $relation_status = $data->relation_status;
            }
            else{
                $relation_status = $user_in_db_info[0]["relation_status"];
            }

            if(is_null($user_in_db_info[0]["display_name"]) ||
                strlen($display_name) > 0){
                $display_name = $data->display_name;
            }
            else{
                $display_name = $user_in_db_info[0]["display_name"];
            }


            if(is_null($user_in_db_info[0]["mobile_number"]) ||
                strlen($mobile_number) > 0){
                $mobile_number = $data->mobile_number;
            }
            else{
                $mobile_number = $user_in_db_info[0]["mobile_number"];
            }

            if(is_null($user_in_db_info[0]["www"]) ||
                strlen($website) > 0){
                $website = $data->website;
            }
            else{
                $website = $user_in_db_info[0]["www"];
            }

            if(is_null($user_in_db_info[0]["skype"]) ||
                strlen($skype_name) > 0){
                $skype_name = $data->skype_name;
            }
            else{
                $skype_name = $user_in_db_info[0]["skype"];
            }


        }
        catch(PDOException $e){
            header('location: ../views/settings.php?err=' . $e->getMessage());
        }
        catch(Exception $e){
            header('location: ../views/settings.php?err=' . $e->getMessage());
        }

        $prepared_data_collect = [
            "first_name"=>$first_name,
            "last_name"=>$last_name,
            "display_name"=>$display_name,
            "relation_status"=>$relation_status,
            "gender"=>$gender,
            "birthday"=>$birthday,
            "country"=>$country,
            "website"=>$website,
            "mobile_number"=>$mobile_number,
            "skype_name"=>$skype_name,
        ];

        try{
            if(insertSettings($user_id,$prepared_data_collect)){
                echo 'true';

                $_SESSION['logged']['first_name'] = $first_name;
                $_SESSION['logged']['last_name'] = $last_name;
                $_SESSION['logged']['gender'] = $gender;
                $_SESSION['logged']['birthday'] = $birthday;
                $_SESSION['logged']['relation_status'] = $relation_status;

//                'first_name' => string 'Svetoslav' (length=9)
//      'last_name' => string 'Vladov' (length=6)
//      'email' => string 'komara_@abv.bg' (length=14)
//      'reg_date' => string '2018-04-07 12:26:48' (length=19)
//      'gender' => string 'male' (length=4)
//      'birthday' => string '1988-12-22' (length=10)
//      'relation_status' => null
            }
            else{
                echo 'false';
            }
        }
        catch(PDOException $e){
             echo $e->getMessage();
        }
        catch(Exception $e){
           echo $e->getMessage();
        }

    }

    if(isset($_POST['security'])){

    }