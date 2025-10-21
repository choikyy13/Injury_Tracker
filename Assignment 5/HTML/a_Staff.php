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





    <h2>Staff Input Form</h2>
    <br>
    <form action="r_Staff.php" method="post">
      <label for="Staff_name">Staff Name : </label>
      <input type = "text" name = "Staff_name" required placeholder="Enter the Staff's name">
      <br>
      
      <label for="Year_join">Year join:</label>
      <select name="Year_join" id="Year_join" required>
        <option value="">-- Select Year --</option>
        <?php
          $currentYear = date("Y"); 
          $earliestYear = 1980;  
          for ($year = $currentYear; $year >= $earliestYear; $year--) {
            echo "<option value='$year'>$year</option>";
          }
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
        <a href="news.html">News</a> |
        <a href="history.html">History</a>|
        <a href="reports.html">Reports</a> |
        <a href="imprint.html">Imprint</a>
      </p>

    </div>
  </footer>
</body>
</html>
