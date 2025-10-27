<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Search Result Detail | Injury Tracker</title>
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
    $User_id = $_GET['uid'];


    echo ("<h1> Presentation of a single result record</h1>");

    include 'db_connect.php';

    $sql = "SELECT * FROM Users WHERE User_id = '$User_id'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    if ($result->num_rows > 0){
      echo "<br><strong>User ID:</strong>".$row["User_id"]. "<br>";
      echo "<br><strong>User name:</strong> ".$row["User_name"]."<br>";
      echo "<br> <strong>Email : </strong>".$row["Email"]."<br>";
      echo "<br>";
    } else {
        echo "no record found ";
    }

    $conn->close();
    echo ("<br><br><a href='s_1.html'>Search other User</a>");
    echo ("<br><br><a href='search.html'>Return to search list</a>");
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