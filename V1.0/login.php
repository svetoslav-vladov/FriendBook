<div id="wrap">
    <div class="logo-front">
        <a href="<?php echo $_SERVER["REQUEST_URI"]; ?>">
            <img src="./assets/images/friendbook-front-logo.png" alt="friend book front logo">
        </a>
    </div>
    <form id="login" method="POST" action="./index.php">
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
            <input type="submit" class="btn" name="login">
            <br>
            <a href="./index.php?page=register" class="btn">You don't have account?</a>
        </div>
    </form>
    <div class="footer-front">
        <p>www.FriendBook.bg &copy; 2018 <br> All Rights Reserved</p>
    </div>
</div>