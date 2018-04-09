<div class="friends-container" id="friends-container<?php echo $_GET['id']?>">
    <script>
        $(document).ready(function () {
            getAllFriends(<?php echo $_GET['id']?>, <?php echo $_SESSION['logged']['id']?>);
        });
    </script>
</div>

