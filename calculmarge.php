<?php
include 'db.php';
$ht = $_POST['ht'];
$coutmarge = $_POST['coutachat'];
$marge = $ht - $coutmarge;
if($coutmarge == '')
{
$marge = '';
}
?>
<div data-v-77800238="" class="" id="">
    <div data-v-77800238="" role="group" class="form-group" id="__BVID__162" aria-labelledby="__BVID__162__BV_label_">
        <label for="margecomm" class="d-block" id="__BVID__162__BV_label_">Marge Commerciale (€) </label>

            <input data-v-77800238="" id="margecomm" type="number" value="<?php echo number_format($marge, 2, '.', ''); ?>" name="marge" placeholder="" step="0.01" class="form-control">

    </div>
</div>
