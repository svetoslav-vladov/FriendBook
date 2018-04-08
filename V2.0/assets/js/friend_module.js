var friend_loading_gif = $('<img class="friend-loading-gif" src="../assets/images/ajax-loading-c4.gif">');
function addFriend(friend_id) {
    var request = new XMLHttpRequest();
    request.open('post', '../controller/addFriend_controller.php');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            $('#'+friend_id).append(friend_loading_gif);
            setTimeout(function(){
                friend_loading_gif.remove();
                isFriend(friend_id);
            },250);
        }
    };
    request.send("friend_id=" + friend_id);
}
function deleteFriend(friend_id) {
    var request = new XMLHttpRequest();
    request.open('post', '../controller/deleteFriend_controller.php');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            $('#'+friend_id).append(friend_loading_gif);
            setTimeout(function(){
                friend_loading_gif.remove();
                isFriend(friend_id);
            },250);
        }
    };
    request.send("friend_id=" + friend_id);
}

function isFriend(friend_id) {
    var addFriendButton = $(`<button class="add-button" id="add${friend_id}"><i class="fas fa-user-plus"></i> add friend</button>`);
    var deleteFriendButton = $(`<button class="delete-button" id="delete${friend_id}"><i class="fas fa-ban"></i> delete friend</button>`);
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            addFriendButton.click(function () {
                addFriend(friend_id);
                $(this).remove();
            });
            deleteFriendButton.click(function () {
                deleteFriend(friend_id);
                $(this).remove();
            });
            if (this.responseText == 1) {
                $('#'+friend_id).append(deleteFriendButton);
            }
            else {
                $('#'+friend_id).append(addFriendButton);
            }
        }
    };
    req.open("GET", "../controller/addFriend_controller.php?friend_id="+friend_id);
    req.send();
}
