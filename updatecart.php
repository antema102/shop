<?php
include ('db.php');
$id_element = $_POST['id_element'];
$prd = $_POST['prd'];
$qte = $_POST['qte'];
$aq = $_POST['aq'];
$data = explode('---ID', $prd);

$idprd = $data[1];

$produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE `id` =" . $idprd . ""));

$a_prix_ht = $produit['prix_ht'] * $aq;
$tva = $a_prix_ht * (20 / 100);
$a_prix_ttc = $a_prix_ht + $tva;
$_SESSION['prix_ht'] = $_SESSION['prix_ht'] - $a_prix_ht;
$_SESSION['prix_ttc'] = $_SESSION['prix_ttc'] - $a_prix_ttc;
$_SESSION['tva'] = $_SESSION['tva'] - $tva;
array_splice($_SESSION['cart'], $id_element, 1);

$montantht = $produit['prix_ht'] * $qte;
$prix_ttc = $montantht + ($montantht * $produit['tva'] / 100);

$objet = array("id" => $produit['id'], "nom" => (string) $produit['nom'], "prix_ht" => (string) $montantht, "qte" => (string) $qte, "prix_ttc" => (string) $prix_ttc);
array_push($_SESSION['cart'], $objet);

/* $objet = array("id" => $produit['id']);
  array_push($_SESSION['prod'], $objet); */
?>

<tr data-v-561bb412="" id="trr_<?php echo $id_element ?>" class="line grabbable visible"  draggable="false" style="">
    <td  data-v-561bb412="" colspan="1" class="designation" >
        <input type="hidden" value="---ID<?php echo $produit['id'] ?>" id="pdd_<?php echo $id_element ?>" name="pdd">
        <input type="hidden" value="<?php echo $produit['id'] . ',' . $qte ?>" name="prod[]">
        <div data-v-561bb412="" class="line-title"><?php echo $produit['ref'] ?></div> 

        <div data-v-561bb412="" class="line-description">
            <p><?php echo $produit['nom'] ?></p>
        </div>
    </td> 
    <td  style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap price_ht">
        <?php echo number_format($produit['prix_ht'], 2, '.', ' ') ?>€
    </td> 

    <td data-v-561bb412="" class="r-number no-wrap price_ht">
        <input type="hidden" value="<?php echo $qte ?>" id="aq_<?php echo $id_element ?>" name="aq">
        <input class="form-control" id="qtee_<?php echo $id_element ?>" type="text" style="border:#DADCDD" value="<?php echo $qte ?>" onblur="calculmo(<?php echo $id_element ?>)">
    </td>
    <td style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap discount">
        <span data-v-561bb412="">
            <?php
            echo number_format($montantht, 2, '.', ' ') ;
            ?>€
        </span>
    </td> 
    <td data-v-561bb412="" style="padding-top: 19px;" class="r-number no-wrap discount">
        <span data-v-561bb412="">
            <?php echo $produit['tva'] ?>%
        </span>
    </td> 
    <td data-v-561bb412="" style="padding-top: 19px;" class="quantity">
        <?php
        echo number_format($prix_ttc, 2, '.', ' ');
        ?>€
    </td> 
    <td style="cursor:pointer" id="pr-<?php echo $produit['id']?>" onclick="removeProduct(<?php echo $produit['id']?>)"><i class="icon ion-ios-trash"></i></td>

</tr>
