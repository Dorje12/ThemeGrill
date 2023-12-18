<?php
require ('C:\xampp\htdocs\ThemeGrill\connection.php');
require('header.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In</title>
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
<div class="container">
    <form action="processLogin.php" method="post" name="login">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control"  name="email" id="email" aria-describedby="email" placeholder="Enter email" required>

        </div><br>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
        </div><br>
        <button type="submit" class="btn btn-primary">Submit </button><a href="signUp.php">   Do not have an Account?</a>
    </form></div>
</body>
</html>