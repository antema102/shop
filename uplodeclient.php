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



            if (utf8_encode($column[0]) != "ID") {
                $client_ex = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `client` where email='" . $column[4] . "' "));
                if (client_ex == 0) {



                    $id = addslashes(utf8_decode($column[0]));
                    $civ = addslashes(utf8_decode($column[1]));
                    $prenom = addslashes(utf8_decode($column[2]));
                    $nom = addslashes(utf8_decode($column[3]));
                    $mail = addslashes(utf8_decode($column[4]));
                    $vente = addslashes(utf8_decode($column[5]));
                    $activite = addslashes(utf8_decode($column[6]));
                    $lettre = addslashes(utf8_decode($column[7]));
                    $opt = addslashes(utf8_decode($column[8]));
                    $insc = addslashes(utf8_decode($column[9]));
                    $visit = addslashes(utf8_decode($column[10]));
                    $etiq = '0';

                    $user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE email='" . $_SESSION['user'] . "'"));
                    $editeur = $user['id'];

                    mysqli_query($link, "insert into client(id,civ,nom,prenom,email,notes,editeur,vente,activ,let_i,opt,insc,visit,etiquet)values('" . $id . "','" . $civ . "','" . $nom . "','" . $prenom . "','" . $mail . "','" . $note . "','" . $editeur . "','" . $vente . "','" . $activite . "','" . $lettre . "','" . $opt . "','" . $insc . "','" . $visit . "','" . $etiq . "')")or die(mysqli_error($link));
                }
                $i++;
            }echo '<script>window.location="client.php"</script>';
        }
        echo '<script>window.location="client.php"</script>';
    } else {
        echo '<script>alert("Votre ficher est vide");</script>';
    }
}
?>