<div id="profileUserNav">
    <ul>
        <li><a href="#" id="timeline_btn"><span class="nav-icon"><i class="fas fa-list nav-icon"></i></span>Timeline</a></li>
        <li><a href="#" id="about_btn"><span class="nav-icon"><i class="fas fa-info-circle nav-icon"></i></span>About</a></li>
        <li><a href="./friends.php?id=<?php if(!isset($_GET['id'])){ echo $_SESSION['logged']['id'];}
            else{echo $_GET['id']; } ?>"><span class="nav-icon"><i class="fas fa-users nav-icon"></i></span>Friends</a></li>
        <li><a href="#" id="photos_btn"><span class="nav-icon"><i class="fas fa-images nav-icon"></i></span>Photos</a></li>
        <input type="hidden" name="user_id" id="user_nav_id" value="<?php if(!isset($_GET['id'])){ echo $_SESSION['logged']['id'];}
        else{echo $_GET['id']; } ?>">
    </ul>
</div>