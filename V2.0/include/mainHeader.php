<div id="top">
    <div class="center-content">
        <div id="search">
            <a href="../index.php"><img src="../assets/images/mini-logo.png" alt="friendbook logo"></a>
            <input type="text" name="search" placeholder="Search for someone...">
            <button>Search</button>
        </div>
        <nav>
            <ul id="icon-nav">
                <li class="profile-btn">
                    <a href="#<?php echo $_SESSION["logged"]["email"]; ?>"><img src="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["profile_pic"];}?>" alt="profile_pic">
                        <?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?></a>
                </li>
                <li><a href="../index.php"><i class="fas fa-home"></i></a></li>
                <li><a href="#"><i class="fas fa-user"></i></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                <li><a href="#"><i class="fas fa-bell"></i></a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </div>
</div>
<div id="gridWrap">