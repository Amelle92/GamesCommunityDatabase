function ViewPlayer(userID, sessionID) {
  $.ajax({
    type:"POST",
    url:"ViewPlayer.php",
    data:{userID:userID},
    success(data) {
      var Games = JSON.parse(data);
      if(Games.length == 0)
        document.getElementById("Games").innerHTML = '<div id="Title">No Games</div>';
      else {
        document.getElementById("Games").innerHTML = '<div id="Title">' + Games[0].RealName + '&apos;s Games</div>';
        for (var i = 0; i < Games.length; i++) {
            document.getElementById("Games").innerHTML += '<div class="Game" onclick="ShowInfo(' + Games[i].UserID + ',' + Games[i].GameID + ',' + sessionID + ')"><img class="image" src="images/' +
            Games[i].image + '" alt="' + Games[i].Name + '"><div class="middle"></div></div>';
        }
      }
    }
  });
}
