<?php

include ('db.php');
$id = $_GET['id'];
mysqli_query($link, "DELETE FROM user WHERE id =" . $id . "");
echo '<script>window.location=("list_user.php") </script>';
?>

