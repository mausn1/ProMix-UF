<?php

include 'authController.php';

if (isset($_GET['token']) or isset($_GET['password-token'])) {
    if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyEmail($token);
} 
    if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
} 
} else {
    header('location: https://promix-uf.se');
}

?>
