<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Injury Tracker</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>



<body>
  
  <?php
    $conn = new mysqli("localhost", "root", "password", "injury Tracker");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    $result = $conn->query("SELECT MAX(Staff_id) AS max_id FROM Staff");
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'];

    if ($max_id) {
      $num = (int)substr($max_id, 1);
      $next_id = 'S' . str_pad($num + 1, 3, '0', STR_PAD_LEFT);
    } else {
      $next_id = 'S001';
    }

    $Staff_name = $_POST['Staff_name'];
    $Year_join  = $_POST['Year_join'];

    $stmt = $conn->prepare("INSERT INTO Staff (Staff_id, Staff_name, Year_join) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $next_id,$Staff_name,$Year_join );

    if ($stmt->execute()) {
      echo "<h3>Staff added successfully!</h3><br>";
      echo "<p>Staff ID: <strong>" . $next_id . "</strong></p><br>";
      echo '<a href="a_Staff.php">Back to Input Form</a><br>';
      echo '<a href="maintenance.html">Back to Maintenance Page</a>';
    } else {
      echo "<h3>Error: " . $stmt->error . "</h3>";
    }

    $stmt->close();
    $conn->close();

    ?>

</body>
</html>