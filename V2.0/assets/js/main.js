function getComments(post_id) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var result = JSON.parse(this.responseText);
            var comments = $('#comments'+post_id);
            for(var comment of result) {
                var commentDiv = $("<div class='comment'></div>");
                var commentHeader = $("<div class='comment-header'></div>");
                var commentProfPic = $(`<span>
                                            <a href="profile.php?id=${comment['owner_id']}">
                                                <img class=commentProfPic src=${comment['profile_pic']}>
                                            </a></span>`);
                var commentOwner = $(`<span class="comment-owner">
                                            <a href="profile.php?id=${comment['owner_id']}" class="${(comment['gender'] == 'female') ? 'female' :'male'}">
                                                ${comment['first_name'] + " " + comment['last_name']}
                                        </a></span>`);
                var commentDate = $(`<div class="comment-date">${comment['comment_date']}</div>`);
                var commentDesc = $(`<div class="comment-desc">${comment['description']}</div>`);
                commentHeader.append(commentProfPic).append(commentOwner).append(commentDate);
                commentDiv.append(commentHeader).append(commentDesc);
                comments.append(commentDiv);
            }
            var commentCounter = $(`<div class="comment-counter">Comments: ${$("#comments"+post_id+" .comment").length}</div>`);
            comments.prepend(commentCounter);
        }
    };
    request.open("GET", "../controller/add_comment_controller.php?post_id="+post_id, true);
    request.send();
}

function searchUser(str) {
    var userListDiv = $('.users-result');
    var usersList = $('.users-list');
    usersList.empty();
    if (str.length === 0) {
        usersList.empty();
        userListDiv.hide();
        return;
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                userListDiv.show();
                if (this.responseText === 'Not found!') {
                    usersList.empty();
                    var notFound = $('<li>Not found!</li>');
                    usersList.append(notFound);
                    return;
                }
                var users = JSON.parse(this.responseText);
                usersList.empty();
                for (var user of users) {
                    var li = $(`<li>
                                <a href="profile.php?id=${user['id']}" class="${(user['gender'] == 'male') ? 'male' : 'female'}">
                                    <img class=commentProfPic src=${user['profile_pic']}>
                                    ${user['first_name']} ${user['last_name']}
                                </a>
                              </li>`);
                    usersList.append(li);
                    userListDiv.append(usersList);
                }
                $('.users-list li a').click(function () {
                    userListDiv.hide();
                });
            }
        };
        xmlhttp.open("GET", "../controller/search_users_controller.php?search="+str, true);
        xmlhttp.send();
    }
}
var loading_gif = $('<img class="loading-gif" src="../assets/images/loading.gif">');

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
            },200);
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
            },200);
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
            var likeCounter = $(`<span class="like-counter" id="counter${post_id}">likes: ${this.responseText}</span>`);
            $("#like_counter"+post_id).append(likeCounter);
            // $('#like'+post_id).append(likeCounter);
            // $('#dislike'+post_id).append(likeCounter);
        }
    };
    req.open("GET", "../controller/likeCounter_controller.php?post_id="+post_id);
    req.send();
}


// function for display all liked post by logged user
function getLikedPost() {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var result = JSON.parse(this.responseText);
            console.log(result);
        }
    };
    req.open("GET", "../controller/get_liked_posts_controller.php");
    req.send();
}