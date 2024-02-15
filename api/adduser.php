<?php

// Include the database configuration file
include '../config.php';
header("Content-Type: application/json");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you're using POST method to send data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user information from the request
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $country = $_POST['Country'];
    $phone = $_POST['Phone'];

    try {
        // Prepare and execute the SQL query with parameter binding
        $stmt = $conn->prepare("INSERT INTO roombook (Name, Email, Country, Phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $country, $phone);

        if ($stmt->execute()) {
            // Data inserted successfully
            echo json_encode(["status" => "success", "message" => "User added successfully"]);
        } else {
            // Error in SQL execution
            echo json_encode(["status" => "error", "message" => "Error adding user"]);
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
