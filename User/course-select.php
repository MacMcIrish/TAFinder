<?php
include 'session-connect.php';
session_start();
if(isset($_POST)){
	$_SESSION['userInfo'] = $_POST;
	$_SESSION['session'] = $_POST['session'];
}
?>
<html>
	<head>

	</head>
	<body>
		<h1>Select from available courses</h1>
		<form name='userSubmit' action='user-test.php' method='post'>
			<table>
				<tr>
					<td></td>
					<td>Course</td>
					<td>Semester</td>
					<td>Hours</td>
					<td>Previously taken</td>
				</tr>
				<?php
				$table = 'admin';
				$session = $_POST['session'];
				$courseList = $_POST['applyCourse'];
				$courseListQuery = ' AND ';
				for ($i = 0; $i < count($courseList); $i++) {
					$courseListQuery = $courseListQuery . ' Course LIKE "%' . $courseList[$i] . '%"';
					if(($i < count($courseList) - 1)){
						$courseListQuery = $courseListQuery . ' OR ';
					}
				}
				$query = 'SELECT Course, Term, Hours FROM ' . $table . ' WHERE (session="' . $session . '" ' . $courseListQuery . ') AND Hours BETWEEN 2 AND ' . $_POST['maxHours'] ;
				
				$result = mysqli_query($conn, $query);
				$i = 0;
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					echo '<tr>
							<td><input type="checkbox" name="checked[' . $i . ']" value="' . $row[0] . ':' . $row[1] . '"></td>
							<td>' . $row[0] . '</td>
							<td>' . $row[1] . '</td>
							<td>' . $row[2] . '</td>
							<td><input type="checkbox" name="Taken[' . $i . ']"></td>
						  </tr>';
						  $i++;
				}
				?>
			</table>
			<input type='submit'>
		</form>
	</body>

</html>