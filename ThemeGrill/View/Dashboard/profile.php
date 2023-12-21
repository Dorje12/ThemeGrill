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

// Get user details from the database based on the user_id stored in the session
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM students WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $full_name = $row['first_name'] . ' ' . $row['last_name'];
    $email = $row['email'];
    $age = $row['age'];
    $contact = $row['contact'];
    $course = $row['course'];
    $position = $row['position'];
    $profile_picture = $row['profile_picture'];

} else {
    $full_name = "User";
    $email = "N/A";
    $age = "N/A";
    $contact = "N/A";
    $course = "N/A";
    $position = "N/A";
    $profile_picture = "N/A";
}

?>

<div class="container">
    <h1>Profile</h1>

    <button type="button" id="editProfileButton" class="btn btn-primary">
        Edit Profile
    </button>

    <script>
        // Add an event listener to the button
        document.getElementById('editProfileButton').addEventListener('click', function () {
            // Redirect to editProfile.php when the button is clicked
            window.location.href = 'editProfile.php';
        });
    </script><br><br>

    <div class="text-center">
        <img src="/ThemeGrill/View/<?php echo $profile_picture; ?>" alt="Profile Picture" class="img-circle img-thumbnail" style="width: 200px; height: 200px;">
    </div>

    <table class="table table-bordered mt-4">
        <tr>
            <th>Full Name</th>
            <td><?php echo $full_name; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><?php echo $age; ?></td>
        </tr>
        <tr>
            <th>Position</th>
            <td><?php echo $position; ?></td>
        </tr>
        <tr>
            <th>Contact</th>
            <td><?php echo $contact; ?></td>
        </tr>
        <tr>
            <th>Course</th>
            <td><?php echo $course; ?></td>
        </tr>
    </table>
</div>
</body>
