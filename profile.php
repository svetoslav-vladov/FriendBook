<?php
    require_once "./include/mainHeader.php";
?>
    <div id="left-col-grid">
        <div class="lwrap">
            <div id="profile-pic">
                <a href="./index.php?page=profile&email=<?php echo $_SESSION["logged"]["email"]; ?>">
                    <img id="mini-profile-pic" src="<?php if (isset($_GET["email"])) {
                        echo $usersDB[$emailProfile]["profile_pic"];
                    }?>" alt="profile_pic">
                </a>
            </div>
            <div id="userNameTag">
                <?php if (isset($_GET["email"])) {
                    echo $usersDB[$emailProfile]["first_name"] . " " . $usersDB[$emailProfile]["last_name"];
                } ?>
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
        <div class="post-container">
            <?php
                require_once "./include/modules/post-mod.php";
            ?>
            <div id="newsfeed">
                <?php

                foreach ($postsDB as $id => $post) {
                    if ($emailProfile === $id) {
                        foreach ($post as $key => $val) {
                            ?>
                            <div class="post">
                                <div class="post-header">
                                    <span><img class="postProfPic"
                                               src="<?php echo $usersDB[$val["owner"]]["profile_pic"]; ?>"
                                               alt="profile picture"></span>
                                    <span
                                            class="post-owner"><?php echo $usersDB[$val["owner"]]["first_name"] . " " . $usersDB[$val["owner"]]["last_name"]; ?></span>
                                    <span
                                            class="post-date"><?php echo date("d-m-Y / h:m:i", $val["created_date"]); ?></span>
                                </div>
                                <div class="post-desc">
                                    <p>
                                        <?php echo $val["desc"]; ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>

    </div>
    <div id="right-col-grid">
        <div class="lwrap">
            <div class="proposed-container">
                <h3>Module</h3>
                <p>Empty...</p>
            </div>
        </div>
    </div>

<?php require_once "./include/mainFooter.php"; ?>