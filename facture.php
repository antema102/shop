<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$produit_sql = mysqli_query($link, "SELECT * FROM `produit` ");
//echo "<pre>";
//print_r($_SERVER['DOCUMENT_ROOT']);die;
$m = 5;
?>

<html lang="fr">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Liste des Factures</title>
        <meta name="description">
        <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <link href="data.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="<?php echo url ?>static/client.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--        <link rel="stylesheet" href="dist/css/styles.css">-->
<!--        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>-->
        <style>

            a {
                text-decoration: none !important;
                color: #666f81 !important;
            }

            #__BVID__92_info {
                display: none;
            }
            #__BVID__92e0_info {
                display: none;
            }
            #__BVID__92e1_info {
                display: none;
            }
            #__BVID__92e2_info {
                display: none;
            }
            #__BVID__92e3_info {
                display: none;
            }
            #__BVID__92e4_info {
                display: none;
            }
            #__BVID__92e5_info {
                display: none;
            }
            #__BVID__92e6_info {
                display: none;
            }

            #produit_previous {
                display: none;
            }

            #produit_next {
                display: none;
            }

            #__BVID__92_filter {
                display: none;
            }
            #__BVID__92e0_filter {
                display: none;
            }

            #__BVID__92e1_filter {
                display: none;
            }
            #__BVID__92e2_filter {
                display: none;
            }
            #__BVID__92e3_filter {
                display: none;
            }
            #__BVID__92e4_filter {
                display: none;
            }
            #__BVID__92e5_filter {
                display: none;
            }
            #__BVID__92e6_filter {
                display: none;
            }




            #__BVID__92_length {
                display: none;
            }

            #__BVID__92e0_length {
                display: none;
            }
            #__BVID__92e1_length {
                display: none;
            }
            #__BVID__92e2_length {
                display: none;
            }
            #__BVID__92e3_length {
                display: none;
            }
            #__BVID__92e4_length {
                display: none;
            }
            #__BVID__92e5_length {
                display: none;
            }
            #__BVID__92e6_length {
                display: none;
            }

            #hi {
                display: none !important;
            }

            @media screen and (min-width: 769px) {

                #__BVID__92_paginate {
                    margin-right: 400px;
                }

                #__BVID__92e0_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e1_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e2_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e3_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e4_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e5_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e6_paginate {
                    margin-right: 400px;
                }





            }

            @media (max-width: 767.98px) {
                #ExportReporttopdf {
                    margin: 12px;
                }

                #ExportReporttoExcel {
                    margin: 12px;
                }

                #BV_popover_1 {
                    transform: translate3d(0px, -74px, 0px) !important
                }
            }

            .b-table.table.b-table-stacked-md {
                width: 100% !important;
            }

            .dt-buttons {
                display: none;
            }

            tr {
                text-align: center !important;
                background-color: #FFFFFF !important;
            }

            th {
                text-align: center !important;
                background-color: #FFFFFF !important;
            }

            td {
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

            .btbt {
                width: 50px !important;
                height: 50px !important;
                line-height: 43px !important;
                border-radius: 30px !important;
                margin-right: 8px !important;
                background: #28B5BF !important;
                color: #fff !important;
                font-size: 25px !important;
            }

            .bb {
                width: 50px !important;
                height: 50px !important;
                border-radius: 30px !important;
                margin-right: 8px !important;
            }

            .ifarmeimcg {
                width: 50px !important;
                height: 50px !important;

            }

            .tableau-bord-reportrange {
                background: #fff;
                cursor: pointer;
                padding: 5px 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 0.65rem;
            }



        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include('header.php'); ?>
            </div>

            <main class="main">
                <div class="container-xxl">
                    <div class="row">
                        <div class="col-12">


                            <div class="menu-tabs mt-4">
                                <a class="tab active">Factures</a>
                                <a class="tab" href="espace.php">Proforma</a>
                                <a class="tab" href="avoir.php">Avoir</a>
                                <a class="tab" href="devis.php" >Devis</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div data-v-9af19398="" id="content-wrapper" class="container-xxl">
                    <div data-v-9af19398="" class="row row_header mb-4">
                        <div data-v-9af19398="" class="col-xl-3 col-md-6 "><h1 data-v-9af19398="" class="title header-form">
                                Liste des Factures</h1>
                        </div>
                        <div data-v-9af19398="" class="col-xl-6 col-md-6 d-flex justify-content-center">
                            <input data-v-9af19398="" type="text"  placeholder="Rechercher une facture"  class="inline search form-control form-control" id="__BVID__34">
                            <button data-v-9af19398="" class="search-icon">
                                <i data-v-9af19398=""  class="icon ion-ios-search"></i>
                            </button>

                        </div>
                    </div>
                    <div data-v-9af19398="" class="row row-search-option mb-4">

                        <div data-v-9af19398="" class="col-md-12 d-flex justify-content-end">
                            <div data-v-6a7eb354="" class="col-md-4 d-flex justify-content-end">
                             <!--   <div data-v-5232cd18="" data-v-9af19398="" class="actions sub-menu quote">
                                <div id="reportrange" class="tableau-bord-reportrange" onclick="f6()">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                </div> </div> -->
                                <div class="input-group input-daterange">

                                <input type="text" id="min-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">

                                <div class="input-group-addon">to</div>

                                <input type="text" id="max-date" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="To:">

                                
                                </div>
                            </div> 
                            <div data-v-6a7eb354="" class="col-md-8 d-flex justify-content-end">
                                <div data-v-5232cd18="" data-v-9af19398="" class="actions sub-menu quote">
                                    <div data-v-5232cd18="" class="dropdown-item" >
                                        <a data-v-5232cd18="" href="addfacture.php" class="w_actions_button has-tooltip" data-original-title="null">
                                            <i data-v-5232cd18="" style="color:#ffffff;" class="icon ion-ios-add"></i>
                                            <span data-v-5232cd18="" style="color:#ffffff;">Créer une facture</span></a>
                                    </div>


                                    <div data-v-e0aacb1e="" data-v-5232cd18="" class="fab-main-container fl-act-btn" start-opened="true">
                                        <a  href="addfacture.php">
                                            <button  type="button"  id="dropdownMenuButton2" style="border-bottom-width: 0px;border-right-width: 0px;border-top-width: 0px;border-left-width: 0px;padding-left: 0px;padding-bottom: 0px;padding-right: 0px; padding-top: 0px;">
                                                <div data-v-77282e1a="" data-v-e0aacb1e="" class="fab-cantainer fab fab-size-big" data-outside="true" style="transition-timing-function: cubic-bezier(0.24, 0.97, 0.81, 1.2); z-index: 5; background: rgb(22, 194, 194); box-shadow: rgb(102, 102, 102) 0px 2px 8px;">
                                                    <div data-v-77282e1a="" class="fabMask">

                                                    </div> <!---->
                                                    <i data-v-e0aacb1e="" data-v-77282e1a="" data-outside="true" class="icons iconfont vue-fab-material-icons vue-fab-iconfont-icons ion-ios-add" style="font-size: 15px;"></i>
                                                </div>
                                            </button>
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-v-9af19398="" class="row middle mb-4">
                        <div data-v-9af19398="" class="col-12">
                            <div data-v-9af19398="" class="buttons-list">
                                <div class="btn btn-default all" onclick="ft()"><i class="icon ion-md-checkmark shown"></i>
                                    Tous
                                </div>
                                <div class="btn btn-default waiting" onclick="f0()"><i class="icon ion-md-checkmark shown" ></i>
                                    En attente
                                </div>
                                <div class="btn btn-default accepted" onclick="f1()"><i class="icon ion-md-checkmark shown"></i>
                                    Accepté
                                </div>

                                <div class="btn btn-default canceled" onclick="f2()" ><i class="icon ion-md-checkmark shown"></i>
                                    Impayée
                                </div>

                                <div class="btn btn-default draft" onclick="f3()" ><i class="icon ion-md-checkmark shown"></i>
                                    Retard
                                </div>

                                <div class="btn btn-default canceled" style="border: 2px solid #9CDF49 !important; color:#9CDF49 !important;background:#E3F7C0 !important;" onclick="f4()"><i class="icon ion-md-checkmark shown"></i>
                                    Payée
                                </div>
                                <div class="btn btn-default canceled" style="border: 2px solid #F29C9E !important; color:#F29C9E !important;background:#961316 !important;" onclick="f5()"><i class="icon ion-md-checkmark shown"></i>
                                    Annuler
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-v-9af19398="" class="row">
                        <div data-v-9af19398="" class="col-12" >
                            <div data-v-9af19398="" class="card table-wrap mb-3" >
                                <div id="et">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92">
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:140px !important;">Type</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Total TTC</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Statut</th>
                                        </thead>

                                    </table>
                                </div>



                                <div style="display: none;" id="e0">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92e0" >
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:140px !important;">Type</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Montant HT</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Statut</th>
                                        </thead>

                                    </table>
                                </div>



                                <div style="display: none;" id="e1">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92e1">
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:140px !important;">Type</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Montant HT</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Statut</th>
                                        </thead>

                                    </table>
                                </div>




                                <div style="display: none;" id="e2">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92e2">
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:140px !important;">Type</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Montant HT</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Statut</th>
                                        </thead>

                                    </table>
                                </div>



                                <div style="display: none;" id="e3">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92e3">
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:140px !important;">Type</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Montant HT</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Statut</th>
                                        </thead>

                                    </table>
                                </div>



                                <div  style="display: none;" id="e4">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92e4" style="width: 1113!important ;margin-left: 0px;margin-right: 0px;">
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:140px !important;">Type</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Montant HT</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Statut</th>
                                        </thead>

                                    </table>
                                </div>
                                <div  style="display: none;" id="e5">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92e5" style="width: 1113!important ;margin-left: 0px;margin-right: 0px;">
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:140px !important;">Type</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Montant HT</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Statut</th>
                                        </thead>

                                    </table>
                                </div>

                                <div  style="display: none;" id="e6">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92e6" style="width: 1113!important ;margin-left: 0px;margin-right: 0px;">
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:140px !important;">Type</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Montant HT</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Statut</th>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>

        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" async=""></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script>

            $(function() {

            var start = moment();
            var end = moment();
 /* $('#reportrange').click(function () {

                    loTable = $('#__BVID__92').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefTest.php?start=" + "11-10-2021" + "&end=" + '1-10-2021',
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            }) */
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
              
             

              //  $.ajax({
              //      type: "POST",
              //      url: "stats.php",
              //      dataType: "json",
               //     data: {
               //         start: start.format('DD-MM-YYYY'),
               //         end: end.format('DD-MM-YYYY')
               //     },
               //     success: function(response) {
                    
                        // Number formatter.
                       // var formatter = new Intl.NumberFormat('fr-FR', {
                       //     style: 'currency',
                       //     currency: 'EUR',
                        //});
                       // setLoading(false);
                       // $('#card-custom-value-1').text(formatter.format(response.turnover) + ' HT')
                       // $('#card-custom-value-2').text(formatter.format(response.sales) + ' HT')
                       // $('#card-custom-value-3').text(response.best_client && response.best_client.trim() ? response.best_client : '- - -')
                    
                       // let list = '';
                       // if (response.best_products) {
                       //     for (let index = 0; index < response.best_products.length; index++) {
                       //         const element = response.best_products[index];
                       //         list += `<li class="best_selling_product"><div class="product_count_tag">${element.count}</div><p class="mb-0">${element.item}<p></li>`;
                        //    }
                        //}

                       // if (list) {
                       //     list = '<ul style="padding-left: 1rem;">' + list + '</ul>';
                       //     $('#card-custom-value-4').html(list)
                        //} else {
                        //    $('#card-custom-value-4').html('- - -')
                        //}
                  //  },
                   // error: function(error) {
                       // setLoading(false);
                       // $('#card-custom-value-1').text('- - -')
                       // $('#card-custom-value-2').text('- - -')
                       // $('#card-custom-value-3').text('- - -')
                       // $('#card-custom-value-4').text('- - -')
                 //   }
              //  });
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

                                    function etat(etat, id) {
                                        $.ajax({
                                            type: "POST",
                                            url: "edit_status.php?etat=" + etat + "&id=" + id,

                                            success: function (o) {
                                                $('#__BVID__92').DataTable().ajax.reload();
                                                $('#__BVID__92e0').DataTable().ajax.reload();
                                                $('#__BVID__92e1').DataTable().ajax.reload();
                                                $('#__BVID__92e2').DataTable().ajax.reload();
                                                $('#__BVID__92e3').DataTable().ajax.reload();
                                                $('#__BVID__92e4').DataTable().ajax.reload();
                                                $('#__BVID__92e5').DataTable().ajax.reload();
                                                $('#__BVID__92e6').DataTable().ajax.reload();
                                            }
                                        })
                                    }
                                    function ft() {

                                        document.getElementById("et").style.display = "block";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";
                                        document.getElementById("e6").style.display = "none";
                                    }
                                    function f0() {
                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "block";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";
                                        document.getElementById("e6").style.display = "none";
                                    }

                                    function f1() {
                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "block";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";
                                        document.getElementById("e6").style.display = "none";
                                    }

                                    function f2() {
                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "block";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";
                                        document.getElementById("e6").style.display = "none";
                                    }


                                    function f3() {

                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "block";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";
                                        document.getElementById("e6").style.display = "none";
                                    }

                                    function f4() {

                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "block";
                                        document.getElementById("e5").style.display = "none";
                                        document.getElementById("e6").style.display = "none";
                                    }
                                    function f5() {

                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "block";
                                        document.getElementById("e6").style.display = "none";
                                    }
                                    function f6() {

                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";
                                        document.getElementById("e6").style.display = "block";
                                        }

        </script>


        <script>
            $(document).ready(function () {

                loTable = $('#__BVID__92').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findef.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
                $('#reportrange').click(function () {

                   loTable.search($(this).val()).draw();
                })
            });

            $(document).ready(function () {

                oTable = $('#__BVID__92e0').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe0.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });


            });

            $(document).ready(function () {

                oTable = $('#__BVID__92e1').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe1.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            });


            $(document).ready(function () {

                oTable = $('#__BVID__92e2').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe2.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            });



            $(document).ready(function () {

                oTable = $('#__BVID__92e3').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe3.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            });


            $(document).ready(function () {
                oTable = $('#__BVID__92e4').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe4.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            });

            $(document).ready(function () {

                oTable = $('#__BVID__92e5').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe5.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });


            });

          /* Custom filtering function which will search data in column four between two values */
          $.fn.dataTable.ext.search.push(
                        function( settings, data, dataIndex ) {
                            var min = parseInt( $('#min-date').val(), 10 );
                            var max = parseInt( $('#max-date').val(), 10 );
                            var age = parseFloat( data[3] ) || 0; // use data for the age column
                    
                            if ( ( isNaN( min ) && isNaN( max ) ) ||
                                ( isNaN( min ) && age <= max ) ||
                                ( min <= age   && isNaN( max ) ) ||
                                ( min <= age   && age <= max ) )
                            {
                                return true;
                            }
                            return false;
                        }
                    );

            $(document).ready(function () {

                oTable = $('#__BVID__92e6').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefTest.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
                 // Event listener to the two range filtering inputs to redraw on input
                $('#min-date, #max-date').keyup( function() {
                    f6();
                    oTable.search($(this).val()).draw();
                        } );
 
               /* $('#__BVID__34').keyup(function () {

                    loTable.search($(this).val()).draw();
                    }) */

                    // Extend dataTables search
                /*    $.fn.dataTable.ext.search.push(
                        function( settings, data, dataIndex ) {
                            f6();
                            var min  = $('#min-date').val();
                            var max  = $('#max-date').val();
                            var createdAt = data[2] || 0; // Our date column in the table

                            if  ( 
                                    ( min == "" || max == "" )
                                    || 
                                    ( moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max) ) 
                                )
                            {
                                return true;
                            }
                            return false;
                        }
                    );

                    // Re-draw the table when the a date range filter changes
                    $('.date-range-filter').change( function() {
                        oTable.draw();
                    } );  */

            });

            function fff() {
                var x = document.getElementById("BV_popover_1");
                if (x.style.display === 'none') {
                    $('#BV_popover_1').addClass('show');
                    document.getElementById("BV_popover_1").style.display = "unset";
                } else {
                    document.getElementById("BV_popover_1").style.display = "none";
                }
            }


            function fun() {
                document.getElementById("addet").style.display = "block";
                document.getElementById("listet").style.display = "none";
                document.getElementById("listetaj").style.display = "none";


            }

            function fun2() {
                document.getElementById("listet").style.display = "block";
                document.getElementById("addet").style.display = "none";
                document.getElementById("listetaj").style.display = "none";
            }


            function ff() {
                var x = document.getElementById("BV_popover_1");
                if (x.style.display === 'unset') {
                    document.getElementById("BV_popover_1").style.display = "none";
                }

            }

            function fg() {
                document.getElementById("BV_popover_1").style.display = "none";
            }

            function color1(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color2(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color3(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color4(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color5(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color6(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color7(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color8(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color9(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color10(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

        </script>

        <script>
            function adde() {
                var x = document.getElementById("rb1").value;
                var y = document.getElementById("rb2").value;
                var z = document.getElementById("rb3").value;
                var etnom = document.getElementById("etnom").value;
                $.ajax({
                    type: "POST",
                    url: "addet.php",
                    data: {
                        x: x,
                        y: y,
                        z: z,
                        etnom: etnom,
                    },

                    success: function (o) {
                        document.getElementById("listet").style.display = "none";
                        document.getElementById("addet").style.display = "none";
                        document.getElementById("listetaj").style.display = "block";
                        document.getElementById("listetaj").innerHTML = o;

                    }
                });
            }

            function diet(id) {

                $.ajax({
                    type: "POST",
                    url: "aff.php",
                    data: {
                        id: id,
                    },

                    success: function (o) {
                        document.getElementById("etq").innerHTML += o;
                        document.getElementById("tdd_" + id).style.display = "none";
                        document.getElementById("BV_popover_1").style.display = "none";

                    }
                });

            }

            function org(id) {
                document.getElementById("divv_" + id).remove();
                document.getElementById("tdd_" + id).style.display = "block";
            }


        </script>


        <!-- Latest compiled JavaScript -->

        <!-- These are the necessary files for the image uploader -->
        <script src="dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>
        <script>
            /*jslint unparam: true */
            /*global window, $ */

            var max_uploads = 100

            $(function () {
                'use strict';

                // Change this to the location of your server-side upload handler:
                var url = 'imguplode.php';
                $('#fileupload').fileupload({
                    url: url,
                    dataType: 'html',
                    done: function (e, data) {

                        if (data['result'] == 'FAILED') {
                            alert('Invalid File');
                        } else {
                            $('#uploaded_file_name').val(data['result']);
                            $('#uploaded_images').html('<div class="uploaded_image"> <input type="text" value="' + data['result'] + '" name="img1" id="uploaded_image_name" hidden> <img src="images/' + data['result'] + '" style="width: 200px;height: 200px;padding-left: 0px;padding-right: 0px;left: 0px;text-align: center;"/> <a href="#" style="margin-top:40px;margin-right: 40px;left: 0px;right: 0px;margin-left: 54px;" class="img_rmv btn btn-danger"><i class="fa fa-times-circle" id=supp" style="font-size:48px;color:red"></i></a> </div>');
                            $('#uploaded_images2').hide();
                            if ($('.uploaded_image').length >= max_uploads) {
                                $('#select_file').hide();
                            } else {
                                $('#select_file').show();
                            }
                        }


                        $.each(data.result.files, function (index, file) {
                            $('<p/>').text(file.name).appendTo('#files');
                        });

                    },

                }).prop('disabled', !$.support.fileInput)
                        .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });

            $("#uploaded_images").on("click", ".img_rmv", function () {
                $(this).parent().remove();
                $('#uploaded_image').hide();

                $('#uploaded_images2').show();

                if ($('.uploaded_image').length >= max_uploads) {
                    $('#select_file').hide();
                } else {
                    $('#select_file').show();
                }
            }
            );


        </script>

    </body>
</html>