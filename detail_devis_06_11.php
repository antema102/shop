<?php
include 'db.php';
$m = 4;
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$id = $_GET['id'];
$facture = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `devis` WHERE `id` =" . $id));
$client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `id` =" . $facture['client']));
?>
<html lang="fr" > 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Detail Devis </title>
        <meta name="description" >
        <link href="data.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="<?php echo url ?>static/dev.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/styles.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>        

        <style>
            button:hover{
                color :#FFFFFF !important;
                border:1px solid #28CCBF !important;
                border-color: #28CCBF !important;
                background: #28CCBF !important;
            }
            .content{
                margin-left: 30px!important;
                margin-right: 30px!important;
            }
            #numdev:hover{
                border: none;

            }

            @media screen and (max-width: 758px){ 
                #calcul{
                    padding-right: 83px !important;
                }
                #cnt{
                    padding-right: 83px !important;
                }

                .content {
                    height: calc(29.7cm - 4cm) !important;
                    margin: 1.2cm !important;
                    -webkit-transform: scale(0.5)!important;
                    transform: scale(0.5)!important;
                    -webkit-transform-origin: left top!important;
                    transform-origin: left top!important;
                    -moz-transform: scale(0.5);
                    -moz-transform-origin: left top!important;
                }
            }
        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> 
            <main class="main">
                <div data-v-561bb412="" class="main-quote">

                    <div data-v-561bb412="" class="menu-bar fab" style="left:90px; padding-bottom: 24px;">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3" style="text-align:left;">
                                <a href="printdev.php?id=<?php echo $facture['id'] ?>">
                                    <span class="iconify" data-icon="fa-solid:upload" style="cursor:pointer; color: #28B5BF;width: 35px ;height: 35px;" data-icon="fa-solid:home"></span>
                                </a>
                            </div>
                            <div class="col-md-3" style="text-align:right;">
                                <a href="editdevis.php?id=<?php echo $facture['id'] ?>">
                                    <span class="iconify" data-icon="clarity:note-edit-line" style="cursor:pointer; color: #28B5BF;width: 35px ;height: 35px;"></span>
                                </a>
                            </div>
                            <div class="col-md-3">

                            </div>

                        </div>
                    </div>
                    <div data-v-561bb412="" size="A4" data-id="1" class="page narrow top-shadow bottom-shadow">

                        <div data-v-561bb412="" class="content">
                            <div data-v-561bb412="" class="quote-header">
                                <div data-v-561bb412="" >
                                    <div data-v-561bb412="" class="logo-wrapper" style="height: 100px; margin: 20px;">
                                        <img data-v-561bb412="" loading="lazy" src="<?php echo url ?>static/logo.jpg" alt="" class="logo">
                                    </div>
                                </div>
                                <div data-v-561bb412="">
                                    <div data-v-561bb412=""  class="quote-title  inline-block " >
                                        <span data-v-561bb412="" class=""  >
                                            <?php echo $facture['titre'] ?>

                                        </span>
                                    </div>
                                </div>
                                <div data-v-561bb412="">
                                    <div data-v-561bb412="" class="quote-name inline-block">
                                        <span data-v-561bb412=""  >
                                            Numéro de Devis : <br>
                                            <?php echo $facture['num'] ?> <br>

                                        </span>
                                        <span data-v-561bb412="">
                                            Devis

                                        </span>
                                        <div data-v-561bb412="" class="quote-date">
                                            du
                                            <?php echo $facture['date_add'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div data-v-561bb412="">
                                    <div data-v-561bb412="" class="row address-informations">
                                        <div data-v-561bb412="" class="company-infos col">
                                            <div data-v-561bb412="">&nbsp;</div>
                                            <div data-v-561bb412="" class="company-name">Passiondecor</div>
                                            <div data-v-561bb412="" class="company-phone">PASSION DECOR, 209 Avenue de</div>
                                            <div data-v-561bb412="" class="company_city">la république 93800 Epinay sur</div>
                                            <div data-v-561bb412="" class="company-name">seine France</div>
                                        </div>

                                        <div data-v-561bb412="" id="client" class="client-infos  inline-block col"  data-bs-toggle="modal" data-bs-target="#modalinfoc">
<!--                                            <span data-v-561bb412="">-->
<!--                                                <div data-v-561bb412="" class="grey-title">Adresse de client: --><?php //echo $client['adr'] ?><!--</div> -->
<!--                                                <input type="hidden" value="--><?php //echo $client['id'] ?><!--" name="clientd">-->
<!---->
<!--                                                <div data-v-561bb412="" class="client_name">Nom de client: </div> -->
<!--                                                <div data-v-561bb412="" class="contact_contact">-->
<!--                                                    <span data-v-561bb412=""> --><?php //echo $client['civ'] ?><!--</span>-->
<!--                                                    --><?php //echo $client['nom'] ?><!-- --><?php //echo $client['prenom'] ?>
<!--                                                </div> -->
<!---->
<!--                                                <div data-v-561bb412="" class="client_city">--><?php //echo $client['pays'] ?><!-- --><?php //echo $client['ville'] ?><!-- --><?php //echo $client['cp'] ?><!--</div> -->
<!--                                                <div data-v-561bb412="" class="contact_phone">--><?php //echo $client['tel'] ?><!--</div> -->
<!--                                                <div data-v-561bb412="" class="contact_email">--><?php //echo $client['email'] ?><!--</div>-->
<!--                                            </span>-->
                                            <span data-v-561bb412="">
                                                <div data-v-561bb412="" class="grey-title">Adresse de facturation</div>
                                                <input type="hidden" value="<?php echo $client['id'] ?>" name="clientd">
                                                <div data-v-561bb412="" class="contact_contact">
                                                    <span data-v-561bb412=""> <?php echo $client['civ'] ?></span>
                                                    <?php echo $client['nom_soc'] ?><br>
                                                    <?php echo $client['prenom'] ?> <?php echo $client['nom'] ?>
                                                </div>

                                                <div data-v-561bb412="" class="client_city"> <?php echo $client['adr'] ?> <br> <?php echo $client['cp'] ?> <?php echo $client['ville'] ?> <?php echo $client['pays'] ?>  </div>
                                                <div data-v-561bb412="" class="contact_phone"><?php echo $client['tel'] ?></div>
                                                <div data-v-561bb412="" class="contact_email"><?php echo $client['email'] ?></div>
                                            </span>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div data-v-561bb412="" class="quote-lines" id="cnt">
                                <div data-v-561bb412="" class="watermark">Devis</div>
                                <table data-v-561bb412="" class="quote-lines-table">
                                    <thead data-v-561bb412="" class="quote-lines-header">
                                        <tr data-v-561bb412="" style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">
                                            <th data-v-561bb412="" style="min-width: 210px;">
                                                <span data-v-561bb412="">Désignation</span>
                                            </th>
                                            <th data-v-561bb412="" class="text--right text--nowrap">
                                                <span data-v-561bb412="">P.u. HT</span>
                                            </th> 
                                            <th data-v-561bb412="" class="text--right text--nowrap">
                                                <span data-v-561bb412="">Qté.</span>
                                            </th> 
                                            <th data-v-561bb412="" class="text--right text--nowrap">
                                                <span data-v-561bb412="">Montant HT</span>
                                            </th>
                                            <th data-v-561bb412="" class="text--right text--nowrap">
                                                <span data-v-561bb412="">TVA</span>
                                            </th>
                                            <th data-v-561bb412="" class="text--right text--nowrap">
                                                <span data-v-561bb412="">Montant TTC</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody data-v-561bb412=""  class="table__body table__body--empty">
                                        <?php
                                        $facture_detail_sql = mysqli_query($link, "SELECT * FROM `detail_devis` WHERE `id_devis` ='" . $facture['id'] . "'");
                                        $prix_all =0 ;
                                        while ($facture_detail = mysqli_fetch_array($facture_detail_sql)) {
                                            $idqt = $facture_detail['id_prod'];

                                            $tab = explode(",", $idqt);
                                            $idprd = $tab[0];
                                            $qte = $tab[1];

                                            $produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE `id` =" . $idprd . ""));
                                            ?>

                                            <tr data-v-561bb412="" id="<?php echo $produit['id'] ?>" class="line editable grabbable visible" onclick="deltr()" draggable="false" style="">
                                                <td data-v-561bb412="" colspan="1" class="designation" >
                                                    <div data-v-561bb412="" class="line-title"><?php echo $produit[' ref'] ?></div> 

                                                    <div data-v-561bb412="" class="line-description">
                                                        <p><?php echo $produit['nom'] ?></p>
                                                    </div>
                                                </td> 
                                                <td data-v-561bb412="" class="r-number no-wrap price_ht">
                                                    <?php echo $produit['prix_ht'] ?>
                                                </td> 

                                                <td data-v-561bb412="" class="r-number no-wrap price_ht">
                                                    <?php echo $qte ?>
                                                </td>
                                                <td data-v-561bb412="" class="r-number no-wrap discount">
                                                    <span data-v-561bb412="">
                                                        <?php
                                                        $montantht = $produit['prix_ht'] * $qte;
                                                        echo number_format($montantht, 2, ".", " ");
                                                        ?>
                                                    </span>
                                                </td> 
                                                <td data-v-561bb412="" class="r-number no-wrap discount">
                                                    <span data-v-561bb412="">

                                                        <?php
                                                        echo $produit['tva'];
                                                        ?> %
                                                    </span>
                                                </td> 
                                                <td data-v-561bb412="" class="quantity">
                                                    <?php
                                                        $tva = $montantht * ($produit['tva']/100);
                                                        $prix_ttc = $montantht + $tva;
                                                        // $prix_all = $prix_all +$facture['prix_ttc'];
                                                        echo number_format($prix_ttc, 2, ".", " ");
                                                        ?>€

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                            <div data-v-561bb412="">
                                <div data-v-248579a2="" data-v-561bb412="" class="document-summary-full">
                                    <div data-v-248579a2="" class="document_currency_summary"></div>
                                    <div data-v-248579a2="" class="document_summary" id="calcul">
                                        <table data-v-248579a2="">
                                            <tbody data-v-248579a2="">
                                                <tr data-v-248579a2="" style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">
                                                    <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif</th>
                                                          </tr> <!----> <!----> <!---->
                                                <?php if( ($facture['frais_liv'] != '') && ($facture['tva_liv'] != '')) {               
                                                ?>
                                                <tr data-v-248579a2="">
                                                    <td data-v-248579a2="">Frais de port HT</td>
                                                    <td data-v-248579a2="" role="" class="r-number" id="" onchange="">
                                                        <?php
                                                            echo number_format($facture['frais_liv'], 2, ".", " ");
                                                        ?> €</td>                                     
                                                </tr>
                                                <tr data-v-248579a2="">
                                                    <td data-v-248579a2="">TVA Frais de port 
                                                        <?php $tvaVal = ($facture['tva_liv'] * 100) / $facture['frais_liv'] ;
                                                               echo $tvaVal ?> %</td>
                                                                                                            
                                                    <td data-v-248579a2="" role="" class="r-number" id="" onchange="">
                                                        <?php 
                                                            
                                                            echo number_format($facture['tva_liv'], 2, ".", " ");

                                                        ?> €</td>
                                                </tr>
                                                <?php }?>
												
												   <tr data-v-248579a2="">
                                                    <td data-v-248579a2="">Montant total HT</td> 
                                                    <td data-v-248579a2="" role="totalHT" class="r-number">
                                                        <?php
                                                        $pontee = strpos($facture['prix_ht'], ".");
                                                        if ($pontee > 0) {
                                                            echo number_format($facture['prix_ht'], 2, ".", " ");
                                                        } else {
                                                            echo number_format($facture['prix_ht'], 2, ",", " ");
                                                        }
                                                        ?> €</td>
                                                </tr>
												
                                                <tr data-v-248579a2="">
                                                    <td data-v-248579a2="">Montant total TVA</td>
                                                    <td data-v-248579a2="" role="totalTVA" class="r-number">
                                                        <?php
                                                        $pontee = strpos($facture['tva'], ".");
                                                        if ($pontee > 0) {
                                                            echo number_format($facture['tva'], 2, ".", " ");
                                                        } else {
                                                            echo number_format($facture['tva'], 2, ",", " ");
                                                        }
                                                        ?> €</td>
                                                </tr>
                                                <tr data-v-248579a2="" class="total">
                                                    <td data-v-248579a2="">Montant total TTC</td>
                                                    <td data-v-248579a2="" role="total_ttc" class="r-number">
                                                         <?php
                                                            $pontee = strpos($facture['prix_ttc'], ".");
                                                            if ($pontee > 0) {
                                                                echo number_format($facture['prix_ttc'], 2, ".", " ");
                                                            } else {
                                                                echo number_format($facture['prix_ttc'], 2, ",", " ");
                                                            }
                                                            ?> €
                                                        </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php if($facture['remise'] > 0 && $facture['netpayer']>0 ){?>
                                        <br>                        
                                        <table data-v-248579a2="">
                                            <tbody data-v-248579a2="">
                                            <tr data-v-248579a2="" style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">
                                                <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif avec Remise</th>
                                            </tr>

                                            <tr data-v-248579a2="">
                                                <td data-v-248579a2="">Montant HT avant remise</td>
                                                <td data-v-248579a2="" role="totalHT" class="r-number">
                                                    <?php
                                                        $pontee = strpos($facture['prix_ht'], ".");
                                                        if ($pontee > 0) {
                                                            echo number_format($facture['prix_ht'], 2, ".", " ");
                                                        } else {
                                                            echo number_format($facture['prix_ht'], 2, ",", " ");
                                                        }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="">
                                                <td data-v-248579a2="">Montant total des remises</td>
                                                <td data-v-248579a2="" role="totalHTR" class="r-number">
                                                    <?php

                                                        $remise_globale = $facture['remise_globale'];

                                                        $ponteR = strpos($remise_globale, ".");
                                                        if ($ponteR > 0) {
                                                            echo number_format($remise_globale, 2, ".", " ");
                                                        } else {
                                                            echo number_format($remise_globale, 2, ",", " ");
                                                        }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="">
                                                <td data-v-248579a2="">Montant total HT</td>
                                                <td data-v-248579a2="" role="totalHTT" class="r-number">
                                                    <?php
                                                       
                                                        $montant_total_ht = $facture['montant_total_ht'];

                                                        $ponteT = strpos($montant_total_ht, ".");
                                                        if ($ponteT > 0) {
                                                            echo number_format($montant_total_ht, 2, ".", " ");
                                                        } else {
                                                            echo number_format($montant_total_ht, 2, ",", " ");
                                                        }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="">
                                                <td data-v-248579a2="">Montant total TVA</td>
                                                <td data-v-248579a2="" role="totalremise" class="r-number">
                                                    <?php
                                                    $pontee = strpos($facture['remise'], ".");
                                                    if ($pontee > 0) {
                                                        echo number_format($facture['remise'], 2, ".", " ");
                                                    } else {
                                                        echo number_format($facture['remise'], 2, ",", " ");
                                                    }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="" class="total">
                                                <td data-v-248579a2="">Montant total TTC</td>
                                                <td data-v-248579a2="" role="netpayer" class="r-number">
                                                    <?php
                                                    $pontee = strpos($facture['netpayer'], ".");
                                                    if ($pontee > 0) {
                                                        echo number_format($facture['netpayer'], 2, ".", " ");
                                                    } else {
                                                        echo number_format($facture['netpayer'], 2, ",", " ");
                                                    }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="" class="total">
                                                <td data-v-248579a2="">Montant Net à payer</td>
                                                <td data-v-248579a2="" role="netpayer1" class="r-number">
                                                    <?php
                                                    $pontee = strpos($facture['netpayer'], ".");
                                                    if ($pontee > 0) {
                                                        echo number_format($facture['netpayer'], 2, ".", " ");
                                                    } else {
                                                        echo number_format($facture['netpayer'], 2, ",", " ");
                                                    }
                                                    ?> €</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <?php }?>
                                    </div>
                                </div>
                                <div data-v-561bb412="" class=" inline-block payment-block"  class="not-visible">
                                    <h6 data-v-561bb412="" class="not-visible">  Informations de paiement</h6>
                                    <div id="">
                                        <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
                                            <div data-v-02611d7b="" class="limit-date">Validité de l'offre :<?php echo $facture['validite'] ?>  </div> 
                                            <div data-v-02611d7b="" class="payment-mode">Mode de paiement : 
                                                <?php
                                                $typee = $facture['type'];
                                                $tab2 = explode("-", $typee);
                                                if ($tab2['0'] == 1) {

                                                    echo ' Virement';
                                                }
                                                if ($tab2['1'] == 2) {
                                                    echo ' ,Chèque';
                                                }
                                                if ($tab2['2'] == 3) {

                                                    echo ' ,Carte bancaire';
                                                }
                                                if ($tab2['3'] == 4) {

                                                    echo ' ,Espèces';
                                                }
                                                ?>
                                            </div> 
                                            <div data-v-561bb412="" class="payment-delay">  Règlement à J+<?php echo $facture['reg'] ?></div>
                                        </div>

                                    </div>
                                </div>
                                <div data-v-561bb412="" class="inline-block shipping-block">
                                    <h6 data-v-561bb412=""class="not-visible"> Informations de livraison</h6>
                                    <div id="">
                                        <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
                                            <div data-v-02611d7b="" class="payment-mode">Mode de livraison :  <?php echo $facture['mode_liv'] ?> </div> 
                                                                                        <?php if($facture['frais_liv']!= '' ){?>
                                            <div data-v-02611d7b="" class="payment-mode">frais de livraison :  <?php echo $facture['frais_liv'] ?> €</div> 
							     		    <div data-v-02611d7b="" class="payment-mode">TVA de livraison <?php echo ($facture['tva_liv'] * 100) / $facture['frais_liv'] ?>% : <?php echo $facture['tva_liv'] ?> €</div> 
                                            <?php }?>
                                            <div data-v-02611d7b="" class="payment-mode">Adresse de livraison :  <?php echo $facture['adr'] ?> </div> 
                                            <div data-v-02611d7b="" class="payment-mode">Code postal :  <?php echo $facture['cp'] ?></div> 
                                            <div data-v-02611d7b="" class="payment-mode">Ville :  <?php echo $facture['ville'] ?> </div>
                                            <div data-v-02611d7b="" class="payment-mode">Pays :  <?php echo $facture['pays'] ?> </div>

                                        </div>

                                    </div>
                                </div>
                                <div data-v-561bb412="" class="quote-footer">
                                    <div id="comm">

                                        <div data-v-561bb412="" class="quote-notes" data-bs-toggle="modal" data-bs-target="#modalinfocomm">
                                            <div data-v-561bb412="" class="editable inline-block">
<!--                                                <div data-v-561bb412="" class="not-visible">-->
<!--                                                    Ajouter un commentaire-->
<!--                                                </div>-->
                                                <span data-v-561bb412="" class=""  >
                                            <?php echo $facture['commentaire'] ?>

                                        </span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div data-v-561bb412="" class="align-center"></div>
                                    <div data-v-561bb412="" class="quote-sign">
                                        <div data-v-561bb412="" class="row">
                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Bon pour accord</span>
                                            </div>
                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Date, cachet et signature</span>
                                            </div>
                                        </div>
                                        <div data-v-561bb412="" class="row">
                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Nom et fonction</span>
                                            </div>
                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Précédé de la mention 'lu et approuvé'</span>
                                            </div>
                                        </div>
<!--                                        <div data-v-561bb412="" class="row">-->
<!--                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle"></span>-->
<!--                                            </div>-->
<!--                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle"> cachet et signature</span>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div data-v-561bb412="" class="row">-->
<!--                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle"></span>-->
<!--                                            </div>-->
<!--                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Précédé de la mention 'lu et approuvé'</span>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                    </div>
                                </div>

                            </div>
                            <div data-v-dc3a3862="" data-v-561bb412="" class="company-footer"
                                     style="color: rgb(0, 0, 0); background-color: transparent;  min-height: 20px;line-height: 10px;bottom: 0.4cm;">
                                    <span data-v-dc3a3862="" class="align-center"> Passiondecor - PASSION DECOR, 209 Avenue de la république 93800 Epinay sur seine France <br></span>
                                    <span data-v-dc3a3862="" class="align-center">Pour toute assistance, merci de nous contacter :<br></span>
                                    <span data-v-dc3a3862="" class="align-center" > Tél. : 09 53 01 76 14<br></span>
                                    <span data-v-dc3a3862="" class="align-center"> *Vous devez vérifier la conformité de la marchandise réceptionnée (emballage, contenu, etat) avant de signer le bon de livraison du transporteur
                                    pour signaler, le cas échéant, les dommages dus au transport sur les bons de livraison. Le livreur doit assister au déballage et attendre l’ouverture des colis.</span>
                                </div>

                        </div>
                    </div>
                </div>
            </main>

        </div>

        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>


        <script>



                                                function livinfo() {
                                                    var adrliv = document.getElementById("adrliv").value;
                                                    var cp = document.getElementById("cp").value;
                                                    var villel = document.getElementById("villel").value;
                                                    var paysl = document.getElementById("paysl").value;
                                                    var mol = document.getElementById("mol").value;
                                                    var frl = document.getElementById("frl").value;

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "infoliv.php?adrliv=" + adrliv + "&cp=" + cp + "&villel=" + villel + "&paysl=" + paysl + "&mol=" + mol + "&frl=" + frl,
                                                        success: function (data) {
                                                            document.getElementById("infol").innerHTML = data;
                                                        }
                                                    }
                                                    );
                                                }



                                                function func() {
                                                    document.getElementById("adr").style.display = "none";
                                                    document.getElementById("adr2").style.display = "contents";
                                                }

                                                function func2() {
                                                    document.getElementById("adr").style.display = "contents";
                                                    document.getElementById("adr2").style.display = "none";
                                                }
                                                function titref() {
                                                    var title = document.getElementById("titlec").value;
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "title.php?title=" + title,
                                                        success: function (data) {
                                                            document.getElementById("title").innerHTML = data;
                                                        }
                                                    });
                                                }


                                                function commf() {
                                                    var commc = document.getElementById("commc").value;
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "commc.php?commc=" + commc,
                                                        success: function (data) {
                                                            document.getElementById("comm").innerHTML = data;
                                                        }
                                                    });
                                                }

                                                function clientf() {
                                                    var client = document.getElementById("devc").value;
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "clientinfo.php?client=" + client,
                                                        success: function (data) {
                                                            document.getElementById("client").innerHTML = data;
                                                        }
                                                    });
                                                }


                                                function calcul() {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "calcul.php",
                                                        success: function (data) {
                                                            document.getElementById("calcul").innerHTML = data;
                                                        }
                                                    });
                                                }

                                                function devinfo() {
                                                    var datep = document.getElementById("datep").value;
                                                    var numb = document.getElementById("numb").value;
                                                    if (document.getElementById("ver").checked == true) {
                                                        var ver = 1;
                                                    }

                                                    if (document.getElementById("ch").checked == true) {
                                                        var ch = 2;
                                                    }
                                                    if (document.getElementById("cb").checked == true) {
                                                        var cb = 3;
                                                    }






                                                    $.ajax({
                                                        type: "POST",
                                                        url: "infodepaiment.php?datep=" + datep + "&numb=" + numb + "&ver=" + ver + "&ch=" + ch + "&cb=" + cb,
                                                        success: function (data) {
                                                            document.getElementById("infop").innerHTML = data;
                                                        }
                                                    }
                                                    );
                                                }
                                                function prdf() {
                                                    var produit = document.getElementById("produit").value;
                                                    var qte = document.getElementById("qte").value;
                                                    var prd = document.getElementById("prdl");
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "produitinfo.php?produit=" + produit + "&qte=" + qte,
                                                        success: function (data) {
                                                            calcul();
                                                            $("#prdl").append(data);
                                                        }
                                                    });
                                                }


        </script>







    </body>
</html>