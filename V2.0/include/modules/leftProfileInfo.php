<div id="profile-pic">
    <a href="./profile.php">
        <img id="mini-profile-pic" src="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["profile_pic"];} ?>"
             alt="profile_pic" title=" <?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?>">
    </a>
    <div id="change_profile_pic">
        <i class="fas fa-edit"></i>
    </div>
</div>

<form id="upload_left_image" action="../controller/upload_images_controller.php" method="post" enctype="multipart/form-data">
    <label for="profile_image_upload"></label>
    <input type="file" id="profile_image_upload" name="profile_image_upload" accept="image/*">
    <button type="submit"></button>
</form>

<div id="userNameTag">
<?php

    if(isset($_SESSION['logged'])){

        if(isset($_SESSION['logged']["display_name"]) && strlen(trim($_SESSION['logged']["display_name"]," ")) > 0){

            echo $_SESSION['logged']["display_name"];
            echo "<div class='small_fullname'>(" . $_SESSION['logged']["full_name"] .")</div>";
        }
        else{
            echo $_SESSION['logged']["full_name"];
        }
    }

?>

</div>
