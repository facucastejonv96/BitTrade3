window.onload = function(){
  name1 = document.getElementById("name1").innerHTML;
  name2 = document.getElementById("name2").innerHTML;
  chatid = document.getElementById("chatid").innerHTML;
  user1 = document.getElementById("user1").innerHTML;
  user2 = document.getElementById("user2").innerHTML;

  console.log(user1);

  brignOldMessages();
  pullData();


  $(document).keyup(function(e){
    if(e.keyCode == 13){
      sendMessage();
    }
  });
};

function pullData(){
  retrieveChatMessages();
  setTimeout(pullData,3000);
}

function sendMessage(){
  text = document.getElementById("text").value;
  $.ajax({
    url:"http://127.0.0.1:8000/sendmessage",
    data:{chatid : chatid , user1:user1 , name1:name1 , text:text},
    method:"get",
    success: function(data){
        $("#chat-window").append("<div class='mymsg'>" + text + "</div><br>");
        document.getElementById("text").value = "";
    }
  });
}

function brignOldMessages(){
  $.ajax({
    url:"http://127.0.0.1:8000/brignOldMessages",
    data:{chatid : chatid},
    method:"get",
    success: function(data){
        for (var i = 0; i < data.length; i++) {
          if(data[i]["sender_mail"] == user1){
              $("#chat-window").append("<div class='mymsg'>" + data[i]["message"] + "</div><br>");
          }
          else{
            $("#chat-window").append("<div class='hismsg'>" + data[i]["message"] + "</div><br>");
          }
        }
    }
  });
}

function retrieveChatMessages(){
  $.ajax({
    url:"http://127.0.0.1:8000/retrieveChatMessages",
    data:{chatid : chatid , user1:user1},
    method:"get",
    success: function(data){
      if(data != ""){
        if(data["sender_mail"] == user1){
            $("#chat-window").append("<div class='mymsg'>" + data["message"] + "</div><br>");
        }
        else{
          $("#chat-window").append("<div class='hismsg'>" + data["message"] + "</div><br>");
        }
      }
    }
  });
}
