<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charsset=utf-8">
		<meta name = "description" content = "">
		<!--上述為網址外部描述-->
		<title>外拍場景資訊</title>
	  <?php 
    include 'sceneajaxcontent.php';
    include("loginstate.php");
    ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
		<link href="Gallery-2.25.1/css/blueimp-gallery.css" rel="stylesheet"  type="text/css">

		
		<script src="jquery-3.2.1.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="Readmore.js/readmore.min.js"></script>		
    <script language=JavaScript src="scorefunction.js"></script>

		<!--響應式套用 p.s 這裡有一個小問題，根據你的行位 若將18行的引進js移到16行，將無法造成輪播效果，請各位注意-->
	</head>
  <script>
    function readmore(ID,moretextID){
        if(document.getElementById(ID).flag=="false"||document.getElementById(ID).flag==undefined){
          document.getElementById(ID).style.height="auto";
          document.getElementById(ID).flag="true";
         document.getElementById(moretextID).innerHTML="顯示較少";
        } 
        else{
          document.getElementById(ID).style.height="120px";
          document.getElementById(ID).flag="false";
          document.getElementById(moretextID).innerHTML="顯示更多";
        } 
    }
    function SortbyCommentNum() {
          var resbonse=$.ajax({
            url:"sceneajaxcontent.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success", type: 1},
            success:function(result){
                    document.getElementById("sceneinformationbox").innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){  
                  console.log(xhr.responseText);
            }
         });
         document.getElementById("scenechoosebox").style.display=""; 
     }
     function SortbyCost() {
          var resbonse=$.ajax({
            url:"sceneajaxcontent.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success", type: 2},
            success:function(result){
                    document.getElementById("sceneinformationbox").innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){  
                  console.log(xhr.responseText); 
            }

         });
     }
     function SortbyEval() {
          var resbonse=$.ajax({
            url:"sceneajaxcontent.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success", type: 3},
            success:function(result){
                    document.getElementById("sceneinformationbox").innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){  
                  console.log(xhr.responseText);  
            }

         });
     }
     function SortbyKey(Key) {
          var resbonse=$.ajax({
            url:"sceneajaxcontent.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success", type: 4,SearchKey:Key},
            success:function(result){
                    document.getElementById("sceneinformationbox").innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){  
                  console.log(xhr.responseText);  
            }

         });
     }
     //關鍵字搜尋
     function SortbyBt(Key) {
          var resbonse=$.ajax({
            url:"sceneajaxcontent.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success", type: 5,SearchKey:Key},
            success:function(result){
                    document.getElementById("sceneinformationbox").innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){  
                  console.log(xhr.responseText);  
            }

         });
     }
     //按鈕搜尋
     function sceneComment(ID) {
          var resbonse=$.ajax({
            url:"sceneDetail.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success",type: 1,sceneID:ID},
            success:function(result){
                    document.getElementById("sceneinformationbox").innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){  
                  console.log(xhr.responseText); 
            }
         });
         document.getElementById("scenechoosebox").style.display="none";
     }
</script>

<body id=body style="background-image:url(background-img/photosceneallbkimg.JPG); background-repeat:no-repeat;  background-size:cover;">
   <div id=logoarea1>
   </div>
  <div id=logoarea2>
  </div>
  <div id=otherfunctionbox>
        <div  class=headerbutton onclick="javascript:location.href='main-coser.php'">  
          <div>回首頁</div>
        </div>
        <div  class=headerbutton>  
        	<div>個人空間</div>
        </div>
        <div  class=headerbutton>
        	<div>討論版</div>
        </div>
        <div  class=headerbutton>
        	<div>場次/茶會資訊</div>
        </div>
        <div  class=headerbutton>
        	<div>工作室資訊</div>       
        </div>
        <div  class=headerbutton>
        	<div>外拍場景資訊</div>
        </div>
        <?php if($loginstate==1){echo "<div id='personinfo' onclick='personinfo()' style='margin-left:73vw;'><div>個人資訊</div></div>";} else{echo"<div id='personinfo' onclick=javascript:location.href='login.php' style='margin-left:73vw;'><div>登入</div></div>";}?>
        <div id="personinfodetail">
        <div id='presonframe'>
        <div id="presondetail">
            <div id="minipersonimg" style="position:relative"; onclick="javascript:location.href='headimg_upload.php'"; "><img src=<?php if(file_exists('Coserfile/'.$ID.'/headimg.jpg')){echo"Coserfile/".$ID."/headimg.jpg";} else{echo "background-img/if_icon-ios7-plus-empty_211602.png";}?> width="250px" height="auto"/></div>
          <div id="personminiinfo">&nbsp<br><?php echo $username; ?></div>
          <div style="border:solid 1px black; width:110px; height:5px; margin-left:100px; margin-top:-20px; position: absolute; border-radius: 10px;"><div style="width:<?php echo $contribution%100;?>%;background-color:#00AA00; height: 100%;"><div style="position:absolute;margin-top:-20px;margin-left:90px;font-size:10px;">LV.<?php echo floor($contribution/100)+1;?></div></div></div>
          <ul><li onclick="javascript:location.href='personal-info.php'">個人資料</li><li>文章管理</li><li>每日任務</li><li onclick='logout()'>登出</li></ul> 
        </div>
      </div>
      <script>
      function logout(){
          location.href = 'http://localhost/promdream/logout.php'
      }
      function personinfo(){
              $("#personinfodetail").fadeToggle(500,"linear");
      }
    </script>
    </div>
  </div>		
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width:82vw;margin-left:17vw;">
  <ol class="carousel-indicators span12">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img id=headimg  src="background-img/ㄩㄋ.jpg" alt="news 1">
    </div>
    <div class="item">
      <img id=headimg  src="http://i.imgur.com/apnFw1T.jpg" alt="news 2">
    </div>
    <div class="item">
      <img id=headimg  src="http://i.imgur.com/VYwxxe7.jpg" alt="news 3">
    </div>
  </div>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span>&lsaquo;</span>
  </a>
  <a class="carousel-control rightAdjust" href="#carousel-example-generic" role="button" data-slide="next" style="margin-left:76vw;">
    <span>&rsaquo;</span>
  </a>
</div>
<!--封面輪播系統-->
<div>
  <div>
    <div></div>
    <div>
      <div id=scenefunctionbox>
          <div  class=sceneheaderbutton onclick="SortbyBt('歐風')">  
        	   <div>歐風</div>
          </div>
          <div  class=sceneheaderbutton onclick="SortbyBt('日式')">
        	   <div>日式</div>
          </div>
          <div  class=sceneheaderbutton onclick="SortbyBt('廢墟')">
        	  <div>廢墟</div>
          </div>
          <div  class=sceneheaderbutton onclick="SortbyBt('白棚')">
        	  <div>白棚</div>       
          </div>
          <div  class=sceneheaderbutton onclick="SortbyBt('教堂')">
        	  <div>教堂</div>
          </div>
          <div  class=sceneheaderbutton onclick="SortbyBt('森林')">
        	  <div>森林</div>
          </div>
          <div  class=sceneheaderbutton onclick="SortbyBt('學園')">
        	  <div>學園</div>
          </div>
          <div  class=sceneheaderbutton onclick="SortbyBt('黑')">
            <div>其他</div>
          </div> 
      </div>
    </div> 
  </div>
  <!--外拍場景功能欄 row1 end-->
  <div class="row-fluid" style="width:80vw;">
      <div class="span3" style="margin-top: 60px;">
        <div id = "scenesearchbox">
          <p>關鍵字搜尋&nbsp&nbsp:&nbsp</p>
          <input id="keysearch" type = "text" size = "20" />
          <button type="button" style="width:50px;height:25px; margin-top:-10px;" onclick="SortbyKey(document.getElementById('keysearch').value)">搜尋</button>
        </div>       
      </div>  
      <div class=span3 style="margin-top: 75px; margin-left: 5vw;">
        <div id="scenechoosebox">
          <h4>排序&nbsp&nbsp:&nbsp</h4>
          <div  class="scenechoose"  onclick="SortbyCommentNum()"> 
              依人氣↓
          </div>
          <div  class=scenechoose   onclick="SortbyCost()">
              依價格↓
          </div>
          <div  class=scenechoose   onclick="SortbyEval()">
              依評價↓
          </div>  
        </div>
      </div> 
      <div style=" width:400px;position:absolute; margin-left:50px;">
        <div class="scenedetailreturn" onclick="javascript:location.href='sceneprovide.html'">提供資訊</div>
        <div class="scenedetailreturn" onclick="javascript:location.href='scenearticle.php'" <?php if($loginstate==0) echo "style = 'visibility:hidden;'"?>>發表文章</div>
      </div>
      <div style="position:absolute; display:inline; font-size:20px; font-family:微軟正黑體; margin-left:50px; margin-top:80px; height:200px;">
          <div style="margin-top:-100px; margin-left:100px;">如果你是棚的擁有者且願意提供詳細資訊?</div>
          <div style="color:blue;margin-top:20px;margin-left:320px;cursor:pointer;" onclick="location.href='./emailus.html'">寄信與我們聯絡</div>
          <div style="position:absolute; margin-top:-100px; margin-left:0px;"><img src="background-img/flower.png" width="300px" height="auto"></div>
      </div>
  </div>
  <!--排序欄位 end--> 
  <div class="row-fluid">
    <div class="span1"></div>
    <div class="span7">
      <div id=sceneinformationbox style="overflow-y:scroll;">
         <?php sceneinfoinquire(1); ?>            
      </div>
    </div>
  <!--外拍場景資訊欄-->
  <div class="span3">
    <div id=scenead>
  		<div id="BRmyCarousel1" class="carousel slide row" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#BRmyCarousel1" data-slide-to="0" class="active"></li>
					<li data-target="#BRmyCarousel1" data-slide-to="1"></li>
					<li data-target="#BRmyCarousel1" data-slide-to="2"></li>
				</ol>
				<!-- 廣告輪播列表 -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<a href = "http://asianbeat.com/ct/feature/issue_cosplay/cosplayer/taiwan/16/">
						<img src="http://asianbeat.com/files/2015/11/f563aa27ca09a0.jpg" 
						href = "http://asianbeat.com/ct/feature/issue_cosplay/cosplayer/taiwan/16/" 
						data-color="#eee">
						<div class="carousel-caption">
						  <h5>廣告輪播1</h5>
						</div>
					</a>
				</div>
				<div class="item">
					<a href = "http://asianbeat.com/ct/feature/marugoto/">
						<img src="http://asianbeat.com/files/2016/07/f5791c06aa844d.jpg" 
						href = "http://asianbeat.com/ct/feature/marugoto/" 
						data-color="#eee">
						<div class="carousel-caption">
							<h5>廣告輪播2</h5>
						</div>
					</a>
				</div>
				<div class="item ">
					<a href = "http://asianbeat.com/ct/feature/issue_cosplay/cosplayer/">
					  <img src="http://asianbeat.com/files/2012/01/f4f1e5e5b6a2f6.jpg" 
						href = "http://asianbeat.com/ct/feature/issue_cosplay/cosplayer/"
						data-color="#eee">
					  <div class="carousel-caption">
							<h5>廣告輪播3</h5>
					  </div>
					</a>
				</div>
			</div>
      <!--end of 廣告輪播-->
			<a class="carousel-control left" role = "button" href="#BRmyCarousel1" 
			data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" role = "button" href="#BRmyCarousel1" 
			data-slide="next">&rsaquo;</a>
	  </div>
					
		<div id="BRmyCarousel2" class="carousel slide row" data-ride="carousel">
			<!-- 廣告輪播列表 -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<a href = "https://news.gamme.com.tw/1453884">
						<img src="http://static.ettoday.net/images/1967/d1967640.jpg" 
						href = "https://news.gamme.com.tw/1453884" 
						data-color="#eee">
						<div class="carousel-caption">
							<h5>《Sosenka》化身魔人普烏★這個還原度絕對不科學</h5>
						</div>
					</a>
				</div>
			</div>
		</div>
					
		<div id="BRmyCarousel3" class="carousel slide row" data-ride="carousel">
			<!-- 廣告輪播列表 -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<a href = "http://www.ettoday.net/news/20160813/754741.htm">
						<img src="http://static.ettoday.net/images/1967/d1967640.jpg" 
						href = "http://www.ettoday.net/news/20160813/754741.htm" 
						data-color="#eee">
						<div class="carousel-caption">
							<h5>C90的首日吸引了15萬人</h5>
						</div>
					</a>
				</div>
			</div>
		</div>
		</div>
  </div>
	<!--container-fluid.row-fluid.span2 結束 旁邊預設廣告-->
  </div>
  <!--row2-->      
</div>
</body>
<script>
function LikeComment(ID){
  var likenum='likenum'+ID.slice(7);
  if(document.getElementById(ID).src.slice(-10)=="unlike.png"){
      document.getElementById(ID).src="./background-img/enlike.png";
      document.getElementById(likenum).innerHTML=parseInt(document.getElementById(likenum).innerHTML)+1;
      LikeCommentajax(1,ID);
  }
  else if(document.getElementById(ID).src.slice(-10)=="enlike.png"){
      document.getElementById(ID).src="./background-img/unlike.png";
      document.getElementById(likenum).innerHTML=parseInt(document.getElementById(likenum).innerHTML)-1;
      LikeCommentajax(0,ID);
  }  
}//點擊喜歡的事件
function LikeCommentajax(Likevalue,CommentID) {
          var resbonse=$.ajax({
            url:"sceneDetail.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success",type: "2",Likevalue:Likevalue,CommentID:CommentID},
            success:function(result){
                console.log(result);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){  
                  console.log(xhr.responseText); 
            }
         });
}
</script>';
