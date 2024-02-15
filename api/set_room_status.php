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
        $roomInfoQuery = "SELECT Name, RoomType, Email, stat FROM roombook WHERE id = $roomId";
        $roomInfoResult = mysqli_query($conn, $roomInfoQuery);

        if ($roomInfoResult) {
            $roomInfoData = mysqli_fetch_assoc($roomInfoResult);
            header('Content-Type: application/json');
            echo json_encode($roomInfoData);
        } else {
            echo json_encode(['error' => 'Unable to fetch room information']);
        }
    } elseif ($method === 'POST') {
        // Handle POST request to set room status
        $inputData = json_decode(file_get_contents('php://input'), true);
        $status = $inputData['status']; // Assuming you pass 'confirm' or 'notconfirm' in the POST data

        // Validate the status (you may add additional checks)
        if (strtolower($status) === 'confirm' || strtolower($status) === 'notconfirm') {
            $updateStatusQuery = "UPDATE roombook SET stat = '$status' WHERE id = $roomId";
            $updateStatusResult = mysqli_query($conn, $updateStatusQuery);

            if ($updateStatusResult) {
                echo json_encode(['message' => 'Room status updated successfully']);
            } else {
                echo json_encode(['error' => 'Unable to update room status']);
            }
        } else {
            echo json_encode(['error' => 'Invalid status']);
        }
    } else {
        // Handle other HTTP methods (PUT, DELETE)
        echo json_encode(['error' => 'Unsupported HTTP method']);
    }
} else {
    // If no room ID is provided, retrieve all room data
    $allRoomsQuery = "SELECT RoomType, Bed, stat FROM roombook";
    $allRoomsResult = mysqli_query($conn, $allRoomsQuery);

    if ($allRoomsResult) {
        $allRoomsData = mysqli_fetch_all($allRoomsResult, MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($allRoomsData);
    } else {
        echo json_encode(['error' => 'Unable to fetch room information']);
    }
}

// Close the database connection
mysqli_close($conn);
?>
