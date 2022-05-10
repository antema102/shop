<?php

include ('db.php');
$etat = $_GET['etat'];
$id = $_GET['id'];
//echo $etat;
//echo $id;
mysqli_query($link, "UPDATE `facture` SET etat= '" . $etat . "' WHERE id=" . $id . "");
echo '<script>window.location=("facture.php") </script>';
?>

