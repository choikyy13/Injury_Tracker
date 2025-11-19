<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result | Injury Tracker</title>
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
        <li><a href="login.php">Maintenance</a></li>
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
      echo ("<h1>Search Result List</h1>");
      echo ("<br>");
      echo ("<h3>click the URL to display the User Details</h3>");
      echo ("<br>");

      session_start();

      include 'db_connect.php';


      if ($_GET['search']) {
          $search = $_GET['search'];
      } elseif ($_SESSION['search_value']){
          $search = $_SESSION['search_value'];
      } 

      $_SESSION['search_value'] = $search;
    

      $sql = "SELECT * FROM Users WHERE User_name LIKE CONCAT('%', ?, '%')";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $search);
      $stmt->execute();
      $result = $stmt->get_result();
      
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $highlighted_name = str_ireplace($search, "<mark>$search</mark>", $row['User_name']);
              echo '<div><a href="sd_1.php?uid=' . $row['User_id'] . '">' . $highlighted_name . '</a></div>';
          }
      } else {
          echo "No record found";
      }
      $conn->close();
    ?>

    <br><a href='s_1.html'>Search other User</a>
    <br><a href='search.html'>Return to search list</a>


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