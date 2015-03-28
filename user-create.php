<?php
include 'session-connect.php';
$table = 'login';

if (!isset($_POST['newUser'])) {
	die('Unable to accept newUser variable');
}

$newUser = $_POST['newUser'];
$newPass = $_POST['newPass'];

$hashed = hash('sha256', $newPass, 'false');

$query = 'INSERT INTO ' . $table . " (email, hash, salt, priv) VALUES ('" . $newUser . "', '" . $hashed . "', 'null', 'user')";

//debug purp only
//echo $query;

//redirects back to login on success
if (mysqli_query($conn, $query)) {
	session_start();
	$_SESSION['newAccount'] = [$newUser, $newPass];
	header('location:login.php');
} else {
	echo 'Error: ' . mysqli_error($conn);

}

mysqli_close($conn);
echo $query;
?>
<br>

<a href="login.php">Go Back</a>