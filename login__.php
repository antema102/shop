<?php
include 'db.php';
$b = false;
$b2 = false;
$b3 = false;
if (isset($_POST['conn'])) {
    
    
    
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $verif = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `user` WHERE email ='" . $email . "' "));
    if ($verif == 1) {
        $user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE  email ='" . $email . "'"))or die(mysqli_error($link));
        if ($user['statut'] == 0) {
            echo '<script>window.location = ("' . url . 'userverif.php?email=' . $user['token'] . '  ")</script>';
        }



        if ($pwd == $user['pwd']) {
            if ($user['etat'] != 1) {
                $_SESSION['user'] = $user['email'];

                echo '<script>window.location = ("' . url . '")</script>';
            } else {
                $b3 = true;
            }
        } else {
            $b = true;
        }
    } else {
        $b2 = true;
    }
}
?>

<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Connexion</title>
        <meta name="description" >
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">

        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/styleac.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">

        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    </head>
    <body lang="fr">
        <section class="LayoutDefault">
            <div class="row cover-full">
                <div class="LayoutDefault__panel col-lg-4 left">
                    <div class="inner-content"><img src="" alt="" class="logo-home">

                        <h1 class="header-text"><span class="wuro-highlight">Shop</span> Passion Decor</h1>

                    </div> 
                    <img src="<?php echo url ?>/static/gerer-entreprise.png" alt="Inscription" class="illu-center">
                </div> 
                <main class="LayoutDefault__main col-lg-8 col-sm-12 right">
                    <div data-v-1f29256e="" class="card-form">
                        <p data-v-1f29256e="" class="d-lg-none d-xl-none mb-4 text-center">
                            <img data-v-1f29256e="" width="140" src="<?php echo url ?>static/logo.jpg" alt="">
                        </p> 
                        <div data-v-1f29256e="">
                            <h1 data-v-1f29256e="" class="header-form c_t_phone">Connexion</h1> 
                            <p data-v-1f29256e="">Logiciel de 
                                gestion d'entreprise 
                            </p>
                        </div> 
                        <div data-v-1f29256e="" style="text-align: center">
                            <?php if ($b3) { ?>
                                <button data-v-1f29256e="" style="text-align: center;margin: 16px;" class="btn btn-block btn-danger margin-t-2x mg-center-phone">
                                    <i class="fas fa-exclamation-triangle"></i> Votre compte est désactivé
                                </button>
                            <?php } ?>
                            <?php if ($b2) { ?>
                                <button data-v-1f29256e="" style="text-align: center;margin: 16px;" class="btn btn-block btn-danger margin-t-2x mg-center-phone">
                                    <i class="fas fa-exclamation-triangle"></i>  Email invalide
                                </button>
                            <?php } ?>
                            <?php if ($b) { ?>
                                <button data-v-1f29256e="" style="text-align: center;margin: 16px;" class="btn btn-block btn-danger margin-t-2x mg-center-phone">
                                    <i class="fas fa-exclamation-triangle"></i>  Mot de passe incorrect
                                </button>
                            <?php } ?>
                        </div>
                        <form data-v-1f29256e="" method="post">
                            <div data-v-1f29256e="" class="form-group">
                                <label data-v-1f29256e="" for="inputEmail">Adresse e-mail</label> 
                                <input data-v-1f29256e="" type="email" required="" name="email" id="inputEmail" placeholder="E-mail" class="form-control">
                            </div> 
                            <div data-v-1f29256e="" class="form-group relative ">
                                <label data-v-1f29256e="" for="inputPassword">Mot de passe</label> 
                                <input data-v-1f29256e="" id="inputPassword" required="" name="pwd" placeholder="Mot de passe" type="password" class="form-control">
                                <i data-v-1f29256e="" class="eye ion-ios-eye"></i>
                            </div> 
                            <button data-v-1f29256e="" aria-label="connection" name="conn" type="submit" class="btn btn-block btn-primary margin-t-2x mg-center-phone">
                                Connexion
                            </button> 
                        </form> 
                        <p data-v-1f29256e="" class="margin-t-2x c_t_phone">
                            <a data-v-1f29256e="" href="mod_ob.php" class="wuro-link">J'ai oublié mon mot de passe</a>
                        </p>
                    </div>
                </main>
            </div>
        </section>
        <script
        src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" async=""></script>





    </body>
</html>
