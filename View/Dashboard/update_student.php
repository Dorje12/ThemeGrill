<?php

global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');
require('dashboard.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $sql = "UPDATE students SET first_name='$first_name', last_name='$last_name' WHERE id=$student_id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Student updated successfully.";
    } else {
        echo "Error updating student: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
