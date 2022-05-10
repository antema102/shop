<?php
include 'db.php';
$m = 4;

if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}

$id = $_GET['id'];
$facture = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `devis` WHERE `id` =" . $id));
$client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `id` =" . $facture['client']));
$admin = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `email` = '" . $_SESSION['user'] . "'"));
$_SESSION['fraisLiv'] = array();
$_SESSION['tvaLiv'] = array();
$_SESSION['prix_ht'] = $facture['prix_ht'];
$_SESSION['prix_ttc'] = $facture['prix_ttc'];
$_SESSION['tva'] = $facture['tva'];
$_SESSION['prix_ht_avoir'] = '';
$_SESSION['cart']=array();
$_SESSION['fraisLiv'] =$facture['frais_liv'];
$_SESSION['tvaLiv']=$facture['tva_liv'];
$facture_detail_sql = mysqli_query($link, "SELECT * FROM `detail_devis` WHERE `id_devis` ='" . $facture['id'] . "'");
$obj=mysqli_query($link, "SELECT * FROM `detail_devis` WHERE `id_devis` ='" . $facture['id'] . "'");

while ($row = mysqli_fetch_assoc($obj)) {
    $tab = explode(",", $row['id_prod']);
   $prod=mysqli_query($link, "SELECT * FROM `produit` WHERE `id` ='" . $tab[0] . "'");
    while ($row1 = mysqli_fetch_assoc($prod)) {


        $montantht = $row1['prix_ht'] * substr($row['id_prod'], strpos($row['id_prod'], ",") + 1);
        if($row1['tva']>0){
            $prix_ttc = $montantht + ($montantht * $row1['tva'] / 100);
        }else{
            $prix_ttc = $montantht ;
        }
        $objet = array("id" => $row1['id'], "nom" => (string) $row1['nom'],"prix_ht" => (string) $montantht, "qte" => (string)  substr($row['id_prod'], strpos($row['id_prod'], ",") + 1), "prix_ttc" => (string) $prix_ttc,"prod_tva"=>(float) $row1['tva']);

        array_push($_SESSION['cart'],$objet);
    }

}

//echo '<pre/>';
//array_push($_SESSION['cart'],$obj);
//var_dump($_SESSION);die();
?>
<html lang="fr" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Ajouter devis </title>
        <meta name="description" >
        <link href="data.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
       <link href="<?php echo url ?>static/dev.css?v=1.0" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/styles.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="dist/js/functions.js?version = 1.1"></script>  

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
                <form method="post" action="edit_dev.php">
                    <div data-v-561bb412="" class="main-quote">

                        <div data-v-561bb412="" class="menu-bar fab" style="left:90px;">
                            <div data-v-561bb412="" class="center" style="height:58px ; width: 100%;">
                                <div data-v-561bb412="" class="float-right">
                                    <input type="hidden" id="iddev" name="iddev" value="<?php echo $facture['id'] ?>">

                                </div>
                                <div data-v-561bb412="" style="text-align: center;" class="">

                                    <button data-v-561bb412="" name="devadd" type="submit" style=" border:1px solid #3D7DA0;color:#3D7DA0;background: #FFFFFF;margin-right:40px; "  class="btn btn btn-default btn-primary btn-secondary ">
                                        Sauvegarder
                                    </button>
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
                                    <div data-v-561bb412="" data-bs-toggle="modal" data-bs-target="#modalinfo" id="title">
                                        <div data-v-561bb412=""  class="quote-title  inline-block " >
                                            <span data-v-561bb412="" class=""  >
                                                <?php echo $facture['titre'] ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div data-v-561bb412="">
                                        <div data-v-561bb412="" class="quote-name inline-block">
                                            <span data-v-561bb412=""  >
                                                Numéro de devis : <br>

                                                <input data-v-561bb412="" class="editable" type="text" name="numdev" id="numdev" value="<?php echo $facture['num'] ?>" style="border: none;" >  <br>

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
                                                    <div data-v-561bb412="" class="company-name">PASSION DECOR</div>
                                                <div data-v-561bb412="" class="company-phone">209 Avenue de la république</div>
                                                <div data-v-561bb412="" class="company_city">93800 Epinay sur seine - France</div>
                                                <div data-v-561bb412="" class="company-name"></div>
                                            </div>

                                            <div data-v-561bb412="" id="client" class="client-infos  inline-block col"  data-bs-toggle="modal" data-bs-target="#modalinfoc">
<!--                                                <span data-v-561bb412="">-->
<!--                                                    <div data-v-561bb412="" class="grey-title">Adresse de client: --><?php //echo $client['adr'] ?><!--</div> -->
<!--                                                    <input type="hidden" value="--><?php //echo $client['id'] ?><!--" name="clientd">-->
<!---->
<!--                                                    <div data-v-561bb412="" class="client_name">Nom de client: </div> -->
<!--                                                    <div data-v-561bb412="" class="contact_contact">-->
<!--                                                        <span data-v-561bb412=""> --><?php //echo $client['civ'] ?><!--</span>-->
<!--                                                        --><?php //echo $client['nom'] ?><!-- --><?php //echo $client['prenom'] ?>
<!--                                                    </div> -->
<!---->
<!--                                                    <div data-v-561bb412="" class="client_city">--><?php //echo $client['pays'] ?><!-- --><?php //echo $client['ville'] ?><!-- --><?php //echo $client['cp'] ?><!--</div> -->
<!--                                                    <div data-v-561bb412="" class="contact_phone">--><?php //echo $client['tel'] ?><!--</div> -->
<!--                                                    <div data-v-561bb412="" class="contact_email">--><?php //echo $client['email'] ?><!--</div>-->
<!--                                                </span>-->
                                                <span data-v-561bb412="">
                                                <div data-v-561bb412="" class="grey-title">Adresse de facturation</div>
                                                <input type="hidden" value="<?php echo $client['id'] ?>" name="clientd">
                                                <div data-v-561bb412="" class="contact_contact">
                                                    <?php echo $client['nom_soc'] ?><br>
                                                    <span data-v-561bb412=""> <?php echo $client['civ'] ?></span>
                                                    <?php echo $client['prenom'] ." ". $client['nom'] ?>
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
                                        <tbody data-v-561bb412="" id="prdl" class="table__body table__body--empty">
                                            <?php

                                            $prix_all=0;
                                            while ($facture_detail = mysqli_fetch_array($facture_detail_sql)) {
                                                $idqt = $facture_detail['id_prod'];

                                                $tab = explode(",", $idqt);
                                                $idprd = $tab[0];
                                                $qte = $tab[1];

                                                $produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE `id` =" . $idprd . ""));
                                                ?>

                                                <tr data-v-561bb412="" id="<?php echo $produit['id'] ?>" class="line grabbable visible" onclick="removeProduct(<?php echo $produit['id'] ?>)" draggable="false" style="">
                                                <td data-v-561bb412="" colspan="1" class="designation" >
                                                    <div data-v-561bb412="" class="line-title"><?php echo $produit['ref'] ?></div>

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
                                                        echo number_format($montantht, 2, ".", "");
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
                                                  //  $prix_ttc = $montantht + $tva;
                                                  //  $prix_ttc = $facture['prix_ttc'];
                                                    $tva = $montantht * $produit['tva'] / 100;
                                                    $prix_ttc = $montantht + $tva;
                                                    $prix_all =$prix_all +$prix_ttc;
                                                    echo number_format($prix_ttc, 2, ".", "");
                                                    ?>
                                                </td>
                                                    <td style="cursor:pointer" data-detail="<?php echo $facture_detail['id']?>" id="pr-<?php echo $produit['id']?>" onclick="removeProduct(<?php echo $produit['id']?>)"><i class="icon ion-ios-trash"></i></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                    <div data-v-561bb412="" class="line-actions" style="text-align:center;">
                                        <button data-v-561bb412="" type="button" style=" border:1px solid #3D7DA0;color:#3D7DA0;background: #FFFFFF" data-bs-toggle="modal" data-bs-target="#modalinfoprdTest" class="btn btn btn-default btn-primary btn-secondary">
                                            Ajouter un produit / service
                                        </button>

                                    </div>
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
                                                        ///$pontee = strpos($facture['prix_ttc'], ".");
                                                        // $prix_ttc = $facture['prix_ht'] + $facture['tva'];
                                                        $pontee = strpos($prix_all, ".");
                                                        if ($pontee > 0) {
                                                         //   echo number_format($facture['prix_ttc'], 2, ".", " ");
                                                            echo number_format($prix_all, 2, ".", " ");
                                                        } else {
                                                          //  echo number_format($facture['prix_ttc'], 2, ",", " ");
                                                            echo number_format($prix_all, 2, ",", " ");
                                                        }
                                                        ?> €</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div data-v-561bb412="" class="editable inline-block payment-block" data-bs-toggle="modal" data-bs-target="#modalinfop" class="not-visible">
                                        <h6 data-v-561bb412="" class="not-visible">  Informations de paiement</h6>
                                        <div id="infop">
                                            <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
                                                <div data-v-02611d7b="" class="limit-date">Validité de l'offre :<?php echo $produit['validite'] ?>  </div>
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
                                    <div data-v-561bb412="" class="editable inline-block shipping-block" data-bs-toggle="modal" data-bs-target="#modalinfoliv">
                                        <h6 data-v-561bb412=""class="not-visible"> Informations de livraison</h6>
                                        <div id="infol">


                                            <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
                                                <div data-v-02611d7b="" class="payment-mode">Mode de livraison :  <?php echo $facture['mode_liv'] ?> </div>
                                                <div data-v-02611d7b="" class="payment-mode">frais de livraison :  <?php echo $facture['frais_liv'] ?> </div>
                                                <div data-v-02611d7b="" class="payment-mode" style="display: none;">TVA de livraison <?php
                                                    $tvaVal='';
                                                if((float)$facture['tva_liv']>0){
                                                    $tvaVal=((float)$facture['tva_liv'] * 100) / (float)$facture['frais_liv'];
                                                }
                                                echo $tvaVal ?>% : <?php echo $facture['tva_liv'] ?> €</div>
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
                                                        Ajouter un commentaire
                                                    </div>
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
                                        </div>
                                    </div>

                                </div>
                                <div data-v-dc3a3862="" data-v-561bb412="" class="company-footer"
                                     style="color: rgb(0, 0, 0); background-color: transparent;  min-height: 20px;line-height: 10px;bottom: 0.4cm;">
                                    <span data-v-dc3a3862="" class="align-center">PASSION DECOR - 209 Avenue de la république 93800 Epinay sur seine France <br></span>
                                    <span data-v-dc3a3862="" class="align-center">Pour toute assistance, merci de nous contacter :<br></span>
                                    <span data-v-dc3a3862="" class="align-center" > Tél. : 09 53 01 76 14<br></span>
                                    <span data-v-dc3a3862="" class="align-center"> *Vous devez vérifier la conformité de la marchandise réceptionnée (emballage, contenu, etat) avant de signer le bon de livraison du transporteur
                                    pour signaler, le cas échéant, les dommages dus au transport sur les bons de livraison. Le livreur doit assister au déballage et attendre l’ouverture des colis.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include('modalinfo.php') ?>
                    <?php include('modalinfop.php') ?>
                    <?php include('modaldeviclient.php') ?>
                    <?php include('modalcomc.php') ?>
                    <?php //include('modalproduitinfo.php') ?>
                    <?php include('modalinfoliv.php') ?>
                    <?php include('modalproduitinfoTest.php') ?>
                </form>
            </main>

        </div>

        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

      <script>

        // clear inputs when modal is hidden
         $('#modalinfoprd').on('hidden.bs.modal', function(e){
                        $(".modal-body :input").val("");
                        $('#modalinfoprd .modal-body p').remove();
                  });
        $('#modalinfoprdTest').on('hidden.bs.modal', function(e){
            document.getElementById("productList").style.display = "contents"
            document.getElementById("productButt").style.display = "contents";
            document.getElementById("productNew").style.display = "none";
            $(".modal-body :input").val("");
            $('.error').remove();
        }) ;          

        </script>
        <script>
         window.onload= function () {

         $.ajax({
                 type: "POST",
                 url: "calcul.php",
                 success: function (data) {
                     document.getElementById("calcul").innerHTML = data;
                 }
             });
         }
            function setValues() {
                    var i, s = 0, tr, td;
                    var tab = document.getElementById("tableTest");
                     var n = tab.rows.length -1;
                     console.log(n);
                      for (i = 1; i <= n; i++) {
                             tr = tab.rows[i];
                             console.log(tr);

                               td = tr.cells[3];
                               console.log(td.innerText);
                               var num = Number(td.innerText);
                                s = s + num;
                                console.log(s);
                                     }
                      document.getElementById("montantTotal").innerHTML = s;
                      }


                                                    function livinfo() {
                                                        var adrliv = document.getElementById("adrliv").value;
                                                        var cp = document.getElementById("cp").value;
                                                        var villel = document.getElementById("villel").value;
                                                        var paysl = document.getElementById("paysl").value;
                                                        var mol = document.getElementById("mol").value;
                                                        var frl = document.getElementById("frl").value;
                                                        var tvaLiv = document.getElementById("tvaLiv").value;
                                                        console.log(tvaLiv)
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "infoliv.php?adrliv=" + adrliv + "&cp=" + cp + "&villel=" + villel + "&paysl=" + paysl + "&mol=" + mol + "&frl=" + frl+"&tvaLiv="+tvaLiv,
                                                            success: function (data) {
                                                                document.getElementById("infol").innerHTML = data;
                                                            }
                                                        }
                                                        );

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "calcul.php?fraisLiv=" + frl + "&tvaLiv=" + tvaLiv,
                                                            success: function (data) {
                                                                document.getElementById("calcul").innerHTML = data;
                                                            }
                                                        });
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

                                                    function calculPrixtest3() {
                                                        var ht = document.getElementById("productPriceTTC").value;
                                                        var tva = document.getElementById("__BVID__1521").value;
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "calculprixht2.php",
                                                            data: {
                                                                ht: ht,
                                                                tva2: tva
                                                            },
                                                            success: function (data) {
                                                                document.getElementById("blockt").innerHTML = data;


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
                                                        $('.error').remove();
                                                        if(qte && produit) {
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "produitinfo.php?produit=" + produit + "&qte=" + qte,
                                                                success: function (data) {
                                                                    calcul();
                                                                    $("#prdl").append(data);
                                                                }
                                                            });
                                                            $('#modalinfoprd').modal('hide');
                                                            $(".modal-body :input").val("");
                                                            $('#modalinfoprd .modal-body p').remove();
                                                        } else {
                                                            $('#modalinfoprd footer').before().before('<p class="error" style="color:red">Vous n\'avez pas remplit tous les champs !</p>');
                                                           }
                                                    }


        </script>

        <script>
            $(function () {
                $("#datep").datepicker({
                    altField: "#datepicker",
                    closeText: 'Fermer',
                    prevText: 'Précédent',
                    nextText: 'Suivant',
                    currentText: 'Aujourd\'hui',
                    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                    monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
                    dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                    dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
                    dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                    weekHeader: 'Sem.',
                    dateFormat: 'dd/mm/yy'
                });
            });
        </script>

        <script>
            function autocomplete(inp, arr) {
                /*the autocomplete function takes two arguments,
                 the text field element and an array of possible autocompleted values:*/
                var currentFocus;
                /*execute a function when someone writes in the text field:*/
                inp.addEventListener("input", function (e) {
                    var a, b, i, val = this.value;
                    /*close any already open lists of autocompleted values*/
                    closeAllLists();
                    if (!val) {
                        return false;
                    }
                    currentFocus = -1;
                    /*create a DIV element that will contain the items (values):*/
                    a = document.createElement("DIV");
                    a.setAttribute("id", this.id + "autocomplete-list");
                    a.setAttribute("class", "autocomplete-items");
                    /*append the DIV element as a child of the autocomplete container:*/
                    this.parentNode.appendChild(a);
                    /*for each item in the array...*/
                    for (i = 0; i < arr.length; i++) {
                        /*check if the item starts with the same letters as the text field value:*/
                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                            /*create a DIV element for each matching element:*/
                            b = document.createElement("DIV");
                            /*make the matching letters bold:*/
                            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                            b.innerHTML += arr[i].substr(val.length);
                            /*insert a input field that will hold the current array item's value:*/
                            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                            /*execute a function when someone clicks on the item value (DIV element):*/
                            b.addEventListener("click", function (e) {
                                /*insert the value for the autocomplete text field:*/
                                inp.value = this.getElementsByTagName("input")[0].value;
                                /*close the list of autocompleted values,
                                 (or any other open lists of autocompleted values:*/
                                closeAllLists();
                            });
                            a.appendChild(b);
                        }
                    }
                });
                /*execute a function presses a key on the keyboard:*/
                inp.addEventListener("keydown", function (e) {
                    var x = document.getElementById(this.id + "autocomplete-list");
                    if (x)
                        x = x.getElementsByTagName("div");
                    if (e.keyCode == 40) {
                        /*If the arrow DOWN key is pressed,
                         increase the currentFocus variable:*/
                        currentFocus++;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 38) { //up
                        /*If the arrow UP key is pressed,
                         decrease the currentFocus variable:*/
                        currentFocus--;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 13) {
                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                            /*and simulate a click on the "active" item:*/
                            if (x)
                                x[currentFocus].click();
                        }
                    }
                });
                function addActive(x) {
                    /*a function to classify an item as "active":*/
                    if (!x)
                        return false;
                    /*start by removing the "active" class on all items:*/
                    removeActive(x);
                    if (currentFocus >= x.length)
                        currentFocus = 0;
                    if (currentFocus < 0)
                        currentFocus = (x.length - 1);
                    /*add class "autocomplete-active":*/
                    x[currentFocus].classList.add("autocomplete-active");
                }
                function removeActive(x) {
                    /*a function to remove the "active" class from all autocomplete items:*/
                    for (var i = 0; i < x.length; i++) {
                        x[i].classList.remove("autocomplete-active");
                    }
                }
                function closeAllLists(elmnt) {
                    /*close all autocomplete lists in the document,
                     except the one passed as an argument:*/
                    var x = document.getElementsByClassName("autocomplete-items");
                    for (var i = 0; i < x.length; i++) {
                        if (elmnt != x[i] && elmnt != inp) {
                            x[i].parentNode.removeChild(x[i]);
                        }
                    }
                }
                /*execute a function when someone clicks in the document:*/
                document.addEventListener("click", function (e) {
                    closeAllLists(e.target);
                });
            }

            /*An array containing all the country names in the world:*/
            var countries = [
<?php
$sql_client = mysqli_query($link, "SELECT * FROM `client`");
while (
$data_client = mysqli_fetch_array($sql_client)) {
    ?>
                    "<?php echo utf8_decode($data_client['prenom']) ?>  <?php echo utf8_decode($data_client['nom']) ?> --<?php echo $data_client['id'] ?>",
<?php } ?>
                    ];
                    /*initiate the autocomplete function on the "devc" element, and pass along the countries array as possible autocomplete values:*/
                    autocomplete(document.getElementById("devc"), countries);
        </script>

        <script>
            function autocomplete(inp, arr) {
                /*the autocomplete function takes two arguments,
                 the text field element and an array of possible autocompleted values:*/
                var currentFocus;
                /*execute a function when someone writes in the text field:*/
                inp.addEventListener("input", function (e) {
                    var a, b, i, val = this.value;
                    /*close any already open lists of autocompleted values*/
                    closeAllLists();
                    if (!val) {
                        return false;
                    }
                    currentFocus = -1;
                    /*create a DIV element that will contain the items (values):*/
                    a = document.createElement("DIV");
                    a.setAttribute("id", this.id + "autocomplete-list");
                    a.setAttribute("class", "autocomplete-items");
                    /*append the DIV element as a child of the autocomplete container:*/
                    this.parentNode.appendChild(a);
                    /*for each item in the array...*/
                    for (i = 0; i < arr.length; i++) {
                        /*check if the item starts with the same letters as the text field value:*/
                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                            /*create a DIV element for each matching element:*/
                            b = document.createElement("DIV");
                            /*make the matching letters bold:*/
                            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                            b.innerHTML += arr[i].substr(val.length);
                            /*insert a input field that will hold the current array item's value:*/
                            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                            /*execute a function when someone clicks on the item value (DIV element):*/
                            b.addEventListener("click", function (e) {
                                /*insert the value for the autocomplete text field:*/
                                inp.value = this.getElementsByTagName("input")[0].value;
                                /*close the list of autocompleted values,
                                 (or any other open lists of autocompleted values:*/
                                closeAllLists();
                            });
                            a.appendChild(b);
                        }
                    }
                });
                /*execute a function presses a key on the keyboard:*/
                inp.addEventListener("keydown", function (e) {
                    var x = document.getElementById(this.id + "autocomplete-list");
                    if (x)
                        x = x.getElementsByTagName("div");
                    if (e.keyCode == 40) {
                        /*If the arrow DOWN key is pressed,
                         increase the currentFocus variable:*/
                        currentFocus++;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 38) { //up
                        /*If the arrow UP key is pressed,
                         decrease the currentFocus variable:*/
                        currentFocus--;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 13) {
                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                            /*and simulate a click on the "active" item:*/
                            if (x)
                                x[currentFocus].click();
                        }
                    }
                });
                function addActive(x) {
                    /*a function to classify an item as "active":*/
                    if (!x)
                        return false;
                    /*start by removing the "active" class on all items:*/
                    removeActive(x);
                    if (currentFocus >= x.length)
                        currentFocus = 0;
                    if (currentFocus < 0)
                        currentFocus = (x.length - 1);
                    /*add class "autocomplete-active":*/
                    x[currentFocus].classList.add("autocomplete-active");
                }
                function removeActive(x) {
                    /*a function to remove the "active" class from all autocomplete items:*/
                    for (var i = 0; i < x.length; i++) {
                        x[i].classList.remove("autocomplete-active");
                    }
                }
                function closeAllLists(elmnt) {
                    /*close all autocomplete lists in the document,
                     except the one passed as an argument:*/
                    var x = document.getElementsByClassName("autocomplete-items");
                    for (var i = 0; i < x.length; i++) {
                        if (elmnt != x[i] && elmnt != inp) {
                            x[i].parentNode.removeChild(x[i]);
                        }
                    }
                }
                /*execute a function when someone clicks in the document:*/
                document.addEventListener("click", function (e) {
                    closeAllLists(e.target);
                });
            }

            /*An array containing all the country names in the world:*/
            var countries = [
<?php
$sql_prod = mysqli_query($link, "SELECT * FROM `produit`");
while (
$data_prod = mysqli_fetch_array($sql_prod)) {
    ?>
                    "<?php echo $data_prod['nom'] ?>  <?php echo $data_prod['ref'] ?> ---ID <?php echo $data_prod['id'] ?>",
<?php } ?>
                    ];
                    /*initiate the autocomplete function on the "devc" element, and pass along the countries array as possible autocomplete values:*/
                    autocomplete(document.getElementById("produit"), countries);

            function removeProduct(id) {
                devisId=document.getElementById('pr-'+id).dataset.detail;

                $('#pr-'+id).closest("tr").remove();

                $.ajax({
                    type: "POST",
                    url: "calcul.php?productId="+id,
                    success: function (data) {
                        document.getElementById("calcul").innerHTML = data;
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "deleteDetailDevis.php?detail="+devisId,
                    success: function (data) {
                        console.log(data)
                    }
                })
            }

        </script>

    </body>
</html>