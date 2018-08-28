<!DOCTYPE html>
;hogiyfuyfoijojofrs
<?php
	include("loginstate.php");	
?>
<html>
	<head>
		<meta charset = "utf-8">
		<meta name = "description" content = "">
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
		<script src="main-coser.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<script src="Gallery-2.25.1/js/blueimp-gallery-video.js"></script>

		<!--響應式套用 p.s 這裡有一個小問題，根據你的行位 若將18行的引進js移到16行，將無法造成輪播效果，請各位注意-->
   </head>
   <body id=body >
 
   <div id=logoarea1>
   </div>

  <div id=logoarea2>
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
        <div  class="headerbutton login" onclick="javascript:location.href='login.php'">
        	<div>登入</div>
        </div>
  </div>
  <div id="loginstate">
    <?php 
       if($loginstate==1){
       	    echo "登入中<br>";
   	  		echo $username;
   	  		echo "<br><input type=button value='登出' onclick='logout()' style='margin-top:10px'>";
       }
    ?>
  </div>
   
   <?php
  if($loginstate==1){
    echo "<script>document.getElementById('loginstate').style.display='';</script>";
  }     	    
  ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators span12">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
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
  <a class="carousel-control rightAdjust" href="#carousel-example-generic" role="button" data-slide="next">
    <span>&rsaquo;</span>
  </a>
</div>
<!--封面輪播系統-->



		<div class = "container-fluid">
			<div class="row-fluid">
				<div class="span2">
				<!--網站更新&通知-->
					<ul> 
					    <br>
						<li>&nbsp&nbsp&nbsp網站更新&通知</li>
						<br><br>
						<li><a href="" title="詳細說明">&nbsp&nbsp&nbsp最近有非常多壞人出沒請特別小心</a></li>
						<li><a href="" title="詳細說明">&nbsp&nbsp&nbsp2018/2/28 5:00系統更新</a></li>
						<li><a href="" title="詳細說明">&nbsp&nbsp&nbsp新增功能:經驗值系統</a></li>
						<li><a href="" title="詳細說明">&nbsp&nbsp&nbsp圖片資料庫更動 臨時維修</a></li>
						<li><a href="" title="詳細說明">&nbsp&nbsp&nbsp台南新棚推出最新優惠</a></li>
						<li><a href="" title="詳細說明">&nbsp&nbsp&nbsp3月台北CWT展<活動資訊></a></li>
						<br>
						<br>
					</ul>
				</div>
				<!--container-fluid.row-fluid.span2 結束 左邊更新通知-->
			
				<div class="span8">
					<div class = "CA-box row">
							<div id=searchtitle>熱門作品</div>
							<form action="" id = "searchbox" onsubmit = "">
								<div>
								<input type = "text" name = "q" size = "20" />
								<input type = "submit" value = "Search" />
								</div>
							</form>
						<!--6/14 新增熱門作品搜尋列-->
						<div id="myCarousel1" class="carousel slide">
											
							<div class="carousel-inner" role = "listbox">
								<div class="item active">
									<div id="firstCA-box2" class = "CA-box2" alt = "first slide">
										<div>
											<span>Mon</span>
											<a href="" >
											<img src="http://asianbeat.com/files/2016/07/f577b572e9d397.jpg" />
											</a>
											<a href="https://www.facebook.com/monpink1215/" >
											・CN: Mon
											・生日: 1月21日
											・居住地: 台灣(台北)
											・愛好: Cosplay、養狗狗、打音遊戲
											・最喜歡的角色：初音未來
											</a>
										</div>
										<div>
											<span>Stay</span>
											<a href="" >
											<img src="http://asianbeat.com/files/2016/07/f577b569550139.jpg" />
											</a>
											<a href="http://z9x9.com/archives/305458" >
											・CN: StayXXXX
											・誕生日生日: 10月31日
											・居住地: 台灣(台北)
											・愛好:貓、讀書、電影
											・最喜歡的角色：《皇家國教騎士團》 阿卡多
											</a>
										</div>
										<div>
											<span>COSERごんごま</span>
											<a href="https://news.gamme.com.tw/1500453" >
											<img src="https://images.gamme.com.tw/news2/2017/04/53/qJeao5_ekKWYrKQ-270x180.jpg" />
											</a>
											<a href="https://news.gamme.com.tw/1500453" >
											巨乳COSER來台灣《吃糖葫蘆嚇一跳》最後一顆竟然是孔明的陷阱……
											日本的肉系巨乳COSERごんごま最近造訪台灣參與同人活動，同時大啖各種美食小吃，但是當她吃起
											</a>
										</div>
										<div >
											<span>林夆</span>
											<a href="" >
											<img src="background-img/下載.jpg" />
											</a>
											<a href="http://z9x9.com/archives/305458" >
											7大理由建議不要輕易飼養！林夆並不只是你們的眼中的胖子</a>
										</div>
										<div >
											<span>林夆</span>
											<a href="" >
											<img src="background-img/下載.jpg" />
											</a>
											<a href="http://z9x9.com/archives/305458" >
											7大理由建議不要輕易飼養！林夆並不只是你們的眼中的胖子</a>
										</div>
										<div >
											<span>林夆</span>
											<a href="" >
											<img src="background-img/下載.jpg" />
											</a>
											<a href="http://z9x9.com/archives/305458" >
											7大理由建議不要輕易飼養！林夆並不只是你們的眼中的胖子</a>
										</div>
										<div>
											<span>林夆</span>
											<a href="" >
											<img src="background-img/下載.jpg" />
											</a>
											<a href="http://z9x9.com/archives/305458" >
											7大理由建議不要輕易飼養！林夆並不只是你們的眼中的胖子</a>
										</div>
										<div>
											<span>林夆</span>
											<a href="" >
											<img src="background-img/下載.jpg" />
											</a>
											<a href="http://z9x9.com/archives/305458" >
											7大理由建議不要輕易飼養！林夆並不只是你們的眼中的胖子</a>
										</div>
										<div>
											<span>林夆</span>
											<a href="" >
											<img src="background-img/下載.jpg" />
											</a>
											<a href="http://z9x9.com/archives/305458" >
											7大理由建議不要輕易飼養！林夆並不只是你們的眼中的胖子</a>
										</div>
										<div>
											<span>林夆</span>
											<a href="" >
											<img src="background-img/下載.jpg" />
											</a>
											<a href="http://z9x9.com/archives/305458" >
											7大理由建議不要輕易飼養！林夆並不只是你們的眼中的胖子</a>
										</div>
									</div>
								</div>
								<!--container-fluid.row-fluid.span8 firstCA-box2-->
								
								<div class="item">
									<div id="secondCA-box2" class = "CA-box2" alt = "second slide">
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
									</div>
								</div>
								<!--container-fluid.row-fluid.span8 firstCA-box2-->
								
								
								<div class="item">
									<div id="thirdCA-box2" class = "CA-box2" alt = "third slide">
										<div>
											<span>張晉</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
										<div>
											<span>林佑頴</span>
											<a href="" >
											<img src="background-img/便便.jpg" />
											</a>
											<a href="http://www.teepr.com/256326/killianhuang/10%E5%80%8B%E9%97%9C%E6%96%BC%E4%BD%A0%E7%9A%84%E4%BE%BF%E4%BE%BF%E7%9A%84%E9%87%8D%E8%A6%81%E7%9F%A5%E8%AD%98%E3%80%82%E5%8E%9F%E4%BE%86%E7%BD%B5%E4%BA%BA%E5%AE%B6%E3%80%8C%E4%BD%A0%E5%8E%BB%E5%90%83/" >
											10個關於你的便便的重要知識</a>
										</div>
									</div>
								</div>
								<!--container-fluid.row-fluid.span8 firstCA-box2-->
							</div>
							
							<a class="carousel-control left" role = "button" href="#myCarousel1" 
								data-slide="prev">&lsaquo;</a>
							<a class="carousel-control right" role = "button" href="#myCarousel1" 
								data-slide="next">&rsaquo;</a>
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
<script>
 function logout(){
   location.href = 'http://localhost/promdream/logout.php'
 }
</script>