<?php

    require_once '../include/default_paths.php';
    require_once '../include/session.php';
    require_once "../model/images_dao.php";

    if ( 0 < $_FILES['file']['error'] ) {
        $message['file-firs-error'] = $_FILES['file']['error'];
    }
    else{
        $tmp_name = $_FILES['file']['tmp_name'];
        $orig_name = $_FILES['file']['name'];
    }


    if(is_uploaded_file($tmp_name)){
        $exploded_name = explode(".", $orig_name);
        $ext = $exploded_name[count($exploded_name)-1];

        $profile_img = "../uploads/users/" . time() . "-" . $_SESSION['logged']['id'] . ".".$ext;
        if(move_uploaded_file($tmp_name, $profile_img)){

            try{
                $message = [];
                if(uploadProfilePicture($_SESSION['logged']['id'],$profile_img)){
                    $oldPic =  $_SESSION['logged']['profile_pic'];
                    $default_profil = $GLOBALS["female_default_picture"];

                    if($oldPic !== $default_profil){
                        unlink($oldPic);
                    }
                    $_SESSION['logged']['profile_pic'] = $profile_img;
                    $message['img_url'] = $profile_img;
                }
                else{
                    $message['error'] = true;
                }
            }
            catch (PDOException $e){
                $message['pdo_error'] = $e->getMessage();
            }
            catch (Exception $e){
                $message['exeption'] = $e->getMessage();
            }

        }
        else{
            $message['move_error'] = "File not moves successfully";
        }
    }
    else{
        $message['upload_error'] = "File not uploaded successfully";
    }
    echo json_encode($message);

?>