var loading_gif = $('<img class="loading-gif" src="../assets/images/ajax-loading-c4.gif">');
function likePost(post_id) {
    var request = new XMLHttpRequest();
    request.open('post', '../controller/like_post_controller.php');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            $('#like-container'+post_id).append(loading_gif);
            setTimeout(function(){
                loading_gif.remove();
                isLiked(post_id);
            },250);
        }
    };
    request.send("post_id=" + post_id);
}
function dislikePost(post_id) {
    var request = new XMLHttpRequest();
    request.open('post', '../controller/dislike_post_controller.php');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            $('#like-container'+post_id).append(loading_gif);
            setTimeout(function(){
                loading_gif.remove();
                isLiked(post_id);
            },250);
        }
    };
    request.send("post_id=" + post_id);
}
function isLiked(post_id) {
    var likeButton = $(`<button class="like-button" id="like${post_id}"><i class="fas fa-thumbs-up"></i></button>`);
    var dislikeButton = $(`<button class="dislike-button" id="dislike${post_id}"><i class="fa fa-thumbs-down"></i></button>`);
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            likeButton.click(function () {
                likePost(post_id);
                $('#counter'+post_id).remove();
                $(this).remove();
            });
            dislikeButton.click(function () {
                dislikePost(post_id);
                $('#counter'+post_id).remove();
                $(this).remove();
            });
            getCountLikes(post_id);
            if (this.responseText == 1) {
                $('#like-container'+post_id).append(dislikeButton);
            }
            else {
                $('#like-container'+post_id).append(likeButton);
            }
        }
    };
    req.open("GET", "../controller/like_post_controller.php?post_id="+post_id);
    req.send();
}
function getCountLikes(post_id) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var likeCounter = $(`<span class="likes_counter" id="counter${post_id}">${this.responseText}</span>`);
            $('#like'+post_id).append(likeCounter);
            $('#dislike'+post_id).append(likeCounter);
        }
    };
    req.open("GET", "../controller/likeCounter_controller.php?post_id="+post_id);
    req.send();
}