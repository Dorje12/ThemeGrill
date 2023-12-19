<?php
global $conn;
require('dashboard.php');
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
    $confirm_password = validateInput($_POST['conform_password']); // Corrected the typo in the variable name

    // Perform additional validation as needed

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

        // Handle file upload for profile picture
        $profile_picture = uploadProfilePicture();

        // Insert data into the database
        $sql = "INSERT INTO students (first_name, last_name, email, age, contact, course, password, profile_picture) VALUES ('$first_name', '$last_name', '$email', '$age', '$contact', '$course', '$hashed_password', '$profile_picture')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to login.php
            header("Location: http://localhost/ThemeGrill/View/Dashboard/students.php");
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

// Function to handle file upload for profile picture
function uploadProfilePicture()
{
    $targetDir = "../uploads/";

    $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Your file processing and database saving code here

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
            // Modify the return statement to include "uploads/"
            $fileName = "uploads/" . basename($_FILES["profile_picture"]["name"]);
            return $fileName; // Return the modified file path to be stored in the database
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    return null;
}
?>
