<?php

include ('db.php');
$etat = $_GET['etat'];
$id = $_GET['id'];
//echo $etat;
//echo $id;
mysqli_query($link, "UPDATE `avoir` SET etat_avoir= '" . $etat . "' WHERE id=" . $id . "");
echo '<script>window.location=("avoir.php") </script>';
?>

