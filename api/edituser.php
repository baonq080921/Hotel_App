<?php

// Include the database configuration file
include '../config.php';
header("Content-Type: application/json");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you're using PUT method to send data
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // Parse JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Retrieve user information from the input
    $userId = $input['id'];
    $name = $input['Name'];
    $email = $input['Email'];
    $country = $input['Country'];
    $phone = $input['Phone'];

    // Validate Phone as integer
    if (!is_numeric($phone)) {
        echo json_encode(["status" => "error", "message" => "Phone must be a valid number"]);
        exit(); // Stop script execution
    }

    try {
        // Prepare and execute the SQL query to update user information
        $stmt = $conn->prepare("UPDATE roombook SET Name = ?, Email = ?, Country = ?, Phone = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $email, $country, $phone, $userId);

        if ($stmt->execute()) {
            // Data updated successfully
            echo json_encode(["status" => "success", "message" => "User information updated successfully"]);
        } else {
            // Error in SQL execution
            echo json_encode(["status" => "error", "message" => "Error updating user information"]);
        }

        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Exception: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}

// Close the database connection
$conn->close();

?>
