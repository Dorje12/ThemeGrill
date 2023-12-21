<?php
global $conn;
session_start();


if (!isset($_SESSION['user_id'])) {

    header("Location: http://localhost/ThemeGrill/View/login.php");
    exit();
}


require('C:\xampp\htdocs\ThemeGrill\connection.php');


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
    <
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            padding-top: 70px;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
            color: white;
            border-radius: 0;
        }

        .navbar-brand {
            font-size: 1.5em;
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
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="toApprove.php"><i class="fas fa-check"></i> Approve Students</a></li>
            <li><a href="students.php"><i class="fas fa-graduation-cap"></i> Students</a></li>
            <li class="navbar-text navbar-right"><?php echo $full_name; ?></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
</nav>


</body>

</html>
