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
        <div id="profile-pic">
            <a href="../include/profile.php?id=<?php echo $_SESSION['logged']['id']; ?>">
                <img id="mini-profile-pic" src="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["profile_pic"];} ?>" alt="profile_pic">
            </a>
        </div>
        <div id="userNameTag">
            <?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?>
        </div>
        <?php
            require_once  "../include/modules/leftNav.php";
        ?>
    </div>
</div>
<div id="content-grid">
    <div class="post-container">
        <?php
            require_once "../include/modules/post-mod.php";
        ?>
        <div id="newsfeed">
            posts
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

