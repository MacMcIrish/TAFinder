<?php

include 'session-connect.php';
$table = 'admin';

$post = array_values($_POST);

$insert = 'INSERT INTO ' . $table . ' (Course, Term, Hours, Status, Day, Start, End, session) VALUES (';

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
		header('location:addCourse.php');
	}else{
		echo 'Problem<br>' .$conn->error;
	}
}

mysqli_close($conn);
?>