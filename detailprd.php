<?php
include ('db.php');
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}

$user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` where email ='" . $_SESSION['user'] . "' "));

$id = $_GET['id'];
$produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id=" . $id));
$cat = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `cat` where id=" . $produit['cat_id']));
$fournisseur= mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` where id=" . $produit['id']));
//echo "<pre>";
//print_r($produit);die;
$search =array("0001-01-01","1970-01-01");
$m = 3 ;
?>

<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Liste des produits</title>
        <meta name="description" >
        
        <link href="data.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
       
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style3.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style type="text/css">
            .etiquette svg{
                width: 180px!important;
                height: 120px!important;
            }
        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> <!----> 
            <main class="main">
                <div data-v-08517f6c="" class="container container-fluid">
                    <div data-v-08517f6c="" class="card"><!----><!---->
                        <div data-v-08517f6c="" class="card-body"><!----><!---->
                            <div data-v-08517f6c="" class="w_parameters_preheader">
                                <a href="produit.php"> <i data-v-08517f6c="" class="icon ion-ios-arrow-round-back back-to-list"></i></a> 
                                <h1 data-v-08517f6c="" class="title no-margin-b"><?php echo $produit['nom'] ?></h1> 

                                <a href="editprd.php?id=<?php echo $produit['id'] ?>"><button data-v-08517f6c=""  type="submit" class="btn btn-default" style="border: 1px solid;">Modifier</button></a>

                            </div> 
                            <div data-v-08517f6c="" class="form-horizontal">
                                <div data-v-08517f6c="" class="tabs" fill="" id="__BVID__118"><!---->
                                    <div class="">
                                        <ul role="tablist" class="nav nav-tabs" id="__BVID__118__BV_tab_controls_">
                                            <li role="presentation" class="nav-item">
                                                <a role="tab" id="__BVID__119___BV_tab_button__" aria-selecli role="presentation" class="nav-item">
                                                    <a role="tab" id="__BVID__133___BV_tab_button__" aria-selected="false"ted="true" aria-setsize="5" aria-posinset="1" target="_self" href="#" class="nav-link active">Général</a>
                                            </li>
                                            <li> 
                                                <a aria-setsize="5" aria-posinset="2" target="_self" href="gestiondes.php?id=<?php echo $id ?>" class="nav-link" tabindex="-1">Gestion des stocks</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="tab-content mt-3" id="__BVID__118__BV_tab_container_">
                                        <div data-v-08517f6c="" role="tabpanel" aria-hidden="false" aria-expanded="true" class="tab-pane show fade active" id="__BVID__119" aria-labelledby="__BVID__119___BV_tab_button__" tabindex="0">
                                            <div data-v-08517f6c="" class="row product-form">
                                                <div data-v-08517f6c="" class="col-sm-6 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__121" aria-labelledby="__BVID__121__BV_label_">
                                                        <label for="productReference1" class="d-block" id="__BVID__121__BV_label_">code-barres</label>
                                                        <div><p data-v-08517f6c="" id="productReference1" class="etiquette">                                                           
                                                        <?php
                                                            require 'vendor/vendor/autoload.php';
                                                           if($produit['code_a_barre']!="")
                                                           { 
                                                            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                            $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
														   echo $generator->getBarcode($produit['code_a_barre'], $generator::TYPE_CODE_128,3,100);
                                                        }
                                                        ?>
                                                        </p>
                                                        </div>
                                                    </div>


                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__121" aria-labelledby="__BVID__121__BV_label_">
                                                        <label for="productReference" class="d-block" id="__BVID__121__BV_label_">Référence</label>
                                                        <div><p data-v-08517f6c="" id="productReference"><?php echo $produit['ref'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__122" aria-labelledby="__BVID__122__BV_label_">
                                                        <label for="productName" class="d-block" id="__BVID__122__BV_label_">Nom</label>
                                                        <div><p data-v-08517f6c="" id="productName"><?php echo $produit['nom'] ?></p>
                                                        </div>
                                                    </div>
                                                    <?php  if(!in_array($produit['datecommande'],$search)){?>
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__133" aria-labelledby="__BVID__133__BV_label_">
                                                        <label for="datecommande" class="d-block" id="__BVID__133__BV_label_">Date de commande</label>
                                                        <div><p data-v-08517f6c="" data-date-format="" id="datecommande"><?php echo date("d-m-Y", strtotime($produit['datecommande'] )) ?></p>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php  if(!in_array($produit['dateapprovisionnement'],$search)){?>
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__134" aria-labelledby="__BVID__134__BV_label_">
                                                        <label for="dateapprovisionnement" class="d-block" id="__BVID__134__BV_label_">Date d'approvisonement</label>
                                                        <div><p data-v-08517f6c="" data-date-format="" id="dateapprovisionnement"> <?php echo date("d-m-Y", strtotime($produit['dateapprovisionnement'] ))?></p>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__123" aria-labelledby="__BVID__123__BV_label_">
                                                        <label for="productDescription" class="d-block" id="__BVID__123__BV_label_">Catégorie</label>
                                                        <div>
                                                            <p data-v-08517f6c="" id="productCategory"><?php echo $cat['cat'] ?></p>
                                                        </div>
                                                    </div>

                                                    <?php if ($user['role'] == '1') { ?>
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__123" aria-labelledby="__BVID__123__BV_label_">
                                                        <label for="productDescription" class="d-block" id="__BVID__123__BV_label_">Fournisseur</label>
                                                        <div>
                                                            <p data-v-08517f6c="" id="productCategory"><?php echo $fournisseur['nom'].' '.$fournisseur['prenom'] ?></p>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                   <!-- <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__124" aria-labelledby="__BVID__124__BV_label_">
                                                        <label for="productCode" class="d-block" id="__BVID__124__BV_label_">Code-barres</label>
                                                        <div><p data-v-08517f6c="" id="productCode"><?php echo $produit['code_a_barre'] ?></p>
                                                        </div>
                                                    </div> -->
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__124" aria-labelledby="__BVID__124__BV_label_">
                                                        <label for="productCode" class="d-block" id="__BVID__124__BV_label_">Code analytique</label>
                                                        <div><p data-v-08517f6c="" id="productCode"><?php echo $produit['code_a'] ?></p>
                                                        </div>
                                                    </div> 
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__125" aria-labelledby="__BVID__125__BV_label_">
                                                        <label for="productLink" class="d-block" id="__BVID__125__BV_label_">Lien vers le produit</label>
                                                        <div><p data-v-08517f6c="" id="productLink"><?php echo $produit['lien_v_p'] ?></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div data-v-08517f6c="" class="justify-content-start col-sm-3 col-12">

                                                    <img data-v-08517f6c="" class="ipt-f-img" src="<?php echo $produit['img'] ?>">

                                                </div> 
                                                <div data-v-08517f6c="" class="col-sm-12 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__126" aria-labelledby="__BVID__126__BV_label_">
                                                        <label for="productDescription" class="d-block" id="__BVID__126__BV_label_">Description</label>
                                                        <div>
                                                            <span data-v-08517f6c="" id="productDescription"><?php echo $produit['description'] ?></span><!----><!----><!---->
                                                        </div>

                                                    </div>
                                                </div> 
                                                <div data-v-08517f6c="" class="col-sm-4 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__127" aria-labelledby="__BVID__127__BV_label_">
                                                        <label for="productPriceHT" class="d-block" id="__BVID__127__BV_label_">Prix HT(€)</label>
                                                        <div>
                                                            <p data-v-08517f6c="" id="productPriceHT"><?php echo $produit['prix_ht'] ?></p><!----><!----><!---->
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div data-v-08517f6c="" class="col-sm-4 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__128" aria-labelledby="__BVID__128__BV_label_">
                                                        <label for="productTvaRate" class="d-block" id="__BVID__128__BV_label_">TVA</label>
                                                        <div><p data-v-08517f6c="" id="productTvaRate"><?php echo $produit['tva'] ?>%</p><!----><!----><!----></div>
                                                    </div>
                                                </div> 
                                                <div data-v-08517f6c="" class="col-sm-4 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__129" aria-labelledby="__BVID__129__BV_label_">
                                                        <label for="productPriceTTC" class="d-block" id="__BVID__129__BV_label_">Prix TTC (€)</label>
                                                        <div>
                                                            <p data-v-08517f6c="" id="productPriceTTC"><?php echo $produit['prix_ttc'] ?></p><!----><!----><!---->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-v-08517f6c="" class="col-sm-4 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__130" aria-labelledby="__BVID__130__BV_label_">
                                                        <label for="productBuyingPrice" class="d-block" id="__BVID__130__BV_label_">Coût d'achat HT (€)</label>
                                                        <div><p data-v-08517f6c="" id="productBuyingPrice"><?php echo $produit['cout_achat_ht'] ?></p><!----><!----><!----></div>
                                                    </div>
                                                </div> 
                                                <div data-v-08517f6c="" class="col-sm-4 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__131" aria-labelledby="__BVID__131__BV_label_">
                                                        <label for="productEcotax" class="d-block" id="__BVID__131__BV_label_">Coefficient multiplicateur (€)</label>
                                                        <div><p data-v-08517f6c="" id="productEcotax"><?php echo $produit['eco'] ?></p><!----><!----><!----></div>
                                                    </div>
                                                </div> 
                                                <div data-v-08517f6c="" class="col-sm-4 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__132" aria-labelledby="__BVID__132__BV_label_">
                                                        <label for="productCommercialMargin" class="d-block" id="__BVID__132__BV_label_">Marge commerciale  (€)</label>
                                                        <div><p data-v-08517f6c="" id="productCommercialMargin"><?php echo $produit['marge'] ?></p><!----><!----><!----></div>
                                                    </div>
                                                </div>
                                                <div data-v-08517f6c="" class="col-sm-12 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__191" aria-labelledby="__BVID__191__BV_label_">
                                                        <label for="courtransport" class="d-block" id="__BVID__191__BV_label_">Cour Transport</label>
                                                        <div>
                                                            <span data-v-08517f6c="" id="courtransport"><?php echo $produit['courtransport'] ?></span><!----><!----><!---->
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!----> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!----><!---->
                </div>
            </main>
        </div>




        <script src = "https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity = "sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin = "anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>



        <script defer="defer" src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalPageSDKES6.js?v=151505" async=""></script>


        <script src="https://code.jquery.com/jquery-3.5.1.js" async=""></script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalPageSDKES6.js?v=151505" async=""></script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalPageSDKES6.js?v=151505" async=""></script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalPageSDKES6.js?v=151505" async=""></script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalPageSDKES6.js?v=151505" async=""></script>


        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" async=""></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" async=""></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" async=""></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" async=""></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>

    </body>
</html>
