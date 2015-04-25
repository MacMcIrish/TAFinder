<html>
	<head>
		<?php
		include 'session-connect.php';
		$table = 'admin';
		$query = 'SELECT DISTINCT session FROM ' . $table;
		mysqli_query($conn, $query);
		?>
		<style>
			html, body {
				margin: 0;
				width: 100%;
				height: 100%;
			}
			.form{
				height:100%;
				width:100%;
				margin-bottom: -2em;
			}
			input {
				width: 100px;
				margin: 3px;
			}
			footer {
				border-top: solid black 1px;
				height: 2em;
			}
			a {
				position: absolute;
				margin-right: 1%;
				margin-left: auto;
			}
		</style>

	</head>
	<body>
		<div class='form'>
			<h1>Select Session to Apply for:</h1>
			<br>
			<form method="post" name="courseSelect" action='http://localhost/tafinder/user/main-form.php'>
				<?php
				include 'session-radio-buttons.php';
				?>
				<input type='submit' value="Continue"/>
			</form>
		</div>
		<footer>
			<p style='text-align: left; position: absolute; margin-top: 0'>
				TA Finder v.08
			</p>
			<a style='padding-left: 95%; position: absolute' class='admin' href='login.php'>Sign in</a>
		</footer>
	</body>

</html>
<?php
if (isset($conn)) {
	mysqli_close($conn);
};
?>