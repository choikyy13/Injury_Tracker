<?php
header("Content-Type: application/json");

include "db_connect.php";

$q = isset($_GET['q']) ? strtolower($_GET['q']) : '';

$all_interests = [];
$sql = "select Interest from Public";
$result = $conn->query($sql);

if($result) {
    while($row = $result->fetch_assoc()){
        $parts = explode(",", $row["Interest"]);
        foreach ($parts as $p){
            $p = trim($p);
            if ($p !== ""){
                $all_interests[] = $p;
            }
        }
    }
}

$all_interests = array_unique($all_interests);

$filtered = [];

if ($q !== "") {
    foreach ($all_interests as $i){
        if(strpos(strtolower($i), $q) !== false){
            $filtered[] = $i;
        }
    }
} else {
    $filtered = $all_interests;
}

echo json_encode(array_values($filtered));
exit;
?>