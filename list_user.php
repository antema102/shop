<?php
include 'db.php';
$m = 1;
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$produit_sql = mysqli_query($link, "SELECT * FROM `produit` ");
$user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` where email ='" . $_SESSION['user'] . "' "));
?>

<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Liste des Utilisateur</title>
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
            </div> 
            <main class="main">
                <div data-v-6a7eb354="" id="content-wrapper" class="container-xxl">
                    <div data-v-6a7eb354="" class="row row_header mb-4">
                        <div data-v-6a7eb354="" class="col-xl-3 col-md-6">
                            <h1 data-v-6a7eb354="" class="title header-form">Liste des contacts</h1>
                        </div> 
                        <div data-v-6a7eb354="" class="col-xl-6 col-md-6 d-flex justify-content-center">
                            <form data-v-6a7eb354="" class="search-zone form-inline">
                                <input data-v-6a7eb354="" type="text" name="rechercher" placeholder="Rechercher" class="inline search form-control form-control" id="serchprd"> 
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

                        <div data-v-6a7eb354="" class="row">
                            <div data-v-6a7eb354="" class="col-12"></div>

                        </div> 

                        <div data-v-6a7eb354="" class="card table-wrap mb-3"  style="margin-top:32px;">
                            <table data-v-6a7eb354="" role="table" aria-busy="false" aria-colcount="7" class="table b-table fixed-table  responsive-table mb-0 mt-0 table-hover b-table-stacked-md" id="BVID__277">
                                <thead class=""><!---->
                                    <tr style="" >

                                        <th style="width:114px !important;"> </th>

                                        <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:430px !important;"></th>
                                        <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class=""style="width:315px !important;">Email</th>
                                        <th tabindex="0" scope="col" aria-colindex="6" aria-label="Click to sort Descending" aria-sort="none" class="" style="width:273px !important;">ROLE</th>
                                        <th style="display: none"></th>


                                    </tr>
                                </thead>


                            </table>

                        </div>
                    </div> 
                </div>
                <?php include ('modaladdclient.php'); ?>

            </main>
        </div>
        <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>



        <script>


            $(document).ready(function () {

                oTable = $('#BVID__277').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findu.php",
                    "dom": 'Bfrtip',
                    "order": [[0, "asc"]], //or asc,
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            })

        </script>
    </body>
</html>