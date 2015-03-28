<?php
//Checks to see if admin status is granted
session_start();
if (!isset($_SESSION['loggedin'])) {
	if (!($_SESSION['loggedin'] == true)) {
		header('location:http://localhost/tafinder/login.php');
	}
} elseif (!($_SESSION['myusername'] == 'admin')) {
	header('location:http://localhost/tafinder/user/main-form.php');
}
?>