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
        <title>Dashbord</title>
        <meta name="description" >
        <link rel="manifest" href="<?php echo url ?>static/manifest.json">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            a{
                text-decoration: none;
            }
        </style>
    </head>
    <body lang="fr" cz-shortcut-listen="true">
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
                        </div></div>
                </div> 
                <div data-v-6a7eb354="" id="content-wrapper" class="container-xxl">
                    <div data-v-6a7eb354="" class="row row_header mb-4">
                        <div data-v-6a7eb354="" class="col-xl-3 col-md-6">
                            <h1 data-v-6a7eb354="" class="title header-form">Liste des produits</h1>
                        </div> 
                        <div data-v-6a7eb354="" class="col-xl-6 col-md-6 d-flex justify-content-center">
                            <form data-v-6a7eb354="" class="search-zone form-inline">
                                <input data-v-6a7eb354="" type="text" placeholder="Rechercher un produit" class="inline search form-control form-control" id="__BVID__34"> 
                                <span data-v-6a7eb354="" id="searchclear"><i data-v-6a7eb354="" class="icon ion-ios-close"></i>
                                </span> <button data-v-6a7eb354="" class="search-icon"><i data-v-6a7eb354="" class="icon ion-ios-search"></i>
                                </button></form></div></div> <div data-v-6a7eb354="" class="row row-search-option mb-4">
                        <div data-v-6a7eb354="" class="col-md-4 d-flex">
                            <div data-v-6a7eb354="" class="btn-advanced-search-container">
                                <a data-v-6a7eb354="" class="btn-advanced-search">
                                    <i data-v-6a7eb354="" class="icon ion-ios-options"></i>
                                </a>
                            </div>
                        </div> 
                        <div data-v-6a7eb354="" class="col-md-8 d-flex justify-content-end">
                            <div data-v-5232cd18="" data-v-6a7eb354="" class="actions sub-menu product">
                                <div data-v-5232cd18="" class="dropdown-item">
                                    <a data-v-5232cd18="" href="ajouter_prd.php" class="w_actions_button has-tooltip" data-original-title="null">
                                        <i data-v-5232cd18="" class="icon ion-ios-add"></i>
                                        <span data-v-5232cd18="">Créer un produit</span></a> <!---->
                                </div><!----><!----> 
                                <div data-v-e0aacb1e="" data-v-5232cd18="" class="fab-main-container fl-act-btn" start-opened="true">
                                    <div data-v-77282e1a="" data-v-e0aacb1e="" class="fab-cantainer fab fab-size-big" data-outside="true" style="transition-timing-function: cubic-bezier(0.24, 0.97, 0.81, 1.2); z-index: 5; background: rgb(22, 194, 194); box-shadow: rgb(102, 102, 102) 0px 2px 8px;"><div data-v-77282e1a="" class="fabMask">

                                        </div> <!----> 
                                        <i data-v-e0aacb1e="" data-v-77282e1a="" data-outside="true" class="icons iconfont vue-fab-material-icons vue-fab-iconfont-icons ion-ios-add" style="font-size: 15px;"></i>
                                    </div> 
                                    <div data-v-e0aacb1e="" class="fab-item-container fab-size-big">
                                        <div data-v-77282e1a="" data-v-2c36071f="" data-v-5232cd18="" class="fab-cantainer fab-item fab-shadow" data-v-e0aacb1e="" style="transition: all 0.4s cubic-bezier(0.16, 1.01, 0.61, 1.2) 0s; top: 0px; opacity: 0; background: rgb(255, 255, 255); transform: translate3d(0px, 0px, 0px); z-index: 0; display: none;">
                                            <div data-v-77282e1a="" class="fabMask"></div>
                                            <div data-v-2c36071f="" data-v-77282e1a="" class="fab-item-title" style="color: rgb(102, 102, 102); background: white;">
                                                Créer un produit
                                            </div> 
                                            <i data-v-2c36071f="" data-v-77282e1a="" class="vue-fab-material-icons iconfont ion-ios-add" style="font-size: 10px; color: rgb(153, 153, 153);"></i>
                                        </div>
                                        <div data-v-77282e1a="" data-v-2c36071f="" data-v-5232cd18="" class="fab-cantainer fab-item fab-shadow" data-v-e0aacb1e="" style="transition: all 0.4s cubic-bezier(0.16, 1.01, 0.61, 1.2) 0s; top: 0px; opacity: 0; background: rgb(255, 255, 255); transform: translate3d(0px, 0px, 0px); z-index: -1; display: none;">
                                            <div data-v-77282e1a="" class="fabMask"></div> 

                                            <div data-v-2c36071f="" data-v-77282e1a="" class="fab-item-title" style="color: rgb(102, 102, 102); background: white;">
                                                Ajouter une catégorie
                                            </div> 
                                            <i data-v-2c36071f="" data-v-77282e1a="" class="vue-fab-material-icons iconfont ion-ios-add" style="font-size: 10px; color: rgb(153, 153, 153);"></i>
                                        </div>
                                        <div data-v-77282e1a="" data-v-2c36071f="" data-v-5232cd18="" class="fab-cantainer fab-item fab-shadow" data-v-e0aacb1e="" style="transition: all 0.4s cubic-bezier(0.16, 1.01, 0.61, 1.2) 0s; top: 0px; opacity: 0; background: rgb(255, 255, 255); transform: translate3d(0px, 0px, 0px); z-index: -2; display: none;">
                                            <div data-v-77282e1a="" class="fabMask"></div> 
                                            <div data-v-2c36071f="" data-v-77282e1a="" class="fab-item-title" style="color: rgb(102, 102, 102); background: white;">
                                                Importer des produits
                                            </div> 
                                            <i data-v-2c36071f="" data-v-77282e1a="" class="vue-fab-material-icons iconfont ion-ios-add" style="font-size: 10px; color: rgb(153, 153, 153);"></i>
                                        </div>
                                    </div>
                                </div> 
                                <div data-v-5232cd18="" class="more-items btn-group b-dropdown dropdown" id="__BVID__50"><!---->
                                    <button aria-haspopup="true" aria-expanded="false" type="button" class="btn btn-link btn-lg dropdown-toggle dropdown-toggle-no-caret" id="__BVID__50__BV_toggle_">
                                        <i data-v-5232cd18="" class="icon ion-ios-more"></i>
                                    </button>
                                    <div role="menu" tabindex="-1" class="dropdown-menu dropdown-menu-right" aria-labelledby="__BVID__50__BV_toggle_">
                                        <!----><a data-v-5232cd18="" role="menuitem" target="_self" href="#" class="dropdown-item"></a>
                                        <a data-v-5232cd18="" href="/product/category/add" class="">
                                            <i data-v-5232cd18="" class="icon ion-ios-add"></i>Ajouter une catégorie
                                            <!----> <!---->
                                        </a>
                                        <a data-v-5232cd18="" role="menuitem" target="_self" href="#" class="dropdown-item"></a>
                                        <a data-v-5232cd18="" href="/products/import" class="">
                                            <i data-v-5232cd18="" class="icon ion-ios-add"></i>Importer des produits
                                        </a>
                                        <!----> <!----></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-v-6a7eb354="" class="row">
                        <div data-v-6a7eb354="" class="col-12"><!----></div>

                    </div> 
                    <div data-v-6a7eb354="" class="row">
                        <div data-v-6a7eb354="" class="col-12">
                            <div data-v-6a7eb354="" class="card table-wrap mb-3">
                                <table data-v-6a7eb354="" role="table" aria-busy="false" aria-colcount="7" class="table b-table fixed-table responsive-table mb-0 mt-0 table-hover b-table-stacked-md" id="__BVID__64"><!----><!---->
                                    <thead class=""><!---->
                                        <tr>
                                            <th scope="col" aria-colindex="1" class="w-mini">
                                                <label data-v-25adc6c0="" data-v-6a7eb354="" class="vue-js-switch">
                                                    <input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> 
                                                    <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(191, 203, 217); border-radius: 9px;">
                                                        <div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(3px, 3px, 0px);">

                                                        </div>

                                                    </div> 
                                                    <!----></label>
                                            </th>
                                            <th tabindex="0" scope="col" aria-colindex="2" aria-label="Click to sort Descending" aria-sort="none" class="">Référence</th>
                                            <th scope="col" aria-colindex="3" aria-label="Image" class=""></th>
                                            <th tabindex="0" scope="col" aria-colindex="4" aria-label="Click to sort Descending" aria-sort="none" class="">Nom</th>
                                            <th scope="col" aria-colindex="5" class="">Catégorie</th>
                                            <th tabindex="0" scope="col" aria-colindex="6" aria-label="Click to sort Descending" aria-sort="none" class="">Prix HT (€)</th>
                                            <th tabindex="0" scope="col" aria-colindex="7" aria-label="Click to sort Descending" aria-sort="none" class="">Coût d'achat HT (€)</th>
                                        </tr>
                                    </thead><!---->
                                    <tbody role="rowgroup" class=""><!---->
                                        <tr tabindex="0" role="row" class="rowClass">
                                            <td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
                                                <div>
                                                    <label data-v-25adc6c0="" data-v-6a7eb354="" class="padding vue-js-switch">
                                                        <input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> 
                                                        <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(191, 203, 217); border-radius: 9px;">
                                                            <div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(3px, 3px, 0px);">

                                                            </div>

                                                        </div> <!---->
                                                    </label>

                                                </div>
                                            </td>
                                            <td aria-colindex="2" data-label="Référence" role="cell" class="">
                                                <div>25022</div>
                                            </td>
                                            <td aria-colindex="3" data-label="" role="cell" class="">
                                                <div>
                                                    <span data-v-6a7eb354="" class="product_image">
                                                        <img data-v-6a7eb354="" src="https://60cf4fe986d56d317657ca06gh5spublic-wurodocuments.emstorage.fr/517.1780608484711logo.jpg" loading="lazy">
                                                    </span>
                                                </div>
                                            </td>
                                            <td aria-colindex="4" data-label="Nom" role="cell" class="">
                                                <div>cadeaux</div>
                                            </td>
                                            <td aria-colindex="5" data-label="Catégorie" role="cell" class="">
                                                <div>
                                                    <span data-v-6a7eb354="">MARIAGE</span>
                                                </div>
                                            </td>
                                            <td aria-colindex="6" data-label="Prix HT (€)" role="cell" class="">
                                                <div>12,00&nbsp;€</div>
                                            </td>
                                            <td aria-colindex="7" data-label="Coût d'achat HT (€)" role="cell" class="">
                                                <div>
                                                    <div data-v-6a7eb354="" class="d-flex justify-content-center">2,00&nbsp;€</div>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr tabindex="0" role="row" class="rowClass">
                                            <td aria-colindex="1" data-label="Sélectionné" role="cell" class=""><div>
                                                    <label data-v-25adc6c0="" data-v-6a7eb354="" class="padding vue-js-switch">
                                                        <input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> 
                                                        <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(191, 203, 217); border-radius: 9px;">
                                                            <div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(3px, 3px, 0px);">

                                                            </div>

                                                        </div> 
                                                        <!----></label>

                                                </div>
                                            </td>
                                            <td aria-colindex="2" data-label="Référence" role="cell" class="">
                                                <div>

                                                </div>
                                            </td>
                                            <td aria-colindex="3" data-label="" role="cell" class="">
                                                <div>
                                                    <span data-v-6a7eb354="" class="product_image"><!----> </span>
                                                </div>
                                            </td>
                                            <td aria-colindex="4" data-label="Nom" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="5" data-label="Catégorie" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="6" data-label="Prix HT (€)" role="cell" class="">
                                                <div>0,00&nbsp;€</div>
                                            </td>
                                            <td aria-colindex="7" data-label="Coût d'achat HT (€)" role="cell" class="">
                                                <div>
                                                    <div data-v-6a7eb354="" class="d-flex justify-content-center">
                                                        <i data-v-6a7eb354="" class="icon ion-ios-alert"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr tabindex="0" role="row" class="rowClass">
                                            <td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
                                                <div>
                                                    <label data-v-25adc6c0="" data-v-6a7eb354="" class="padding vue-js-switch">
                                                        <input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> 
                                                        <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(191, 203, 217); border-radius: 9px;">
                                                            <div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(3px, 3px, 0px);">

                                                            </div>

                                                        </div> <!---->
                                                    </label>

                                                </div>
                                            </td>
                                            <td aria-colindex="2" data-label="Référence" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="3" data-label="" role="cell" class=""><div>
                                                    <span data-v-6a7eb354="" class="product_image"><!----></span>
                                                </div>
                                            </td>
                                            <td aria-colindex="4" data-label="Nom" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="5" data-label="Catégorie" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="6" data-label="Prix HT (€)" role="cell" class="">
                                                <div>0,00&nbsp;€</div>
                                            </td>
                                            <td aria-colindex="7" data-label="Coût d'achat HT (€)" role="cell" class="">
                                                <div>
                                                    <div data-v-6a7eb354="" class="d-flex justify-content-center">
                                                        <i data-v-6a7eb354="" class="icon ion-ios-alert"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr tabindex="0" role="row" class="rowClass">
                                            <td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
                                                <div>
                                                    <label data-v-25adc6c0="" data-v-6a7eb354="" class="padding vue-js-switch">
                                                        <input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> 
                                                        <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(191, 203, 217); border-radius: 9px;">
                                                            <div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(3px, 3px, 0px);">

                                                            </div>

                                                        </div> <!---->
                                                    </label>

                                                </div>
                                            </td>
                                            <td aria-colindex="2" data-label="Référence" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="3" data-label="" role="cell" class="">
                                                <div>
                                                    <span data-v-6a7eb354="" class="product_image"><!---->
                                                    </span>
                                                </div>
                                            </td>
                                            <td aria-colindex="4" data-label="Nom" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="5" data-label="Catégorie" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="6" data-label="Prix HT (€)" role="cell" class="">
                                                <div>0,00&nbsp;€</div>
                                            </td>
                                            <td aria-colindex="7" data-label="Coût d'achat HT (€)" role="cell" class="">
                                                <div>
                                                    <div data-v-6a7eb354="" class="d-flex justify-content-center">
                                                        <i data-v-6a7eb354="" class="icon ion-ios-alert"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr tabindex="0" role="row" class="rowClass">
                                            <td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
                                                <div>
                                                    <label data-v-25adc6c0="" data-v-6a7eb354="" class="padding vue-js-switch">
                                                        <input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> 
                                                        <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(191, 203, 217); border-radius: 9px;">
                                                            <div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(3px, 3px, 0px);">

                                                            </div>

                                                        </div> <!---->
                                                    </label>

                                                </div>
                                            </td>
                                            <td aria-colindex="2" data-label="Référence" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="3" data-label="" role="cell" class="">
                                                <div>
                                                    <span data-v-6a7eb354="" class="product_image"><!----></span>
                                                </div>
                                            </td>
                                            <td aria-colindex="4" data-label="Nom" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="5" data-label="Catégorie" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="6" data-label="Prix HT (€)" role="cell" class="">
                                                <div>0,00&nbsp;€</div>
                                            </td>
                                            <td aria-colindex="7" data-label="Coût d'achat HT (€)" role="cell" class="">
                                                <div>
                                                    <div data-v-6a7eb354="" class="d-flex justify-content-center">
                                                        <i data-v-6a7eb354="" class="icon ion-ios-alert"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr tabindex="0" role="row" class="rowClass">
                                            <td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
                                                <div>
                                                    <label data-v-25adc6c0="" data-v-6a7eb354="" class="padding vue-js-switch">
                                                        <input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> 
                                                        <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(191, 203, 217); border-radius: 9px;">
                                                            <div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(3px, 3px, 0px);">

                                                            </div>

                                                        </div> <!---->
                                                    </label>

                                                </div>
                                            </td>
                                            <td aria-colindex="2" data-label="Référence" role="cell" class="">
                                                <div>

                                                </div>
                                            </td>
                                            <td aria-colindex="3" data-label="" role="cell" class="">
                                                <div>
                                                    <span data-v-6a7eb354="" class="product_image"><!---->
                                                    </span>
                                                </div>
                                            </td>
                                            <td aria-colindex="4" data-label="Nom" role="cell" class="">
                                                <div>

                                                </div>
                                            </td>
                                            <td aria-colindex="5" data-label="Catégorie" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="6" data-label="Prix HT (€)" role="cell" class="">
                                                <div>0,00&nbsp;€</div>
                                            </td>
                                            <td aria-colindex="7" data-label="Coût d'achat HT (€)" role="cell" class="">
                                                <div>
                                                    <div data-v-6a7eb354="" class="d-flex justify-content-center">
                                                        <i data-v-6a7eb354="" class="icon ion-ios-alert"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr tabindex="0" role="row" class="rowClass">
                                            <td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
                                                <div>
                                                    <label data-v-25adc6c0="" data-v-6a7eb354="" class="padding vue-js-switch">
                                                        <input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> 
                                                        <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(191, 203, 217); border-radius: 9px;">
                                                            <div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(3px, 3px, 0px);">

                                                            </div>

                                                        </div> <!---->
                                                    </label>

                                                </div>
                                            </td>
                                            <td aria-colindex="2" data-label="Référence" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="3" data-label="" role="cell" class="">
                                                <div><span data-v-6a7eb354="" class="product_image"><!----></span>
                                                </div>
                                            </td>
                                            <td aria-colindex="4" data-label="Nom" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="5" data-label="Catégorie" role="cell" class="">
                                                <div></div>
                                            </td>
                                            <td aria-colindex="6" data-label="Prix HT (€)" role="cell" class="">
                                                <div>0,00&nbsp;€</div>
                                            </td>
                                            <td aria-colindex="7" data-label="Coût d'achat HT (€)" role="cell" class="">
                                                <div>
                                                    <div data-v-6a7eb354="" class="d-flex justify-content-center">
                                                        <i data-v-6a7eb354="" class="icon ion-ios-alert"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> <!---->
                            </div>
                        </div>
                    </div> 
                    <div data-v-6a7eb354="" class="row mt-4 mb-4">
                        <div data-v-6a7eb354="" class="col-12 center">
                            <div data-v-6a7eb354="" class="card shadow">
                                <span data-v-6a7eb354="">
                                    0
                                    -
                                    50 /
                                    1102
                                </span>
                            </div>
                        </div>
                    </div> 
                    <div data-v-6a7eb354="" class="row mb-12 mb-4 d-none d-lg-flex justify-content-center">
                        <div data-v-6a7eb354="" class="col-4 d-flex justify-content-center">
                            <ul data-v-6a7eb354="" role="menubar" aria-disabled="false" aria-label="Pagination" class="justify-content-center pagination b-pagination pagination-md">
                                <li role="none presentation" class="page-item disabled">
                                    <span class="page-link">«</span>
                                </li>
                                <li role="none presentation" class="page-item disabled">
                                    <span class="page-link">‹</span>
                                </li><!---->
                                <li role="none presentation" class="page-item active">
                                    <a role="menuitemradio" aria-label="Go to page 1" aria-checked="true" aria-posinset="1" aria-setsize="23" tabindex="0" target="_self" href="#" class="page-link">1</a>
                                </li>
                                <li role="none presentation" class="page-item">
                                    <a role="menuitemradio" aria-label="Go to page 2" aria-checked="false" aria-posinset="2" aria-setsize="23" tabindex="-1" target="_self" href="#" class="page-link">2</a>
                                </li>
                                <li role="none presentation" class="page-item">
                                    <a role="menuitemradio" aria-label="Go to page 3" aria-checked="false" aria-posinset="3" aria-setsize="23" tabindex="-1" target="_self" href="#" class="page-link">3</a>
                                </li>
                                <li role="none presentation" class="page-item d-none d-sm-flex">
                                    <a role="menuitemradio" aria-label="Go to page 4" aria-checked="false" aria-posinset="4" aria-setsize="23" tabindex="-1" target="_self" href="#" class="page-link">4</a>
                                </li>
                                <li role="separator" class="page-item disabled d-none d-sm-flex">
                                    <div class="page-link">…</div>
                                </li>
                                <li role="none presentation" class="page-item">
                                    <a role="menuitem" tabindex="-1" aria-label="Go to next page" target="_self" href="#" class="page-link">›</a></li>
                                <li role="none presentation" class="page-item">
                                    <a role="menuitem" tabindex="-1" aria-label="Go to last page" target="_self" href="#" class="page-link">»</a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                    <div data-v-7a948cd5="" data-v-6a7eb354="" class="w_modal_as">
                        <div id="__BVID__57___BV_modal_outer_" style="position: absolute; z-index: 2000;"><div role="dialog" tabindex="-1" aria-hidden="true" class="modal fade" id="__BVID__57" style="display: none;"><div class="modal-dialog modal-md modal-dialog-centered modal-lg modal-dialog-scrollable"><div role="document" class="modal-content" id="__BVID__57___BV_modal_content_" aria-labelledby="__BVID__57___BV_modal_header_" aria-describedby="__BVID__57___BV_modal_body_"><header class="modal-header" id="__BVID__57___BV_modal_header_"><h5 class="modal-title">Filtres avancés</h5><button type="button" aria-label="Close" class="close">×</button></header><div class="modal-body" id="__BVID__57___BV_modal_body_"><div data-v-7a948cd5="" class="advanced-search"><div data-v-7a948cd5="" class="row"><div data-v-7a948cd5="" class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12"><div data-v-7a948cd5="" role="group" class="form-group" id="__BVID__59" aria-labelledby="__BVID__59__BV_label_" aria-describedby="__BVID__59__BV_description_"><label for="input-undefined" class="d-block" id="__BVID__59__BV_label_">Montant TTC (€)</label><div><!----><!----><!----><small tabindex="-1" class="form-text text-muted" id="__BVID__59__BV_description_">Montant TTC (miminum et maximum)</small></div></div></div><div data-v-7a948cd5="" class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-12"><div data-v-7a948cd5="" role="group" class="form-group" id="__BVID__60" aria-labelledby="__BVID__60__BV_label_"><label for="input-undefined" class="d-block" id="__BVID__60__BV_label_">Categorie</label>
                                                            <div><!----> 
                                                                <select data-v-7a948cd5="" class="custom-select" id="__BVID__61">
                                                                    <option value="">--Toutes--</option>
                                                                    <option value="60e34d8739a31f060268e5da">MARIAGE</option>
                                                                </select> <!----> <!----> <!----><!----><!----><!---->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <p data-v-7a948cd5="" class="d-flex justify-content-between mt-2 mb-0">
                                                    <a data-v-7a948cd5="" href="#" class="btn btn-outline-danger">Réinitialiser les filtres</a> 
                                                    <button data-v-7a948cd5="" class="btn btn-primary hidden-desktop">Appliquer les filtres</button>
                                                </p>
                                            </div>

                                        </div><!---->
                                    </div>
                                </div>
                            </div><!----><!---->
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="<?php echo url ?>static/js/runtime.c1d165a852df9a0e8540.js"></script>
        <script src="<?php echo url ?>static/js/vendor.e5557c3672a5bb7582ed.js"></script>
        <script src="<?php echo url ?>static/js/app.62ca812e47f538fee0f3.js"></script>

        <script id="recaptcha" defer="defer" src="https://www.google.com/recaptcha/api.js?render=6Ldr3HcUAAAAAIVP6AqxeGPY8TOahw_bKnrhi7df"></script>
        <script defer="defer" src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script charset="utf-8" src="<?php echo url ?>static/js/47.033ed7d2c59cf39a92c0.js"></script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalPageSDKES6.js?v=151505" async=""></script>
        <script charset="utf-8" src="<?php echo url ?>static/js/4.270b6a4056efb0e6cd10.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>




    </body>
</html>