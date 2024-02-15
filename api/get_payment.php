<?php
// Include your database configuration file
include '../config.php';

// Check the request method
$method = $_SERVER['REQUEST_METHOD'];

// Check if the payment ID is provided as a parameter
if (isset($_GET['id'])) {
    $paymentId = $_GET['id'];

    // Handle GET request to retrieve payment information based on the provided ID
    if ($method === 'GET') {
        $paymentQuery = "SELECT Name,Email,roomtotal,bedtotal,finaltotal FROM payment WHERE id = $paymentId";
        $paymentResult = mysqli_query($conn, $paymentQuery);

        if ($paymentResult) {
            $paymentData = mysqli_fetch_assoc($paymentResult);
            header('Content-Type: application/json');
            echo json_encode($paymentData);
        } else {
            echo json_encode(['error' => 'Unable to fetch payment information']);
        }
    } else {
        // Handle POST/PUT requests
        echo json_encode(['message' => 'POST or PUT request received. Perform appropriate action.']);
    }
} else {
    // If no payment ID is provided, retrieve all payment data
    $allPaymentsQuery = "SELECT Name,Email,roomtotal,bedtotal,finaltotal FROM payment";
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
