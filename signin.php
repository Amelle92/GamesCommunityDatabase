<?php
	include('login.php'); // Includes Login Script
	if (isset($_SESSION['login_user'])) {
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Games Community Database</title>
		<link href="signin.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div id="main">
			<center><h1>Games Community Database</h1></center>

			<div id="login">
				<form action="" method="post">
					<div class="LoginBox">
						<input id="name" name="username" placeholder="Username" type="text">
						<input id="password" name="password" placeholder="Password" type="password">
						<input name="submit" type="submit" value=" Login ">
					</div>
					<span><?php echo $error; ?></span>
				</form>
			</div>

		</div>
	</body>
</html>
