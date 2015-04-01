<?php
session_start();
$user = $_SESSION['userInfo'];

include 'session-connect.php';

$f = mysqli_query($conn, 'desc ta');

//Grabs names of columns in ta table
while ($r = mysqli_fetch_assoc($f)) {
	$fields[$r['Field']] = $r['Field'];
}
$user = $_SESSION['userInfo'];

//Starting query to add new user to database
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

if(mysqli_query($conn, $userQuery)){
	echo 'Succesful user Query<br><a href="http://localhost/tafinder/front-page.php">Go back</a>';
}else{
	die('User already exists, only one application per applicant please.<br><a href="http://localhost/tafinder/front-page.php">Go back</a>');
}

//Each loop here adds the courses that the user has ticked off attached to the User's student number
//TODO => Possibly change syntax to add multiple values in a single query? 
foreach ($_POST['checked'] as $key => $value) {
	if (isset($_POST['Taken'][$key])) {
		if ($_POST['Taken'][$key] == 'on') {
			$courseQuery = "INSERT INTO workson(studentNumber, courseID, semester, session) VALUES ('" . $user['studentNumber'] . "', '" . $value . "', '1', '" . $_SESSION['session'] . "')";
			mysqli_query($conn, $courseQuery);
		}
	}
}
?>