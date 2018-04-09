
// Left menu buttons
var general_btn = document.querySelector('#general');
var security_btn = document.querySelector('#security');

//loading image
var loading_image = document.createElement('img');
loading_image.src = '../assets/images/loading.gif';

// getting submit btn's
var general_submit = document.querySelector('#general_submit');
var security_submit = document.querySelector('#security_submit');

// div boxes
var general_box = document.querySelector('#general_set_box');
var security_box = document.querySelector('#security_set_box');
// parent
var content_box = document.querySelector('#content-grid');

var msg = document.createElement('div');
var error = document.createElement('div');

// check if element is on page

if(general_btn || security_btn || general_box || security_box){

    general_btn.addEventListener('click', showGeneralBox);
    security_btn.addEventListener('click', showSecurityBox);

    function showGeneralBox(){
        general_btn.classList.toggle("active_btn");
        general_box.style.display = 'block';

        security_box.style.display = 'none';
        security_btn.classList.toggle("active_btn");

        if(document.querySelector('.success')){
            general_box.removeChild(document.querySelector('.success'));
        }
        if(document.querySelector('.error')){
            general_box.removeChild(document.querySelector('.error'));
        }


    }

    function showSecurityBox(){
        security_btn.classList.toggle("active_btn");
        security_box.style.display = 'block';

        general_box.style.display = 'none';
        general_btn.classList.toggle("active_btn");

        general_box.removeChild(msg);

        if(document.querySelector('.success')){
            general_box.removeChild(document.querySelector('.success'));
        }
        if(document.querySelector('.error')){
            general_box.removeChild(document.querySelector('.error'));
        }
    }
}

if(document.querySelector('#general_submit')){
    general_submit.addEventListener('click', saveGeneralSettings);
}


function saveGeneralSettings(e) {
    e.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open('post', '../controller/settingsController.php');
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // .onload is status 200 / ready 4
    general_box.style.display = 'none';
    console.log(loading_image);
    content_box.appendChild(loading_image);

    var first_name = document.querySelector('#first_name');
    var last_name = document.querySelector('#last_name');
    var display_name = document.querySelector('#display_name');
    var relation_status = document.querySelector('#relation_status');
    var gender = document.querySelector('#gender');
    var birthday = document.querySelector('#birthday');
    var country = document.querySelector('#country');
    var website = document.querySelector('#web_addres');
    var mobile_number = document.querySelector('#mobile_number');
    var skype_name = document.querySelector('#skype_name');

    var data = {
        'first_name': first_name.value,
        'last_name': last_name.value,
        'display_name': display_name.value,
        'relation_status': relation_status.value,
        'gender': gender.value,
        'birthday': birthday.value,
        'country': country.value,
        'website': website.value,
        'mobile_number': mobile_number.value,
        'skype_name': skype_name.value
    };


    setTimeout(function(){
        xhr.onload = function() {


            general_box.style.display = 'block';
            if(document.querySelector('.success')){
                document.querySelector('.success').remove();

            }
            if(document.querySelector('.error')){

                document.querySelector('.error').remove();

            }


            content_box.removeChild(loading_image);
            if(this.responseText == "true"){
                msg.classList.add('success');
                msg.innerHTML = 'Saved Successfuly';
                general_box.appendChild(msg);
            }
            else{
                error.classList.add('error');
                error.innerHTML = this.responseText;
                general_box.appendChild(error);
            }
            console.log(this.responseText);
        };


        xhr.send('general' + '&data=' + JSON.stringify(data));
    },500);

}