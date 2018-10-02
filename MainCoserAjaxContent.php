<style>
	<?php include 'left-reload.css'; ?>
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
  error_reporting(0);
  $regstration = $_POST['registration'];
  $type=$_POST['type'];
  if($regstration=="success"){
      // some action goes here under php
    if($type!="news"){
      $Mainnews =  MainCoserinfoinquire($type,$SearchKey);
      //$myJSON = json_encode($myArr,JSON_UNESCAPED_UNICODE);編碼中文要這樣寫
      //echo $myJSON;單純用ajax取得資料,不回傳
    }  
  } 
   session_start();
   if(!isset($_SESSION)){$loginstate = 0;}
   else{
      $loginstate=$_SESSION['loginstate'];
      $username=$_SESSION['username'];
      $ID=$_SESSION['ID'];
   } 
   //查詢Query的結果
   function MainCoserinfoinquire($type,$SearchKey){
   		$connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
			$statement = $connection->query("select * from mainnews where 活動類型='$type' order by NewsID;");
		foreach($statement as $row){
      $begin_time = explode("T",$row['開始時間']);
      $end_time = explode("T",$row['結束時間']);
			echo '<div id="Main_news">
                      <span style="font-size:26px; margin-left:20%">'.$row['name'].'</span>
                      <a href="'.$row['ActiveLink'].'" >
                      <img src="'.$row['photo1'].'" />
                      </a>
                      <div style="margin-left:-5px; font-size:15px;">活動地點:'.$row['活動地點'].'</div>
                      <div style="margin-left:-5px; font-size:15px;">'.$begin_time[0].' '.$begin_time[1].' ~ '.$end_time[0].' '.$end_time[1].'</div>
                      <div id="MaincoserContent" style="margin-left:-5px; margin-top:10px; font-size:16px; font-family:微軟正黑體;padding-bottom:10px;">'.$row['content'].'</div>
                    </div>';
		}
    }

   function MainCoserNoticerequire(){
      $connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
      $statement = $connection->query("select * from mainnotice  WHERE 審核 = 'T' order by 日期;");
    foreach($statement as $row){
      echo '<li><a href="">&nbsp&nbsp&nbsp'.$row['日期'].' '.$row['內容'].'</a></li>';
    }
    }    
?>