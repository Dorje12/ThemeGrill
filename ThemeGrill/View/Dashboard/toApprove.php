<?php
global $conn;
require('C:\xampp\htdocs\ThemeGrill\connection.php');
require('dashboard.php');

// Fetch users with 'Pending' status
$pendingUsersQuery = "SELECT * FROM students WHERE status = 'Pending' AND position='student'";
$result = $conn->query($pendingUsersQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Approval</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .approval-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .approve-button, .reject-button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            text-align: center;
        }

        .approve-button {
            background-color: #4CAF50; /* Green */
        }

        .reject-button {
            background-color: #f44336; /* Red */
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Registration Approval</h1>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo '<div>';
        echo '<p>Name: ' . $row['first_name'] . ' ' . $row['last_name'] . '</p>';
        echo '<p>Email: ' . $row['email'] . '</p>';
        echo '<p>Course: ' . $row['course'] . '</p>';
        echo '<form method="POST" action="toApprove.php">';
        echo '<input type="hidden" name="user_id" value="' . $row['id'] . '">';
        echo '<div class="approval-buttons">';
        echo '<button class="approve-button" type="submit" name="action" value="approve">Approve</button>';
        echo '<button class="reject-button" type="submit" name="action" value="reject">Reject</button>';
        echo '</div>';
        echo '</form>';
        echo '</div><br>';
    }
    ?>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];

    if ($_POST['action'] == 'approve') {
        $approveQuery = "UPDATE students SET status = 'Approved' WHERE id = '$userId'";
        $conn->query($approveQuery);
    } elseif ($_POST['action'] == 'reject') {
        $rejectQuery = "UPDATE students SET status = 'Rejected' WHERE id = '$userId'";
        $conn->query($rejectQuery);
    }
}
?>
