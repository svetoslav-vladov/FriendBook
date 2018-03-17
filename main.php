<?php
    require_once "./include/pagelock.php";
?>
<div id="top">
    <div class="center-content">
        <div id="search">
            <a href="./index.php"><img src="./assets/images/mini-logo.png" alt="friendbook logo"></a>
            <input type="text" name="search" placeholder="Search for someone...">
            <button>Search</button>
        </div>
        <nav>
            <ul id="icon-nav">
                <li class="profile-btn">
                    <a href="#"><img src="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["profile_pic"];}?>" alt="profile_pic">
                        <?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?></a>
                </li>
                <li><a href="index.php"><i class="fas fa-home"></i></a></li>
                <li><a href="#"><i class="fas fa-user"></i></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                <li><a href="#"><i class="fas fa-bell"></i></a></li>
                <li><a href="index.php?page=logout"><i class="fas fa-sign-out-alt"></i></a></li>
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
    <div id="content-grid">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda, cum, distinctio dolorem est et incidunt minus natus perspiciatis ratione recusandae temporibus voluptas voluptate. Aut natus omnis recusandae reprehenderit suscipit!</p>
    </div>
    <div id="right-col-grid">
        <div class="lwrap">
            <div class="proposed-container">
                <h3>Suggested for you</h3>
                <ul class="proposed-users">
                <?php
                    require_once 'include/config.php';
                    foreach ($usersDB as $user) { ?>
                        <?php if ($user['email'] != $_SESSION['logged']['email']) { ?>
                            <li>
                                <a href="index.php?page=profile&email=<?=$user['email']?>"><img width="50" src="uploads/default_profile.png" alt=""><?php echo $user['first_name'] . " " . $user['last_name']?></a>
                                <button class="add-friend">Add friend</button>
                            </li>
                    <?php
                        }
                    }  ?>
                </ul>
            </div>
        </div>
    </div>
</div>
