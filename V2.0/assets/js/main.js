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
                    var notFound = $('<li class="not-found">Not found!</li>');
                    usersList.append(notFound);
                    return;
                }
                var users = JSON.parse(this.responseText);
                usersList.empty();
                for (var user of users) {
                    var li = $(`<li>
                                <a href="profile.php?id=${user['id']}" class="${(user['gender'] == 'male') ? 'male' : 'female'}">
                                    <img class=commentProfPic src=${user['profile_pic']}>
                                    <span>${user['first_name']} ${user['last_name']}</span>
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

// function for display all liked post by logged user
function getLikedPost() {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var result = JSON.parse(this.responseText);

        }
    };
    req.open("GET", "../controller/get_liked_posts_controller.php");
    req.send();
}