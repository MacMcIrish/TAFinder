<?php
include 'session-connect.php';
session_start();
?>
<html>
	<head>

	</head>
	<body>
		<h1>Select from available courses</h1>
		<form>
			<table>
				<?php
				$table = 'admin';
				$course = $_POST['courseSelect'];
				$query = 'SELECT Course FROM ' . $table . ' WHERE session="' . $course . '"';
				$result = mysqli_query($conn, $query);
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					echo '<tr>
							<td><input type="checkbox" name="' . $row[0] . '"></td>
							<td>' . $row[0] . '</td>
							<td><input type="checkbox" name="Taken"</td>
						  </tr>';
				}
				?>
			</table>
		</form>
	</body>

</html>