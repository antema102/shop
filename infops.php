<?php
$datep = $_GET['datep'];
$numb = $_GET['numb'];
$type = $_GET['type'];
?>

<div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
    <div data-v-02611d7b="" class="limit-date">Validité de l'offre :<?php echo $datep ?>  </div> 
    <div data-v-02611d7b="" class="payment-mode">Mode de paiement : 
        Espèces
        <input type="hidden" value="<?php echo $type ?>" name="typev">

    </div> 
    <div data-v-561bb412="" class="payment-delay">  Règlement à J+<?php echo $numb ?></div>
</div>
