<?php
$host = 'localhost';
$user = 'root';
$password = '123';
$database = 'data';

$loginUser = $_POST['user'];
$loginUser = stripslashes($loginUser);
$loginPass = $_POST['password'];
$loginPass = stripslashes($loginPass);

$hashed = hash('sha256', $loginPass, 'false');

$conn = mysqli_connect($host, $user, $password, $database);
$query = "SELECT email, hash, priv FROM login WHERE email='" . $loginUser . "' AND hash='" . $hashed . "'";

$result = mysqli_query($conn, $query);

//If user exists and matches password, status is checked and user is passed to either admin-front or the main-form
if ($numRows = mysqli_num_rows($result)) {
	if ($numRows == 1) {
		session_start();
		$_SESSION['myusername'] = $loginUser;
		$_SESSION['loggedin'] = true;
		//header("location:main-form.php");
		$priv = mysqli_fetch_assoc($result);
		if ($priv['priv'] === 'admin'){
			$_SESSION['priv'] = 'admin';
			header('location:/tafinder/admin/admin-front.php');
		}elseif($priv['priv'] === 'user'){
			$_SESSION['priv'] = 'user';
			header('location:/tafinder/user/main-form.php');
		}
		
		
	}
} else {
	echo "Wrong Password. <a href='login.php'>Go back.</a>";
}
mysqli_close($conn);
?>