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
                        <span class="comment_date">8.4.2018 02:33</span>
                    </div>`);
                comments.append(commentDiv);
            }
            var commentCounter = $(`<span class="comment-counter" id="comment-counter${post_id}">${$("#comments"+post_id+" .comment").length}</span>`);
            $('#comment_btn'+post_id).append(commentCounter);
        }
    };
    request.open("GET", "../controller/add_comment_controller.php?post_id="+post_id, true);
    request.send();
}




function displayComments(post_id) {
    var comment_box = document.querySelector('#comment_box'+post_id);

    comment_box.style.height = "450px";
    $('#comment_btn_close'+post_id).show();
    $('#comment_box'+post_id).show();
    $('#comment_btn'+post_id).hide();
    comment_box.style.height = "450px";

}

function hideComments(post_id) {
    var comment_box = document.querySelector('#comment_box'+post_id);
    comment_box.style.height = "0";
    //$('#comment_box'+post_id).hide();
    $('#comment_btn'+post_id).show();
    $('#comment_btn_close'+post_id).hide();

}

