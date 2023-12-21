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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>View Profile</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?php echo $student['first_name']; ?></td>
                    <td><?php echo $student['last_name']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td><a href="studentProfile.php?id=<?php echo $student['id']; ?>">View Information</a></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>
