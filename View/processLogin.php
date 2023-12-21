<?php
global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);


    $sql = "SELECT * FROM students WHERE email = '$email' AND position='teacher'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {

            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email'];
            header("Location: Dashboard/profile.php");
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "Email not found. Please register or check your credentials.";
    }
}


function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
