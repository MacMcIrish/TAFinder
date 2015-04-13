<?php
include 'session-connect.php';
session_start();
$session = $_SESSION['session'];
$taTable = [];
$query = 'SELECT * FROM ta WHERE session="' . $session . '"';

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {

	array_push($taTable, $row);
}
$TAFile = fopen('taFile.txt', 'w');
foreach ($taTable as $key => $value) {
	fputcsv($TAFile, $value, ',', '"');
}
fclose($TAFile);

$query = 'SELECT * FROM admin WHERE session="' . $session . '"';
$courseTable = [];

$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {

	array_push($courseTable, $row);
}
$courseFile = fopen('courseFile.txt', 'w');
foreach ($courseTable as $key => $value) {
	fputcsv($courseFile, $value, ',', '"');
}
fclose($courseFile);

$query = 'SELECT * FROM workson WHERE session="' . $session . '"';
$workTable = [];

$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {

	array_push($workTable, $row);
}
$workFile = fopen('workFile.txt', 'w');
foreach ($workTable as $key => $value) {
	fputcsv($workFile, $value, ',', '"');
}
fclose($workFile);

header('location:admin-front.php');
?>
