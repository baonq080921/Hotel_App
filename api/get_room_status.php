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
        $roomInfoQuery = "SELECT Name id, RoomType,Email, stat FROM roombook WHERE id = $roomId";
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
    $allPaymentsQuery = "SELECT id,RoomType,Bed,stat FROM roombook";
    $allPaymentsResult = mysqli_query($conn, $allPaymentsQuery);

    if ($allPaymentsResult) {
        $allPaymentsData = mysqli_fetch_all($allPaymentsResult, MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($allPaymentsData);
    } else {
        echo json_encode(['error' => 'Unable to fetch payment information']);
    }
}

// Close the database connection
mysqli_close($conn);
?>
