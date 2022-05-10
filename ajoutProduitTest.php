<?php
include ('db.php');

$i = sizeof($_SESSION['cart']) ;

$user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE email='" . $_SESSION['user'] . "'"));

$produitRef = $_GET['produitRef'];
$produitNom = $_GET['produitNom'];
$produitCateg = $_GET['produitCateg'];
$qnt = $_GET['qnt'];
$fournisseur = '';
if(isset($_GET['fournisseur'])){
$fournisseur = $_GET['fournisseur'];
}
$prixHT = $_GET['prixHT'];
$tva = $_GET['tva'];
$prixTTc = $_GET['prixTTc'];
$coutAchat = $_GET['coutAchat'];
$coefMultip = $_GET['coefMultip'];
$MargeCom = $_GET['MargeCom'];
$courTransport = $_GET['courTransport']; 
$fromm = '1';

$cat_n = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `cat` WHERE id='" . $produitCateg . "'"));
mysqli_query($link, "INSERT INTO produit(ref, nom, cat_id,cat_nom, prix_ht, tva, prix_ttc, cout_achat_ht, eco,fromm ,editeur,marge,stocka,stock,stock_min,seil_s,idfournisseur,courtransport)VALUES ('" . $produitRef . "', '" . $produitNom . "', '" . $produitCateg . "','" . $cat_n['cat'] . "', '" . $prixHT . "', '" . $tva . "', '" . $prixTTc . "','" . $coutAchat . "', '" . $coefMultip . "','" . $fromm . "','" . $user['id'] . "','" . $MargeCom . "' ,'1' ,'0','0','0','" . $fournisseur ."','" . $courTransport ."')")or die(mysqli_error($link));
$id = mysqli_insert_id($link);

// mise ajour code bar
if ($id && is_int($id) && $id >0) {
    $sql = "UPDATE produit SET code_a_barre= LPAD(id, 8, '0') WHERE id = ".$id;
    mysqli_query($link, $sql); 
}

$montantht = $prixHT * $qnt;
if ($tva>0){
    $prix_ttc = $montantht + ($montantht * $tva / 100);
}else{
    $prix_ttc = $montantht;
}

$objet = array("id" => $id, "nom" => (string) $produitNom,"prix_ht" => (string) $montantht, "qte" => (string) $qnt, "prix_ttc" => (string) $prix_ttc,"prod_tva"=>(float)$tva);
array_push($_SESSION['cart'], $objet);

?>

<tr data-v-561bb412="" id="trr_<?php echo $i ?>" class="line grabbable visible"  draggable="false" style="">
    <td  data-v-561bb412="" colspan="1" class="designation" >
        <input type="hidden" value="---ID<?php echo $id ?>" id="pdd_<?php echo $i ?>" name="pdd">
        <input type="hidden" value="<?php echo $id ?>" name="prid">
        <input type="hidden" value="<?php echo $id . ',' . $qnt ?>" name="prod[]">
        <div data-v-561bb412="" class="line-title"><?php echo $produitRef ?></div> 

        <div data-v-561bb412="" class="line-description">
            <p><?php echo $produitNom ?> </p>
        </div>
    </td> 
    <td  style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap price_ht">
        <?php echo $prixHT ?> €
    </td> 

    <td data-v-561bb412="" style="padding-top: 19px;" class="r-number no-wrap price_ht">
        <input type="hidden" value="<?php echo $qnt ?>" id="aq_<?php echo $i ?>" name="pdd">

        <?php echo $qnt ?>
    </td>
    <td style="padding-top: 19px;" data-v-561bb412="" class="r-number no-wrap discount">
        <span data-v-561bb412="">
            <?php
            echo number_format($montantht, 2, ".", " ");
            ?> €
        </span>
    </td> 
    <td data-v-561bb412="" style="padding-top: 19px;" class="r-number no-wrap discount">
        <span data-v-561bb412="">
            <?php echo $tva ?> %
        </span>
    </td> 
    <td data-v-561bb412="" style="padding-top: 19px;" class="quantity">
        
        <?php
            $ponteee = strpos($prix_ttc, ".");
            if ($ponteee > 0) {
                echo number_format($prix_ttc, 2, ".", " ");
            } else {
                echo number_format($prix_ttc, 2, ",", " ");
            }
            ?> €
    </td> 
    <td style="cursor:pointer" id="pr-<?php echo $id ?>" onclick="removeProduct(<?php echo $id ?>)"><i class="icon ion-ios-trash"></i></td>
</tr>
