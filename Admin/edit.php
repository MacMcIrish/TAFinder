<?php
include 'session-connect.php';
session_start();

?>
<html>
	<head>

	</head>
	<body>
		<table>
			<?php
			echo '<tr>';
			$_SESSION['Term'] = $_POST['Term'];
			$_SESSION['Course'] = $_POST['Course'];
			$_SESSION['session'] = $_POST['session'];
			$r = mysqli_query($conn, 'SHOW COLUMNS FROM admin');
			$columns = [];
			while ($row = mysqli_fetch_assoc($r)) {
				array_push($columns, $row['Field']);
				echo '<td>' . $row['Field'] . '</td>';
			}
			echo '</tr>';
			echo '<form method="post" action="submit-edit.php"><tr>';
			for($i = 0; $i < count($columns); $i++){
				echo '<td><input value="' . $_POST[$columns[$i]] . '" name="' . $columns[$i] . '"/></td>';
			}
			echo '<td><input type="submit" value="Commit Changes"/></td></tr></form>';
			
			
			?>
		</table>
	</body>
</html>

