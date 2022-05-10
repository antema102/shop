<?php

include ('db.php');
if (isset($_POST['cree'])) {
//    echo "<pre>";
//    print_r($_POST);die;
    $user = mysqli_fetch_array(mysqli_query($link, "select * from user where email ='" . $_SESSION['user'] . "'"));
    $ref = $_POST['ref'];
    $nom = $_POST['nom'];
    $code_a_barre = $_POST['code_a_barre'];
    $cat = $_POST['cat'];
    $code_a = $_POST['code'];
    $lien_v_p = $_POST['lien'];
    $description = $_POST['desc'];
    $prix_ht = $_POST['prixht'];
    $tva = $_POST['tva'];
    $prix_ttc = $_POST['prixttc'];
//    $cout_achat_ht = $_POST['achatht'];
    $cout_achat_ht = $_POST['coutachat'];
    $eco = $_POST['eco'];
    $marge = $_POST['marge'];
    $fromm = '1';
    $imgg = $_POST['img1'];
    $vv = "photos/";
    $four = $_POST['four'];
    $img = url . $vv . $imgg;
    $date1= $_POST['datecommande']?$_POST['datecommande']:"0001-01-01";
    $date2 = $_POST['dateapprovisionnement']?$_POST['dateapprovisionnement']:"0001-01-01";
    $idfournisseur = $_POST['four'];
    $courtransport = $_POST['courtransport'];
//    var_dump($idfournisseur);die;
//echo "INSERT INTO produit(ref, nom, cat_id,cat_nom, code_a, lien_v_p, description, prix_ht, tva, prix_ttc, cout_achat_ht, eco,fromm ,img,editeur,code_a_barre,four,marge,stocka,stock,stock_min,seil_s,dateapprovisionnement,datecommande,idfournisseur)VALUES ('" . $ref . "', '" . $nom . "', '" . $cat . "','" . $cat_n['cat'] . "', '" . $code_a . "', '" . $lien_v_p . "', '" . $description . "', '" . $prix_ht . "', '" . $tva . "', '" . $prix_ttc . "','" . $cout_achat_ht . "', '" . $eco . "','" . $fromm . "','" . $img . "','" . $user['id'] . "','" . $code_a_barre . "','" . $four . "','" . $marge . "' ,'1' ,'0','0','0','" . $date2 . "','" . $date1 . "','" . $idfournisseur ."')";die;
    $cat_n = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `cat` WHERE id='" . $cat . "'"));
    mysqli_query($link, "INSERT INTO produit(ref, nom, cat_id,cat_nom, code_a, lien_v_p, description, prix_ht, tva, prix_ttc, cout_achat_ht, eco,fromm ,img,editeur,code_a_barre,four,marge,stocka,stock,stock_min,seil_s,dateapprovisionnement,datecommande,idfournisseur,courtransport)VALUES ('" . $ref . "', '" . $nom . "', '" . $cat . "','" . $cat_n['cat'] . "', '" . $code_a . "', '" . $lien_v_p . "', '" . $description . "', '" . $prix_ht . "', '" . $tva . "', '" . $prix_ttc . "','" . $cout_achat_ht . "', '" . $eco . "','" . $fromm . "','" . $img . "','" . $user['id'] . "','" . $code_a_barre . "','" . $four . "','" . $marge . "' ,'1' ,'0','0','0','" . $date2 . "','" . $date1 . "','" . $idfournisseur ."','" . $courtransport ."')")or die(mysqli_error($link));

    echo '<script>window.location=("produit.php") </script>';
}
?>



