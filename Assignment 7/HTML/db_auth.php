<?php 
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $User_name = $_POST['User_name'];
    $Password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT * FROM Admin WHERE User_name = ?");
    $stmt->bind_param("s", $User_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if(password_verify($Password, $row['Password'])){
            $_SESSION['loggedin'] = true;
            $_SESSION['User_name'] = $row['User_name'];
            header("Location: maintenance.php");
            exit();
        } else {
            header("Location: login.php?error=" . urlencode("Invalid password."));
            exit();
        }
    } else {
        header("Location: login.php?error=" . urlencode("No user found with that username."));
        exit();
    }

}
/*
        if ($Password === $row['Password']) { 
            $_SESSION['loggedin'] = true;
            $_SESSION['User_name'] = $row['User_name'];
            
            header("Location: maintenance.php");
            exit();
        }
        else {
            header("Location: login.php?error=" . urlencode("Invalid password."));
            exit();
        }
    }
    else {
        header("Location: login.php?error=" . urlencode("No user found with that username."));
        exit();
    }

*/

$conn->close();
?>


           