<?php
global $conn;
require('dashboard.php');
require('C:\xampp\htdocs\ThemeGrill\connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


if (isset($_GET['id'])) {
    $student_id = $_GET['id'];


    $sql = "SELECT * FROM students WHERE id = $student_id";
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

        
        echo '<div class="container">';
        echo '<h1>Student Information</h1>';
        ?>
        <style>
            .tab {
                display: inline-block;
                margin-left: 20px;
            }

            .button-container {
                margin-top: 20px;
            }

            .profile-picture {
                border-radius: 50%;
                max-width: 200px;
            }
        </style>

        <div class="container button-container">
            <button type="button" id="editProfileButton" class="btn btn-primary">
                Edit Profile
            </button>
            <span class="tab"></span>
            <button type="button" id="deleteProfileButton" class="btn btn-danger">
                Delete Profile
            </button>
            <br><br>
            <script>

                document.getElementById('editProfileButton').addEventListener('click', function () {

                    window.location.href = 'editStudent.php?id=<?php echo $student_id; ?>';
                });
            </script>

            <script>

                document.getElementById('deleteProfileButton').addEventListener('click', function () {

                    window.location.href = 'deleteStudent.php?id=<?php echo $student_id; ?>';
                });
            </script>
        </div>

        <?php
        echo '<div class="text-center">';
        echo '<img src="/ThemeGrill/View/' . $profile_picture . '" alt="Profile Picture" class="img-thumbnail profile-picture">';
        echo '</div>';
        echo '<table class="table table-bordered mt-4">';
        echo '<tr><th>Full Name</th><td>' . $full_name . '</td></tr>';
        echo '<tr><th>Email</th><td>' . $email . '</td></tr>';
        echo '<tr><th>Age</th><td>' . $age . '</td></tr>';
        echo '<tr><th>Position</th><td>' . $position . '</td></tr>';
        echo '<tr><th>Contact</th><td>' . $contact . '</td></tr>';
        echo '<tr><th>Course</th><td>' . $course . '</td></tr>';
        echo '</table>';
        echo '</div>';
    } else {

        echo '<div class="container">';
        echo '<h1>Student Not Found</h1>';
        echo '<p>The requested student information could not be found.</p>';
        echo '</div>';
    }
} else {

    echo '<div class="container">';
    echo '<h1>Invalid Request</h1>';
    echo '<p>Invalid request. Please provide a valid student ID.</p>';
    echo '</div>';
}
?>
