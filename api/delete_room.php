<?php
include("../config.php");

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Handling API request
    header("Content-Type: application/json");
    
    $response = array();

    parse_str(file_get_contents("php://input"), $_DELETE);

    if (isset($_DELETE['id'])) {
        $id = $_DELETE['id'];
        $roomdeletesql = "DELETE FROM room WHERE id = '$id'";
        
        $result = mysqli_query($conn, $roomdeletesql);

        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Room deleted successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to delete room';
        }

        echo json_encode($response);
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(array('status' => 'error', 'message' => 'Invalid request, missing ID'));
    }
} else {
    // Handling regular web request
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $roomdeletesql = "DELETE FROM room WHERE id = '$id'";
        
        $result = mysqli_query($conn, $roomdeletesql);

        if ($result) {
            header("Location:room.php");
        } else {
            echo "Failed to delete room.";
        }
    } else {
        echo "Invalid request, missing ID.";
    }
}
?>
