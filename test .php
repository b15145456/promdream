<!DOCTYPE html>
<html >
<head>
	<meta charset="utf-8">

	<title>Article Test</title>


	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="dist/css/style.css" rel="stylesheet">

</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="#">首頁</a> <span class="divider"></span>
					</li>
					<li>
						<a href="#">文章</a> <span class="divider"></span>
					</li>
					<li class="active">
						服裝道具
					</li>
				</ul>
				<div class="row">
					<div class="col-md-2">
						<div class="btn-group btn-group-vertical btn-group-lg">

							<button class="btn btn-lg btn-default" type="button">
								<em class=""></em> 官方
							</button> 
							<button class="btn btn-lg btn-default" type="button">
								<em class=""></em> 活動
							</button> 
							<button class="btn btn-lg btn-default" type="button">
								<em class=""></em> 服裝道具
							</button> 
							<button class="btn btn-lg btn-default" type="button">
								<em class=""></em> 化妝彩妝
							</button>
							<button class="btn btn-lg btn-default" type="button">
								<em class=""></em> 場地景點
							</button>
							<button class="btn btn-lg btn-default" type="button">
								<em class=""></em> 廢文
							</button>
						</div>
					</div>

					<div class="col-md-8">


						<div class="jumbotron">
							<h2>
								【教學】服裝製作基本概念、測量
							</h2>
							<p>
								阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉阿布拉
								阿布拉阿布拉阿布拉阿布拉阿布拉
							</p>
							<p>
								<a class="btn btn-primary btn-large" href="#">詳細閱讀</a>
							</p>
						</div>

	
						<?php
						require_once("dbtools.inc.php");

	      //指定每頁顯示幾筆記錄
						$records_per_page = 10;

	      //取得要顯示第幾頁的記錄
						if (isset($_GET["page"]))
							$page = $_GET["page"];
						else
							$page = 1;

	      //建立資料連接
						$link = create_connection();


	      //執行SQL查詢
						$sql = "SELECT id, author, subject, date FROM message ORDER BY date DESC";
						$result = execute_sql($link, "news", $sql);

	      //取得記錄數
						$total_records = mysqli_num_rows($result);
						

	      //計算總頁數
						$total_pages = ceil($total_records / $records_per_page);

	      //計算本頁第一筆記錄的序號
						$started_record = $records_per_page * ($page - 1);

	      //將記錄指標移至本頁第一筆記錄的序號
						mysqli_data_seek($result, $started_record);

		
						
						
      		//顯示記錄
						$j = 1;
						while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
						{
							echo "<div class=\"jumbotron\">";

							echo "<h2>主題：" . $row["subject"] . "</h2>";

							echo "<h3>作者：" . $row["author"] . "</h3>";


							echo "<p>時間：" . $row["date"] . "</p>";

							echo "<p><a class=\"btn btn-primary btn-large\" href='show_news.php?id=". $row["id"] ."'>Learn more</a></p>";


							echo "</div>";
							
							$j++;
						}



      //釋放記憶體空間
						mysqli_free_result($result);
						mysqli_close($link);


						?>



					</div>

					<div class="col-md-2">
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="dist/js/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/js/scripts.js"></script>
</body>
</html>