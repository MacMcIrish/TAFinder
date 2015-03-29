<?php
session_start();
print_r($_POST);
echo '<br>';
print_r($_SESSION);
echo '<br>';
$user = $_SESSION['userInfo'];

echo '<br>USER:';
print_r($user);
echo $user['firstName'];
include 'session-connect.php';

$f = mysqli_query($conn, 'desc ta');

//Grabs names of columns in ta table 
while ($r = mysqli_fetch_assoc($f)){
	$fields[$r['Field']] = $r['Field'];
}
print_r($fields);
foreach ($fields as $key => $value){
	$user[$key];
}



?>