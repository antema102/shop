<?php
include 'db.php';
$ht = $_POST['ht'];
$tva = $_POST['tva'];
$pttc = $ht + (($ht * $tva) / 100);
$cf = $pttc/$ht;
?>

<div data-v-77800238="" class="">
    <div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_">
        <label for="productPriceTTC1" class="d-block" id="__BVID__156__BV_label_">Prix TTC (€)</label>

        <input data-v-77800238="" id="productPriceTTC1" type="number" value="<?php echo  number_format($pttc, 2, '.', ''); ?>" name="prixttc" placeholder="" step="0.01" class="form-control">
    </div>
</div>
