<?php
global $conn;
require('dashboard.php');
require('C:\xampp\htdocs\ThemeGrill\connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

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



    if ($password !== $confirm_password) {
        $errors[] = "Password and Confirm Password do not match.";
    }


    $existingEmailCheck = "SELECT * FROM students WHERE email = '$email'";
    $result = $conn->query($existingEmailCheck);
    if ($result->num_rows > 0) {
        $errors[] = "Email already exists. Please use a different email.";
    }


    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $profile_picture = uploadProfilePicture();


        $sql = "INSERT INTO students (first_name, last_name, email, age, contact, course, password, profile_picture) VALUES ('$first_name', '$last_name', '$email', '$age', '$contact', '$course', '$hashed_password', '$profile_picture')";

        if ($conn->query($sql) === TRUE) {

            header("Location: http://localhost/ThemeGrill/View/Dashboard/students.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        $conn->close();
    }
}


function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function uploadProfilePicture()
{
    $targetDir = "../uploads/";

    $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


    if ($_FILES["profile_picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {

            $fileName = "uploads/" . basename($_FILES["profile_picture"]["name"]);
            return $fileName;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    return null;
}
?>
