<?php

include ('db.php');

$edit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE email='" . $_SESSION['user'] . "'"));
if (isset($_POST['eng'])) {
    $id = $_POST['id'];
    $desc = $_POST['desc'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $etiquet = $_POST['etiquet'];
    $code_c = $_POST['code_c'];
    $code_a = $_POST['code_a'];
    $tva_i = $_POST['tva_i'];
    $siren = $_POST['siren'];
    $nic = $_POST['nic'];
    $adr = $_POST['adr'];
    $s_adr = $_POST['s_adr'];
    $c_adr = $_POST['c_adr'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $site = $_POST['site'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $mob = $_POST['mob'];
    $vente = $_POST['vente'];
    $activ = $_POST['activ'];
    $let_i = $_POST['let_i'];
    $opt = $_POST['opt'];
    $insc = $_POST['activ'];
    $visit = $_POST['visit'];
    $notes = $_POST['notes'];
    $imgg = $_POST['img1'];
    $type = $_POST['type'];
    if ($imgg != '') {
        $vv = "images/";
        $img = url . $vv . $imgg;
    }
    $nom_soc = $_POST['nom_soc'];

    $check_list = ($_POST['check_list']);
    foreach ($check_list as $check_list_p) {
        $check_listt .= $check_list_p . "-";
    }
    mysqli_query($link, " UPDATE client  SET type='" . $type . "', nom ='" . $nom . "',  prenom='" . $prenom . "' , description = '" . $desc . "' , etiquet = '" . $etiquet . "' ,  siren = '" . $siren . "'  , code_c ='" . $code_c . "',  code_a = '" . $code_a . "', tva_i='" . $tva_i . "',  nic= '" . $nic . "', adr = '" . $adr . "', s_adr='" . $s_adr . "',c_adr='" . $c_adr . "', cp='" . $cp . "', ville='" . $ville . "', pays='" . $pays . "', site='" . $site . "', email='" . $email . "', tel='" . $tel . "', mob= '" . $mob . "' ,img='" . $img . "', editeur=" . $edit['id'] . " ,  notes = '" . $notes . "' ,vente='" . $vente . "' , activ='" . $activ . "', let_i='" . $let_i . "', opt='" . $opt . "', insc='" . $insc . "' , visit='" . $visit . "' , nom_soc= '" . $nom_soc . "'  WHERE id=" . $id . "");



    echo '<script>window.location=("detail_client.php?id=' . $id . '") </script>';
}
?>



