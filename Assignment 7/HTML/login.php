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
        if ($Password === $row['Password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['User_name'] = $User_name;
            header("Location: maintenance.php");
            exit;
        } else {
            $error = "Invalid Password.";
        }
    } else {
        $error = "No user found.";
    }
}

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

    <h1>Login</h1>
    <form action="db_auth.php" method="post">
      Username: <input type="text" name="User_name" required><br>
      Password: <input type="password" name="Password" required><br>
      <input type="submit" value="Login">
    </form>

    <?php
    if (isset($_GET['error'])) {
      echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    } /*elseif ($error){
      echo "<p style='color:red;'>" . htmlspecialchars($error) . "</p>";
    }*/
    ?>

    <p> 
    <br>
    Only the admin has access to the maintenance page<br><br>
    
    testing input:<br>
    username: admin<br>
    password: admin123<br>

    </p>


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