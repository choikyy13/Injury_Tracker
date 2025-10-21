<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Input | Injury Tracker</title>
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
        <li><a href="maintenance.html">maintenance</a></li>
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
      $conn = new mysqli("localhost", "root", "Tt1609t", "injury Tracker");

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }


      $result = $conn->query("SELECT MAX(Record_id) AS max_id FROM Injury_record");
      $row = $result->fetch_assoc();
      $max_id = $row['max_id'];

      if ($max_id) {
        $num = (int)substr($max_id, 1);
        $next_id = 'R' . str_pad($num + 1, 3, '0', STR_PAD_LEFT);
      } else {
        $next_id = 'R001';
      }

      $athlete_id = $_POST['Athlete_id'];
      $injury_id  = $_POST['Injury_id'];
      $date_inj= $_POST['Date_inj'];
      $injury_status  = $_POST['Injury_Status'];
      $staff_in_charge  = $_POST['STAFF_in_Charge'];

      $stmt = $conn->prepare("INSERT INTO Injury_record (Record_id,Athlete_id,Injury_id, Date_inj, Injury_Status, STAFF_in_Charge) VALUES (?, ?, ?, ?, ? ,?)");
      $stmt->bind_param("ssssss", $next_id,$athlete_id,$injury_id , $date_inj , $injury_status , $staff_in_charge );


      if ($stmt->execute()) {
        echo "<h3>Injury Record added successfully!</h3><br>";
        echo "<p>Record ID: <strong>" . $next_id . "</strong></p><br>";
        echo '<a href="a_InjRec.php">Back to Input Form</a><br>';
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