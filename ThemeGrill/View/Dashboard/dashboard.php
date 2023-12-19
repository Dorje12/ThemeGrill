<?php
global $conn;
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: http://localhost/ThemeGrill/View/login.php");
    exit();
}

// Include the connection.php file to establish a database connection
require('C:\xampp\htdocs\ThemeGrill\connection.php');

// Get user details from the database based on the user_id stored in the session
$user_id = $_SESSION['user_id'];
$sql = "SELECT first_name, last_name FROM students WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $full_name = $row['first_name'] . ' ' . $row['last_name'];
} else {
    $full_name = "User";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
        }

        .navbar {
            background-color: #337ab7;
            color: white;
        }

        .navbar-right {
            margin-right: 20px;
        }

        .container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="profile.php">Theme Grill</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="toApprove.php">Approve Students</a></li>
            <li><a href="students.php">Students</a></li>
            <li class="navbar-text navbar-right"><?php echo $full_name; ?></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

    </div>
</nav>

</body>

</html>
