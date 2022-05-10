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
                canvas.width = 200;
                canvas.height = 150 ;
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
        
           
                                        <div data-v-561bb412="" class="">
                                            <div data-v-561bb412="" class=""><span data-v-561bb412="" class="subtitle">Nom et fonction</span>
                                            </div>
                                            <div data-v-561bb412="" class=""><span data-v-561bb412="" class="subtitle">Date, cachet et signature</span>
                                            </div>
                                            <div id="canvas" style="position: relative; margin: 0; padding: 0; border: 1px solid #c4caac;">
                                            
                                            </div>

                                            <script>
                                                zkSignature.capture();
                                            </script>
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