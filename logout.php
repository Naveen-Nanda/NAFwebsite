<?php
session_start();
unset($_SESSION['logged_in']);
session_destroy();
echo 'You have been logged out successfully. <a href="login.php">Go back</a>';