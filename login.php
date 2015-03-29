<html>
	<head>
		<style>
			table {
				background-color: #DDDDDD;
				border: 1px solid black;
				padding: 2px;
			}
		</style>
		
	</head>
	<body>
		<?php
		session_start();
		if (isset($_SESSION['newAccount'])) {
			echo 'Account Created.';
		}
		?>
		<div class='tableDiv'>
			<table>
				<tr>
					Sign in:

				</tr>
				<form method="post" action="login-check.php">
					<tr>
						<td>User: </td>
						<td><input type="text" name="user" <?php if(isset($_SESSION['newAccount'])){echo 'value="' . $_SESSION['newAccount'][0] . '"'; }?>/></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="text" name="password" <?php if(isset($_SESSION['newAccount'])){echo 'value="' . $_SESSION['newAccount'][1] . '"'; }?>/></td>
					</tr>
					<tr>
						<td><input type="submit"/></td>
					</tr>
				</form>

			</table>

		</div>
		
	</body>
	<?php session_destroy(); ?>
</html>