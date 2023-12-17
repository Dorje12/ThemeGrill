<?php
global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user details from the database
    $query = "SELECT * FROM students WHERE email = '$email' AND position = 'teacher'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check if the "password" key exists in the $user array
        if (isset($user['password'])) {
            // Use password_verify for secure password comparison
            if (password_verify($password, $user['password'])) {
                // Successful login for a teacher
                header("Location: Dashboard/teacher_dashboard.php");
                exit();
            } else {
                // Incorrect password
                echo "Incorrect password";
            }
        } else {
            // Password key not found in the array
            echo "Invalid credentials";
        }
    } else {
        // User not found or not a teacher
        echo "Invalid credentials";
    }
}
?>
