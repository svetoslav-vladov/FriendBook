<div class="proposed-container">
    <h3>Suggested for you</h3>
    <ul class="proposed-users">
        <?php
        require_once '../model/users_dao.php';
        $suggested_users = getSuggestedUsers($_SESSION['logged']['id']);
        foreach ($suggested_users as $user) { ?>
                <li>
                    <a href="../include/profile.php?id=<?=$user['id']?>"><img src="<?php echo $user['profile_pic']?>" alt="<?php echo $user['first_name'] . " " . $user['last_name']?>"><?php echo $user['first_name'] . " " . $user['last_name']?></a>
                    <button class="add-friend">Add friend</button>
                </li>
        <?php } ?>
    </ul>
</div>

