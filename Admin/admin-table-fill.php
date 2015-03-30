<?php
if(!isset($_SESSION['session'])){
	die("Unable to find session.222");
}

include 'session-connect.php';
$table = 'admin';

$query = 'SELECT Course, Term, Hours, Status, Day, Start, End, session FROM ' . $table . ' WHERE session="' . $_SESSION['session'] . '"';


$result = mysqli_query($conn, $query);
//echo 'table start<br><table>';

//Creates an HTML table element containing previously saved courses
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
	echo '<tr>';
	for ($i = 0; $i < count($row); $i++){
		echo '<td style="border: solid black 1px;">' . $row[$i] . '</td>';
	}
	echo '</tr>';
}
echo '</table>';

?>