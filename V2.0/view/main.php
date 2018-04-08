<?php
    require_once '../include/session.php';
    require_once "../include/pagelock.php";
    $logged_user_id = $_SESSION['logged']['id'];
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
        require_once "../model/comments_dao.php";
        ?>
        <script>
            $(document).ready(function () {
                getLikedPost();
            });
        </script>
        <?php require_once '../include/modules/news_feed_posts.php'; ?>
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