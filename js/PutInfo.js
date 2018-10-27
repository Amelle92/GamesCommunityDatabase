function PutInfo(UserID, GameID) {
  var InfoUsername = document.getElementById('InfoUsername').value;
  var InfoLikely = document.getElementById('InfoLikely').value;
  var InfoComments = document.getElementById('InfoComments').value;
  $.ajax({
    type:"POST",
    url:"PutInfo.php",
    data:{UserID:UserID, GameID:GameID, InfoUsername:InfoUsername, InfoLikely:InfoLikely, InfoComments:InfoComments},
    success(data) {
      //CloseInfo();
    }
  });
}
