<?php
session_start();
print_r($_POST);
echo '<br>';
$user = $_SESSION['userInfo'];

include 'session-connect.php';

$f = mysqli_query($conn, 'desc ta');

//Grabs names of columns in ta table
while ($r = mysqli_fetch_assoc($f)) {
	$fields[$r['Field']] = $r['Field'];
}
echo '<br>FIELDS';
print_r($fields);
echo '<br>';
$user = $_SESSION['userInfo'];
print_r($user);
echo '<br>';

$userQuery = 'INSERT INTO ta(';

foreach ($fields as $key => $value) {
	if ($key == 'session') {
		$userQuery = $userQuery . $key . ')';
	} else {
		$userQuery = $userQuery . $key . ', ';
	}
}

$userQuery = $userQuery . ' VALUES (';

foreach ($fields as $key => $value) {
	if ($key == 'session') {
		$userQuery = $userQuery . "'" . $user[$key] . "')";
	} else {
		$userQuery = $userQuery . "'" . $user[$key] . "', ";
	}
}
echo '<br>' . $userQuery . '<br>';

foreach ($_POST['checked'] as $key => $value) {
	if (isset($_POST['Taken'][$key])) {
		if ($_POST['Taken'][$key] == 'on') {
			$courseQuery = "INSERT INTO workson(studentNumber, courseID, semester) VALUES ('" . $user['studentNumber'] . "', '" . $value . "', '1')";
			echo '<br>' . $courseQuery . '<br>';
		}
	}
}
?>