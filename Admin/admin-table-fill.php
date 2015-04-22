<?php
if(!isset($_SESSION['session'])){
	die("Unable to find session.");
}

include 'session-connect.php';
$table = 'admin';

$query = 'SELECT Course, Term, Hours, Status, Day, Start, End, session FROM ' . $table . ' WHERE session="' . $_SESSION['session'] . '" ORDER BY Course';
$getRowsQuery = 'SHOW COLUMNS FROM ' . $table;

$rowResult = mysqli_query($conn, $getRowsQuery);
$result = mysqli_query($conn, $query);
$columns = [];
echo '<tr>';
while ($row = mysqli_fetch_array($rowResult)){
	echo '<td style="border: solid black 1px;">' . $row['Field'] . '</td>';
	array_push($columns, $row['Field']);
}
echo '</tr>';

//Creates an HTML table element containing previously saved courses
//Each row is a seperate form, clicking edit submits that form to edit.php
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
	
	echo '<form action="edit.php" method="post"><tr>';
	for ($i = 0; $i < count($row); $i++){
		echo '<td style="border: solid black 1px;"><input type="text" readonly name="' . $columns[$i] . '" value="' . $row[$i] . '"></td>';
	}
	echo '<td><input type="submit" value="edit"/></td>';
	echo '</tr></form>';
}
echo '</table>';

?>