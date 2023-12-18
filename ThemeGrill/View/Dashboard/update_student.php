<?php
// update_student.php

// Include necessary files and establish database connection
global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');
require('dashboard.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    // Add other fields as needed

    // Update student information in the database
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
