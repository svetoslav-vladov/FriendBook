<div id="newsfeed">
    <?php
    $allPosts = getAllPosts();
    foreach ($allPosts as $post) {?>
        <div class="post">
            <div class="user_info">
                <div class="icon"><img src="<?php echo $post['profile_pic']; ?>" alt="icon" class="img-rounded center-block"></div>
                <div class="name"><a href="profile.php?id=<?php echo $post['user_id']?>" class="<?php echo ($post['gender'] == 'female') ? "female" : "male"?>"><?php echo $post["first_name"] . " " . $post["last_name"]; ?></a></div>
                <div class="date"><?php echo $post['create_date']; ?></div>
            </div>
            <div class="description">
                <p><?php echo $post["description"]; ?></p>
            </div>
            <div class="post_navigation">
                <div class="like-container" id="like-container<?php echo $post['post_id']?>">
                    <script>
                        $(document).ready(function () {
                            isLiked(<?php echo $post['post_id']?>);
                        });
                    </script>
                </div>
                <div class="comments-buttons">
                    <button onclick="displayComments(<?php echo $post['post_id']?>)" type="button" class="display_comments" name="button" id="comment_btn<?php echo $post['post_id']?>">COMMENTS</button>
                    <button onclick="hideComments(<?php echo $post['post_id']?>)" type="button" name="button" class="comment_btn_close" id="comment_btn_close<?php echo $post['post_id']?>">CLOSE COMMENTS</button>
                </div>
            </div>
            <div class="comments_box" id="comment_box<?php echo $post['post_id']?>">

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
            <div class="add-comment-div">
                <input type="text" placeholder="Write comment..." class="comment-textarea<?= $post['post_id'] ?>" name="comment_description">
                <input type="hidden" name="post_id" value="<?php echo $post['post_id']?>">
                <button id="add<?php echo $post['post_id']?>" class="mini-btn">add</button>
            </div>
        </div>
    <?php }?>
</div>