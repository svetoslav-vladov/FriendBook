<div id="wrap">
    <div class="logo-front">
        <img src="./assets/images/friendbook-front-logo.png" alt="friend book front logo">
    </div>

    <form id="register" action="index.php" method="post">

        <div>
            <input type="text" placeholder="first name:" name="first_name">
        </div>
        <div>
            <input type="text" placeholder="last name:" name="last_name">
        </div>
        <div>
            <input type="email" placeholder="email:" name="email">
        </div>
        <div>
            <input type="password" placeholder="password:" name="password">
        </div>
        <div>
            <input type="password" placeholder="confirm password:" name="confirm_pass">
        </div>
        <div>
            <div>Birthday date</div>
            <input type="date" name="b_day">
        </div>
        <div>
            <select name="gender">
                <option value="default_gender" selected="" disabled="disabled">gender</option>
                <option value="male">male</option>
                <option value="female">female</option>
            </select>
        </div>
        <div>
            <input type="submit" name="register" value="register" class="btn">
            <br>
            <a href="index.php?page=login" class="btn">back to login</a>
        </div>

    </form>
    <div class="footer-front">
        <p>www.FriendBook.bg &copy; 2018 <br> All Rights Reserved</p>
    </div>
</div>
