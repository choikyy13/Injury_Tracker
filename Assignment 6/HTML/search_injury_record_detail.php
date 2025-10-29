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
    include 'db_connect.php';
    $id = isset($_GET['id']) ? trim($_GET['id']) : '';
    if($id === '' || !preg_match('/^[A-Za-z0-9]{1,5}$/', $id) ){
        http_response_code(400);
        exit('Invalid or missing id.');
    }
    
    $safe_id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT 
            Record_id, Athlete_id, Injury_id, Date_inj, Injury_Status, STAFF_in_Charge
            FROM Injury_record
            WHERE Record_id = '{$safe_id}'
            LIMIT 1";
    
    $result = mysqli_query($conn, $sql);
    if($result === false){
        http_response_code(500);
        exit('Database query error:' . htmlspecialchars(mysqli_error($conn)));
    }
    
    $row = mysqli_fetch_assoc($result);
    ?>    


  

    <?php if (!$row): ?>
      <p>Record not found.</p>
    <?php else: ?>
      <ul class="kv">
        <li><span class="label">Record ID:</span> <?= htmlspecialchars($row['Record_id']) ?></li>
        <li><span class="label">Athlete ID:</span> <?= htmlspecialchars($row['Athlete_id']) ?></li>
        <li><span class="label">Injury ID:</span> <?= htmlspecialchars($row['Injury_id']) ?></li>
        <li><span class="label">Date:</span> <?= htmlspecialchars($row['Date_inj']) ?></li>
        <li><span class="label">Injury Status:</span> <?= htmlspecialchars($row['Injury_Status']) ?></li>
        <li><span class="label">Staff in Charge:</span> <?= htmlspecialchars($row['STAFF_in_Charge']) ?></li>
      </ul>
    <?php endif; ?>
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

    
  </footer>
</body>

</html>