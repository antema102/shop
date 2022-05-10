<?php
include('db.php');

$produit_sql = mysqli_query($link, "SELECT * FROM `produit` ");
?>
<html class="no-js " lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mymarket</title>
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link rel="icon" href="" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.css"/>
        <style>
            @media screen and (min-width:900px) {
                #sideM{
                    display: none;
                }


            }


            @media screen and (max-width: 901px) {
                #web{
                    display: none;
                }

                #add{
                    width: 100%!important;
                    font-size: 7px!important;
                    padding-left: 4px!important;
                    padding-right: 4px!important;
                    padding-top: 4px!important;
                    padding-bottom: 4px!important;
                }

            }

            select option {

                background: #616883 !important;

            }

        </style>
    </head>
    <body>
        <div class="container-fluid">

            <div class="row" style="padding-top: 8px;" >

                <div class="col-md-9 col-sm-12 col-12 col-lg-9 " style="padding-left: 24px;" >

                    <div class="row" style="margin-top:24px;" >
                        <div class="col-md-8 col-8 col-sm-8 col-lg-8">
                            <h4 style="margin-bottom:32px;"><u> Liste Des produit</u></h4>
                        </div>
                        <div class="col-md-4 col-4 col-sm-4 col-lg-4" style="text-align:right;">
                            <a href="addproduit.php"><button type="button" class="btn btn-outline-warning" id="add"><i class="fas fa-plus"></i> Ajouter Produit</button></a>
                        </div>
                        <table class="table" id="produit">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">Nom</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Marque</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Prix Soldé</th>
                                    <th scope="col">Prix Market</th>

                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                        </table>


                    </div>




                </div>




            </div>

            <script src = "https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity = "sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin = "anonymous"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
            <script src="<?php echo url ?>static/js/runtime.c1d165a852df9a0e8540.js"></script>
            <script src="<?php echo url ?>static/js/vendor.e5557c3672a5bb7582ed.js"></script>
            <script src="<?php echo url ?>static/js/app.62ca812e47f538fee0f3.js"></script>


            <script defer="defer" src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
            <script charset="utf-8" src="<?php echo url ?>static/js/47.033ed7d2c59cf39a92c0.js"></script>
            <script src="https://cdn.onesignal.com/sdks/OneSignalPageSDKES6.js?v=151505" async=""></script>
            <script charset="utf-8" src="<?php echo url ?>static/js/4.270b6a4056efb0e6cd10.js"></script>
            <script>

                $(document).ready(function () {
                    $('#produit').DataTable({
                        "scrollX": true
                    });
                });



            </script>


    </body>
</html>

