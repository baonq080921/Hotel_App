<?php
include("../config.php");

header("Content-Type: application/json");

$response = array();

if (isset($_POST['Emp_login_submit'])) {
    $Email = $_POST['Emp_Email'];
    $Password = $_POST['Emp_Password'];

    // Validate and sanitize user input before using in the query
    $Email = mysqli_real_escape_string($conn, $Email);
    $Password = mysqli_real_escape_string($conn, $Password);

    $sql = "SELECT * FROM emp_login WHERE Emp_Email = '$Email' AND Emp_Password = BINARY'$Password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['usermail'] = $Email;
        $response['status'] = 'success';
        $response['message'] = 'Login successful';
        $response['redirect'] = 'admin/admin.php';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid email or password';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request';
}

echo json_encode($response);
?>
