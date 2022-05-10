
<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
if (isset($_POST['add'])) {
    $nom = $_POST['nom'];
    $mob = $_POST['mob'];
    mysqli_query($link, "INSERT INTO `founiseur`( `nom`, `mob`) VALUES('" . $nom . "','" . $mob . "')");
    echo '<script>window.location=("fournisseur.php") </script>';
}
$m = 2;
?>
<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title> Ajouter Fournisseur </title>
        <meta name="description" >
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/favicon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style2.css" rel="stylesheet">
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

                <div data-v-1b70f5f4="" class="container-fluid">
                    <form data-v-1b70f5f4="" method="post" class="">
                        <div data-v-1b70f5f4="" class="card">
                            <div data-v-1b70f5f4="" class="card-body">
                                <div data-v-1b70f5f4="" class="w_parameters_preheader">
                                    <h1 data-v-1b70f5f4="" class="title no-margin-b">Ajouter Fourniseur </h1> 
                                </div> 
                                <div data-v-1b70f5f4="" role="group" class="form-group form-horizontal" id="__BVID__214" aria-labelledby="__BVID__214__BV_label_" aria-describedby="__BVID__214__BV_description_">
                                    <label for="nom" class="d-block" id="__BVID__214__BV_label_">Nom de Fournisseur</label>
                                    <div>
                                        <input data-v-1b70f5f4="" id="nom" type="text" name="nom" class="form-control">
                                    </div>
                                </div> 
                                <div data-v-1b70f5f4="" role="group" class="form-group form-horizontal" id="__BVID__214" aria-labelledby="__BVID__214__BV_label_" aria-describedby="__BVID__214__BV_description_">
                                    <label for="mob" class="d-block" id="__BVID__214__BV_label_">Téléphone</label>
                                    <div>
                                        <input data-v-1b70f5f4="" id="mob" type="text" name="mob" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12 col-sm-12 col-lg-12" style="text-align:center ;margin-bottom: 32px" ><!---->
                                    <button data-v-77800238="" style="border: 1px solid;" type="submit" name="add" class="btn btn-default">Enregistrer</button>
                                </div> 
                            </div>
                            <!----><!---->
                        </div>
                    </form>
                </div>
            </main>
            <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" async=""></script>
            <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" async=""></script>
            <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" async=""></script>
            <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>
            <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



    </body>
</html>