<?php
  error_reporting(0);
  include("loginstate.php");
  $UserID=$_SESSION['ID'];
  $regstration = $_POST['registration'];
  $StudioID=$_POST['StudioID'];
  $Score=$_POST['Score'];
  if($regstration=="success"){
    // some action goes here under php
    if($loginstate==1){
      PhotoSceneScore($UserID,$StudioID,$Score);
    }  
    //$myJSON = json_encode($myArr,JSON_UNESCAPED_UNICODE);編碼中文要這樣寫
    //echo $myJSON;單純用ajax取得資料,不回傳 
  } 
   //查詢Query的結果
   function PhotoSceneScore($UserID,$StudioID,$Score){
   		$connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
      $stmt = $connection->query("select * from photoscene where name = '$StudioID';");
      $ScoreArrayStr="";
      foreach($stmt as $row){
        $ScoreArrayStr=$row['ScoreArray'];
        $ScoreNum=$row['評論數'];
        $eval=$row['eval'];
      }
      $key = -1;//初始值
      if($ScoreArrayStr!=""){
          $ScoreArray_sec=explode(",",$ScoreArrayStr);
          $ScoreArrayStr="";
          $key=0;//確定有沒有找到
          for($i=0;$i<count($ScoreArray_sec);$i++){
            if(substr($ScoreArray_sec[$i] , 0 , 1 )== $UserID && $i!=0){
              $Neweval= ($eval*$ScoreNum-substr($ScoreArray_sec[$i] , 0 , 3)+$Score)/$ScoreNum;
              $ScoreArrayStr=",".$UserID.":".$Score;
              $key=1;
            }
            else if(substr($ScoreArray_sec[$i] , 0 , 1 )== $UserID && $i==0){
              $Neweval= ($eval*$ScoreNum-substr($ScoreArray_sec[$i] , 0 , 3)+$Score)/$ScoreNum;
              $OtherArray=$UserID.":".$Score;
              $key=1;
            }
            else if($i==0){
              $OtherArray.=$ScoreArray_sec[$i];
            }
            else{
              $OtherArray.=",".$ScoreArray_sec[$i];
            }
          }
          $OtherArray.=$ScoreArrayStr;
          $ScoreArrayStr=$OtherArray;
      }
      else{             
        $Neweval=$Score;//第一個評論當作平均
        $ScoreNum++;   
        $ScoreArrayStr=$UserID.":".$Score;
      }
      if($key==0){
         $Neweval= ($eval*$ScoreNum+$Score)/($ScoreNum+1);
         $ScoreNum++; 
         $ScoreArrayStr.=",".$UserID.":".$Score;
      }
      $data = [
        'name' => $StudioID,
        'ScoreArray' => $ScoreArrayStr,
        'eval' => $Neweval,
        'ScoreNum' => $ScoreNum,
      ];
      $sql = "UPDATE `photoscene` SET `ScoreArray` = :ScoreArray, `eval`=:eval, `評論數`=:ScoreNum WHERE `name` = :name";
      $stmt= $connection->prepare($sql);
      $stmt->execute($data);		
    }
?>