<?php
    require_once '../include/session.php';
    require_once "../include/pagelock.php";
    $logged_user_id = $_SESSION['logged']['id'];
    // header.php is head tag, meta, link etc.
    require_once "../include/header.php";
    //mainHeader is after login, top navigation
    require_once  "../include/mainHeader.php";
?>


    <div id="content-grid-full">
        <img src="../assets/images/error-403.png" class="error_poster" alt="error 403">
    </div>



<?php
//mainFooter is the end of mainHeader
require_once "../include/mainFooter.php";
//footer is end of html parts
require_once "../include/footer.php";
?>