<?php
include ('db.php');
$productId = '';
if(isset($_GET['productId'])) {
    $productId = $_GET['productId'];
}

$x = '';
if(isset($_GET['x'])) {
    $x = $_GET['x'];
}
$fraisLiv = '';
if(isset($_GET['fraisLiv'])) {
    $fraisLiv = $_GET['fraisLiv'];
    $_SESSION['fraisLiv'] = $fraisLiv;
}
$tvaLiv = '';
if(isset($_GET['tvaLiv'])) {
    $tvaLiv = $_GET['tvaLiv'];
    $_SESSION['tvaLiv'] = ($tvaLiv*$fraisLiv)/100 ;
}

for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
    $id_cart = $_SESSION['cart'][$i]['id'];
    if($id_cart == $productId) {

        unset($_SESSION['cart'][$i]);
        $_SESSION["cart"] = array_values($_SESSION["cart"]);
    }
}
$prix_ht_cart = 0;
$prix_ttc_cart = 0;
$tva = 0;
for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {

    $id_cart = $_SESSION['cart'][$i]['id'];
    $nom_cart = $_SESSION['cart'][$i]['nom'];
    $qte = $_SESSION['cart'][$i]['qte'];
    $prix_ht_cart = $prix_ht_cart+$_SESSION['cart'][$i]['prix_ht'];
    $prix_ttc_cart = $prix_ttc_cart+$_SESSION['cart'][$i]['prix_ttc'];
    if($_SESSION['cart'][$i]['prod_tva']>0){
        $tva = $tva + ($_SESSION['cart'][$i]['prix_ht']* ($_SESSION['cart'][$i]['prod_tva'] / 100));

    }

}

//$tva = $prix_ht_cart * (20 / 100);
$_SESSION['tva'] = $tva;

$_SESSION['tva2'] = $_SESSION['tva2']+ $tva;
$_SESSION['prix_ht'] = $prix_ht_cart;
$_SESSION['prix_ttc'] = $prix_ttc_cart;
$_SESSION['prixht1'] = str_replace("€","",$_POST['prix_ttc']);
$_SESSION['prixttc1'] = $_POST['prix_ttc']*((100-$_SESSION['tva'])/100);
//$pttc = $ht - ($ht * $tva/100);
//$_SESSION['prixttc1'] ="500";

//$_SESSION['prixhtt1'] = $_SESSION['prix_ttc'] + $prix_ttc_cart;
//$net_a_payer = $_SESSION['prix_ht'] + (($_SESSION['prix_ht'] * $_SESSION['tva']) / 100);
//$remise = $_SESSION['remise'];


//if($remise <= 0 ){
//    $_SESSION['net_a_payer'] =  $net_a_payer;
//}elseif($remise > 0){
//    $_SESSION['net_a_payer'] = $_SESSION['prix_ht']* ( 1 - $remise / 100);
//}
//
//echo "<pre>";
//var_dump($_SESSION['tvaLiv'],$_SESSION['fraisLiv']);die()
?>

<table data-v-248579a2="">
    <body data-v-248579a2="">
    <tr data-v-248579a2=""vstyle="background-color: #205459; color: rgb(255, 255, 255);">
        <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif</th>
    </tr>
    <tr data-v-248579a2="" class="sstitre transport" style="display: none;">
        <td data-v-248579a2="" colspan="2">Transport</td>
    </tr>

    <?php if(($_SESSION['fraisLiv'] != '') ) {
        $tvaLivValue='0';
        $tvaLivValue = ( (float) $_SESSION['fraisLiv']  * (float)$_SESSION['tvaLiv']) /100 ;
        ?>
        <tr data-v-248579a2="">
            <td data-v-248579a2="">Frais de port </td>
            <td data-v-248579a2="" role="" class="r-number" id="" onchange="">
                <?php
                echo number_format($_SESSION['fraisLiv'], 2, ".", " ");
                ?> €</td>

        </tr>

        <tr data-v-248579a2="" style=" display: none;">
            <td data-v-248579a2="">TVA Frais de port <?php echo( $_SESSION['tvaLiv']*100)/$_SESSION['fraisLiv']  ?> %</td>

            <td data-v-248579a2="" role="" class="r-number" id="" onchange="">
                <?php

                echo number_format( $_SESSION['tvaLiv'], 2, ".", " ");

                ?> €</td>

        </tr>

    <?php }?>

    <input type="hidden" name="tvaLiv" value="<?php echo $_SESSION['tvaLiv'] ?>">
    <input type="hidden" name="frl" value="<?php echo $_SESSION['fraisLiv'] ?>">

    <tr data-v-248579a2="">
        <td data-v-248579a2="">Montant HT</td>
        <td data-v-248579a2="" role="totalHT" class="r-number" id="prixhtt" onchange="calculPrixHT()">
            <?php

            echo number_format($_SESSION['prix_ht'], 2, ".", " ");

            ?> €</td>
        <input type="hidden" id="prixht" name="mtht" value="<?php echo $_SESSION['prix_ht'] ?>">
    </tr>
    <tr data-v-248579a2="">
        <td data-v-248579a2="">Montant total HT</td>
        <td data-v-248579a2="" role="montantTotalHT" class="r-number" id="" onchange="">
            <?php
            $ponte = strpos($_SESSION['prix_ht']+ $_SESSION['fraisLiv'] + $_SESSION['tvaLiv'] , ".");
            if ($ponte > 0) {
                echo number_format($_SESSION['prix_ht']+ $_SESSION['fraisLiv'] + $_SESSION['tvaLiv'], 2, ".", " ");
            } else {
                echo number_format($_SESSION['prix_ht']+ $_SESSION['fraisLiv'] + $_SESSION['tvaLiv'], 2, ".", " ");
            }

            ?> €</td>
        <input type="hidden" name="mttht" value="<?php echo $_SESSION['prix_ht']+ $_SESSION['fraisLiv'] + $_SESSION['tvaLiv']?>">
    </tr>
    <tr data-v-248579a2="" style=" display: none;">
        <td data-v-248579a2="">Montant total TVA</td>
        <td data-v-248579a2="" role="totalTVA"   class="r-number" id="tvat"> <?php
            $pontee = strpos($_SESSION['tva'], ".");
            if ($pontee > 0) {
                echo number_format($_SESSION['tva'], 2, ".", " ");
            } else {
                echo number_format($_SESSION['tva'], 2, ".", " ");
            }
            ?> €</td>
        <input type="hidden" name="mttva" value="<?php echo $_SESSION['tva'] ?>">

    </tr>
    <tr data-v-248579a2="" style=" display: none;">
        <td data-v-248579a2="">Montant total TTC</td>
        <td data-v-248579a2="" role="total_ttc" class="r-number" id="prixttct">
            <?php
            $ponte = strpos($_SESSION['prix_ttc']+ $_SESSION['fraisLiv'] + $_SESSION['tvaLiv'] , ".");
            if ($ponte > 0) {
                echo number_format($_SESSION['prix_ttc']+ $_SESSION['fraisLiv'] + $_SESSION['tvaLiv'], 2, ".", " ");
            } else {
                echo number_format($_SESSION['prix_ttc']+ $_SESSION['fraisLiv'] + $_SESSION['tvaLiv'], 2, ".", " ");
            }

            ?> €</td>
        <input type="hidden" name="mtttc" value="<?php echo $_SESSION['prix_ttc']+ $_SESSION['fraisLiv'] + $_SESSION['tvaLiv']?>">
    </tr>

    </body>
</table>

<!--<table data-v-248579a2="" style="margin-top: 20px;" style="display: none">-->
<!--    <body data-v-248579a2="">-->
<!--    <tr data-v-248579a2=""style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">-->
<!--        <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif Avec Remise</th>-->
<!--    </tr>-->
<!--    <tr data-v-248579a2="">-->
<!--        <td data-v-248579a2="" style="width: 50%;">Prix non soldé </td>-->
<!--        <td data-v-248579a2="" role="total_ttc" class="r-number" id="prixttct" >-->
<!--            --><?php
//            $ponte = strpos($_SESSION['prix_ttc'], ".");
//            if ($ponte > 0) {
//                echo number_format($_SESSION['prix_ttc'], 2, ".", " ");
//            } else {
//                echo number_format($_SESSION['prix_ttc'], 2, ",", " ");
//            }
//            ?><!-- €</td>-->
<!--        <input type="hidden" name="mtttc" value="--><?php //echo $_SESSION['prix_ttc'] ?><!--">-->
<!---->
<!--    </tr>-->
<!--    <tr data-v-248579a2="">-->
<!--        <td data-v-248579a2="" style="width: 50%;">Remise Globale</td>-->
<!--        <td data-v-248579a2="" style="width: 50%;" role="group" role="group" class="form-group" id="" onchange="calculPrixtest2()" aria-labelledby="" >-->
<!--                    <select data-v-77800238="" class="custom-select" name="tva1" id="__BVID__1551">-->
<!--                        <option data-v-77800238="" value="0">0</option>-->
<!--                        <option data-v-77800238="" value="5">5</option>-->
<!--                        <option data-v-77800238="" value="10">10</option>-->
<!--                        <option data-v-77800238="" value="20">20</option>-->
<!--                    </select>-->
<!--        </td>-->
<!--    </tr>-->
<!--    <tr data-v-248579a2="" >-->
<!--        <td data-v-248579a2="" style="width: 50%;">Prix soldé TTC</td>-->
<!--        <td data-v-248579a2="" role="group" class="r-number" id="blockt2">-->
<!--            <div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_">-->
<!--                <label for="productPriceTTCTest2" class="d-block" id="__BVID__156__BV_label_"></label>-->
<!--                <input data-v-77800238="" id="productPriceTTCTest2" type="number" value="--><?php //echo $_SESSION['prixttc1'] ?><!--" name="prixttc1" placeholder="" step="0.01" class="form-control">-->
<!--            </div>-->
<!--        </td>-->
<!--        <input type="hidden" name="mtttc" value="--><?php //echo $_SESSION['prixttc12'] ?><!--">-->
<!--    </tr>-->
<!--            <tr data-v-248579a2="" >-->
<!--                <td data-v-248579a2="" style="width: 50%;">Net à payer (TTC)</td>-->
<!--                <td data-v-248579a2="" style="width: 50%;" role="total_ttc" class="r-number" >-->
<!--                </td>-->
<!--            </tr>-->
<!---->
<!--    </body>-->
<!--</table>-->

<?php if(!isset($_SESSION['prix_ht_avoir']) || ($_SESSION['prix_ht_avoir'] == '')) {
    //if($x != ('avoir' || 'devis')) {
    ?>
    <div data-v-77800238="" class="row"  id="blockTest" style="margin-top: 20px">
        <div data-v-77800238="" class="col-sm-4 col-12">
            <div data-v-77800238="" role="group" class="form-group" id="__BVID__152" aria-labelledby="__BVID__152__BV_label_">
                <div data-v-77800238="" role="group" class="form-group" id="__BVID__152" aria-labelledby="__BVID__152__BV_label_" style="display: inline-table ; display: none;">
                    <span><label for="productPriceTTC" class="d-block" id="__BVID__152__BV_label_" >Prix non soldé(€)</label></span>
                    <span>
                        <input type="hidden" value="<?php echo $_SESSION['prix_ttc'] ?>" name="prixht1">
                        <input class="form-control" id="productPriceTTC"type="text" onblur="calculPrixtest3()"  style="border:#DADCDD" value="  <?php
                        echo number_format($_SESSION['prix_ttc'], 2, ".", " ");
                        ?> " readonly>
                        <input type="hidden" name="prixht1" value="<?php echo $_SESSION['prix_ttc'] ?>">
                    </span>
                </div>
            </div>
        </div>

        <div data-v-77800238="" class="col-sm-4 col-12" >
            <div data-v-77800238="" role="group" class="form-group" id="__BVID__1551" onchange="calculPrixtest3()" aria-labelledby="__BVID__1551">
                <label for="productTvaRate" class="d-block" id="__BVID__1551_">Remise Globale %</label>
                <div>
                    <select data-v-77800238="" class="custom-select" name="tva2" id="__BVID__1521">
                        <option data-v-77800238="" value="0">0</option>
                        <option data-v-77800238="" value="5">5</option>
                        <option data-v-77800238="" value="10">10</option>
                        <option data-v-77800238="" value="20">20</option>
                    </select>
                    <!--    <input type="hidden" name="tva2" value="">  -->
                </div>
            </div>
        </div>
        <div data-v-77800238="" class="col-sm-4 col-12" id="blockt">
            <div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_" style="display: inline-table ; display: none; ">
                <label for="productPriceTTCTest" class="d-block" id="__BVID__156__BV_label_">Prix A Payer(€)</label>

                <input data-v-77800238="" id="productPriceTTCTest" type="number" name="prixttc1"  placeholder="" step="0.01" class="form-control" readonly>
                <input type="hidden" name="prixttc1" value="<?php echo $_SESSION['prixttc1'] ?>">

            </div>
        </div>
        <!--    <div data-v-77800238="" class="col-sm-4 col-12" id="blockt">-->
        <!--        <div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_">-->
        <!--            <label for="productPriceTTCTest" class="d-block" id="__BVID__156__BV_label_">Prix TTC à payer(€)</label>-->
        <!---->
        <!--            <input data-v-77800238="" id="productPriceTTCTest" type="number" name="prixttc1" placeholder="" step="0.01" class="form-control">-->
        <!--        </div>-->
        <!--    </div>-->
    </div>
    <?php
// }
}?>
<script src="https://code.jquery.com/jquery-3.5.1.js" async=""></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="dist/css/styles.css">

<!-- Latest compiled JavaScript -->

<!-- These are the necessary files for the image uploader -->
<script src="dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<script src="dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>
<script type="text/javascript">

    function calculPrixHT() {
        var ht = document.getElementById("prixhtt").value;
        var tva = document.getElementById("tva").value;
        $.ajax({
            type: "POST",
            url: "calcultva.php",
            data: {
                ht: ht,
                tva: tva
            },

            success: function (data) {
                document.getElementById("prixttct").innerHTML = data;
            }
        });

    }
    // function calculprix() {
    //
    //         var prix_ttc1 = document.getElementById("prix_ttc1").value;
    //         var tva1 = document.getElementById("tva1").value;
    //
    //         $.ajax({
    //             type: "POST",
    //             url: "calculprixht2.php",
    //             data: {
    //                 prix_ttc1: prix_ttc1,
    //                 tva1: tva1
    //             },
    //             success: function (data) {
    //                 document.getElementById("blockprix").innerHTML = data;
    //
    //             }
    //         })
    // }


    // $(document).ready(function(){
    //     $("#remise").on('click',function(){
    //         alert('test');
    //         var remise = $(this).val();
    //         console.log(remise);
    //     });
    // });
    //


    // function calculRemise() {
    //     var ht = document.getElementById("prixhtt").value;
    //     var tva = document.getElementById("tva").value;
    //     var remise = document.getElementById("remise").value;
    //
    //     console.log(remise);
    //
    //     $.ajax({
    //         type: "POST",
    //         url: "calculnetpayer.php",
    //         data: {
    //             ht: ht,
    //             tva: tva,
    //             remise: remise
    //         },
    //
    //         success: function (data) {
    //             document.getElementById("net_a_payer").innerHTML = data;
    //         }
    //     });
    //
    // }

</script>


<style>

    .form-group label, .form-group {
        font-size: 11px!important;
    }
</style>