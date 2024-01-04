<?php
    include("../config.php");

    $id = $_GET['id'];

    $staffdeletesql = "DELETE FROM staff WHERE id ='$id'";
    $result =  mysqli_query($conn, $staffdeletesql);
    header("Location: staff.php");
?>