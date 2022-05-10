<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$id = $_GET['id'];
$produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id=" . $id));
$cat = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `cat` where id=" . $produit['cat']));
if (isset($_POST['mod'])) {
    $stock = $_POST['stock'];
    $stock_min = $_POST['stock_min'];
    $seil_s = $_POST['seil_s'];
    mysqli_query($link, " UPDATE produit SET stock='" . $stock . "', stock_min='" . $stock_min . "', seil_s='" . $seil_s . "', stocka='1' WHERE id=" . $id . "")or die(mysqli_error($link));
    echo '<script>window.location = ("gestiondes.php?id=' . $id . '")</script>';
}
?>

<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Liste des produits</title>
        <meta name="description" >
        <link rel="manifest" href="<?php echo url ?>static/manifest.json">
        <link href="data.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/favicon.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo url ?>static/wuro_picto_touch_76x76.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo url ?>static/wuro_picto_touch_120x120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo url ?>static/wuro_picto_touch_152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo url ?>static/wuro_picto_touch_180x180.png">
        <link rel="apple-touch-icon" sizes="192x192" href="<?php echo url ?>static/wuro_picto_touch_192x192.png">
        <link rel="shortcut icon" sizes="196x196" href="<?php echo url ?>static/wuro_android_touch_196x196.png">
        <link rel="shortcut icon" sizes="128x128" href="<?php echo url ?>static/wuro_android_touch_128x128.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style3.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .vue-js-switch[data-v-25adc6c0] {
                display: inline-block;
                position: relative;
                vertical-align: middle;
                user-select: none;
                font-size: 10px;
                cursor: pointer;
            }
            .vue-js-switch .v-switch-input[data-v-25adc6c0] {
                opacity: 0;
                position: absolute;
                width: 1px;
                height: 1px;
            }
            .vue-js-switch .v-switch-core[data-v-25adc6c0] {
                display: block;
                position: relative;
                box-sizing: border-box;
                outline: 0;
                margin: 0;
                transition: border-color .3s,background-color .3s;
                user-select: none;

                width: 50px;
                height: 22px;
                background-color: rgb(40, 204, 191);
                border-radius: 11px;
            }
            .vue-js-switch .v-switch-core .v-switch-button[data-v-25adc6c0] {
                display: block;
                position: absolute;
                overflow: hidden;
                top: 0;
                left: 0;
                border-radius: 100%;
                background-color: #fff;
                z-index: 2;
                width: 16px;
                height: 16px;
                transition: transform 300ms ease 0s;
                transform: translate3d(31px, 3px, 0px);
            }
            .vue-js-switch[data-v-25adc6c0] {
                display: inline-block;
                position: relative;
                vertical-align: middle;
                user-select: none;
                font-size: 10px;
                cursor: pointer;

            }
        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> <!---->
            <main class="main">
                <div data-v-77800238="" class="container container-fluid">
                    <div data-v-77800238="" class="card">
                        <div data-v-77800238="" class="card-body">
                            <div data-v-77800238="" class="w_parameters_preheader">
                                <a href="detailprd.php?id=<?php echo $id ?>"><i data-v-77800238="" class="icon ion-ios-arrow-round-back back-to-list"></i></a> 
                                <h1 data-v-77800238="" class="title no-margin-b">Modifier un produit</h1> 

                                <div data-v-77800238="" class="pull-left margin-r">
                                    <div data-v-05970cda="" data-v-77800238="" class="contener-btn-confirm">
                                        <button data-v-05970cda="" type="button"  class="btn btn-secondary btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><!----> 
                                            Supprimer
                                        </button> 

                                    </div>
                                </div> 

                            </div>
                            <div data-v-08517f6c="" class="form-horizontal">
                                <div data-v-08517f6c="" class="tabs" fill="" id="__BVID__118"><!---->
                                    <div class="">
                                        <ul role="tablist" class="nav nav-tabs" id="__BVID__118__BV_tab_controls_">
                                            <li role="presentation" class="nav-item">
                                                <a role="tab" id="__BVID__119___BV_tab_button__" aria-selecli role="presentation" class="nav-item">
                                                    <a role="tab" id="__BVID__133___BV_tab_button__" aria-selected="false"ted="true" aria-setsize="5" aria-posinset="1" target="_self" href="editprd.php?id=<?php echo $id ?>" class="nav-link">Général</a>
                                            </li>
                                            <input  id="idp" name="idp" type="hidden" value="<?php echo $produit['id'] ?>" class="form-control">

                                            <li> 
                                                <a aria-setsize="5" aria-posinset="2" target="_self" href="#" class="nav-link active" tabindex="-1">Gestion des stocks</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="tab-content mt-3" id="__BVID__708__BV_tab_container_">
                                        <div data-v-77800238="" role="tabpanel" aria-hidden="false" aria-expanded="true" class="tab-pane show fade active" style="" id="__BVID__740" aria-labelledby="__BVID__740___BV_tab_button__" tabindex="0">

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheck" onchange="aff(this)"  <?php
                                                if ($produit['stocka'] == 1) {
                                                    echo 'checked';
                                                }
                                                ?> >
                                                <label class="form-check-label" for="flexSwitchCheck">Activer la gestion du stock</label>
                                            </div>


                                            <form action="" method="post" class="">
                                                <div data-v-77800238="" class="row" <?php
                                                if ($produit['stocka'] == 0) {
                                                    echo'style="display: none"';
                                                }
                                                ?> id="block">

                                                    <div data-v-77800238="" class="col-sm-4 col-12">
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__743" aria-labelledby="__BVID__743__BV_label_">
                                                            <label for="productNbStock" class="d-block" id="__BVID__743__BV_label_">En stock</label>
                                                            <div>
                                                                <input data-v-77800238="" id="productNbStock" name="stock"  value="<?php echo $produit['stock'] ?>"  type="number" step="0.01" class="form-control"><!----><!----><!---->
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div data-v-77800238="" class="col-sm-4 col-12">
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__745" aria-labelledby="__BVID__745__BV_label_">
                                                            <label for="productNbStockMin" class="d-block" id="__BVID__745__BV_label_">Stock minimum</label>
                                                            <div>
                                                                <input data-v-77800238="" id="productNbStockMin" type="number" name="stock_min" value="<?php echo $produit['stock_min'] ?>" step="0.01" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div data-v-77800238="" class="col-sm-4 col-12">
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__747" aria-labelledby="__BVID__747__BV_label_">
                                                            <label for="productNbStockAlert" class="d-block" id="__BVID__747__BV_label_">Seuil d'alerte</label>
                                                            <div>
                                                                <input data-v-77800238="" id="productNbStockAlert" type="number" name="seil_s" step="0.01" value="<?php echo $produit['seil_s'] ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div  class="col-md-4">
                                                    </div>
                                                    <div  class="col-md-4" style="text-align: center">
                                                        <button data-v-77800238="" type="submit"  name="mod" style="border: 1px solid;" class="btn btn-default">Enregistrer</button>
                                                    </div>
                                                </div> 
                                            </form>

                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="text-align: center">Voulez-vous supprimer ce produit ?</p>
                    </div>
                    <footer class="modal-footer" id="__BVID__36___BV_modal_footer_">
                        <div data-v-05970cda=""><div data-v-05970cda="" class="all-width">
                                <button data-v-05970cda=""  type="button" class="btn pull-left btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Annuler</button> 
                                <a data-v-05970cda="" href="del.php?id=<?php echo $id ?>"  role="button"  class="btn pull-right btn-outline-danger"> Supprimer</a>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.6.0.slim.js"
            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
        crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" async=""></script>

       <!-- comment <script charset="utf-8" src="<?/*php echo url ?>static/js/47.033ed7d2c59cf39a92c0.js"></script>
        <script charset="utf-8" src="<?/*php echo url ?>static/js/4.270b6a4056efb0e6cd10.js"></script>-->


        <script>




                                                    function aff(checkboxElem) {
                                                        if (checkboxElem.checked) {
                                                            document.getElementById("block").style.display = "flex";
                                                        } else {

                                                            var idp = document.getElementById("idp").value;
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "change_stock.php?idp=" + idp,
                                                                success: function (o) {
                                                                    document.getElementById("block").style.display = "none";
                                                                }
                                                            });

                                                        }
                                                    }
        </script>



    </body>
</html>
