<?php
include 'db.php';
$m = 2;
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$produit_sql = mysqli_query($link, "SELECT * FROM `client` ");
$user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` where email ='" . $_SESSION['user'] . "' "));
?>

<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Liste des Clients</title>
        <meta name="description" >
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/underscore@1.13.1/underscore-umd-min.js"></script>
        <link href="data.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="<?php echo url ?>static/client.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="dist/css/styles.css">
        <style>

            a{
                text-decoration: none !important;
                color: #666f81 !important;
            }
            #BVID__277_info{
                display: none ;
            }
            #BVID__277e0_info{
                display: none ;
            }
            #BVID__277e1_info{
                display: none ;
            }
            #BVID__277e2_info{
                display: none ;
            }
            #BVID__277e3_info{
                display: none ;
            }
            #produit_previous{
                display: none ;
            }
            @media screen and (min-width: 769px) {

                #BVID__277_paginate {
                    margin-right: 400px;
                }

                #BVID__277e0_paginate {
                    margin-right: 400px;
                }
                #BVID__277e1_paginate {
                    margin-right: 400px;
                }
                #BVID__277e2_paginate {
                    margin-right: 400px;
                }
                #BVID__277e3_paginate {
                    margin-right: 400px;
                }
                #BVID__277_filter {
                    display: none;
                }
                #BVID__277e0_filter {
                    display: none;
                }

                #BVID__277e1_filter {
                    display: none;
                }
                #BVID__277e2_filter {
                    display: none;
                }
                #BVID__277e3_filter {
                    display: none;
                }
            
            #produit_next{
                display: none ;
            }
                #produit_previous {
                    display: none;
                }

                #__BVID__277e0_length {
                    display: none;
                }
                #__BVID__277e1_length {
                    display: none;
                }
                #__BVID__277e2_length {
                    display: none;
                }
                #__BVID__277e3_length {
                    display: none;
                }
            #BVID__277_length{
                display: none ;
            }
            #hi{
                display: none !important;
            }

        }
                @media screen and (min-width: 769px) {

                    #BVID__277_paginate {
                        margin-right: 400px;
                    }

                    #BVID__277e0_paginate {
                        margin-right: 400px;
                    }
                    #BVID__277e1_paginate {
                        margin-right: 496px;
                    }
                    #BVID__277e2_paginate {
                        margin-right: 496px;
                    }
                    #BVID__277e3_paginate {
                        margin-right: 496px;
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
                .phones[data-v-143dd668] {
                    display: flex !important;
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
            .btn-default.draft, .btn-default.draft:hover {
                background: #5dade2!important;
                border: 2px solid #5dade2!important;
                color: #4b0082!important;
            }
            .btn-default.canceled, .btn-default.canceled:hover {
                background: #fbf2b7!important;
                border: 2px solid #fbf2b7!important;
                color: #f0c300!important;
            }
            .btn-default.accepted, .btn-default.accepted:hover {
                background: #28B5BF!important;
                border: 2px solid #28B5BF!important;
                color: #000000!important;
            }
            .btn-default.waiting, .btn-default.waiting:hover {
                background: #5dade2!important;
                border: 2px solid #5dade2!important;
                color: #000000!important;
            }
            .btn-default.all, .btn-default.all:hover {
                border: 2px solid #dfe3ff!important;
                background: #dfe3ff!important;
                color: #000000!important;
            }


            .dropdown-item:hover {
                color: #16181b;
                text-decoration: none;
                background-color: #f8f9fa;
            }
            .b-table.table.b-table-stacked-md {
                 display: inline-table !important;

            }
        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> 
            <main class="main">
                <div data-v-6a7eb354="" id="content-wrapper" class="container-xxl">
                    <div data-v-6a7eb354="" class="row row_header mb-4">
                        <div data-v-6a7eb354="" class="col-xl-3 col-md-6">
                            <h1 data-v-6a7eb354="" class="title header-form">Liste des contacts</h1>
                        </div> 
                        <div data-v-6a7eb354="" class="col-xl-6 col-md-6 d-flex justify-content-center">
                            <form data-v-6a7eb354="" class="search-zone form-inline">
                                <input data-v-6a7eb354="" type="text" name="rechercher" placeholder="Rechercher un client" class="inline search form-control form-control" id="__BVID__34" class="global_filter">
                                <span data-v-6a7eb354="" id="searchclear">
                                    <i data-v-6a7eb354="" class="icon ion-ios-close"></i>
                                </span>
                            </form>
                        </div>
                    </div> 
                    <div data-v-6a7eb354="" class="row row-search-option mb-4">
                        <div data-v-6a7eb354="" class="col-md-8 d-flex">
                            <div data-v-9af19398="" class="row middle mb-4">
                                <div data-v-9af19398="" class="col-12">
                                    <div data-v-9af19398="" class="buttons-list">
                                        <div class="btn btn-default all" style="border: 2px solid #2596be !important; color:#2596be !important;" onclick="ft()"><i class="icon ion-md-checkmark shown"></i>
                                            Tous
                                        </div>
                                        <div class="btn btn-default waiting" style="border: 2px solid #abe5eb !important; color:#ffffff !important;background:#195e83 !important;" onclick="f0()"><i class="icon ion-md-checkmark shown" ></i>
                                            Clients
                                        </div>
                                        <div class="btn btn-default accepted" style="border: 2px solid #abe5eb !important; color:#ffffff !important;background:#28b5bf !important;" onclick="f1()"><i class="icon ion-md-checkmark shown"></i>
                                            Client Particulier
                                        </div>

                                        <div class="btn btn-default canceled" style="border: 2px solid #fbf2b7 !important; color:#ffffff !important;background:#f3d143 !important;"onclick="f2()" ><i class="icon ion-md-checkmark shown"></i>
                                            Client Professionnel
                                        </div>
                                        <?php if ($user['role'] == 1) { ?>
                                            <div class="btn btn-default draft" style="border: 2px solid #2E86C1 !important; color:#2E86C1 !important;background:#D4E6F1 !important;" onclick="f3()" ><i class="icon ion-md-checkmark shown"></i>
                                              Fournisseurs
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-v-6a7eb354="" class="col-md-4 d-flex justify-content-end">
                            <div data-v-5232cd18="" data-v-6a7eb354="" class="actions sub-menu product">

                                <div data-v-5232cd18="" class="dropdown-item">
                                    <a data-v-5232cd18="" class="w_actions_button has-tooltip" data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 51px;width: 195px;color:#fff !important; border-radius: 8px;padding-top: 15px; padding-bottom: 0px ;font-size: 1rem;line-height: 1.5;display: inline-block;font-weight: 400;text-align: center;text-decoration: none;cursor: pointer;">
                                        <i data-v-5232cd18="" class="icon ion-ios-add"></i>
                                        <span data-v-5232cd18="">Créer un Contact</span></a>
                                </div>

                                <div data-v-e0aacb1e="" data-v-5232cd18="" class="fab-main-container fl-act-btn" start-opened="true">
                                    <button  type="button"  id="dropdownMenuButton2" style="border-bottom-width: 0px;border-right-width: 0px;border-top-width: 0px;border-left-width: 0px;padding-left: 0px;padding-bottom: 0px;padding-right: 0px; padding-top: 0px;" data-bs-toggle="dropdown" aria-expanded="false" class="" id="">
                                        <div data-v-77282e1a="" data-v-e0aacb1e="" class="fab-cantainer fab fab-size-big" data-outside="true" style="transition-timing-function: cubic-bezier(0.24, 0.97, 0.81, 1.2); z-index: 5; background: rgb(22, 194, 194); box-shadow: rgb(102, 102, 102) 0px 2px 8px;">
                                            <div data-v-77282e1a="" class="fabMask">

                                            </div> <!----> 
                                            <i data-v-e0aacb1e="" data-v-77282e1a="" data-outside="true" class="icons iconfont vue-fab-material-icons vue-fab-iconfont-icons ion-ios-add" style="font-size: 15px;"></i>
                                        </div> 
                                    </button>
                                    <div data-v-e0aacb1e=""class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="padding-top: 16px; width: 182px;" >
                                        <ul style="padding-left:16px">
                                            <li><a data-v-5232cd18=""  data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                    <i data-v-5232cd18="" class="icon ion-ios-add"></i> Créer un client
                                                </a>  
                                            </li>

                                            <li><a data-v-5232cd18="" href="clientimport.php" class="">
                                                    <i data-v-5232cd18="" class="icon ion-ios-download"></i> Importer Clients
                                                </a> 
                                            </li>
                                            <li><a data-v-5232cd18="" href="uplodeadress.php" class="">
                                                    <i data-v-5232cd18="" class="icon ion-ios-download"></i> Importer Adresses
                                                </a> 
                                            </li>
                                            <?php if ($user['role'] == '1') { ?>
                                                <li><a data-v-5232cd18="" href="expoterclients.php" class="">
                                                        <i data-v-5232cd18="" class="icon ion-ios-download"></i> Exporter
                                                    </a>
                                                </li>

                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                                <div data-v-5232cd18="" class="more-items btn-group b-dropdown dropdown" id="__BVID__50"><!---->
                                    <button  type="button" style="border-radius: 8px;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-link btn-lg" id="">
                                        <i data-v-5232cd18="" class="icon ion-ios-more"></i>
                                    </button>
                                    <div role="menu" role="menu" tabindex="-1" class="dropdown-menu " style="width: 167px;" aria-labelledby="dropdownMenuButton1"> 
                                        <ul style="padding-left:16px">

                                            <li><a data-v-5232cd18="" href="clientimport.php" class="">
                                                    <i data-v-5232cd18="" class="icon ion-ios-download"></i> Importer Clients
                                                </a> 
                                            </li>

                                            <li><a data-v-5232cd18="" href="uplodeadress.php" class="">
                                                    <i data-v-5232cd18="" class="icon ion-ios-download"></i> Importer Adresses
                                                </a> 
                                            </li>
                                            <?php if ($user['role'] == '1') { ?>
                                                <li>
                                                    <a data-v-5232cd18="" href="expoterclients.php" class="">
                                                        <i data-v-5232cd18="" class="icon ion-ios-download"></i> Exporter Clients
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="row">
                            <div data-v-6a7eb354="" class="col-12">
                            <div data-v-6a7eb354="" class="card table-wrap mb-3"  style="margin-top:32px;">
                                <div id="et">
                                <table data-v-6a7eb354="" role="table" aria-busy="false" aria-colcount="7" class="table b-table fixed-table  responsive-table mb-0 mt-0 table-hover b-table-stacked-md" id="BVID__277">
                                    <thead class="">
                                        <tr  id="filter_col1" data-column="0" >
                                            <th > </th>
                                            <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;" id="col0_filter" >Clients</th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:800px !important;">Coordonnées</th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:100px !important;"></th>

                                        </tr>
                                    </thead>
                                </table>
                                </div>
                                <div id="e0" style="display: none;" id="filter_col1" data-column="0">
                                    <table data-v-6a7eb354="" role="table" aria-busy="false" aria-colcount="7" class="table b-table fixed-table  responsive-table mb-0 mt-0 table-hover b-table-stacked-md" id="BVID__277e0">
                                        <thead class=""><!---->
                                        <tr  id="filter_col1" data-column="0">
                                            <th style="width:74px !important;"> </th>
                                            <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;" id="col0_filter" >Clients</th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:800px !important;">Coordonnées</th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:100px !important;"></th>


                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div style="display: none;" id="e1">
                                    <table data-v-6a7eb354="" role="table" aria-busy="false" aria-colcount="7" class="table b-table fixed-table  responsive-table mb-0 mt-0 table-hover b-table-stacked-md" id="BVID__277e1" style="width: 100%!important; ">
                                        <thead class="">
                                        <tr id="filter_col1" data-column="0">
                                            <th style="width:74px !important;"> </th>
                                            <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;" id="col0_filter" >Clients</th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:800px !important;">Coordonnées</th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:100px !important;"></th>



                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div style="display: none;" id="e2" >
                                    <table data-v-6a7eb354="" role="table" aria-busy="false" aria-colcount="7" class="table b-table fixed-table  responsive-table mb-0 mt-0 table-hover b-table-stacked-md" id="BVID__277e2">
                                        <thead class="">
                                        <tr  id="filter_col1" data-column="0">
                                            <th style="width:74px !important;"> </th>
                                            <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:200px !important;" id="col0_filter" >Clients</th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:800px !important;">Coordonnées</th>

                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:100px !important;"></th>


                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div style="display: none;" id="e3" >
                                    <table data-v-6a7eb354="" role="table" aria-busy="false" aria-colcount="7" class="table b-table fixed-table  responsive-table mb-0 mt-0 table-hover b-table-stacked-md" id="BVID__277e3">
                                        <thead class="">
                                        <tr id="filter_col1" data-column="0">
                                            <th style="width:74px !important;"> </th>
                                            <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" id="col0_filter" style="width:200px !important;">Clients</th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:800px !important;">Coordonnées</th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:100px !important;"></th>


                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                <?php include ('modaladdclient.php'); ?>

            </main>
        </div>

        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" async=""></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>




        <script>
            function etat(etat, id) {
                $.ajax({
                    type: "POST",
                    url: "edit.php?etat=" + - + "&id=" + id,

                    success: function (o) {
                        $('#BVID__277').DataTable().ajax.reload();
                        $('#BVID__277e0').DataTable().ajax.reload();
                        $('#BVID__277e1').DataTable().ajax.reload();
                        $('#BVID__277e2').DataTable().ajax.reload();
                        $('#BVID__277e3').DataTable().ajax.reload();

                    }
                })
            }

            function ft() {

                document.getElementById("et").style.display = "block";
                document.getElementById("e0").style.display = "none";
                document.getElementById("e1").style.display = "none";
                document.getElementById("e2").style.display = "none";
                document.getElementById("e3").style.display = "none";
            }
            function f0() {
                document.getElementById("et").style.display = "none";
                document.getElementById("e0").style.display = "block";
                document.getElementById("e1").style.display = "none";
                document.getElementById("e2").style.display = "none";
                document.getElementById("e3").style.display = "none";
            }

            function f1() {
                document.getElementById("et").style.display = "none";
                document.getElementById("e0").style.display = "none";
                document.getElementById("e1").style.display = "block";
                document.getElementById("e2").style.display = "none";
                document.getElementById("e3").style.display = "none";
            }

            function f2() {
                document.getElementById("et").style.display = "none";
                document.getElementById("e0").style.display = "none";
                document.getElementById("e1").style.display = "none";
                document.getElementById("e2").style.display = "block";
                document.getElementById("e3").style.display = "none";
            }

            function f3() {
                document.getElementById("et").style.display = "none";
                document.getElementById("e0").style.display = "none";
                document.getElementById("e1").style.display = "none";
                document.getElementById("e2").style.display = "none";
                document.getElementById("e3").style.display = "block";

            }


            $(document).ready(function () {

                loTable = $('#BVID__277').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    language: {
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                    },
                    "ajax": "<?php echo url ?>findec.php",
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
                })

                //$('#BVID__277_wrapper').keyup(function () {
                //    loTable.search($(this).val()).draw();
                //})

                $('#__BVID__34').on('input', _.debounce(function() {
                    loTable.search( this.value ).draw();
                }, 400));

                // $('#__BVID__34').DataTable({"iDisplayLength": 100, "search": {regex: true}}).column(1).search("nom|prenom", true, false ).draw();
            });
            // $(document).ready(function() {
            //     $('#__BVID__34').DataTable({"iDisplayLength": 100, "search": {regex: true}}).column(1).search("nom|prenom|Solid|NIR", true, false ).draw();
            //
            // } );

            // function filterGlobal () {
            //     $('#__BVID__34').DataTable().search(
            //         $('#global_filter').val()
            //     ).draw();
            // }
            //
            // function filterColumn ( i ) {
            //     $('#__BVID__34').DataTable().column( i ).search(
            //         $('#col'+i+'_filter').val(),
            //         $('#col'+i+'_regex').prop('checked'),
            //         $('#col'+i+'_smart').prop('checked')
            //     ).draw();
            // }
            //
            // $(document).ready(function() {
            //     $('#__BVID__34').DataTable();
            //
            //     $('input.global_filter').on( 'keyup click', function () {
            //         filterGlobal();
            //     } );
            //
            //     $('input.column_filter').on( 'keyup click', function () {
            //         filterColumn( $(this).parents('tr').attr('data-column') );
            //     } );
            // } );
            $(document).ready(function () {

                oTable = $('#BVID__277e0').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findec0.php",
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

                oTable = $('#BVID__277e1').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findec1.php",
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

                oTable = $('#BVID__277e2').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findec2.php",
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

                oTable = $('#BVID__277e3').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findec3.php",
                    "dom": 'Bfrtip',
                    "order": [[2, "asc"]], //or asc,
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

            function fe1() {
                document.getElementById("ettt1").style.display = "contents";
                document.getElementById("etttt1").style.display = "none";
                document.getElementById("etttt2").style.display = "none";
                document.getElementById("etttt3").style.display = "none";
                document.getElementById("BV_popover_1").style.display = "none";
                document.getElementById("cr").value = 1;
            }
            function fe2() {
                document.getElementById("ettt2").style.display = "contents";
                document.getElementById("etttt1").style.display = "none";
                document.getElementById("etttt2").style.display = "none";
                document.getElementById("etttt3").style.display = "none";
                document.getElementById("BV_popover_1").style.display = "none";
                document.getElementById("cr").value = 2;
            }
            function fe3() {
                document.getElementById("ettt3").style.display = "contents";
                document.getElementById("etttt1").style.display = "none";
                document.getElementById("etttt2").style.display = "none";
                document.getElementById("etttt3").style.display = "none";
                document.getElementById("BV_popover_1").style.display = "none";
                document.getElementById("cr").value = 3;
            }
            function fee1() {
                document.getElementById("etttt1").style.display = "contents";
                document.getElementById("etttt2").style.display = "contents";
                document.getElementById("etttt3").style.display = "contents";
                document.getElementById("ettt1").style.display = "none";
            }
            function fee2() {
                document.getElementById("etttt1").style.display = "contents";
                document.getElementById("etttt2").style.display = "contents";
                document.getElementById("etttt3").style.display = "contents";
                document.getElementById("ettt2").style.display = "none";
            }
            function fee3() {
                document.getElementById("etttt1").style.display = "contents";
                document.getElementById("etttt2").style.display = "contents";
                document.getElementById("etttt3").style.display = "contents";
                document.getElementById("ettt3").style.display = "none";
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