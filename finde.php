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
$table = 'produit';

// Table's primary key
$primaryKey = 'id';

$condition = '';
if(isset($_GET['status'])) {
   if($_GET['status'] == 'bleu') $condition = 'stock = 0';
    if($_GET['status'] == 'green') $condition = 'stock > stock_min+1';
    if($_GET['status'] == 'orange') $condition = 'stock = stock_min+1';
    if($_GET['status'] == 'red') $condition = 'stock <= stock_min-1';
}

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
    array('db' => 'id', 'dt' => 0, 'formatter' => function($d, $row) {
        include ('db.php'); 
         
        $user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` where email ='" . $_SESSION['user'] . "' "));
        if ($user['role'] == '1') {
            return '<td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
                <div class="form-check form-switch">
                        <input class="form-check-input"  data-id="' . $d . '" name="checkProducts" type="checkbox" id="ch_' . $d . '" >
                        <label class="form-check-label" for="ch_' . $d . '"></label>
                            <input type="hidden" id="prdid_' . $d . '" value="' . $d . '">
                    </div>
                    </td>
                    
<div class="modal fade" id="exampleModal_' . $d . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Supprimer le(s) produit(s) sélectionné(s)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div data-v-05970cda="" class="all-width">
                            <div class="row">
                                <div class="col-md-4 col-sm-4" style="text-align:center;">
                                </div>

                                <div class="col-md-4 col-sm-4" style="text-align:center;">
                                    <a href="deleteproduit.php?id=' . $d . '" ><button type="button" class="" id="supp"  style="text-align:center;color: #fff;background: #AD0B00;border: 1px solid #AD0B00;padding: 12px;border-radius: 4px; "><i class="fas fa-trash-alt"></i></i> Supprimer</button> </a>
                                </div>
                                <div class="col-md-4 col-sm-4" style="text-align:center;">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    
    ';
        }
    }),
    array('db' => 'ref', 'dt' => 1),
    array('db' => 'img', 'dt' => 2, 'formatter' => function($d, $row) {
        return '<div>
                        <span data-v-6a7eb354="" class="product_image"> <img  width="47" height="47"  src="' . $d . '" loading="lazy"></span>
                            </div>';
    }),
    array('db' => 'id', 'dt' => 3, 'formatter' => function($d, $row) {
        include('db.php');
        $tab = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE id=" . $d . ""));
        return

           '<a href="detailprd.php?id=' . $tab['id'] . '">' . $tab['nom'] . '</a>';
    }),
    array('db' => 'cat_nom', 'dt' => 4),
    array('db' => 'id', 'dt' => 5, 'formatter' => function($d, $row) {
        include('db.php');
        $tab = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE id=" . $d . ""));
        $tt = (float)$tab['prix_ht'];
        $ponte = (float)strpos($tt, ".");
        if ($ponte > 0) {
            $price = number_format((float)$tt, 2, ".", " ")." €";
        } else {
            $price = number_format((float)$tt, 2, ",", " ")." €";
        }
        return $price;
    }),
    array('db' => 'id', 'dt' => 6, 'formatter' => function($d, $row) {
        include('db.php');
        $tab = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE id=" . $d . ""));
        $tt = $tab['prix_ttc'];
        $ponte = strpos($tt, ".");
        if ((float)$ponte > 0) {
            $price = number_format((float)$tt, 2, ".", " ")." €";
        } else {
            $price = number_format((float)$tt, 2, ",", " ")." €";
        }

        return $price;
    }),
    array('db' => 'id', 'dt' => 7, 'formatter' => function($d, $row) {
        include ('db.php');
        $tab = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `produit` WHERE id=" . $d . ""));
        if ((float)$tab['stock'] == '0') {
            return '<i class="fas fa-circle" style="color:#619AD4;margin-right:12px;"></i>';
        } else {
            if ((float)$tab['stock'] <= ((float)$tab['stock_min'] - 1 ) || ((float)$tab['stock'] == -1)) {
                return '<i class="fas fa-circle" style="color:red;margin-right:12px;"></i>';
            }
            if ((float)$tab['stock'] > ((float)$tab['stock_min'] + 1 )) {
                return '<i class="fas fa-circle" style="color:#008000;margin-right:12px;"></i>';
            }
            if ((float)$tab['stock'] == ((float)$tab['stock_min'] + 1 ) || ((float)$tab['stock'] == (float)$tab['stock_min'])) {
                return '<i class="fas fa-circle" style="color:#FF7900;margin-right:12px;"></i>';
            }
        }
    }),
    array('db' => 'nom', 'dt' => 8, 'formatter' => function($d, $row) {
        return '<div style="display:none">
                        <span data-v-6a7eb354="" class="product_image"> <img  width="47" height="47"  src="' . $d . '" loading="lazy"></span>
                            </div>';
    }),
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
    SSP::complex22($_GET, $sql_details, $table, $primaryKey, $columns, null, $condition)
);

?>