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

    <style>
        body {
            background-color: #f8f9fa; /* Set a light background color */
        }

        .container {
            margin-top: 30px;
        }

        .student-info {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

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
            font-size: 16px;
            text-align: center;
        }

        .approve-button {
            background-color: #4CAF50; /* Green */
            color: #fff;
        }

        .reject-button {
            background-color: #f44336; /* Red */
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Registration Approval</h1>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="student-info">
            <p><strong>Name:</strong> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Course:</strong> <?php echo $row['course']; ?></p>
            <div class="approval-buttons">
                <form method="POST" action="toApprove.php">
                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                    <button class="approve-button" type="submit" name="action" value="approve">Approve</button>
                    <button class="reject-button" type="submit" name="action" value="reject">Reject</button>
                </form>
            </div>
        </div>
    <?php } ?>
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
