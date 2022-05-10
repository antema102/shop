<?php

include 'db.php';
if (isset($_POST['devadd'])) {
    $num = $_POST['numdev'];
    $titre = $_POST['titre'];
    $client = $_POST['clientd'];
    $date = $_POST['date'];
    $rege = $_POST['reg'];
    $mtht = $_POST['mtht'];
    $mttva = $_POST['mttva'];
    $mtttc = $_POST['mtttc'];
    $mode_liv = $_POST['mol'];
    $frais_liv = $_POST['frl'];
	$tvaLiv = $_POST['tvaLiv'];
    $etat = 0;
    /*$type = $_POST['typev'];*/
	$type = $_POST['typev'] . '-' . $_POST['typec'] . '-' . $_POST['typeb']. '-' . $_POST['types'];
    $adrliv = $_POST['adrliv'];
    $cp = $_POST['cp'];
    $villel = $_POST['villel'];
    $paysl = $_POST['paysl'];
    $clt = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` where id=" . $client));


    if ($adrliv == '' || $cp == '' || $villel == '' || $paysl == '') {
        
        $adrf = addslashes(utf8_encode($clt['adr']));
        $cpf = addslashes(utf8_encode($clt['cp']));
        $paysf = addslashes(utf8_encode($clt['pays'])); 
        $villef = addslashes(utf8_encode($clt['ville'])); 
    } else {
        $adrf = addslashes(utf8_encode($adrliv)); 
        $cpf = addslashes(utf8_encode($cp)); 
        $paysf = addslashes(utf8_encode($paysl));
        $villef = addslashes(utf8_encode($villel));
    }

    $dateadd = date("d-m-Y");
    
    if ($date == '') {
        $datee = date("d-m-Y");
    } else {
        $datee = $date;
    }

    if ($rege == '') {
        $reg = '0';
    } else {
        $reg = $rege;
    }
    $max = mysqli_fetch_array(mysqli_query($link, "SELECT max(id) as nb  FROM `avoir`"));
    $maximum = $max['nb'] + 1;

    $nbrs = count($_POST['prod']);


    for ($key = 0; $key < $nbrs; $key++) {
        $prodid = addslashes($_POST['prod'][$key]);
        $tab = explode(",", $prodid);
        mysqli_query($link, "INSERT INTO  `detail_avoir`(id_devis ,`num`, `id_prod`) VALUES(" . $maximum . ",'" . $num . "','" . $prodid . "') ");

        $prd = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id='" . $tab[0] . "' "));
        $qtee = $tab[1];
        $rest = $prd['stock'] + $qtee;
        $vent = $prd['vent'] - $qtee;

        mysqli_query($link, "  UPDATE `produit` SET stock = '" . $rest . "', vent = " . $vent . " where id='" . $tab[0] . "' ");
    }
    $cltnom = $clt['nom'] . ' ' . $clt['prenom'];
    $cltpre = $clt['prenom'] . ' ' . $clt['nom'];


    $prixttc1 = $_POST['prixht1'];

    $prixttcremise = $_POST['prixttc1'];

    $netapayer = $_POST['prixttc11'];


    $remise_globale = '';
    if (isset($_POST['tva2'])) {
    $remise_globale = ($_POST['tva2'] * $mtht) / 100;
    $montant_total_ht = $mtht - $remise_globale;
    $remise = ($montant_total_ht * 20) / 100;
    }

    $commentaire = $_POST['commentaire'];
    mysqli_query($link, "INSERT INTO  `avoir`(id,`num`, `titre`, `client`, date_add,validite,reg ,prix_ht, tva, prix_ttc,mode_liv,frais_liv,tva_liv,type,adr,cp,pays,ville,cltnom,cltpre,prixttcremise,netpayer,remise,montant_total_ht,remise_globale,commentaire) VALUES(" . $maximum . ",'" . $num . "','" . $titre . "','" . $client . "','" . $dateadd . "','" . $datee . "'," . $reg . ",'" . $mtht . "','" . $mttva . "','" . $mtttc . "','" . $mode_liv . "','" . $frais_liv . "','" . $tvaLiv . "','" . $type . "','" . $adrf . "','" . $cpf . "','" . $paysf . "','" . $villef . "','" . $cltnom . "','" . $cltpre . "','" . $prixttcremise . "','" . $netapayer . "','" . $remise . "','" . $montant_total_ht . "','" . $remise_globale . "','" . $commentaire . "') ")or die(mysqli_error($link));
   
    //test numAvoir
  $idAvoir = mysqli_insert_id($link);
  if ($idAvoir == 0) {
    $numAvoir = "AV000000";
} else {

    if (($idAvoir < 10)) {
        $numAvoir = "AV00000" . $idAvoir;
    }
    if (($idAvoir < 100) && ($idAvoir >= 10)) {
        $numAvoir = "AV0000" . $idAvoir;
    }
    if (($idAvoir < 1000) && ($idAvoir >= 100)) {
        $numAvoir = "AV000" . $idAvoir;
    }
    if (($idAvoir < 10000) && ($idAvoir >= 1000)) {
        $numAvoir = "AV00" . $idAvoir;
    }
    if (($idAvoir < 100000) && ($idAvoir >= 10000)) {
        $numAvoir = "AV0" . $idAvoir;
    }
}

mysqli_query($link, "UPDATE `avoir` SET `num` = '" . $numAvoir . "' WHERE `id` = '" . $idAvoir . "' ")or die(mysqli_error($link));
mysqli_query($link, "UPDATE `detail_avoir` SET `num` = '" . $numAvoir . "' WHERE `id_devis` = '" . $idAvoir . "' ");
    
echo '<script>window.location=("avoir.php") </script>';
}
?>

