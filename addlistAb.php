<?php
include 'db.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location = ("' . url . 'login.php")</script>';
}
$produit_sql = mysqli_query($link, "SELECT * FROM `produit` ");
//echo "<pre>";
//print_r($_SERVER['DOCUMENT_ROOT']);die;
$m = 5;
?>

<html lang="fr">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="theme-color" content="#4bddd3">
        <title>Liste des Factures</title>
        <meta name="description">
        <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <link href="data.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url ?>static/icon.png">
        <link href="https://unpkg.com/ionicons@4.5.1/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo url ?>static/style.css" rel="stylesheet">
        <link href="<?php echo url ?>static/client.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--        <link rel="stylesheet" href="dist/css/styles.css">-->
<!--        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>-->
        <style>

            a {
                text-decoration: none !important;
                color: #666f81 !important;
            }

            #__BVID__92_info {
                display: none;
            }
            #__BVID__92e0_info {
                display: none;
            }
            #__BVID__92e1_info {
                display: none;
            }
            #__BVID__92e2_info {
                display: none;
            }
            #__BVID__92e3_info {
                display: none;
            }
            #__BVID__92e4_info {
                display: none;
            }
            #__BVID__92e5_info {
                display: none;
            }
            #__BVID__92e6_info {
                display: none;
            }

            #produit_previous {
                display: none;
            }

            #produit_next {
                display: none;
            }

            #__BVID__92_filter {
                display: none;
            }
            #__BVID__92e0_filter {
                display: none;
            }

            #__BVID__92e1_filter {
                display: none;
            }
            #__BVID__92e2_filter {
                display: none;
            }
            #__BVID__92e3_filter {
                display: none;
            }
            #__BVID__92e4_filter {
                display: none;
            }
            #__BVID__92e5_filter {
                display: none;
            }
            #__BVID__92e6_filter {
                display: none;
            }




            #__BVID__92_length {
                display: none;
            }

            #__BVID__92e0_length {
                display: none;
            }
            #__BVID__92e1_length {
                display: none;
            }
            #__BVID__92e2_length {
                display: none;
            }
            #__BVID__92e3_length {
                display: none;
            }
            #__BVID__92e4_length {
                display: none;
            }
            #__BVID__92e5_length {
                display: none;
            }
            #__BVID__92e6_length {
                display: none;
            }

            #hi {
                display: none !important;
            }

            @media screen and (min-width: 769px) {

                #__BVID__92_paginate {
                    margin-right: 400px;
                }

                #__BVID__92e0_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e1_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e2_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e3_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e4_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e5_paginate {
                    margin-right: 400px;
                }
                #__BVID__92e6_paginate {
                    margin-right: 400px;
                }





            }

            @media (max-width: 767.98px) {
                #ExportReporttopdf {
                    margin: 12px;
                }

                #ExportReporttoExcel {
                    margin: 12px;
                }

                #BV_popover_1 {
                    transform: translate3d(0px, -74px, 0px) !important
                }
            }

            .b-table.table.b-table-stacked-md {
                width: 100% !important;
            }

            .dt-buttons {
                display: none;
            }

            tr {
                text-align: center !important;
                background-color: #FFFFFF !important;
            }

            th {
                text-align: center !important;
                background-color: #FFFFFF !important;
            }

            td {
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

            .btbt {
                width: 50px !important;
                height: 50px !important;
                line-height: 43px !important;
                border-radius: 30px !important;
                margin-right: 8px !important;
                background: #28B5BF !important;
                color: #fff !important;
                font-size: 25px !important;
            }

            .bb {
                width: 50px !important;
                height: 50px !important;
                border-radius: 30px !important;
                margin-right: 8px !important;
            }

            .ifarmeimcg {
                width: 50px !important;
                height: 50px !important;

            }




        </style>
    </head>
    <body lang="fr">
        <div class="LayoutShell">
            <div class="CommonShell">
                <?php include('header.php'); ?>
            </div>
<main class="main"><div class="container-xxl"><div class="row"><div class="col-12"><!----></div></div></div> <div data-v-1a6246d2="" class="container"><form data-v-1a6246d2="" method="post"><div data-v-1a6246d2="" class="w_parameters_preheader sticky-top pt-4 pb-4"><h1 data-v-1a6246d2="" class="title no-margin-b">Demande d'absence</h1> <button data-v-1a6246d2="" type="submit" class="btn btn-primary">
        Enregistrer
      </button> <!----> <!----></div> <div data-v-1a6246d2="" class="_w_parameters_containers"><h2 data-v-1a6246d2="" class="_w_parameters_headers">Nouvelle demande d'absence</h2> <div data-v-1a6246d2="" class="_w_parameters_content"><form data-v-1a6246d2="" method="post" class="form-horizontal unload_check block_body "><div data-v-1a6246d2="" class="form-group"><label data-v-1a6246d2="" for="inputSearchUser">Utilisateur concerné par l'absence</label> <div data-v-1a6246d2="" class="row"><div data-v-1a6246d2="" class="col-md-6"><div data-v-1a6246d2="" class="suggest-wrap" id="inputSearchUser"><input placeholder="Prénom et nom" autocomplete="off" class="form-control"> <ul class="suggest-list" style="display: none;"><li class="suggest-item"><div data-v-1a6246d2="" class="user"><span data-v-1a6246d2="">Bilel Bilel</span></div></li><li class="suggest-item"><div data-v-1a6246d2="" class="user"><span data-v-1a6246d2="">Bilel Ben Abbes</span></div></li><li class="suggest-item"><div data-v-1a6246d2="" class="user"><span data-v-1a6246d2="">Alexander Marshall</span></div></li><li class="suggest-item"><div data-v-1a6246d2="" class="user"><span data-v-1a6246d2="">Haddad Rafik</span></div></li><li class="suggest-item"><div data-v-1a6246d2="" class="user"><span data-v-1a6246d2="">Bill Bill</span></div></li><li class="suggest-item"><div data-v-1a6246d2="" class="user"><span data-v-1a6246d2="">Deco Deco</span></div></li></ul></div></div> <div data-v-1a6246d2="" class="people"><div class="row"><div class="col-4"><div class="avatar-container mt-auto mb-auto rounded-circle" style="height: 100px; width: 100px;"><img src="https://avatars-wurodocuments.emstorage.fr/965.0077010308556vuhqdovms3t4dxpghoctnm80j0lwm0" class="user-avatar img-fluid"></div></div> <div class="col-8"><div class="details"><h1 class="employee">Bilel Ben Abbes</h1> <h2 class="position"><i class="icon subtitles ion-ios-briefcase"></i></h2> <div class="phone"><!----> <h2 set="[object Object]"><!----> <!----> <!----> <!----></h2>  <!----></div> <div class="email"><h2><i class="icon subtitles ion-ios-mail"></i> <a href="mailto:benabbesbilel@gmail.com">benabbesbilel@gmail.com</a></h2> </div> <!----> <!----></div></div></div></div></div></div> <!----> <div data-v-1a6246d2="" class="row"><div data-v-1a6246d2="" class="col-md-6"><div data-v-1a6246d2="" class="form-group"><label data-v-1a6246d2="" for="total_ht" class="control-label">Période</label> <div data-v-1a6246d2="" class="controls big-icons"><div data-v-1a6246d2="" class="flex"><i data-v-1a6246d2="" class="ion-ios-partly-sunny" style="color: rgb(191, 234, 255);"></i>
                    Demi-journée
                  </div><div data-v-1a6246d2="" class="flex selected"><i data-v-1a6246d2="" class="ion-ios-sunny" style="color: rgb(249, 215, 87);"></i>
                    Journée
                  </div><div data-v-1a6246d2="" class="flex"><i data-v-1a6246d2="" class="ion-ios-calendar" style="color: rgb(255, 168, 168);"></i>
                    Période
                  </div></div></div></div> <div data-v-1a6246d2="" class="col-md-6"><div data-v-1a6246d2="" class="form-group"><label data-v-1a6246d2="" for="date">Date </label> <div data-v-1a6246d2="" class="controls"><div data-v-1a6246d2="" class="mx-datepicker" first-day-of-week="1"><div class="mx-input-wrapper"><input name="date" type="text" autocomplete="off" placeholder="Sélectionnez une date" class="mx-input"> <span class="mx-input-append mx-clear-wrapper"><i class="mx-input-icon mx-clear-icon"></i></span> <span class="mx-input-append"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 200 200" class="mx-calendar-icon"><rect x="13" y="29" rx="14" ry="14" width="174" height="158" fill="transparent"></rect> <line x1="46" x2="46" y1="8" y2="50"></line> <line x1="154" x2="154" y1="8" y2="50"></line> <line x1="13" x2="187" y1="70" y2="70"></line> <text x="50%" y="135" font-size="90" stroke-width="1" text-anchor="middle" dominant-baseline="middle"></text></svg></span></div> <div class="mx-datepicker-popup" style="display: none;"><!----> <div class="mx-calendar mx-calendar-panel-none"><div class="mx-calendar-header"><a class="mx-icon-last-year">«</a> <a class="mx-icon-last-month" style="display: none;">‹</a> <a class="mx-icon-next-year">»</a> <a class="mx-icon-next-month" style="display: none;">›</a> <a class="mx-current-month" style="display: none;">Nov</a> <a class="mx-current-year" style="display: none;">2021</a> <a class="mx-current-year" style="display: none;">2020 ~ 2029</a> <a class="mx-time-header" style="display: none;">18-11-2021</a></div> <div class="mx-calendar-content"><table class="mx-panel mx-panel-date" style="display: none;"><thead><tr><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th><th>Dim</th></tr></thead><tbody><tr><td data-year="2021" data-month="9" title="25-10-2021" class="cell last-month">25</td><td data-year="2021" data-month="9" title="26-10-2021" class="cell last-month">26</td><td data-year="2021" data-month="9" title="27-10-2021" class="cell last-month">27</td><td data-year="2021" data-month="9" title="28-10-2021" class="cell last-month">28</td><td data-year="2021" data-month="9" title="29-10-2021" class="cell last-month">29</td><td data-year="2021" data-month="9" title="30-10-2021" class="cell last-month">30</td><td data-year="2021" data-month="9" title="31-10-2021" class="cell last-month">31</td></tr><tr><td data-year="2021" data-month="10" title="01-11-2021" class="cell cur-month">1</td><td data-year="2021" data-month="10" title="02-11-2021" class="cell cur-month">2</td><td data-year="2021" data-month="10" title="03-11-2021" class="cell cur-month">3</td><td data-year="2021" data-month="10" title="04-11-2021" class="cell cur-month">4</td><td data-year="2021" data-month="10" title="05-11-2021" class="cell cur-month">5</td><td data-year="2021" data-month="10" title="06-11-2021" class="cell cur-month">6</td><td data-year="2021" data-month="10" title="07-11-2021" class="cell cur-month">7</td></tr><tr><td data-year="2021" data-month="10" title="08-11-2021" class="cell cur-month">8</td><td data-year="2021" data-month="10" title="09-11-2021" class="cell cur-month">9</td><td data-year="2021" data-month="10" title="10-11-2021" class="cell cur-month">10</td><td data-year="2021" data-month="10" title="11-11-2021" class="cell cur-month">11</td><td data-year="2021" data-month="10" title="12-11-2021" class="cell cur-month">12</td><td data-year="2021" data-month="10" title="13-11-2021" class="cell cur-month">13</td><td data-year="2021" data-month="10" title="14-11-2021" class="cell cur-month">14</td></tr><tr><td data-year="2021" data-month="10" title="15-11-2021" class="cell cur-month">15</td><td data-year="2021" data-month="10" title="16-11-2021" class="cell cur-month">16</td><td data-year="2021" data-month="10" title="17-11-2021" class="cell cur-month today">17</td><td data-year="2021" data-month="10" title="18-11-2021" class="cell cur-month actived">18</td><td data-year="2021" data-month="10" title="19-11-2021" class="cell cur-month">19</td><td data-year="2021" data-month="10" title="20-11-2021" class="cell cur-month">20</td><td data-year="2021" data-month="10" title="21-11-2021" class="cell cur-month">21</td></tr><tr><td data-year="2021" data-month="10" title="22-11-2021" class="cell cur-month">22</td><td data-year="2021" data-month="10" title="23-11-2021" class="cell cur-month">23</td><td data-year="2021" data-month="10" title="24-11-2021" class="cell cur-month">24</td><td data-year="2021" data-month="10" title="25-11-2021" class="cell cur-month">25</td><td data-year="2021" data-month="10" title="26-11-2021" class="cell cur-month">26</td><td data-year="2021" data-month="10" title="27-11-2021" class="cell cur-month">27</td><td data-year="2021" data-month="10" title="28-11-2021" class="cell cur-month">28</td></tr><tr><td data-year="2021" data-month="10" title="29-11-2021" class="cell cur-month">29</td><td data-year="2021" data-month="10" title="30-11-2021" class="cell cur-month">30</td><td data-year="2021" data-month="11" title="01-12-2021" class="cell next-month">1</td><td data-year="2021" data-month="11" title="02-12-2021" class="cell next-month">2</td><td data-year="2021" data-month="11" title="03-12-2021" class="cell next-month">3</td><td data-year="2021" data-month="11" title="04-12-2021" class="cell next-month">4</td><td data-year="2021" data-month="11" title="05-12-2021" class="cell next-month">5</td></tr></tbody></table> <div class="mx-panel mx-panel-year" style="display: none;"><span class="cell">2020</span><span class="cell actived">2021</span><span class="cell">2022</span><span class="cell">2023</span><span class="cell">2024</span><span class="cell">2025</span><span class="cell">2026</span><span class="cell">2027</span><span class="cell">2028</span><span class="cell">2029</span></div> <div class="mx-panel mx-panel-month" style="display: none;"><span class="cell">Jan</span><span class="cell">Fev</span><span class="cell">Mar</span><span class="cell">Avr</span><span class="cell">Mai</span><span class="cell">Juin</span><span class="cell">Juil</span><span class="cell">Aout</span><span class="cell">Sep</span><span class="cell">Oct</span><span class="cell actived">Nov</span><span class="cell">Dec</span></div> <div class="mx-panel mx-panel-time" style="display: none;"><ul class="mx-time-list" style="width: 33.3333%;"><li class="cell">00</li><li class="cell">01</li><li class="cell">02</li><li class="cell">03</li><li class="cell">04</li><li class="cell">05</li><li class="cell">06</li><li class="cell">07</li><li class="cell">08</li><li class="cell">09</li><li class="cell">10</li><li class="cell actived">11</li><li class="cell">12</li><li class="cell">13</li><li class="cell">14</li><li class="cell">15</li><li class="cell">16</li><li class="cell">17</li><li class="cell">18</li><li class="cell">19</li><li class="cell">20</li><li class="cell">21</li><li class="cell">22</li><li class="cell">23</li></ul><ul class="mx-time-list" style="width: 33.3333%;"><li class="cell">00</li><li class="cell">01</li><li class="cell">02</li><li class="cell">03</li><li class="cell">04</li><li class="cell">05</li><li class="cell">06</li><li class="cell">07</li><li class="cell actived">08</li><li class="cell">09</li><li class="cell">10</li><li class="cell">11</li><li class="cell">12</li><li class="cell">13</li><li class="cell">14</li><li class="cell">15</li><li class="cell">16</li><li class="cell">17</li><li class="cell">18</li><li class="cell">19</li><li class="cell">20</li><li class="cell">21</li><li class="cell">22</li><li class="cell">23</li><li class="cell">24</li><li class="cell">25</li><li class="cell">26</li><li class="cell">27</li><li class="cell">28</li><li class="cell">29</li><li class="cell">30</li><li class="cell">31</li><li class="cell">32</li><li class="cell">33</li><li class="cell">34</li><li class="cell">35</li><li class="cell">36</li><li class="cell">37</li><li class="cell">38</li><li class="cell">39</li><li class="cell">40</li><li class="cell">41</li><li class="cell">42</li><li class="cell">43</li><li class="cell">44</li><li class="cell">45</li><li class="cell">46</li><li class="cell">47</li><li class="cell">48</li><li class="cell">49</li><li class="cell">50</li><li class="cell">51</li><li class="cell">52</li><li class="cell">53</li><li class="cell">54</li><li class="cell">55</li><li class="cell">56</li><li class="cell">57</li><li class="cell">58</li><li class="cell">59</li></ul><ul class="mx-time-list" style="width: 33.3333%;"><li class="cell">00</li><li class="cell">01</li><li class="cell">02</li><li class="cell">03</li><li class="cell">04</li><li class="cell">05</li><li class="cell">06</li><li class="cell">07</li><li class="cell">08</li><li class="cell">09</li><li class="cell">10</li><li class="cell">11</li><li class="cell">12</li><li class="cell">13</li><li class="cell">14</li><li class="cell">15</li><li class="cell">16</li><li class="cell">17</li><li class="cell">18</li><li class="cell">19</li><li class="cell">20</li><li class="cell">21</li><li class="cell">22</li><li class="cell">23</li><li class="cell">24</li><li class="cell">25</li><li class="cell">26</li><li class="cell">27</li><li class="cell">28</li><li class="cell">29</li><li class="cell">30</li><li class="cell">31</li><li class="cell">32</li><li class="cell">33</li><li class="cell">34</li><li class="cell">35</li><li class="cell">36</li><li class="cell">37</li><li class="cell">38</li><li class="cell">39</li><li class="cell">40</li><li class="cell">41</li><li class="cell actived">42</li><li class="cell">43</li><li class="cell">44</li><li class="cell">45</li><li class="cell">46</li><li class="cell">47</li><li class="cell">48</li><li class="cell">49</li><li class="cell">50</li><li class="cell">51</li><li class="cell">52</li><li class="cell">53</li><li class="cell">54</li><li class="cell">55</li><li class="cell">56</li><li class="cell">57</li><li class="cell">58</li><li class="cell">59</li></ul></div></div></div> <!----></div></div></div></div> <div data-v-1a6246d2=""></div> <!----> <!----> <div data-v-1a6246d2="" class="row"><div data-v-1a6246d2="" class="col-md-6">
                  Le jeudi 18 novembre 2021
                </div></div></div></div> <div data-v-1a6246d2="" class="row"><div data-v-1a6246d2="" class="col-md-6 form-group"><label data-v-1a6246d2="" for="inputDate">Type d'absence</label> <select data-v-1a6246d2="" id="inputDate" class="form-control custom-select"><option value="5d5d44f21c9d44000095e03f">Congé acquis</option><option value="5d5d66651c9d44000095e043">Congé exceptionnel</option><option value="5d5f8e391c9d440000b85e98">Formation</option><option value="5d5f8e431c9d440000b85e9a">Récupération &amp; RTT</option><option value="5d5f94421c9d440000c36279">Arrêt maladie</option><option value="5d63e2f91c9d440000c82c3e">Congé par anticipation</option><option value="5eff4abde7117497d5ffe762">Congé sans solde</option><option value="5f1a9eaa7c719f8c3cef2355">Modulation des horaires</option><option value="5f1acb917c719f8c3cef2356">Autorisation d'absence</option><option value="5f1acbaf7c719f8c3cef2357">Absence injustifiée</option></select> <!----></div> <div data-v-1a6246d2="" class="col-md-6 form-group"><label data-v-1a6246d2="" for="inputComment">Commentaire</label> <textarea data-v-1a6246d2="" id="inputComment" rows="3" class="form-control"></textarea></div></div></form></div></div></form></div></main>
		
		</div>

        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" async=""></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" async=""></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/four_button.js" async=""></script>
        <script src="https://kit.fontawesome.com/dfff9200d3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
        <!-- Datepicker -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Datatables -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript"
                src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
        </script>

        <script>
                                    function etat(etat, id) {
                                        $.ajax({
                                            type: "POST",
                                            url: "edit_status.php?etat=" + etat + "&id=" + id,

                                            success: function (o) {
                                                $('#__BVID__92').DataTable().ajax.reload();
                                                $('#__BVID__92e0').DataTable().ajax.reload();
                                                $('#__BVID__92e1').DataTable().ajax.reload();
                                                $('#__BVID__92e2').DataTable().ajax.reload();
                                                $('#__BVID__92e3').DataTable().ajax.reload();
                                                $('#__BVID__92e4').DataTable().ajax.reload();
                                                $('#__BVID__92e5').DataTable().ajax.reload();
                                            }
                                        })
                                    }
                                    function ft() {

                                        document.getElementById("et").style.display = "block";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";

                                    }
                                    function f0() {
                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "block";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";

                                    }

                                    function f1() {
                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "block";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";

                                    }

                                    function f2() {
                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "block";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";

                                    }


                                    function f3() {

                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "block";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "none";

                                    }

                                    function f4() {

                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "block";
                                        document.getElementById("e5").style.display = "none";

                                    }
                                    function f5() {

                                        document.getElementById("et").style.display = "none";
                                        document.getElementById("e0").style.display = "none";
                                        document.getElementById("e1").style.display = "none";
                                        document.getElementById("e2").style.display = "none";
                                        document.getElementById("e3").style.display = "none";
                                        document.getElementById("e4").style.display = "none";
                                        document.getElementById("e5").style.display = "block";



                                    }

        </script>


        <script>
            $(document).ready(function () {

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                document.getElementById("start_date").value =date; // empty value
                document.getElementById("end_date").value=date;
                var start_date = $("#start_date").val();
                var end_date = $("#end_date").val();
                if (start_date == "" || end_date == "") {
                    alert("both date required");
                } else {
                    loTable = $('#__BVID__92').DataTable({
                        "pageLength": 50,
                        "processing": false,
                        "serverSide": true,
                        "ajax": "<?php echo url ?>dateRangeF.php?start_date="+start_date+"&end_date="+end_date+"",
                        "dom": 'Bfrtip',
                        "order": [[1, "asc"]], //or asc,
                        buttons: [
                            {
                                extend: 'csv',
                            }

                        ],
                        "oLanguage": {
                            "oPaginate": {

                                "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                                "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                                // This is the link to the last page
                            },
                        },
                    });}
                $('#__BVID__34').keyup(function () {

                   //loTable.search($(this).val()).draw();
                })
            });

            $(document).on("click", "#filter", function(e) {
                e.preventDefault();
                var start_date = $("#start_date").val();
                var end_date = $("#end_date").val();
                if (start_date == "" || end_date == "") {
                    alert("both date required");
                } else {
                    loTable.destroy();
                    loTable = $('#__BVID__92').DataTable({
                        "pageLength": 50,
                        "processing": false,
                        "serverSide": true,
                        "ajax": "<?php echo url ?>dateRangeF.php?start_date="+start_date+"&end_date="+end_date+"",
                        "dom": 'Bfrtip',
                        "order": [[1, "asc"]], //or asc,
                        buttons: [
                            {
                                extend: 'csv',
                            }

                        ],
                        "oLanguage": {
                            "oPaginate": {

                                "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                                "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                                // This is the link to the last page
                            },
                        },
                    });

                }
            });
            // Reset

            $(document).on("click", "#reset", function() {

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                document.getElementById("start_date").value =date; // empty value
                document.getElementById("end_date").value=date;
                var start_date = date;
                var end_date = date;
                loTable.destroy();

                loTable = $('#__BVID__92').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>dateRangeF.php?start_date="+start_date+"&end_date="+end_date+"",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });


            });

            $(document).ready(function () {

                oTable = $('#__BVID__92e0').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe0.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });


            });

            $(document).ready(function () {

                oTable = $('#__BVID__92e1').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe1.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            });


            $(document).ready(function () {

                oTable = $('#__BVID__92e2').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe2.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            });



            $(document).ready(function () {

                oTable = $('#__BVID__92e3').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe3.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            });


            $(document).ready(function () {
                oTable = $('#__BVID__92e4').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe4.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });
            });

            $(document).ready(function () {

                oTable = $('#__BVID__92e5').DataTable({
                    "pageLength": 50,
                    "processing": false,
                    "serverSide": true,
                    "ajax": "<?php echo url ?>findefe5.php",
                    "dom": 'Bfrtip',
                    "order": [[1, "asc"]], //or asc,
                    buttons: [
                        {
                            extend: 'csv',
                        }

                    ],
                    "oLanguage": {
                        "oPaginate": {

                            "sPrevious": '<i class="fas fa-backward"></i>', // This is the link to the previous page
                            "sNext": '<i class="fas fa-forward"></i>', // This is the link to the next page
                            // This is the link to the last page
                        },
                    },
                });


            });
            function fff() {
                var x = document.getElementById("BV_popover_1");
                if (x.style.display === 'none') {
                    $('#BV_popover_1').addClass('show');
                    document.getElementById("BV_popover_1").style.display = "unset";
                } else {
                    document.getElementById("BV_popover_1").style.display = "none";
                }
            }


            function fun() {
                document.getElementById("addet").style.display = "block";
                document.getElementById("listet").style.display = "none";
                document.getElementById("listetaj").style.display = "none";


            }

            function fun2() {
                document.getElementById("listet").style.display = "block";
                document.getElementById("addet").style.display = "none";
                document.getElementById("listetaj").style.display = "none";
            }


            function ff() {
                var x = document.getElementById("BV_popover_1");
                if (x.style.display === 'unset') {
                    document.getElementById("BV_popover_1").style.display = "none";
                }

            }

            function fg() {
                document.getElementById("BV_popover_1").style.display = "none";
            }

            function color1(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color2(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color3(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color4(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color5(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color6(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color7(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color8(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color9(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

            function color10(x, y, z) {
                document.getElementById("rb1").value = x;
                document.getElementById("rb2").value = y;
                document.getElementById("rb3").value = z;
            }

        </script>

        <script>
            function adde() {
                var x = document.getElementById("rb1").value;
                var y = document.getElementById("rb2").value;
                var z = document.getElementById("rb3").value;
                var etnom = document.getElementById("etnom").value;
                $.ajax({
                    type: "POST",
                    url: "addet.php",
                    data: {
                        x: x,
                        y: y,
                        z: z,
                        etnom: etnom,
                    },

                    success: function (o) {
                        document.getElementById("listet").style.display = "none";
                        document.getElementById("addet").style.display = "none";
                        document.getElementById("listetaj").style.display = "block";
                        document.getElementById("listetaj").innerHTML = o;

                    }
                });
            }

            function diet(id) {

                $.ajax({
                    type: "POST",
                    url: "aff.php",
                    data: {
                        id: id,
                    },

                    success: function (o) {
                        document.getElementById("etq").innerHTML += o;
                        document.getElementById("tdd_" + id).style.display = "none";
                        document.getElementById("BV_popover_1").style.display = "none";

                    }
                });

            }

            function org(id) {
                document.getElementById("divv_" + id).remove();
                document.getElementById("tdd_" + id).style.display = "block";
            }


        </script>


        <!-- Latest compiled JavaScript -->

        <!-- These are the necessary files for the image uploader -->
        <script src="dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
        <script src="dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>
        <script>
            /*jslint unparam: true */
            /*global window, $ */

            var max_uploads = 100

            $(function () {
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
                            $('#uploaded_file_name').val(data['result']);
                            $('#uploaded_images').html('<div class="uploaded_image"> <input type="text" value="' + data['result'] + '" name="img1" id="uploaded_image_name" hidden> <img src="images/' + data['result'] + '" style="width: 200px;height: 200px;padding-left: 0px;padding-right: 0px;left: 0px;text-align: center;"/> <a href="#" style="margin-top:40px;margin-right: 40px;left: 0px;right: 0px;margin-left: 54px;" class="img_rmv btn btn-danger"><i class="fa fa-times-circle" id=supp" style="font-size:48px;color:red"></i></a> </div>');
                            $('#uploaded_images2').hide();
                            if ($('.uploaded_image').length >= max_uploads) {
                                $('#select_file').hide();
                            } else {
                                $('#select_file').show();
                            }
                        }


                        $.each(data.result.files, function (index, file) {
                            $('<p/>').text(file.name).appendTo('#files');
                        });

                    },

                }).prop('disabled', !$.support.fileInput)
                        .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });

            $("#uploaded_images").on("click", ".img_rmv", function () {
                $(this).parent().remove();
                $('#uploaded_image').hide();

                $('#uploaded_images2').show();

                if ($('.uploaded_image').length >= max_uploads) {
                    $('#select_file').hide();
                } else {
                    $('#select_file').show();
                }
            }
            );


        </script>

    </body>
</html>