<?php

include 'db.php';
$sql = mysqli_query($link, "SELECT * FROM `client_adr`");
while ($row = mysqli_fetch_array($sql)) {

    $nom = addslashes(($row['nom']));
    $prenom = addslashes(($row['prenom']));
    echo $nom . '<br>';
    echo "UPDATE client SET adr='" . $adr2 . "', cp='" . $cp2 . "', ville='" . $ville2 . "', pays='" . $pays2 . "' WHERE `nom`='" . $prenom . "' AND `prenom`= '" . $nom . "'   " . '<br>';
    mysqli_query($link, "UPDATE client SET adr='" . $adr2 . "', cp='" . $cp2 . "', ville='" . $ville2 . "', pays='" . $pays2 . "' WHERE `nom`='" . $prenom . "' AND `prenom`= '" . $nom . "'   ")or die(mysqli_error($link));


    /*
      $ver = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `client` WHERE `nom` LIKE  '" . $row['prenom'] . "' AND `prenom` LIKE '" . $row['nom'] . "'   "));
      echo 'ver=' . $ver . '<br>';
      if ($ver > 0) {

      $client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `nom` LIKE  '" . $row['prenom'] . "' AND `prenom` LIKE '" . $row['nom'] . "'   "));
      echo $client['id']; */
    /* $adr2 = addslashes(utf8_encode($row['adr']));
      $cp2 = addslashes(utf8_encode($row['cp']));
      $ville2 = addslashes(utf8_encode($row['ville']));
      $pays2 = addslashes(utf8_encode($row['pays']));
      mysqli_query($link, "UPDATE client SET adr='" . $adr2 . "', cp='" . $cp2 . "', ville='" . $ville2 . "', pays='" . $pays2 . "' WHERE id=" . $client['id'] . "  ")or die(mysqli_error($link));
     */
}
?>