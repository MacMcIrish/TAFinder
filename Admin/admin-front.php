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
		<form name='createSession' method='post' action='createSession.php'>
			<button>Create Session</button>
			
		</form>
		<form action="http://localhost/tafinder/logout.php">
			<input type="submit" value="Cancel"/>
		</form>
	</body>

</html>