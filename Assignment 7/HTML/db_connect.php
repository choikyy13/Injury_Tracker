<?php
    $servername = "localhost";
    $username = "root";
    $password = "Tt1609t";
    $db_name = "injury Tracker";

    $conn = new mysqli($servername,$username,$password,$db_name);

    if($conn->connect_error) {
        die("Conncetion failed: " . $conn->connect_error);
    }
?>