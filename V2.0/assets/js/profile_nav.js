
var timeline = document.querySelector('#timeline');
var about = document.querySelector('#about');
var photos = document.querySelector('#photos');
var image_list_box = document.querySelector('#image_list');

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

if(document.querySelector('#upload_photos')){
    upload_photos.addEventListener('change', addUserPhotos);
}



function getAllPhotos(e) {
    e.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open('get', '../controller/get_photos_controller.php?user_id='+user_id_nav.value);

    timeline.style.display = 'none';
    about.style.display = 'none';
    photos.style.display = 'block';
    xhr.onload = function () {
		
	var popup_box =  document.querySelector('#popup_box');
	
		
        image_list_box.innerHTML = "";
        //console.log(this.responseText);
        $res = JSON.parse(this.responseText);
        for(var i = 0; i < $res.length; i++){
            var img = document.createElement('img');
			img.classList.add('zoom');
            img.src = $res[i]['img_url'];
            image_list_box.appendChild(img);
        }
		
			//creating big window to popup image

		popup_box.addEventListener('click', popdown);
		
		var classname = document.querySelectorAll('.zoom');
		let myArray = Array.from(classname);
		//console.log(myArray);
		
		var myFunction = function() {
			popup_box.innerHTML = '';
			popup_box.style.display = 'block';
			var new_img = document.createElement('img');
			new_img.classList.add('zoom');
			new_img.src = this.src;
			popup_box.appendChild(new_img);
			new_img.addEventListener('click', popdown);
		};
		

		for (var i = 0; i < myArray.length; i++) {
			myArray[i].addEventListener('click', myFunction);
		}

		

    };

    xhr.send();
}

function popdown() {
			
			popup_box.innerHTML = '';
			popup_box.style.display = 'none';
		
};

function addUserPhotos() {


    var file_data = $('#upload_photos').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);

    $.ajax({
        url: '../controller/add_photos_controller.php', // point to server-side PHP script
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response) {

            var res = JSON.parse(response);
            if(res.hasOwnProperty('uplod_max')){
                var err = document.querySelector('#ajax_error');
                err.innerHTML =  res['uplod_max'];
                err.style.display =  "block";
            }
            else {
                var img = document.createElement('img');
                img.src = res['img_url'];
                image_list_box.appendChild(img);
                var success = document.querySelector('#ajax_success');
                success.innerHTML =  "Successfuly uploaded image";
                success.style.display =  "block";
            }
        }

    });

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

