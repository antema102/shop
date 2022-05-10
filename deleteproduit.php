<?php

include ('db.php');
$id = $_GET['id'];
mysqli_query($link, "DELETE FROM produit WHERE id =" . $id . "");
echo '<script>window.location=("produit.php") </script>';
?>