function getComments(post_id) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var result = JSON.parse(this.responseText);
            var comments = $('#comments'+post_id);
            for(var comment of result) {
                var commentDiv = $(`
                <div class="comment comment-${post_id}">
                        <span class="user_pic">
                            <a href="profile.php?id=${comment['owner_id']}">
                                <img src=${comment['profile_pic']} alt="icon" class="img-rounded center-block">
                            </a>
                        </span>
                        <span class="comment-owner">${comment['first_name']} ${comment['last_name']}</span>
                        <div class="comment_desc">
                            <p>${comment['description']}</p>
                        </div>
                    </div>`);
                comments.append(commentDiv);
            }
            var commentCounter = $(`<span class="comment-counter">${$("#comments"+post_id+" .comment").length}</span>`);
            $('#comment_btn'+post_id).append(commentCounter);
        }
    };
    request.open("GET", "../controller/add_comment_controller.php?post_id="+post_id, true);
    request.send();
}

function displayComments(post_id) {
    $('#comment_btn_close'+post_id).show();
    $('#comment_box'+post_id).show();
    $('#comment_btn'+post_id).hide();
}

function hideComments(post_id) {
    $('#comment_box'+post_id).hide();
    $('#comment_btn'+post_id).show();
    $('#comment_btn_close'+post_id).hide();
}

