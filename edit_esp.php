<?php
//var_dump($_POST);die();
include 'db.php';
$produit=$_SESSION['deletedProd'];


if (isset($_POST['devadd'])) {
    $id_devv = $_POST['iddev'];
    $dev = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `espace` where id=" . $id_devv));
    $num = $dev['num'];
    $titren = $_POST['titre'];
    if ($titren == '') {
        $titre = $dev['titre'];
    } else {
        $titre = $_POST['titre'];
    }
    $clientn = $_POST['clientd'];
    if ($clientn == '') {
        $client = $dev['client'];
    } else {
        $client = $_POST['clientd'];
    }
    $daten = $_POST['date'];
    if ($daten == '') {
        $date = $dev['validite'];
    } else {
        $date = $_POST['date'];
    }
    $regn = $_POST['reg'];
    if ($regn == '') {
        $reg = $dev['reg'];
    } else {
        $reg = $regn;
    }
    $mthtn = $_POST['mtht'];
    if ($mthtn == '') {
        $mtht = $dev['prix_ht'];
    } else {
        $mtht = $_POST['mtht'];
    }

    $mttvan = $_POST['mttva'];
    if ($mttvan == '') {
        $mttva = $dev['tva'];
    } else {
        $mttva = $_POST['mttva'];
    }
    $mtttcn = $_POST['mtttc'];
    if ($mtttcn == '') {
        $mtttc = $dev['prix_ttc'];
    } else {
        $mtttc = $_POST['mtttc'];
    }

    $mode_livn = $_POST['mol'];
    if ($mode_livn == '') {
        $mode_liv = $dev['mode_liv'];
    } else {
        $mode_liv = $_POST['mol'];
    }

    $frais_livn = $_POST['frl'];
    if ($frais_livn == '') {
        $frais_liv = $dev['frais_liv'];
    } else {
        $frais_liv = $_POST['frl'];
    }
    $etat = $dev['etat'];
    $typev = $_POST['typev'];
    $typec = $_POST['typec'];
    $typeb = $_POST['typeb'];

    $tabt = explode("-", $dev['type']);

    $commentaire = $_POST['commentaire'];

//    if ($typev == '' && $typec == '' && $typeb == '') {
//        $type = $tabt[0] . '-' . $tabt[1] . '-' . $tabt[2];
//    }
//
//    if ($typev != '' || $typec != '' || $typeb != '') {
//        $type = $typev . '-' . $typec . '-' . $typeb;
//    }



    $adrliv = $_POST['adrliv'];
    $cp = $_POST['cp'];
    $villel = $_POST['villel'];
    $paysl = $_POST['paysl'];

    $clt = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` where id=" . $client));


    if ($adrliv == '' || $cp == '' || $villel == '' || $paysl == '') {
        $adrf = $clt['adr'];
        $cpf = $clt['cp'];
        $paysf = $clt['pays'];
        $villef = $clt['ville'];
    } else {
        $adrf = $adrliv;
        $cpf = $cp;
        $paysf = $paysl;
        $villef = $clt;
    }
    $dateadd = date("d-m-Y");

    $iddev = mysqli_insert_id($link);

    $nbrs = count($_POST['prod']);
    for ($key = 0; $key < $nbrs; $key++) {
        $prodid = addslashes($_POST['prod'][$key]);
        mysqli_query($link, "INSERT INTO  `detail_espace`(id_devis ,`num`, `id_prod`) VALUES(" . $id_devv . ", '" . $num . "','" . $prodid . "') ");
    }

    $cltnom = $clt['nom'] . ' ' . $clt['prenom'];
    $cltpre = $clt['prenom'] . ' ' . $clt['nom'];

    $prixttcremise = [$mtttc];
    $netapayer = $_POST['prixttc11'];
    $remise = $_POST['prixht1'] - $_POST['prixttc1'] ;

//    echo "<pre>";
//    print_r($cltpre);

    mysqli_query($link, "UPDATE `espace` SET `titre` = '" . $titre . "',`cltnom` = '" . $cltnom . "',`cltpre` = '" . $cltpre . "',reg='" . $reg .  "',validite='" . $date . "',prix_ht='" . $mtht . "',tva='" . $mttva . "',prix_ttc='" . $mtttc . "',mode_liv='" . $mode_liv . "', frais_liv='" . $frais_liv . "', type='" . $type . "',adr='" . $adrf . "',cp='" . $cpf . "',pays='" . $paysf . "',ville='" . $villef . "' ,client='" . $clt['id'] . "',commentaire='" . $commentaire."',prixttcremise='" . $prixttcremise . "' ,netpayer='" . $netapayer . "' ,remise='" . $remise . "' where id='" . $id_devv . "'")or die(mysqli_error($link));
}

if (isset($produit)){

    foreach ($produit as $item){
        mysqli_query($link, "DELETE FROM `detail_espace` WHERE id =" .$item. "");

    }



}

foreach($_SESSION as $key => $value) {
    if($key != 'user') {
        unset($_SESSION[$key]);
    }
}

echo '<script>window.location=("detail_espace.php?id=' . $id_devv . '") </script>';

?>

