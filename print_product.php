<?php
include 'db.php';
$m = 5;
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$id = $_GET['id'];
$facture = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `facture` WHERE `id` =" . $id));
$client = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `id` =" . $facture['client']));

?>
<html lang="fr" > 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Detail Facture </title>
        <meta name="description" >
        <link href="data.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="<?php echo url ?>static/dev.css?v=1.0" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/styles.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>        


          <script src="vendor/vendor/jsPDF-1.3.2/dist/jspdf.debug.js"></script>
          <script src="vendor/vendor/jsPDF-1.3.2/libs/html2pdf.js"></script>
		  
		<link href="dist/assets/jquery.signaturepad.css" rel="stylesheet">
        <script src="dist/assets/jquery.signaturepad.js"></script>
        <script>
            $(document).ready(function() {
            $('.sigPad').signaturePad();

            });
            function help() {
                var sig = document.querySelector(".output").value;
                if(sig !== ""){
                    var api = $('.sigPad').signaturePad();
                    var imgCode = api.getSignatureImage();

                    document.getElementById("BtnSign").style.display='none';
                
                    var dateSign = document.getElementById("dateSign");
                    var dateS = new Date().toLocaleString('de-CH');
                    dateSign.textContent = dateS;

                    var img = document.getElementById("sigImage");
                    img.src = imgCode;

                    var idFac = document.getElementById("idFac").value;      
                    var name = "facture" + idFac;
                    var source = "facture";
                
                    $.ajax({
                    method: 'POST',
                    url: 'photo_upload.php',
                    data: {
                        photo: imgCode,
                        name: name
                    }
                    });
                    $.ajax({
                        type: "POST",
                        url: "sign.php",
                        data: {
                            idFac: idFac,
                            dateS: dateS,
                            name: name,
                            source: source
                        }
                        }); 
                }
            }
        </script>
        <script src="dist/assets/json2.min.js"></script>  
        
        <style>
            button:hover{
                color :#FFFFFF !important;
                border:1px solid #28CCBF !important;
                border-color: #28CCBF !important;
                background: #28CCBF !important;
            }
            .content{
                margin-left: 30px!important;
                margin-right: 30px!important;
            }
            #numdev:hover{
                border: none;

            }

            @media screen and (max-width: 758px){ 
                #calcul{
                    padding-right: 83px !important;
                }
                #cnt{
                    padding-right: 83px !important;
                }

                .content {
                    height: calc(29.7cm - 4cm) !important;
                    margin: 1.2cm !important;
                    -webkit-transform: scale(0.5)!important;
                    transform: scale(0.5)!important;
                    -webkit-transform-origin: left top!important;
                    transform-origin: left top!important;
                    -moz-transform: scale(0.5);
                    -moz-transform-origin: left top!important;
                }
            }
        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include ('header.php'); ?>
            </div> 
            <main class="main">
                <div data-v-561bb412="" class="main-quote">

                    <div data-v-561bb412="" class="menu-bar fab" style="left:90px; padding-bottom: 24px;">
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                          
                            <div class="col-md-4" style="text-align:left;">
                                <a href="#" onclick="javascript:window.print()">
                                   <svg 
						xmlns="http://www.w3.org/2000/svg" 
						version="1.1" 
						xmlns:xlink="http://www.w3.org/1999/xlink" 	
						xmlns:svgjs="http://svgjs.com/svgjs" 
						height="1em" 
						width="1em" 
						class="iconify iconify--fa-solid" 
						role="img" aria-hidden="true" xmlns:xlink="http://www.w3.org/1999/xlink"
						x="0" y="0" 
						viewBox="0 0 512 512" preserveAspectRatio="xMidYMid meet" 
					style="cursor: pointer; color: rgb(40, 181, 191); width: 35px; height: 35px;"
>
<g><linearGradient 
xmlns="http://www.w3.org/2000/svg" 
id="SVGID_1_" 
gradientUnits="userSpaceOnUse" x1="256" x2="256" y1="512" y2="0">
<stop stop-opacity="1" stop-color="#205459" offset="0">
</stop><stop stop-opacity="1" stop-color="#205459" offset="0"></stop></linearGradient>
<g xmlns="http://www.w3.org/2000/svg"><g><g>
<path d="m211 392h90c8.284 0 15-6.716 15-15s-6.716-15-15-15h-90c-8.284 0-15 6.716-15 15s6.716 15 15 15zm210-150c-8.284 0-15 6.716-15 15s6.716 15 15 15 15-6.716 15-15-6.716-15-15-15zm-210 210h90c8.284 0 15-6.716 15-15s-6.716-15-15-15h-90c-8.284 0-15 6.716-15 15s6.716 15 15 15zm240-300h-75v-77c0-41.355-33.645-75-75-75h-150c-8.284 0-15 6.716-15 15v137h-75c-24.813 0-45 20.187-45 45v150c0 24.813 20.187 45 45 45h75v105c0 8.284 6.716 15 15 15h210c8.284 0 15-6.716 15-15v-105h75c24.813 0 45-20.187 45-45v-150c0-24.813-20.187-45-45-45zm-106.939-90.061c-4.136-1.257-8.52-1.939-13.061-1.939h-15v-15c0-4.541-.682-8.925-1.939-13.061 14.327 4.354 25.646 15.674 30 30zm-178.061-31.939h105c8.271 0 15 6.729 15 15v30c0 8.284 6.716 15 15 15h30c8.271 0 15 6.729 15 15v47h-180zm180 452h-180v-150h180zm120-135c0 8.271-6.729 15-15 15h-75v-30h15c8.284 0 15-6.716 15-15s-6.716-15-15-15h-270c-8.284 0-15 6.716-15 15s6.716 15 15 15h15v30h-75c-8.271 0-15-6.729-15-15v-150c0-8.271 6.729-15 15-15h390c8.271 0 15 6.729 15 15zm-105-105c-8.284 0-15 6.716-15 15s6.716 15 15 15 15-6.716 15-15-6.716-15-15-15z" fill="url(#SVGID_1_)" data-original="url(#SVGID_1_)" style=""></path></g></g></g></g>
</svg>
                                </a>
                            </div>
							
  <div class="col-md-2" data-bs-toggle="modal" data-bs-target="#emailForm" id="email" style="text-align:left;">
    <a href="/produit.php" style="color:#205459">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="40" height="40" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M16 2C8.2 2 2 8.2 2 16s6.2 14 14 14s14-6.2 14-14S23.8 2 16 2zm0 26C9.4 28 4 22.6 4 16S9.4 4 16 4s12 5.4 12 12s-5.4 12-12 12z" fill="#205459"/><path d="M21.4 23L16 17.6L10.6 23L9 21.4l5.4-5.4L9 10.6L10.6 9l5.4 5.4L21.4 9l1.6 1.6l-5.4 5.4l5.4 5.4z" fill="#205459"/></svg>
Fermer
</a>
<style type="text/css">
.etiquette svg {
	width: 180px!important;
	height: 40px!important;
}
    .etiquette
    {
        border: 2px dotted #999999;
        padding: 2px;
        text-align: center;
    }
    .etiquette h2
    {
        font-size: 14px;
        font-weight: bold;
    }
    div#contentEmail {
        border: 0px !important;
        }

    @media print {
   
        .header
        {
            display: none !important;
        } 
        .logout
        {
            display: none  !important;
        }
         .menu
        {
            display: none  !important;
        } 

        .menu-bar
        {
            display: none  !important;
        }
        .actions.left-menu {
            display: none !important;
        }
        #__w_mobile_account_modal
        {
            display: none !important;
        }
        #__w_mobile_footer
        {
            display: none !important;
        }
        .menu-bar.fab {
           display: none !important;
        }
		header.header {
			display: none !important;
		}
		main.main {
			padding: 0px !important;
		} 
        .etiquette
        {
			border: 2px dotted #999999;
			padding: 2px;
			width: 50% !important;
			text-align: center;
        }
		div#contentEmail {
			margin: 0px !important;
		}
        div#printpdf {
            padding-top: 150px !important;
          
            min-height: 1403px !important;
            max-height: 1403px !important;
            margin: 0px !important;   
        }
    }
</style>
                  </div>

                        </div>
                    </div>
                    

                      
                            <?php
							 require 'vendor/vendor/autoload.php';

                            

                            
                                $count=0;                               
							$products = mysqli_query($link, "SELECT * FROM `produit`");
							while($row=mysqli_fetch_array($products))
							{

                            if($count%12==0)
                            {
                                if($count!=0)
                                    echo '</div></div></div>';
                                
                                echo '
                                <div data-v-561bb412="" data-id="1" id="printpdf" size="A4" class="page narrow top-shadow bottom-shadow">
                                <div data-v-561bb412="" class="content" id="contentEmail">
                                <div class="row">';

                            }
								
							$generator = new Picqer\Barcode\BarcodeGeneratorSVG();
							
							    echo '<div class="col-md-4 etiquette" style="height: 300px;">';
								if(($row['img'] == "http://passiondecor.net/img/p/0.jpg") || ($row['img'] =="http://www.shoppassiondecor.fr/photos/") || ($row['img'] =="") || ($row['img'] =="http://www.shoppassiondecor.fr/images/")){
								   echo '<div style="height: 90px;"><img style="width: 150px;padding-top: 20px;" src="http://www.shoppassiondecor.fr/static/logo.jpg" /></div>';
								} else {
								   echo '<img style="width: 120px;height: 120px;" src='.$row['img'].' />'; 
								}
								echo '<br>';
								echo '<br>';
								echo $generator->getBarcode($row['code_a_barre'], $generator::TYPE_CODE_128,3,100);
								echo '<h6>'.$row['code_a_barre'].'</h6>';
								echo '<h6>'.$row['nom'].'</h6>';
								echo '<tr data-v-248579a2="">';
								echo '<td><h4><strong>'.$row['prix_ht'].' € HT</strong></h4>';
								echo '</td>';
 
								echo '</tr>';
								echo '</div>';
                                $count++;
							}
							
							
							
							
							
                                                    
                                                    
                                                
							
							
                        ?>
                           </div>

                            

                        </div>
                    </div>
                </div>
                <?php include('emailForm.php') ?>
				<?php include('modalSignature.php') ?>
            </main>

        </div>

        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>


        <script>
                    $(document).ready(function(){
                        $('#emailForm').on('show.bs.modal', function (e) {  
                            var clientEmail = document.getElementById("contact_email").innerText;
                            document.getElementById("mailto").value = clientEmail;
                        });
                    });

                    function sendEmail() {
                    
                        var protocol = window.location.protocol;
                        var host = window.location.host;
                        var fileName = window.location.pathname;
                        var fileId = window.location.search;
                        var emailClient = document.getElementById("mailto").value;
                        if(emailClient) {
                            $.ajax({
                                type: "POST",
                                url: "sendEmail.php?host=" + host + "&fileName=" + fileName + "&protocol=" + protocol+ "&fileId=" + fileId + "&emailClient=" + emailClient,
                                success: function (data) {
                                    
                                }
                            }); 
                            $('#emailForm').modal('hide');
                            $(".modal-body :input").val("");
                            $('#emailForm .modal-body p').remove();
                        } else {
                            $('#emailForm footer').before().before('<p class="error" style="color:red">Veuillez saisir le destinataire!</p>');     
                        }
                    }
                    

                                                function livinfo() {
                                                    var adrliv = document.getElementById("adrliv").value;
                                                    var cp = document.getElementById("cp").value;
                                                    var villel = document.getElementById("villel").value;
                                                    var paysl = document.getElementById("paysl").value;
                                                    var mol = document.getElementById("mol").value;
                                                    var frl = document.getElementById("frl").value;




                                                    $.ajax({
                                                        type: "POST",
                                                        url: "infoliv.php?adrliv=" + adrliv + "&cp=" + cp + "&villel=" + villel + "&paysl=" + paysl + "&mol=" + mol + "&frl=" + frl,
                                                        success: function (data) {
                                                            document.getElementById("infol").innerHTML = data;
                                                        }
                                                    }
                                                    );
                                                }
                                                function calculRemise() {
                                                    var ht = document.getElementById("productPriceHT").value;
                                                    var tva = document.getElementById("__BVID__194").value;
                                                    console.log(tva);
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "calcultva.php",
                                                        data: {
                                                            ht: ht,
                                                            remise: tva
                                                        },

                                                        success: function (data) {
                                                            document.getElementById("blockt").innerHTML = data;


                                                        }
                                                    });

                                                }


                                                function func() {
                                                    document.getElementById("adr").style.display = "none";
                                                    document.getElementById("adr2").style.display = "contents";
                                                }

                                                function func2() {
                                                    document.getElementById("adr").style.display = "contents";
                                                    document.getElementById("adr2").style.display = "none";
                                                }
                                                function titref() {
                                                    var title = document.getElementById("titlec").value;
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "title.php?title=" + title,
                                                        success: function (data) {
                                                            document.getElementById("title").innerHTML = data;
                                                        }
                                                    });
                                                }


                                                function commf() {
                                                    var commc = document.getElementById("commc").value;
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "commc.php?commc=" + commc,
                                                        success: function (data) {
                                                            document.getElementById("comm").innerHTML = data;
                                                        }
                                                    });
                                                }

                                                function clientf() {
                                                    var client = document.getElementById("devc").value;
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "clientinfo.php?client=" + client,
                                                        success: function (data) {
                                                            document.getElementById("client").innerHTML = data;
                                                        }
                                                    });
                                                }


                                                function calcul() {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "calcul.php",
                                                        success: function (data) {
                                                            document.getElementById("calcul").innerHTML = data;
                                                        }
                                                    });
                                                }

                                                function devinfo() {
                                                    var datep = document.getElementById("datep").value;
                                                    var numb = document.getElementById("numb").value;
                                                    if (document.getElementById("ver").checked == true) {
                                                        var ver = 1;
                                                    }

                                                    if (document.getElementById("ch").checked == true) {
                                                        var ch = 2;
                                                    }
                                                    if (document.getElementById("cb").checked == true) {
                                                        var cb = 3;
                                                    }
                                                    if (document.getElementById("espece").checked == true) {
                                                        var espece = 4;
                                                    }






                                                    $.ajax({
                                                        type: "POST",
                                                        url: "infodepaiment.php?datep=" + datep + "&numb=" + numb + "&ver=" + ver + "&ch=" + ch + "&cb=" + cb+ "&espece=" + espece,
                                                        success: function (data) {
                                                            document.getElementById("infop").innerHTML = data;
                                                        }
                                                    }
                                                    );
                                                }
                                                function prdf() {
                                                    var produit = document.getElementById("produit").value;
                                                    var qte = document.getElementById("qte").value;
                                                    var prd = document.getElementById("prdl");
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "produitinfo.php?produit=" + produit + "&qte=" + qte,
                                                        success: function (data) {
                                                            calcul();
                                                            $("#prdl").append(data);
                                                        }
                                                    });
                                                }


        </script>



        <script>
            function pdftest()
            {

                 
                document.getElementById("printpdf").style.background="#ffffff";
                document.getElementById("loadingEmail").style.display="block";


          
      setTimeout(function(){ html2canvas($("#printpdf"), {

                 onrendered: function(canvas) {         
                     var imgData = canvas.toDataURL(
                         'image/jpeg','1.0');              
                     var doc = new jsPDF("p", "px", "a4");
                     doc.context2d.pageWrapYEnabled = true;
                     var width = doc.internal.pageSize.width;    
                     var height = doc.internal.pageSize.height;
                     var pageHeight= doc.internal.pageSize.height;
                     doc.addImage(imgData, 'JPEG', 5, 5, width-10, height-10);
                    // doc.addPage();
                    // doc.addImage(imgData2, 'JPEG', 5, 5,width-10, height-10);
                     //doc.addPage();
                     //doc.addImage(imgData3, 'JPEG', 5, 5,width-10, height-405); 
                    // doc.save('test.pdf');
                     var PDF = doc.output('datauristring');
                      var emailClient = document.getElementById("mailto").value;
                      var numFact="<?php echo $facture['num'] ?>";
                        
                        $.ajax({
                            type: "POST",
                            url: "mail.php",
                            data: {pdfdata: PDF, emailClient: emailClient, numFact:numFact},   // <== change is here
                            success: function(msg){
                             // alert(msg);
                               document.getElementById("loadingEmail").style.display="none";
                               document.getElementById("messageEmail").innerHTML='<div class="alert alert-success" role="alert">Facture a été envoyée avec succès</div>';
                             //  $('#emailForm').modal('hide');

                            },
                              error: function(){
                                document.getElementById("messageEmail").innerHTML='<div class="alert alert-danger" role="alert">Une erreur s\'est produite lors de l\'envoi de l\'email</div>';
                              }
                        });


                     

                    
                 }
             }); }, 500);
    }
     </script>
    </body>
</html>