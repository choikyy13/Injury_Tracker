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
  </div>




  <?php
    $user = "root";
    $password = "password";
    $database = "InjuryTracker";
    $table = "Users";
    $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
    echo "connect db";
  ?>

  <form action="r_Users.php" method="post">
    User Name : <input type = "text" name = "User_name" required placeholder="Enter the Team's name">
    <br>
    
    User ID   : <input type = "text" name = "User_id" required placeholder="Enter the Team's name, e.g. T0001">
    <br>

    Enter email : <input type = "User_email" name = "Enter the user's email" />
    <br>
    
    <br><br>
    <input type = "submit" value="Submit Form" />
  </form>




  

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
