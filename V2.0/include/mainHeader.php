<div id="top">
    <div class="center-content">
        <div id="logo">
            <a href="../index.php"><img src="../assets/images/mini-logo.png" alt="friendbook logo"></a>
        </div>
        <div id="search">

            <div id="input-box">
                <input type="text" name="search" autocomplete="off" onkeyup="searchUser(this.value)" placeholder="Search for someone...">
                <button class="search-btn"><i class="fas fa-search"></i></button>
                <div class="users-result">
                    <ul class="users-list">
                    </ul>
                </div>
            </div>
        </div>
        <nav>
            <ul id="icon-nav">
                <li class="profile-btn">
                    <a href="../view/profile.php">
                        <img src="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["profile_pic"];}?>" title="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?>" alt="profile_pic">
                    </a>
                </li>
                <li><a href="../view/main.php"><i class="fas fa-home"></i></a></li>
                <li><a href="../view/friends.php?id=<?php echo $_SESSION['logged']['id']?>"><i class="fas fa-users"></i><span id="friendsCounter"></span></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                <li><a href="#"><i class="fas fa-bell"></i></a></li>
                <li><a href="../controller/logout_controller.php"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </div>
</div>
<div id="gridWrap">