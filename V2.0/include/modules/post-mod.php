<?php
require_once "../include/session.php";
?>
<form action="../controller/add_post_controller.php" method="post">
    <textarea id="post_module" cols="62" rows="10" name="desc"></textarea>
    <input type="submit" value="post" name="add_post">
</form>