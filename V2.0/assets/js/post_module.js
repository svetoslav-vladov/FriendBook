if(document.querySelector('#post-form')){
    var post_module_form = document.querySelector('#post-form');

    var poput_input = document.querySelector('#post_add_popup');
    var fake_input = document.querySelector('#post_input_fake');
    var black_background = document.querySelector('#opacity_black_background');

    post_module_form.addEventListener('click', popup);

    function popup(){
        // remove event listener for popup
        post_module_form.removeEventListener("click", popup);

        // form text field box
        post_module_form.style.position = 'relative';
        post_module_form.style.width = '100%';
        post_module_form.style.maxWidth = '500px';
        post_module_form.style.margin = '90px auto';
        post_module_form.style.zIndex = '1000';

        // black background when popup
        black_background.style.position = 'absolute';
        black_background.style.display = 'block';
        black_background.style.height = '100%';
        black_background.style.width = '100%';
        black_background.style.top = '0';
        black_background.style.left = '0';
        black_background.style.backgroundColor = '#00000052';
        black_background.style.zIndex = '10000';

        fake_input.style.display = 'none';
        poput_input.style.display = "block";

    }

    // cancel button function
    var cancel_post = document.querySelector('#cancel_post');
    if(document.querySelector('#cancel_post')){
        cancel_post.addEventListener('click', cancelButton);
    }

    // click on the black background to hide popup
    black_background.addEventListener('click', hideOnBlackBG);

    function hideOnBlackBG(e) {
        if (document.querySelector('#post-form').contains(e.target)) {
            // nothing when clicked in the box
            console.log('in the box');
        }
        else {
            console.log('out');
            // repeat code :( will fix it
            // remove style for black background
            black_background.removeAttribute('style');

            // form recover
            post_module_form.style.position = '';
            post_module_form.style.width = '';
            post_module_form.style.maxWidth = '';
            post_module_form.style.margin = '';
            post_module_form.style.zIndex = '';

            // fake input recover display
            fake_input.style.display = 'block';

            // hide popup
            poput_input.style.display = "none";

            setTimeout(function(){
                post_module_form.addEventListener('click', popup);

            }, 500);

        }
    }

    function cancelButton(e){
        e.preventDefault();

        // remove style for black background
        black_background.removeAttribute('style');

        // form recover
        post_module_form.style.position = '';
        post_module_form.style.width = '';
        post_module_form.style.maxWidth = '';
        post_module_form.style.margin = '';
        post_module_form.style.zIndex = '';

        // fake input recover display
        fake_input.style.display = 'block';

        // hide popup
        poput_input.style.display = "none";

        setTimeout(function(){
            post_module_form.addEventListener('click', popup);

        }, 500);

    }

}


