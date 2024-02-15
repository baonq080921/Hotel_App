<?php
// Include your database configuration file
include '../config.php';

// Check the request method
$method = $_SERVER['REQUEST_METHOD'];

// Check if the room ID is provided as a parameter
if (isset($_GET['id'])) {
    $staffId = $_GET['id'];

    // Handle GET request to retrieve room information
    if ($method === 'GET') {
        $staffInfoQuery = "SELECT id,name,work FROM staff WHERE id = $staffId";
        $staffInfoResult = mysqli_query($conn, $staffInfoQuery);

        if ($staffInfoResult) {
            $staffInfoData = mysqli_fetch_assoc($staffInfoResult);
            header('Content-Type: application/json');
            echo json_encode($staffInfoData);
        } else {
            echo json_encode(['error' => 'Unable to fetch room information']);
        }
    } else {
        // Handle other HTTP methods (POST, PUT, DELETE)
        echo json_encode(['message' => 'Unsupported HTTP method']);
    }
} else {
    // If no payment ID is provided, retrieve all payment data
    $allStaffQuerry = "SELECT id,name,work FROM staff";
    $allStaffsResult = mysqli_query($conn, $allStaffQuerry);

    if ($allStaffsResult) {
        $allStaffData = mysqli_fetch_all($allStaffsResult, MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($allStaffData);
    } else {
        echo json_encode(['error' => 'Unable to fetch staff information']);
    }
}

// Close the database connection
mysqli_close($conn);
?>
