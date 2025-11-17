<?php
header("Content-Type: application/json");

include "db_connect.php";

$q = isset($_GET['q']) ? strtolower($_GET['q']) : '';

$certificates = [];
$sql = "select Cerificate from Coach";
$result = $conn->query($sql);

if($result) {
    while($row = $result->fetch_assoc()){
        $certificates[] = $row['Cerificate'];
    }
}

$certificates = array_unique($certificates);

$filtered = [];

if ($q !== "") {
    foreach ($certificates as $certificate){
        if(strpos(strtolower($certificate), $q) !== false){
            $filtered[] = $certificate;
        }
    }
} else {
    $filtered = $certificates;
}

echo json_encode(array_values($filtered));
exit;
?>