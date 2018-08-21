<style>
	<?php include 'left-reload.css'; ?>
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
  error_reporting(0);
  $type= $_POST['type'];
  $regstration = $_POST['registration'];
  if($regstration=="success"){
      // some action goes here under php
      $myArr =  sceneinfoinquire($type);
      //$myJSON = json_encode($myArr,JSON_UNESCAPED_UNICODE);編碼中文要這樣寫
      //echo $myJSON;單純用ajax取得資料,不回傳
  } 
   session_start();
   if(!isset($_SESSION)){$loginstate = 0;}
   else{
      $loginstate=$_SESSION['loginstate'];
      $username=$_SESSION['username'];
      $ID=$_SESSION['ID'];
   } 
   //查詢Query的結果
   function sceneinfoinquire($type){
   		$connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
        $headnum=$displaynum*($pagenum-1);//前面顯示的資料筆數
        if ($type==1){
			$statement = $connection->query("select * from photoscene order by name;");
		}
        if ($type==2){
			$statement = $connection->query("select * from photoscene order by cost;");
		}
		if ($type==3){
			$statement = $connection->query("select * from photoscene order by eval  DESC;");
		}
		foreach($statement as $row){
			echo '<div id="'.$row['name'].'" class="scene"  onclick="sceneComment(this.id)">  
          			<h3>'.$row['name'].'</h3>
                <div style="margin-top:30px; position:absolute;"><img src="sceneimg/'.$row['name'].'.jpg" width="250px" height="auto"/></div>
      					<ul>
      		  			<li>地點:'.$row['position'].'</li>
      		  			<li>類型:'.$row['type'].'</li>
      		  			<li>價位:'.$row['cost'].'</li>
      		  			<a href="'.$row['網址'].'"><li>網站連結</li></a>
      		  			<li>評價:'.$row['eval'].'</li>
      			</ul>
          		<p><img src="background-img/if_ic_message_48px_352541.png" width="25px" height="25px" />&nbsp153&nbsp&nbsp&nbsp<img src="background-img/if_star_298872.png" width="25px" height="25px" />&nbsp85</p><!--連結資料庫顯示評論及評分數-->

          		<h4 onclick="javascript:location.href=\'PhotoScenesdetial.html\'">點擊看更多資訊>></h4>   
        		</div>';
		}

    }
?>
