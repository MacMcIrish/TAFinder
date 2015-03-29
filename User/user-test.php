<?php
session_start();
print_r($_POST);
echo '<br>';
print_r($_SESSION);
echo '<br>';
$user = $_SESSION['userInfo'];
print_r($user);
include 'session-connect.php';
$userInfoQuery = 



?>