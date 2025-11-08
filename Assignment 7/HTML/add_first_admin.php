<?php
include 'db_connect.php';

$username = "admin";
$password = "admin123";
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO Admin(User_name, Password) VALUES (?,?)");
$stmt->bind_param("ss", $username, $hashedpassword);
if ($stmt->execute()){
    echo "Add first Administer";
} else {
    echo "failed: " . $stmt->error;
}
$stmt->close();
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Injury Tracker</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <!--navigation bar-->
  <div class="container">
    <nav>

      <!--left-->
      <div class="logo">
        <a href="index.html">
          <img src="img/logo.jpg" alt="Logo" class="logo-img"> <!--if image not found, "logo"-->
          <span class="logo-text">InjuryTracker</span>
        </a>
      </div>

      <!--middle-->
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Stat</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="login.php">Maintenance</a></li>
        <li><a href="search.html">Search</a></li>
      </ul>

      <div class="search-container">
        <input type="text" class="search-input" placeholder="Search...">
        <button class="search-button">🔍</button> <!-- Search icon -->
      </div>

      <!--right-->
      <div class="buttons">
        <a href="#" class="login"><span>Log in</span></a>
        <a href="#" class="register">Register</a>
      </div>
    </nav>

    

    <h2><a href="index.html">Back to Main Page</a></h2>


  </div>

</body>

<footer>
  <div class="footer-container">
    <p>&copy; 2025 Injury Tracker | Database Project</p>

    <p class="footer-links">
      <a href="index.html">Home</a> |
      <a href="#">News</a> |
      <a href="#">History</a>|
      <a href="#">Reports</a> |
      <a href="imprint.html">Imprint</a>
    </p>

  </div>
</footer>

</html>