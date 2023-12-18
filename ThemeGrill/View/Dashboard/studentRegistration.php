<?php
// Include the connection.php file to establish a database connection
global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $errors = array();

    $first_name = validateInput($_POST['first_name']);
    $last_name = validateInput($_POST['last_name']);
    $email = validateInput($_POST['email']);
    $age = validateInput($_POST['age']);
    $contact = validateInput($_POST['contact']);
    $course = validateInput($_POST['course']);
    $position = validateInput($_POST['position']);
    $password = validateInput($_POST['password']);
    $confirm_password = validateInput($_POST['conform_password']);

    // Perform additional validation as needed (e.g., check email format, password strength, etc.)
    // You can use regular expressions or other methods for more specific validation.

    if ($password !== $confirm_password) {
        $errors[] = "Password and Confirm Password do not match.";
    }

    // Check if the email is already in use
    $existingEmailCheck = "SELECT * FROM students WHERE email = '$email'";
    $result = $conn->query($existingEmailCheck);
    if ($result->num_rows > 0) {
        $errors[] = "Email already exists. Please use a different email.";
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO students (first_name, last_name, email, age, contact, course, password) VALUES ('$first_name', '$last_name', '$email', '$age', '$contact', '$course', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to login.php
            header("Location: students.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
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
