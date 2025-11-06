<?php
include 'db_connect.php';

// Change these to your preferred credentials
$username = "admin";
$password = "admin123";

$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO Admin (User_name, Password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashedpassword);

if ($stmt->execute()) {
    echo "✅ Admin user added successfully.<br>";
    echo "Use these credentials to log in:<br>";
    echo "Username: <b>$username</b><br>";
    echo "Password: <b>$password</b><br>";
} else {
    echo "❌ Failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
