<?php
include 'session-connect.php';
session_start();
if(isset($_POST)){
	$_SESSION['userInfo'] = $_POST;
}
?>
<html>
	<head>

	</head>
	<body>
		<?php print_r($_POST); ?>
		<h1>Select from available courses</h1>
		<form name='userSubmit' action='user-test.php' method='post'>
			<table>
				<?php
				$table = 'admin';
				$course = $_POST['sessionSelect'];
				$query = 'SELECT Course FROM ' . $table . ' WHERE session="' . $course . '"';
				$result = mysqli_query($conn, $query);
				$i = 0;
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					echo '<tr>
							<td><input type="checkbox" name="checked[' . $i . ']" value="' . $row[0] . '">Take this course</td>
							<td>' . $row[0] . '</td>
							<td><input type="checkbox" name="Taken[' . $i . ']">Taken?</td>
						  </tr>';
						  $i++;
				}
				?>
			</table>
			<input type='submit'>
		</form>
	</body>

</html>