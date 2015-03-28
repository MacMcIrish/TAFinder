<?php
include 'session-connect.php';
$table = 'admin';
$query = 'SELECT DISTINCT session FROM ' . $table;

$result = mysqli_query($conn, $query);
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)){
	echo '<input type="radio" name="sessionSelect">' . $rows[0] . '</input><br>';
}
?>