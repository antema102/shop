<?php

include ('db.php');
$id = $_GET['id'];
mysqli_query($link, "DELETE FROM cat WHERE id =" . $id . "");
?>

