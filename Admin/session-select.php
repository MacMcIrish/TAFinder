<?php

include 'session-connect.php';
$table = 'sessions';

$query = "SELECT session, open FROM " . $table . ' WHERE 1';

$result = mysqli_query($conn, $query);

echo '<select name="session">';
while ($row = mysqli_fetch_assoc($result)) {
	if ($row['open'] == 1){
		$s = '(open)';
	}else{
		$s = '(closed)';
	}
	echo '<option name="session" value="' . $row['session'] . '">' . $row['session'] . ' ' . $s . '</option>';
}
echo '</select>';

mysqli_close($conn);
?>