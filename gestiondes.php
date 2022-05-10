
<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$id = $_GET['id'];
$produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id=" . $id));
$cat = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `cat` where id=" . $produit['cat_id']));
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
            </div>
            <main class="main">
                <div data-v-08517f6c="" class="containercontainer-fluid">
                    <div data-v-08517f6c="" class="card">
                        <div data-v-08517f6c="" class="card-body">
                            <div data-v-08517f6c="" class="w_parameters_preheader">
                                <a href="detailprd.php?id=<?php echo $id ?>"><i data-v-08517f6c="" class="icon ion-ios-arrow-round-back back-to-list"></i></a> 
                                <h1 data-v-08517f6c="" class="title no-margin-b"><?php echo $produit['nom'] ?></h1> 

                                <a href="editgs.php?id=<?php echo $produit['id'] ?>"> <button data-v-08517f6c="" type="submit" style="border:1px solid" class="btn btn-default">Modifier</button></a>

                            </div> 
                            <div data-v-08517f6c="" class="form-horizontal">
                                <div data-v-08517f6c="" class="tabs" fill="" id="__BVID__254"><!---->
                                    <div class="">
                                        <ul role="tablist" class="nav nav-tabs" id="__BVID__254__BV_tab_controls_">
                                            <li role="presentation" class="nav-item">
                                                <a role="tab" id="__BVID__255___BV_tab_button__" aria-selected="false" aria-setsize="5" aria-posinset="1" target="_self" href="detailprd.php?id=<?php echo $produit['id'] ?>" class="nav-link" tabindex="-1">Général</a>
                                            </li>
                                            <li role="presentation" class="nav-item">
                                                <a role="tab" id="__BVID__269___BV_tab_button__" aria-selected="true" aria-setsize="5" aria-posinset="2" target="_self" href="" class="nav-link active">Gestion des stocks</a>
                                            </li>
                                        </ul>
                                    </div>



                                    <?php if ($produit['stocka'] == 0) { ?>

                                        <div class="tab-content mt-3" id="__BVID__254__BV_tab_container_">
                                            <div data-v-08517f6c="" role="tabpanel" aria-hidden="false" aria-expanded="true" class="tab-pane show fade active" id="__BVID__269" aria-labelledby="__BVID__269___BV_tab_button__" style="" tabindex="0">
                                                <div data-v-08517f6c="" role="alert" class="alert alert-info mt-5">
                                                    Le stock n'est pas activé sur ce produit
                                                </div> 

                                            </div> 
                                        </div>
                                    <?php } ?>
                                    <?php if ($produit['stocka'] == 1) { ?>
                                        <div data-v-08517f6c="" role="tabpanel" aria-hidden="false" aria-expanded="true" class="tab-pane show fade active" id="__BVID__459" aria-labelledby="__BVID__459___BV_tab_button__" style="" tabindex="0">
                                            <div data-v-08517f6c="" role="alert" class="alert alert-info mt-5">
                                                Le stock est activé sur ce produit
                                            </div> 
                                            <div data-v-08517f6c="" class="row">
                                                <div data-v-08517f6c="" class="col-sm-6 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__473" aria-labelledby="__BVID__473__BV_label_">
                                                        <label for="productNbStock" class="d-block" id="__BVID__473__BV_label_">En stock</label>
                                                        <div><p data-v-08517f6c="" id="productNbStock"><?php echo $produit['stock'] ?></p></div>

                                                    </div>
                                                </div> 
                                                <div data-v-08517f6c="" class="col-sm-6 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__474" aria-labelledby="__BVID__474__BV_label_">
                                                        <label for="productNbStockMin" class="d-block" id="__BVID__474__BV_label_">Stock minimum</label>
                                                        <div>
                                                            <p data-v-08517f6c="" id="productNbStockMin"><?php echo $produit['stock_min'] ?></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div data-v-08517f6c="" class="col-sm-6 col-12">
                                                    <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__475" aria-labelledby="__BVID__475__BV_label_">
                                                        <label for="productNbStockAlert" class="d-block" id="__BVID__475__BV_label_">Seuil d'alerte</label>
                                                        <div>
                                                            <p data-v-08517f6c="" id="productNbStockAlert"><?php echo $produit['seil_s'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
        <script src = "https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity = "sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin = "anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>



       <!-- comment <script charset="utf-8" src="<?/*php echo url ?>static/js/47.033ed7d2c59cf39a92c0.js"></script>
        <script charset="utf-8" src="<?/*php echo url ?>static/js/4.270b6a4056efb0e6cd10.js"></script>-->




    </body>
</html>
