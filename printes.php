<?php
include 'db.php';
$m = 2;
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$id = $_GET['id'];
$facture = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `espace` WHERE `id` =" . $id));
$client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `id` =" . $facture['client']));
?>
<html lang="fr" > 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Proforma - <?php echo $facture['num'] ?> </title>
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
        <link rel="stylesheet" href="css/print.css" type="text/css" media="print"/>

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
    <body lang="fr" onload="printDiv()" >
        <main class="main">
            <div data-v-561bb412="" class="main-quote">

                <div data-v-561bb412="" size="A4"  style="height: auto;" data-id="1" class="page narrow top-shadow bottom-shadow">

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
                                        numéro de Proforma : <br>
                                        <?php echo $facture['num'] ?> <br>

                                    </span>
                                    <span data-v-561bb412="">
                                        Proforma

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
                                        <span data-v-561bb412="">
                                            <div data-v-561bb412="" class="grey-title">Adresse de facturation</div>
                                            <input type="hidden" value="<?php echo $client['id'] ?>" name="clientd">

                                            <div data-v-561bb412="" class="contact_contact">
                                            <?php echo $client['nom_soc'] ?><br>
                                                    <?php echo $client['civ'] ?> <?php echo $client['prenom'] ." ".  $client['nom'] ?>
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
                            <div data-v-561bb412="" class="watermark"> </div>
                            <table data-v-561bb412="" class="quote-lines-table">
                                <thead data-v-561bb412="" class="quote-lines-header">
                                    <tr data-v-561bb412="" style="background-color: #32baa8; color: rgb(255, 255, 255);">
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
                                    $facture_detail_sql = mysqli_query($link, "SELECT * FROM `detail_espace` WHERE `id_devis` ='" . $facture['id'] . "'");
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
                                                echo number_format($prix_ttc, 2, ".", " ");
                                                ?>
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
                                            <tr data-v-248579a2="" style="background-color: #32baa8; color: rgb(255, 255, 255);">
                                                <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif</th>
                                            </tr> 
                                            <tr data-v-248579a2="" class="sstitre transport" style="display: none;">
                                                <td data-v-248579a2="" colspan="2">Transport</td>
                                            </tr> <!----> <!----> <!---->
                                            <?php if( ($facture['frais_liv'] != '') && ($facture['tva_liv'] != '')) {               
                                                ?>
                                            <tr data-v-248579a2="">
                                                <td data-v-248579a2="">Frais de port</td>
                                                <td data-v-248579a2="" role="" class="r-number" id="" onchange="">
                                                    <?php
                                                        echo number_format($facture['frais_liv'], 2, ".", " ");
                                                    ?> €</td>                                     
                                            </tr>
                                            <tr data-v-248579a2="" style="display: none;">
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
                                                    ?> €</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br> 
                                    <?php if($facture['remise'] > 0 && $facture['netpayer']>0 ){?>
                                    <table data-v-248579a2="">
                                            <tbody data-v-248579a2="">
                                            <tr data-v-248579a2="" style="background-color: #32baa8; color: rgb(255, 255, 255);">
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
                                                <td data-v-248579a2="">Montant avec remise</td>
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

                                <div id="">
                                    <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
                                        <div data-v-02611d7b="" class="limit-date">Validité de l'offre :<?php echo $facture['validite']  ?>  </div> 
                                        <div data-v-02611d7b="" class="payment-mode">Mode de paiement : 
                                            <?php
                                            echo $facture['type'];
                                            ?>
                                        </div> 
                                        <div data-v-561bb412="" class="payment-delay">  Règlement à J+<?php echo $facture['reg'] ?></div>
                                    </div>

                                </div>
                            </div>
                            <div data-v-561bb412="" class="inline-block shipping-block">

                                <div id="">
                                    <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
                                        <div data-v-02611d7b="" class="payment-mode">Mode de livraison :  <?php echo $facture['mode_liv'] ?> </div> 
                                        <?php if($facture['frais_liv']!= '' ){?>
                                            <div data-v-02611d7b="" class="payment-mode">Frais de livraison :  <?php echo $facture['frais_liv'] ?> €</div> 
							     		    <div data-v-02611d7b="" class="payment-mode" style="display: inline-table ; display: none;">TVA de livraison <?php echo ($facture['tva_liv'] * 100) / $facture['frais_liv'] ?>% : <?php echo $facture['tva_liv'] ?> €</div> 
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
                                            <div data-v-561bb412="" class="not-visible">

                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div data-v-561bb412="" class="align-center"></div>
                                <div data-v-561bb412="" class="quote-sign">
                                    <div data-v-561bb412="" class="row">
                                        <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle"></span>
                                        </div>
                                        <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle"> cachet et signature</span>
                                        </div>
                                    </div>
                                    <div data-v-561bb412="" class="row">
                                        <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle"></span>
                                        </div>
                                        <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Précédé de la mention 'lu et approuvé'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div data-v-561bb412="" class="footer-block" style=" background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);"></div>
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
    </body>
    <script>
        function printDiv()
        {
            window.print();
            window.document.close();
            setTimeout(function () {
                window.location.replace("http://www.shoppassiondecor.fr/espace.php");
            }, 10);


        }
    </script>
</html>