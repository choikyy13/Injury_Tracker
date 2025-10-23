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


    <form action="r_Public.php" method="post">
        <label for="User_name">User Name: </label>
        <select name="User_name" id="User_name" required>
            <?php
                include("db_connect.php");
                $sql = "SELECT User_name FROM Users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['User_name'] . "'>" . $row['User_name'] . "</option>";
                    }
                }
                
                $conn->close();
                
            ?>    
        </select>
        <br>
        <label for="Interest">Interest: </label>
        <input type="text" id="Interest" name="Interest" required>
        <br>
        <input type="submit" value="Create Public User">
    </form>


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