<?php
// edit_student.php

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

    // Fetch student information based on ID
    $sql = "SELECT * FROM students WHERE id = $student_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // Display the student details in a form for editing
        echo "<h2>Edit Student</h2>";
        echo "<form action='update_student.php' method='post'>";
        echo "<input type='hidden' name='student_id' value='$student_id'>";
        echo "First Name: <input type='text' name='first_name' value='{$student['first_name']}'><br>";
        echo "Last Name: <input type='text' name='last_name' value='{$student['last_name']}'><br>";
        // Add other fields as needed
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "Student not found.";
    }
} else {
    echo "Student ID not provided.";
}
?>
