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
    // $type = $_POST['typev'] . '-' . $_POST['typec'] . '-' . $_POST['typeb'];
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

    $max = mysqli_fetch_array(mysqli_query($link, "SELECT max(id) as nb  FROM `devis`"));
    $maximum = $max['nb'] + 1;



    $iddev = mysqli_insert_id($link);

    $nbrs = count($_POST['prod']);
    for ($key = 0; $key < $nbrs; $key++) {
        $prodid = addslashes($_POST['prod'][$key]);
        mysqli_query($link, "INSERT INTO  `detail_devis`(id_devis ,`num`, `id_prod`) VALUES('" . $maximum . "', '" . $num . "','" . $prodid . "') ");
    }
    
        $cltnom = $clt['nom'].' '.$clt['prenom'] ;
        $cltpre = $clt['prenom'].' '.$clt['nom'] ;

    $prixttc1 = $_POST['prixht1'];

    $prixttcremise = $_POST['prixttc1'];
    $netapayer = $_POST['prixttc11'];
   // $remise = $_POST['prixht1'] - $_POST['prixttc1'] ;

    $remise_globale = '';
    if (isset($_POST['tva2'])) {
    $remise_globale = ($_POST['tva2'] * $mtht) / 100;
    $montant_total_ht = $mtht - $remise_globale;
    $remise = ($montant_total_ht * 20) / 100;
    }

    $commentaire = $_POST['commentaire'];
    mysqli_query($link, "INSERT INTO  `devis`(id, `num`, `titre`, `client`,date_add,validite,reg , prix_ht, tva, prix_ttc,mode_liv,frais_liv,tva_liv,etat,type,adr,cp,pays,ville,cltnom,cltpre ,commentaire,prixttcremise,netpayer,remise,montant_total_ht,remise_globale) VALUES(" . $maximum . ", '" . $num . "','" . $titre . "','" . $client . "','" . $dateadd . "','" . $date . "'," . $reg . ",'" . $mtht . "','" . $mttva . "','" . $mtttc . "','" . $mode_liv . "','" . $frais_liv . "','" . $tvaLiv . "','" . $etat . "','" . $type . "','" . $adrf . "','" . $cpf . "','" . $paysf . "','" . $villef . "','" . $cltnom. "','" . $cltpre . "','" . $commentaire . "','" . $prixttcremise . "','" . $netapayer . "','" . $remise . "','" . $montant_total_ht . "','" . $remise_globale . "') ")or die(mysqli_error($link));
    
    
    //test numDevis
  $idDevis = mysqli_insert_id($link);
  if ($idDevis == 0) {
    $numDevis = "DEV000000";
} else {

    if (($idDevis < 10)) {
        $numDevis = "DEV00000" . $idDevis;
    }
    if (($idDevis < 100) && ($idDevis >= 10)) {
        $numDevis = "DEV0000" . $idDevis;
    }
    if (($idDevis < 1000) && ($idDevis >= 100)) {
        $numDevis = "DEV000" . $idDevis;
    }
    if (($idDevis < 10000) && ($idDevis >= 1000)) {
        $numDevis = "DEV00" . $idDevis;
    }
    if (($idDevis < 100000) && ($idDevis >= 10000)) {
        $numDevis = "DEV0" . $idDevis;
    }
}

mysqli_query($link, "UPDATE `devis` SET `num` = '" . $numDevis . "' WHERE `id` = '" . $idDevis . "' ")or die(mysqli_error($link));
mysqli_query($link, "UPDATE `detail_devis` SET `num` = '" . $numDevis . "' WHERE `id_devis` = '" . $idDevis . "' ");
   
    
    echo '<script>window.location=("devis.php") </script>';
}
?>

