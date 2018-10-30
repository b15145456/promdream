<style>
	<?php include 'left-reload.css'; ?>
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php 
  include 'loginstate.php';
  error_reporting(0);
  $type= $_POST['type'];
  $regstration = $_POST['registration'];
  $SearchKey = $_POST['SearchKey'];
  if($regstration=="success"){
      $myArr =  sceneinfoinquire($type,$SearchKey);
  } 
   //查詢Query的結果
   function sceneinfoinquire($type,$SearchKey){
      global $ID;
      global $loginstate;//全域
   		include 'pdo_connect.php';
      $headnum=$displaynum*($pagenum-1);//前面顯示的資料筆數
      if ($type==1){
			   $statement = $connection->query("select * from photoscene order by 留言數 DESC;");
		  }
      if ($type==2){
			   $statement = $connection->query("select * from photoscene order by cost;");
		  }
		  if ($type==3){
			   $statement = $connection->query("select * from photoscene order by eval  DESC;");
		  }
      if ($type==4){
         $statement = $connection->query("select * from photoscene where name LIKE '%".$SearchKey."%';");
      }
      if ($type==5){
         $statement = $connection->query("select * from photoscene where type LIKE '%".$SearchKey."%';");
      }
		foreach($statement as $row){
      $ScoreArray_sec=explode(",",$row['ScoreArray']);
      for($i=0;$i<count($ScoreArray_sec);$i++){
        if(substr($ScoreArray_sec[$i] , 0 , 1)== $ID && $loginstate==1){
           $Score=substr($ScoreArray_sec[$i] , 2 , 1 );
           break;
        }
        else{
          $Score=0;
        }
      }

      for($i=1;$i<=5;$i++){
        if($i<=$Score){
          $ScoreImg[$i]='http://www.jb51.net/upload/20080508122010810.gif';
        }
        else{
           $ScoreImg[$i]='http://www.jb51.net/upload/20080508122008586.gif';
        }
      }
   		echo '<div id="'.$row['name'].'" class="scene">  
          			<h3>'.$row['name'].'</h3>
                <div style="margin-top:30px; position:absolute;"><img src="sceneimg/'.$row['name'].'.jpg" width="250px" height="auto"/></div>
      					<ul>
      		  			<li>地點:'.$row['position'].'</li>
      		  			<li>類型:'.$row['type'].'</li>
      		  			<li>價位:'.$row['cost'].'</li>
      		  			<a href="'.$row['網址'].'"><li>網站連結</li></a>
      		  			<li>評價:'.$row['eval'].'</li>
      			</ul>
          		<div class="infoicon"><img src="background-img/if_ic_message_48px_352541.png" width="25px" height="25px" />&nbsp'.$row['留言數'].'&nbsp&nbsp&nbsp<img src="background-img/if_star_298872.png" width="25px" height="25px" />&nbsp'.$row['評論數'].'</div><!--連結資料庫顯示評論及評分數-->

              <div id="score'.$row['name'].'" class="starWrapper score" onmouseover="rate(this,event)"> 
                <img src="'.$ScoreImg[1].'" title="很爛" width="25px" />
                <img src="'.$ScoreImg[2].'" title="有點爛" width="25px"/>
                <img src="'.$ScoreImg[3].'" title="普通" width="25px"/>
                <img src="'.$ScoreImg[4].'" title="還不錯" width="25px"/>
                <img src="'.$ScoreImg[5].'" title="666" width="25px"/>
              </div>
              <input style="float:right; margin-right:25px; margin-top:66px;" name="resetscore" type="button" value="重評" onclick="scorereset(\''.$row['name'].'\')">
          		<h4 onclick="sceneComment(this.parentNode.id)">點擊看更多資訊>></h4>   
        		</div>';

            if($Score!=0){echo'<script>document.getElementById("score'.$row['name'].'").rateFlag=true;</script>';}//讓已評分的不會亂跑直到選擇重評
            echo'<script>document.getElementById("score'.$row['name'].'").score_reset=false;</script>';
		}

    }
?>
