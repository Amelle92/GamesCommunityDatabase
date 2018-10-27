<?php
	include_once 'session.php';
	
	if (isset($_POST['userID'])) {
		$userID=$_POST['userID'];
			
		$sql = "SELECT DISTINCT * FROM games LEFT JOIN whoplays ON whoplays.UserID ='$userID' AND whoplays.GameID = games.ID";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
 
		$info = array();
		while($row = $stmt->fetch()){
			array_push($info,$row);
		}
		echo json_encode($info);
	}
?>