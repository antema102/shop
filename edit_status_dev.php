<?php

$nof = 0;
include ('db.php');
$etat = $_GET['etat'];
$id = $_GET['id'];
$devis = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `devis` WHERE id=" . $id . ""));


mysqli_query($link, "UPDATE `devis` SET etat= '" . $etat . "' WHERE id=" . $id . "");

if ($etat == 2) {
    $max = mysqli_fetch_array(mysqli_query($link, "select max(id) as nb from facture"));
    if ($max['nb'] == 0) {
        $maximum = "FAC000001";
    } else {
        $maximum = $max['nb'] + 1;


        if (($maximum < 10)) {
            $maximum = "FAC00000" . $maximum;
        }
        if (($maximum < 100) && ($maximum >= 10)) {
            $maximum = "FAC0000" . $maximum;
        }
        if (($maximum < 1000) && ($maximum >= 100)) {
            $maximum = "FAC000" . $maximum;
        }
        if (($maximum < 10000) && ($maximum >= 1000)) {
            $maximum = "FAC00" . $maximum;
        }
        if (($maximum < 100000) && ($maximum >= 10000)) {
            $maximum = "FAC0" . $maximum;
        }
    }


    $num = $maximum;
    $titre = $devis['titre'];
    $client = $devis['client'];
    $date = $devis['validite'];
    $reg = $devis['reg'];
    $mtht = $devis['prix_ht'];
    $mttva = $devis['tva'];
    $mtttc = $devis['prix_ttc'];
    $mode_liv = $devis['mode_liv'];
    $frais_liv = $devis['frais_liv'];
    $etat = 0;
    $type = $devis['type'];
    $adrf = $devis['adr'];
    $cpf = $devis['cp'];
    $paysf = $devis['pays'];
    $villef = $devis['ville'];
    $dateadd = date("d-m-Y");
    $maxid = mysqli_fetch_array(mysqli_query($link, "SELECT max(id) as nb  FROM `espace`"));
    $maximumid = $max['nb'] + 1;

    mysqli_query($link, "INSERT INTO  `facture`(id,`num`, `titre`, `client`,date_add,validite,reg , prix_ht, tva, prix_ttc,mode_liv,frais_liv ,etat,type,adr,cp,pays,ville ) VALUES(" . $maximumid . ",'" . $maximum . "','" . $titre . "','" . $client . "','" . $dateadd . "','" . $date . "'," . $reg . ",'" . $mtht . "','" . $mttva . "','" . $mtttc . "','" . $mode_liv . "','" . $frais_liv . "','" . $etat . "','" . $type . "','" . $adrf . "','" . $cpf . "','" . $paysf . "','" . $villef . "') ")or die(mysqli_error($link));
    $devis_detail_sql = mysqli_query($link, "SELECT * FROM `detail_devis` WHERE id_devis=" . $id . "");
    while ($devis_detail = mysqli_fetch_array($devis_detail_sql)) {
        $prodid = $devis_detail['id_prod'];
        mysqli_query($link, "INSERT INTO  `detail_facture`(id_devis ,`num`, `id_prod`) VALUES('" . $maximumid . "','" . $maximum . "','" . $prodid . "') ");
    }
}
?>


