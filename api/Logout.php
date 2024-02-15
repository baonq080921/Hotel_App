<?php
include("../config.php");
header("Content-Type: application/json");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    session_destroy();

    $response['status'] = 'success';
    $response['message'] = 'Session destroyed';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);
?>
