<?php
    $servername = "";
    $username = "";
    $password = "";
    $db_name = "Injury_Tracker";

    $conn = new mysqli($servername,$username,$password,$db_name);

    if($conn->connect_error) {
        die("Conncetion failed: " . $conn->connect_error);
    }
?>