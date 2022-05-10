<?php
// Load the database configuration file 
include 'db.php';

// Set column headers 
$fields = array('ID', 'Image', 'Nom', 'Reference', 'Prix de base', 'Prix final', 'Etat');

// Display column names as first row
$excelData = implode("\t", array_values($fields)) . "\n";

// Get records from the database 
$prd_sql = mysqli_query($link, "SELECT * FROM produit");
while ($prd = mysqli_fetch_array($prd_sql)) {
    if ($prd['stock'] <= ( $prd['stock_min'] - 1 )) {

        $row_sql = mysqli_query($link, "SELECT * FROM produit where id=" . $prd['id'] . "");
        $num = mysqli_num_rows(mysqli_query($link, "SELECT * FROM produit where id=" . $prd['id'] . ""));
        if ($num > 0) {
            // Output each row of the data
            while ($row = mysqli_fetch_array($row_sql)) {
                $filename = "produitsundermin.xls";
                if ($prd['stocka'] == '1') {
                    $lineData = array($row['id'], $row['img'], $row['nom'], $row['ref'], $row['prix_ht'], $row['prix_ttc'], $row['etat']);
                    $excelData .= implode("\t", array_values($lineData)) . "\n";
                }
            }
        }
    }
}

// Headers for download
header("Cache-Control: private");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

// Render excel data
echo $excelData;

// Exit from file
exit();
?>