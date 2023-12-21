<?php
session_start();


session_unset();


session_destroy();


header("Location: http://localhost/ThemeGrill/View/login.php");
exit();
?>
