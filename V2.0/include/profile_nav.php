<div id="profileUserNav">
    <ul>
        <li><a href="#"><span class="nav-icon"><i class="fas fa-list nav-icon"></i></span>Timeline</a></li>
        <li><a href="#"><span class="nav-icon"><i class="fas fa-info-circle nav-icon"></i></span>About</a></li>
        <li><a href="./friends.php?id=<?php if(!isset($_GET['id'])){ echo $_SESSION['logged']['id'];}
            else{echo $_GET['id']; } ?>"><span class="nav-icon"><i class="fas fa-users nav-icon"></i></span>Friends</a></li>
        <li><a href="#"><span class="nav-icon"><i class="fas fa-images nav-icon"></i></span>Photos</a></li>
    </ul>
</div>