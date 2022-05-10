<?php
//include 'db.php';
//$prix_ttc1 = $_POST['ht'];
//$tva = $_POST['tva'];
//$tva = str_replace("€","",$tva);
//$prixhtt1 = $prix_ttc1 * ((100 - $tva) / 100);
//$cf = $pttc/$prix_ttc1;
//
//?>
<!--<div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_">-->
<!--    <label for="productPriceTTC" class="d-block" id="__BVID__156__BV_label_">Prix TTC Test(€)</label>-->
<!--    <input data-v-77800238="" id="productPriceTTC" type="number" value="--><?php //echo  number_format($prixhtt1, 2, '.', ' '); ?><!--" name="prixht1" placeholder="" step="0.01" class="form-control">-->
<!---->
<!--</div>-->

<!--<div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_">-->
<!--    <label for="productPriceTTCTest2" class="d-block" id="__BVID__156__BV_label_"></label>-->
<!--    <input data-v-77800238="" id="productPriceTTCTest2" type="number" value="--><?php //echo  number_format($prixhtt1, 2, '.', ' '); ?><!--" name="prixttc1" placeholder="" step="0.01" class="form-control">-->
<!---->
<!--</div>-->



<?php
include 'db.php';
$ht = $_POST['ht'];
$tva = $_POST['tva2'];

$ht=str_replace("€","",$ht);
$ht=str_replace(" ","",$ht);
$pttc = $ht - ($ht * $tva/100);
$frais = 0;
//if(($_SESSION['fraisLiv'] != '') && ($_SESSION['tvaLiv'] != '')) {
if(($_SESSION['fraisLiv'] != '')) {
$tvaLivValue = ((float)$_SESSION['fraisLiv'] * (float)$_SESSION['tvaLiv']) / 100;
$frais = (float)$_SESSION['fraisLiv'] + $tvaLivValue;
}
$cf = $pttc/$ht;
?>


<div data-v-77800238="" class="" style="display: none;">
    <div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_" >
        <label for="productPriceTTC" class="d-block" id="__BVID__156__BV_label_">Prix TTC à payer (€)</label>

        <input data-v-77800238="" id="productPriceTTC" type="number" value="<?php echo  number_format($pttc, 2, ".", "") ; ?>" name="prixttc1" placeholder="" step="0.01" class="form-control" readonly>
    </div>
</div>

<div data-v-77800238="" class=""  >
    <div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_">
        <label for="productPriceTTC" class="d-block" id="__BVID__156__BV_label_">Prix Net à payer (€)</label>

        <input data-v-77800238="" id="productPriceTTC" type="number" value="<?php echo  number_format($pttc + $frais , 2, ".", "") ; ?>" name="prixttc11" placeholder="" step="0.01" class="form-control" readonly>
    </div>
</div>