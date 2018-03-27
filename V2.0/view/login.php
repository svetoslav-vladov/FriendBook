<?php
    require_once "../include/session.php";
    require_once "../include/header.php";

    if(isset($_SESSION["logged"])){
        header('location: ./main.php');
    }

?>
<div id="wrap">
    <div class="logo-front">
        <a href="<?php echo $_SERVER["REQUEST_URI"]; ?>">
            <img src="../assets/images/friendbook-front-logo.png" alt="friend book front logo">
        </a>
    </div>
    <form id="login" method="POST" action="../controller/login_controller.php">
        <div>
            <label for="email">Email:</label>
        </div>
        <div>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Password:</label>
        </div>
        <div>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <input type="submit" class="btn shadow-box" name="login">
            <br>
            <a href="./register.php" class="btn">You don't have account?</a>
        </div>
    </form>
    <div class="footer-front">
        <p>www.FriendBook.bg &copy; 2018 <br> All Rights Reserved <br> Version 2.0</p>
    </div>
</div>
<?php
    require_once "../include/footer.php";
?>