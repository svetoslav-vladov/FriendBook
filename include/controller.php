<?php
    require_once 'config.php';
    if (isset($_POST['login'])) {
        $error = false;
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $loginErrors = true;
        if (empty($email) || empty($password)) {
            $error = 'Please fill all filds!';
        }
        else {
            foreach ($usersDB as $key => $user) {
                if ($email == $key && $user['password'] == sha1($password)) {
                    $loginErrors = false;
                    $_SESSION['logged'] = $user;
                    header('location: index.php?page=main');
                    break;
                }
            }
            if ($loginErrors) {
                $error = 'Wrong email or password!';
            }
        }
    }
    if(isset($_GET["page"]) && $_GET["page"] == "logout"){
        session_destroy();
        header("location:index.php?page=login");
        die();
    }
    if (isset($_POST['register'])) {
        $error = false;
        $user = array();
        $reg_date = getdate(); // we generate array with all time, date and day and timestamp at $reg_date["0"]
        $reg_first_name = htmlentities($_POST['first_name']);
        $reg_last_name = htmlentities($_POST['last_name']);
        $reg_email = htmlentities($_POST['email']);
        $reg_password = htmlentities($_POST['password']);
        $reg_conf_pass = htmlentities($_POST['confirm_pass']);
        $reg_gender = $_POST['gender'];
        $reg_birthday = htmlentities($_POST['b_day']);

        if(empty($reg_email) || empty($reg_password)
            || empty($reg_conf_pass) || empty($reg_gender)
            || empty($reg_conf_pass) || empty($reg_birthday)){

            $error = "All fields must be filled!";
        }
        elseif ($reg_password !== $reg_conf_pass){
            $error = "Passwords miss match!";
        }
        elseif($reg_gender == 'default_gender') {
            $error = 'Please select gender!';
        }
        foreach ($usersDB as $user) {
            if ($user['email'] == $reg_email) {
                $error = 'Email already exists!';
            }
        }
        if (!$error) {
            $user['first_name'] = $reg_first_name;
            $user['last_name'] = $reg_last_name;
            $user['display_name'] = "";
            $user['relationship_status'] = "";
            $user['email'] = $reg_email;
            $user['password'] = sha1($reg_password);
            $user['gender'] = $reg_gender;
            $user['email'] = $reg_email;
            $user['birthday'] = $reg_birthday;
            $user['contacts'] = array();
            //$user['reg_date'] = date('m/d/Y h:i:s a', time());
            //$user['reg_date'] = date("d-m-Y / H:i:s", $reg_date["0"]);
            $user['reg_date'] = $reg_date["0"];
            $usersDB[$reg_email] = $user;
            file_put_contents("./data/users.json", json_encode($usersDB));
            $_SESSION['logged'] = $user;
        }
}