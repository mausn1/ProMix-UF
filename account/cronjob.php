<?php
require 'db.php';
require 'authController.php';
require_once 'constants.php';


$cronjob = "DELETE FROM users WHERE verified = 0 AND created_at < TIME(DATE_SUB(NOW(), INTERVAL 2 HOUR))";
$run = mysqli_query($conn, $cronjob);

