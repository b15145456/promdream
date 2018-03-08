var drag = false; //拖曳狀態
var K; //被拖曳物件
var Kx, Ky; //拖曳物件起點
var x0, y0; //拖曳滑鼠起點
function md() {
  drag = true; //鎖定拖曳功能
  K = event.srcElement; //取得被拖曳物件參考
  Kx = K.offsetLeft; //物件初始位置x
  Ky = K.offsetTop; //物件初始位置y
  x0 = event.clientX; //滑鼠初始位置x
  y0 = event.clientY; //滑鼠初始位置y
}

function mv() {
  if (drag) {
    //鎖定拖曳時
    K.style.left = Kx + (event.clientX - x0)+"px"; //移動物件位置x
    K.style.top = Ky + (event.clientY - y0)+"px"; //移動物件位置y  
  }
}

function mup() {
  //滑鼠放開時
  drag = false; //解除拖曳狀態
}


setInterval(function(){
  $("#logoarea2").fadeOut(1000).fadeIn(1000);
},0);

setInterval(function(){
  $("#logoarea1").fadeOut(1000).fadeIn(1000);
},0);


/*
document.getElementsByClassName("headerbutton").onresize = function() {changetext()};

function changetext() {
    if(getDivHeight("headerbutton") < 50){
        document.getElementById("headerbutton").text = "...";
    }    
}

function getDivHeight(obj) {
　var div = document.getElementById(obj);
　return div.style.height;
}
*/
//獲取元素高度