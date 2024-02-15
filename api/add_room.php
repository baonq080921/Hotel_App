<?php

include("../config.php");

header("Content-Type: application/json");

$response = array();

if (isset($_POST['addroom'])) {
    $typeofroom = $_POST['troom'];
    $typeofbed = $_POST['bed'];

    $sql = "INSERT INTO room(type,bedding) VALUES ('$typeofroom', '$typeofbed')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $response['status'] = 'success';
        $response['message'] = 'Room added successfully';
        $response['type_of_room'] = $typeofroom;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to add room';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request';
}

echo json_encode($response);
?>
