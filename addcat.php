
<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
if (isset($_POST['add'])) {
    $cat = $_POST['cat'];
    $cat2 = $_POST['cat2'];
    mysqli_query($link, "insert into cat (cat, cat_parent)values('" . $cat . "','" . $cat2 . "')");
    echo '<script>window.location=("categorie.php") </script>';
}
?>
<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title> Ajouter Catégorie </title>
        <meta name="description" >
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
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
                                    <h1 data-v-1b70f5f4="" class="title no-margin-b">Ajouter une catégorie</h1> 
                                </div> 
                                <div data-v-1b70f5f4="" role="group" class="form-group form-horizontal" id="__BVID__214" aria-labelledby="__BVID__214__BV_label_" aria-describedby="__BVID__214__BV_description_">
                                    <label for="productCategoryName" class="d-block" id="__BVID__214__BV_label_">Nom</label>
                                    <div>
                                        <input data-v-1b70f5f4="" id="productCategoryName" type="text" name="cat" class="form-control" autofocus="autofocus" aria-describedby="__BVID__214__BV_description_ __BVID__214__BV_description_"><!----><!---->
                                        <small tabindex="-1" class="form-text text-muted" id="__BVID__214__BV_description_">Nom de la catégorie</small>
                                    </div>
                                </div> 
                                <div data-v-1b70f5f4="" role="group" class="form-group form-horizontal" id="__BVID__216" aria-labelledby="__BVID__216__BV_label_" aria-describedby="__BVID__216__BV_description_">
                                    <label for="ProductCategoryParentCategory" class="d-block" id="__BVID__216__BV_label_">Catégorie parente</label>
                                    <div>
                                        <select data-v-1b70f5f4="" class="mb-3 custom-select" name="cat2" id="__BVID__217">
                                            <option data-v-1b70f5f4="" value=""></option> 
                                            <?php
                                            $cat = mysqli_query($link, "SELECT * FROM `cat`");
                                            while ($cat_data = mysqli_fetch_array($cat)) {
                                                ?>
                                                <option data-v-1b70f5f4="" value="<?php echo $cat_data['id']; ?>"><?php echo $cat_data['cat']; ?></option>
                                            <?php } ?>
                                        </select><!----><!---->
                                        <small tabindex="-1" class="form-text text-muted" id="__BVID__216__BV_description_">Un lien de parenté en fera une sous catégorie</small>
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
        </div>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    </body>
</html>