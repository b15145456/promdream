<!DOCTYPE html>

<?php
	include("loginstate.php");	
?>
<html>
	<head>
		<meta charset = "utf-8">
		<meta name = "description" content = "">
		<meta http-equiv="Pragma" content="no-cache" />

		<meta http-equiv="Cache-Control" content="no-cache" />

		<meta http-equiv="Expires" content="0" />
		<!--上述為網址外部描述-->
		<title>Coser</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="left-reload.css" rel="stylesheet">
		
		<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
		<link href="Gallery-2.25.1/css/blueimp-gallery.css" rel="stylesheet"  type="text/css">
		
		<script src="jquery-3.2.1.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<!--響應式套用 p.s 這裡有一個小問題，根據你的行位 若將18行的引進js移到16行，將無法造成輪播效果，請各位注意-->
   </head>
   <body id=body style="background-image:url(background-img/maincoserbk.jpg); background-repeat:no-repeat;  background-size:cover;">

   <div id=logoarea1>
   </div>
  <div id=mainfunctionbox>
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
        <div  class=headerbutton onclick="javascript:location.href='PhotoScenes.php'">
        	<div>外拍場景資訊</div>
        </div>
        <?php if($loginstate==1){echo "<div id='personinfo' onclick='personinfo()'><div>個人資訊</div></div>";} else{echo"<div id='personinfo' onclick=javascript:location.href='login.php'><div>登入</div></div>";}?>
        <div id="personinfodetail">
  			<div id='presonframe'>
    		<div id="presondetail">
            <div id="minipersonimg" style="position:relative"; onclick="javascript:location.href='headimg_upload.php'"; "><img src=<?php if(file_exists('Coserfile/'.$ID.'/headimg.jpg')){echo"Coserfile/".$ID."/headimg.jpg";} else{echo "background-img/if_icon-ios7-plus-empty_211602.png";}?> width="250px" height="auto"/></div>
      		<div id="personminiinfo">&nbsp<br><?php echo $username; ?></div>
      		<div style="border:solid 1px black; width:110px; height:5px; margin-left:100px; margin-top:-20px; position: absolute; border-radius: 10px;"><div style="width:<?php echo $contribution%100;?>%;background-color:#00AA00; height: 100%;"><div style="position:absolute;margin-top:-20px;margin-left:90px;font-size:10px;">LV.<?php echo floor($contribution/100)+1;?></div></div></div>
      		<ul><li onclick="javascript:location.href='personal-info.php'">個人資料</li><li>文章管理</li><li>每日任務</li><?php if($Manager=='T'){echo"<li onclick=javascript:location.href='manager/manager_Coserregister.php'>管理頁面</li><style>#presonframe{height:380px;}</style>";}?><li onclick='logout()'>登出</li></ul> 
    		</div>
   		</div>
   		<script>
			function logout(){
   				location.href = 'http://localhost/promdream/logout.php'
 			}
 			function personinfo(){
        			$("#personinfodetail").fadeToggle(500,"linear");
 			}
    		function SortbyKey(Key,type) {
          		var resbonse=$.ajax({
            		url:"MainCoserAjaxContent.php", //the page containing php script
            		type: "post", //request type,
            		dataType: "text",
            		async:false, 
            		data: {registration: "success",SearchKey:Key,type:type},
            		success:function(result){
                    	document.getElementById("firstCA-box2").innerHTML=result;
            		},
            		error: function(XMLHttpRequest, textStatus, errorThrown){  
                  		console.log(xhr.responseText);  
            		}
         		});	
     		}//關鍵字搜尋
     		function MainnewsDetail(NewsID,type) {
          		var resbonse=$.ajax({
            		url:"MainCoserAjaxContent.php", //the page containing php script
            		type: "post", //request type,
            		dataType: "text",
            		async:false, 
            		data: {registration: "success",NewsID:NewsID},
            		success:function(result){
            			if(type=='夢之舞會官方'){
                    		document.getElementById("firstCA-box2").innerHTML=result;
                    	}
                    	else if(type=='優惠'){
                    		document.getElementById("secondCA-box2").innerHTML=result;
                    	}
                    	else{
                    		document.getElementById("thirdCA-box2").innerHTML=result;
                    	}
            		},
            		error: function(XMLHttpRequest, textStatus, errorThrown){  
                  		console.log(xhr.responseText);  
            		}
        		});
        	}
        	 function MainnewsReturn(type) {
          		var resbonse=$.ajax({
            		url:"MainCoserAjaxContent.php", //the page containing php script
            		type: "post", //request type,
            		dataType: "text",
            		async:false, 
            		data: {registration: "success",type:type},
            		success:function(result){
            			if(type=='夢之舞會官方'){
                    		document.getElementById("firstCA-box2").innerHTML=result;
                    	}
                    	else if(type=='優惠'){
                    		document.getElementById("secondCA-box2").innerHTML=result;
                    	}
                    	else{
                    		document.getElementById("thirdCA-box2").innerHTML=result;
                    	}
            		},
            		error: function(XMLHttpRequest, textStatus, errorThrown){  
                  		console.log(xhr.responseText);  
            		}
        		});
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


		<div class = "container-fluid">
			<div class="row-fluid">
				<div class="span2" style="margin-top:-350px;">
				<!--網站更新&通知-->
					<ul> 
					    <br>
						<li>&nbsp&nbsp&nbsp網站更新&通知</li>
						<br><br>
						<?php MainCoserNoticerequire(); ?>
						<br>
						<br>
					</ul>
				</div>
				<!--container-fluid.row-fluid.span2 結束 左邊更新通知-->
			
				<div class="span9">
					<div class = "CA-box row">
        					<div class="MainActReturn" onclick="javascript:location.href='MainActiveProvide.html'">提供活動資訊</div>
      						<style>
      						.MainActReturn{
  								margin-left:54%;
  				            	margin-top: 20px;
  				            	padding-top: 10px;
  								background-color: #2F4858;
  								width: 150px;
  								height: 30px;
  							    position: absolute;
  								font-size: 18px;
  								color: white;
  								font-family: 標楷體;
  								opacity: 0.7;
  								text-align:center;
  								z-index: 2;
  							}
  							.MainActReturn:hover{
  								opacity: 1;
  								cursor: pointer;
							}	
      						</style>
						<div id="myCarousel1" class="carousel slide">		
							<div class="carousel-inner" role = "listbox">
								<div class="item active">

								<div id=searchtitle>官方活動</div>
								<form action="" id = "searchbox" onsubmit = "">
									<div>
									<input type = "text" id="mainsearch" size = "20" />
									<input style="margin-top:-9px;" type = "button" value = "Search" onclick= "SortbyKey(document.getElementById('mainsearch').value,'夢之舞會官方')"/>
									</div>
								</form>
                            	<!--6/14 新增熱門作品搜尋列-->

								<div style="margin-left: 45%; margin-bottom: 50px; font-size: 30px;">官方消息</div>
									<div id="firstCA-box2" class = "CA-box2" alt = "first slide" style = "padding-left:60px;">
										<?php MainCoserinfoinquire("夢之舞會官方"); ?> 
									</div>
								</div>
								<!--container-fluid.row-fluid.span8 firstCA-box2-->
								
								<div class="item">
								<div id=searchtitle>優惠資訊</div>
								<form action="" id = "searchbox" onsubmit = "">
									<div>
									<input type = "text" id="mainsearch" size = "20" />
									<input style="margin-top:-9px;" type = "button" value = "Search" onclick= "SortbyKey(document.getElementById('mainsearch').value,'優惠')"/>
									</div>
								</form>
                            	<!--6/14 新增熱門作品搜尋列-->
								<div style="margin-left: 45%; margin-bottom: 50px; font-size: 30px;">優惠資訊</div>
									<div id="secondCA-box2" class = "CA-box2" alt = "second slide" style="margin-left:5%;">
										<?php MainCoserinfoinquire("優惠"); ?> 
									</div>
								</div>
								<!--container-fluid.row-fluid.span8 firstCA-box2-->
								
								
								<div class="item">
								<div id=searchtitle>徵團消息</div>
								<form action="" id = "searchbox" onsubmit = "">
									<div>
									<input type = "text" id="mainsearch" size = "20" />
									<input style="margin-top:-9px;" type = "button" value = "Search" onclick= "SortbyKey(document.getElementById('mainsearch').value,'徵團')"/>
									</div>
								</form>
                            	<!--6/14 新增熱門作品搜尋列-->
							    <div style="margin-left: 45%; margin-bottom: 50px; font-size: 30px;">徵團消息</div>
									<div id="thirdCA-box2" class = "CA-box2" alt = "third slide" style="margin-left:5%;">
										<?php MainCoserinfoinquire("徵團"); ?> 
									</div>
								</div>
								<!--container-fluid.row-fluid.span8 firstCA-box2-->
							</div>
							
							<a class="carousel-control left" role = "button" href="#myCarousel1" 
								data-slide="prev" data-interval="false" style="margin-top:5%;">&lsaquo;</a>
							<a class="carousel-control right" role = "button" href="#myCarousel1" 
								data-slide="next" data-interval="false" style="margin-top:5%;">&rsaquo;</a>
						</div>
					</div>
				</div>
				<!--container-fluid.row-fluid.span8 結束 中間熱門作品欄-->
				
				<div class="span2">
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
										<h3>廣告輪播1</h3>
									</div>
								</a>
							</div>
							<div class="item">
								<a href = "http://asianbeat.com/ct/feature/marugoto/">
									<img src="http://asianbeat.com/files/2016/07/f5791c06aa844d.jpg" 
									href = "http://asianbeat.com/ct/feature/marugoto/" 
									data-color="#eee">
									<div class="carousel-caption">
										<h3>廣告輪播2</h3>
									</div>
								</a>
							</div>
							<div class="item ">
								<a href = "http://asianbeat.com/ct/feature/issue_cosplay/cosplayer/">
									<img src="http://asianbeat.com/files/2012/01/f4f1e5e5b6a2f6.jpg" 
									href = "http://asianbeat.com/ct/feature/issue_cosplay/cosplayer/"
									data-color="#eee">
									<div class="carousel-caption">
										<h3>廣告輪播3</h3>
									</div>
								</a>
							</div>
						</div>
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
									<img src="https://images.gamme.com.tw/news2/2016/38/84/q5iYpaKVlKCcrqQ.jpg" 
									href = "https://news.gamme.com.tw/1453884" 
									data-color="#eee">
									<div class="carousel-caption">
										<h3>《Sosenka》化身魔人普烏★這個還原度絕對不科學</h3>
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
										<h3>C90的首日吸引了15萬人</h3>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!--container-fluid.row-fluid.span2 結束 旁邊預設廣告-->
			</div>
		</div>
	</body>
</html>

<?php
function MainCoserinfoinquire($type){
	include('pdo_connect.php');
	$statement = $connection->query("select * from mainnews where 活動類型='$type' order by NewsID;");
	foreach($statement as $row){
        $begin_time = explode("T",$row['開始時間']);
        $end_time = explode("T",$row['結束時間']);
			echo '<div class="Mainnews">
                      <span style="font-size:26px; margin-left:20%">'.$row['name'].'</span>
                      <a href="'.$row['ActiveLink'].'" >
                      <div class="mainphoto"><img src="'.$row['photo1'].'"/></div>
                      </a>
                      <div style="font-size:15px;">活動地點:'.$row['活動地點'].'</div>
                      <div style="font-size:15px;">'.$begin_time[0].' '.$begin_time[1].' ~ '.$end_time[0].' '.$end_time[1].'</div>
                      <div id="MaincoserContent'.$row['NewsID'].'" style="font-size:16px; font-family:微軟正黑體;"><p>'.$row['content'].'</p></div>
            ';
          	echo'<div id="readmore'.$row["NewsID"].'" onclick="MainnewsDetail(\''.$row["NewsID"].'\',\''.$row['活動類型'].'\')" style="cursor:pointer; color:blue;">顯示更多</div></div><style>#MaincoserContent'.$row["NewsID"].'{height:60px;}</style>';


      		echo'
      		<style>
      		#MaincoserContent'.$row["NewsID"].'{
        		margin-left:-5px;
        		overflow:hidden;
        		width:300px;
      		}
      		</style>
      		';               
		}
    }

   function MainCoserNoticerequire(){
      include('pdo_connect.php');
      $statement = $connection->query("select * from mainnotice  WHERE 審核 = 'T' order by 日期;");
    foreach($statement as $row){
      echo '<li><a href="">&nbsp&nbsp&nbsp'.$row['日期'].' '.$row['內容'].'</a></li>';
    }
    }

?>