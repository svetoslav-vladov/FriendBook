<?php
    require_once '../include/session.php';
    require_once "../include/pagelock.php";

    // header.php is head tag, meta, link etc.
    require_once "../include/header.php";
    //mainHeader is after login, top navigation
    require_once  "../include/mainHeader.php";

?>

<?php
//
////    require_once "../model/posts_dao.php";
////
////    echo '<pre>';
////    if(isset($_GET['id'])){
////        var_dump(getOwnPosts($_GET['id']));
////    }
////
////    echo '</pre>';
//?>


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
            <?php
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
                <img  id="cover_img" src="<?php echo $profileCover; ?>" alt="user cover picture">
            </div>
            <?php
                if(isset($_GET["id"]) && $_GET["id"] != $_SESSION["logged"]["id"]){
                    ?>
                    <div id="userPictrue">
                        <img  id="cover_img" src="<?php echo $profilePic; ?>" alt="user profile picture">
                        <p><?php echo $userName; ?></p>
                    </div>
                    <?php
                }
            ?>

            <div id="profileUserNav">
                <ul>
                    <li><a href="#">Timeline</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Friends</a></li>
                    <li><a href="#">Photos</a></li>
                </ul>
            </div>
        </div>
        <div class="post-container">

            <?php
                require_once "../include/modules/post-mod.php";
                require_once "../model/comments_dao.php";
            ?>

            <div id="newsfeed">
                <?php

                foreach ($allPosts as $post) { ?>
                    <div class="post">
                        <div class="post-header">
                            <span><img class="postProfPic" src="<?php echo $post['profile_pic']; ?>" alt="profile picture"></span>
                            <span class="post-owner"><?php echo $post["first_name"] . " " . $post["last_name"]; ?></span>
                            <span class="post-date"><?php echo $post['create_date']; ?></span>
                        </div>
                        <div class="post-desc">
                            <p>
                                <?php echo $post["description"]; ?>
                            </p>
                        </div>
                        <div>
                            <button  class="like-button" id="<?php echo "like".$post['post_id']; ?>">Like</button>
                        </div>
                        <div class="comments">
                            <div class="add-comment-div">
                                <form action="../controller/add_comment_controller.php" method="post">
                                    <textarea placeholder="Write comment..." class="comment-textarea" name="comment_description" id="" cols="80" rows=5"></textarea>
                                    <input type="hidden" name="post_id" value="<?php echo $post['post_id']?>">
                                    <input type="hidden" name="user_id" value="<?php echo $post['user_id']?>">
                                    <input type="submit" value="comment" name="add_comment">
                                </form>
                            </div>
                            <?php
                            $allCommentForCurrentPost = getAllCommentsForCurrentPost($post['post_id']);
                            foreach ($allCommentForCurrentPost as $comment) { ?>
                                <div class="comment-header">
                                    <span>
                                        <a href="profile.php?id=<?php echo $comment['owner_id']?>">
                                            <img class="commentProfPic" src="<?php echo $comment['profile_pic']; ?>" alt="profile picture">
                                        </a>
                                    </span>
                                    <span class="comment-owner">
                                        <a href="profile.php?id=<?php echo $comment['owner_id']?>" class="<?php echo ($comment['gender'] == 'female') ? "female" : "male"?>">
                                            <?php echo $comment["first_name"] . " " . $comment["last_name"]; ?>
                                        </a>
                                    </span>
                                    <div class="comment-date"><?php echo $comment['comment_date']?></div>
                                </div>
                                <div class="comment-desc">
                                    <p><?php echo $comment['description']; ?></p>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>

    </div>


<?php
    //mainFooter is the end of mainHeader
    require_once "../include/mainFooter.php";
    //footer is end of html parts
    require_once "../include/footer.php";
?>