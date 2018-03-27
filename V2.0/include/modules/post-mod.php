<?php
require_once "../include/session.php";
?>
<form id="post-form" class="shadow-box" action="../controller/add_post_controller.php" method="post">
    <label for="post_module">Make post</label>
    <textarea id="post_module" class="shadow-box" cols="62" rows="10" name="desc"></textarea>
    <input class="mini-btn shadow-box" type="submit" value="post" name="add_post">
    <div class="clear"></div>
</form>