<?php
include ('db.php');

$avoirElt = $_GET['avoirElt'];
$i = sizeof($_SESSION['cart']) ;

$data = explode('---ID', $avoirElt);

$avoirId = $data[1];


$avoir = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `avoir` WHERE `id` =" . $avoirId . ""));
$client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `id` =" . $avoir['client'] . ""));
//$detail_avoir = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `detail_avoir` WHERE `id_devis` =" . $avoir['id'] . ""));
//$tabproduit = explode(",",$detail_avoir['id_prod']);
//$idprod=$tabproduit[0];
//if($idprod >0 ){
//    $produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE `id` =" . $idprod . ""));
//    $nomprd =$produit['nom'];
//}



$prix_ttc = $avoir['prix_ttc'];
$_SESSION['prix_ht_avoir'] = $prix_ttc;

?>
<tr data-v-561bb412="" id="trr_<?php echo $i ?>" class="line grabbable visible"  draggable="false" style="">
    <td  data-v-561bb412="" colspan="1" class="designation" >
        <input type="hidden" value="---ID<?php echo $client['id']?>" id="pdd_<?php echo $i ?>" name="pdd">
        <input type="hidden" value="<?php echo $client['id']?>" name="prid">
        <input type="hidden" value="<?php echo $avoir['id'] . ',' . $idprod ?>" name="avoirProd[]">

        <div data-v-561bb412="" class="line-description">
          <p class="" style=""><strong> <?php echo "Avoir" ?></strong> <span data-v-561bb412="" class="" style="margin-left: 10px!important;">
            <small><?php echo "( ".$client['prenom'] ." ". $client['nom']. " )" ?></small>
            </span></p>
            
            <span data-v-561bb412="" class="" style="">
                
            <?php
                $detail_avoir_sql = mysqli_query($link, "SELECT * FROM `detail_avoir` WHERE `id_devis` =" . $avoir['id'] . "");
                while ($detail_avoir = mysqli_fetch_array($detail_avoir_sql)) {
                $tabproduit = explode(",",$detail_avoir['id_prod']);
                $idprod=$tabproduit[0];
                $produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE `id` =" . $idprod . ""));
                $nomprd =$produit['nom']; ?>
                <?php echo $nomprd ?> <br>
                <?php } ?>
            </span>
        </div>
    </td>
    <td  style="padding-top: 19px;background-color: #e9ecef;" data-v-561bb412="" class="r-number no-wrap price_ht">
 
    </td>

    <td style="padding-top: 19px;background-color: #e9ecef;" data-v-561bb412="" class="r-number no-wrap price_ht">
        <input type="hidden" value="---ID<?php echo $client['id']?>" id="pdd_<?php echo $i ?>" name="pdd">
        <span data-v-561bb412="">
           
        </span>
    </td>
    <td style="padding-top: 19px;background-color: #e9ecef;" data-v-561bb412="" class="r-number no-wrap discount">
        <span data-v-561bb412="" class="" style=""> <?php ?></span>
        <span data-v-561bb412="">
                      
        </span>
    </td>
    <td data-v-561bb412="" style="padding-top: 19px;background-color: #e9ecef;" class="r-number no-wrap discount">
        <span data-v-561bb412="" class="" style=""> <?php ?></span>

        <span data-v-561bb412="">
           
        </span>
    </td>

    <td  style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap price_ht">
        <input type="hidden" value="---ID<?php echo $client['id']?>" id="pdd_<?php echo $i ?>" name="pdd">
        <span data-v-561bb412="">
            <?php echo number_format($prix_ttc, 2, '.', ' ');?> €
        </span>
    </td>
    <td style="cursor:pointer" id="pr-<?php echo $avoir['id']?>" onclick="removeAvoir(<?php echo $avoir['id']?>)"><i class="icon ion-ios-trash"></i></td>

</tr>
