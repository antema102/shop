<?php
$adrliv = $_GET['adrliv'];
$cp = $_GET['cp'];
$villel = $_GET['villel'];
$paysl = $_GET['paysl'];
$mol = $_GET['mol'];
$frl = $_GET['frl'];
$tvaLiv = $_GET['tvaLiv'];
$val = ((float)$tvaLiv*(float)$frl)/100;
//var_dump($tvaLiv,$val);

?>

<div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
    <div data-v-02611d7b="" class="payment-mode">Mode de livraison :  <?php echo $mol ?> </div> 
    <div data-v-02611d7b="" class="payment-mode">Frais de livraison :  <?php echo $frl ?> €</div> 
    <div data-v-02611d7b="" class="payment-mode" style="display: none;">TVA de livraison <?php echo $tvaLiv?>% : <?php echo $val ?> €</div> 
    <div data-v-02611d7b="" class="payment-mode">Adresse de livraison :  <?php echo $adrliv ?> </div> 
    <div data-v-02611d7b="" class="payment-mode">Code postal :  <?php echo $cp ?> </div> 
    <div data-v-02611d7b="" class="payment-mode">Ville :  <?php echo $villel ?> </div>
    <div data-v-02611d7b="" class="payment-mode">Pays :  <?php echo $paysl ?> </div>

</div>