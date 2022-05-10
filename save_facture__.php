<?php

include 'db.php';
if (isset($_POST['devadd'])) {

    echo "<pre>";
    print_r($_POST['devadd']);

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
    $type = $_POST['typev'] . '-' . $_POST['typec'] . '-' . $_POST['typeb']. '-' . $_POST['types'];
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

    $max = mysqli_fetch_array(mysqli_query($link, "SELECT max(id) as nb  FROM `facture`"));
    $maximum = $max['nb'] + 1;


    $nbrs = count($_POST['prod']);
    for ($key = 0; $key < $nbrs; $key++) {
        $prodid = addslashes($_POST['prod'][$key]);
        $tab = explode(",", $prodid);
        mysqli_query($link, "INSERT INTO  `detail_facture`(id_devis ,`num`, `id_prod`) VALUES('" . $maximum . "','" . $num . "','" . $prodid . "') ");

        $prd = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id='" . $tab[0] . "' "));
        $qtee = $tab[1];
        $rest = $prd['stock'] - $qtee;
        $vent = $prd['vent'] + $qtee;

        mysqli_query($link, "  UPDATE `produit` SET stock = '" . $rest . "',vent= " . $vent . " where id='" . $tab[0] . "' ");
    }
    $cltnom = $clt['nom'] . ' ' . $clt['prenom'];
    $cltpre = $clt['prenom'] . ' ' . $clt['nom'];

    $prixttc1 = $_POST['prixht1'];

    $prixttcremise = $_POST['prixttc1'];
    $netapayer = $_POST['prixttc11'];
    $remise = $_POST['prixht1'] - $_POST['prixttc1'] ;
    $commentaire=$_POST['commentaire'];
//    $tva1 = floatval($_POST['prixht1']) - str_replace(".00","",floatval($_POST['prixttc1']));
//
//echo"<pre>";
//print_r($_POST);
//die;
//    echo    "INSERT INTO  `facture`(id,`num`, `titre`, `client`,date_add,validite,reg , prix_ht, tva, prix_ttc,mode_liv,frais_liv ,etat,type,adr,cp,pays,ville,cltnom,cltpre ) VALUES(" . $maximum . ",'" . $num . "','" . $titre . "','" . $client . "','" . $dateadd . "','" . $datee . "'," . $reg . ",'" . $mtht . "','" . $mttva . "','" . $mtttc . "','" . $mode_liv . "','" . $frais_liv . "','" . $etat . "','" . $type . "','" . $adrf . "','" . $cpf . "','" . $paysf . "','" . $villef . "','" . $cltnom . "','" . $cltpre . "'";die;

    mysqli_query($link, "INSERT INTO  `facture`(id,`num`, `titre`, `client`,date_add,validite,reg , prix_ht, tva, prix_ttc,mode_liv,frais_liv ,etat,type,adr,cp,pays,ville,cltnom,cltpre,prixttcremise,netpayer,remise,commentaire ) VALUES(" . $maximum . ",'" . $num . "','" . $titre . "','" . $client . "','" . $dateadd . "','" . $datee . "'," . $reg . ",'" . $mtht . "','" . $mttva . "','" . $mtttc . "','" . $mode_liv . "','" . $frais_liv . "','" . $etat . "','" . $type . "','" . $adrf . "','" . $cpf . "','" . $paysf . "','" . $villef . "','" . $cltnom . "','" . $cltpre . "','" . $prixttcremise . "','" . $netapayer . "','" . $remise . "','" . $commentaire . "') ")or die(mysqli_error($link));
    echo '<script>window.location=("facture.php") </script>';
}
?>

