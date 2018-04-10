<?php
    require_once '../include/session.php';
    require_once '../model/images_dao.php';

    if(isset($_GET['user_id'])){
        $user_id = htmlentities($_GET['user_id']);
        $data = [];
        try{
            $data['data'] = getProfileImages($user_id);
        }
        catch (PDOException $e){
            $data['PDO_error'] = $e->getMessage();
        }
        catch (Exception $e){
            $data['exception'] = $e->getMessage();
        }
        echo json_encode($data['data']);
    }