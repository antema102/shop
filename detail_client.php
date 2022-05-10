<?php
include 'db.php';

if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$id = $_GET['id'];
$client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` where id=" . $id . " "));
$m = 2;
?>

<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title><?php echo $client['nom'] ?></title>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="<?php echo url ?>static/client.css" rel="stylesheet">
        <link href="<?php echo url ?>data.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                width: 70px!important;
                height: 70px!important;

            }


        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> 
            <main class="main">
                <div data-v-143dd668=""  class="container-xxl clients rounded-style">
                    <div data-v-143dd668="" class="row row_header mb-4">
                        <div data-v-143dd668="" class="col-xl-3 col-md-6">
                            <h1 data-v-143dd668="" class="title header-form">Liste des contacts</h1>
                        </div> 
                    </div> 
                    <div data-v-143dd668="" class="row">
                        <div data-v-143dd668="" class="col-12">
                            <div data-v-143dd668="" class="card ">
                                <div data-v-143dd668="" class="sidenav "> 
                                    <a href="<?php echo url ?>client.php">
                                        <i data-v-143dd668="" class="icon ion-ios-arrow-round-back back-to-list"></i> 
                                    </a>
                                    <div data-v-143dd668="" class="client padding">
                                        <div data-v-143dd668="" class="header padding-l">
                                            <div data-v-143dd668="" class="client-header padding-l">

                                                <?php
                                                if ($client['img'] == '') {
                                                    if ($client['nom']==''){
                                                        $letter = strtoupper(substr($client['nom_soc'], 0, 1));
                                                    }else{
                                                        $letter = strtoupper(substr($client['nom'], 0, 1));
                                                    }

                                                    ?>
                                                    <div style="text-align: center;">
                                                        <div data-v-143dd668="" class="flex">
                                                            <span data-v-143dd668="" class="btbt">
                                                                <span data-v-143dd668="">
                                                                    <span data-v-143dd668=""> <?php echo $letter ?> </span>
                                                                </span>
                                                            </span> 
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img data-v-143dd668="" class="ifarmeimcg"  src="<?php echo $client['img'] ?>"> 

                                                    <?php
                                                }
                                                ?>

                                                <div data-v-143dd668="" class="flex" style="margin-bottom:16px">
                                                    <h1 data-v-143dd668="" class="no-margin" style="font-size:22px!important;"><?php
                                                        if ($client['civ']!== ''){
                                                            echo $client['civ'];
                                                        }
                                                        if ($client['prenom']!=="" || $client['nom']!==""){
                                                             echo  " " . $client['prenom'] . " " . $client['nom'];
                                                        }else{
                                                            echo $client['nom_soc'];
                                                        }
                                                         ?></h1>
                                                    <div data-v-143dd668="" class="edit-action link flex">
                                                        <i data-v-143dd668="" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" class="ion-md-create">

                                                        </i> 
                                                        <span data-v-143dd668="" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">Modifier</span>

                                                    </div>



                                                </div> 
                                                <div  class="row">
                                                    <div data-v-20405c76="" class="col">
                                                        <div class="row" >
                                                            <?php if ($client['etiquet'] == 0) { ?>
                                                                <div data-v-4714f8e4="" class="tag-block">
                                                                    <div data-v-4714f8e4="" class="tag badge" style="background:#28B5BF"> Client </div> 
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($client['etiquet'] == 1) { ?>
                                                                <div data-v-4714f8e4="" class="tag-block">
                                                                    <div data-v-4714f8e4="" class="tag badge" style="background:#28B5BF"> Client Particulier </div> 
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($client['etiquet'] == 2) { ?>
                                                                <div data-v-4714f8e4="" class="tag-block">
                                                                    <div data-v-4714f8e4="" class="tag badge" style="background:#F2D600"> Client Professionnel </div> 
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($client['etiquet'] == 3) { ?>
                                                                <div data-v-4714f8e4="" class="tag-block">
                                                                    <div data-v-4714f8e4="" class="tag badge"   style="background:#5DADE2"> Fournisseur </div> 
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <h2 data-v-143dd668="" class=" no-margin" style="font-size:18px!important;">
                                                    <i data-v-143dd668="" class="icon subtitles ion-ios-pin"></i> 
                                                    <a data-v-143dd668="" target="_blank" href="https://www.google.com/maps/search/<?php echo $client['adr'] ?>+France">
                                                        <?php echo $client['adr'] ?> <?php echo $client['cp'] ?> <?php echo $client['ville'] ?> <?php echo $client['pays'] ?>
                                                    </a> <!---->
                                                </h2> 
                                                <h2 data-v-143dd668="" class=" no-margin" style="font-size:18px!important;">
                                                    <i data-v-143dd668="" class="icon subtitles ion-ios-phone-portrait"></i>
                                                    <?php echo $client['mob'] ?>
                                                </h2> 
                                                <h2 data-v-143dd668="" class=" no-margin" style="font-size:18px!important;">
                                                    <i data-v-143dd668="" class="icon subtitles ion-ios-call"></i><?php echo $client['tel'] ?>
                                                </h2> 
                                                <h2 data-v-143dd668="" class=" no-margin" style="font-size:18px!important;">
                                                    <i data-v-143dd668="" class="icon subtitles ion-ios-mail"></i>
                                                    <?php echo $client['email'] ?>
                                                </h2> 

                                                <div data-v-143dd668="" class="inline-block">
                                                    <div data-v-143dd668="" style="font-size:16px!important;">
                                                        <span data-v-143dd668="" style="font-size:16px!important;" class="label">Code analytique : </span> <?php echo $client['code_a'] ?>
                                                    </div> 
                                                    <div data-v-143dd668=""style="font-size:16px!important;">
                                                        <span data-v-143dd668="" style="font-size:16px!important;" class="label">Code client : </span> <?php echo $client['code_c'] ?>
                                                    </div> 

                                                    <div data-v-143dd668=""style="font-size:16px!important;">
                                                        <span data-v-143dd668="" class="label" style="font-size:16px!important;">SIRET : 
                                                        </span> <?php echo $client['siren'] ?>
                                                    </div>
                                                    <div data-v-143dd668=""style="font-size:16px!important;">
                                                        <span data-v-143dd668="" class="label" style="font-size:16px!important;">Nom de la société :
                                                        </span> <?php echo $client['nom_soc'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    <?php include ('modaleditclt.php'); ?>
            </main>
        </div>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" async=""></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


        <link rel="stylesheet" href="dist/css/styles.css"> 

        <!-- Latest compiled JavaScript -->

        <!-- These are the necessary files for the image uploader -->
        <script src="dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>
        <script>
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

            function fac() {
                if (document.getElementById("facturrr").style.display === 'none') {
                    document.getElementById("deviiii").style.display = "none";
                    document.getElementById("facturrr").style.display = "contents";
                    $("#facc").addClass('active');
                    $("#devv").removeClass('active')
                }
            }


            function dev() {
                if (document.getElementById("deviiii").style.display === 'none') {
                    document.getElementById("facturrr").style.display = "none";
                    document.getElementById("deviiii").style.display = "contents";
                    $("#devv").addClass('active');
                    $("#facc").removeClass('active');
                }
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
                    url: "aff2.php",
                    data: {
                        id: id,
                    },

                    success: function (o) {
                        document.getElementById("etq").innerHTML += o;
                        document.getElementById("BV_popover_1").style.display = "none";
                        document.getElementById("tdd_" + id).style.display = "none";

                    }
                });

            }


            function org(id) {
                document.getElementById("divv_" + id).remove();
                document.getElementById("tdd_" + id).style.display = "block";
            }




        </script>
        <script>


            $(document).ready(function () {

                oTable = $('#BVID__277').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findec.php",
                    "dom": 'Bfrtip',
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

                $("#ExportReporttoExcel").on("click", function () {
                    oTable.button('.buttons-csv').trigger();
                });
                $("#ExportReporttopdf").on("click", function () {
                    oTable.button('.buttons-pdf').trigger();
                });
                $('#serchprd').keyup(function () {

                    oTable.search($(this).val()).draw();
                })
            })

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