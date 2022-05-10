<?php

// Load the database configuration file 
include 'db.php';


$delimiter = ",";

// Create a file pointer 
$f = fopen('php://memory', 'w');

// Set column headers 
$fields = array('ID', 'Image', 'Nom', 'Reference', 'Prix de base', 'Prix final', 'Etat');
fputcsv($f, $fields, $delimiter);

// Get records from the database 
$prd_sql = mysqli_query($link, "SELECT * FROM produit");
while ($prd = mysqli_fetch_array($prd_sql)) {
    if ($prd['stock'] <= ( $prd['stock_min'] - 1 )) {

        $row_sql = mysqli_query($link, "SELECT * FROM produit where id=" . $prd['id'] . "");
        $num = mysqli_num_rows(mysqli_query($link, "SELECT * FROM produit where id=" . $prd['id'] . ""));


        if ($num > 0) {
            // Output each row of the data, format line as csv and write to file pointer 
            while ($row = mysqli_fetch_array($row_sql)) {
                $filename = "produitsundermin.csv";
                if ($prd['stocka'] == '1') {
                    $lineData = array($row['id'], $row['img'], $row['nom'], $row['ref'], $row['cout_achat_ht'], $row['prix_ttc'], $row['etat']);
                }
                fputcsv($f, $lineData, $delimiter);
            }
        }
    }
}

// Move back to beginning of file 
fseek($f, 0);

// Set headers to download file rather than displayed
header("Cache-Control: private");
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

// Output all remaining data on a file pointer 
fpassthru($f);

// Exit from file 

exit();
?>