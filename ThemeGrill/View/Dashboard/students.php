<?php
global $conn;
require ('dashboard.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require('C:\xampp\htdocs\ThemeGrill\connection.php');

$sql = "SELECT * FROM students WHERE position ='student' AND status='approved'";
$result = $conn->query($sql);

$students = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}
?>

<div class="container">
    <h1>Students</h1><br>

    <table class="table table-bordered">
        <button type="button" id="addStudentButton" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
            Add Student
        </button>

        <script>
            document.getElementById('addStudentButton').addEventListener('click', function() {
                window.location.href = 'addStudent.php';
            });
        </script>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Contact</th>
                <th>Course</th>
                <th>Profile Picture</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['first_name']; ?></td>
                    <td><?php echo $student['last_name']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td><?php echo $student['age']; ?></td>
                    <td><?php echo $student['contact']; ?></td>
                    <td><?php echo $student['course']; ?></td>
                    <td><img src="/ThemeGrill/View/<?php echo $student['profile_picture']; ?>" alt="Profile Picture" style="max-width: 100px; max-height: 100px;"></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>
