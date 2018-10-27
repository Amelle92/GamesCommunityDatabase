function SelectGame(Instance, GameID) {
  if(document.getElementById(GameID).style.opacity == "0") {
    Instance.style.opacity = "0.3";
    document.getElementById(GameID).style.opacity = "1";
    $.ajax({
      type:"POST",
      url:"AddGame.php",
      data:{GameID:GameID},
      success(data) {}
    });
  }
  else {
    Instance.style.opacity = "1";
    document.getElementById(GameID).style.opacity = "0";
    $.ajax({
      type:"POST",
      url:"DeleteGame.php",
      data:{GameID:GameID},
      success(data) {}
    });
  }
}
