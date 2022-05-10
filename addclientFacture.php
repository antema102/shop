<?php

include ('db.php');

$user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE email='" . $_SESSION['user'] . "'"));

$civ = $_GET['civ'];
$nomClient = $_GET['nomClient'];
$prenomClient = $_GET['prenomClient'];
$etiquet = $_GET['crClient'];
$adrClient = $_GET['adrClient'];
$cpClient = $_GET['cpClient'];
$villeClient = $_GET['villeClient'];
$paysClient = $_GET['paysClient'];
$mobClient = $_GET['mobClient'];
$socClient = $_GET['socClient'];


    mysqli_query($link, "INSERT INTO `client`(`civ`,`nom`,`prenom`, `description`, `etiquet`, `code_c`, `code_a`, `tva_i`, `siren`, `nic`, `adr`, `s_adr`, `c_adr`, `cp`, `ville`, `pays`, `site`, `email`, `tel`, `mob`, `notes`,`img`,`editeur`,`vente`,`activ`,`let_i`,`opt`,`insc`,`visit`,`type`,`nom_soc`)  VALUES ('" . $civ . "','" . $nomClient . "', '" . $prenomClient . "' , '' , '" . $etiquet . "', '', '', '', '', '', '" . $adrClient . "', '', '', '" . $cpClient . "', '" . $villeClient . "', '" . $paysClient . "', '', '', '', '" . $mobClient . "', '', '', '" . $user['id'] . "','','','','','','','','" . $socClient . "')");
    $id = mysqli_insert_id($link);
?>

<span data-v-561bb412="">
    <div data-v-561bb412="" class="grey-title">Adresse de facturation </div>
    <input type="hidden" value="<?php echo $id ?>" name="clientd">

    <div data-v-561bb412="" class="client_name"><span data-v-561bb412="" class="contact_contact">
            <?php echo $socClient ?><br>
            <?php echo $civ ?> <?php echo $prenomClient ." ". $nomClient ?> </span>
    </div>

    <div data-v-561bb412="" class="client_city"><?php echo $adrClient ?> <br> <?php echo $cpClient ?> <?php echo $villeClient ?> <?php echo $paysClient ?></div>
    <div data-v-561bb412="" class="contact_phone"><?php echo $mobClient ?></div> 
</span>



