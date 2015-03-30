<?php
include 'session-connect.php';
$table = 'sessions';
$query = 'SELECT DISTINCT session FROM ' . $table . ' WHERE open=1';

$result = mysqli_query($conn, $query);
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)){
	echo '<input type="radio" name="sessionSelect" value="' . $rows[0] . '">' . $rows[0] . '</input><br>';
}
?>