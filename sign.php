<?php
include 'db.php';

$idFac = $_POST['idFac'];

$imgSig = $_POST['name'] . ".png";
$img = url . "stage-framework/photos/" . $imgSig;

$dateSign = $_POST['dateS'];

$table = $_POST['source'];
print_r($table);

//mysqli_query($link, "UPDATE facture SET dateSignature='" . $dateSign . "',imgSig='" . $img . "' WHERE id='" . $idFac . "'")or die(mysqli_error($link));
mysqli_query($link, "UPDATE `" . $table . "` SET dateSignature='" . $dateSign . "',imgSig='" . $img . "' WHERE id='" . $idFac . "'")or die(mysqli_error($link));

?>

