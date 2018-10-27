function ShowInfo(UserID, GameID, sessionID) {
  var modal = document.getElementById('myModal');
  modal.style.display = "block";
  $.ajax({
    type:"POST",
    url:"GetInfo.php",
    data:{UserID:UserID, GameID:GameID},
    success(data) {
      var Info= JSON.parse(data);
      if (Info.length == 1) {
        if (UserID == sessionID) {
          document.getElementById('GameInfo').innerHTML = '<table class="inputtable"><tr><td><label>In-game Name</label></td><td><input type="textbox" class="inputbox" id="InfoUsername"></td></tr>\n<tr><td><label>Likely To Play</label></td><td><input type="textbox" class="inputbox" id="InfoLikely"></td></tr>\n<tr><td><label>Comments</label></td><td><textarea id="InfoComments" class="inputbox" cols="40" rows="5"></textarea></td></tr></table>\n';
          document.getElementById('GameInfo').innerHTML += '<input type="button" id="SaveInfo" onclick="PutInfo(' + Info[0].UserID + ',' + Info[0].GameID +')" style="margin-top: 10px;" value="Save">\n';
          document.getElementById('InfoUsername').value = Info[0].Username;
          document.getElementById('InfoLikely').value = Info[0].LikelyToPlay;
          document.getElementById('InfoComments').value = Info[0].Comments;
        }
        else {
          document.getElementById('GameInfo').innerHTML = '<table class="inputtable"><tr><td style="width: 150px; vertical-align: top;">In-game Name:  </td><td><span class="BlueText">' + Info[0].Username + '</span></td></tr><tr><td style="width: 150px; vertical-align: top;">Likely to play:  </td><td><span class="BlueText">' + Info[0].LikelyToPlay + '%</span></td></tr><tr><td style="width: 150px; vertical-align: top;">Comments:  </td><td><span class="BlueText">' + Info[0].Comments + '</span></td></table>';
        }
      }
    }
  });
}
