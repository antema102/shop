<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` where email ='" . $_SESSION['user'] . "' "));
$m = 3;
?>
<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Ajouter produits</title>
        <meta name="description" >
        <link rel="manifest" href="<?php echo url ?>static/manifest.json">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/favicon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style2.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            a{
                text-decoration: none;
            }

            .uploaded_image{
                padding-left: 0px !important;
                padding-right: 0px !important;
                width: 200px !important;
                height: 200px !important;
                margin-left: 12px !important;
                text-align: center !important;
                margin-right: 12px !important;
            }
        </style>
    </head>
    
    <body lang="fr" cz-shortcut-listen="true">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> <!---->

            <main class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!----></div>

                    </div>

                </div> 
                <div data-v-77800238="" class="container product-add container-fluid">
                    <form action="addprd.php" method="post" enctype="multipart/form-data">
                        <div data-v-77800238="" class="card">
                            <!----><!----><div data-v-77800238="" class="card-body"><!----><!---->
                                <div  class="row">
                                    <div  class="col-md-4 col-lg-4 col-4 col-sm-4">
                                        <a href="produit.php"> <i data-v-77800238="" class="icon ion-ios-arrow-round-back back-to-list"></i> </a>
                                    </div>
                                    <div  class="col-md-6 col-lg-6 col-6 col-sm-6">
                                        <h1 data-v-77800238="" class="title no-margin-b">Nouveau produit</h1> 
                                    </div>

                                </div> 
                                <div data-v-77800238="" class="form-horizontal">
                                    <div data-v-77800238="" class="tabs" fill="" id="__BVID__137"><!---->
                                        <div class="">
                                            <ul role="tablist" class="nav nav-tabs" id="__BVID__137__BV_tab_controls_">
                                                <li role="presentation" class="nav-item">
                                                    <a role="tab" id="__BVID__138___BV_tab_button__" aria-selected="true" aria-setsize="1" aria-posinset="1" target="_self" href="#" class="nav-link active">Général</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content mt-3" id="__BVID__137__BV_tab_container_" >
                                            <div data-v-77800238="" role="tabpanel" aria-hidden="false" aria-expanded="true" class="tab-pane show fade active" style="" id="__BVID__138" tabindex="0" aria-labelledby="__BVID__138___BV_tab_button__">
                                                <div data-v-77800238="" class="row product-form">
                                                    <div data-v-77800238="" class="col-sm-6 col-12">
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__140" aria-labelledby="__BVID__140__BV_label_" aria-describedby="__BVID__140__BV_description_">
                                                            <label for="ref" class="d-block" id="__BVID__140__BV_label_">Référence</label>
                                                            <div>
                                                                <input data-v-77800238="" required="" name="ref"  id="ref" type="text" placeholder="" class="form-control" autofocus="autofocus" aria-describedby="__BVID__140__BV_description_ __BVID__140__BV_description_"><!----><!---->
                                                                <small tabindex="-1" class="form-text text-muted" id="__BVID__140__BV_description_">Numero unique du produit</small>
                                                            </div>
                                                        </div> 
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__142" aria-labelledby="__BVID__142__BV_label_">
                                                            <label for="productName" class="d-block" id="__BVID__142__BV_label_">Nom</label>
                                                            <div>
                                                                <input data-v-77800238="" id="nom" name="nom" required="" type="text" placeholder="" class="form-control"><!----><!----><!---->
                                                            </div>
                                                        </div> 
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__163" aria-labelledby="__BVID__163__BV_label_" aria-describedby="__BVID__163__BV_description_">
                                                            <label for="cat" class="d-block" id="__BVID__163__BV_label_">Catégorie</label>
                                                            <div>
                                                                <select data-v-1b70f5f4="" class="mb-3 custom-select" name="cat" id="__BVID__217">
                                                                    <option data-v-1b70f5f4="" value=""></option> 
                                                                    <?php
                                                                    $cat = mysqli_query($link, "SELECT * FROM `cat`");
                                                                    while ($cat_data = mysqli_fetch_array($cat)) {
                                                                        ?>
                                                                        <option data-v-1b70f5f4="" value="<?php echo $cat_data['id']; ?>"><?php echo $cat_data['cat']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <small tabindex="-1" class="form-text text-muted" id="__BVID__163__BV_description_">Catégorie dans laquelle se trouve le produit</small>
                                                            </div>
                                                        </div>
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__301" aria-labelledby="__BVID__301__BV_label_">
                                                            <label for="datecommande" class="d-block" id="__BVID__301__BV_label_">Date de commande </label>
                                                            <div>
                                                                <input data-v-77800238="" id="datecommande" name="datecommande"    type="date" placeholder="01/01/0001" class="form-control">
                                                            </div>
                                                        </div>


                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__300" aria-labelledby="__BVID__300__BV_label_">
                                                            <label for="dateapprovisionnement" class="d-block" id="__BVID__300__BV_label_">Date d'approvisonement </label>
                                                            <div>
                                                                <input data-v-77800238="" id="dateapprovisionnement" name="dateapprovisionnement" type="date" placeholder="01/01/0001" class="form-control"><!----><!----><!---->

                                                            </div>
                                                        </div>

                                                        <?php if($user['role'] == '1') { ?>
                                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__163" aria-labelledby="__BVID__163__BV_label_" aria-describedby="__BVID__163__BV_description_">
                                                                <label for="four" class="d-block" id="__BVID__163__BV_label_">Fournisseur</label>
                                                                <div>
<!--                                                                    <select data-v-1b70f5f4="" class="mb-3 custom-select" name="four" id="__BVID__217">-->
<!--                                                                        <option data-v-1b70f5f4="" value=""></option> -->
<!--                                                                        --><?php
//                                                                        $cat = mysqli_query($link, "SELECT * FROM `founiseur`");
//                                                                        while ($cat_data = mysqli_fetch_array($cat)) {
//                                                                            ?>
<!--                                                                            <option data-v-1b70f5f4="" value="--><?php //echo $cat_data['id']; ?><!--">--><?php //echo $cat_data['nom']; ?><!--</option>-->
<!--                                                                        --><?php //} ?>
<!--                                                                    </select>-->
                                                                    <select data-v-1b70f5f4="" class="mb-3 custom-select" name="four" id="__BVID__217">
                                                                        <option data-v-1b70f5f4="" value=""></option>
                                                                        <?php
                                                                        $cat2 = mysqli_query($link, "SELECT id,nom as four_nom,prenom as four_prenom FROM `client` where etiquet='3'");
                                                                        while ($cat_data2 = mysqli_fetch_array($cat2)) {
                                                                            ?>
                                                                            <option data-v-1b70f5f4="" value="<?php echo $cat_data2['id']; ?>"><?php echo $cat_data2['four_nom'].' '.$cat_data2['four_prenom']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <fieldset data-v-77800238="" class="form-group" id="__BVID__144" aria-labelledby="__BVID__144__BV_label_" aria-describedby="__BVID__144__BV_description_">
                                                            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__144__BV_label_">Code analytique</legend>
                                                            <div tabindex="-1" role="group" aria-labelledby="__BVID__144__BV_label_">
                                                                <input data-v-77800238="" name="code" type="text" placeholder="Compte produit" class="form-control" id="__BVID__145"><!----><!---->
                                                            </div>
                                                            <?php if ($user['role'] == '1') { ?>
                                                            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__144__BV_label_">Nom Fournisseur</legend>
                                                            <div tabindex="-1" role="group" aria-labelledby="__BVID__144__BV_label_">
                                                                <input data-v-77800238="" name="code" type="text" placeholder="Fournisseur" class="form-control" id="__BVID__145"><!----><!---->
                                                            </div>
                                                            <?php } ?>
                                                            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__144__BV_label_">Code-barres</legend>
                                                            <div tabindex="-1" role="group" aria-labelledby="__BVID__144__BV_label_">
                                                                <input data-v-77800238="" name="code_a_barre" type="text" placeholder="Code-barres" class="form-control" id="__BVID__145">
                                                            </div>
                                                        </fieldset> 
                                                        <fieldset data-v-77800238="" class="form-group" id="__BVID__146" aria-labelledby="__BVID__146__BV_label_">
                                                            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__146__BV_label_">Lien vers le produit</legend>
                                                            <div tabindex="-1" role="group" aria-labelledby="__BVID__146__BV_label_">
                                                                <input data-v-77800238="" id="productUrlExt" name="lien" type="text" class="form-control"><!----><!----><!---->
                                                            </div>
                                                        </fieldset>
                                                    </div> 
                                                    <div data-v-77800238="" class="justify-content-start col-sm-3 col-12">
                                                        <fieldset data-v-77800238="" class="form-group" id="__BVID__148" aria-labelledby="__BVID__148__BV_label_">
                                                            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__148__BV_label_">Image principale</legend>
                                                            <div tabindex="-1" role="group" aria-labelledby="__BVID__148__BV_label_">
                                                                <div data-v-7da95bc8="" data-v-77800238="">
                                                                    <div data-v-7da95bc8="">

                                                                        <div data-v-7da95bc8="" class="ipt-f-container ipt-f-alone" style="height: 487px;">
                                                                            <div data-v-7da95bc8="" class="ipt-f-box-empty bd-dashed" style="padding-top: 0px; height: 341px;margin-left: 0px;">

                                                                                <div class="col-lg-12 col-12 mb-20" style="padding-left: 0px;padding-right: 0px;">
                                                                                    <!-- <h6 class="mb-15">Chargez vos photos</h6> -->
                                                                                    <!-- <input type="file" name="img1[]" id="img1" multiple class="form-control"> -->
                                                                                    <!--  -->

                                                                                    <!-- This area will show the uploaded files -->
                                                                                    <div id="uploaded_images">

                                                                                    </div>

                                                                                    <div id="uploaded_images2">
                                                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                                                        <span class=" fileinput-button" style="">
                                                                                            <i class="fas fa-photo-video" style="padding-left: 103px;    padding-right: 103px;    padding-top: 150px;    padding-bottom: 150px;"></i>

                                                                                            <!-- The file input field used as target for the file upload widget -->
                                                                                            <input id="fileupload" type="file" name="files" accept="image/x-png, image/gif, image/jpeg" >
                                                                                        </span>

                                                                                        <!-- The container for the uploaded files -->
                                                                                        <div id="files" class="files"></div>
                                                                                        <input type="text" name="uploaded_file_name" id="uploaded_file_name" hidden>
                                                                                        <br>
                                                                                    </div>
                                                                                </div>


                                                                                <!--  -->
                                                                            </div>

                                                                        </div>
                                                                    </div> <!----> <!---->
                                                                </div> <!----> <!---->
                                                            </div><!----><!----><!---->
                                                    </div>
                                                    </fieldset>
                                                </div>
                                            </div> 
                                            <div data-v-77800238="" class="row" >
                                                <div data-v-77800238="" class="col-sm-12 col-12">
                                                    <div data-v-77800238="" role="group" class="form-group" id="__BVID__150" aria-labelledby="__BVID__150__BV_label_" aria-describedby="__BVID__150__BV_description_">
                                                        <label for="productDescription" class="d-block" id="__BVID__150__BV_label_">Description</label>

                                                        <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div data-v-77800238="" class="col-sm-4 col-12">
                                                    <div data-v-77800238="" role="group" class="form-group" id="__BVID__152" aria-labelledby="__BVID__152__BV_label_">
                                                        <label for="productPriceHT" class="d-block" id="__BVID__152__BV_label_">Prix HT (€)</label>
                                                        <div>
                                                            <input data-v-77800238="" id="productPriceHT" onblur="calcul()" name="prixht" type="number" placeholder="" step="0.01" class="form-control"><!----><!----><!---->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div data-v-77800238="" class="col-sm-4 col-12">
                                                    <div data-v-77800238="" role="group" class="form-group" id="__BVID__154" onchange="calcul()" aria-labelledby="__BVID__154__BV_label_"><label for="productTvaRate" class="d-block" id="__BVID__154__BV_label_">TVA</label>
                                                        <div>
                                                            <select data-v-77800238="" class="custom-select" name="tva" id="__BVID__155">
                                                                <option data-v-77800238="" value="0">0%</option>
                                                                <option data-v-77800238="" value="5">5%</option>
                                                                <option data-v-77800238="" value="10">10%</option>
                                                                <option data-v-77800238="" value="20">20%</option>
                                                            </select><!----><!----><!---->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-v-77800238="" class="col-sm-4 col-12" id="blockt">
<!--                                                <div data-v-77800238="" class="col-sm-4 col-12" >-->
                                                    <div data-v-77800238="" role="group" class="form-group" id="__BVID__156" aria-labelledby="__BVID__156__BV_label_">
                                                        <label for="productPriceTTC" class="d-block" id="__BVID__156__BV_label_">Prix TTC (€)</label>

                                                        <input data-v-77800238="" id="productPriceTTC" type="number" name="prixttc" placeholder="" step="0.01" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row" >
                                                    <div data-v-77800238="" class="col-sm-4 col-12">
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__158" aria-labelledby="__BVID__158__BV_label_">
                                                            <label for="coutachat" class="d-block" id="__BVID__158__BV_label_">Coût d'achat (€)</label>
                                                            <div>
                                                                <input data-v-77800238="" id="coutachat" onchange="calculMarge()" name="coutachat" type="number" placeholder="" step="0.01" class="form-control"><!----><!----><!---->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div data-v-77800238="" class="col-sm-4 col-12">
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__160" aria-labelledby="__BVID__160__BV_label_">
                                                            <label for="productEcotax" class="d-block" id="__BVID__160__BV_label_">Coefficient multiplicateur</label>
                                                            <div>
                                                                <input data-v-77800238="" id="productEcotax" type="number" placeholder="" name="eco" step="0.01" class="form-control"><!----><!----><!---->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div data-v-77800238="" class="col-sm-4 col-12" id="blockmarge">
<!--                                                    <div data-v-77800238="" class="col-sm-4 col-12" >-->
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__162" aria-labelledby="__BVID__162__BV_label_">
                                                            <label for="margecomm" class="d-block" id="__BVID__162__BV_label_">Marge Commerciale (€)</label>
                                                            <input data-v-77800238="" id="margecomm" type="number" name="marge" placeholder="" step="0.01" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row" >
                                                <div data-v-77800238="" class="col-sm-4 col-12">
                                                    <div data-v-77800238="" role="group" class="form-group" id="__BVID__191" aria-labelledby="__BVID__191__BV_label_">
                                                        <label for="courtransport" class="d-block" id="__BVID__191__BV_label_">Cour Transport</label>
                                                        <div>
                                                            <input data-v-77800238="" id="courtransport" onchange="" name="courtransport" type="text" placeholder="" step="0.01" class="form-control"><!----><!----><!---->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> <!----> <!----> <!----> <!----><!---->
                                    </div>

                                </div>
                            </div><!----><!---->
                        </div>

                        <div class="col-md-12 col-12 col-sm-12 col-lg-12" style="text-align:center ;margin-bottom: 32px" ><!---->
                            <button data-v-77800238="" style="border: 1px solid;" type="submit" name="cree" class="btn btn-default">Créer</button>
                        </div> 
                    </form>
                </div>
            </main>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js" async=""></script> 
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="dist/css/styles.css">

        <!-- Latest compiled JavaScript -->

        <!-- These are the necessary files for the image uploader -->
        <script src="dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>
        <script>
                function calcul() {
                    var ht = document.getElementById("productPriceHT").value;
                    var tva = document.getElementById("__BVID__155").value;
                    $.ajax({
                        type: "POST",
                        // url: "calcultva.php",
                        url: "calcultvaprd.php",
                        data: {
                            ht: ht,
                            tva: tva
                        },
                        success: function (data) {
                            document.getElementById("blockt").innerHTML = data;


                        }
                    });

                }
                function calculMarge() {
                    var ht = document.getElementById("productPriceHT").value;
                    var coutachat = document.getElementById("coutachat").value;
                    $.ajax({
                        type: "POST",
                        url: "calculmarge.php",
                        data: {
                            ht: ht,
                            coutachat: coutachat
                        },

                        success: function (data) {
                            document.getElementById("blockmarge").innerHTML = data;
                        }
                    });

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
                            $('#uploaded_images').html('<div class="uploaded_image"> <input type="text" value="' + data['result'] + '" name="img1" id="uploaded_image_name" hidden> <img src="photos/' + data['result'] + '" style="width: 200px;height: 200px;padding-left: 0px;padding-right: 0px;left: 0px;text-align: center;"/> <a href="#" style="margin-top:40px;margin-right: 40px;left: 0px;right: 0px;margin-left: 54px;" class="img_rmv btn btn-danger"><i class="fa fa-times-circle" id=supp" style="font-size:48px;color:red"></i></a> </div>');
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