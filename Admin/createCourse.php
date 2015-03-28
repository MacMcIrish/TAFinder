<?php

$host = 'localhost';
$user = 'root';
$password = '123';
$database = 'data';
$table = 'admin';

$sessionList = [];

$conn = mysqli_connect($host, $user, $password, $database);

//Fetches other sessions to find latest entry
$query = 'SELECT DISTINCT Semester FROM ' . $table;
$result = (mysqli_query($conn, $query));
while ($row = mysqli_fetch_assoc($result)) {
	array_push($sessionList, $row);
}
$newSession = end($sessionList)['Semester'];

echo '<br>' . $newSession;

$newSession[0] = ($newSession[0] == 'W' ? 'S' : 'W');

//Increments year by one if summer session
if ($newSession[0] == 'S') {
	$year = substr($newSession, 3, 2);
	$newYear = $year + 1;
	$newSession = str_replace($year, $newYear, $newSession);
}

//Get column names from db
$query = 'SHOW COLUMNS FROM ' . $table;
if ($result = mysqli_query($conn, $query)) {
	$numRows = mysqli_num_rows($result);
}

$insertQuery = 'INSERT INTO ' . $table . ' (';
for ($i = 0; $i < $numRows - 1; $i++) {
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$insertQuery = $insertQuery . $row[0] . ', ';
}
$row = mysqli_fetch_array($result, MYSQLI_NUM);
$insertQuery = $insertQuery . $row[0] . ') VALUES ("","","" , "", "", "", "", "' . $newSession . '")';

//Passes user to the course add page, while keeping track of the new created course session on success
if (mysqli_query($conn, $insertQuery)) {
	session_start();
	$_SESSION['sessionSelect'] = $newSession;
	header("location:addCourse.php");
} else {
	header("location:admin-front.php");
}

mysqli_close($conn);
?>