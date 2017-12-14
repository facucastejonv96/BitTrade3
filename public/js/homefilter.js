window.onload = function(){
  window.getElementById("min").addEventListener("change", check);
  window.getElementById("max").addEventListener("change", check);
  debugger;
};

  function check(event){
  var regex = /^\s*\d*\s*$/;
  if(!regex.test(window.getElementById("min"))){
    debugger;
    window.getElementById("min").style.border = "1px solid red";
  }
}
