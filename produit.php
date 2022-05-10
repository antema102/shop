<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$produit_sql = mysqli_query($link, "SELECT * FROM `produit` ");
$m = 3;
?>

<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Liste des produits</title>
        <meta name="description" >
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <link href="data.css" rel="stylesheet">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>

            a{
                text-decoration: none !important;
                color: #666f81 !important;
            }
            #__BVID__530_info{
                display: none ;
            }
            #produit_previous{
                display: none ;
            }
            #produit_next{
                display: none ;
            }
            #__BVID__530_filter{
                display: none ;
            }
            #__BVID__530_length{
                display: none ;
            }
            @media screen and (min-width:769px) {

                #__BVID__530_paginate{
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
            }
            .b-table.table.b-table-stacked-md {
                display: block !important;
                width: 100% !important;
            }
            .dt-buttons{
                display: none ; 
            }
            @media (min-width: 576px){
                .modal-dialog {
                    max-width: 500px;
                    margin: 1.75rem auto;
                    margin-top: 12rem !important;

                }

            }
            tr{
                text-align: center !important;
            }
            th{
                text-align: center !important;
            }

            td{
                text-align: center !important;
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
                                <a class="tab active">Produits</a>
                                <a class="tab" href="categorie.php">Catégories</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-v-6a7eb354="" id="content-wrapper" class="container-xxl">
                    <div data-v-6a7eb354="" class="row row_header mb-4">
                        <div data-v-6a7eb354="" class="col-xl-3 col-md-6">
                            <h1 data-v-6a7eb354="" class="title header-form">Liste des produits</h1>
                        </div>
                        <div data-v-6a7eb354="" class="col-xl-6 col-md-6 d-flex justify-content-center">
                            <form data-v-6a7eb354="" class="search-zone form-inline">
                                <input data-v-6a7eb354="" type="text" name="rechercher" placeholder="Rechercher un produit" class="inline search form-control form-control" id="serchprd">
                                <span data-v-6a7eb354="" id="searchclear">
                                    <i data-v-6a7eb354="" class="icon ion-ios-close"></i>
                                </span>
                                <button data-v-6a7eb354="" class="search-icon" name="serch">
                                    <i data-v-6a7eb354="" class="icon ion-ios-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div data-v-6a7eb354="" class="row row-search-option mb-4">
                        <div data-v-6a7eb354="" class="col-md-4 d-flex">

                        </div>
                        <div data-v-6a7eb354="" class="col-md-8 d-flex justify-content-end">
                            <div data-v-5232cd18="" data-v-6a7eb354="" class="actions sub-menu product">
                                <div data-v-5232cd18="" class="dropdown-item">
                                    <a data-v-5232cd18="" href="ajouter_prd.php" class="w_actions_button has-tooltip" data-original-title="null" style="height: 51px;width: 195px;color:#fff !important; border-radius: 8px;padding: 10px 25px;font-size: 1rem;line-height: 1.5;display: inline-block;font-weight: 400;text-align: center;text-decoration: none;">
                                        <i data-v-5232cd18="" class="icon ion-ios-add"></i>
                                        <span data-v-5232cd18="">Créer un produit</span></a> <!---->
                                </div><!----><!---->
                                <div data-v-e0aacb1e="" data-v-5232cd18="" class="fab-main-container fl-act-btn" start-opened="true">
                                    <button  type="button"  id="dropdownMenuButton2" style="border-bottom-width: 0px;border-right-width: 0px;border-top-width: 0px;border-left-width: 0px;padding-left: 0px;padding-bottom: 0px;padding-right: 0px; padding-top: 0px;" data-bs-toggle="dropdown" aria-expanded="false" class="" id="">
                                        <div data-v-77282e1a="" data-v-e0aacb1e="" class="fab-cantainer fab fab-size-big" data-outside="true" style="transition-timing-function: cubic-bezier(0.24, 0.97, 0.81, 1.2); z-index: 5; background: rgb(22, 194, 194); box-shadow: rgb(102, 102, 102) 0px 2px 8px;">
                                            <div data-v-77282e1a="" class="fabMask">

                                            </div> <!---->
                                            <i data-v-e0aacb1e="" data-v-77282e1a="" data-outside="true" class="icons iconfont vue-fab-material-icons vue-fab-iconfont-icons ion-ios-add" style="font-size: 15px;"></i>
                                        </div>
                                    </button>
                                    <div data-v-e0aacb1e=""class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="padding-top:0px" >
                                        <ul style="padding-left:16px">
                                            <li><a data-v-5232cd18="" role="menuitem" target="_self" href="ajouter_prd.php" class="dropdown-item" style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Créer un produit
                                                </a>
                                            </li>
                                            <li><a data-v-5232cd18="" role="menuitem" target="_self" href="addcat.php" class="dropdown-item" style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Ajouter une catégorie
                                                </a>
                                            </li>
                                            <li><a data-v-5232cd18="" role="menuitem" target="_self" href="fileuplode.php" class="dropdown-item" style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Importer des produits
                                                </a>
                                            </li>
                                            <li>
                                                <a data-v-5232cd18="" role="menuitem" target="_self" href="exporttout.php" class="dropdown-item "  style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>exporter Les produits en CSV
                                                </a>
                                            </li>
                                            <li>
                                                <a data-v-5232cd18="" role="menuitem" target="_self" href="exportorg.php" class="dropdown-item "  style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i> exporter Les produits <i class="fas fa-circle" style="color:#FF7900;margin-right:12px;"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-v-5232cd18="" role="menuitem" target="_self" href="importred.php" class="dropdown-item "  style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i> exporter Les produits <i class="fas fa-circle" style="color:red;margin-right:12px;"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-v-5232cd18="" role="menuitem" target="_self" data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item "  style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Supprimer le(s) produit(s) sélectionné(s)
                                                </a>
                                            </li>


                                        </ul>
                                    </div>

                                </div>

                                <div data-v-5232cd18="" class="more-items btn-group b-dropdown dropdown" id="__BVID__50"><!---->
                                    <button  type="button" style="border-radius: 8px;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-link btn-lg" id="">
                                        <i data-v-5232cd18="" class="icon ion-ios-more"></i>
                                    </button>
                                    <div role="menu" tabindex="-1" class="dropdown-menu " aria-labelledby="dropdownMenuButton1">

                                        <ul style="padding-left:16px">
                                         <!--  <li><a data-v-5232cd18="" role="menuitem" target="_self" href="addcat.php" class="dropdown-item" style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Ajouter une catégorie
                                                </a>
                                            </li>  -->
                                            <li>
                                                <a data-v-5232cd18="" role="menuitem" target="_self" href="print_product.php" class="dropdown-item "  style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">
                                                    </i>Générer les étiquettes
                                                </a>
                                            </li>
                                            <li><a data-v-5232cd18="" role="menuitem" target="_self" href="fileuplode.php" class="dropdown-item" style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">

                                                    </i>Importer des produits
                                                </a>
                                            </li>
                                            <li>
                                                <a data-v-5232cd18="" role="menuitem" target="_self" href="exporttout.php" class="dropdown-item "  style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">
                                                    </i>Exporter Les produits
                                                </a>
                                            </li>
                                            <li>
                                                <a data-v-5232cd18="" role="menuitem" target="_self" href="exportorg.php" class="dropdown-item "  style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">
                                                    </i>Exporter Les produits <i class="fas fa-circle" style="color:#FF7900;margin-right:12px;"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-v-5232cd18="" role="menuitem" target="_self" href="importred.php" class="dropdown-item "  style="padding-right: 24px;">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">
                                                    </i> Exporter Les produits <i class="fas fa-circle" style="color:red;margin-right:12px;"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-v-5232cd18="" role="menuitem" target="_self" data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item "  style="padding-right: 24px;cursor:pointer">
                                                    <i data-v-5232cd18="" class="icon ion-ios-add">
                                                    </i>Supprimer le(s) produit(s) sélectionné(s)
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-v-6a7eb354="" class="row  middle mb-4">
                            <div data-v-6a7eb354="" class="col-12">
                                <div data-v-9af19398="" class="buttons-list">
                                    <div class="btn btn-default all" onclick="f0(1)"><i class="icon ion-md-checkmark shown"></i>
                                        Tous
                                    </div>
                                    <div class="btn btn-default waiting" onclick="f1(2)"><i class="icon ion-md-checkmark shown"></i>
                                        Produits Bleus
                                    </div>
                                    <div class="btn btn-default canceled" style="border: 2px solid #008000 !important; color:#008000 !important;background:#87E990 !important;" onclick="f2(3)"><i class="icon ion-md-checkmark shown"></i>
                                        Produits Verts </div>
                                    <div class="btn btn-default draft" onclick="f3(4)"><i class="icon ion-md-checkmark shown"></i>
                                        Produits Oranges
                                    </div>
                                    <div class="btn btn-default canceled" onclick="f4(5)"><i class="icon ion-md-checkmark shown"></i>
                                        Produits Rouges
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div  class="col-12">
                                <div data-v-6a7eb354="" class="card table-wrap mb-3"  >
                                    <div id="et">
                                        <table data-v-6a7eb354="" role="table" aria-busy="false" aria-colcount="7" class="table b-table fixed-table  responsive-table mb-0 mt-0 table-hover b-table-stacked-md" id="__BVID__530">
                                            <thead class="">
                                                <tr>
                                                    <th style="width:115px!important;">
                                                        <!--<div class="form-check form-switch">
                                                            <input class="form-check-input" id="exampleModal1"  name="exampleModal" type="checkbox">
                                                            <label class="form-check-label" for="exampleModal1"></label>
                                                        </div>--> </th>
                                                    <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:116px!important;">Référence</th>
                                                    <th scope="col" aria-colindex="3" aria-label="Image" class=""style="width:90px!important;" ></th>
                                                    <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:321px!important;">Nom</th>
                                                    <th scope="col" aria-colindex="5" class="" style="width:100px!important;">Catégorie</th>
                                                    <th tabindex="0" scope="col" aria-colindex="6" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:136px!important;">Prix HT</th>
                                                    <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:170px!important;">Prix TTC</th>
                                                    <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="" >Etat</th>
                                                    <th style="width:1px!important;" >
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Supprimer le(s) produit(s)</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div data-v-05970cda="" class="all-width">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4" style="text-align:center;">
                                        </div>

                                        <div class="col-md-4 col-sm-4" style="text-align:center;">
                                           <button type="button" class="" id="supp"  style="text-align:center;color: #fff;background: #AD0B00;border: 1px solid #AD0B00;padding: 12px;border-radius: 4px; "><i class="fas fa-trash-alt"></i></i> Supprimer</button>
                                        </div>
                                        <div class="col-md-4 col-sm-4" style="text-align:center;">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </main>



    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" async=""></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" async=""></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" async=""></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>
    <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <script>
        $('#supp').on('click', function name(params) {
            //get checked products
            var idsProducts = []; 
            $.each($('input[name=checkProducts]:checked'), function (i, e) {
                $.ajax({
                    type: "POST",
                    url: "deleteproduit.php?id=" + $(e).attr('data-id'),
                    success: function (o) {
                        window.location=("produit.php")
                    }
                })
            });
 
        });

                                        function ft() {

                                            document.getElementById("et").style.display = "block";
                                            document.getElementById("e0").style.display = "none";
                                            document.getElementById("e1").style.display = "none";
                                            document.getElementById("e2").style.display = "none";
                                            document.getElementById("e3").style.display = "none";

                                        }
                                        //show all products
                                        function f0() {
                                            if(oTable != null)oTable.destroy();
                                            oTable = showTable();
                                        }
                                       //show bleu products
                                        function f1() {
                                            if(oTable != null)oTable.destroy();
                                            oTable = showTable('bleu');
                                        }
                                        //show green products
                                        function f2() {
                                            if(oTable != null)oTable.destroy();
                                            oTable = showTable('green');
                                        }
                                        //show orange products
                                        function f3() {
                                            if(oTable != null)oTable.destroy();
                                            oTable = showTable('orange');
                                        }
                                    
                                        function f4() {
                                            if(oTable != null)oTable.destroy();
                                            oTable = showTable('red');
                                         }
                                        function tele(id) {

                                            var ch = document.getElementById("ch_" + id);
                                            if (ch.checked == true) {
                                                var prdid = document.getElementById("prdid_" + id).value;
                                                window.open('exportcsv.php?id=' + id);
                                            } else {


                                            }
                                            ch.checked == false;
                                        }
                                        function go() {
                                            var prdid = document.getElementById("prdid").value;
                                            window.location = ('detailprd.php?id=' + prdid);
                                        }
                                        function etat(etat, id) {
                                            $.ajax({
                                                type: "POST",
                                                url: "produitedit.php" + etat + "&id=" + id,

                                                success: function (o) {
                                                    $('#__BVID__530').DataTable().ajax.reload();
                                                    $('#__BVID__530e0').DataTable().ajax.reload();
                                                    $('#__BVID__530e1').DataTable().ajax.reload();
                                                    $('#__BVID__530e2').DataTable().ajax.reload();
                                                    $('#__BVID__530e3').DataTable().ajax.reload();

                                                }
                                            })
                                        }
                                        $(document).ready(function () {
                                            //call the function showTable to show all product
                                            oTable = showTable();
                                            $("#ExportReporttoExcel").on("click", function () {
                                                oTable.button('.buttons-csv').trigger();
                                            });
                                            $("#ExportReporttopdf").on("click", function () {
                                                oTable.button('.buttons-pdf').trigger();
                                            });
                                            $('#serchprd').keyup(function () {

                                                oTable.search($(this).val()).draw();
                                            })
                                        });
                                        //this function display products on datatable according to the given status
                                        function showTable(ajaxParam) {
                                            var ajaxLink = "<?php echo url ?>finde.php";
                                            if(ajaxParam) {
                                                ajaxLink = ajaxLink+'?status='+ajaxParam
                                            }
                                            oTable = $('#__BVID__530').DataTable({
                                                "pageLength": 50,
                                                "processing": false,
                                                "serverSide": true,
                                                "ajax": ajaxLink,
                                                "dom": 'Bfrtip',
                                                "order": [[1, "asc"]], //or asc,
                                                buttons: [
                                                    {
                                                        extend: 'csv',
                                                    },
                                                    {
                                                        extend: 'pdf',
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
                                            return oTable;
                                        }
    </script>


</body>
</html>