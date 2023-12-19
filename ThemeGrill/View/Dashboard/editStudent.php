<?php
global $conn;
require('dashboard.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Include the connection.php file to establish a database connection
require('C:\xampp\htdocs\ThemeGrill\connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch and sanitize form data
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $age = htmlspecialchars($_POST['age']);
    $contact = htmlspecialchars($_POST['contact']);
    $course = htmlspecialchars($_POST['course']);
    $position = htmlspecialchars($_POST['position']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['conform_password']);

    // Validate and update data
    if ($password === $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update user data
        $user_id = $_GET['id'];
        $sql = "UPDATE students SET 
                first_name = '$first_name',
                last_name = '$last_name',
                email = '$email',
                age = '$age',
                contact = '$contact',
                course = '$course',
                position = '$position',
                password = '$hashed_password'
                WHERE id = $user_id";

        if ($conn->query($sql) === TRUE) {
            // Data updated successfully
            echo "Data updated successfully";
        } else {
            // Error updating data
            echo "Error updating data: " . $conn->error;
        }
    } else {
        // Passwords do not match
        echo "Passwords do not match";
    }
}

// Fetch current user data for pre-filling the form
$user_id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $age = $row['age'];
    $contact = $row['contact'];
    $course = $row['course'];
    $position = $row['position'];
    // Do not fetch password for security reasons
} else {
    $first_name = "N/A";
    $last_name = "N/A";
    $email = "N/A";
    $age = "N/A";
    $contact = "N/A";
    $course = "N/A";
    $position = "N/A";
}

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
    <form method="POST">
        <div><h1>Register</h1></div><br>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="nameHelp" placeholder="First Name" value="<?php echo $first_name; ?>" required>

        </div><br>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="nameHelp" placeholder="Last Name" value="<?php echo $last_name; ?>" required>

        </div><br>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email; ?>"  required>

        </div><br>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" id="age" aria-describedby="age" placeholder="Age" value="<?php echo $age; ?>"required>

        </div><br>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="number" class="form-control" name="contact" id="contact" aria-describedby="nameHelp" placeholder="Contact" value="<?php echo $contact; ?>"required>

        </div><br>

        <div class="form-group">
            <label for="course">Course</label><br>
            <label>
                <select class="form-control" name="course" value="<?php echo $course; ?>" required>
                    <option value="computing">Select a Course</option>
                    <option value="Computing">Computing</option>
                    <option value="Environmental Science">Environmental Science</option>
                    <option value="MBBS">MBBS</option>
                </select>
            </label>

        </div><br>

        <div class="form-group">
            <label for="course">Position</label><br>
            <label>
                <select class="form-control" name="position" value="<?php echo $position; ?>" required>
                    <option value="student">student</option>

                </select>
            </label>

        </div><br>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>"required>

        </div><br>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="conform_password" placeholder="Confirm Password" required>

        </div><br>

        <button type="submit" class="btn btn-primary">Update </button>
    </form>
</div>
</body>
</html>
