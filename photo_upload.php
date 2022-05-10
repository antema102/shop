<?php

    $data = $_POST['photo'];

    $name =  $_POST['name'] ;
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    mkdir("/var/www/stage-framework/photos");

    file_put_contents("/var/www/stage-framework/photos/". $name .".png", $data);
    
    die;
?>