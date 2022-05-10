<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$id = $_GET['id'];
$produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` where id=" . $id));
$cat = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `cat` where id=" . $produit['cat_id']));
$user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` where email ='" . $_SESSION['user'] . "' "));
$fournisseurs2 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` where id=" . $produit['id']));

$imageArr = explode("/",$produit['img']);
$imageVal = $imageArr[count($imageArr) - 1];

$m = 3;
if (isset($_POST['mod'])) {

    $code_a_barre = $_POST['code_a_barre'];
    $ref = $_POST['ref'];
    $nom = $_POST['nom'];
    $cat2 = $_POST['cat'];
    $code_a = $_POST['code'];
    $lien_v_p = $_POST['lien'];
    $description = $_POST['desc'];
    $prix_ht = $_POST['prixht'];
    $tva = $_POST['tva'];
    $prix_ttc = $_POST['prixttc'];
    $cout_achat_ht = $_POST['achatht'];
    $eco = $_POST['eco'];
    $marge = $_POST['marge'];
    $courtransport =$_POST['courtransport'];
    $four = $_POST['fr'];
    $vv = "photos/";
    $img = $_POST['img1'];
    if($img != ''){
        $img = url . $vv . $img;
    }
    $datecommande=  date("Y-m-d", strtotime($_POST['datecommande']));
    $dateapprovisionnement = date("Y-m-d", strtotime($_POST['dateapprovisionnement'])) ;
    $cat3 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `cat` where id=" . $cat2));
    $idfournisseur = $_POST['four'];
    $fournisseurs = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` where id=" . $idfournisseur));
    $search =array("0001-01-01","1970-01-01");


    mysqli_query($link, " UPDATE produit SET four='" . $four . "' ,img='" . $img . "', ref='" . $ref . "', nom='" . $nom . "', cat_id='" . $cat2 . "',cat_nom='" . $cat3['cat'] . "', code_a='" . $code_a . "', lien_v_p='" . $lien_v_p . "', description='" . $description . "', prix_ht='" . $prix_ht . "', tva ='" . $tva . "', prix_ttc='" . $prix_ttc . "', cout_achat_ht='" . $cout_achat_ht . "', eco='" . $eco . "', code_a_barre='" . $code_a_barre . "' , marge='" . $marge . "' , datecommande='" . $datecommande . "' , dateapprovisionnement='" . $dateapprovisionnement . "' , idfournisseur='" . $fournisseurs['id'] . "' , courtransport='" . $courtransport . "'  WHERE id=" . $id . "")or die(mysqli_error($link));
    echo '<script>window.location = ("detailprd.php?id=' . $id . '")</script>';
}
?>

<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Liste des produits</title>
        <meta name="description" >
        <link href="data.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style3.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link rel="stylesheet" href="dist/css/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.js" async=""></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> <!---->
            <main class="main">
                <div data-v-77800238="" class="container container-fluid">

                    <div data-v-77800238="" class="card"><!----><!---->
                        <div data-v-77800238="" class="card-body"><!----><!---->
                            <div data-v-77800238="" class="w_parameters_preheader">
                                <a href="detailprd.php?id=<?php echo $id ?>"><i data-v-77800238="" class="icon ion-ios-arrow-round-back back-to-list"></i></a> 
                                <h1 data-v-77800238="" class="title no-margin-b">Modifier un produit</h1> 

                                <div data-v-77800238="" class="pull-left margin-r">
                                    <div data-v-05970cda="" data-v-77800238="" class="contener-btn-confirm">
                                        <button data-v-05970cda="" type="button"  class="btn btn-secondary btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><!----> 
                                            Supprimer
                                        </button> 

                                    </div>
                                </div> 

                            </div> 

                            <div data-v-77800238="" class="form-horizontal">
                                <div data-v-77800238="" class="tabs" fill="" id="__BVID__176"><!---->
                                    <div class="">
                                        <ul role="tablist" class="nav nav-tabs" id="__BVID__176__BV_tab_controls_">
                                            <li role="presentation" class="nav-item">
                                                <a role="tab" id="__BVID__177___BV_tab_button__" aria-selected="true" aria-setsize="5" aria-posinset="1" target="_self" href="#" class="nav-link active">Général</a>
                                            </li>

                                            <li role="presentation" class="nav-item">
                                                <a role="tab" id="__BVID__208___BV_tab_button__" tabindex="-1" aria-selected="false" aria-setsize="5" aria-posinset="3" target="_self" href="editgs.php?id=<?php echo $id ?>" class="nav-link">Gestion des stocks</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content mt-3" id="__BVID__176__BV_tab_container_">
                                        <div data-v-77800238="" role="tabpanel" aria-hidden="false" aria-expanded="true" class="tab-pane show fade active" style="" id="__BVID__177" tabindex="0" aria-labelledby="__BVID__177___BV_tab_button__">

                                            <form action="" method="post" class="">
                                                <div data-v-77800238="" class="row product-form">

                                                    <div data-v-77800238="" class="col-sm-6 col-12">
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__179" aria-labelledby="__BVID__179__BV_label_" aria-describedby="__BVID__179__BV_description_">
                                                            <label for="productReference" class="d-block" id="__BVID__179__BV_label_">Référence</label>
                                                            <div>
                                                                <input data-v-77800238="" value="<?php echo $produit['ref'] ?>" name="ref" id="productReference" type="text" placeholder="" class="form-control" autofocus="autofocus"  aria-describedby="__BVID__179__BV_description_ __BVID__179__BV_description_"><!----><!---->
                                                                <small tabindex="-1" class="form-text text-muted" id="__BVID__179__BV_description_">Numero unique du produit</small>
                                                            </div>
                                                        </div> 
                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__181" aria-labelledby="__BVID__181__BV_label_">
                                                            <label for="productName" class="d-block" id="__BVID__181__BV_label_">Nom</label><div>
                                                                <input data-v-77800238="" id="productName" name="nom" value="<?php echo $produit['nom'] ?>" type="text" placeholder="" class="form-control"><!----><!----><!---->
                                                            </div>
                                                        </div>

                                                        <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__142" aria-labelledby="__BVID__142__BV_label_">
                                                            <label for="datecommande" class="d-block" id="__BVID__142__BV_label_">Date de commande</label>
                                                            <div>
                                                                <div>
                                                                    <input data-v-77800238="" id="datecommande" name="datecommande"  value="<?php  echo ($produit['datecommande']=="0001-01-01" || $produit['datecommande']=="1970-01-01") ?"jj/mm/aaaa": ($produit['datecommande']) ?>"  type="date"   class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div data-v-08517f6c="" role="group" class="form-group" id="__BVID__300" aria-labelledby="__BVID__300__BV_label_">
                                                            <label for="dateapprovisionnement" class="d-block" id="__BVID__300__BV_label_">Date d'approvisonement</label>
                                                            <div>
                                                                <input data-v-77800238="" id="dateapprovisionnement" name="dateapprovisionnement"  value="<?php echo  ($produit['dateapprovisionnement']=="0001-01-01" || $produit['dateapprovisionnement']=="1970-01-01" ?"jj/mm/aaaa":$produit['dateapprovisionnement']) ?>"  type="date"  class="form-control">
                                                            </div>
                                                        </div>

                                                        <div data-v-77800238="" role="group" class="form-group" id="__BVID__245" aria-labelledby="__BVID__245__BV_label_" aria-describedby="__BVID__245__BV_description_">
                                                            <label for="productDescription" class="d-block" id="__BVID__245__BV_label_">Catégorie</label>
                                                            <div>
                                                                <select data-v-1b70f5f4="" class="mb-3 custom-select" name="cat" id="__BVID__217">
                                                                    <option data-v-1b70f5f4="" value="<?php echo $cat['id']; ?>" selected=""><?php echo $cat['cat']; ?></option>
                                                                    <?php
                                                                    $cat4 = mysqli_query($link, "SELECT * FROM `cat`");
                                                                    while ($cat_data = mysqli_fetch_array($cat4)) {
                                                                        ?>
                                                                        <option data-v-1b70f5f4="" value="<?php echo $cat_data['id']; ?>"><?php echo $cat_data['cat']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <small tabindex="-1" class="form-text text-muted" id="__BVID__245__BV_description_">Catégorie dans laquelle se trouve le produit</small>
                                                            </div>
                                                        </div> 
                                                        <?php if ($user['role'] == '1') { ?>
                                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__245" aria-labelledby="__BVID__245__BV_label_" aria-describedby="__BVID__245__BV_description_">
                                                                <label for="productDescription" class="d-block" id="__BVID__245__BV_label_">Fournisseur</label>
                                                                <div>
                                                                    <select required data-v-1b70f5f4="" class="mb-3 custom-select" name="four" id="__BVID__217">
                                                                        <?php
//                                                                        $frselect = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` where id='$idfournisseur'"));
//                                                                        echo "<pre>";
//                                                                        print_r($frselect);
//                                                                        echo "</pre>";
                                                                        ?>
                                                                        <option data-v-1b70f5f4="" value="<?php echo $fournisseurs2['id']; ?>" selected=""><?php echo $fournisseurs2['nom']; ?></option>
                                                                        <?php
                                                                        $fr_sql = mysqli_query($link, "SELECT * FROM `client` where etiquet='3'");
                                                                        while ($fr = mysqli_fetch_array($fr_sql)) {
                                                                            ?>
                                                                            <option data-v-1b70f5f4="" value="<?php echo $fr['id']; ?>"><?php echo $fr['nom'].' '. $fr['prenom']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <?php } ?>



                                                        <fieldset data-v-77800238="" class="form-group" id="__BVID__183" aria-labelledby="__BVID__183__BV_label_" aria-describedby="__BVID__183__BV_description_">
                                                            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__183__BV_label_">Code analytique</legend>

                                                            <div tabindex="-1" role="group" aria-labelledby="__BVID__183__BV_label_">
                                                                <input data-v-77800238="" type="text" name="code" placeholder="Compte produit" value="<?php echo $produit['code_a'] ?>" class="form-control" id="__BVID__184"><!----><!---->

                                                            </div>
                                                            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__144__BV_label_">Code-barres</legend>
                                                            <div tabindex="-1" role="group" aria-labelledby="__BVID__144__BV_label_">
                                                                <input data-v-77800238="" name="code_a_barre" value="<?php echo $produit['code_a_barre'] ?>" type="text" placeholder="Code-barres" class="form-control" id="__BVID__145" readonly>
                                                            </div>
                                                        </fieldset> 
                                                        <fieldset data-v-77800238="" class="form-group" id="__BVID__185" aria-labelledby="__BVID__185__BV_label_">
                                                            <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__185__BV_label_">Lien vers le produit</legend>
                                                            <div tabindex="-1" role="group" aria-labelledby="__BVID__185__BV_label_">
                                                                <input data-v-77800238="" id="productUrlExt" name="lien" type="text" class="form-control"><!----><!----><!---->
                                                            </div>
                                                        </fieldset>
                                                    </div> 
                                                    <div data-v-77800238="" class="justify-content-start col-sm-3 col-12">
                                                        <?php if ($produit['img'] == '') { ?>
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
                                                                                           <!-- <div id="files" class="files"></div>
                                                                                            <input type="text" name="uploaded_file_name" id="uploaded_file_name" hidden>
                                                                                            <br> -->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <!--  -->
                                                                        </div>

                                                                    </div>
                                                                </div> <!----> <!---->
                                                        </div> <!----> <!---->
                                                    </div><!----><!----><!---->
                                                    </fieldset>


                                                <?php } else { ?>

                                                    <fieldset data-v-77800238="" class="form-group" id="__BVID__148" aria-labelledby="__BVID__148__BV_label_">
    <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__148__BV_label_">Image principale</legend>
    <div tabindex="-1" role="group" aria-labelledby="__BVID__148__BV_label_">
        <div data-v-7da95bc8="" data-v-77800238="">
            <div data-v-7da95bc8="">

                <div data-v-7da95bc8="" class="ipt-f-container ipt-f-alone" style="height: 487px;">
                    <div data-v-7da95bc8="" class="ipt-f-box-empty bd-dashed" style="padding-top: 0px; height: 341px;margin-left: 0px;">

                        <div class="col-lg-12 col-12 mb-20" style="padding-left: 0px;padding-right: 0px;">
                   
                            <!-- This area will show the uploaded files -->
                            <div id="uploaded_images">
                                <div class="uploaded_image"> 
                                 <input type="text" value="<?php echo $imageVal ?>" name="img1" id="" hidden> 
                                <img src="<?php echo $produit['img'] ?>" style="width: 200px;height: 200px;padding-left: 0px;padding-right: 0px;left: 0px;text-align: center;"> 
                                  <!--  <a href="#" style="margin-top:40px;margin-right: 40px;left: 0px;right: 0px;margin-left: 54px;" class="img_rmv btn btn-danger">
                                    <i class="fa fa-times-circle" id=supp" style="font-size:48px;color:red"></i>
                                    </a>  -->
                                    
                                    <button data-v-05970cda="" onclick="suppImg()" type="button" style="margin-top:40px;margin-right: 40px;left: 0px;right: 0px;margin-left: 54px;" class="img_rmv btn btn-danger>
                                        <span data-v-05970cda=""><i class="fa fa-times-circle" id=supp" style="font-size:48px;color:red"></i></span>
                                    </button> 
                                </div>

                            </div>

                            <div id="uploaded_images2" style="display: none;">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class=" fileinput-button" style="">
                                    <i class="fas fa-photo-video" style="padding-left: 103px;    padding-right: 103px;    padding-top: 150px;    padding-bottom: 150px;"></i>

                                    <!-- The file input field used as target for the file upload widget -->
                                    <input id="fileupload" type="file" name="files" accept="image/x-png, image/gif, image/jpeg" >
                                </span>

                                <!-- The container for the uploaded files -->
                                <!-- <div id="files" class="files"></div>
                                <input type="text" name="uploaded_file_name" id="uploaded_file_name" hidden>
                                <br>  -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</fieldset>

                                                   <!-- <fieldset data-v-77800238="" class="form-group" id="supimg" aria-labelledby="__BVID__187__BV_label_">
                                                        <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__187__BV_label_">Image principale</legend>
                                                        <div tabindex="-1" role="group" aria-labelledby="__BVID__187__BV_label_">
                                                            <div data-v-7da95bc8="" data-v-77800238="">
                                                                <div data-v-7da95bc8="">
                                                                    <input data-v-7da95bc8="" id="inputFile" name="file" type="file" accept="image/*" style="display: none;"> 
                                                                    <div data-v-7da95bc8="" class="ipt-f-container ipt-f-alone" >
                                                                        <div data-v-7da95bc8="">
                                                                            <div data-v-7da95bc8="" class="card p-0 preview-file">
                                                                                <div class="preview-file-icon">
                                                                                    <input type="text" value="<?php// echo $imageVal ?>" name="img1" id="" hidden> 
                                                                                    <img src="<?php //echo $produit['img'] ?>" class="card-img-top img-preview">
                                                                                </div> 
                                                                                <div class="card-body p-1 preview-file-info">
                                                                                    <div class="content-action-btn">
                                                                                        <div data-v-05970cda="" class="contener-btn-confirm">
                                                                                            <button data-v-05970cda="" onclick="suup(<?php //echo $produit['id'] ?>)" type="button" class="btn btn-secondary btn btn-secondary action">
                                                                                                <span data-v-05970cda=""><i data-v-05970cda="" class="icon ion-ios-close"></i></span> 
                                                                                            </button> 
                                                                                        </div>
                                                                                    </div> 
                                                                                    <div class="content-action-btn">
                                                                                        <a href="telechpv.php?id=<?php //echo $produit['id'] ?>">
                                                                                            <button data-v-05970cda=""  type="button" class="btn btn-secondary btn btn-secondary action">
                                                                                                <span data-v-05970cda=""><i class="icon ion-ios-download" style="color: #fff; cursor: pointer"></i></span>
                                                                                            </button> 
                                                                                        </a>
                                                                                    </div> 
                                                                                    <div class="card-text preview-file-filename"><?php //echo $produit['img'] ?></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </fieldset> -->
                                               
                                                    <?php } ?>

                                        </div>

                                    </div> 
                                    <div data-v-77800238="" class="row">
                                        <div data-v-77800238="" class="col-sm-12 col-12">
                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__189" aria-labelledby="__BVID__189__BV_label_" aria-describedby="__BVID__189__BV_description_">
                                                <label for="productDescription" class="d-block" id="__BVID__189__BV_label_">Description</label>
                                                <textarea class="form-control" name="desc"  id="desc" rows="3">
                                                    <?php echo $produit['description'] ?>
                                                </textarea>
                                            </div>
                                        </div> 


                                        <div data-v-77800238="" class="col-sm-4 col-12">
                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__191" aria-labelledby="__BVID__191__BV_label_">
                                                <label for="productPriceHT" class="d-block" id="__BVID__191__BV_label_">Prix HT (€)</label>
                                                <div>
                                                    <input data-v-77800238=""   id="productPriceHT" name="prixht" onblur="calcul();calculMarge()" type ="number" step="0.01" min="1.00" value="<?php echo $produit['prix_ht'] ?>" placeholder=""  class="form-control"  <?php
                                                    if ($user['role'] == '2' ) {
                                                        echo'disabled';
                                                    }
                                                    ?> >
                                                    <!----><!----><!---->
                                                </div>
                                            </div>
                                        </div> 
                                        <div data-v-77800238="" class="col-sm-4 col-12">
                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__193" aria-labelledby="__BVID__193__BV_label_">
                                                <label for="productTvaRate" class="d-block" id="__BVID__193__BV_label_">TVA</label>
                                                <div>
                                                    <select data-v-77800238="" class="custom-select" name="tva" onchange="calcul()" id ="__BVID__194" <?php
                                                    if ($user['role'] == '2'  ) {
                                                        echo'disabled';
                                                    }
                                                    ?>>
                                                        <option data-v-77800238="" value="<?php echo $produit['tva'] ?>" selected=""><?php echo $produit['tva'] ?>%</option>
                                                        <option data-v-77800238="" value="0">0%</option>
                                                        <option data-v-77800238="" value="12">5%</option>
                                                        <option data-v-77800238="" value="10">10%</option>
                                                        <option data-v-77800238="" value="20">20%</option>


                                                    </select><!----><!----><!---->
                                                </div>
                                            </div>
                                        </div> 
                                        <div data-v-77800238="" class="col-sm-4 col-12">
                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__195" aria-labelledby="__BVID__195__BV_label_">
                                                <div id="blockt">
                                                    <label for="productPriceTTC" class="d-block" id="__BVID__195__BV_label_">Prix TTC (€)</label>
                                                    <input data-v-77800238="" id="productPriceTTC" name="prixttc" type="number" value="<?php echo number_format($produit['prix_ttc'], 2, '.', ''); ?>" placeholder=""  class="form-control" >
                                                </div>
                                            </div>
                                        </div> 
                                        <div data-v-77800238="" class="col-sm-4 col-12">
                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__197" aria-labelledby="__BVID__197__BV_label_">
                                                <label for="productBuyingPrice" class="d-block" id="__BVID__197__BV_label_">Coût d'achat HT (€)</label>
                                                <div>
                                                    <input data-v-77800238=""  <?php if ($user['role'] == '2' ) {
                                                        echo'disabled';
                                                    }
                                                    ?> id="productBuyingPrice" type="number" onchange="calculMarge()" name="achatht" value="<?php echo $produit['cout_achat_ht'] ?>" placeholder="" step="0.01" class="form-control"><!----><!----><!---->
                                                </div>
                                            </div>
                                        </div> 
                                        <div data-v-77800238="" class="col-sm-4 col-12">
                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__199" aria-labelledby="__BVID__199__BV_label_">
                                                <label for="productEcotax" class="d-block" id="__BVID__199__BV_label_">Coefficient multiplicateur(€)</label>
                                                <div>
                                                    <input data-v-77800238=""  <?php if ($user['role'] == '2' ) {
                                                        echo'disabled';
                                                    }
                                                    ?> id="productEcotax" name="eco" type="number" placeholder="" value="<?php echo $produit['eco'] ?>" step="0.01" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div data-v-77800238="" class="col-sm-4 col-12" id="blockmarge">
                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__201" aria-labelledby="__BVID__201__BV_label_">
                                                <label for="productCommercialMargin" class="d-block" id="__BVID__201__BV_label_">Marge commerciale  (€)</label>
                                                <div>
                                                    <input data-v-77800238=""  <?php if ($user['role'] == '2' ) {
                                                        echo'disabled';
                                                    }
                                                    ?> id="productCommercialMargin" name="marge" type="number" placeholder="" value="<?php echo number_format($produit['marge'] , 2, '.', ''); ?>" step="0.01" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div data-v-77800238="" class="col-sm-4 col-12">
                                            <div data-v-77800238="" role="group" class="form-group" id="__BVID__191" aria-labelledby="__BVID__191__BV_label_" aria-describedby="__BVID__189__BV_description_">
                                                <label for="productDescription" class="d-block" id="__BVID__191__BV_label_">Cour transport</label>
                                                <input type="text" class="form-control" name="courtransport"  value="<?php echo $produit['courtransport'] ?>" id="courtransport" >


                                            </div>
                                        </div>
                                        <div  class="col-md-4">
                                        </div>
                                        <div  class="col-md-4">
                                        </div>
                                        <div  class="col-md-4" style="text-align: center">
                                            <button data-v-77800238="" type="submit" name="mod" style=" border:1px solid ;" class="btn btn-default">Enregistrer</button>
                                        </div>
                                    </div>
                                    </form>
                                </div> 


                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</main>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="text-align: center">Voulez-vous supprimer ce produit ?</p>
            </div>
            <footer class="modal-footer" id="__BVID__36___BV_modal_footer_">
                <div data-v-05970cda=""><div data-v-05970cda="" class="all-width">
                        <button data-v-05970cda=""  type="button" class="btn pull-left btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Annuler</button> 
                        <a data-v-05970cda="" href="del.php?id=<?php echo $id ?>"  role="button"  class="btn pull-right btn-outline-danger"> Supprimer</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
     
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
 

<script>
    function suppImg() {
    
        document.getElementById("uploaded_images").innerHTML = '';
       document.getElementById("uploaded_images2").style.display="block";

    }
                                                        function calcul() {
                                                            var ht = document.getElementById("productPriceHT").value;
                                                            var tva = document.getElementById("__BVID__194").value;
                                                            $.ajax({
                                                                type: "POST",
                                                              //  url: "calcultva.php",
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

                                                        function suup(id) {
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "delimg.php?id=" + id,
                                                                success: function (data) {
                                                                   // document.getElementById("supimg").innerHTML = data;
                                                                   document.getElementById("supimg").outerHTML = data;
                                                                }
                                                            });
                                                        }

                                                        function calculMarge() {
                                                            var ht = document.getElementById("productPriceHT").value;
                                                            var coutachat = document.getElementById("productBuyingPrice").value;
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

                                                       // $(document).ready(function () {
                                                        jQuery(document).ready(function($){
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
                                                                       // $('#uploaded_file_name').val(data['result']);
                                                                       // $('#uploaded_images').html('');
                                                                        $('#uploaded_images').html('<div class="uploaded_image"> <input type="text" value="' + data['result'] + '" name="img1" id="uploaded_image_name" hidden> <img src="photos/' + data['result'] + '" style="width: 200px;height: 200px;padding-left: 0px;padding-right: 0px;left: 0px;text-align: center;"/> <button data-v-05970cda="" onclick="suppImg()" type="button" style="margin-top:40px;margin-right: 40px;left: 0px;right: 0px;margin-left: 54px;" class="img_rmv btn btn-danger><span data-v-05970cda=""><i class="fa fa-times-circle" id=supp" style="font-size:48px;color:red"></i></span></button></div>');
                                                                        //$('#uploaded_images').html('<div class="uploaded_image"> <input type="text" value="' + data['result'] + '" name="img1" id="uploaded_image_name" hidden> <img src="photos/' + data['result'] + '" style="width: 200px;height: 200px;padding-left: 0px;padding-right: 0px;left: 0px;text-align: center;"/> <a href="#" style="margin-top:40px;margin-right: 40px;left: 0px;right: 0px;margin-left: 54px;" class="img_rmv btn btn-danger"><i class="fa fa-times-circle" id=supp" style="font-size:48px;color:red"></i></a> </div>');
                                                                      
                                                                        $('#uploaded_images2').hide();

                                                                       // if ($('.uploaded_image').length >= max_uploads) {
                                                                       //     $('#select_file').hide();
                                                                       // } else {
                                                                       //     $('#select_file').show();
                                                                       // }
                                                                    }



                                                                   // $.each(data.result.files, function (index, file) {
                                                                    //    $('<p/>').text(file.name).appendTo('#files');
                                                                   // });

                                                                },

                                                            }).prop('disabled', !$.support.fileInput)
                                                                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
                                                        });

                                                       $("#uploaded_images").on("click", ".img_rmv", function () {
                                                            $(this).parent().remove();
                                                           $('#uploaded_image').hide();

                                                            $('#uploaded_images2').show();

                                                           // if ($('.uploaded_image').length >= max_uploads) {
                                                           //     $('#select_file').hide();
                                                           // } else {
                                                           //     $('#select_file').show();
                                                           //}
                                                        } 
                                                        );



</script>

<!-- Latest compiled JavaScript -->

<!-- These are the necessary files for the image uploader -->
<script src="dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<script src="dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>  


</body>
</html>