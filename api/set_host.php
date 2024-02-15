<?php
// Include your database configuration file
include '../config.php';

// Check the request method
$method = $_SERVER['REQUEST_METHOD'];

// Check if the staff ID is provided as a parameter
if (isset($_GET['id'])) {
    $staffId = $_GET['id'];

    // Handle GET request to retrieve staff information by ID
    if ($method === 'GET') {
        $staffInfoQuery = "SELECT id, name, work FROM staff WHERE id = $staffId";
        $staffInfoResult = mysqli_query($conn, $staffInfoQuery);

        if ($staffInfoResult) {
            $staffInfoData = mysqli_fetch_assoc($staffInfoResult);
            header('Content-Type: application/json');
            echo json_encode($staffInfoData);
        } else {
            echo json_encode(['error' => 'Unable to fetch staff information']);
        }
    } elseif ($method === 'POST') {
        // Handle POST request to update staff information
        $postData = json_decode(file_get_contents("php://input"), true);

        $updatedName = mysqli_real_escape_string($conn, $postData['name']);
        $updatedWork = mysqli_real_escape_string($conn, $postData['work']);

        $updateQuery = "UPDATE staff SET name = '$updatedName', work = '$updatedWork' WHERE id = $staffId";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo json_encode(['status' => 'success', 'message' => 'Staff information updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update staff information']);
        }
    } else {
        // Handle other HTTP methods (PUT, DELETE)
        echo json_encode(['message' => 'Unsupported HTTP method']);
    }
} else {
    // If no staff ID is provided, retrieve all staff data
    $allStaffQuery = "SELECT id, name, work FROM staff";
    $allStaffResult = mysqli_query($conn, $allStaffQuery);

    if ($allStaffResult) {
        $allStaffData = mysqli_fetch_all($allStaffResult, MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($allStaffData);
    } else {
        echo json_encode(['error' => 'Unable to fetch staff information']);
    }
}

// Close the database connection
mysqli_close($conn);
?>
