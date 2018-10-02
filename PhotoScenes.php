<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charsset=utf-8">
		<meta name = "description" content = "">
		<!--上述為網址外部描述-->
		<title>外拍場景資訊</title>
	  <?php include 'sceneajaxcontent.php';?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
		<link href="Gallery-2.25.1/css/blueimp-gallery.css" rel="stylesheet"  type="text/css">

		
		<script src="jquery-3.2.1.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="main-coser.js"></script>
		
    <script language=JavaScript src="scorefunction.js"></script>

		<!--響應式套用 p.s 這裡有一個小問題，根據你的行位 若將18行的引進js移到16行，將無法造成輪播效果，請各位注意-->
	</head>
  <script>
    function SortbyName() {
          var resbonse=$.ajax({
            url:"sceneajaxcontent.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success", type: "1"},
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
            data: {registration: "success", type: "2"},
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
            data: {registration: "success", type: "3"},
            success:function(result){
                    document.getElementById("sceneinformationbox").innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){  
                  console.log(xhr.responseText);  
            }

         });
     }
     //關鍵字搜尋
     function SortbyKey(Key) {
          var resbonse=$.ajax({
            url:"sceneajaxcontent.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success", type: "4",SearchKey:Key},
            success:function(result){
                    document.getElementById("sceneinformationbox").innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){  
                  console.log(xhr.responseText);  
            }

         });
     }
     //關鍵字搜尋
     function sceneComment(ID) {
          var resbonse=$.ajax({
            url:"sceneDetail.php", //the page containing php script
            type: "post", //request type,
            dataType: "text",
            async:false, 
            data: {registration: "success",type: "1",sceneID:ID},
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

<body id=body>
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
        <div><?php if($loginstate==1){echo "<div id='personinfos'><div>個人資訊</div></div>";} else{echo"<div id='personinfo' onclick=javascript:location.href='login.php'><div>登入</div></div>";}?></div>
        <div id="personinfodetail">
        <div id='presonframe'>
        <div id="presondetail">
          <div id="minipersonimg"></div>
          <div id="personminiinfo">歡迎!&nbsp<?php echo $username; ?></div>
          <ul><li>個人資料</li><li>文章管理</li><li>每日任務</li><li onclick='logout()'>登出</li></ul> 
        </div>
      </div>
      <script>
      $(document).ready(function(){
          $("#personinfos").click(function(){
              $("#personinfodetail").toggle(function(){$("#presonframe").css("height","330px");});
          });
      });
      function logout(){
          location.href = 'http://localhost/promdream/logout.php'
      }
    </script>
    </div>
  </div>		
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox"  >
    <div class="item active">
      <img id=headimg  src="http://i.imgur.com/gBzNVdw.jpg" alt="news 1">
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
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span>&rsaquo;</span>
  </a>
</div>
<!--封面輪播系統-->
<div class = "container-fluid">
  <div class="row">
    <div class="span1"></div>
    <div class=span10>
      <div id=scenefunctionbox>
          <div  class=sceneheaderbutton>  
        	   <div>歐風</div>
          </div>
          <div  class=sceneheaderbutton>
        	   <div>日式</div>
          </div>
          <div  class=sceneheaderbutton>
        	  <div>廢墟</div>
          </div>
          <div  class=sceneheaderbutton>
        	  <div>白棚</div>       
          </div>
          <div  class=sceneheaderbutton>
        	  <div>教堂</div>
          </div>
          <div  class=sceneheaderbutton>
        	  <div>森林</div>
          </div>
          <div  class=sceneheaderbutton>
        	  <div>學園</div>
          </div>
          <div  class=sceneheaderbutton>
            <div>其他</div>
          </div> 
      </div>
    </div> 
  </div>
  <!--外拍場景功能欄 row1 end-->
  <div class="row-fluid" style="width:80vw;">
      <div class="span3" style="margin-top: 60px;">
        <form action="" id = "scenesearchbox" onsubmit = "">
          <div>
            <p>關鍵字搜尋&nbsp&nbsp:&nbsp</p>
            <input id="keysearch" type = "text" name = "q" size = "20" />
            <div id="scenesearchsubmit">
              <button type="button" style="width:50px;height:25px;" onclick="SortbyKey(document.getElementById('keysearch').value)">搜尋</button>
            </div>  
          </div>
        </form>        
      </div>  
      <div class=span3 style="margin-top: 75px; margin-left: 5vw;">
        <div id="scenechoosebox">
          <h4>排序&nbsp&nbsp:&nbsp</h4>
          <div  class="scenechoose"  onclick="SortbyName()"> 
              依名稱↓
          </div>
          <div  class=scenechoose   onclick="SortbyCost()">
              依價格↓
          </div>
          <div  class=scenechoose   onclick="SortbyEval()">
              依評價↓
          </div>  
        </div>
      </div> 
      <div class="span3" style="position:absolute; margin-left:5vw;">
        <div class="scenedetailreturn" onclick="javascript:location.href='scenearticle.php'">發表文章</div>
        <div class="scenedetailreturn" onclick="javascript:location.href='sceneprovide.html'">提供資訊</div>
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

