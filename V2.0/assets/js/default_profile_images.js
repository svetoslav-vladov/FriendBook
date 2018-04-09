

var left_profile_form = document.querySelector('#upload_left_image');

var profile_image_upload = document.querySelector('#profile_image_upload');

var image_button_left = document.querySelector('#change_profile_pic');

if(document.querySelector('#upload_left_image')){
    image_button_left.addEventListener('click', eventUploadInput);

    profile_image_upload.addEventListener('change', function (e){




            var file_data = $('#profile_image_upload').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);

            $.ajax({
                url: '../controller/upload_images_controller.php', // point to server-side PHP script
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    var profile_pic = document.querySelector('#mini-profile-pic');
                    var res = JSON.parse(response);

                    profile_pic.src = res['img_url'];
                }

            });


    });

}



function eventUploadInput(e){
    e.preventDefault();
    profile_image_upload.click();
}