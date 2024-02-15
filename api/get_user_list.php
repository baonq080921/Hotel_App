<?php
// Include your database configuration file
include '../config.php';

// Check the request method
$method = $_SERVER['REQUEST_METHOD'];

// Check if the room ID is provided as a parameter
if (isset($_GET['id'])) {
    $roomId = $_GET['id'];

    // Handle GET request to retrieve room information
    if ($method === 'GET') {
        $roomInfoQuery = "SELECT Name,Email, Country,Phone FROM roombook WHERE id = $roomId";
        $roomInfoResult = mysqli_query($conn, $roomInfoQuery);

        if ($roomInfoResult) {
            $roomInfoData = mysqli_fetch_assoc($roomInfoResult);
            header('Content-Type: application/json');
            echo json_encode($roomInfoData);
        } else {
            echo json_encode(['error' => 'Unable to fetch room information']);
        }
    } else {
        // Handle other HTTP methods (POST, PUT, DELETE)
        echo json_encode(['message' => 'Unsupported HTTP method']);
    }
} else {
    // If no payment ID is provided, retrieve all payment data
    $allUserQuerry = "SELECT id,Name,Email,Country,Phone FROM roombook";
    $allUsersResult = mysqli_query($conn, $allUserQuerry);

    if ($allUsersResult) {
        $allUsersData = mysqli_fetch_all($allUsersResult, MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($allUsersData);
    } else {
        echo json_encode(['error' => 'Unable to fetch payment information']);
    }
}

// Close the database connection
mysqli_close($conn);
?>
