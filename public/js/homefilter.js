window.onload = function(){
  document.getElementById("min").addEventListener("change", check1);
  document.getElementById("max").addEventListener("change", check2);
};

  function check1(event){
  var regex = /^\s*\d*\s*$/
  if(!regex.test(document.getElementById("min").value)){
    document.getElementById("min").style.border = "1px solid red";
  }else{
    document.getElementById("min").style.border = "1px solid black";
  }
}
function check2(event){
var regex = /^\s*\d*\s*$/
if(!regex.test(document.getElementById("max").value)){
  document.getElementById("max").style.border = "1px solid red";
}else{
  document.getElementById("max").style.border = "1px solid black";
}
}
