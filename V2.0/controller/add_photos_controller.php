<?php

require_once '../include/default_paths.php';
require_once '../include/session.php';
require_once "../model/images_dao.php";

if (!empty($_FILES) && $_FILES['file']["size"] < 1000000) {
    if (0 < $_FILES['file']['error']) {
        $message['file-firs-error'] = $_FILES['file']['error'];
    } else {
        $tmp_name = $_FILES['file']['tmp_name'];
        $orig_name = $_FILES['file']['name'];
    }


    if (is_uploaded_file($tmp_name)) {
        $exploded_name = explode(".", $orig_name);
        $ext = $exploded_name[count($exploded_name) - 1];

        $image_to_upload = "../uploads/users/photos/" . time() . "-" . $_SESSION['logged']['id'] . "." . $ext;
        if (move_uploaded_file($tmp_name, $image_to_upload)) {

            try {

                if (uploadPhotos($_SESSION['logged']['id'], $image_to_upload)) {

                    $message['img_url'] = $image_to_upload;
                } else {
                    $message['error'] = true;
                }

            } catch (PDOException $e) {
                $message['pdo_error'] = $e->getMessage();
            } catch (Exception $e) {
                $message['exeption'] = $e->getMessage();
            }

        }
        else {
            $message['move_error'] = "File not moves successfully";
        }
    }
    else {
        $message['upload_error'] = "File not uploaded successfully";
    }
}
else {
    $message['uplod_max'] = "File max upload size reach, no more than 1MB";
}
echo json_encode($message);

?>