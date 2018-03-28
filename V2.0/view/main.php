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
        <?php
            require_once  "../include/modules/leftProfileInfo.php";
            require_once  "../include/modules/leftNav.php";
        ?>
    </div>
</div>
<div id="content-grid">
    <div class="post-container">
        <?php
        require_once "../include/modules/post-mod.php";
        require_once "../model/posts_dao.php";
        require_once "../model/comments_dao.php";
        ?>
        <div id="newsfeed">
            <?php
            $allPosts = getAllPosts();
            foreach ($allPosts as $post) {?>
            <div class="post">
                <div class="post-header">
                    <span><img class="postProfPic" src="<?php echo $post['profile_pic']; ?>" alt="profile picture"></span>
                    <span class="post-owner"><a href="profile.php?id=<?php echo $post['user_id']?>" class="<?php echo ($post['gender'] == 'female') ? "female" : "male"?>"><?php echo $post["first_name"] . " " . $post["last_name"]; ?></a></span>
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
                            <textarea placeholder="Write comment..." class="comment-textarea" name="comment_description" rows="5"></textarea>
                            <input type="hidden" name="post_id" value="<?php echo $post['post_id']?>">
                            <input type="submit" value="comment" name="add_comment">
                        </form>
                    </div>
                    <?php
                    $allCommentForCurrentPost = getAllCommentsForCurrentPost($post['post_id']);
                    foreach ($allCommentForCurrentPost as $comment) { ?>
                        <div class="comment-header">
                            <span><a href="profile.php?id=<?php echo $comment['owner_id']?>"><img class="commentProfPic" src="<?php echo $comment['profile_pic']; ?>" alt="profile picture"></a></span>
                            <span class="comment-owner"><a href="profile.php?id=<?php echo $comment['owner_id']?>" class="<?php echo ($comment['gender'] == 'female') ? "female" : "male"?>"><?php echo $comment["first_name"] . " " . $comment["last_name"]; ?></a></span>
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