<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprint | Injury Tracker</title>
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


        <?php
        include 'db_connect.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $User_name = $_POST['User_name'];
            $Interest = $_POST['Interest'];
            $Team_name = $_POST['Team_name'];

            $result1 = $conn->prepare('SELECT User_id FROM Users WHERE User_name = ?');
            $result1->bind_param('s', $User_name);
            $result1->execute();
            $result_1 = $result1->get_result();

            if($row = $result_1->fetch_assoc()) {
                $User_id = $row['User_id'];
            }
            else {
                die ('No User');
            }

            $result1->close();

            $result2 = $conn->prepare("SELECT Team_id FROM Team WHERE Team_name = ?");
            $result2->bind_param("s", $Team_name);
            $result2->execute();
            $result_2 = $result2->get_result();

            if ($row2 = $result_2->fetch_assoc()) {
                $Team_supporting = $row2['Team_id'];
            } else {
                die("No team with that name.");
            }
            $result2->close();

            $stmt = $conn->prepare('INSERT INTO Public (User_id, Interest, Team_supporting) VALUES (?,?,?)');
            $stmt->bind_param('sss', $User_id, $Interest, $Team_supporting);

            if ($stmt->execute()) {
                echo '<h3>Public User added successfully!</h3><br>';
                echo "<p>User name: <strong>" . $User_name . "</strong></p><br>";
                echo '<a href="a_Public.php">Back to Input Form</a><br>';
                echo '<a href="maintenance.html">Back to Maintenance Page</a>';
                }
            else {
                echo 'Error Inserting Public User: ' . $stmt->error;
            }

            $stmt->close();
                
        $conn->close();
        }

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