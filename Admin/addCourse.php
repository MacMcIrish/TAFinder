<html>
	<head>
		<?php
		include 'admin-check.php';
		include 'session-connect.php';
		$head;
		if (isset($_POST['session'])) {
			$head = $_POST['session'];
			$_SESSION['session'] = $head;
		} elseif (isset($_SESSION['session'])) {
			$head = $_SESSION['session'];
		}
		echo '<h1 id="session">' . $head . '</h1>';
		?>

		<style>
			input, td {
				width: 150px;
			}

		</style>

	</head>

	<body>
		<button onclick='addNewRow()'> Add new Row </button>
		<form action='open-close-session.php'>
			<input type='submit' value='<?php
			if (isset($head)) {
				$query = 'SELECT open FROM sessions WHERE session="' . $head . '"';
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				if ($row['open'] == 1) {
					echo 'Close Session';
				} else {
					echo 'Open Session';
				}
			}
		?>'/>
		</form>
		<form action='export.php'>
			<input type='submit' value='Run analysis'>
		</form>
		<form name='form' method="post" action="admin-connect.php">
			<table width='600' id='table'>
				<tr>
					<th>Course ID</th>
					<th>Semester</th>
					<th>Hours</th>
					<th>Student Status</th>
					<th>Day</th>
					<th>Start</th>
					<th>End</th>
				</tr>
				<tr>
					<td><input type='text' name='course[]'</td>
					<td><input type="number" min="1" max="2" name="semester[]"/></td>
					<td><input type="number" min="2" max="12" name="hours[]"/></td>
					<td><input type="text" name="type[]" /></td>
					<td><input type="text" name='day[]'/></td>
					<td><input type="text" name='start[]'/></td>
					<td><input type="text" name='end[]'/></td>
					<td><input type="text" name="session[]" value="<?php echo $head; ?>" readonly></td>
				</tr>
			</table>
			<input type='submit' name='submit' value='Send'/>
		</form>
		<script src='javascript.js'></script>
		<form action="http://localhost/tafinder/admin/admin-front.php">
			<input type="submit" value="Go back"/>
		</form>
		<table style='border: solid black 1px;'>
			<?php
			include 'admin-table-fill.php';
 ?>
		</table>

	</body>

</html>