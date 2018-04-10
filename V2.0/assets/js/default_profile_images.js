

// variables for profile picture upload
var profile_image_upload = document.querySelector('#profile_image_upload');
var image_button_left = document.querySelector('#change_profile_pic');


// if to check element exists for profile picture listener
if(document.querySelector('#upload_left_image')){
    image_button_left.addEventListener('click', profileUploadInput);

    profile_image_upload.addEventListener('change', function (e){




            var file_data = $('#profile_image_upload').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);

            $.ajax({
                url: '../controller/profile_img_controller.php', // point to server-side PHP script
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    var profile_pic = document.querySelector('#mini-profile-pic');
                    console.log(response);
                    var res = JSON.parse(response);
                    if(res.hasOwnProperty('uplod_max')){
                        var err = document.querySelector('#ajax_error');
                        err.innerHTML =  res['uplod_max'];
                        err.style.display =  "block";
                    }
                    else{
                        profile_pic.src = res['img_url'];
                    }


                }

            });


    });

}

// event to open upload box on click other div
function profileUploadInput(e){
    e.preventDefault();
    profile_image_upload.click();
}

// variables for cover picture upload
var cover_image = document.querySelector('#cover_image');
var cover_image_btn = document.querySelector('#change_cover_pic');

// check element in dom for cover picture for profile
if(document.querySelector('#cover_image_form')){
    cover_image_btn.addEventListener('click', coverUploadInput);

    cover_image.addEventListener('change', function (e){




        var file_data = $('#cover_image').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);

        $.ajax({
            url: '../controller/cover_img_controller.php', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {

                var cover_pic = document.querySelector('#cover_img');
                var res = JSON.parse(response);
                if(res.hasOwnProperty('uplod_max')){
                    var err = document.querySelector('#ajax_error');
                    err.innerHTML =  res['uplod_max'];
                    err.style.display =  "block";
                }
                else {
                    cover_pic.src = res['img_url'];
                }
            }

        });


    });

}
// event to open upload box on click other div for cover
function coverUploadInput(e){
    e.preventDefault();
    cover_image.click();
}
