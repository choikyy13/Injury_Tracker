<?php 
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $User_name = $_POST['User_name'];
    $Password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT * FROM Users WHERE User_name = ?");
    $stmt->bind_param("s", $User_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($Password === $row['Password']) { 
            $user_id = $row['User_id'];

            $stmt2 = $conn->prepare("SELECT * FROM Professional WHERE User_id = ?");
            $stmt2->bind_param("s", $user_id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            if ($result2->num_rows > 0) {
                $_SESSION['loggedin'] = true;
                $_SESSION['User_name'] = $User_name;
                $_SESSION['User_id'] = $user_id;
                header("Location: maintenance.php");
                exit;
            } else {
                header("Location: login.php?error=" . urlencode("Access denied: not allowed to access maintenance page"));
                exit;
            }

        } else {
            header("Location: login.php?error=" . urlencode("Invalid password"));
            exit;
        }
    } else {
        header("Location: login.php?error=" . urlencode("No user found"));
        exit;
    }
}
$conn->close();
?>

