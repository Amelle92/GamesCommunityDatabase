<?php
	include_once 'session.php';
	
	if (isset($_POST['GameID'])) {
		$GameID=$_POST['GameID'];
		$ID = $_SESSION['login_ID'];
		$sql = "DELETE FROM whoplays WHERE whoplays.UserID ='$ID' AND whoplays.GameID = '$GameID'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}
?>