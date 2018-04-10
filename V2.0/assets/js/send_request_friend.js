var friend_loading_gif = $('<img class="friend-loading-gif" src="../assets/images/ajax-loading-c4.gif">');

function sendRequest(friend_id) {
    var request = new XMLHttpRequest();
    request.open('post', '../controller/send_request_friend.php');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            $('#friend'+friend_id).append(friend_loading_gif);
            setTimeout(function(){
                friend_loading_gif.remove();
                isSendRequest(friend_id);
            },250);
        }
    };
    request.send("friend_id=" + friend_id);
}

function stopRequest(friend_id) {
    var request = new XMLHttpRequest();
    request.open('post', "../controller/send_request_friend.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            $('#friend'+friend_id).append(friend_loading_gif);
            setTimeout(function(){
                friend_loading_gif.remove();
                isSendRequest(friend_id);
            },250);
        }
    };
    request.send("friendId=" + friend_id);
}

function isSendRequest(friend_id) {
    var sendButton = $(`<button class="add-button" id="send${friend_id}"><i class="fas fa-user-plus"></i> send request</button>`);
    var stopButton= $(`<button class="delete-button" id="stop${friend_id}"><i class="fas fa-ban"></i> cancel request</button>`);
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText == 1) {
                checkRequest();
                $('#friend'+friend_id).append(stopButton);
            }
            else {
                $('#friend'+friend_id).append(sendButton);
            }
            sendButton.click(function () {
                sendRequest(friend_id);
                $(this).remove();
            });
            stopButton.click(function () {
                stopRequest(friend_id);
                $(this).remove();
            });
        }
    };
    req.open("GET", "../controller/send_request_friend.php?friend_id="+friend_id);
    req.send();
}

checkRequest();
//Тази функция не бачка.. незнам защо :@ часът е 3:25 лягам си
function checkRequest() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(JSON.parse(this.responseText));
            console.log(this.responseText);
        }
        request.open("GET", "../controller/checkRequest_controller.php");
        request.send();
    }
}