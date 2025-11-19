<?php
    $servername = "";
    $username = "";
    $password = "";
    $db_name = "";

    $conn = new mysqli($servername,$username,$password,$db_name);

    if($conn->connect_error) {
        die("Conncetion failed: " . $conn->connect_error);
    }
?>