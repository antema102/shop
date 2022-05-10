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

        <main class="main"><div class="container-xxl"><div class="row"><div class="col-12"><div class="menu-tabs mt-4"><a class="tab active">Calendrier</a><a class="tab">Demandes</a></div></div></div></div> <div data-v-80a5e654="" id="content-wrapper" class="container-xxl"><div data-v-80a5e654="" class="row row_header mb-4"><div data-v-80a5e654="" class="col-xl-6 col-md-6"><h1 data-v-80a5e654="" class="title header-form">Calendrier des absences</h1></div> <div data-v-80a5e654="" class="col-md-6 d-flex justify-content-end"><div data-v-5232cd18="" data-v-80a5e654="" class="actions sub-menu absence"><div data-v-5232cd18="" class="dropdown-item"><a data-v-5232cd18="" href="/absences/add" class="w_actions_button has-tooltip" data-original-title="null"><i data-v-5232cd18="" class="icon ion-ios-add"></i><span data-v-5232cd18="">Demander une absence</span></a> <!----></div> <div data-v-e0aacb1e="" data-v-5232cd18="" class="fab-main-container fl-act-btn" start-opened="true"><div data-v-77282e1a="" data-v-e0aacb1e="" class="fab-cantainer fab fab-size-big" data-outside="true" style="transition-timing-function: cubic-bezier(0.24, 0.97, 0.81, 1.2); z-index: 5; background: rgb(22, 194, 194); box-shadow: rgb(102, 102, 102) 0px 2px 8px;"><div data-v-77282e1a="" class="fabMask"></div> <!----> <i data-v-e0aacb1e="" data-v-77282e1a="" data-outside="true" class="icons iconfont vue-fab-material-icons vue-fab-iconfont-icons ion-ios-add" style="font-size: 15px;"></i></div> <div data-v-e0aacb1e="" class="fab-item-container fab-size-big"><div data-v-77282e1a="" data-v-2c36071f="" data-v-5232cd18="" class="fab-cantainer fab-item fab-shadow" data-v-e0aacb1e="" style="transition: all 0.4s cubic-bezier(0.16, 1.01, 0.61, 1.2) 0s; top: 0px; opacity: 0; background: rgb(255, 255, 255); transform: translate3d(0px, 0px, 0px); z-index: 0; display: none;"><div data-v-77282e1a="" class="fabMask"></div> <div data-v-2c36071f="" data-v-77282e1a="" class="fab-item-title" style="color: rgb(102, 102, 102); background: white;">
        Demander une absence
      </div> <i data-v-2c36071f="" data-v-77282e1a="" class="vue-fab-material-icons iconfont ion-ios-add" style="font-size: 10px; color: rgb(153, 153, 153);"></i></div></div></div> <!----></div></div></div> <div data-v-80a5e654="" class="calendar"><div data-v-80a5e654="" class="comp-full-calendar"><div class="full-calendar-header"><div class="header-center"><span class="prev-year"><i class="icon ion-ios-arrow-back"></i><i class="icon ion-ios-arrow-back"></i></span> <span class="prev-month"><i class="icon ion-ios-arrow-back"></i></span> <span class="title">Novembre 2021</span> <span class="next-month"><i class="icon ion-ios-arrow-forward"></i></span> <span class="next-year"><i class="icon ion-ios-arrow-forward"></i><i class="icon ion-ios-arrow-forward"></i></span></div></div> <div data-v-348395a0="" class="full-calendar-body"><div data-v-348395a0="" class="weeks"><strong data-v-348395a0="" class="week">Lun</strong><strong data-v-348395a0="" class="week">Mar</strong><strong data-v-348395a0="" class="week">Mer</strong><strong data-v-348395a0="" class="week">Jeu</strong><strong data-v-348395a0="" class="week">Ven</strong><strong data-v-348395a0="" class="week">Sam</strong><strong data-v-348395a0="" class="week">Dim</strong></div> <div data-v-348395a0="" class="dates"><div data-v-348395a0="" class="dates-bg"><div data-v-348395a0="" class="week-row"><div data-v-348395a0="" class="day-cell holiday"><p data-v-348395a0="" class="day-number">1</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">2</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">3</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">4</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">5</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">6</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">7</p></div></div><div data-v-348395a0="" class="week-row"><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">8</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">9</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">10</p></div><div data-v-348395a0="" class="day-cell holiday"><p data-v-348395a0="" class="day-number">11</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">12</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">13</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">14</p></div></div><div data-v-348395a0="" class="week-row"><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">15</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">16</p></div><div data-v-348395a0="" class="day-cell today"><p data-v-348395a0="" class="day-number">17</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">18</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">19</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">20</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">21</p></div></div><div data-v-348395a0="" class="week-row"><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">22</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">23</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">24</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">25</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">26</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">27</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">28</p></div></div><div data-v-348395a0="" class="week-row"><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">29</p></div><div data-v-348395a0="" class="day-cell"><p data-v-348395a0="" class="day-number">30</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">1</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">2</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">3</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">4</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">5</p></div></div><div data-v-348395a0="" class="week-row"><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">6</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">7</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">8</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">9</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">10</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">11</p></div><div data-v-348395a0="" class="day-cell not-cur-month"><p data-v-348395a0="" class="day-number">12</p></div></div></div> <div data-v-348395a0="" class="dates-events"><div data-v-348395a0="" class="events-week"><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">1</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">2</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">3</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">4</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">5</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">6</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">7</p> <div data-v-348395a0="" class="event-box"></div></div></div><div data-v-348395a0="" class="events-week"><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">8</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">9</p> <div data-v-348395a0="" class="event-box"><p data-v-348395a0="" class="event-item  rtt is-start is-end has-tooltip" data-original-title="null">
                Deco Deco
              </p></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">10</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">11</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">12</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">13</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">14</p> <div data-v-348395a0="" class="event-box"></div></div></div><div data-v-348395a0="" class="events-week"><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">15</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">16</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day today"><p data-v-348395a0="" class="day-number">17</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">18</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">19</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">20</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">21</p> <div data-v-348395a0="" class="event-box"></div></div></div><div data-v-348395a0="" class="events-week"><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">22</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">23</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">24</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">25</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">26</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">27</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">28</p> <div data-v-348395a0="" class="event-box"></div></div></div><div data-v-348395a0="" class="events-week"><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">29</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day"><p data-v-348395a0="" class="day-number">30</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">1</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">2</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">3</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">4</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">5</p> <div data-v-348395a0="" class="event-box"></div></div></div><div data-v-348395a0="" class="events-week"><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">6</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">7</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">8</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">9</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">10</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">11</p> <div data-v-348395a0="" class="event-box"></div></div><div data-v-348395a0="" track-by="$index" class="events-day not-cur-month"><p data-v-348395a0="" class="day-number">12</p> <div data-v-348395a0="" class="event-box"></div></div></div></div> <div data-v-348395a0="" class="more-events" style="left: 0px; top: 0px; display: none;"><div data-v-348395a0="" class="more-header"><span data-v-348395a0="" class="title">Jeu 17 Novembre</span> <span data-v-348395a0="" class="close">x</span></div> <div data-v-348395a0="" class="more-body"><ul data-v-348395a0="" class="body-list"></ul></div></div> <div data-v-348395a0=""></div></div></div></div> <div data-v-80a5e654="" class="my-legend"><!----> <div data-v-80a5e654="" class="users full-width"><div data-v-80a5e654="" class="legend-title"><i data-v-80a5e654="" class="icon ion-ios-person"></i>
          Utilisateurs
          <select data-v-80a5e654="" class="states inline inline-auto custom-select"><option value="">-- Tous --</option> <option value="active">Actifs</option> <option value="inactive"> Inactifs</option></select></div> <div data-v-80a5e654=""><div data-v-80a5e654="" class="legend-scale flex"><span data-v-80a5e654=""><label data-v-25adc6c0="" data-v-80a5e654="" class="vue-js-switch toggled" id="60cf4fc986d56d317657c9ff"><input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(0, 189, 175); border-radius: 9px;"><div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(18px, 3px, 0px);"></div></div> <!----></label> <label data-v-80a5e654="">Bilel Bilel</label></span><span data-v-80a5e654=""><label data-v-25adc6c0="" data-v-80a5e654="" class="vue-js-switch toggled" id="6148931a3bc71e3e90d8d8e0"><input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(0, 189, 175); border-radius: 9px;"><div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(18px, 3px, 0px);"></div></div> <!----></label> <label data-v-80a5e654="">Bill Bill</label></span><span data-v-80a5e654=""><label data-v-25adc6c0="" data-v-80a5e654="" class="vue-js-switch toggled" id="6159b53ca866ee6bb2276b3b"><input data-v-25adc6c0="" type="checkbox" class="v-switch-input"> <div data-v-25adc6c0="" class="v-switch-core" style="width: 33px; height: 18px; background-color: rgb(0, 189, 175); border-radius: 9px;"><div data-v-25adc6c0="" class="v-switch-button" style="width: 12px; height: 12px; transition: transform 300ms ease 0s; transform: translate3d(18px, 3px, 0px);"></div></div> <!----></label> <label data-v-80a5e654="">Deco Deco</label></span></div></div> <div data-v-80a5e654=""><a data-v-80a5e654="" class="link wuro-link">tout décocher</a></div></div> <div data-v-80a5e654="" class="legend-title"><i data-v-80a5e654="" class="icon ion-ios-briefcase"></i>Types d'absences</div> <div data-v-80a5e654="" class="legend-scale"><ul data-v-80a5e654="" class="legend-labels"><li data-v-80a5e654=""><span data-v-80a5e654="" style="background: rgb(153, 224, 220);"></span>Congé payé</li> <li data-v-80a5e654=""><span data-v-80a5e654="" style="background: rgb(255, 95, 117);"></span>Congé exceptionnel</li> <li data-v-80a5e654=""><span data-v-80a5e654="" style="background: rgb(255, 152, 121);"></span>Formation</li> <li data-v-80a5e654=""><span data-v-80a5e654="" style="background: rgb(255, 199, 96);"></span>Arrêt maladie</li> <li data-v-80a5e654=""><span data-v-80a5e654="" style="background: rgb(113, 195, 127);"></span>Récupération &amp; RTT</li> <li data-v-80a5e654=""><span data-v-80a5e654="" style="background: rgb(164, 255, 164);"></span>Modulation des horaires</li> <li data-v-80a5e654=""><span data-v-80a5e654="" style="background: rgb(233, 210, 255);"></span>Autorisation d'absence</li> <li data-v-80a5e654=""><span data-v-80a5e654="" style="background: rgb(210, 166, 166);"></span>Absence injustifiée</li> <li data-v-80a5e654=""><span data-v-80a5e654="" style="background: repeating-linear-gradient(-45deg, rgb(122, 255, 234), rgb(122, 255, 234) 10px, rgba(0, 0, 0, 0) 10px, rgba(0, 0, 0, 0) 20px);"></span>En
            attente
          </li></ul></div></div></div></div></main>
		
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