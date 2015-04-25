<?php
include 'session-connect.php';
session_start();
$p = $_POST;
$query = 'UPDATE admin SET Course="' . $p['Course'] . 
	'", Term="' . $p['Term'] . '", Hours="' . $p['Hours'] . '", Status="' . $p['Status'] .
	'", Day="' . $p['Day'] . '", Start="' . $p['Start'] . '", End="' . $p['End'] . 
	'", session="' . $p['session'] . '" WHERE Course="' . $_SESSION['Course'] .
	'" AND Term="' . $_SESSION['Term'] . '" AND session="' . $_SESSION['session'] . '"';
	
	
	
if (mysqli_query($conn, $query)){
	header('location:http://localhost/tafinder/admin/addCourse.php');
}else{
	die('Fatal error: ' . mysqli_error($conn));
	
}





?>