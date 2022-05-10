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
        <link href="<?php echo url ?>static/dev.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/styles.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>      
        <script src="http://hongru.github.io/proj/canvas2image/canvas2image.js"></script>
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

                var img = document.getElementById("testImg");
                img.src = imgCode;
             }

                var idFac = document.getElementById("idFac").value;      
                var name = "sig" + idFac;
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
        </script>
        <script src="dist/assets/json2.min.js"></script>
        <script>
            var zkSignature = (function () {

var empty = true;

return {
    //public functions
    capture: function (){
            var parent = document.getElementById("canvas");
            parent.childNodes[0].nodeValue = "";

            var canvasArea = document.createElement("canvas");
            canvasArea.setAttribute("id", "newSignature");
            parent.appendChild(canvasArea);

            var canvas = document.getElementById("newSignature");
            var context = canvas.getContext("2d");

            if (!context) {
                throw new Error("Failed to get canvas' 2d context");
            }

            screenwidth = screen.width;

            if (screenwidth < 480) {
                canvas.width = screenwidth - 8;
                canvas.height = (screenwidth * 0.63);
            } else {
                canvas.width = 464;
                canvas.height = 200 ;
            }

            context.fillStyle = "#fff";
            context.strokeStyle = "#444";
            context.lineWidth = 1.2;
            context.lineCap = "round";

            context.fillRect(0, 0, canvas.width, canvas.height);

            context.fillStyle = "#3a87ad";
            context.strokeStyle = "#3a87ad";
            context.lineWidth = 1;
            context.moveTo((canvas.width * 0.042), (canvas.height * 0.7));
            context.lineTo((canvas.width * 0.958), (canvas.height * 0.7));
            context.stroke();

            context.fillStyle = "#fff";
            context.strokeStyle = "#444";

            var disableSave = true;
            var pixels = [];
            var cpixels = [];
            var xyLast = {};
            var xyAddLast = {};
            var calculate = false;
            //functions
            {
                function remove_event_listeners() {
                    canvas.removeEventListener('mousemove', on_mousemove, false);
                    canvas.removeEventListener('mouseup', on_mouseup, false);
                    canvas.removeEventListener('touchmove', on_mousemove, false);
                    canvas.removeEventListener('touchend', on_mouseup, false);

                    document.body.removeEventListener('mouseup', on_mouseup, false);
                    document.body.removeEventListener('touchend', on_mouseup, false);
                }

                function get_board_coords(e) {
                    var x, y;

                    if (e.changedTouches && e.changedTouches[0]) {
                        var offsety = canvas.offsetTop || 0;
                        var offsetx = canvas.offsetLeft || 0;

                        x = e.changedTouches[0].pageX - offsetx;
                        y = e.changedTouches[0].pageY - offsety;
                    } else if (e.layerX || 0 == e.layerX) {
                        x = e.layerX;
                        y = e.layerY;
                    } else if (e.offsetX || 0 == e.offsetX) {
                        x = e.offsetX;
                        y = e.offsetY;
                    }

                    return {
                        x : x,
                        y : y
                    };
                };

                function on_mousedown(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    canvas.addEventListener('mousemove', on_mousemove, false);
                    canvas.addEventListener('mouseup', on_mouseup, false);
                    canvas.addEventListener('touchmove', on_mousemove, false);
                    canvas.addEventListener('touchend', on_mouseup, false);

                    document.body.addEventListener('mouseup', on_mouseup, false);
                    document.body.addEventListener('touchend', on_mouseup, false);

                    empty = false;
                    var xy = get_board_coords(e);
                    context.beginPath();
                    pixels.push('moveStart');
                    context.moveTo(xy.x, xy.y);
                    pixels.push(xy.x, xy.y);
                    xyLast = xy;
                };

                function on_mousemove(e, finish) {
                    e.preventDefault();
                    e.stopPropagation();

                    var xy = get_board_coords(e);
                    var xyAdd = {
                        x : (xyLast.x + xy.x) / 2,
                        y : (xyLast.y + xy.y) / 2
                    };

                    if (calculate) {
                        var xLast = (xyAddLast.x + xyLast.x + xyAdd.x) / 3;
                        var yLast = (xyAddLast.y + xyLast.y + xyAdd.y) / 3;
                        pixels.push(xLast, yLast);
                    } else {
                        calculate = true;
                    }

                    context.quadraticCurveTo(xyLast.x, xyLast.y, xyAdd.x, xyAdd.y);
                    pixels.push(xyAdd.x, xyAdd.y);
                    context.stroke();
                    context.beginPath();
                    context.moveTo(xyAdd.x, xyAdd.y);
                    xyAddLast = xyAdd;
                    xyLast = xy;

                };

                function on_mouseup(e) {
                    remove_event_listeners();
                    disableSave = false;
                    context.stroke();
                    pixels.push('e');
                    calculate = false;
                };

            }

            canvas.addEventListener('mousedown', on_mousedown, false);
            canvas.addEventListener('touchstart', on_mousedown, false);

    }
    ,
    save : function(){

            var canvas = document.getElementById("newSignature");
            // save canvas image as data url (png format by default)
            var dataURL = canvas.toDataURL("image/png");
            document.getElementById("saveSignature").src = dataURL;

    }
    ,
    clear : function(){

            var parent = document.getElementById("canvas");
            var child = document.getElementById("newSignature");
            parent.removeChild(child);
            empty = true;
            this.capture();

    }
    ,
    send : function(){

            if (empty == false){

            var canvas = document.getElementById("newSignature");
            var dataURL = canvas.toDataURL("image/png");
            document.getElementById("saveSignature").src = dataURL;
            var sendemail = document.getElementById('sendemail').value;
            var replyemail = document.getElementById('replyemail').value;

            var dataform = document.createElement("form");
            document.body.appendChild(dataform);
            dataform.setAttribute("action","upload_file.php");
            dataform.setAttribute("enctype","multipart/form-data");
            dataform.setAttribute("method","POST");
            dataform.setAttribute("target","_self");
            dataform.innerHTML = '<input type="text" name="image" value="' + dataURL + '"/>' + '<input type="email" name="email" value="' + sendemail + '"/>' + '<input type="email" name="replyemail" value="' + replyemail + '"/>'+'<input type="submit" value="Click me" />';
            dataform.submit();

            }
    }

}

})()

var zkSignature;
       </script>
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
                                <a href="printfac.php?id=<?php echo $facture['id'] ?>">
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
<stop stop-opacity="1" stop-color="#32baa8" offset="0">
</stop><stop stop-opacity="1" stop-color="#32baa8" offset="0"></stop></linearGradient>
<g xmlns="http://www.w3.org/2000/svg"><g><g>
<path d="m211 392h90c8.284 0 15-6.716 15-15s-6.716-15-15-15h-90c-8.284 0-15 6.716-15 15s6.716 15 15 15zm210-150c-8.284 0-15 6.716-15 15s6.716 15 15 15 15-6.716 15-15-6.716-15-15-15zm-210 210h90c8.284 0 15-6.716 15-15s-6.716-15-15-15h-90c-8.284 0-15 6.716-15 15s6.716 15 15 15zm240-300h-75v-77c0-41.355-33.645-75-75-75h-150c-8.284 0-15 6.716-15 15v137h-75c-24.813 0-45 20.187-45 45v150c0 24.813 20.187 45 45 45h75v105c0 8.284 6.716 15 15 15h210c8.284 0 15-6.716 15-15v-105h75c24.813 0 45-20.187 45-45v-150c0-24.813-20.187-45-45-45zm-106.939-90.061c-4.136-1.257-8.52-1.939-13.061-1.939h-15v-15c0-4.541-.682-8.925-1.939-13.061 14.327 4.354 25.646 15.674 30 30zm-178.061-31.939h105c8.271 0 15 6.729 15 15v30c0 8.284 6.716 15 15 15h30c8.271 0 15 6.729 15 15v47h-180zm180 452h-180v-150h180zm120-135c0 8.271-6.729 15-15 15h-75v-30h15c8.284 0 15-6.716 15-15s-6.716-15-15-15h-270c-8.284 0-15 6.716-15 15s6.716 15 15 15h15v30h-75c-8.271 0-15-6.729-15-15v-150c0-8.271 6.729-15 15-15h390c8.271 0 15 6.729 15 15zm-105-105c-8.284 0-15 6.716-15 15s6.716 15 15 15 15-6.716 15-15-6.716-15-15-15z" fill="url(#SVGID_1_)" data-original="url(#SVGID_1_)" style=""></path></g></g></g></g>
</svg>
                                </a>
                            </div>
							
  <div class="col-md-2" data-bs-toggle="modal" data-bs-target="#emailForm" id="email" style="text-align:left;">
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" 
xmlns:svgjs="http://svgjs.com/svgjs" height="1em" width="1em" class="iconify iconify--fa-solid"  
x="0" y="0" viewBox="0 0 512 512" style="cursor: pointer;color: rgb(40, 181, 191);width: 35px;height: 35px;" 
xml:space="preserve" class="iconify iconify--fa-solid" >
<g><g xmlns="http://www.w3.org/2000/svg">
<path 
d="m287.29 167.253c.021-4.143-3.321-7.517-7.463-7.537-.013 0-.025 0-.038 0-4.125 0-7.478 3.334-7.499 7.463l-.019 3.778c-5.307-4.085-11.769-6.398-18.961-6.398-17.689 0-35.987 15.304-35.987 40.913 0 23.357 15.819 42.36 35.263 42.36 8.453 0 16.106-3.563 22.048-9.562 1.18 2.389 2.728 4.589 4.612 6.483 4.182 4.203 9.57 6.518 15.173 6.518 16.214 0 26.481-11.288 30.685-21.852 6.524-16.404 7.697-30.226 3.803-44.814-.021-.077-.043-.155-.066-.232-5.895-19.532-19.084-35.525-37.137-45.033-18.051-9.507-38.705-11.331-58.16-5.137-18.435 5.868-33.772 18.52-43.186 35.624-9.417 17.109-11.893 36.834-6.973 55.541 4.262 16.204 13.463 30.184 26.61 40.426 12.658 9.862 28.425 15.537 44.396 15.979.071.002.141.003.211.003 4.045 0 7.38-3.223 7.494-7.293.114-4.141-3.149-7.59-7.29-7.704-26.702-.738-50.105-19.336-56.914-45.225-3.937-14.97-1.945-30.771 5.607-44.494 7.553-13.723 19.838-23.866 34.595-28.563 15.597-4.965 32.153-3.503 46.62 4.115 14.428 7.599 24.98 20.366 29.725 35.96 3.18 12.009 1.262 23.901-3.272 35.304-1.483 3.727-6.083 12.396-16.747 12.396-2.134 0-3.761-1.314-4.54-2.098-1.819-1.829-2.898-4.521-2.885-7.201zm-34.704 65.579c-9.745 0-20.263-10.461-20.263-27.36 0-16.221 10.67-25.913 20.987-25.913 10.785 0 18.401 10.019 18.797 24.512l-.013 2.742c-.572 14.483-9.102 26.019-19.508 26.019z" fill="#28b5bf" data-original="#000000" class=""></path><path d="m483.434 479.884c0-.003 0-.006 0-.009v-255.87c0-8.632-3.52-17.049-9.657-23.115-.008-.008-.015-.018-.023-.026-.004-.004-.009-.008-.014-.013-.014-.013-.026-.028-.04-.041l-29.478-28.931v-16.916c0-4.143-3.357-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v79.758l-136.279 136.037-21.434-11.777c-9.697-5.331-21.28-5.332-30.98-.001l-21.434 11.778-136.279-136.037v-129.472c0-9.649 7.851-17.5 17.5-17.5h311.406c9.649 0 17.5 7.851 17.5 17.5v17.789c0 4.143 3.357 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-17.789c0-17.921-14.579-32.5-32.5-32.5h-68.501l-65.387-64.176c-.071-.07-.144-.139-.218-.205-12.312-11.157-30.882-11.158-43.195 0-.074.066-.146.135-.217.205l-65.388 64.176h-68.501c-17.92 0-32.5 14.579-32.5 32.5v66.631l-29.478 28.931c-.012.012-.024.025-.036.038-.006.006-.012.01-.018.016-.011.011-.02.023-.03.033-6.132 6.066-9.65 14.48-9.65 23.107v85.586c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-85.586c0-2.096.404-4.161 1.13-6.104l25.283 25.238 135.384 135.144-161.796 88.913v-124.919c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v137.598.008c0 .04.002.079.003.119.069 17.676 14.467 32.036 32.16 32.036h276.896c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-276.896c-8.032 0-14.773-5.553-16.635-13.017l177.257-97.408 26.364-14.488c5.176-2.844 11.355-2.845 16.531.001l26.363 14.487 177.258 97.409c-1.862 7.463-8.604 13.016-16.635 13.016h-80.92c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h80.921c17.692 0 32.091-14.36 32.16-32.036.001-.04.003-.079.003-.118zm-238.839-460.491c6.538-5.832 16.312-5.833 22.848 0l54.364 53.356h-131.576zm-176.779 200.354-13.563-13.539 13.563-13.311zm374.205 23.392 25.283-25.239c.726 1.943 1.13 4.009 1.13 6.105v243.19l-161.798-88.912zm15.764-36.931-13.563 13.539v-26.85z" fill="#28b5bf" data-original="#000000" class="">
</path>
</g>
</g>
</svg>
                  </div>

                        </div>
                    </div>
                    <div data-v-561bb412="" size="A4" data-id="1" class="page narrow top-shadow bottom-shadow">

                        <div data-v-561bb412="" class="content" id="contentEmail">
                            <div data-v-561bb412="" class="quote-header">
                                <div data-v-561bb412="" >
                                    <div data-v-561bb412="" class="logo-wrapper" style="height: 100px; margin: 20px;">
                                        <img data-v-561bb412="" loading="lazy" src="<?php echo url ?>static/logo.jpg" alt="" class="logo logoStyle">
                                    </div>
                                </div>
                                <div data-v-561bb412="">
                                    <div data-v-561bb412=""  class="quote-title  inline-block " >
                                        <span data-v-561bb412="" class=""  >
                                            <?php echo $facture['titre'] ?>

                                        </span>
                                    </div>
                                </div>
                                <div data-v-561bb412="">
                                    <div data-v-561bb412="" class="quote-name inline-block">
                                        <span data-v-561bb412=""  >
                                            Numéro de Facture : <br>
                                            <?php echo $facture['num'] ?> <br>

                                        </span>
                                        <span data-v-561bb412="">
                                            Facture

                                        </span>
                                        <div data-v-561bb412="" class="quote-date">
                                            du
                                            <?php echo $facture['date_add'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div data-v-561bb412="">
                                    <div data-v-561bb412="" class="row address-informations">
                                        <div data-v-561bb412="" class="company-infos col colL">
                                             <div data-v-561bb412="">&nbsp;</div>
                                                <div data-v-561bb412="" class="company-name">Passiondecor</div>
                                                <div data-v-561bb412="" class="company-phone">PASSION DECOR, 209 Avenue de</div>
                                                <div data-v-561bb412="" class="company_city">la république 93800 Epinay sur</div>
                                                <div data-v-561bb412="" class="company-name">seine France</div>

                                           </div>

                                        <div data-v-561bb412="" id="client" class="client-infos  inline-block col colR"  data-bs-toggle="modal" data-bs-target="#modalinfoc">
                                            <span data-v-561bb412="">
                                                <div data-v-561bb412="" class="grey-title">Adresse de facturation</div>
                                                <input type="hidden" value="<?php echo $client['id'] ?>" name="clientd">
                                                <div data-v-561bb412="" class="contact_contact">
                                                    <?php echo $client['nom_soc'] ?><br>
                                                    <?php echo $client['civ'] ?> <?php echo $client['prenom'] ?> <?php echo $client['nom'] ?>
                                                </div> 

                                                <div data-v-561bb412="" class="client_city"> <?php echo $client['adr'] ?> <br> <?php echo $client['cp'] ?> <?php echo $client['ville'] ?> <?php echo $client['pays'] ?>  </div>
                                                <div data-v-561bb412="" class="contact_phone"><?php echo $client['tel'] ?></div> 
                                                <div data-v-561bb412="" class="contact_email" id="contact_email"><?php echo $client['email'] ?></div>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div data-v-561bb412="" class="quote-lines padT" id="cnt">
                                <div data-v-561bb412="" class="watermark"></div>
                                <table data-v-561bb412="" class="quote-lines-table">
                                    <thead data-v-561bb412="" class="quote-lines-header bodyC">
                                        <tr data-v-561bb412="" class="bodyC" style="background-color: #32baa8; color: rgb(255, 255, 255);">
                                            <th data-v-561bb412="" class="bodyC" style="min-width: 210px;">
                                                <span data-v-561bb412="">Désignation</span>
                                            </th>
                                            <th data-v-561bb412="" class="text--right text--nowrap bodyC">
                                                <span data-v-561bb412="">P.u. HT</span>
                                            </th> 
                                            <th data-v-561bb412="" class="text--right text--nowrap bodyC">
                                                <span data-v-561bb412="">Qté.</span>
                                            </th> 
                                            <th data-v-561bb412="" class="text--right text--nowrap bodyC">
                                                <span data-v-561bb412="">Montant HT</span>
                                            </th>
                                            <th data-v-561bb412="" class="text--right text--nowrap bodyC">
                                                <span data-v-561bb412="">TVA</span>
                                            </th>
                                            <th data-v-561bb412="" class="text--right text--nowrap bodyC">
                                                <span data-v-561bb412="">Montant TTC</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody data-v-561bb412=""  class="table__body bodyC table__body--empty">
                                    <?php
                                        $facture_detail_avoir_sql = mysqli_query($link, "SELECT * FROM `detail_facture_avoir` WHERE `id_facture` ='" . $facture['id'] . "'");
                                        while ($facture_detail_avoir = mysqli_fetch_array($facture_detail_avoir_sql)) {
                                        $idAvoir = $facture_detail_avoir['id_avoir'];
                                        $avoir_value = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `avoir` WHERE `id` =" . $idAvoir . ""));
                                        $client_value = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE `id` =" . $avoir_value['client'] . ""));
                                          ?>

                                            <tr data-v-561bb412="" id="<?php echo $idAvoir ?>" class="line editable bodyC grabbable visible" onclick="deltr()" draggable="false" style="">
                                                <td data-v-561bb412="" colspan="1" class="designation bodyC" >
                                                    <div data-v-561bb412="" class="line-title"><?php // echo $produitAvoir[' ref'] ?></div> 

                                                    <div data-v-561bb412="" class="line-description">
                                                        <p class="" style=""><strong> <?php echo "Avoir" ?></strong> <span data-v-561bb412="" class="" style="margin-left: 10px!important;">
                                                            <small><?php echo "( ".$client_value['prenom'] ." ". $client_value['nom']. " )" ?></small>
                                                            </span></p>
                                                        
                                                        <p><?php     
                                                        $detail_avoir_sql = mysqli_query($link, "SELECT * FROM `detail_avoir` WHERE `id_devis` =" . $idAvoir . "");
                                                        while ($detail_avoir = mysqli_fetch_array($detail_avoir_sql)) {
                                                            $prodElt = $detail_avoir['id_prod'];
                                                            $tabprod = explode(",", $prodElt);
                                                            $idProduit = $tabprod[0];
                                                            $produitAvoir = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE `id` =" . $idProduit . ""));
                                                           
                                                        ?>
                                                        <?php echo $produitAvoir['nom'] ?> <br>
                                                        <?php } ?></p>
       
                                                    </div>
                                                </td> 
                                                <td data-v-561bb412="" style="padding-top: 19px;background-color: #e9ecef;" class="r-number bodyC no-wrap price_ht">
                                                   
                                                </td> 

                                                <td data-v-561bb412="" style="padding-top: 19px;background-color: #e9ecef;" class="r-number bodyC no-wrap price_ht">
                                                    
                                                </td>
                                                <td data-v-561bb412="" style="padding-top: 19px;background-color: #e9ecef;" class="r-number bodyC no-wrap discount">
                                                    <span data-v-561bb412="">
                                                       
                                                    </span>
                                                </td> 
                                                <td data-v-561bb412="" style="padding-top: 19px;background-color: #e9ecef;" class="r-number bodyC no-wrap discount">
                                                    <span data-v-561bb412="">

                                                    </span>
                                                </td> 
                                                <td data-v-561bb412="" class="quantity bodyC">
                                                    <?php
                                                    echo number_format($avoir_value['prix_ttc'], 2, ".", " ");
                                                    ?>€
                                                </td> 
                                            </tr>
                                            <?php
                                          }
                                        ?>

                                        <?php
                                        $facture_detail_sql = mysqli_query($link, "SELECT * FROM `detail_facture` WHERE `id_devis` ='" . $facture['id'] . "'");
                                        while ($facture_detail = mysqli_fetch_array($facture_detail_sql)) {
                                            $idqt = $facture_detail['id_prod'];

                                            $tab = explode(",", $idqt);
                                            $idprd = $tab[0];
                                            $qte = $tab[1];

                                            $produit = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE `id` =" . $idprd . ""));
                                            ?>

                                            <tr data-v-561bb412="" id="<?php echo $produit['id'] ?>" class="line editable bodyC grabbable visible" onclick="deltr()" draggable="false" style="">
                                                <td data-v-561bb412="" colspan="1" class="designation bodyC" >
                                                    <div data-v-561bb412="" class="line-title"><?php echo $produit[' ref'] ?></div> 

                                                    <div data-v-561bb412="" class="line-description">
                                                        <p><?php echo $produit['nom'] ?></p>
                                                    </div>
                                                </td> 
                                                <td data-v-561bb412="" class="r-number no-wrap price_ht bodyC">
                                                    <?php echo $produit['prix_ht'] ?>
                                                </td> 

                                                <td data-v-561bb412="" class="r-number no-wrap price_ht bodyC">
                                                    <?php echo $qte ?>
                                                </td>
                                                <td data-v-561bb412="" class="r-number no-wrap discount bodyC">
                                                    <span data-v-561bb412="">
                                                        <?php
                                                        $montantht = $produit['prix_ht'] * $qte;
                                                        echo number_format($montantht, 2, ".", " ");
                                                        ?>€
                                                    </span>
                                                </td> 
                                                <td data-v-561bb412="" class="r-number no-wrap discount bodyC">
                                                    <span data-v-561bb412="">

                                                        <?php
                                                        echo $produit['tva']  ;
                                                        ?> %
                                                    </span>
                                                </td> 
                                                <td data-v-561bb412="" class="quantity bodyC">
                                                    <?php
                                                    $tva = $montantht * ($produit['tva']/100);
                                                    $prix_ttc = $montantht + $tva;
                                                    echo number_format($prix_ttc, 2, ".", " ");
                                                    ?>€
                                                </td> 


                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>

                            <div data-v-561bb412="">
                            <div class="row">
                                <div data-v-561bb412="" class="payment-block col colR"  class="not-visible">
                                    <h6 data-v-561bb412="" class="not-visible">  Informations de paiement</h6>
                                    <div id="">
                                        <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
                                            <div data-v-02611d7b="" class="limit-date">Validité de l'offre :<?php echo $facture['validite'] ?>  </div> 
                                            <div data-v-02611d7b="" class="payment-mode">Mode de paiement : 
                                                <?php
                                                $typee = $facture['type'];
                                                $tab2 = explode("-", $typee);
                                                if ($tab2['0'] == 1) {

                                                    echo ' Virement,';
                                                }
                                                if ($tab2['1'] == 2) {
                                                    echo ' Chèque,';
                                                }
                                                if ($tab2['2'] == 3) {

                                                    echo ' Carte bancaire,';
                                                }
                                                if ($tab2['3'] == 4) {

                                                    echo ' Espèces';
                                                }
                                                ?>
                                            </div> 
                                            <div data-v-561bb412="" class="payment-delay">  Règlement à J+<?php echo $facture['reg'] ?></div>
                                        </div>

                                    </div>
                                </div>
                                <div data-v-248579a2="" data-v-561bb412="" class="document-summary-full col inline-block colR">
                                    
                                    <div data-v-248579a2="" class="document_summary" id="calcul" style="width: 100% !important;">
                                        <table data-v-248579a2="">
                                            <tbody data-v-248579a2="">
                                                <tr data-v-248579a2="" style="background-color: #32baa8; color: rgb(255, 255, 255);">
                                                    <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif</th>
                                                </tr> 
                                                <tr data-v-248579a2="" class="sstitre transport" style="display: none;">
                                                    <td data-v-248579a2="" colspan="2">Transport</td>
                                                </tr> <!----> <!----> <!---->
                                                <?php if($facture['frais_liv'] != '') {               
                                                ?>
                                                <tr data-v-248579a2="">
                                                    <td data-v-248579a2="">Frais de port</td>
                                                    <td data-v-248579a2="" role="" class="r-number" id="" onchange="">
                                                        <?php
                                                            echo number_format($facture['frais_liv'], 2, ".", " ");
                                                        ?> €</td>                                     
                                                </tr>
                                                <tr data-v-248579a2="" style="display: none;">
                                                    <td data-v-248579a2="">TVA Frais de port 
                                                        <?php $tvaVal = ($facture['tva_liv'] * 100) / $facture['frais_liv'] ;
                                                               echo $tvaVal ?> %</td>
                                                                                                            
                                                    <td data-v-248579a2="" role="" class="r-number" id="" onchange="">
                                                        <?php 
                                                            
                                                            echo number_format($facture['tva_liv'], 2, ".", " ");

                                                        ?> €</td>
                                                </tr>
                                                <?php }?>
                                                <tr data-v-248579a2="">
                                                    <td data-v-248579a2="">Montant HT</td>
                                                    <td data-v-248579a2="" role="totalHT" class="r-number">
                                                        <?php
                                                        $pontee = strpos($facture['prix_ht'], ".");
                                                        if ($pontee > 0) {
                                                            echo number_format($facture['prix_ht'], 2, ".", " ");
                                                        } else {
                                                            echo number_format($facture['prix_ht'], 2, ",", " ");
                                                        }
                                                        ?> €</td>
                                                </tr>
<!--                                                <tr data-v-248579a2="">-->
<!--                                                    <td data-v-248579a2="">Remise Global</td>-->
<!--                                                    <td data-v-248579a2="" role="remise" class="r-number" >-->
<!---->
<!--                                                        <select data-v-77800238="" class="custom-select" name="remise" onchange="calculRemise()" style="border: 0px solid #ced4da;" id ="__BVID__194" --><?php
//                                                           if ($user['role'] == '2'  ) {
//                                                                            echo'disabled';
//                                                           }
//                                                           ?>
                                                <!-->
<!---->
<!--                                                              <option data-v-77800238="" value="0"selected="0">0%</option>-->
<!--                                                              <option data-v-77800238="" value="5">5%</option>-->
<!--                                                              <option data-v-77800238="" value="10">10%</option>-->
<!--                                                              <option data-v-77800238="" value="20">20%</option>-->
<!--                                                        </select>-->
<!--                                                </tr>-->
<!--                                                <tr data-v-248579a2="">-->
<!--                                                    <td data-v-248579a2="">Montant total HT</td>-->
<!--                                                    <td data-v-248579a2="" role="totalHT" class="r-number">-->
<!--                                                        --><?php
//                                                        $pontee = strpos($facture['prix_ht'], ".");
//                                                        if ($pontee > 0) {
//                                                            echo number_format($facture['prix_ht'], 2, ".", " ");
//                                                        } else {
//                                                            echo number_format($facture['prix_ht'], 2, ",", " ");
//                                                        }
//                                                        ?><!-- €</td>-->
<!--                                                </tr>-->
                                                <tr data-v-248579a2="">
                                                    <td data-v-248579a2="">Montant total TVA</td>
                                                    <td data-v-248579a2="" role="totalTVA" class="r-number">
                                                        <?php
                                                        $pontee = strpos($facture['tva'], ".");
                                                        if ($pontee > 0) {
                                                            echo number_format($facture['tva'], 2, ".", " ");
                                                        } else {
                                                            echo number_format($facture['tva'], 2, ",", " ");
                                                        }
                                                        ?> €</td>
                                                </tr>
                                                <tr data-v-248579a2="" class="total">
                                                    <td data-v-248579a2="">Montant total TTC</td>
                                                    <td data-v-248579a2="" role="total_ttc" class="r-number">
                                                        <?php
                                                        $pontee = strpos($facture['prix_ttc'], ".");
                                                        if ($pontee > 0) {
                                                            echo number_format($facture['prix_ttc'], 2, ".", " ");
                                                        } else {
                                                            echo number_format($facture['prix_ttc'], 2, ",", " ");
                                                        }
                                                        ?> €</td>
                                                </tr>
<!--                                                <tr data-v-248579a2="" class="total">-->
<!--                                                    <td data-v-248579a2="">Net à payer</td>-->
<!--                                                    <td data-v-248579a2="" role="net_payer" class="r-number" id="net_payer">-->
<!--                                                        --><?php
//                                                        $netPayer = $facture['prix_ht'] * (1-5/100);
//                                                        if ($netPayer > 0) {
//                                                            echo number_format($netPayer, 2, ".", " ");
//                                                        }
//                                                        ?><!-- €</td>-->
<!--                                                </tr>-->
                                            </tbody>
                                        </table>
                                        <?php if($facture['prixAvoir']>0 ){?>
                                        <br> 
                                        <table data-v-248579a2="" style="margin-top:10px">
                                            <body data-v-248579a2="">
                                            <tr data-v-248579a2=""vstyle="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">
                                            <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif après avoir</th>
                                            </tr> 
                                            <tr data-v-248579a2="">
                                            <td data-v-248579a2="">Montant total TTC</td>
                                            <td data-v-248579a2="" role="totalHT" class="r-number">
                                                <?php

                                                    echo number_format($facture['prixAvoir'], 2, ".", " ");

                                                ?> €</td>
                                            </tr>

                                            </body>
                                            </table>
                                            <?php }?>
                                        <?php if($facture['remise'] > 0 && $facture['netpayer']>0 ){?>
                                        <br>                        
                                        <table data-v-248579a2="">
                                            <tbody data-v-248579a2="">
                                            <tr data-v-248579a2="" style="background-color: #32baa8; color: rgb(255, 255, 255);">
                                                <th data-v-248579a2="" colspan="2" class="first-line">Récapitulatif avec Remise</th>
                                            </tr>

                                            <tr data-v-248579a2="">
                                                <td data-v-248579a2="">Montant HT avant remise</td>
                                                <td data-v-248579a2="" role="totalHT" class="r-number">
                                                    <?php
                                                        $pontee = strpos($facture['prix_ht'], ".");
                                                        if ($pontee > 0) {
                                                            echo number_format($facture['prix_ht'], 2, ".", " ");
                                                        } else {
                                                            echo number_format($facture['prix_ht'], 2, ",", " ");
                                                        }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="">
                                                <td data-v-248579a2="">Montant total des remises</td>
                                                <td data-v-248579a2="" role="totalHTR" class="r-number">
                                                    <?php

                                                        $remise_globale = $facture['remise_globale'];

                                                        $ponteR = strpos($remise_globale, ".");
                                                        if ($ponteR > 0) {
                                                            echo number_format($remise_globale, 2, ".", " ");
                                                        } else {
                                                            echo number_format($remise_globale, 2, ",", " ");
                                                        }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="">
                                                <td data-v-248579a2="">Montant total HT</td>
                                                <td data-v-248579a2="" role="totalHTT" class="r-number">
                                                    <?php
                                                       
                                                        $montant_total_ht = $facture['montant_total_ht'];

                                                        $ponteT = strpos($montant_total_ht, ".");
                                                        if ($ponteT > 0) {
                                                            echo number_format($montant_total_ht, 2, ".", " ");
                                                        } else {
                                                            echo number_format($montant_total_ht, 2, ",", " ");
                                                        }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="">
                                                <td data-v-248579a2="">Montant total TVA</td>
                                                <td data-v-248579a2="" role="totalremise" class="r-number">
                                                    <?php
                                                    $pontee = strpos($facture['remise'], ".");
                                                    if ($pontee > 0) {
                                                        echo number_format($facture['remise'], 2, ".", " ");
                                                    } else {
                                                        echo number_format($facture['remise'], 2, ",", " ");
                                                    }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="" class="total">
                                                <td data-v-248579a2="">Montant total TTC</td>
                                                <td data-v-248579a2="" role="netpayer" class="r-number">
                                                    <?php
                                                    $pontee = strpos($facture['netpayer'], ".");
                                                    if ($pontee > 0) {
                                                        echo number_format($facture['netpayer'], 2, ".", " ");
                                                    } else {
                                                        echo number_format($facture['netpayer'], 2, ",", " ");
                                                    }
                                                    ?> €</td>
                                            </tr>
                                            <tr data-v-248579a2="" class="total">
                                                <td data-v-248579a2="">Montant Net à payer</td>
                                                <td data-v-248579a2="" role="netpayer1" class="r-number">
                                                    <?php
                                                    $pontee = strpos($facture['netpayer'], ".");
                                                    if ($pontee > 0) {
                                                        echo number_format($facture['netpayer'], 2, ".", " ");
                                                    } else {
                                                        echo number_format($facture['netpayer'], 2, ",", " ");
                                                    }
                                                    ?> €</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <?php }?>
                                    </div>



                                </div>
                                
                                </div>
                                <div data-v-561bb412="" class="shipping-block">
                                    <h6 data-v-561bb412=""class="not-visible"> Informations de livraison</h6>
                                    <div id="">
                                        <div data-v-02611d7b="" data-v-561bb412="" class="invoice_payment">
										
                                            <div data-v-02611d7b="" class="payment-mode">Mode de livraison :  <?php echo $facture['mode_liv'] ?> </div> 
                                            <?php if($facture['frais_liv']!= '' ){?>
                                            <div data-v-02611d7b="" class="payment-mode">Frais de livraison :  <?php echo $facture['frais_liv'] ?> €</div> 
							     		    <div data-v-02611d7b="" class="payment-mode" style="display: inline-table ; display: none;">TVA de livraison <?php echo ($facture['tva_liv'] * 100) / $facture['frais_liv'] ?>% : <?php echo $facture['tva_liv'] ?> €</div> 
                                            <?php }?>
                                            <div data-v-02611d7b="" class="payment-mode">Adresse de livraison :  <?php echo $facture['adr'] ?> </div> 
                                            <div data-v-02611d7b="" class="payment-mode">Code postal :  <?php echo $facture['cp'] ?></div> 
                                            <div data-v-02611d7b="" class="payment-mode">Ville :  <?php echo $facture['ville'] ?> </div>
                                            <div data-v-02611d7b="" class="payment-mode">Pays :  <?php echo $facture['pays'] ?> </div>

                                        </div>

                                    </div>
                                </div>
                                <div data-v-561bb412="" class="quote-footer">
                                    <div id="comm">

                                        <div data-v-561bb412="" class="quote-notes" data-bs-toggle="modal" data-bs-target="#modalinfocomm">
                                            <div data-v-561bb412="" class="editable inline-block">
<!--                                                <div data-v-561bb412="" class="not-visible">-->
<!--                                                    Ajouter un commentaire-->
<!--                                                </div>-->
                                                <span data-v-561bb412="" class=""  >
                                            <?php echo $facture['commentaire'] ?>

                                        </span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div data-v-561bb412="" class="align-center"></div>
                                    <div data-v-561bb412="" class="quote-sign row">
                                        <div data-v-561bb412="" class="col colR">
                                            <div data-v-561bb412="" class=""><span data-v-561bb412="" class="subtitle">Bon pour accord</span>
                                            </div>
                                            <div data-v-561bb412="" class=""><span data-v-561bb412="" class="subtitle">Précédé de la mention 'lu et approuvé'</span>
                                            </div>
                                        </div>
                                        <?php if($facture['imgSig'] != '' ){?>
                                        <div data-v-561bb412="" class="col inline-block colR">
                                            <div data-v-561bb412="" class=""><span data-v-561bb412="" class="subtitle">Date:</span>
                                            <span data-v-561bb412=""  ><?php echo $facture['dateSignature'] ?></span>
                                            </div>
                                            <div data-v-561bb412="" class=""><span data-v-561bb412="" class="subtitle">Signature du client:</span>
                                           <!-- <img src="<?php //echo str_replace(' ', '+', $facture['signature'] ); ?>" alt="" id="testImg" />-->
                                            <img src="<?php echo $facture['imgSig'] ?>" alt="" id="testImg" />
                                            </div>
                                        </div>
                                        <?php } else {?>
                                        <div data-v-561bb412="" class="col inline-block colR">
                                            <div data-v-561bb412="" class=""><span data-v-561bb412="" class="subtitle">Date:</span>
                                            <span data-v-561bb412=""  id="dateSign" value=""><?php echo $facture['dateSignature'] ?></span>
                                            </div>
                                            <div data-v-561bb412="" class=""><span data-v-561bb412="" class="subtitle">Signature du client:</span>
                                            <button data-v-561bb412="" id="BtnSign" type="button" style=" border:1px solid #3D7DA0;color:#3D7DA0;background: #FFFFFF" data-bs-toggle="modal" data-bs-target="#modalsign" class="btn btn btn-default btn-primary btn-secondary">
                                            <span class="iconify" data-icon="fluent:signature-28-filled"></span>
                                            </button>
                                            <img src="" alt="" id="testImg" />
                                            </div>
                                        </div>
                                        <?php }?>
<!--                                        <div data-v-561bb412="" class="row">-->
<!--                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle"></span>-->
<!--                                            </div>-->
<!--                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle"> cachet et signature</span>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div data-v-561bb412="" class="row">-->
<!--                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle"></span>-->
<!--                                            </div>-->
<!--                                            <div data-v-561bb412="" class="col"><span data-v-561bb412="" class="subtitle">Précédé de la mention 'lu et approuvé'</span>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                    </div>
                                    
                                </div>
                                        
                            </div>
                      <!--      <div>
                                            <div id="canvas">
                                            
                                            </div>

                                            <script>
                                                zkSignature.capture();
                                            </script>
                            </div> -->
                            <div data-v-561bb412="" class="footer-block" style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);"></div>
                            <div data-v-dc3a3862="" data-v-561bb412="" class="company-footer"
                                 style="color: rgb(0, 0, 0); background-color: transparent;  min-height: 20px;line-height: 10px;">
<!--                                <span data-v-dc3a3862="" class="align-center"> Passion Déco</span>-->
                                <span data-v-dc3a3862="" class="align-center"> Passiondecor - PASSION DECOR, 209 Avenue de la république 93800 Epinay sur seine France <br></span>
                                <span data-v-dc3a3862="" class="align-center">Pour toute assistance, merci de nous contacter :<br></span>
                                <span data-v-dc3a3862="" class="align-center" > Tél. : 09 53 01 76 14<br></span>
                                <span data-v-dc3a3862="" class="align-center"> *Vous devez vérifier la conformité de la marchandise réceptionnée (emballage, contenu, etat) avant de signer le bon de livraison du transporteur
                                    pour signaler, le cas échéant, les dommages dus au transport sur les bons de livraison. Le livreur doit assister au déballage et attendre l’ouverture des colis.</span>

                            </div>

                        </div>
                         <!--   <div>
                                            <div id="canvas">
                                            
                                            </div>

                                            <script>
                                                zkSignature.capture();
                                            </script>
                            </div> -->
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
    </body>
</html>