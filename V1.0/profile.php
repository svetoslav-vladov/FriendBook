<?php
    require_once "./include/pagelock.php";
    require_once "./include/mainHeader.php";
?>
    <div id="left-col-grid">
        <div class="lwrap">
            <?php
            if($emailProfile !== $_SESSION["logged"]["email"]){
                ?>
                <div id="profile-pic">
                    <a href="./index.php?page=profile&email=<?php echo $emailProfile; ?>">
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
                <?php
            }
            else{
                ?>
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
                <?php
                require_once  "./include/modules/leftNav.php";
            }
            ?>

        </div>
    </div>
    <div id="content-grid">
        <div class="post-container">

            <?php
                if($emailProfile !== $_SESSION["logged"]["email"]){

                }
                else{
                    require_once "./include/modules/post-mod.php";
                }
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
                                            class="post-date"><?php echo date("d-m-Y / H:i:s", $val["created_date"]); ?></span>
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

<?php require_once "./include/mainFooter.php"; ?>