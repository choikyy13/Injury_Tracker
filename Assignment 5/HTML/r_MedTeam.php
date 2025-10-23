<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Med Staff Record Input | Injury Tracker</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
  <!--navigation bar-->
  <div class="container">
    <nav>

      <!--left-->
      <div class="logo">
        <a href="index.html">
          <img src="img/logo.jpg" alt="Logo" class="logo-img">    <!--if image not found, "logo"-->
          <span class="logo-text">InjuryTracker</span>
        </a>
      </div>

      <!--middle-->
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Stat</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="maintenance.html">Maintenance</a></li>
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


    <?php
      include 'db_connect.php';

      $Staff_id = $_POST['Staff_id'];
      $Specialization  = $_POST['Specialization'];
      $Licence_number= $_POST['Licence_number'];

      $stmt = $conn->prepare("INSERT INTO Medical_team (Staff_id, Specialization, Licence_number) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $Staff_id,$Specialization,$Licence_number );


      if ($stmt->execute()) {
        echo "<h3>Med Staff info added successfully!</h3><br>";
        echo "<p>Staff ID: <strong>" . $Staff_id . "</strong></p><br>";
        echo '<a href="a_MedTeam.php">Back to Input Form</a><br>';
        echo '<a href="maintenance.html">Back to Maintenance Page</a>';
      } else {
        echo "<h3>Error: " . $stmt->error . "</h3>";
      }

      $stmt->close();
      $conn->close();
    ?>


  </div>

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
</body>
</html>