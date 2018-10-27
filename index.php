<?php
	include_once 'session.php';
	$ID = $_SESSION['login_ID'];
	$sql= "SELECT * FROM users";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$players = $stmt->fetchAll();
?>

<html>
	<head>
		<link rel="stylesheet" href="Games.css?random=<?php echo uniqid(); ?>">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/CloseInfo.js"></script>
		<script src="js/EditGames.js"></script>
		<script src="js/PutInfo.js"></script>
		<script src="js/SelectGame.js"></script>
		<script src="js/ShowInfo.js"></script>
		<script src="js/ViewPlayer.js"></script>
		<title>Games Community Database</title>
	</head>
	<body onload="ViewPlayer('<?php echo $ID ?>')">
		<div class="navbar">
			<div class="navelement">
				<input type="button" onclick="ViewPlayer('<?php echo $ID ?>')" value="My Games">
			</div>
			<div class="navelement">
				<input type="button" onclick="EditGames('<?php echo $ID ?>')" value="Add Games">
			</div>
			<div class="navelement" style="float:right">
				<input type="button" onclick="window.location.href='signout.php'" value="Logout">
			</div>
		</div>
		<div id="GamesContainer">
			<div id="Games">
				<div id="Title">My Games</div>
			</div>
		</div>
		<div id="Players">
			<?php
				foreach($players as $player) {
					echo '<input type="button" value="' . $player['RealName'] . '" onclick="ViewPlayer(' . $player['UserID'] . ',' . $ID . ')"><br />';
				}
			?>
		</div>
		<!-- Modal Window -->
		<div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close" onclick="CloseInfo()">&times;</span>
				<div id="GameInfo"><p>Loading...</p></div>
			</div>
		</div>
	</body>
</html>
