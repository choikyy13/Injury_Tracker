<?php
header("Content-Type: application/json");

// your search data list (fake)
$tags = array(
    "Athlete",
    "Team",
    "Coach",
    "Schedule",
    "Training",
    "Match",
    "Ranking",
    "Country",
    "Award",
    "Record"
);

$q = isset($_GET['q']) ? strtolower($_GET['q']) : "";
$result = [];

if ($q !== "") {
    foreach ($tags as $tag){
        if(strpos(strtolower($tag), $q) !== false){
            $result[] = $tag;
        }
    }
} else {
    $result = $tags;
}


echo json_encode($result);
?>