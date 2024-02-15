<?php
include("../config.php");

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Handling API request
    header("Content-Type: application/json");

    parse_str(file_get_contents("php://input"), $_DELETE);

    // Assume 'id' parameter is always present in DELETE request
    $id = $_DELETE['id'];
    $name = $_DELETE['UserName'];
    $userdeletesql = "DELETE FROM signup WHERE UserID = '$id'";

    $response = array();

    $result = mysqli_query($conn, $userdeletesql);

    if ($result) {
        $response['status'] = 'success';
        $response['message'] = 'User deleted successfully';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to delete user';
    }

    echo json_encode($response);
} else {
    http_response_code(400); // Bad Request
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method'));
}
?>
