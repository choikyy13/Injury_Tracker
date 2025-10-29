<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprint | Injury Tracker</title>
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

      $result = $conn->query("SELECT MAX(Staff_id) AS max_id FROM Staff");
      $row = $result->fetch_assoc();
      $max_id = $row['max_id'];

      if ($max_id) {
        $num = (int)substr($max_id, 1);
        $next_id = 'S' . str_pad($num + 1, 3, '0', STR_PAD_LEFT);
      } else {
        $next_id = 'S001';
      }

      $Staff_name = $_POST['Staff_name'];
      $Year_join  = $_POST['Year_join'];

      $stmt = $conn->prepare("INSERT INTO Staff (Staff_id, Staff_name, Year_join) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $next_id,$Staff_name,$Year_join );

      if ($stmt->execute()) {
        echo "<h3>Staff added successfully!</h3><br>";
        echo "<p>Staff ID: <strong>" . $next_id . "</strong></p><br>";
        echo '<a href="a_Staff.php">Back to Input Form</a><br>';
        echo '<a href="maintenance.html">Back to Maintenance Page</a>';
      } else {
        echo "<h3>Error: " . $stmt->error . "</h3>";
        echo '<a href="a_Staff.php">Back to Input Form</a><br>';
        echo '<a href="maintenance.html">Back to Maintenance Page</a>';
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