<?php
include 'db.php';
$m = 5;

if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$admin = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `email` = '" . $_SESSION['user'] . "'"));
$_SESSION['cart'] = array();
$_SESSION['prix_ht'] = "";
$_SESSION['prix_ttc'] = "";
$_SESSION['tva'] = "";
$_SESSION['remise'] = "";
$_SESSION['net_a_payer'] = "";
$_SESSION['i'] = 0;
$_SESSION['prix_ht_avoir'] = '';
$_SESSION['fraisLiv'] = '';
$_SESSION['tvaLiv'] = '0';

$max = mysqli_fetch_array(mysqli_query($link, "select max(id) as nb from facture"));
if ($max['nb'] == 0) {
    $maximum = "FAC000001";
} else {
    $maximum = $max['nb'] + 1;

    if (($maximum < 10)) {
        $maximum = "FAC00000" . $maximum;
    }
    if (($maximum < 100) && ($maximum >= 10)) {
        $maximum = "FAC0000" . $maximum;
    }
    if (($maximum < 1000) && ($maximum >= 100)) {
        $maximum = "FAC000" . $maximum;
    }
    if (($maximum < 10000) && ($maximum >= 1000)) {
        $maximum = "FAC00" . $maximum;
    }
    if (($maximum < 100000) && ($maximum >= 10000)) {
        $maximum = "FAC0" . $maximum;
    }
}
?>
<html lang="fr" > 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Ajouter Facture </title>
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
                    /*margin: 1.2cm !important;*/
                    -webkit-transform: scale(0.5)!important;
                    transform: scale(0.5)!important;
                    -webkit-transform-origin: left top!important;
                    transform-origin: left top!important;
                    -moz-transform: scale(0.5);
                    -moz-transform-origin: left top!important;
                }
            }
            
            .page > .content[data-v-561bb412] {
                width: 21cm;
                font-size: 13.5px;
                line-height: 19px;
                margin: 0.9cm;
                margin-top: 0.9cm;
                margin-right: 0.9cm;
                margin-bottom: 2.2cm;
                margin-left: 0.9cm;
            }
        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> 
            <main class="main">
                <form method="post" action="save_facture.php">
                    <div data-v-561bb412="" class="main-quote">

                        <div data-v-561bb412="" class="menu-bar fab" style="left:90px">
                            <div data-v-561bb412="" class="center" style="margin-left:200px;margin-right: 200px;height:58px ; width: 950px;">
                                <div data-v-561bb412="" class="float-right">

                                </div>
                                <div data-v-561bb412="" style="text-align: center;">

                                    <button data-v-561bb412="" name="devadd" type="submit" style=" border:1px solid #3D7DA0;color:#3D7DA0;background: #FFFFFF"  class="btn btn btn-default btn-primary btn-secondary">
                                        Sauvegarder
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div data-v-561bb412="" size="A4" data-id="1" style="height: auto;" class="page narrow top-shadow bottom-shadow">

                            <div data-v-561bb412="" class="content">
                                <div data-v-561bb412="" class="quote-header">
                                    <div data-v-561bb412="" >
                                        <div data-v-561bb412="" class="logo-wrapper" style="height: 100px; margin: 20px;">
                                            <img data-v-561bb412="" loading="lazy" src="<?php echo url ?>static/logo.jpg" alt="" class="logo">
                                        </div>
                                    </div>
                                    <div data-v-561bb412="" data-bs-toggle="modal" data-bs-target="#modalinfo" id="title">
                                        <div data-v-561bb412=""  class="quote-title editable inline-block not-visible" >
                                            <span data-v-561bb412="" class="not-visible"  >
                                                TITRE DU DOCUMENT
                                            </span>
                                        </div>
                                    </div>
                                    <div data-v-561bb412="">
                                        <div data-v-561bb412="" class="quote-name inline-block">
                                            <span data-v-561bb412=""  >
                                                Numéro de Facture : <br>
                                                <input type="hidden" name="numdev" id="numdev" value="<?php echo $maximum ?>" >  <br>
                                                <input data-v-561bb412="" class="editable" type="text" name="numdev" disabled id="numdev" value="<?php echo $maximum ?>" style="border: none;" >  <br>
                                            </span>
                                            <span data-v-561bb412="">
                                                Facture

                                            </span>
                                            <div data-v-561bb412="" class="quote-date">
                                                du
                                                <?php echo date("d-m-Y") ?>
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

                                            <div data-v-561bb412="" id="client" class="client-infos editable inline-block col"  data-bs-toggle="modal" data-bs-target="#modalinfoc">
                                                <span>
                                                    <span data-v-561bb412="">Ajouter un client</span>
                                                </span>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div data-v-561bb412="" class="quote-lines" id="cnt">
                                    <div data-v-561bb412="" class="watermark">Brouillon</div>
                                    <table data-v-561bb412="" class="quote-lines-table">
                                        <thead data-v-561bb412="" class="quote-lines-header">
                                            <tr data-v-561bb412="" style="background-color: #7A238A; color: rgb(255, 255, 255);">
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
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody data-v-561bb412="" id="prdl" class="table__body table__body--empty">

                                        </tbody>
                                        <tbody data-v-561bb412="" id="client1" class="table__body table__body--empty">

                                        </tbody>
                                    </table>
                                    <div data-v-561bb412="" class="line-actions" style="text-align:center;display: inline-block;">
                                        <button data-v-561bb412="" type="button" style=" border:1px solid #3D7DA0;color:#3D7DA0;background: #FFFFFF" data-bs-toggle="modal" data-bs-target="#modalinfoprd" class="btn btn btn-default btn-primary btn-secondary">
                                            Ajouter un produit / service
                                        </button>
                                        <button data-v-561bb412="" id="avoirButton" type="button" style=" border:1px solid #3D7DA0;color:#3D7DA0;background: #FFFFFF;margin: 0px 0px 0px 43px;" data-bs-toggle="modal" data-bs-target="#modalinfavoir" class="btn btn btn-default btn-primary btn-secondary" >
                                           Avoir
                                        </button>
                                    </div>

                                </div>
                                <div data-v-561bb412="">
                                    <div data-v-248579a2="" data-v-561bb412="" class="document-summary-full">
                                        <div data-v-248579a2="" class="document_currency_summary"></div>
                                        <div data-v-248579a2="" class="document_summary" id="calcul">
                                            <table data-v-248579a2="">
                                                <tbody data-v-248579a2="">
                                                    <tr data-v-248579a2="" style="background-color: #7A238A; color: rgb(255, 255, 255);">
                                                        <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif</th>
                                                    </tr> 
                                                    <tr data-v-248579a2="" class="sstitre transport" style="display: none;">
                                                        <td data-v-248579a2="" colspan="2">Transport</td>
                                                    </tr> <!----> <!----> <!---->
                                                    <tr data-v-248579a2="">
                                                        <td data-v-248579a2="">Montant total HT</td>
                                                        <td data-v-248579a2="" role="totalHT" class="r-number">0,00&nbsp;€</td>
                                                    </tr>
<!--                                                    <tr data-v-248579a2="">-->
<!--                                                        <td data-v-248579a2="">Remise Global</td>-->
<!--                                                        <td data-v-248579a2="" role="remiseglobal" class="r-number">0,00&nbsp;€</td>-->
<!--                                                    </tr>-->
                                                    <tr data-v-248579a2="">
                                                        <td data-v-248579a2="">Montant total TVA</td>
                                                        <td data-v-248579a2="" role="totalTVA" class="r-number">0,00&nbsp;€</td>
                                                    </tr>
                                                    <tr data-v-248579a2="" class="total">
                                                        <td data-v-248579a2="">Montant total TTC</td>
                                                        <td data-v-248579a2="" role="total_ttc" class="r-number">0,00&nbsp;€</td>
                                                    </tr>
<!--                                                    <tr data-v-248579a2="">-->
<!--                                                        <td data-v-248579a2="">Net à payer (TTC)</td>-->
<!--                                                        <td data-v-248579a2="" role="net_a_payer" class="r-number">0,00&nbsp;€</td>-->
<!--                                                    </tr>-->
                                                </tbody>
                                            </table>



                                        </div>
                                    </div>
                                    <div data-v-561bb412="" class="editable inline-block payment-block" data-bs-toggle="modal" data-bs-target="#modalinfop" class="not-visible">
                                        <h6 data-v-561bb412="" class="not-visible">  Informations de paiement</h6>
                                        <div id="infop">

                                        </div>
                                    </div>
                                    <div data-v-561bb412="" class="editable inline-block shipping-block" data-bs-toggle="modal" data-bs-target="#modalinfoliv">
                                        <h6 data-v-561bb412=""class="not-visible"> Informations de livraison</h6>
                                        <div id="infol"></div>
                                    </div>
                                    <div data-v-561bb412="" class="quote-footer" style="">
                                        <div id="comm">
                                            <div data-v-561bb412="" class="quote-notes" data-bs-toggle="modal" data-bs-target="#modalinfocomm">
                                                <div data-v-561bb412="" class="editable inline-block">

                                                </div>
                                            </div>
                                        </div>
<!--                                        <div data-v-77800238="" class="row"  id="blockTest">-->
<!---->
<!--                                            <div data-v-77800238="" class="col-sm-4 col-12">-->
<!--                                                <div data-v-77800238="" role="group" class="form-group" id="__BVID__152" aria-labelledby="__BVID__152__BV_label_">-->
<!--                                                    <label for="productPriceTTCtest2" class="d-block" id="__BVID__152__BV_label_">Prix TTC Test (€)</label>-->
<!--                                                    <div>-->
<!--                                                        <input data-v-77800238="" id="productPriceTTCtest2" onblur="calculPrixtest()" name="prixht1" type="number" placeholder="" step="0.01" class="form-control"><!----><!----><!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!---->
<!--                                            <div data-v-77800238="" class="col-sm-4 col-12">-->
<!--                                                <div data-v-77800238="" role="group" class="form-group" id="__BVID__1551" onchange="calculPrixtest()" aria-labelledby="__BVID__1551"><label for="productTvaRate" class="d-block" id="__BVID__1551_">TVA Test</label>-->
<!--                                                    <div>-->
<!--                                                        <select data-v-77800238="" class="custom-select" name="tva1" id="__BVID__1521">-->
<!--                                                            <option data-v-77800238="" value="0">0</option>-->
<!--                                                            <option data-v-77800238="" value="5">5</option>-->
<!--                                                            <option data-v-77800238="" value="10">10</option>-->
<!--                                                            <option data-v-77800238="" value="20">20</option>-->
<!--                                                        </select><!----><!----><!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div data-v-77800238="" class="col-sm-4 col-12" id="blockt">-->
<!--                                                <!--                                                <div data-v-77800238="" class="col-sm-4 col-12" >-->
<!--                                                <div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_">-->
<!--                                                    <label for="productPriceTTCTest" class="d-block" id="__BVID__156__BV_label_">Prix TTC Test(€)</label>-->
<!---->
<!--                                                    <input data-v-77800238="" id="productPriceTTCTest" type="number" name="prixttc1" placeholder="" step="0.01" class="form-control">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->

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
                    <?php include('modalinfo.php') ?>
                    <?php include('modalinfop.php') ?>
                    <?php include('modaldeviclient.php') ?>
                    <?php include('modalcomc.php') ?>
                    <?php include('modalproduitinfo.php') ?>

                    <?php include('modalinfavoir.php') ?>
                    <?php include('modalinfoliv.php') ?>
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
                  }) ;
         $('#modalinfavoir').on('hidden.bs.modal', function(e){
                        $(".modal-body :input").val("");
                        $('#modalinfavoir .modal-body p').remove();
                  }) ;         
        </script>

        <script>
            function livinfo() {
                var adrliv = document.getElementById("adrliv").value;
                var cp = document.getElementById("cp").value;
                var villel = document.getElementById("villel").value;
                var paysl = document.getElementById("paysl").value;
                var mol = document.getElementById("mol").value;
                var frl = document.getElementById("frl").value;
                var tvaLiv = document.getElementById("tvaLiv").value;
                $.ajax({
                    type: "POST",
                    url: "infoliv.php?adrliv=" + adrliv + "&cp=" + cp + "&villel=" + villel + "&paysl=" + paysl + "&mol=" + mol + "&frl=" + frl + "&tvaLiv=" + tvaLiv,
                    success: function (data) {
                        // test wiem
                       // calculFrais();
                        //fin test wiem
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
            
            // function calcul2() {
            //     $.ajax({
            //         type: "POST",
            //         url: "calcul.php",
            //         success: function (data) {
            //             document.getElementById("calcul2").innerHTML = data;
            //         }
            //     });
            // }
            function calculprix() {

                var prix_ttc1 = document.getElementById("prix_ttc1").value;
                var tva1 = document.getElementById("tva1").value;

                $.ajax({
                    type: "POST",
                    url: "calculprixht2.php",
                    data: {
                        prix_ttc1: prix_ttc1,
                        tva1: tva1
                    },
                    success: function (data) {
                        document.getElementById("prixhtt1").innerHTML = data;

                    }
                })
            }

            function calculmo(id_element) {

                var qte = $('#qtee_' + id_element).val();
                var prd = $('#pdd_' + id_element).val();
                var aq = $('#aq_' + id_element).val();


                $.ajax({
                    type: "POST",
                    url: "updatecart.php",
                    data: {
                        id_element: id_element,
                        qte: qte,
                        prd: prd,
                        aq: aq
                    },
                    success: function (data) {
                        document.getElementById("trr_" + id_element).innerHTML = data;
                        calcul();
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

                if (document.getElementById("espece").checked == true) {
                    var espece = 4;
                }


                $.ajax({
                    type: "POST",
                    url: "infodepaiment.php?datep=" + datep + "&numb=" + numb + "&ver=" + ver + "&ch=" + ch + "&cb=" + cb + "&espece=" + espece ,
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
                            $("#client1").append(data);
                        }
                    });
                    $('#modalinfoprd').modal('hide');
                    $(".modal-body :input").val("");
                    $('#modalinfoprd .modal-body p').remove();
                } else {
                    $('#modalinfoprd footer').before().before('<p class="error" style="color:red">Vous n\'avez pas remplit tous les champs !</p>');     
               }  
            }
            function calculPrixtest() {
                var ht = document.getElementById("productPriceTTC").value;
                var tva = document.getElementById("__BVID__1521").value;
                $.ajax({
                    type: "POST",
                    url: "calcultva.php",
                    data: {
                        ht: ht,
                        tva: tva
                    },
                    success: function (data) {
                        document.getElementById("blockt").innerHTML = data;


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
            function calculPrixtest2() {
                var ht = document.getElementById("productPriceTTC").value;
                // var ht = document.getElementById("prixttct").value;
                var tva = document.getElementById("__BVID__1551_").value;
                $.ajax({
                    type: "POST",
                    url: "calculprixht2.php",
                    data: {
                        ht: ht,
                        tva: tva
                    },
                    success: function (data) {
                        document.getElementById("blockt2").innerHTML = data;


                    }
                });

            }
            function avoirClient() {
                $('#modalinfavoir .modal-body p').remove();
                var avoirElt = document.getElementById("clientavoir").value;
                console.log("calculAvoir.php?avoirElt=" + avoirElt);
                if(avoirElt) {
                $.ajax({
                    type: "POST",
                    url: "infavoir.php?avoirElt=" + avoirElt,
                    success: function (data) {
                        $("#prdl").append(data);
                        $.ajax({
                            type: "POST",
                            url: "calculAvoir.php?avoirElt=" + avoirElt,
                            success: function (data) {
                                document.getElementById("calcul").innerHTML = data;
                            }
                    });
                    }
                });
                    $('#modalinfavoir').modal('hide');
                    $(".modal-body :input").val("");
                    $('#modalinfavoir .modal-body p').remove();
                    $('#avoirButton').prop('disabled', true);
                } else {
                    $('#modalinfavoir footer').before().before('<p class="error" style="color:red">Le champ client est obligatoire !</p>');     
               } 
               
            }

            function calculRemise2() {
                var ht = document.getElementById("prixhtt").value;
                var tva = document.getElementById("tva").value;
                var remise = document.getElementById("remise").value;
                $.ajax({
                    type: "POST",
                    url: "calculnetpayer.php",
                    data: {
                        ht: ht,
                        tva: tva,
                        remise: remise
                    },

                    success: function (data) {
                        document.getElementById("net_a_payer").innerHTML = data;
                    }
                });
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
                    var a, b, i, val = this.value.trim();
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
                        //use trim to remove extra space from the string
                        if (arr[i].trim().substr(0, val.length).toUpperCase() == val.toUpperCase()) {
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
                    "<?php echo utf8_decode($data_client['prenom']) ?> <?php echo utf8_decode($data_client['nom']) ?> --<?php echo $data_client['id'] ?>",
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
            var countries2 = [
                <?php
                $sql_avoir = mysqli_query($link, "SELECT * FROM `avoir` WHERE `etat_avoir` = 1");
                while (
                $data_avoir = mysqli_fetch_array($sql_avoir)) {
                ?>
                "<?php echo $data_avoir['num'] ?> ---ID <?php echo $data_avoir['id'] ?>",
                
                <?php } ?>
            ];
            /*initiate the autocomplete function on the "devc" element, and pass along the countries array as possible autocomplete values:*/
            autocomplete(document.getElementById("clientavoir"), countries2);

            function removeProduct(id) {
                if(id === undefined) {
                    $('#pr-').closest("tr").remove();
                } else {
                    $('#pr-'+id).closest("tr").remove();
                    $.ajax({
                        type: "POST",
                        url: "calcul.php?productId="+id,
                        success: function (data) {
                            document.getElementById("calcul").innerHTML = data;
                        }
                    });
                } 
            }
            function removeAvoir(id) {
                $('#avoirButton').prop('disabled', false);
                if(id === undefined) {
                    $('#pr-').closest("tr").remove();
                } else {
                    $('#pr-'+id).closest("tr").remove();
                    
                    $.ajax({
                        type: "POST",
                        url: "calculAvoir.php?",
                        success: function (data) {
                            document.getElementById("calcul").innerHTML = data;
                        }
                    });

                } 
            }

            function calculFrais(id) {
                
                    $.ajax({
                        type: "POST",
                        url: "calcul.php?productId="+id,
                        success: function (data) {
                            document.getElementById("calcul").innerHTML = data;
                        }
                    });
            }
        </script>

    </body>
</html>