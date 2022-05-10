<?php
include 'db.php';

$ht = $_POST['ht'];
//$remise = $_POST['remise'];
$tva = $_POST['tva'];
if($remise > 0 ){
    $net_a_payer = $ht + (($ht * $tva) / 100);;
}else{
    $net_a_payer = $ht * ( 1- 5 / 100);
}

?>

<td data-v-248579a2="" role="net_a_payer" class="r-number" id="net_a_payer">
    <div  id="net_a_payer" >
        <?php
        echo number_format($net_a_payer, 2, ".", " ");
        ?> €
    </div>
</td>
