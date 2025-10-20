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
        <li><a href="news.html">News</a></li>
        <li><a href="stat.html">Stat</a></li>
        <li><a href="reports.html">Reports</a></li>
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
  



  <h2>Injury Record Input Form</h2>
  <br>
  <form action="r_MedTeam.php" method="post">
    <label for="Staff_id">Staff:</label>
    <select id="Staff_id" name="Staff_id" required>
      <?php
        $conn = new mysqli("localhost", "root", "password", "injury Tracker");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
          
        $sql = "SELECT Staff_id, Staff_name, Year_join FROM Staff";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["Staff_id"] . "'>" . $row["Staff_id"] . " - " . $row["Staff_name"] . " (Joined: " . $row["Year_join"] . ")</option>";
          }
        }
        $conn->close();
      ?>
      <br>    
    </select> 
      <br>    

      <label for="Specialization">Specialization  : </label>
      <input type = "text" name = "Specialization" required placeholder="Enter staff's Specialization">
      <br>
      
      <label for="Licence_number">Licence number  :  </label>
      <input type = "text" name = "Licence_number" required placeholder="Enter staff's Licence number">
      <br>


      <br><br>
      <input type = "submit" value="Submit Form" />
  </form>


  </div>

  

</body>

<footer>
  <div class="footer-container">
    <p>&copy; 2025 Injury Tracker | Database Project</p>

    <p class="footer-links">
      <a href="index.html">Home</a> |
      <a href="news.html">News</a> |
      <a href="history.html">History</a>|
      <a href="reports.html">Reports</a> |
      <a href="imprint.html">Imprint</a>
    </p>

  </div>
</footer>

</html>
