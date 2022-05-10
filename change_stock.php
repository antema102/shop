<?php

include 'db.php';
$id = $_GET['idp'];
mysqli_query($link, " UPDATE produit SET stocka= '0' WHERE id=" . $id . "")or die(mysqli_error($link));
?>