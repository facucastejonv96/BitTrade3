window.onload = function(){
  bringPrice();
}

function bringPrice(){
  $.ajax({
    url:"https://www.bitstamp.net/api/ticker/",
    method:"get",
    success: function(data){
      document.getElementById("price").innerHTML = data["last"] + "USD";
    }
  });
  setTimeout(bringPrice,3000);
}
