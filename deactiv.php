<?php

include ('db.php');
$id = $_GET['id'];
mysqli_query($link, "UPDATE user
SET etat = '1'  WHERE id =" . $id . "");


echo '<script>window.location=("list_user.php") </script>';
?>
