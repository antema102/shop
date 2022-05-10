<?php

include 'db.php';

$fileName = $_FILES["modele"]["tmp_name"];
$csvv = $_FILES['modele']['name'];
$chaine2 = '.csv';

$posss = strpos($csvv, $chaine2);

if ($posss === false) {

    echo '<script>alert("Vérifier le format du fichier");</script>';
} else {


    if ($_FILES["modele"]["size"] > 0) {

        $file = fopen($fileName, "r");
        $i = 1;
        while (($column = fgetcsv(($file), 10000, ";")) !== FALSE) {


            if (utf8_encode($column[0]) != "ID ") {
                $client_ex = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `nom`='" . addslashes(utf8_decode($column[2])) . "' AND `prenom`= '" . addslashes(utf8_decode($column[1])) . "' "));
                if ($client_ex['adr'] == '') {

                    $id = addslashes(utf8_decode($column[0]));
                    $nom = addslashes(utf8_decode($column[1]));
                    $prenom = addslashes(utf8_decode($column[2]));
                    $adr = addslashes(utf8_decode($column[3]));
                    $cp = addslashes(utf8_decode($column[4]));
                    $ville = addslashes(utf8_decode($column[5]));
                    $pays = addslashes(utf8_decode($column[6]));

                    mysqli_query($link, "UPDATE client SET adr='" . $adr . "', cp='" . $cp . "', ville='" . $ville . "', pays='" . $pays . "' WHERE `nom`='" . $prenom . "' AND `prenom`= '" . $nom . "'   ")or die(mysqli_error($link));
                }
                $i++;
            }echo '<script>window.setTimeout(function () {

                        // Move to a new location or you can do something else
                        window.location = "client.php";

                    }, i)</script>';
        }echo '<script>window.location="client.php"</script>';
        echo '<script>window.location="client.php"</script>';
    } else {
        echo '<script>alert("Votre ficher est vide");</script>';
    }
}
?>