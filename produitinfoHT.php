<?php
include ('db.php');

$prd = $_GET['produit'];
$qte = $_GET['qte'];
$i = sizeof($_SESSION['cart']) ;

$data = explode('---ID', $prd);

$idprd = $data[1];


$produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE `id` =" . $idprd . ""));
$montantht = $produit['prix_ht'] * $qte;
if ($produit['tva']>0){
    $prix_ttc = $montantht + ($montantht * $produit['tva'] / 100);
}else{
    $prix_ttc = $montantht;
}


$objet = array("id" => $produit['id'], "nom" => (string) $produit['nom'],"prix_ht" => (string) $montantht, "qte" => (string) $qte, "prix_ttc" => (string) $prix_ttc,"prod_tva"=>(float)$produit['tva']);
array_push($_SESSION['cart'], $objet);
//echo '<pre>';
//print_r($objet);
//echo '</pre>';
/* $objet = array("id" => $produit['id']);
  array_push($_SESSION['prod'], $objet); */
?>
<tr data-v-561bb412="" id="trr_<?php echo $i ?>" class="line grabbable visible"  draggable="false" style="">
    <td  data-v-561bb412="" colspan="1" class="designation" >
        <input type="hidden" value="---ID<?php echo $produit['id']?>" id="pdd_<?php echo $i ?>" name="pdd">
        <input type="hidden" value="<?php echo $produit['id']?>" name="prid">
        <input type="hidden" value="<?php echo $produit['id'] . ',' . $qte ?>" name="prod[]">
        <div data-v-561bb412="" class="line-title"><?php echo $produit['ref'] ?></div> 

        <div data-v-561bb412="" class="line-description">
            <p><?php echo $produit['nom'] ?> </p>
        </div>
    </td> 
    <td  style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap price_ht">
        <?php echo $produit['prix_ht'] ?> €
    </td> 

    <td data-v-561bb412="" style="padding-top: 19px;" class="r-number no-wrap price_ht">
        <input type="hidden" value="<?php echo $qte ?>" id="aq_<?php echo $i ?>" name="pdd">

        <?php echo $qte ?>
    </td>
    <td style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap discount">
        <span data-v-561bb412="">
            <?php
            echo number_format($montantht, 2, ".", " ");
            ?> €
        </span>
    </td> 
    <td data-v-561bb412="" style="display: none;padding-top: 19px;" class="r-number no-wrap discount">
        <span data-v-561bb412="">
            <?php echo $produit['tva'] ?> %
        </span>
    </td> 
    <td data-v-561bb412="" style="display: none;padding-top: 19px;" class="quantity">
        
        <?php
            $ponteee = strpos($prix_ttc, ".");
            if ($ponteee > 0) {
                echo number_format($prix_ttc, 2, ".", " ");
            } else {
                echo number_format($prix_ttc, 2, ",", " ");
            }
            ?> €
    </td> 
    <td style="cursor:pointer" id="pr-<?php echo $produit['id']?>" onclick="removeProduct(<?php echo $produit['id']?>)"><i class="icon ion-ios-trash"></i></td>


</tr>
