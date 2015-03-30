<?php 
include 'session-connect.php';
session_start();
$s = $_SESSION['session'];
$query = 'SELECT open FROM sessions WHERE session="' . $s . '"';

$result = mysqli_query($conn, $query);
$query = 'UPDATE sessions SET open=';
if($row = mysqli_fetch_assoc($result)){
	if($row['open'] == 1){
		$query = $query . '0';
	}else{
		$query = $query . '1';
	}
}
$query = $query . ' WHERE session="' . $s . '"';
mysqli_query($conn, $query);
header('location:http://localhost/tafinder/admin/addCourse.php');


?>