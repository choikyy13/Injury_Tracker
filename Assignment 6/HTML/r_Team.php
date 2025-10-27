<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team Input | Injury Tracker</title>
</head>


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

  
    <?php
      include 'db_connect.php';

      $result = $conn->query("SELECT MAX(Team_id) AS max_id FROM Team");
      $row = $result->fetch_assoc();
      $max_id = $row['max_id'];

      if ($max_id) {
        $num = (int)substr($max_id, 1);
        $next_id = 'T' . str_pad($num + 1, 3, '0', STR_PAD_LEFT);
      } else {
        $next_id = 'T001';
      }

      $Team_name = $_POST['Team_name'];
      $Country  = $_POST['Country'];

      $stmt = $conn->prepare("INSERT INTO Team (Team_id, Team_name, Country) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $next_id,$Team_name,$Country );

      if ($stmt->execute()) {
        echo "<h3>Team added successfully!</h3><br>";
        echo "<p>Team ID: <strong>" . $next_id . "</strong></p><br>";
        echo '<a href="a_Team.php">Back to Input Form</a><br>';
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