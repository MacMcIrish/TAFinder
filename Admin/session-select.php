<?php

$host = 'localhost';
$user = 'root';
$password = '123';
$database = 'data';
$table = 'admin';

$conn = mysqli_connect($host, $user, $password, $database);

$query = "SELECT DISTINCT Semester FROM " . $table;

$result = mysqli_query($conn, $query);

echo '<select name="sessionSelect">';
while ($row = mysqli_fetch_assoc($result)) {
	echo '<option name="session" value="' . $row['Semester'] . '">' . $row['Semester'] . '</option>';
}
echo '</select>';

mysqli_close($conn);
?>