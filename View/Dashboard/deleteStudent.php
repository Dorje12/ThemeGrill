<?php
global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');
require('dashboard.php');


if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();
}


if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

   
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
