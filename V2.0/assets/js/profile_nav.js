
var timeline = document.querySelector('#timeline');
var about = document.querySelector('#about');
var photos = document.querySelector('#photos');

var photos_btn = document.querySelector('#photos_btn');
var about_btn = document.querySelector('#about_btn');
var timeline_btn = document.querySelector('#timeline_btn');

var upload_photos = document.querySelector('#upload_photos');

var user_id_nav = document.querySelector('#user_nav_id');

if(document.querySelector('#photos')){
    photos_btn.addEventListener('click', getAllPhotos);
}

if(document.querySelector('#about')){
    about_btn.addEventListener('click', get_about_info);
}

if(document.querySelector('#timeline_btn')){
    timeline_btn.addEventListener('click', show_feed);
}

if(document.querySelector('#photos')){
    upload_photos.addEventListener('onchange', addUserPhotos);
}

function getAllPhotos(e) {
    e.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open('get', '../controller/get_photos_controller.php?user_id='+user_id_nav.value);

    timeline.style.display = 'none';
    about.style.display = 'none';
    photos.style.display = 'block';
    xhr.onload = function () {

        console.log(this.responseText);
    };

    xhr.send();
}

function addUserPhotos(e) {
    e.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open('post', '../controller/add_photos_controller.php');
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    timeline.style.display = 'none';
    about.style.display = 'none';
    photos.style.display = 'block';
    xhr.onload = function () {

        console.log(this.responseText);
    };

    xhr.send('upload_photos=' + user_id_nav);
}

function show_feed(e) {
    e.preventDefault();

    timeline.style.display = 'block';
    about.style.display = 'none';
    photos.style.display = 'none';

}

function get_about_info(e) {
    e.preventDefault();

    timeline.style.display = 'none';
    about.style.display = 'block';
    photos.style.display = 'none';

}
