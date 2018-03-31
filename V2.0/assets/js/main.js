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