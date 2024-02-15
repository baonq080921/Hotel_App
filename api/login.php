<?php
include("../config.php");

header("Content-Type: application/json");

$response = array();

if (isset($_POST['user_login_submit'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Username = $_POST['Username'];

    // Validate and sanitize user input before using in the query
    $Email = mysqli_real_escape_string($conn, $Email);
    $Password = mysqli_real_escape_string($conn, $Password);
    $Username = mysqli_real_escape_string($conn, $Username);

    $sql = "SELECT * FROM signup WHERE Email = '$Email' AND Username = '$Username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($Password, $user['Password'])) {
            session_start();
            $_SESSION['usermail'] = $Email;
            $response['status'] = 'success';
            $response['message'] = 'Login successful';
            $response['redirect'] = 'home.php';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Invalid email, username, or password';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Database error';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request';
}

echo json_encode($response);
?>
