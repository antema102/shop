<?php

include ('db.php');

$edit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE email='" . $_SESSION['user'] . "'"));

if (isset($_POST['eng'])) {
    $civ = $_POST['radioOpenions'];
    $desc = $_POST['desc'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
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
    $insc = $_POST['insc'];
    $visit = $_POST['visit'];
    $type = $_POST['type'];
    $cr = $_POST['cr'];
    $nom_soc = $_POST['nom_soc'];

    $notes = $_POST['notes'];

    $imgg = $_POST['img1'];
    if ($imgg != '') {

        $vv = "images/";
        $img = url . $vv . $imgg;
    }

   
//echo "<pre>";
//    print_r($_POST);die;
//    echo "<pre>";
//    var_dump("INSERT INTO `client`
//    (`nom`,`prenom`, `description`, `etiquet`, `code_c`, `code_a`, `tva_i`, `siren`, `nic`, `adr`, `s_adr`, `c_adr`, `cp`, `ville`, `pays`, `site`, `email`, `tel`, `mob`, `notes`,`img`,`editeur`,`vente`,`activ`,`let_i`,`opt`,`insc`,`visit`,`type`,`nom_soc`)
//    VALUES
//           ('" .$nom."','".$prenom."','" .$desc."','".$cr.",'". $code_c . "', '" . $code_a . "', '" . $tva_i . "', '" . $siren . "', '" . $nic . "', '" . $adr . "', '" . $s_adr . "', '" . $c_adr . "', '" . $cp . "', '" . $ville . "', '" . $pays . "', '" . $site . "', '" . $email . "', '" . $tel . "', '" . $mob . "', '" . $notes . "', '" . $img . "', '" . $edit['id'] . "','" . $vente . "','" . $activ . "','" . $let_i . "','" . $opt . "','" . $insc. "','" . $visit . "','" . $type . "','" . $nom_soc . "')"
//);die();


    mysqli_query($link, "INSERT INTO `client`(`civ`,`nom`,`prenom`, `description`, `etiquet`, `code_c`, `code_a`, `tva_i`, `siren`, `nic`, `adr`, `s_adr`, `c_adr`, `cp`, `ville`, `pays`, `site`, `email`, `tel`, `mob`, `notes`,`img`,`editeur`,`vente`,`activ`,`let_i`,`opt`,`insc`,`visit`,`type`,`nom_soc`)  VALUES ('" . $civ . "','" . $nom . "', '" . $prenom . "' , '" . $desc . "' , '" . $cr . "', '" . $code_c . "', '" . $code_a . "', '" . $tva_i . "', '" . $siren . "', '" . $nic . "', '" . $adr . "', '" . $s_adr . "', '" . $c_adr . "', '" . $cp . "', '" . $ville . "', '" . $pays . "', '" . $site . "', '" . $email . "', '" . $tel . "', '" . $mob . "', '" . $notes . "', '" . $img . "', '" . $edit['id'] . "','" . $vente . "','" . $activ . "','" . $let_i . "','" . $opt . "','" . $insc. "','" . $visit . "','" . $type . "','" . $nom_soc . "')");

    echo '<script>window.location=("client.php") </script>';
}
?>



