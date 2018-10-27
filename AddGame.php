<?php
	include_once 'session.php';

	if (isset($_POST['GameID'])) {
		$GameID=$_POST['GameID'];
		$ID = $_SESSION['login_ID'];
		$sql = "INSERT INTO whoplays (UserID, GameID, LikelyToPlay, Username, Comments) VALUES ('$ID', '$GameID', '0', '','')";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}
?>
