<?php

$host = 'localhost';
$user = 'root';
$password = '123';
$database = 'data';
$table = 'ta';

//Establish Connection
echo $_POST['buttonthing'];
$conn = mysqli_connect($host, $user, $password, $database);

//Test Connection
if ($conn -> connect_error) {
	echo "Connection Error<br>";
} else {
	echo "Connection Succesful<br>";
}

$query = "INSERT INTO " . $table . " (`firstName`, `lastName`, `studentNumber`, `undergraduate`, `faculty`, `year`, `empID`, `email`, `address`, `city`, `postalCode`, `phone`, `phone2`, `eligible`, `fulltime`, `new`, `preferredHours`, `maxHours`) VALUES (";
foreach ($_POST as $key => $value) {
	if ($key === 'submit') {

	} elseif ($key === 'maxHours') {
		$query = $query . $value . ')';
		break;
	} else {
		$query = $query . "'" . $value . "', ";
	}
}

echo $query;
if (mysqli_query($conn, $query)){
	header('location:http://localhost/tafinder/login.php');
}else{
	echo "<br><br>Something went wrong.";
}


mysqli_close($conn);
?>