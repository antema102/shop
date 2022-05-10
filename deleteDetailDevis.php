<?php
include ('db.php');
$id = $_GET['detail'];

if (!in_array($id,$_SESSION['deletedProd'],true)){
    array_push($_SESSION['deletedProd'],$id);
}
return json_encode('product deleted !');


//echo '<pre/>';
//var_dump($_SESSION['deletedProd']);
//echo 'detail devis is deleted '
?>