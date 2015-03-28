<?php 

if(!isset($_POST['sessionSelect'])){
	die("Unable to find session.");
}

include 'session-connect';
$table = 'admin';

$query = 'SELECT Course, Term, Hours, Status, Day, Start, End, Semester FROM ' . $table . ' WHERE Semester="' . $_POST['sessionSelect'] . '"';
//echo $query;

$result = mysqli_query($conn, $query);
//echo 'table start<br><table>';

//Creates an HTML table element containing previously saved courses
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
	echo '<tr>';
	for ($i = 0; $i < count($row); $i++){
		echo '<td>' . $row[$i] . '</td>';
	}
	echo '</tr>';
}
echo '</table>';

?>