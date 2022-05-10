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
    $type = 'Espèces';
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


    $max = mysqli_fetch_array(mysqli_query($link, "SELECT max(id) as nb  FROM `espace`"));
    $maximum = $max['nb'] + 1;

    $nbrs = count($_POST['prod']);


    for ($key = 0; $key < $nbrs; $key++) {
        $prodid = addslashes($_POST['prod'][$key]);
        $tab = explode(",", $prodid);
        mysqli_query($link, "INSERT INTO  `detail_espace`(id_devis ,`num`, `id_prod`) VALUES('" . $maximum . "','" . $num . "','" . $prodid . "') ");

        $prd = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id='" . $tab[0] . "' "));
        $qtee = $tab[1];
        $rest = $prd['stock'] - $qtee;

        mysqli_query($link, "  UPDATE `produit` SET stock = '" . $rest . "' where id='" . $tab[0] . "' ");
    }

    $cltnom = $clt['nom'] . ' ' . $clt['prenom'];
    $cltpre = $clt['prenom'] . ' ' . $clt['nom'];

    $prixttc1 = $_POST['prixht1'];
    $prixttcremise = $_POST['prixttc1'];
    $netapayer = $_POST['prixttc11'];
    //$remise = $_POST['prixht1'] - $_POST['prixttc1'] ;

    $remise_globale = '';
    if (isset($_POST['tva2'])) {
    $remise_globale = ($_POST['tva2'] * $mtht) / 100;
    $montant_total_ht = $mtht - $remise_globale;
    $remise = ($montant_total_ht * 20) / 100;
    }


    $commentaire = $_POST['commentaire'];
    mysqli_query($link, "INSERT INTO  `espace`(id,`num`, `titre`, `client`,date_add,validite,reg , prix_ht, tva, prix_ttc,mode_liv,frais_liv,tva_liv,etat,type,adr,cp,pays,ville,cltnom,cltpre ,prixttcremise,netpayer,remise,montant_total_ht,remise_globale,commentaire) VALUES(" . $maximum . ",'" . $num . "','" . $titre . "','" . $client . "','" . $dateadd . "','" . $datee . "'," . $reg . ",'" . $mtht . "','" . $mttva . "','" . $mtttc . "','" . $mode_liv . "','" . $frais_liv . "','" . $tvaLiv . "','" . $etat . "','" . $type . "','" . $adrf . "','" . $cpf . "','" . $paysf . "','" . $villef . "','" . $cltnom . "','" . $cltpre . "','" . $prixttcremise . "','" . $netapayer . "','" . $remise . "','" . $montant_total_ht . "','" . $remise_globale . "','" . $commentaire . "') ")or die(mysqli_error($link));

    //test num espace
  $idEspace = mysqli_insert_id($link);
  if ($idEspace == 0) {
    $numEspace = "ES000000";
} else {

    if (($idEspace < 10)) {
        $numEspace = "ES00000" . $idEspace;
    }
    if (($idEspace < 100) && ($idEspace >= 10)) {
        $numEspace = "ESC0000" . $idEspace;
    }
    if (($idEspace < 1000) && ($idEspace >= 100)) {
        $numEspace = "ESC000" . $idEspace;
    }
    if (($idEspace < 10000) && ($idEspace >= 1000)) {
        $numEspace = "ES00" . $idEspace;
    }
    if (($idEspace < 100000) && ($idEspace >= 10000)) {
        $numEspace = "ES0" . $idEspace;
    }
}

mysqli_query($link, "UPDATE `espace` SET `num` = '" . $numEspace . "' WHERE `id` = '" . $idEspace . "' ")or die(mysqli_error($link));
mysqli_query($link, "UPDATE `detail_espace` SET `num` = '" . $numEspace . "' WHERE `id_devis` = '" . $idEspace . "' ");
 
   
    echo '<script>window.location=("espace.php") </script>';
}else

if ($_POST['action'] == 'Imprimer') {
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
    $etat = 0;
    $type = 'Espèces';
    $adrliv = $_POST['adrliv'];
    $cp = $_POST['cp'];
    $villel = $_POST['villel'];
    $paysl = $_POST['paysl'];
    $clt = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` where id=" . $client));


    if ($adrliv == '' || cp == '' || villel == '' || paysl == '') {

        $adrf = addslashes(utf8_encode($clt['adr']));
        $cpf = addslashes(utf8_encode($clt['cp']));
        $paysf = addslashes(utf8_encode($clt['pays']));
        $villef = addslashes(utf8_encode($clt['ville']));
    } else {
        $adrf = addslashes(utf8_encode($adrliv));
        $cpf = addslashes(utf8_encode($cp));
        $paysf = addslashes(utf8_encode($paysl));
        $villef = addslashes(utf8_encode($villef));
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


    $max = mysqli_fetch_array(mysqli_query($link, "SELECT max(id) as nb  FROM `espace`"));
    $maximum = $max['nb'] + 1;

    $nbrs = count($_POST['prod']);


    for ($key = 0; $key < $nbrs; $key++) {
        $prodid = addslashes($_POST['prod'][$key]);
        $tab = explode(",", $prodid);
        mysqli_query($link, "INSERT INTO  `detail_espace_print`(id_devis ,`num`, `id_prod`) VALUES('" . $maximum . "','" . $num . "','" . $prodid . "') ");

        $prd = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id='" . $tab[0] . "' "));
        $qtee = $tab[1];
        $rest = $prd['stock'] - $qtee;

       // mysqli_query($link, "  UPDATE `produit` SET stock = '" . $rest . "' where id='" . $tab[0] . "' ");
    }

    $cltnom = $clt['nom'] . ' ' . $clt['prenom'];
    $cltpre = $clt['prenom'] . ' ' . $clt['nom'];

    $commentaire = $_POST['commentaire'];
    $result = mysqli_query($link, "INSERT INTO  `espace_print`(id,`num`, `titre`, `client`,date_add,validite,reg , prix_ht, tva, prix_ttc,mode_liv,frais_liv ,etat,type,adr,cp,pays,ville,cltnom,cltpre ,commentaire) VALUES(" . $maximum . ",'" . $num . "','" . $titre . "','" . $client . "','" . $dateadd . "','" . $date . "'," . $reg . ",'" . $mtht . "','" . $mttva . "','" . $mtttc . "','" . $mode_liv . "','" . $frais_liv . "','" . $etat . "','" . $type . "','" . $adrf . "','" . $cpf . "','" . $paysf . "','" . $villef . "','" . $cltnom . "','" . $cltpre . "','" . $commentaire . "') ")or die(mysqli_error($link));
    $id = mysqli_insert_id($link);
    echo '<script>window.location=("print_preview.php?id=' . $id . '") </script>';
}
?>

