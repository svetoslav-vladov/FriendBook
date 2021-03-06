<?php
    require_once '../include/session.php';
    require_once "../include/pagelock.php";

    // header.php is head tag, meta, link etc.
    require_once "../include/header.php";
    //mainHeader is after login, top navigation
    require_once  "../include/mainHeader.php";

    // calling daos for function
    require_once "../model/users_dao.php";
    require_once "../model/posts_dao.php";

    if(isset($_GET['id'])){
        //var_dump(getUserInfo(htmlentities($_GET['id'])));
        $userIdInfo = getUserInfo(htmlentities($_GET['id']));
        $profilePic = $userIdInfo["profile_pic"];
        $profileCover = $userIdInfo["profile_cover"];
        $userName = $userIdInfo["first_name"] . " " . $userIdInfo["last_name"];
        $allPosts = getOwnPosts($_GET['id']);
    }
    else{
        $profilePic = $_SESSION["logged"]["profile_pic"];
        $profileCover = $_SESSION["logged"]["profile_cover"];
        $allPosts = getOwnPosts($_SESSION["logged"]["id"]);
    }
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
        <div id="profileHolder">
            <div id="cover">
                <img  id="cover_img" src="<?php echo $profileCover; ?>" alt="user cover picture">
                <?php
                if(isset($_GET["id"]) && $_GET["id"] != $_SESSION["logged"]["id"]){
                    ?>
                    <div id="userPictrue">
                        <img  id="other_cover_img" src="<?php echo $profilePic; ?>" alt="user profile picture">
                        <div class="profile-mini-name"><?php echo $userName; ?></div>
                    </div>
                    <?php
                }

                    if (!isset($_GET["id"])){
                        ?>
                            <div id="change_cover_pic">
                                <i class="fas fa-edit"></i>
                            </div>
                            <form id="cover_image_form" action="../controller/profile_img_controller.php" method="post" enctype="multipart/form-data">
                                <label for="cover_image"></label>
                                <input type="file" id="cover_image" name="cover_image" accept="image/*">
                                <button type="submit"></button>
                            </form>
                        <?php
                    }else{
                        ?>

                        <?php
                    }

                ?>
            </div>
            <?php require_once '../include/profile_nav.php'; ?>
        </div>
        <div class="space"></div>

        <div id="timeline">
            <?php

            if(isset($_GET['id']) && $_GET['id'] === $_SESSION['logged']['id']){
                require_once '../include/modules/post-mod.php';
            }
            elseif (isset($_GET['id'])){

            }
            elseif(isset($_SESSION['logged']['id'])){

                require_once '../include/modules/post-mod.php';
            }
            ?>
            <?php require_once '../include/modules/profile_feed_posts.php'; ?>
        </div>
        <div id="about">
            about
        </div>
        <div id="photos">
			<?php
            if(isset($_GET['id']) && $_GET['id'] === $_SESSION['logged']['id']){
                ?>
			<div id="input_holder">
				<input type="file" id="upload_photos" class="btn-input" accept="image/*">
			</div>
				<?php
            }
            elseif (isset($_GET['id'])){

            }
            elseif(isset($_SESSION['logged']['id'])){
				?>
				<div id="input_holder">
					<input type="file" id="upload_photos" class="btn-input" accept="image/*">
				</div>
				<?php
            }
            ?>
            
            <div id="image_list">

            </div>

        </div>
    </div>




<?php
    //mainFooter is the end of mainHeader
    require_once "../include/mainFooter.php";
    //footer is end of html parts
    require_once "../include/footer.php";
?>