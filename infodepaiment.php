<?php
$datep = $_GET['datep'];
$numb = $_GET['numb'];
$ver = $_GET['ver'];
$ch = $_GET['ch'];
$cb = $_GET['cb'];
$espece = $_GET['espece'];
//$espece1 = $_POST['espece'];
//
//echo "<pre>";
//print_r($espece);
//print_r($datep);
?>

<div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
    <div data-v-02611d7b="" class="limit-date">Validité de l'offre :<?php echo $datep ?>  </div> 
    <div data-v-02611d7b="" class="payment-mode">Mode de paiement : 
        <?php
        if ($ver == 1) {
            echo ' Virement ';
            echo '<input type="hidden" value="' . $ver . '" name="typev">';
        }
        if ($ch == 2) {
            echo ' , Chèque ';
            echo '<input type="hidden" value="' . $ch . '" name="typec">';
        }
        if ($cb == 3) {
            echo '<input type="hidden" value="' . $cb . '" name="typeb">';
            echo ' , Carte bancaire ';
        }
        if ($espece == 4) {
            echo '<input type="hidden" value="' . $espece . '" name="types">';
            echo ' , Espèces ';
        }
        ?>
    </div> 
    <div data-v-561bb412="" class="payment-delay">  Règlement à J+<?php echo $numb ?></div>
</div>
