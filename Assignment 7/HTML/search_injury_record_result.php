<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Injury Record results | Injury Tracker</title>
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
    include 'db_connect.php';

    if (!isset($conn) || !($conn instanceof mysqli)) {
        http_response_code(500);
        exit('DB handle $conn is not initialized.');
    }
    $athlete_id = $_POST['Athlete_id'];
    $status = $_POST['Injury_Status'];
    $staff = $_POST['staff_in_charge'];
    /*
    $allowed_status = ['Recovered', 'Under observation', 'Ongoing', 'Under treatment'];
    if ($status === '' || !in_array($status, $allowed_status, true)) {
        http_response_code(400);
        exit('Invalid or missing Injury_Status');
    }
    */
    
    $sql = "SELECT ir.Record_id, ir.Athlete_id, a.Athlete_name, ir.Injury_id, ir.Date_inj, ir.Injury_Status, ir.STAFF_in_Charge
            FROM Injury_record ir
            JOIN Athlete a ON ir.Athlete_id = a.Athlete_id
            WHERE ir.Injury_Status = '" . mysqli_real_escape_string($conn, $status) . "'
            and ir.Athlete_id = '" . mysqli_real_escape_string($conn, $athlete_id) . "'";
    
    if ($staff !== '') {
        $safe_staff = mysqli_real_escape_string($conn, $staff);
        $sql .= " AND STAFF_in_Charge LIKE '%{$safe_staff}%'";
    }
    
    $sql .= " ORDER BY Date_inj DESC, Record_id DESC";
    
    $result = mysqli_query($conn, $sql);
    if($result === false){
        http_response_code(500);
        exit('Database query error: ' . htmlspecialchars(mysqli_error($conn)));
    }

    
    ?>

    <p><a href="search.html">Back to Search</a></p>

    <p class="meta">
        <strong>Injury Status:</strong> <?= htmlspecialchars($status) ?>
        <?php if ($staff !== ''): ?>
        &nbsp;|&nbsp;<strong>Staff in charge contains:</strong> <?= htmlspecialchars($staff) ?>
        <?php endif; ?>
    </p>

    <?php if (mysqli_num_rows($result) === 0): ?>
        <p>No records found for the given filters.</p>
    <?php else: ?>
    <table>
        <tr>
            <th>Record ID</th>
            <th>Athlete ID</th>
            <th>Athelte Name</th>
            <th>Injury ID</th>
            <th>Date</th>
            <th>Status</th>
            <th>Staff in Charge</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['Record_id']) ?></td>
                <td><?= htmlspecialchars($row['Athlete_id']) ?></td>
                <td><?= htmlspecialchars($row['Athlete_name'])?></td>
                <td><?= htmlspecialchars($row['Injury_id']) ?></td>
                <td><?= htmlspecialchars($row['Date_inj']) ?></td>
                <td><?= htmlspecialchars($row['Injury_Status']) ?></td>
                <td><?= htmlspecialchars($row['STAFF_in_Charge']) ?></td>
                <td>
          
                <a href="search_injury_record_detail.php?id=<?= urlencode($row['Record_id']) ?>">View</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
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

    </div>
  </footer>
</body>

</html>