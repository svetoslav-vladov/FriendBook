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