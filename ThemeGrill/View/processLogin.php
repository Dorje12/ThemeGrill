<?php
global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);

    // Check if the email and password match a record in the database
    $sql = "SELECT * FROM students WHERE email = '$email' AND position='teacher'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect to a dashboard or home page
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email'];
            header("Location: Dashboard/dashboard.php"); // Change this to the desired dashboard or home page
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "Email not found. Please register or check your credentials.";
    }
}

// Function to validate input data
function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
