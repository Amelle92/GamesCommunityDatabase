<?php
	include_once 'session.php';

	if (isset($_POST['GameID']) && isset($_POST['UserID'])) {
		$GameID = $_POST['GameID'];
		$UserID = $_POST['UserID'];
		$InfoLikely = $_POST['InfoLikely'];
		$InfoUsername = $_POST['InfoUsername'];
		$InfoComments = $_POST['InfoComments'];

		$sql = "INSERT INTO whoplays (UserID, GameID, LikelyToPlay, Username, Comments) VALUES ('$UserID', '$GameID', '$InfoLikely', '$InfoUsername','$InfoComments')";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}
?>
