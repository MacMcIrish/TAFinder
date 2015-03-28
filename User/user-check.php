<?php
session_start();
if (!(isset($_SESSION['loggedin']) || $_SESSION['priv'] == 'user')) {
	header("location:http://localhost/tafinder/login.php");
}
?>