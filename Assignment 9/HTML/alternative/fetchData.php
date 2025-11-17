<?php
include 'db_connect.php';

if (isset($_POST['search']) && isset($_POST['type'])) {
    $search = $_POST['search'];
    $type = $_POST['type'];

    switch ($type) {
        case "user":
            $query = "SELECT User_id AS value, User_name AS label
                        FROM Users 
                        WHERE User_name LIKE CONCAT('%', ?, '%')";
            break;

        case "interest":
            $query = "SELECT User_id AS value,  Interest AS label
                        FROM Public 
                        WHERE Interest LIKE CONCAT('%', ?, '%')";
            break;

        case "coach":
            $query = "SELECT Staff_id AS value,  Cerificate AS label
                        FROM Coach 
                        WHERE Cerificate LIKE CONCAT('%', ?, '%')";
            break;

        default:
            echo json_encode([]);
            exit;
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = array();
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;  
    }

    echo json_encode($response);
    exit;
}
?>
