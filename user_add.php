<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
require 'phpmailer/PHPMailerAutoload.php';

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$user_l = mysqli_fetch_array(mysqli_query($link, " SELECT * FROM `user` where email='" . $_SESSION['user'] . "' "));
?>


<html lang="fr" > 
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Ajouter salarier</title>
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
                <div class="params-component" data-v-50f926f1="">
                    <div class="_w_parameters_containers invite-user">
                        <h2 class="_w_parameters_headers">Inviter un utilisateur</h2> 
                        <div class="_w_parameters_content">
                            <?php
                            if (isset($_POST['cree'])) {
                                $nom = $_POST['nom'];
                                $prenom = $_POST['prenom'];
                                $email = $_POST['email'];
                                $role = $_POST['role'];
                                $token = randomPassword();
                                $ver = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `user` where email='" . $email . "' "));
                                if ($ver == 0) {
                                    $invit = mysqli_query($link, "insert into user (email,role,ivit_par,nom,prenom,token)values( '" . $email . "','" . $role . "','" . $user_l['id'] . "' ,'" . $nom . "','" . $prenom . "','" . $token . "' )");

                                    $body = '<html>
    <head>
        <title>Votre compte sur notre plateforme a bien été créé</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table align="center" id="Table_01" width="600" height="394" border="0" cellpadding="0" cellspacing="0">
          
            <tr>
                <td>     
' . $prenom . ' ' . $nom . ' vous invite à rejoindre l\'équipe de Passion Déco.
Vous pourrez commencer à travailler avec \'équipe Passion Déco 
</td>
<td>
<a href="' . url . 'userverif.php?email=' . $token . '"><img src="' . url . 'static/acc.png" style="width:190px" alt=""></a>
</td>
            </tr>


                       
        </table>

</body>
</html>';
                                    $mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
                                    $mail->Host = 'vps-b01d645c.vps.ovh.net';  // Specify main and backup SMTP servers
                                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                    $mail->Username = 'contact@passiondecor.net';                 // SMTP username
                                    $mail->Password = '123456';                           // SMTP password
                                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                                    $mail->Port = 587;                                    // TCP port to connect to
                                    $mail->setFrom("contact@passiondecor.net");
                                    $mail->addAddress($email);  // Add a recipient
                                    $mail->addAddress('');  // Add a recipient
                                    $mail->isHTML(true);                                  // Set email format to HTML
                                    $mail->Subject = utf8_decode('Votre compte sur notre plateforme a bien été créé');
                                    $mail->Body = utf8_decode($body);
                                    if (!$mail->send()) {
                                        echo 'Message could not be sent.';
                                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                                    }
                                } else {
                                    echo '<script> alert("Email deja existe") </script>';
                                }
                            }
                            ?>

                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label for="inputCompanyName">Nom</label>
                                                    <input required = "required" type = "text" placeholder = "Nom" id = "nom" name = "nom" class = "form-control">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label for="inputCompanyName">Prénom</label>
                                                    <input required = "required" type = "text" placeholder = "Prénom" id = "prenom" name = "prenom" class = "form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <label for="inputCompanyName">E-mail de l'utilisateur</label>
                                            <input required = "required" type = "email" placeholder = "E-mail de l'utilisateur" id = "inputEmailUserInvite" name = "email" class = "form-control">
                                            <br>
                                            <label for = "inputCompanyName">Groupe de droit</label>
                                            <select class = "custom-select" name = "role" required="" id = "__BVID__102">
                                                <option value = "1">Administrateur</option>
                                                <option value = "2">Gestion</option>
                                                <option value = "3">Direction</option>
												<option value = "4">Transporteur</option>
                                            </select>

                                            <div class = "col-md-12 col-12 col-sm-12 col-lg-12" style = "text-align:center ;margin-bottom: 32px;margin-top: 32px" ><!---->
                                                <button data-v-77800238 = "" style = "border: 1px solid;" type = "submit" name = "cree" class = "btn btn-default">Inviter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class = "col-lg-6 d-flex align-items-center justify-content-center">
                                    <p class = "text-center mb-0">
                                        <img width = "350" src = "<?php echo url ?>static/inviter-utilisateur.svg" class = "img-fluid">
                                    </p>
                                </div>


                                <div class = "form-group">
                                    <label for = "inputCompanyName">Liste des invitations en cours</label>


                                    <?php
                                    $user = mysqli_query($link, "SELECT * FROM `user`");
                                    while ($data_u = mysqli_fetch_array($user)) {
                                        $add = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` where id=" . $data_u['ivit_par'] . " "));
                                        ?>
                                        <div class="flex bordered invitation">
                                            <?php
                                            if ($data_u['img'] == '') {
                                                $letter = strtoupper(substr($data_u['nom'], 0, 1));
                                                ?>
                                                <div style="text-align: center;">

                                                    <div data-v-143dd668="" class="flex">
                                                        <span data-v-143dd668="" class="btbt">
                                                            <span data-v-143dd668="">
                                                                <span data-v-143dd668=""> <?php echo $letter ?></span>
                                                            </span>
                                                        </span> 

                                                    </div>
                                                </div>
    <?php } else { ?>
                                                <p class="avatar-container rounded-circle mr-3" style="height: 45px; width: 45px;">

                                                    <img src="<?php echo $data_u['img'] ?>" class="user-avatar img-fluid">
                                                </p> 

                                                <?php
                                            }
                                            ?>
                                            <div>


                                                <p>
                                                    <strong style="font-size: 14px;"> 
                                                        <?php
                                                        if ($data_u['statut'] == 1) {
                                                            echo 'Invitation confirmée';
                                                        } else {
                                                            echo 'Invitation en cours';
                                                        }
                                                        ?>


                                                    </strong>
                                                    <br> 
                                                    <small><?php echo $data_u['email'] ?>  invité(e) par <?php echo $add['nom'] ?></small>
                                                </p>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.js" async=""></script> 
        <script src = "https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity = "sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin = "anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" async=""></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" async=""></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" async=""></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" async=""></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>

        <link rel="stylesheet" href="dist/css/styles.css"> 

        <!-- Latest compiled JavaScript -->

        <!-- These are the necessary files for the image uploader -->
        <script src="dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>



    </body>
</htm
