<html>
	<head>
		<?php
		include 'admin-check.php';
		?>
	</head>
	<body>
		<h1>Select a session</h1>
		<form name='sessionForm' method='post' action='addCourse.php'>
			<?php include 'session-select.php'; ?><input type='submit' name='submit' value='continue'/>
		</form>
		<form name='createSession' method='post' action='createCourse.php'>
			<button>Create Session</button>
			<!-- TODO Create database query that creates next session identifier, should delete itself while on way
			to next page -->
		</form>
		<form action="http://localhost/tafinder/logout.php">
			<input type="submit" value="Cancel"/>
		</form>
	</body>

</html>