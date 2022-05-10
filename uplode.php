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

                $idu = addslashes(utf8_encode($column[0]));


                $img = addslashes(utf8_encode($column[1]));

                $nom = addslashes(utf8_encode($column[2]));


                $ref = addslashes(utf8_encode($column[3]));


                $Boutique = addslashes(utf8_encode($column[4]));


                $prix_bb = addslashes(utf8_encode($column[5]));
                $prix_b = number_format($prix_bb, 2, ".", " ");


                $prix_ff = addslashes(utf8_encode($column[6]));
                $prix_f = number_format($prix_ff, 2, ".", " ");

                $etat = utf8_encode($column[7]);

                $fromm = '2';

                $tva = 20;

                $prixttccc = $prix_b + ($prix_b * $tva / 100);
                $prixttcc = number_format($prixttccc, 2, ".", " ");
                $produit_ex = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `produit` where idu ='" . $idu . "'and nom ='" . $nom . "' "));

                if ($produit_ex == 0) {
                    mysqli_query($link, "insert into produit(idu,nom,img,ref,prix_ht,prix_ttc,etat,fromm,tva,boutique, stocka,stock,stock_min,seil_s)values('" . $idu . "','" . $nom . "','" . $img . "','" . $ref . "','" . $prix_b . "','" . $prixttcc . "','" . $etat . "','" . $fromm . "','" . $tva . "','" . $Boutique . "','1','0','0','0')") or die(mysqli_error($link));
                }
                $i++;
            }
            echo '<script>window.location="produit.php"</script>';
        }

        
        $sql = "UPDATE produit SET code_a_barre= LPAD(id, 8, '0') ";
        mysqli_query($link, $sql); 
        echo '<script>window.location="produit.php"</script>';
    } else {
        echo '<script>alert("Votre ficher est vide");</script>';
    }
}
?>