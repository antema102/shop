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
        <title>Ajouter Ficher</title>
        <meta name="description" >
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
                text-decoration: none;
            }
        </style>
    </head>
    <body lang="fr" cz-shortcut-listen="true">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> 
            <main class="main">

                <div data-v-6d7f4b5b="" class="container-fluid">
                    <form action="adressupd.php" method="post" enctype="multipart/form-data">
                        <div data-v-677cdf66="" class="card">
                            <div data-v-677cdf66="" class="card-body">
                                <div data-v-677cdf66="" class="w_parameters_preheader">
                                    <h1 data-v-677cdf66="" class="title no-margin-b">Importer des Clients Adresses</h1>
                                </div> 
                                <div data-v-677cdf66="" class="form-horizontal">
                                    <div data-v-677cdf66="" class="vue-form-wizard md">
                                        <div class="wizard-navigation">
                                            <div class="wizard-tab-content"> 
                                                <div data-v-677cdf66="" role="tabpanel" id="Dépotdufichier1" aria-labelledby="step-Dépotdufichier1" class="wizard-tab-container" style=""><div data-v-677cdf66="" class="form-group">
                                                        Fichier d'exemple :
                                                        <a data-v-677cdf66="" download="" href="<?php url ?>files/address.csv" class="wuro-link">Télécharger le fichier modèle</a>
                                                    </div> 
                                                    <div data-v-677cdf66="" role="alert" aria-live="polite" aria-atomic="true" class="alert alert-info" varaint="info">Vous pouvez importer vos produits  grâce à un fichier CSV.<br> Pour cela il vous suffit de déposer le fichier que vous souhaitez importer dans le champ ci-dessous. Pour connaitre le type de données attendu, un fichier d'exemple est disponible ci-dessus, si les noms des colonnes de votre fichier ne sont pas les mêmes, vous pourrez paramétrer les options d'export sur le prochain écran.</div> 
                                                    <fieldset data-v-677cdf66="" class="form-group" name="modele" id="__BVID__148" aria-labelledby="__BVID__148__BV_label_">
                                                        <legend tabindex="-1" class="col-form-label pt-0" id="__BVID__148__BV_label_">Fichier</legend>
                                                        <div tabindex="-1" role="group" aria-labelledby="__BVID__148__BV_label_">
                                                            <div data-v-677cdf66=""  name="modele" class="custom-file b-form-file" id="__BVID__149__BV_file_outer_">
                                                                <input type="file" accept=".csv" class="custom-file-input" name="modele" id="modele">
                                                                <label data-browse="Parcourir..." class="custom-file-label" for="modele">Choisissez votre fichier</label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div> 


                                            </div>
                                            <div class="wizard-card-footer clearfix">
                                                <div class="wizard-footer-right"> 
                                                    <span role="button" tabindex="0">
                                                        <button  type="submit" class="wizard-btn" style="background-color: rgb(32, 181, 171); border-color: rgb(32, 181, 171); color: white;">
                                                            Suivant
                                                        </button>
                                                    </span>

                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    </body>
</html>