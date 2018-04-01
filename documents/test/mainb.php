<?php
require_once "./include/pagelock.php";
?>
<div id="top">
    <div class="center-content">
        <div id="search">
            <a href="./index.php"><img src="#" alt="friendbook logo"></a>
            <input type="text" name="search" placeholder="Search for someone...">
            <button>Search</button>
        </div>
        <nav>
            <ul id="mini-nav">
                <li>
                    <a href="#"><img src="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["profile_pic"];}?>" alt="profile_pic">
                        <?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?></a>
                </li>
                <li><a href="#">Home</a></li>
            </ul>
            <ul id="icon-nav">
                <li><a href="#"><img src="#" alt="friend alert"></a></li>
                <li><a href="#"><img src="#" alt="msg alert"></a></li>
                <li><a href="#"><img src="#" alt="news alert"></a></li>
                <li><a href="index.php?page=logout"><img src="#" alt="logout"></a></li>
            </ul>
        </nav>
    </div>
</div>
<div id="gridWrap">
    <div id="left-col-grid">
        <div class="lwrap">
            <div id="profile-pic">
                <img id="mini-profile-pic" src="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["profile_pic"];} ?>" alt="profile_pic">
            </div>
            <div id="userNameTag">
                <?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?>
            </div>
            <div id="user-nav">
                <ul>
                    <li><a href="#">News Feed</a></li>
                    <li><a href="#">Profile page</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">friends</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="content-grid">cen</div>
    <div id="right-col-grid">right</div>
</div>
