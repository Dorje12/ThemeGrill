<?php
// Include the connection.php file to establish a database connection
global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO students (first_name, last_name, email, age, contact, password) VALUES ('$first_name', '$last_name', '$email','$age', '$contact', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login.php
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
