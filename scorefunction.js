function rate(obj,oEvent){ 
//================== 
// 圖片地址設置 
//================== 
var imgSrc = 'http://www.jb51.net/upload/20080508122008586.gif'; //沒有填色的星星
var imgSrc_2 = 'http://www.jb51.net/upload/20080508122010810.gif'; //打分後有顏色的星星
//--------------------------------------------------------------------------- 
if(obj.score_reset){
  obj.rateFlag=false;
  obj.score_reset =false;
}
if(obj.rateFlag) return; 
var e = oEvent || window.event; 
var target = e.target || e.srcElement;  
var imgArray = obj.getElementsByTagName("img"); 
for(var i=0;i<imgArray.length;i++){ 
   imgArray[i]._num = i; 
   imgArray[i].onclick=function(){ 
    if(obj.rateFlag) return;
    obj.rateFlag=true; 
    StoreScore(this.parentNode.parentNode.id,(this._num+1));
    alert("已評分");       //this._num+1這個數字寫入到數據庫中,作為評分的依據
   }; 
} 
if(target.tagName=="IMG"){ 
   for(var j=0;j<imgArray.length;j++){ 
    if(j<=target._num){ 
     imgArray[j].src=imgSrc_2; 
    } else { 
     imgArray[j].src=imgSrc; 
    } 
   } 
} else { 
   for(var k=0;k<imgArray.length;k++){ 
    imgArray[k].src=imgSrc; 
   } 
} 
}
function scorereset(ID){ 
  var imgSrc = 'http://www.jb51.net/upload/20080508122008586.gif'; //沒有填色的星星
  var id = "score" + ID;//新的id 確保重置不衝突
  var imgArray = document.getElementById(id).getElementsByTagName("img");
  document.getElementById(id).score_reset=true;
  for(var i=0;i<imgArray.length;i++){
  	imgArray[i].src=imgSrc;
  }
  
}
/*定义一个ajax*/
function StoreScore(StudioID,Score) {
      var resbonse=$.ajax({
        url:"sceneajaxscore.php", //the page containing php script
        type: "post", //request type,
        dataType: "text",
        async:false, 
        data: {registration: "success",StudioID:StudioID,Score:Score},
        success:function(result){
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){  
              console.log("fail");
        }
      }); 
}