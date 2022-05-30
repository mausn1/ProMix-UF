<?php
require 'db.php';
require 'authController.php';
require_once 'constants.php';


$cronjob = "DELETE FROM users WHERE verified=0 AND created_at < TIME(DATE_SUB(NOW(), INTERVAL 2 HOUR))";
$run = $conn->query($cronjob);


$cronjob2 = "DELETE FROM checkout WHERE checkedout=0";
$run2 = $conn->query($cronjob2);


$row_query = "SELECT * FROM users";
$cron_amount_result = $conn->query($row_query);

while ($cart_row = $cron_amount_result->fetch_assoc()){
    foreach($cron_amount_result as $cron_row) {
        $oldtoken=$cron_row['token'];
        $newtoken = bin2hex(random_bytes(50));
        $cronjob3 = "UPDATE users SET token='$newtoken' WHERE passreset_at < TIME(DATE_SUB(NOW(), INTERVAL 2 HOUR)) AND token='$oldtoken'";
        $run3 = $conn->query($cronjob3);
    }
}