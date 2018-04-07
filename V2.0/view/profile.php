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
                <img  id="cover_img" src="<?php echo $profileCover; ?>" alt="user cover picture">

            <?php
                if(isset($_GET["id"]) && $_GET["id"] != $_SESSION["logged"]["id"]){
                    ?>
                    <div id="userPictrue">
                        <img  id="cover_img" src="<?php echo $profilePic; ?>" alt="user profile picture">
                        <div class="profile-mini-name"><?php echo $userName; ?></div>
                    </div>
                    <?php
                }
            ?>
            </div>

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
                if (isset($_GET['id'])) {
                    $current_profile = $_GET['id'];
                    if ($current_profile == $_SESSION['logged']['id']) { ?>
                        <form id="post-form" class="shadow-box" action="../controller/add_post_controller.php" method="post">
                            <label for="post_module">Make post</label>
                            <textarea id="post_module" class="shadow-box" cols="62" rows="10" name="desc"></textarea>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['logged']['id']?>">
                            <input class="mini-btn shadow-box" type="submit" value="post" name="add_post">
                            <div class="clear"></div>
                        </form>
                   <?php  }
                }
            ?>

            <?php
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
                        <div class="comment-input">
                            <div class="like-container" id="like-container<?php echo $post['post_id']?>">
                                <script>
                                    $(document).ready(function () {
                                        isLiked(<?php echo $post['post_id']?>);
                                    });
                                </script>
                            </div>
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
                                /*validation for text area is empty or contains only white spaces*/
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


<?php
    //mainFooter is the end of mainHeader
    require_once "../include/mainFooter.php";
    //footer is end of html parts
    require_once "../include/footer.php";
?>