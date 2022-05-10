<?php

include ('db.php');
$etat = $_GET['etat'];
$id = $_GET['id'];
mysqli_query($link, "UPDATE `espace` SET etat= '" . $etat . "' WHERE id=" . $id . "");
echo '<script>window.location=("espace.php") </script>';
?>

