<?php
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message

	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		}
		else {

			$username=$_POST['username'];
			$password=$_POST['password'];

			$servername = "localhost";
			$serverusername = "root";
			$serverpassword = "BY0tcosoxUx6";

			try {
				$pdo = new PDO("mysql:host=$servername;dbname=gamesdb", $serverusername, $serverpassword);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
				echo "Connection to game database failed: " . $e->getMessage();
			}

			$sql = "SELECT * FROM users WHERE Password='$password' AND Username='$username'";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetchAll();

			if (count($row) == 1) {
				$_SESSION['login_user']=$username;
				$_SESSION['login_ID']=$row[0]['UserID'];
				header("location: index.php");
			}
			else {
				$error = "Username or Password is invalid";
			}
		}
		$pdo = null;
	}
?>
