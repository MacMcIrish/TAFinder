<html>
	<head>
		<?php
		include 'admin-check.php';
		if (isset($_SESSION['sessionSelect'])) {
			$_POST['sessionSelect'] = $_SESSION['sessionSelect'];
		}
		echo '<h1 id="session">' . $_POST['sessionSelect'] . '</h1>';
		?>

		<style>
			input, 	td {
				width: 200px;
			}

		</style>
	</head>

	<body>
		<button onclick='addNewRow()'> Add new Row </button>
		<form name='form' method="post" action="admin-connect.php">
			<table width='600' id='table'>
				<tr>
					<th>Course</th>
					<th>Semester</th>
					<th>Hours</th>
					<th>Type</th>
					<th>Day</th>
					<th>Start</th>
					<th>End</th>
				</tr>
				<tr>
					<td><select name='course[]'>
						<option value='MATH'>MATH</option>
						<option value='PHYS'>PHYS</option>
						<option value='COSC'>COSC</option>
					</select></td>
					<td><input type="number" min="1" max="2" name="term[]"/></td>
					<td><input type="number" min="2" max="12" name="hours[]"/></td>
					<td><input type="text" name="type[]" /></td>
					<td><input type="text" name='day[]'/></td>
					<td><input type="text" name='start[]'/></td>
					<td><input type="text" name='end[]'/></td>
					<td><input type="text" name="semester[]" value="<?php echo $_POST['sessionSelect'] ?>" readonly></td>
				</tr>
			</table>
			<input type='submit' name='submit' value='send'/>
		</form>
		<script src='javascript.js'></script>
		<form action="http://localhost/tafinder/logout.php">
			<input type="submit" value="Cancel"/>
		</form>
		<table>
			<?php include 'admin-table-fill.php'; ?>	
		</table>
		
	</body>

</html>