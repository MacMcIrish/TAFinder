<html>
	<head>
		<?php
		include 'session-connect.php';
		$table = 'admin';
		$query = 'SELECT DISTINCT session FROM ' . $table;
		mysqli_query($conn, $query);
		?>
		<style>
			input{
				width: 100px;
				margin: 3px;
			}
			
		</style>
		
	</head>
	<h1>Select Session to Apply for:</h1>
	<br>
	<form method="post" name="courseSelect" action='http://localhost/tafinder/user/main-form.php'>
		<?php include 'session-radio-buttons.php'; ?> 
		<input type='submit'/>
	</form>

</html>
<?php
	if (isset($conn)) {
		mysqli_close($conn);
	};
?>