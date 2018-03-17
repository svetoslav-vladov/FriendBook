<?php
    require_once "./include/pagelock.php";
?>



<div id="gridWrap">
    <div id="left-col-grid">
        <div id="profile-pic"></div>
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
    <div id="top-grid">
        <div id="search">
            <a href="./index.php"><img src="#" alt="friendbook logo"></a>
            <input type="text" name="search" placeholder="Search for someone...">
            <button>Search</button>
        </div>
        <nav>
            <ul>
                <li><a href="#"><img src="#" alt="friend alert"></a></li>
                <li><a href="#"><img src="#" alt="msg alert"></a></li>
                <li><a href="#"><img src="#" alt="news alert"></a></li>
                <li><a href="index.php?page=logout"><img src="#" alt="logout"></a></li>
            </ul>
        </nav>
    </div>
    <div id="content-grid">cen</div>
    <div id="right-col-grid">
        right
        <div class="proposed-container">
            <h3>Proposed users</h3>
            <ul class="proposed-users">
            <?php
                require_once 'include/config.php';
                foreach ($usersDB as $user) { ?>
                    <?php if ($user['email'] != $_SESSION['logged']['email']) { ?>
                        <li><a href="index.php?page=<?=$user['email']?>"><img width="50" src="uploads/default_profile.png" alt=""><?php echo $user['first_name'] . " " . $user['last_name']?></a></li>
                <?php
                    }
                }  ?>
            </ul>
        </div>
    </div>
</div>
