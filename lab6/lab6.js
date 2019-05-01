document.onreadystatechange=stateOk;
function stateOk() {
  if(document.readyState=="complete"){
    return true
  }
  else {
    return false;
  }
}
var momPicture=document.getElementById("mom");
function changeP1() {
  var momPicture=document.getElementById("mom");
  if(document.onreadystatechange()){
  momPicture.src="images/medium/5855774224.jpg";
  momPicture.title="Battle";

  }
}
function changeP2() {
  var momPicture=document.getElementById("mom");
  if(document.onreadystatechange()){
    momPicture.src="images/medium/5856697109.jpg";
    momPicture.title="Luneburg";

  }
}
function  changeP3() {
  if(document.onreadystatechange()){
    var momPicture=document.getElementById("mom");
  momPicture.src="images/medium/6119130918.jpg";
    momPicture.title="Bermuda";

  }
}
function  changeP4() {
  if(document.onreadystatechange()) {
    var momPicture=document.getElementById("mom");
    momPicture.src = "images/medium/8711645510.jpg";
    momPicture.title="Athens";

  }
  }
function  changeP5() {
  var momPicture=document.getElementById("mom");
  if(document.onreadystatechange()){
  momPicture.src="images/medium/9504449928.jpg";
    momPicture.title="Florence";

  }
}
//JavaScript
function fadeIn(element,speed){
  if(element.style.opacity !=0.8){
    var speed = speed || 30 ;
    var num = 0;
    var st = setInterval(function(){
      num+=2;
      element.style.opacity = num/10;
      if(num>=8)  {  clearInterval(st);  }
    },speed);
  }
}

function fadeOut(element,speed){
  if(element.style.opacity !=0){
    var speed = speed || 30 ;
    var num = 8;
    var st = setInterval(function(){
      num-=2;
      element.style.opacity = num / 10 ;
      if(num<=0)  {   clearInterval(st);  }
    },speed);
  }

}

function btnIn(){
  var fig=document.getElementById("fig");
  var momPicture=document.getElementById("mom");
  if(document.onreadystatechange()){
  fadeIn(fig,250);
  fig.innerHTML=momPicture.title;
  }
}

function btnOut(){
  var fig=document.getElementById("fig");
  if(document.onreadystatechange()) {
    fadeOut(fig, 250);
    fig.innerHTML=momPicture.title;
  }
  }
