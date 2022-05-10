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
$table = 'user';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
    array('db' => 'nom', 'dt' => 0),
    array('db' => 'id', 'dt' => 0, 'formatter' => function($d, $row) {
            include 'db.php';
            $tab2 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE id=" . $d . ""));
            if ($tab2['etat'] == 0) {

                return '<td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
                <div class="form-check form-switch">
                        <input class="form-check-input"  name="' . $d . '" type="checkbox" id="ch_' . $d . '" data-bs-toggle="modal" data-bs-target="#exampleModal_' . $d . '"  >
                        <label class="form-check-label" for="ch_' . $d . '"></label>
                            <input type="hidden" id="prdid_' . $d . '" value="' . $d . '">
                    </div>
                    </td>
                    

<div class="modal fade" id="exampleModal_' . $d . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">USER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div data-v-05970cda="" class="all-width">
                            <div class="row">
                                <div class="col-md-6 col-sm-6" style="text-align:center;">
                                    <a href="del_u.php?id=' . $d . '" ><button type="button" class="" id="supp"  style="text-align:center;color: #fff;background: #AD0B00;border: 1px solid #AD0B00;padding: 12px;border-radius: 4px; "><i class="fas fa-trash-alt"></i> Supprimer</button> </a>
                                </div>
                                <div class="col-md-6 col-sm-6" style="text-align:center;">
                                   <a href="deactiv.php?id=' . $d . '" ><button type="button" class="" id="edit"  style="text-align:center;color: #fff;background: #7C7C7C;border: 1px solid #7C7C7C;padding: 12px;border-radius: 4px; "><i class="far fa-hand-paper"></i> Déactiver</button> </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    
            ';
            } else {
                return '<td aria-colindex="1" data-label="Sélectionné" role="cell" class="">
                <div class="form-check form-switch">
                        <input class="form-check-input"  name="' . $d . '" type="checkbox" id="ch_' . $d . '" data-bs-toggle="modal" data-bs-target="#exampleModal_' . $d . '"  >
                        <label class="form-check-label" for="ch_' . $d . '"></label>
                            <input type="hidden" id="prdid_' . $d . '" value="' . $d . '">
                    </div>
                    </td>
                    

<div class="modal fade" id="exampleModal_' . $d . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">USER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div data-v-05970cda="" class="all-width">
                            <div class="row">
                                <div class="col-md-12 col-sm-12" style="text-align:center;">
                                    <a href="activ_u.php?id=' . $d . '" ><button type="button" class="" id="active"  style="text-align:center;color: #fff;background: #7C7C7C;border: 1px solid #7C7C7C;padding: 12px;border-radius: 4px; "><i class="fab fa-500px"></i> Activer</button> </a>
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
    array('db' => 'id', 'dt' => 1, 'formatter' => function($d, $row) {
            include 'db.php';
            $tab1 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE id=" . $d . ""));

            return
            '<div style="text-align: center;">
                            ' . $tab1['prenom'] . ' ' . $tab1['nom'] . ' 
                            
                            
</div>';
        }),
    array('db' => 'email', 'dt' => 2),
    array('db' => 'id', 'dt' => 3, 'formatter' => function($d, $row) {
            include 'db.php';

            $tab = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE id=" . $d . ""));
            if ($tab['role'] == 1) {


                return

                        '<div>   
                            <div data-v-143dd668="" class="clickable-tags">
                                <div  class="tag badge permanent" style="background-color:#28B5BF;padding:4px !important;margin-bottom: 2px; ">
                                    Administrateur  
                                </div>

                            </div> </div>';
            }if ($tab['role'] == 2) {


                return

                        '<div>   <a href="' . url . 'detail_client.php?id=' . $d . '" >
                            <div data-v-143dd668="" class="clickable-tags">
                                <div  class="tag badge permanent" style="background-color:#28B5BF;padding:4px !important;margin-bottom: 2px; ">
                                    Gestion 
                                </div>

                            </div>
                        </a> </div>';
            }if ($tab['role'] == 3) {


                return

                        '<div>
                            <div data-v-143dd668="" class="clickable-tags">
                                <div  class="tag badge permanent" style="background:#28B5BF" ;padding:4px !important;margin-bottom: 2px; ">
                                    Direction
                                </div>

                            </div> </div>';
            }
        }),
    array('db' => 'email', 'dt' => 4, 'formatter' => function($d, $row) {
            return '<div style="display:none">
                        <span data-v-6a7eb354="" class="product_image"> <img  width="47" height="47"  src="' . $d . '" loading="lazy"></span>
                            </div>';
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
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
?>