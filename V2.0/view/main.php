<?php
    require_once '../include/session.php';
    require_once "../include/pagelock.php";
    $logged_user_id = $_SESSION['logged']['id'];
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
        <script>
            $(document).ready(function () {
                getLikedPost();
            });
        </script>
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
                    <p><?php echo $post["description"]; ?></p>
                    <div class="like-container" id="like-container<?php echo $post['post_id']?>">
                        <script>
                            $(document).ready(function () {
                                isLiked(<?php echo $post['post_id']?>);
                            });
                        </script>
                    </div>
                </div>
                <div class="comment-input">
                    <div class="add-comment-div">
                        <input type="text" placeholder="Write comment..." class="comment-textarea<?= $post['post_id'] ?>" name="comment_description">
                        <input type="hidden" name="post_id" value="<?php echo $post['post_id']?>">
                        <button id="add<?php echo $post['post_id']?>" class="mini-btn">add</button>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        /*this function load all comments in current post with AJAX request*/
                        getComments(<?php echo $post['post_id'] ?>);
                    });
                </script>
                <div class="comments" id="comments<?php echo $post['post_id'] ?>">
                    <script>
                        $(document).ready(function () {
                            var postId = "<?php echo $post['post_id'] ?>";
                            var addButton = $('#add'+postId);
                            var commentDesc = $('.comment-textarea'+postId);
                            var request = new XMLHttpRequest();
                            addButton.click(function () {
//                                validation for text area is empty or contains white spaces
                                if (!$.trim($(".comment-textarea"+postId).val())) {
                                    alert("You can't create empty comment, Please fill the post!");
                                }
                                else if(commentDesc.val().length > 1500) {
                                    alert("Your comment contains too many characters! Please enter no more than 1500 characters.");
                                }
                                else {
                                    $("#comments"+postId).empty();
                                    request.open('post', '../controller/add_comment_controller.php');
                                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    request.onreadystatechange = function() {
                                        if (this.readyState === 4 && this.status === 200) {
                                            getComments(postId);
                                        }
                                    };
                                    request.send("comment_description=" + commentDesc.val() + "&post_id=" + postId);
                                    commentDesc.val('');
                                }
                            });
                        });
                    </script>
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