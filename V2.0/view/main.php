<?php
    require_once '../include/session.php';
    require_once "../include/pagelock.php";

    // header.php is head tag, meta, link etc.
    require_once "../include/header.php";
    //mainHeader is after login, top navigation
    require_once  "../include/mainHeader.php";
?>

<div id="left-col-grid">
    <div class="lwrap">
        <?php
            require_once  "../include/modules/leftProfileInfo.php";
            require_once  "../include/modules/leftNav.php";
        ?>
    </div>
</div>
<div id="content-grid">
    <div class="post-container">
        <?php
        require_once "../include/modules/post-mod.php";
        require_once "../model/posts_dao.php";
        ?>
        <div id="newsfeed">
            <?php
            $allPosts = getAllPosts();
            foreach ($allPosts as $post) { ?>
            <div class="post">
                <div class="post-header">
                    <span><img class="postProfPic" src="<?php echo $post['profile_pic']; ?>" alt="profile picture"></span>
                    <span class="post-owner"><?php echo $post["first_name"] . " " . $post["last_name"]; ?></span>
                    <span class="post-date"><?php echo $post['create_date']; ?></span>
                </div>
                <div class="post-desc">
                    <p>
                        <?php echo $post["description"]; ?>
                    </p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>

</div>
<div id="right-col-grid">
    <div class="lwrap">
        <div class="suggested_users">
            <?php require_once '../include/modules/suggested_users.php'?>
        </div>
    </div>
</div>
<?php
    //mainFooter is the end of mainHeader
    require_once "../include/mainFooter.php";
    //footer is end of html parts
    require_once "../include/footer.php";
?>

