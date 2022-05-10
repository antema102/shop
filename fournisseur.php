<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
?> 
<html lang="fr" >
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Fournisseur</title>
        <meta name="description" >
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <link href="data.css" rel="stylesheet">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="<?php echo url ?>static/client.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/styles.css">
        <style>

            a{
                text-decoration: none !important;
                color: #666f81 !important;
            }
            #BVID__277_info{
                display: none ;
            }
            #produit_previous{
                display: none ;
            }
            #produit_next{
                display: none ;
            }
            #BVID__277_filter{
                display: none ;
            }
            #BVID__277_length{
                display: none ;
            }
            #hi{
                display: none !important;
            }
            @media screen and (min-width:769px) {

                #BVID__277_paginate{
                    margin-right: 344px; ;
                } 
            }
            @media (max-width: 767.98px){
                #ExportReporttopdf{
                    margin: 12px;
                }
                #ExportReporttoExcel{
                    margin: 12px;
                }

                #BV_popover_1{
                    transform:translate3d(0px, -74px, 0px)!important
                }
            }
            .b-table.table.b-table-stacked-md {
                display: block !important;
                width: 100% !important;
            }
            .dt-buttons{
                display: none ; 
            }

            tr{
                text-align: center !important;
                background-color: #FFFFFF !important;
            }
            th{
                text-align: center !important;
                background-color: #FFFFFF !important;
            }

            td{
                text-align: center !important;
                background-color: #FFFFFF !important;
            }
            .overlay.on {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 10;
            }
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
            .bb{
                width: 50px!important;
                height: 50px!important;
                border-radius: 30px!important;
                margin-right: 8px!important;
            }
            .ifarmeimcg{
                width: 50px!important;
                height: 50px!important;

            }


        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> <!----> 
            <main class="main">
                <div class="container-xxl">
                    <div class="row">
                        <div class="col-12">
                            <div class="menu-tabs mt-4">
                                <a class="tab" href="produit.php">Produits</a>
                                <a class="tab active" href="fournisseur.php">Fournisseur</a>
                            </div>
                        </div>
                    </div>
                </div> 
                <div data-v-7b8bed67="" id="content-wrapper" class="container-xxl">
                    <div data-v-7b8bed67="" class="row row_header mb-4">
                        <div data-v-7b8bed67="" class="col-xl-3 col-md-6">
                            <h1 data-v-7b8bed67="" class="title header-form">Fournisseur</h1>
                        </div> 
                        <div data-v-7b8bed67="" class="col-xl-6 col-md-6 d-flex justify-content-center">

                            <input data-v-7b8bed67="" type="text" placeholder="Rechercher une catégorie" class="inline search form-control form-control" id="serchprd"> 
                            <button data-v-7b8bed67="" class="search-icon">
                                <i data-v-7b8bed67="" class="icon ion-ios-search">

                                </i>
                            </button>

                        </div>
                    </div> 
                    <div data-v-7b8bed67="" class="row">
                        <div data-v-7b8bed67="" class="col-md-12 mb-4 d-flex justify-content-end">
                            <div data-v-5232cd18="" data-v-7b8bed67="" class="actions sub-menu product_category">
                                <div data-v-5232cd18="" class="dropdown-item" style="color:#FFFFFF !important">
                                    <a data-v-5232cd18="" href="addfr.php" class="w_actions_button has-tooltip" data-original-title="null" style="color:#FFFFFF !important">
                                        <i data-v-5232cd18="" class="icon ion-ios-add"></i>
                                        <span data-v-5232cd18="" >Ajouter Fournisseur</span>
                                    </a> <!---->
                                </div>


                                <!----> <div data-v-e0aacb1e="" data-v-5232cd18="" class="fab-main-container fl-act-btn" start-opened="true">
                                    <button  type="button" id="dropdownMenuButton2" style="border-bottom-width: 0px;border-right-width: 0px;border-top-width: 0px;border-left-width: 0px;padding-left: 0px;padding-bottom: 0px;padding-right: 0px; padding-top: 0px;" data-bs-toggle="dropdown" aria-expanded="false" class="" id="">
                                        <div data-v-77282e1a="" data-v-e0aacb1e="" class="fab-cantainer fab fab-size-big" data-outside="true" style="transition-timing-function: cubic-bezier(0.24, 0.97, 0.81, 1.2); z-index: 5; background: rgb(22, 194, 194); box-shadow: rgb(102, 102, 102) 0px 2px 8px;">
                                            <div data-v-77282e1a="" class="fabMask">

                                            </div> <!----> 
                                            <i data-v-e0aacb1e="" data-v-77282e1a="" data-outside="true" class="icons iconfont vue-fab-material-icons vue-fab-iconfont-icons ion-ios-add" style="font-size: 15px;"></i>
                                        </div> 
                                    </button>
                                    <div data-v-e0aacb1e=""class="dropdown-menu" aria-labelledby="dropdownMenuButton2" >
                                        <ul style="padding-left:16px">
                                            <li><a data-v-5232cd18="" role="menuitem" target="_self" href="ajouter_prd.php" class="dropdown-item" style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Ajouter un produit
                                                </a> 
                                            </li>
                                            <li><a data-v-5232cd18="" role="menuitem" target="_self" href="addcat.php" class="dropdown-item" style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Ajouter une catégorie
                                                </a> 
                                            </li>
                                            <li><a data-v-5232cd18="" role="menuitem" target="_self" href="addfr.php" class="dropdown-item" style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Ajouter une Fournisseur
                                                </a> 
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                                <div data-v-5232cd18="" class="more-items btn-group b-dropdown dropdown" id="__BVID__157"><!---->
                                    <button  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-link btn-lg" id="">
                                        <i data-v-5232cd18="" class="icon ion-ios-more"></i>
                                    </button>
                                    <div role="menu" tabindex="-1" class="dropdown-menu " aria-labelledby="dropdownMenuButton1">

                                        <ul style="padding-left:16px">
                                            <li><a data-v-5232cd18="" role="menuitem" target="_self" href="ajouter_prd.php" class="dropdown-item" style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Ajouter un produit
                                                </a> 
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div data-v-7b8bed67="" class="row">
                    <div data-v-7b8bed67="" class="col-12" style="padding-left: 40px; padding-right: 40px;">

                    </div>
                    <div data-v-6a7eb354="" class="card table-wrap mb-3"  style="margin-top:32px;">
                        <table data-v-6a7eb354="" role="table" aria-busy="false" aria-colcount="7" class="table b-table fixed-table  responsive-table mb-0 mt-0 table-hover b-table-stacked-md" id="BVID__277">
                            <thead class=""><!---->
                                <tr style="" >
                                    <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:600px !important;">Nom</th>
                                    <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:900px !important;">Téléphone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fr_sql = mysqli_query($link, "SELECT * FROM `founiseur`");
                                while ($fr = mysqli_fetch_array($fr_sql)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $fr['nom'] ?></td>
                                        <td><?php echo $fr['mob'] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>


                        </table>

                    </div>

                </div> <!----> <!---->

            </main>

        </div>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" async=""></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    </body>
</html>