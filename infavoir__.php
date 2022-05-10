<?php
include ('db.php');

$client = $_GET['client'];
$i = sizeof($_SESSION['cart']) ;

$data = explode('---ID', $client);

$idclient = $data[1];


$client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `id` =" . $idclient . ""));
$avoir = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `avoir` WHERE `client` =" . $idclient . ""));
$detail_avoir = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `detail_avoir` WHERE `id_devis` =" . $avoir['id'] . ""));
$tabproduit = explode(",",$detail_avoir['id_prod']);
$idprod=$tabproduit[0];
if($idprod >0 ){
    $produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE `id` =" . $idprod . ""));
    $nomprd =$produit['nom'];
    $prixunit_ht = $produit['prix_ht'];
    $tva = $produit['tva'];

}
$qte=$tabproduit[1];
$prix_ttc = $avoir['prix_ttc'];
$montant_ht = $avoir['prix_ht'];

$_SESSION['prix_ht_avoir'] = $prix_ttc;

$objet = array("id" => $client['id'], "nom" => (string) $client['nom'], "prenom" => (string) $client['prenom '],"prix_ht" => (string) $prix_ttc);
array_push($_SESSION['cart'], $objet);
//echo '<pre>';
//print_r($objet);
//echo '</pre>';
/* $objet = array("id" => $produit['id']);
  array_push($_SESSION['prod'], $objet); */
?>
<tr data-v-561bb412="" id="trr_<?php echo $i ?>" class="line grabbable visible"  draggable="false" style="">
    <td  data-v-561bb412="" colspan="1" class="designation" >
        <input type="hidden" value="---ID<?php echo $client['id']?>" id="pdd_<?php echo $i ?>" name="pdd">
        <input type="hidden" value="<?php echo $client['id']?>" name="prid">
        <input type="hidden" value="<?php echo $client['id'] . ','  ?>" name="prod[]">

        <div data-v-561bb412="" class="line-description">

<!--            <input type="hidden" value="--><?php //echo $qte ?><!--" id="aq_--><?php //echo $i ?><!--" name="pdd">-->
            <p class="" style=""><strong> <?php echo "Avoir" ?></strong></p>
            <span data-v-561bb412="" class="" style="">
                                  <?php echo $nomprd  ?>
                    </span>
            <span data-v-561bb412="" class="" style="margin-left: 10px!important;">
                <?php echo " ".$client['prenom'] ." ". $client['nom']?>
                    </span>
        </div>
    </td>
    <td  style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap price_ht">
        <span data-v-561bb412="" class="" style=""> <?php ?></span>

        <span data-v-561bb412="">
             <?php echo number_format($prixunit_ht, 2, '.', ' ');?> €
        </span>

    </td>

    <td style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap price_ht">
        <input type="hidden" value="---ID<?php echo $client['id']?>" id="pdd_<?php echo $i ?>" name="pdd">
        <span data-v-561bb412="">
            <?php echo $qte ?>
        </span>
    </td>
    <td style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap discount">
        <span data-v-561bb412="" class="" style=""> <?php ?></span>
        <span data-v-561bb412="">
                        <?php echo number_format($montant_ht, 2, '.', ' ');?> €
        </span>
    </td>
    <td data-v-561bb412="" style="padding-top: 19px;" class="r-number no-wrap discount">
        <span data-v-561bb412="" class="" style=""> <?php ?></span>

        <span data-v-561bb412="">
            <?php echo $tva?> %
        </span>
    </td>

    <td  style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap price_ht">
        <input type="hidden" value="---ID<?php echo $client['id']?>" id="pdd_<?php echo $i ?>" name="pdd">
        <span data-v-561bb412="">
            <?php echo number_format($prix_ttc, 2, '.', ' ');?> €
        </span>
    </td>
    <td style="cursor:pointer" id="pr-<?php echo $client['id']?>" onclick="removeProduct(<?php echo $client['id']?>)"><i class="icon ion-ios-trash"></i></td>

</tr>
