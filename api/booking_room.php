<?php

// Include your database configuration file
include '../config.php';

header("Content-Type: application/json");

// API endpoint for room booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Remove the isset check
    // if (isset($_POST['guestdetailsubmit'])) {

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Country = $_POST['Country'];
    $Phone = $_POST['Phone'];
    $RoomType = $_POST['RoomType'];
    $Bed = $_POST['Bed'];
    $NoofRoom = $_POST['NoofRoom'];
    $Meal = $_POST['Meal'];
    $cin = $_POST['cin'];
    $cout = $_POST['cout'];

    if ($Name == "" || $Email == "" || $Country == "") {
        $response = array('status' => 'error', 'message' => 'Fill the proper details');
    } else {
        $sta = "NotConfirm";
        $sql = "INSERT INTO roombook(Name, Email, Country, Phone, RoomType, Bed, NoofRoom, Meal, cin, cout, stat, nodays) VALUES ('$Name','$Email','$Country','$Phone','$RoomType','$Bed','$NoofRoom','$Meal','$cin','$cout','$sta',DATEDIFF('$cout','$cin'))";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $response = array('status' => 'success', 'message' => 'Reservation successful');
        } else {
            $response = array('status' => 'error', 'message' => 'Something went wrong');
        }
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    // Remove the closing brace for isset
    // }
}

// Close database connection (if config.php doesn't already do it)
if (isset($conn)) {
    mysqli_close($conn);
}

?>
