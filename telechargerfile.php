<?php

include 'db.php';

if (isset($_GET['id'])) {
    $produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id=" . $_GET['id']));

    echo $produit['img'];
    $url_to_image = $produit['img'];

    $ch = curl_init($url_to_image);

    $my_save_dir = 'images/';
    $filename = basename($url_to_image);
    $complete_save_loc = $my_save_dir . $filename;

    $fp = fopen($complete_save_loc, 'wb');

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    $images = array('jpg' => 'image/jpg', 'png' => 'image/png', 'png' => 'image/png');
    if (in_array(substr($url, -3), $images)) {
        $type = $images[substr($url, -3)];
    } else {
        //No its somthing else
        $type = 'application/octet-stream';
    }
}
?>

