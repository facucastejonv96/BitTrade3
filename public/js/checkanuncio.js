window.onload = function(){
  document.getElementById("amount").addEventListener("change", check1);
  document.getElementById("comission").addEventListener("change", check2);
};

  function check1(event){
  var regex = /^\s*\d*\s*$/
  if(!regex.test(document.getElementById("amount").value)){
    document.getElementById("amount").style.border = "1px solid red";
  }else{
    document.getElementById("amount").style.border = "1px solid black";
  }
}

function check2(event){
var regex = /^\s*\d*\s*$/
if(!regex.test(document.getElementById("comission").value)){
  document.getElementById("comission").style.border = "1px solid red";
}else{
  document.getElementById("comission").style.border = "1px solid black";
}
}
