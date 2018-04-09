<?php
require_once '../include/session.php';
require_once "../include/pagelock.php";

// header.php is head tag, meta, link etc.
require_once "../include/header.php";
//mainHeader is after login, top navigation
require_once  "../include/mainHeader.php";

// calling daos for function
require_once "../model/users_dao.php";
require_once "../model/posts_dao.php";
?>


    <div id="left-col-grid">
        <div class="lwrap">
            <ul>
                <li id="general" class="active_btn"><span class="nav-icon"><i class="fas fa-cogs"></i></span>General</li>
                <li id="security"><span class="nav-icon"><i class="fas fa-lock"></i></span>Security</li>
            </ul>
        </div>
    </div>
    <div id="content-grid">
        <div id="general_message">
            <ul>Empty fields will not be changed</ul>
        </div>
        <div id="general_set_box">
            <form id="general_form" action="../index.php">
                <fieldset>
                    <legend>General Settings</legend>
                    <div>
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name">
                    </div>
                    <div>
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name">
                    </div>
                    <div>
                        <ul>
                            <li>if is set, will replace your first and last name on comments, profile page and etc</li>
                        </ul>
                        <label for="display_name">Display Name</label>
                        <input type="text" name="display_name" id="display_name">
                    </div>

                    <div>
                        <label for="relation_status">Relationship status</label>
                        <input type="text" name="relation_status" id="relation_status">
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender">
                            <option value="" selected>Select option</option>
                            <option value="male">Male</option>
                            <option value="male">Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="birthday">Your BirthDay</label>
                        <input type="text" name="birthday" id="birthday">
                    </div>
                    <div>
                        <label for="country">Country</label>
                        <select name="country" id="country">
                            <option value="" selected>Select option</option>
                        </select>
                    </div>
                    <div>
                        <label for="web_addres">Website address</label>
                        <input type="text" name="web_addres" id="web_addres">
                    </div>
                    <div>
                        <label for="mobile_number">Mobile Number</label>
                        <input type="number" name="mobile_number" id="mobile_number">
                    </div>
                    <div>
                        <label for="skype_name">Skype username</label>
                        <input type="text" name="skype_name" id="skype_name">
                    </div>
                    <div>
                        <input type="submit" name="general" id="general_submit" class="btn" value="SAVE">
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="security_set_box">
            <form id="security_form" action="../index.php">
                <fieldset>
                    <legend>Security Settings</legend>
                    <div>
                        <ul>
                            <li>This will change your login!!!</li>
                        </ul>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="old_password">Old password</label>
                        <input type="text" name="old_password" id="old_password">
                    </div>
                    <div>
                        <label for="new_password">New Password</label>
                        <input type="text" name="new_password" id="new_password">
                    </div>
                    <div>
                        <label for="new_password_valid">New Password validation</label>
                        <input type="text" name="new_password_valid" id="new_password_valid">
                    </div>
                    <div>
                        <input type="submit" name="security" id="security" class="btn" value="SAVE">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>





<?php
//mainFooter is the end of mainHeader
require_once "../include/mainFooter.php";
//footer is end of html parts
require_once "../include/footer.php";
?>