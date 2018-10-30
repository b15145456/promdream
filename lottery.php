<?php
 $RandomMax=0;
 $RandomArray=array();
 $ChooseMember=array();
 
 $connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
 $stmt = $connection->query("select ID,貢獻度,捐獻金額 from coserregister;");
 foreach($stmt as $row){
 	UserWeigh($row['ID'],$row['貢獻度'],$row['捐獻金額']);
 }    
  $i=0;
  while($i<1){//選取數量
  	$result = rand(0,$RandomMax*100);
  	foreach($RandomArray as $value){
  		if($result>=$value[1]*100&&$result<$value[0]*100){	
  			if(!in_array($value[2],$ChooseMember)){
              $ChooseMember[$i]=$value[2];
              $i++;
  			}
  		}
  	}
  }
  foreach($ChooseMember as $value){
  	$stmt = $connection->query("select 暱稱 from coserregister where ID = $value;");
  	foreach($stmt as $row){
 	 echo $row['暱稱'];
 	} 
  }	

 function UserWeigh($userID,$userAttribute,$UserDonate){
 	global $RandomArray,$RandomMax;
 	$UserSumAttribute=round((1+$userAttribute/1000)*(1+$UserDonate/100),2);
 	$RandomArray[$userID][0]=$UserSumAttribute+$RandomMax;
 	$RandomArray[$userID][1]=$RandomMax;
 	$RandomArray[$userID][2]=$userID;
 	//0是max,1是min,2是userID
 	$RandomMax+=$UserSumAttribute;
 }
?>