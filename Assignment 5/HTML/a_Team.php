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


    <h2>Team Input Form</h2>
    <br>
    <form action="r_Team.php" method="post">
      <label for="Team_name">Team Name : </label>
      <input type = "text" name = "Team_name" required placeholder="Enter the Team name">
      <br>

      <label for="country">Country: </label>
      <input type = "text" name = "Staff_name" required placeholder="Enter the country">

      
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
