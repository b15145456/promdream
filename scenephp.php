<style>
	<?php include 'left-reload.css'; ?>
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
   error_reporting(0); 
   //查詢Query的結果
   function sceneinfoinquire($pagenum,$displaynum,$type){
   		$connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
        $headnum=$displaynum*($pagenum-1);//前面顯示的資料筆數
        $limit = "limit ".$headnum.",".$displaynum;
        if ($type==1){
			$statement = $connection->query("select * from photoscene order by name Limit $headnum,$displaynum;");
		}
        if ($type==2){
			$statement = $connection->query("select * from photoscene order by cost Limit $headnum,$displaynum;");
		}
		if ($type==3){
			$statement = $connection->query("select * from photoscene order by eval Limit $headnum,$displaynum;");
		}	

		foreach($statement as $row){
			echo '<div class= "scene1"  onclick="javascript:location.href=\'PhotoScenesdetial.html\'">  
          			<h3>'.$row['name'].'</h3>
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
