<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$produit_sql = mysqli_query($link, "SELECT * FROM `produit` ");
$user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` where email ='" . $_SESSION['user'] . "' "));
$m = 1;
?>

<html lang="fr" >
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <meta name="theme-color" content="#4bddd3">
    <title>Dashboard</title>
    <meta name="description" >
    <link rel="manifest" href="<?php echo url ?>static/manifest.json">
    <link href="data.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
    <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo url ?>static/style.css" rel="stylesheet">
    <link href="<?php echo url ?>static/style2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .btbt{
            width: 50px!important;
            height: 50px!important;
            line-height: 43px!important;
            border-radius: 30px!important;
            margin-right: 8px!important;
            background: #28B5BF!important;
            color: #fff!important;
            font-size: 25px !important;
        }
    </style>
</head>

<body lang="fr" >
<div class="LayoutShell">
    <div class="CommonShell">
        <?php include ('header.php'); ?>
    </div> <!---->
    <main class="main">
        <div class="container-xxl"><div class="row">
                <div class="col-12"><!----></div>

            </div>

        </div>
        <div class="home-container container-fluid">
            <div class="home">
                <div class="row">
                    <div class="col-sm-12 col-xl-8">
                        <div>
                            <h1 class="title header-form">Gestion commerciale</h1>
                            <div class="apps apps-commercial">
                                <div data-v-4bb9630a="" class="menu-wuro row d-flex align-content-around flex-wrap">
                                    <div data-v-1739b626="" data-v-4bb9630a="" class="col-lg-3 col-6 mb-4">
                                        <div data-v-1739b626="" class="menu-item card h-100 d-flex justify-content-center">
                                            <div data-v-1739b626="" id="factures" class="row flex-row align-items-center text-center">
                                                <div data-v-1739b626="" class="col-11" onmouseover="ch7()" onmouseout="ch8()">
                                                    <p data-v-1739b626="" class="mb-0">
                                                        <a data-v-1739b626="" href="facture.php">  <img data-v-1739b626="" id="psvg7" src="<?php echo url ?>static/factures.svg" class="svg svg-absences" alt="alt"/></a>
                                                        <a data-v-1739b626="" href="facture.php"><img data-v-1739b626="" id="psvg8" style="display:none" src="<?php echo url ?>static/factures1.svg" class="svg svg-absences" alt="alt"/></a>
                                                        <a data-v-1739b626="" href="facture.php" class="menu-title">Factures</a>

                                                    </p>

                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>

                                    <div data-v-1739b626="" data-v-4bb9630a="" class="col-lg-3 col-6 mb-4">
                                        <div data-v-1739b626="" class="menu-item card h-100 d-flex justify-content-center">
                                            <div data-v-1739b626="" id="factures" class="row flex-row align-items-center text-center">
                                                <div data-v-1739b626="" class="col-12" onmouseover="ch9()" onmouseout="ch10()">
                                                    <p data-v-1739b626="" class="mb-0">
                                                        <a data-v-1739b626="" href="espace.php">  <img data-v-1739b626="" id="psvg9" src="<?php echo url ?>static/factures.svg" class="svg svg-absences" alt="alt"/></a>
                                                        <a data-v-1739b626="" href="espace.php"><img data-v-1739b626="" id="psvg10" style="display:none" src="<?php echo url ?>static/factures1.svg" class="svg svg-absences" alt="alt"/></a>
                                                        <a data-v-1739b626="" href="espace.php" class="menu-title">Proforma</a>

                                                    </p>

                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>

                                    <div data-v-1739b626="" data-v-4bb9630a="" class="col-lg-3 col-6 mb-4">
                                        <div data-v-1739b626="" class="menu-item card h-100 d-flex justify-content-center">
                                            <div data-v-1739b626="" id="factures" class="row flex-row align-items-center text-center">
                                                <div data-v-1739b626="" class="col-11" onmouseover="ch11()" onmouseout="ch12()">
                                                    <p data-v-1739b626="" class="mb-0" href="avoir.php">
                                                        <a data-v-1739b626="" href="avoir.php">  <img data-v-1739b626="" id="psvg11" src="<?php echo url ?>static/avoir.svg" class="svg svg-absences" alt="alt"/></a>
                                                        <a data-v-1739b626="" href="avoir.php"><img data-v-1739b626="" id="psvg12" style="display:none" src="<?php echo url ?>static/avoir1.svg" class="svg svg-absences" alt="alt"/></a>
                                                        <a data-v-1739b626="" href="avoir.php" class="menu-title">AVOIR</a>

                                                    </p>

                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>
                                    <div data-v-1739b626="" data-v-4bb9630a="" class="col-lg-3 col-6 mb-4">
                                        <div data-v-1739b626="" class="menu-item card h-100 d-flex justify-content-center">
                                            <div data-v-1739b626="" id="devis" class="row flex-row align-items-center text-center">
                                                <div data-v-1739b626="" class="col-10" onmouseover="ch5()" onmouseout="ch6()">
                                                    <p data-v-1739b626="" class="mb-0">
                                                        <a data-v-1739b626="" href="devis.php">  <img data-v-1739b626="" id="psvg5" src="<?php echo url ?>static/devis.svg" class="svg svg-absences" alt="alt"/></a>
                                                        <a data-v-1739b626="" href="devis.php"><img data-v-1739b626="" id="psvg6" style="display:none" src="<?php echo url ?>static/devis1.svg" class="svg svg-absences" alt="alt"/></a>
                                                        <a data-v-1739b626="" href="devis.php" class="menu-title">Devis</a>

                                                    </p>
                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>

                                    <div data-v-1739b626="" data-v-4bb9630a="" class="col-lg-3 col-6 mb-4">
                                        <div data-v-1739b626=""   class="menu-item card h-100 d-flex justify-content-center">
                                            <div data-v-1739b626=""  class="row flex-row align-items-center text-center">
                                                <div data-v-1739b626="" class="col-11" onmouseover="ch()" onmouseout="ch2()">

                                                    <p data-v-1739b626="" class="mb-0">

                                                        <a data-v-1739b626="" href="client.php" ><img data-v-1739b626="" id="psvg1" src="<?php echo url ?>static/clients.svg" class="svg svg-absences" alt="alt"/> </a>
                                                        <a data-v-1739b626="" href="client.php" ><img data-v-1739b626="" id="psvg2" style="display:none" src="<?php echo url ?>static/clients1.svg" class="svg svg-absences" alt="alt"/> </a>
                                                        <a data-v-1739b626="" href="client.php" class="menu-title">Clients</a>
                                                    </p>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                    </div> <!---->


                                    <div data-v-1739b626="" data-v-4bb9630a="" class="col-lg-3 col-6 mb-4">
                                        <div data-v-1739b626="" class="menu-item card h-100 d-flex justify-content-center">
                                            <div data-v-1739b626="" id="products" class="row flex-row align-items-center text-center">

                                                <div data-v-1739b626="" class="col-11" onmouseover="ch3()" onmouseout="ch4()" >
                                                    <p data-v-1739b626="" class="mb-0">

                                                        <img data-v-1739b626="" id="psvg3" src="<?php echo url ?>static/products.svg" class="svg svg-absences" alt="alt"/>
                                                        <a href="<?php echo url ?>produit.php" ><img data-v-1739b626="" id="psvg4" style="display:none" src="<?php echo url ?>static/products1.svg" class="svg svg-absences" alt="alt"/></a>
                                                        <a data-v-1739b626="" href="<?php echo url ?>produit.php"  class="menu-title">Produits</a>
                                                    </p>
                                                </div>

                                            </div>
                                        </div> <!---->
                                    </div>
                                </div>
                            </div>

                            <h1 class="title header-form">Gestion d'entreprise</h1>
                            <div class="apps apps-else">
                                <div data-v-4bb9630a="" class="menu-wuro row d-flex align-content-around flex-wrap">


                                    <div data-v-1739b626="" data-v-4bb9630a="" class="col-lg-3 col-6 mb-4">
                                        <div data-v-1739b626="" class="menu-item card h-100 d-flex justify-content-center">
                                            <div data-v-1739b626="" id="absences" class="row flex-row align-items-center text-center">
                                                <div data-v-1739b626="" class="col-12">
                                                    <p data-v-1739b626="" class="mb-0">
                                                        <img data-v-1739b626="" src=" <?php echo url ?>static/absences.svg" class="svg svg-absences" alt="alt"/>

                                                    </p>
                                                    <a data-v-1739b626="" href="" class="menu-title">Absences</a>
                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>
                                    <div data-v-61739b626="" data-v-4bb9630a="" class="col-lg-3 col-6 mb-4">
                                        <div data-v-1739b626="" class="menu-item card h-100 d-flex justify-content-center">
                                            <div data-v-1739b626="" id="achats" class="row flex-row align-items-center text-center">
                                                <div data-v-1739b626="" class="col-12"><p data-v-1739b626="" class="mb-0">
                                                        <object data-v-1739b626="" type="image/svg+xml" data=" <?php echo url ?>static/achats.svg" class="svg svg-achats"></object></p>
                                                    <a data-v-1739b626="" href="" class="menu-title">Achats</a>
                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>
                                    <div data-v-61739b626="" data-v-4bb9630a="" class="col-lg-6 col-6 mb-4">
                                        <div data-v-1739b626="" class="menu-item card h-100 d-flex justify-content-center">
                                            <div data-v-96556846="" class="row flex-row align-items-center flex-nowrap">
                                                <div data-v-96556846="" class="col-sm-6 image">
                                                    <p data-v-96556846="">
                                                        <img data-v-96556846="" src="./static/statistiques.svg">
                                                    </p>
                                                </div>
                                                <div data-v-96556846="" class="col-sm-6 flex-column links">
                                                    <p data-v-96556846="" class="menu-title mb-2">Statistiques</p>
                                                    <a data-v-96556846="" div=""></a>
                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>

                                </div>
                            </div>
                            <div>
                                <?php if ($user['role'] == '1') { ?>
                                    <h1 class="title header-form">L'équipe</h1>
                                    <div class="row">
                                        <div class="team w-100 d-flex flex-wrap"><!---->
                                            <div class="add-member col-6 col-lg-4 col-xl-3 mb-3">
                                                <a href="user_add.php">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="btn-dash mb-0">
                                                                <i class="icon ion-md-add"></i>
                                                            </p>
                                                        </div>
                                                        <div class="col flex-column align-self-center">
                                                            <p class="mb-0" style="font-size: 0.85rem;">
                                                                Ajouter un collaborateur
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php
                                            $user2 = mysqli_query($link, "SELECT * FROM `user` LIMIT 8 ");
                                            while ($data_u = mysqli_fetch_array($user2)) {
                                                ?>

                                                <div data-v-7b8b00a2="" class="team-member col-6 col-lg-4 col-xl-3 mb-3">
                                                    <div data-v-7b8b00a2="" class="user row">
                                                        <?php
                                                        if ($data_u['img'] == '') {
                                                            $letter = strtoupper(substr($data_u['prenom'], 0, 1));
                                                            ?>


                                                            <span data-v-143dd668="" class="btbt" style="text-align:center">
                                                                        <span data-v-143dd668="" style="text-align:center">
                                                                            <span data-v-143dd668="" style="text-align:center"> <?php echo $letter ?></span>
                                                                        </span>
                                                                    </span>


                                                        <?php } else { ?>
                                                            <div data-v-7b8b00a2="" class="col col-picture">
                                                                <div data-v-7b8b00a2="" style="width: 45px; position: relative;">
                                                                    <p data-v-7b8b00a2="" class="avatar-container mt-auto mb-auto rounded-circle" style="height: 45px; width: 45px;">
                                                                        <img data-v-7b8b00a2="" src="<?php echo $data_u ['img'] ?>" class="user-avatar img-fluid"></p>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <div data-v-7b8b00a2="" class="col col-description flex-column details overellipse">
                                                            <p data-v-7b8b00a2="" class="user-name"><?php echo $data_u ['prenom'] ?> <?php echo $data_u ['nom'] ?></p>
                                                            <p data-v-7b8b00a2="" class="user-description mb-0 overellipse"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>




                                            <div class="add-member col-6 col-lg-4 col-xl-3 mb-3">
                                                <a href="list_user.php">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="btn-dash mb-0">
                                                                <i class="fas fa-ellipsis-h"></i>
                                                            </p>
                                                        </div>
                                                        <div class="col flex-column align-self-center">
                                                            <p class="mb-0" style="font-size: 0.85rem;">
                                                                Liste Utilisateur
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>


                                            <div class="w_modal_user">
                                                <div id="__BVID__58___BV_modal_outer_" style="position: absolute; z-index: 2000;">
                                                    <div role="dialog" tabindex="-1" aria-hidden="true" class="modal fade" id="__BVID__58" style="display: none;">
                                                        <div class="modal-dialog modal-md modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                            <div role="document" class="modal-content" id="__BVID__58___BV_modal_content_" aria-labelledby="__BVID__58___BV_modal_header_" aria-describedby="__BVID__58___BV_modal_body_">
                                                                <header class="modal-header" id="__BVID__58___BV_modal_header_">
                                                                    <h5 class="modal-title">Informations utilisateur</h5>
                                                                    <button type="button" aria-label="Close" class="close">×</button>
                                                                </header>
                                                                <div class="modal-body" id="__BVID__58___BV_modal_body_">

                                                                </div><!---->
                                                            </div>

                                                        </div>

                                                    </div><!----><!---->
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                <?php } ?>

                            </div>

                        </div> <!---->
                    </div>
                    <div class="right-column col-sm-12 col-xl-4">
                        <div data-v-43a31f64="" class="profile card hidden-phone">
                            <div data-v-43a31f64="" class="user row align-items-center mb-2">
                                <div data-v-43a31f64="" class="col-3 text-center">
                                    <?php
                                    $letter1 = strtoupper(substr($user['prenom'], 0, 1));
                                    ?>
                                    <span data-v-143dd668="" class="btbt" style="text-align:center; ;">
                                                <span data-v-143dd668="" style="text-align:center;width: 50px;height: 50px;padding-top: 20px;padding-bottom: 20px;padding-right: 20px;padding-left: 20px;">
                                                    <span data-v-143dd668="" style="text-align:center"> <?php echo $letter1 ?></span>
                                                </span>
                                            </span>

                                </div>
                                <div data-v-43a31f64="" class="col-9 flex-column align-self-center details">
                                    <p data-v-43a31f64="" class="black-subtitle">Hi, <?php echo $user['prenom']?> !! 👋🏻</p>
                                    <p data-v-43a31f64="" class="mb-0"></p>
                                </div>
                            </div> <!----> <!---->
                        </div>

                        <div data-v-43a31f64="" class="profile card hidden-phone">
                            <div data-v-43a31f64="" class="user row align-items-center mb-2">
                                <div data-v-43a31f64="" class="col-3 text-center">
                                    <p data-v-43a31f64="" class="black-subtitle"> <i class="far fa-user"></i></p>
                                </div>
                                <div data-v-43a31f64="" class="col-9 flex-column align-self-center details">
                                    <p data-v-43a31f64="" class="black-subtitle"> N°bre des clients</p>
                                    <?php $numclt = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `client`")) ?>
                                    <p data-v-43a31f64="" class="mb-0" style="color:  #28B5BF;font-weight: bold;"><?php echo $numclt ?></p>
                                </div>
                            </div> <!----> <!---->
                            <div data-v-43a31f64="" class="user row align-items-center mb-2">
                                <div data-v-43a31f64="" class="col-3 text-center">
                                    <p data-v-43a31f64="" class="black-subtitle"> <i class="fab fa-product-hunt"></i></p>
                                </div>
                                <div data-v-43a31f64="" class="col-9 flex-column align-self-center details">
                                    <p data-v-43a31f64="" class="black-subtitle"> N°bre des Produits</p>
                                    <?php $numprd = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `produit`")) ?>
                                    <p data-v-43a31f64="" class="mb-0" style="color:  #28B5BF;font-weight: bold;"><?php echo $numprd ?></p>
                                </div>
                            </div> <!----> <!---->
                        </div>

                        <!-- <div data-v-43a31f64="" class="profile card hidden-phone">
                        </div> -->

                        <style>
                            .tableau-bord-custom {
                                padding: 14px 14px;
                            }
                            .header-tableau-bord{
                                display: flex;
                                justify-content: space-between;
                                margin-bottom: 10px;
                                color: #333333;
                                font-family: var(--headings-font-family);
                            }
                            .header-tableau-bord p {
                                display: flex;
                                align-items: center;
                                font-size: 0.75rem;
                                font-weight: 600;
                                margin-bottom: 0px;
                                white-space: nowrap;
                            }
                            .header-tableau-bord p i {
                                font-size: 1rem;
                                margin-right: 2px;
                            }

                            .content-tableau-bord {
                                display: flex;
                                flex-wrap: wrap;
                                color: #333333;
                                font-family: var(--headings-font-family);
                            }

                            .card-custom {
                                flex: 1;
                                border: 1px solid #c2c2c2;
                                text-align: center;
                                padding: 10px 5px;
                                border-radius: 0px 8px 8px 0px;
                            }

                            .card-custom-full {
                                flex: 1;
                                border: 1px solid #c2c2c2;
                                padding: 10px 20px;
                                border-radius: 8px;
                                width: 100%;
                            }

                            .blue-card {
                                border-right-width: 0;
                                background-color: #28B5BF ;
                                color: #fff;
                                border-radius: 8px 0px 0px 8px;
                            }

                            .card-custom-title{
                                font-size: 1rem;
                                font-weight: 600;
                            }

                            .card-custom-value {
                                margin-top: 10px;
                                font-size: 1rem;
                            }

                            .tableau-bord-reportrange {
                                background: #fff;
                                cursor: pointer;
                                padding: 5px 10px;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                font-size: 0.70rem;
                            }

                            .blue-date {
                                color: #28B5BF;
                                font-weight: 600;
                            }

                            .best_selling_product {
                                display: flex;
                                align-items: center;
                                margin-bottom: 2px;
                                font-size: 0.85rem;
                            }
                            .best_selling_product p {
                                text-overflow: ellipsis;
                                overflow: hidden;
                                white-space: nowrap;
                            }
                            .product_count_tag {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                min-width: 30px;
                                height: 25px;
                                padding: 0 6px;
                                border-radius: 4px;
                                margin-right: 6px;
                                background: #28B5BF;
                                color: #fff;
                            }

                            .three-dots-loading:after {
                                overflow: hidden;
                                display: inline-block;
                                vertical-align: bottom;
                                -webkit-animation: ellipsis steps(4,end) 900ms infinite;
                                animation: ellipsis steps(4,end) 900ms infinite;
                                content: "\2026"; /* ascii code for the ellipsis character */
                                width: 0px;
                                font-weight: 900;
                            }
                            @keyframes ellipsis {
                                to {
                                    width: 20px;
                                }
                            }
                            @-webkit-keyframes ellipsis {
                                to {
                                    width: 20px;
                                }
                            }

                        </style>
                        <div class="profile card hidden-phone tableau-bord-custom" style="border-radius: 30px;">
                            <div class="header-tableau-bord">
                                <p>
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                    TABLEAU DE BORD
                                </p>
                                <!-- <div>
                                    <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                                </div> -->

                                <div id="reportrange"
                                class="tableau-bord-reportrange">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="content-tableau-bord">
                                <div class="card-custom blue-card">
                                    <div class="card-custom-title">Ventes</div>
                                    <div id="card-custom-value-1" class="card-custom-value three-dots-loading">
                                    </div>
                                </div>
                                <div class="card-custom">
                                    <div class="card-custom-title">Panier moyen</div>
                                    <div id="card-custom-value-2" class="card-custom-value three-dots-loading">
                                    </div>
                                </div>
                            </div>
                            <div class="content-tableau-bord mt-2">
                                <div class="card-custom-full">
                                    <div class="black-subtitle">Meilleur client</div>
                                    <div id="card-custom-value-3" class="card-custom-value text-center three-dots-loading">
                                    </div>
                                </div>
                            </div>
                            <div class="content-tableau-bord mt-2">
                                <div class="card-custom-full">
                                    <div class="black-subtitle" style="display: flex"><i class="fas fa-chart-line mr-2 mt-1" aria-hidden="true"></i> Les Produits les plus vendus</div>
                                    <div id="card-custom-value-4" class="card-custom-value three-dots-loading">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



<script>

$(function() {

    var start = moment();
    var end = moment();

    function setLoading(status) {
        if (status) {
            $('.card-custom-value').addClass('three-dots-loading')
        } else {
            $('.card-custom-value').removeClass('three-dots-loading')
        }
    }

    function cb(start, end) {
        $('#reportrange span')
        .html(start.format('[Du <span class="blue-date">]YYYY-MM-DD[</span>]') + ' ' + end.format('[Au <span class="blue-date">]YYYY-MM-DD[</span>]'));

        $('#card-custom-value-1').text('')
        $('#card-custom-value-2').text('')
        $('#card-custom-value-3').text('')
        $('#card-custom-value-4').html('')
        setLoading(true);

        $.ajax({
            type: "POST",
            url: "stats.php",
            dataType: "json",
            data: {
                start: start.format('DD-MM-YYYY'),
                end: end.format('DD-MM-YYYY')
            },
            success: function(response) {
                // Number formatter.
                var formatter = new Intl.NumberFormat('fr-FR', {
                    style: 'currency',
                    currency: 'EUR',
                });
                setLoading(false);
                $('#card-custom-value-1').text(formatter.format(response.turnover) + ' HT')
                $('#card-custom-value-2').text(formatter.format(response.sales) + ' HT')
                $('#card-custom-value-3').text(response.best_client && response.best_client.trim() ? response.best_client : '- - -')
            
                let list = '';
                if (response.best_products) {
                    for (let index = 0; index < response.best_products.length; index++) {
                        const element = response.best_products[index];
                        list += `<li class="best_selling_product"><div class="product_count_tag">${element.count}</div><p class="mb-0">${element.item}<p></li>`;
                    }
                }

                if (list) {
                    list = '<ul style="padding-left: 1rem;">' + list + '</ul>';
                    $('#card-custom-value-4').html(list)
                } else {
                    $('#card-custom-value-4').html('- - -')
                }
            },
            error: function(error) {
                setLoading(false);
                $('#card-custom-value-1').text('- - -')
                $('#card-custom-value-2').text('- - -')
                $('#card-custom-value-3').text('- - -')
                $('#card-custom-value-4').text('- - -')
            }
        });
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
        'Aujourd\'hui': [moment(), moment()],
        'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Les 7 derniers jours': [moment().subtract(6, 'days'), moment()],
        'Les 30 derniers jours': [moment().subtract(29, 'days'), moment()],
        'Ce mois': [moment().startOf('month'), moment().endOf('month')],
        'Le mois dernier': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
           "applyLabel": "Confirmer",
            "cancelLabel": "Annuler",
            "customRangeLabel": "Personnalisé",
            "daysOfWeek": [
                "Di",
                "Lu",
                "Ma",
                "Me",
                "Je",
                "Ve",
                "Sa"
            ],
            "monthNames": [
                "Janvier",
                "Février",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre"
            ],
            "firstDay": 1
        }
    }, cb);

    cb(start, end);

});


    function ch() {
        document.getElementById("psvg1").style.display = "none";
        document.getElementById("psvg2").style.display = "unset";
    }
    function ch2() {
        document.getElementById("psvg1").style.display = "unset";
        document.getElementById("psvg2").style.display = "none";
    }
    function ch3() {
        document.getElementById("psvg3").style.display = "none";
        document.getElementById("psvg4").style.display = "unset";
    }
    function ch4() {
        document.getElementById("psvg3").style.display = "unset";
        document.getElementById("psvg4").style.display = "none";
    }



    function ch5() {
        document.getElementById("psvg5").style.display = "none";
        document.getElementById("psvg6").style.display = "unset";
    }

    function ch6() {
        document.getElementById("psvg5").style.display = "unset";
        document.getElementById("psvg6").style.display = "none";
    }


    function ch7() {
        document.getElementById("psvg7").style.display = "none";
        document.getElementById("psvg8").style.display = "unset";
    }


    function ch8() {
        document.getElementById("psvg7").style.display = "unset";
        document.getElementById("psvg8").style.display = "none";
    }


    function ch9() {
        document.getElementById("psvg9").style.display = "none";
        document.getElementById("psvg10").style.display = "unset";
    }


    function ch10() {
        document.getElementById("psvg9").style.display = "unset";
        document.getElementById("psvg10").style.display = "none";
    }
    function ch11() {
        document.getElementById("psvg11").style.display = "none";
        document.getElementById("psvg12").style.display = "unset";
    }
    function ch12() {
        document.getElementById("psvg11").style.display = "unset";
        document.getElementById("psvg12").style.display = "none";
    }
</script>
</body>
</html>