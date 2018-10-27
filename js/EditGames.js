function EditGames(userID) {
  $.ajax({
    type:"POST",
    url:"EditGames.php",
    data:{userID:userID},
    success(data) {
      var Games = JSON.parse(data);
      document.getElementById("Games").innerHTML = '<div id="Title">Add Games</div>';
      for (var i = 0; i < Games.length; i++) {
        if (Games[i].UserID == userID) {
          document.getElementById("Games").innerHTML += '<div class="Game"><img style="opacity:0.3;" onclick="SelectGame(this,' + Games[i].ID + ')" class="image" src="images/' +
          Games[i].image + '" alt="' + Games[i].Name + '"><div class="check" id="' + Games[i].ID + '" style="opacity:1;"><img src="images/check.png" style="width:100px; height:100px;"></div></div>';
        }
        else {
          document.getElementById("Games").innerHTML += '<div class="Game"><img onclick="SelectGame(this,' + Games[i].ID + ')" class="image" src="images/' +
          Games[i].image + '" alt="' + Games[i].Name + '"><div class="check" id="' + Games[i].ID + '" style="opacity:0;"><img src="images/check.png" style="width:100px; height:100px;"></div></div>';
        }
      }
    }
  });
}
