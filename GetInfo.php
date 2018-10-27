<?php
	include_once 'session.php';
	
	if (isset($_POST['UserID']) && isset($_POST['GameID'])) {
		
		$UserID=$_POST['UserID'];
		$GameID=$_POST['GameID'];
			
		$sql = "SELECT * FROM whoplays WHERE whoplays.UserID ='$UserID' AND whoplays.GameID = '$GameID'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
 
		$info = array();
		while($row = $stmt->fetch()){
			array_push($info,$row);
		}
		echo json_encode($info);
	}
?>