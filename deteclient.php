<?php

include ('db.php');
$id = $_GET['id'];
mysqli_query($link, "DELETE FROM client WHERE id =" . $id . "");
echo '<script>window.location=("client.php") </script>';
 ?>

