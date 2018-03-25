<div class="proposed-container">
    <h3>Suggested for you</h3>
    <ul class="proposed-users">
        <?php
        require_once 'include/config.php';
        foreach ($usersDB as $user) { ?>
            <?php if ($user['email'] != $_SESSION['logged']['email']) { ?>
                <li>
                    <a href="index.php?page=profile&email=<?=$user['email']?>"><img width="50" src="uploads/default_profile.png" alt=""><?php echo $user['first_name'] . " " . $user['last_name']?></a>
                    <button class="add-friend">Add friend</button>
                </li>
                <?php
            }
        }  ?>
    </ul>
</div>