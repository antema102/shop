<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$produit_sql = mysqli_query($link, "SELECT * FROM `produit` ");
$m = 7;
?>

<html lang="fr">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Liste des Facture</title>
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
        <link rel="stylesheet" href="dist/css/styles.css">
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
                                <a class="tab" href="facture.php">Factures</a>
                                <a  class="tab" href="espace.php">Proforma</a>
                                <a class="tab active">Avoir</a>
                                <a class="tab" href="devis.php" >Devis</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-v-9af19398="" id="content-wrapper" class="container-xxl">
                    <div data-v-9af19398="" class="row row_header mb-4">
                        <div data-v-9af19398="" class="col-xl-3 col-md-6 "><h1 data-v-9af19398="" class="title header-form">
                                Liste des Avoirs</h1>
                        </div>
                        <div data-v-9af19398="" class="col-xl-6 col-md-6 d-flex justify-content-center">
                            <input data-v-9af19398="" type="text"  placeholder="Rechercher une Avoir"  class="inline search form-control form-control" id="__BVID__34">
                            <button data-v-9af19398="" class="search-icon">
                                <i data-v-9af19398=""  class="icon ion-ios-search"></i>
                            </button>

                        </div>
                    </div>
                    <div data-v-9af19398="" class="row row-search-option mb-4">
                        <div data-v-9af19398="" class="col-md-12 d-flex justify-content-end">
                            <div data-v-6a7eb354="" class="col-md-8 d-flex justify-content-end">
                                <div data-v-5232cd18="" data-v-9af19398="" class="actions sub-menu quote">
                                    <div data-v-5232cd18="" class="dropdown-item">
                                        <a data-v-5232cd18="" href="addavoir.php" class="w_actions_button has-tooltip" data-original-title="null">
                                            <i data-v-5232cd18="" style="color:#ffffff;" class="icon ion-ios-add"></i>
                                            <span data-v-5232cd18="" style="color:#ffffff;">Créer Avoir</span></a>
                                    </div>
                                    <div data-v-e0aacb1e="" data-v-5232cd18="" class="fab-main-container fl-act-btn" start-opened="true">
                                        <a  href="addavoir.php">
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
					
					<div class="d-flex flex-row align-items-center col-10 mb-5">

                        <div class="col-md-0">
                            <div style="font-weight :600"> Du </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white" id="basic-addon1">
                                                <svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg><!-- <i class="fas fa-calendar-alt" aria-hidden="true"></i> --></span>
                                </div>
                                <input type="date" class="form-control" id="start_date" placeholder="Start Date" value="" style="
    color: #28B5BF;font-weight :600">
                            </div>
                        </div>
                        <div class="col-md-0">
                            <div style="font-weight :600"> Au </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white" id="basic-addon1"><svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg><!-- <i class="fas fa-calendar-alt" aria-hidden="true"></i> --></span>
                                </div>
                                <input type="date" class="form-control" id="end_date" placeholder="End Date" value="" style="
    color: #28B5BF;font-weight :600">
                            </div>
                        </div>
                        <div class="d-flex align-items-center col-2">
                            <button id="filter" class="btn btn-outline-info btn-sm" style="margin-right: 10px">Enregistrer</button>
                            <button id="reset" class="btn btn-outline-warning btn-sm ">Annuler</button>
                        </div>

                        <div data-v-6a7eb354="" class="col-md-6 d-flex justify-content-end">
                            <div data-v-5232cd18="" data-v-9af19398="" class="actions sub-menu quote">



                                <div data-v-e0aacb1e="" data-v-5232cd18="" class="fab-main-container fl-act-btn" start-opened="true">
                                    <a href="adddevis.php">
                                        <button type="button" id="dropdownMenuButton2" style="border-bottom-width: 0px;border-right-width: 0px;border-top-width: 0px;border-left-width: 0px;padding-left: 0px;padding-bottom: 0px;padding-right: 0px; padding-top: 0px;">
                                            <svg data-v-77282e1a="" data-v-e0aacb1e="" class="svg-inline--fa  fa-w-16 fab-cantainer fab-size-big" data-outside="true" style="transition-timing-function: cubic-bezier(0.24, 0.97, 0.81, 1.2); z-index: 5; background: rgb(22, 194, 194); box-shadow: rgb(102, 102, 102) 0px 2px 8px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="null" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><g><path fill="currentColor" d="M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z"></path><circle fill="currentColor" cx="256" cy="364" r="28"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="r" values="28;14;28;28;14;28;"></animate><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="1;0;1;1;0;1;"></animate></circle><path fill="currentColor" opacity="1" d="M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="1;0;0;0;0;1;"></animate></path><path fill="currentColor" opacity="0" d="M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="0;0;1;1;0;0;"></animate></path></g></svg><!-- <div data-v-77282e1a="" data-v-e0aacb1e="" class="fab-cantainer fab fab-size-big" data-outside="true" style="transition-timing-function: cubic-bezier(0.24, 0.97, 0.81, 1.2); z-index: 5; background: rgb(22, 194, 194); box-shadow: rgb(102, 102, 102) 0px 2px 8px;" aria-hidden="true">
                                            <div data-v-77282e1a="" class="fabMask">

                                            </div> <!---->
                                            <i data-v-e0aacb1e="" data-v-77282e1a="" data-outside="true" class="icons iconfont vue-fab-material-icons vue-fab-iconfont-icons ion-ios-add" style="font-size: 15px;"></i>
                                            --&gt;
                                        </button>
                                    </a>

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
                                    Non utilisé
                                </div>
                                <div class="btn btn-default canceled" style="border: 2px solid #9CDF49 !important; color:#9CDF49 !important;background:#E3F7C0 !important;" onclick="f1()" ><i class="icon ion-md-checkmark shown"></i>
                                    Utilisé
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
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Total TTC</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Etat</th>
                                        </thead>
                                    </table>
                                </div>
                                <div style="display: none;" id="e0">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92e0" >
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Total TTC</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Etat</th>
                                        </thead>
                                    </table>
                                </div>
                                <div style="display: none;" id="e1">
                                    <table data-v-9af19398="" role="table" aria-busy="false" aria-colcount="8" class="table b-table fixed-table responsive-table mb-0 table-hover b-table-stacked-md" id="__BVID__92e1">
                                        <thead class="">
                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Numéro</th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:235px !important;">Client</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:158px !important;">Date</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;">Total TTC</th>
                                        <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:100px !important;">Etat</th>
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
        <script>

            function etat(etat, id) {
                $.ajax({
                    type: "POST",
                    url: "edit_statut_voir.php?etat=" + etat + "&id=" + id,
                    success: function (o) {
                        $('#__BVID__92').DataTable().ajax.reload();
                        $('#__BVID__92e0').DataTable().ajax.reload();
                        $('#__BVID__92e1').DataTable().ajax.reload();
                    }
                })
            }

            $(document).ready(function () {

                oTable = $('#__BVID__92').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findeav.php",
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
                
                $('#__BVID__34').keyup(function () {

                    oTable.search($(this).val()).draw();
                })
            });

            $(document).ready(function () {

                oTable = $('#__BVID__92e0').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findeave0.php",
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
                    "ajax": "<?php echo url ?>findeave1.php",
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

            function ft() {
                document.getElementById("et").style.display = "block";
                document.getElementById("e0").style.display = "none";
                document.getElementById("e1").style.display = "none";
            }
            function f0() {
                document.getElementById("et").style.display = "none";
                document.getElementById("e0").style.display = "block";
                document.getElementById("e1").style.display = "none";
            }

            function f1() {
                document.getElementById("et").style.display = "none";
                document.getElementById("e0").style.display = "none";
                document.getElementById("e1").style.display = "block";
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