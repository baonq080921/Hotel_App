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

    // Debugging: Print the received JSON input to error log
    error_log(print_r($input, true));

    if (isset($input[0])) { // Check if the first element exists in the array
        // Retrieve user information from the input
        $id = $input[0]['id'];
        $type = $input[0]['type'];
        $bed = $input[0]['bedding'];

        // Validate id as integer
        if (!is_numeric($id)) {
            echo json_encode(["status" => "error", "message" => "id must be a valid number"]);
            exit(); // Stop script execution
        }

        try {
            // Prepare and execute the SQL query to update user information
            $stmt = $conn->prepare("UPDATE room SET type = ?, bedding = ? WHERE id = ?");
            $stmt->bind_param("ssi", $type, $bed, $id);

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
        echo json_encode(["status" => "error", "message" => "Invalid JSON format"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}

// Close the database connection
$conn->close();
?>
