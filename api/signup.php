<?php
include("../config.php");

header("Content-Type: application/json");

$response = array();

if (isset($_POST['user_signup_submit'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $CPassword = $_POST['CPassword'];
    $enc_password = password_hash($Password, PASSWORD_DEFAULT);

    if ($Username == "" || $Email == "" || $Password == "") {
        $response['status'] = 'error';
        $response['message'] = 'Fill in the proper details';
        echo json_encode($response);
        exit(); // Add this line to stop execution if there are validation errors
    }

    if ($Password == $CPassword) {
        $sql = "SELECT * FROM signup WHERE Email = '$Email'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $response['status'] = 'error';
            $response['message'] = 'Email already exists';
        } else {
            $sql = "INSERT INTO signup (Username, Email, Password) VALUES ('$Username', '$Email', '$enc_password')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                session_start();
                $_SESSION['usermail'] = $Email;
                $response['status'] = 'success';
                $response['message'] = 'Registration successful';
                $response['redirect'] = 'home.php';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Something went wrong';
            }
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Password does not match';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request';
}

echo json_encode($response);
?>
