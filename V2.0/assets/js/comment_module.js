function getComments(post_id) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            $('#comment-counter'+post_id).remove();
            var result = JSON.parse(this.responseText);
            var comments = $('#comments'+post_id);
            for(var comment of result) {
                var commentDiv = $(`
                <div class="comment comment-${post_id}">
                        <span class="user_pic">
                            <a href="profile.php?id=${comment['owner_id']}">
                                <img src=${comment['profile_pic']} alt="icon" class="img-rounded center-block"
                                 alt="${comment['first_name']} ${comment['last_name']}" title="${comment['first_name']} ${comment['last_name']}">
                            </a>
                        </span>
                        
                        <span class="comment_desc">
                            <p>${comment['description']}</p>
                        </span>
                        <a href="profile.php?id=${comment['owner_id']}" class="comment_owner ${(comment['gender'] == 'male') ? 'male' : 'female'}">
                            <p>${(comment['display_name'] == null) ? (comment['first_name'] + " " + comment['last_name']) : comment['display_name']}</p>
                        </a>
                        <span class="comment_date">${comment['comment_date']}</span>
                    </div>`);
                comments.append(commentDiv);
            }
            var commentCounter = $(`<span class="comment-counter" id="comment-counter${post_id}">${$("#comments"+post_id+" .comment").length}</span>`);
            if($("#comments"+post_id+" .comment").length == 0) {
                $('#comment_btn'+post_id).attr('disabled', true);
                $('#comment_btn'+post_id).append(commentCounter);
            }else {
                $('#comment_btn'+post_id).append(commentCounter);
                $('#comment_btn'+post_id).attr('disabled', false);
            }

        }
    };
    request.open("GET", "../controller/add_comment_controller.php?post_id="+post_id, true);
    request.send();
}

function displayComments(post_id) {
    var comment_box = document.querySelector('#comment_box'+post_id);
    comment_box.style.height = "450px";
    $('#comment_btn_close'+post_id).show();
    $('#comment_btn'+post_id).hide();

}

function hideComments(post_id) {
    var comment_box = document.querySelector('#comment_box'+post_id);
    comment_box.style.height = "0";

    $('#comment_btn'+post_id).show();
    $('#comment_btn_close'+post_id).hide();

}

