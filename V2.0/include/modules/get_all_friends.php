<div class="friends-container" id="friends-container<?php if(isset($_GET['id']))
                                { echo $_GET['id']; }else{ echo $_SESSION['logged']['id']; } ?>">
    <script>
        $(document).ready(function () {

            getAllFriends(<?php echo $_GET['id']?>, <?php echo $_SESSION['logged']['id']?>);
        });
    </script>
</div>

