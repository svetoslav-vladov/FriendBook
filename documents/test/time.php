<?php
    
    $date = time();

    var_dump($date);

    $d = date("d-m-Y / H:i:s", $date);
    echo $d;