<?php
global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');
require('dashboard.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div class="container">
    <form method="POST" action="studentRegistration.php" enctype="multipart/form-data"> 
        <div><h1>Register</h1></div><br>

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="nameHelp" placeholder="First Name" required>
        </div><br>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="nameHelp" placeholder="Last Name" required>
        </div><br>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div><br>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" id="age" aria-describedby="age" placeholder="Age" required>
        </div><br>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="number" class="form-control" name="contact" id="contact" aria-describedby="nameHelp" placeholder="Contact" required>
        </div><br>

        <div class="form-group">
            <label for="course">Course</label><br>
            <label>
                <select class="form-control" name="course" required>
                    <option value="computing">Select a Course</option>
                    <option value="Computing">Computing</option>
                    <option value="Environmental Science">Environmental Science</option>
                    <option value="MBBS">MBBS</option>
                </select>
            </label>
        </div><br>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div><br>

        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="conform_password" placeholder="Confirm Password" required>
        </div><br>

        <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" class="form-control" name="profile_picture" id="profile_picture" accept="image/*">
        </div><br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
