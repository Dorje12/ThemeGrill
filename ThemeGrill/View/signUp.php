<?php
require('C:\xampp\htdocs\ThemeGrill\connection.php');
require('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    .container{
        flex: auto;
        display: block;
        align-items: center;
        padding: 50px;

    }
</style>
<body>
<body>
<div class="container">

    <form method="POST" action="processRegistration.php">
        <div><h1>Register</h1></div><br>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="nameHelp" placeholder="First Name">

        </div><br>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="nameHelp" placeholder="Last Name">

        </div><br>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">

        </div><br>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="date" class="form-control" name="age" id="age" aria-describedby="age" placeholder="Age">

        </div><br>
        <div class="form-group">
            <label for="contact">Contact </label>
            <input type="number" class="form-control" name="contact" id="contact" aria-describedby="nameHelp" placeholder="Contact">

        </div><br>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div><br>

        <div class="form-group">
            <label for="exampleInputPassword1"> Conform Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div><br>

        <button type="submit" class="btn btn-primary">Submit </button><a href="login.php">  Already have account</a>
    </form></div>
</body>
</body>
</html>