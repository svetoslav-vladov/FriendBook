<div id="profile-pic">
    <a href="./profile.php">
        <img id="mini-profile-pic" src="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["profile_pic"];} ?>"
             alt="profile_pic" title="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?>">
    </a>
</div>
<div id="userNameTag">
    <?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?>
</div>