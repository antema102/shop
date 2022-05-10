<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'avoir';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
    array('db' => 'id', 'dt' => 0, 'formatter' => function($d, $row) {
            include 'db.php';
            $dev = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `avoir` WHERE id=" . $d . ""));
            return '
    <a href="detail_avoir.php?id=' . $d . '" >' . $dev['num'] . '</a>';
        }),
    array('db' => 'id', 'dt' => 1, 'formatter' => function($d, $row) {

            include 'db.php';
            $dev = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `avoir` WHERE id=" . $d . ""));
            $tab1 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `client` WHERE id=" . $dev['client'] . ""));
            $letter = strtoupper(substr($tab1['nom'], 0, 1));
            if ($tab1['img'] == '') {
                return
                        '<div style="text-align: center;">
                            <a href="' . url . 'detail_avoir.php?id=' . $d . '" >
                <div data-v-143dd668="" class="flex">
                    <span data-v-143dd668="" class="btbt">
                        <span data-v-143dd668="">
                            <span data-v-143dd668=""> ' . $letter . ' </span>
                        </span>
                    </span> 
                
                <div data-v-143dd668="" class="flex direction">
                    <div data-v-143dd668="" class="client-name">' . $tab1['prenom'] . ' ' . $tab1['nom'] . '</div></div></div></a></div>';
            } else {
                return
                        '<div style="text-align: center;">
                            <a href="' . url . 'detail_avoir.php?id=' . $d . '" >
                <div data-v-143dd668="" class="flex">
                    <span data-v-143dd668="" class="bb">
                    <img class="ifarmeimcg" src="' . $tab1['img'] . '">
                    </span> 
                
                <div data-v-143dd668="" class="flex direction">
                    <div data-v-143dd668="" class="client-name">' . $tab1['nom'] . ' ' . $tab1['prenom'] . '</div></div></div> </a></div>';
            }
        }),
    
    array('db' => 'date_add', 'dt' => 2),
    array('db' => 'id', 'dt' => 3, 'formatter' => function($d, $row) {
        include 'db.php';
        $dev = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `avoir` WHERE id=" . $d . ""));
        return '' . number_format($dev['prix_ttc'], 2, ".", " ") . ' €' . ' </br>' . '<small class="light-text">' . number_format($dev['prix_ht'], 2, ".", " ") . ' € HT' . '</small>';
    }),
    array('db' => 'id', 'dt' => 4, 'formatter' => function($d, $row) {
        include 'db.php';
        $avoir = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `avoir` WHERE id=" . $d . ""));

        if ($avoir['etat_avoir'] == 1) {
            return '<i class="fas fa-circle" style="color:#28B5BF ;margin-right:12px;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal_' . $d . '"></i>';
        }

        if ($avoir['etat_avoir'] == 2) {
            return '<i class="fas fa-circle" style="color:#9CDF49 ;margin-right:12px;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal4_' . $d . '"></i>      ';
        }

    }),
        /* array('db' => 'nom', 'dt' => 7, 'formatter' => function($d, $row) {
          return '<td><div id="hi" style="display:none">' . $d . '</div></td>';
          }),
          array('db' => 'email', 'dt' => 8, 'formatter' => function($d, $row) {
          return '<td><div id="hi" style="display:none">' . $d . '</div></td>';
          }),
          array('db' => 'tel', 'dt' => 9, 'formatter' => function($d, $row) {
          return '<td><div id="hi" style="display:none">' . $d . '</div></td>';
          }),
          array('db' => 'mob', 'dt' => 10, 'formatter' => function($d, $row) {
          return '<td><div id="hi" style="display:none">' . $d . '</div></td>';
          }), */
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    ' pass' => '',
    'db' => 'project',
    'host' => 'localhost'
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
        SSP::complex22($_GET, $sql_details, $table, $primaryKey, $columns, null)
);
?>