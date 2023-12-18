<?php
// delete_student.php

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

// Check if student ID is provided in the URL
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Delete student from the database
    $sql = "DELETE FROM students WHERE id = $student_id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Student deleted successfully.";
    } else {
        echo "Error deleting student: " . $conn->error;
    }
} else {
    echo "Student ID not provided.";
}
?>
