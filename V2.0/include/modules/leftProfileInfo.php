<div id="profile-pic">
    <a href="./profile.php">
        <img id="mini-profile-pic" src="<?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["profile_pic"];} ?>"
             alt="profile_pic" title=" <?php if(isset($_SESSION["logged"])){ echo $_SESSION["logged"]["first_name"] . " " . $_SESSION["logged"]["last_name"] ;} ?>">
    </a>
</div>
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
