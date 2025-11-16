<?php
header("Content-Type: application/json");

include "db_connect.php";

$q = isset($_GET['q']) ? strtolower($_GET['q']) : '';

$names= [];
$sql = "select User_name from Users";
$result = $conn->query($sql);
if($result) {
    while($row = $result->fetch_assoc()){
        $names[] = $row['User_name'];
    }
}

$filtered = [];

if ($q !== "") {
    foreach ($names as $name){
        if(strpos(strtolower($name), $q) !== false){
            $filtered[] = $name;
        }
    }
} else {
    $filtered = $names;
}

echo json_encode($filtered);
exit;
?>