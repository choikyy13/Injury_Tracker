<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Injury Record Input Form</title>
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


    <h2>Injury Record Input Form</h2>
    <br>
    <form action="r_InjRec.php" method="post">
      <label for="Athlete_id">Athlete:</label>
      <select id="Athlete_id" name="Athlete_id" required>
        <?php
          include 'db_connect.php';

          $sql = "SELECT * FROM Athlete";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<option value='" . $row["Athlete_id"] . "'>". $row["Athlete_id"] . " - ". $row["Athlete_name"] . "(" . $row["Date_of_Birth"] .  ")</option>";
            }
          }

        ?>
      </select> 


      <br>

      <label for="Injury_id">Injury Type:</label>
      <select id="Injury_id" name="Injury_id" required>
        <?php
          $sql = "SELECT Injury_id, Injury_name, Body_part FROM Injury_Type";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<option value='" . $row["Injury_id"] . "'>" . $row["Injury_name"] . " - (" . $row["Body_part"] . ")</option>";
            }
          }
        ?>
      </select> 
      <br>
      
      <label for="Date_inj">Date of Injury:</label>
      <input type = "date" id="Date_inj" name = "Date_inj" required>
      <br>

      <label>Injury Status:</label>
      <div class="radio-group">
        <label><input type="radio" name="Injury_Status" value="Recovered" required> Recovered</label>
        <label><input type="radio" name="Injury_Status" value="Under_observation"> Under Observation</label>
        <label><input type="radio" name="Injury_Status" value="Ongoing"> Ongoing</label>
      </div>

      
      <label for="STAFF_in_Charge">Staff in Charge:</label>
      <select id="STAFF_in_Charge" name="STAFF_in_Charge" required>
        <?php
          $sql = "SELECT Staff_id, Staff_name, Year_join FROM Staff";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<option value='" . $row["Staff_id"] . "'>" . $row["Staff_id"] . " - " . $row["Staff_name"] . " (Joined: " . $row["Year_join"] . ")</option>";
              }
          }

          $conn->close();
        ?>
      </select> 
      <br>

      <br><br>
      <input type = "submit" value="Submit Form" />
    </form>

    <a href="maintenance.html">Back to Maintenance Page</a>
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
