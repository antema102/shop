<?php
include ('db.php');
$_SESSION['aloo']=array();
array_push($_SESSION['aloo'],['hello']);


if (isset($produit)){
    foreach ($produit as $item){
        var_dump($item);die();
    }
}
//$detail=mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `detail_devis` WHERE `id` =" . $id));

//   var_dump($detail[0]['id_devis']);
//mysqli_query($link, "DELETE FROM devis WHERE id =" . $detail[0]['id_devis'] . "");

//}else{

//}
//
echo '<pre/>';
var_dump($id);die();
echo 'detail devis is deleted '
?>