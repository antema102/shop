<?php
include ('db.php');

$client = $_GET['client'];

$data = explode('--', $client);
$id = $data[1];
$client = mysqli_fetch_array(mysqli_query($link, "select * from client where id = '" . $id . "'"));
?>

<span data-v-561bb412="">
    <div data-v-561bb412="" class="grey-title">Adresse de facturation </div>
    <input type="hidden" value="<?php echo $client['id'] ?>" name="clientd">

    <div data-v-561bb412="" class="client_name"><span data-v-561bb412="" class="contact_contact">
            <?php echo $client['nom_soc'] ?><br>
            <?php echo $client['civ'] ?> <?php echo $client['prenom'] ." ". $client['nom'] ?> </span>
    </div>

    <div data-v-561bb412="" class="client_city"><?php echo $client['adr'] ?> <br> <?php echo $client['cp'] ?> <?php echo $client['ville'] ?> <?php echo $client['pays'] ?></div>
    <div data-v-561bb412="" class="contact_phone"><?php echo $client['tel'] ?></div> 
    <div data-v-561bb412="" class="contact_email"><?php echo $client['email'] ?></div>
</span>

