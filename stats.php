<?php
include 'db.php';
mysqli_set_charset($link, "utf8mb4");

$start = $_POST["start"];
$end = $_POST["end"];

$turnover_request = "SELECT SUM(prix_ht) AS turnover FROM ( SELECT `prix_ht` FROM `facture` WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y') UNION ALL SELECT `prix_ht` FROM `espace` WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y') ) AS UEF";
$response_turnover = mysqli_fetch_array(mysqli_query($link, $turnover_request));
$turnover = $response_turnover['turnover'];

$sales_request = "SELECT SUM(count_all) as count_sum FROM (SELECT COUNT(*) AS count_all FROM `facture` WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y') UNION ALL SELECT COUNT(*) AS count_all FROM `espace` WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y')) AS CEF";
$response_count = mysqli_fetch_array(mysqli_query($link, $sales_request));
$count = $response_count['count_sum'];
$sales = $turnover / $count;

$best_client_request = "SELECT * FROM client WHERE id = ( SELECT client FROM ( SELECT `prix_ht`, `client` FROM facture WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y') UNION ALL SELECT `prix_ht`, `client` FROM espace WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y')) AS UEF2 GROUP BY client HAVING SUM(prix_ht) = ( SELECT MAX(best) FROM ( SELECT client, SUM(prix_ht) best FROM ( SELECT `prix_ht`, `client` FROM facture WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y') UNION ALL SELECT `prix_ht`, `client` FROM espace WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y')) AS UEF GROUP BY client ) AS CEF ) )";
$response_client = mysqli_fetch_array(mysqli_query($link, $best_client_request));
$best_client = $response_client["prenom"] . " " . $response_client["nom"];

$best_products_request = "SELECT `id_prod` FROM detail_facture JOIN facture ON facture.id = detail_facture.id_devis WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y') UNION ALL SELECT `id_prod` FROM detail_espace JOIN espace ON espace.id = detail_espace.id_devis WHERE STR_TO_DATE(`date_add`, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y')";
$response_list = mysqli_query($link, $best_products_request);
$list = [];

// Sum product count
while ($item = mysqli_fetch_array($response_list)) {
    if ($item["id_prod"]) {
        $split = explode(',', $item["id_prod"]);
        if ($list[$split[0]]) {
            $list[$split[0]] += $split[1];
        } else {
            $list[$split[0]] = $split[1];
        }
    }
}
// Sort products desc
arsort($list);
// Slice max 10 product
$max_list = array_slice($list, 0, 10, true);
// Get products names
$best_products = [];
foreach ($max_list as $key => $value) {
    $product = mysqli_fetch_array(mysqli_query($link, "SELECT nom FROM produit WHERE id = $key"));
    $best_products[] = ["item" => $product["nom"], "count" => $value];
}

echo json_encode(
    [
        "turnover" => $turnover,
        "sales" => $sales,
        "best_client" => $best_client,
        "best_products" => $best_products,
    ]);
