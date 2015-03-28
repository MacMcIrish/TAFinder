<?php

include 'session-connect';
$table = 'admin';

$post = array_values($_POST);

$insert = 'INSERT INTO ' . $table . ' (Course, Term, Hours, Status, Day, Start, End, Semester) VALUES (';
print_r($post);
//finds how many rows
$row = count($post[0]);
$column = count($post);

echo $row . '<br>';
echo $column . '<br>';
print_r($post[0]);
echo '<br>';

//Creates insert variables from $post
for ($i = 0; $i < $row; $i++) {
	$query = $insert;
	for ($j = 0; $j < ($column - 2); $j++) {

		$query = $query . "'" . $post[$j][$i] . "', ";

	}
	$query = $query . "'" . $post[($column - 2)][$i] . "')";
	
	if(mysqli_query($conn, $query)){
		header('location:admin-front.php');
	}else{
		echo 'Problem<br>' .$conn->error;
	}
}

mysqli_close($conn);
?>