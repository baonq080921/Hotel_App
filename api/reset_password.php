<?php
include("../config.php");

header("Content-Type: application/json");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Email = $_POST['Email'];

    // Validate and sanitize user input before using in the query
    $Email = mysqli_real_escape_string($conn, $Email);

    // Check if the email exists in the database
    $checkEmailQuery = "SELECT * FROM signup WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $checkEmailQuery);
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    if ($result && mysqli_num_rows($result) > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Store the token, user ID, and timestamp in the database
        $user = mysqli_fetch_assoc($result);
        $userId = $user['UserID']; // Adjust column name to match the signup table
        $expiryTimestamp = strtotime('+1 hour'); // Token is valid for 1 hour

        // Debugging statements
        echo "User ID: $userId<br>";
        echo "Token: $token<br>";
        echo "Expiry Timestamp: $expiryTimestamp<br>";

        // Insert into the password_reset table
        $insertTokenQuery = "INSERT INTO password_reset (user_id, token, expiry_timestamp) VALUES ('$userId', '$token', '$expiryTimestamp')";
        $resultInsert = mysqli_query($conn, $insertTokenQuery);

        if ($resultInsert) {
            $response['status'] = 'success';
            $response['message'] = 'Password reset email sent';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error inserting token into the database: ' . mysqli_error($conn);
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid email';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);
?>
