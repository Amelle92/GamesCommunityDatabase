<?php

	$servername = "localhost";
	$username = "root";
	$password = "BY0tcosoxUx6";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=gamesdb", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		echo "Connection to game database failed: " . $e->getMessage();
    }

	session_start();

	$user_check = $_SESSION['login_user'];

	$sql= "SELECT Username FROM users WHERE Username='$user_check'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$row = $stmt->fetch();

	$login_session = $row['Username'];

	if (!isset($login_session)) {
		header('Location: signin.php');
	}

?>
