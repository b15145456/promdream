<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
  include_once("../loginstate.php");
  error_reporting(0);
  $type= $_POST['type'];
  $regstration = $_POST['registration'];
  $MemberID = $_POST['MemberID'];
  $SearchKey = $_POST['SearchKey'];
  if($regstration=="success"){
      // some action goes here under php
      if($type==1||$type==2){
        MemberConfirm($type,$MemberID);
      }
      else{
        ChengeMode($type,$SearchKey);
      }  
      //$myJSON = json_encode($myArr,JSON_UNESCAPED_UNICODE);編碼中文要這樣寫
      //echo $myJSON;單純用ajax取得資料,不回傳
  }

  function MemberConfirm($type,$MemberID){
  		if($type==1){
  		   $data = [
        		'ID' => $MemberID,
        		'state' => 'T',
      	   ];
      }     
      if($type==2){
          $data = [
            'ID' => $MemberID,
            'state' => '',
          ];
      }         
      $connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
      $sql = "UPDATE `coserregister` SET `認證狀態` = :state WHERE `ID` = :ID";
      $stmt= $connection->prepare($sql);
      $stmt->execute($data);	
  	}

  function ChengeMode($type,$SearchKey){
    $connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
    if($type==3){     
      $statement = $connection->query("select * from coserregister where 認證狀態='T' order by ID;");
      echo"<tr style='font-size:20px;'><td>使用者ID</td><td>使用者暱稱</td><td>審核相片</td><td>審核結果</td></tr>";
      foreach($statement as $row){
      echo "<tr id='member".$row['ID']."'><td>".$row['ID']."</td><td>".$row['暱稱']."</td><td><a href='../Coser-register/".$row['ID'].".jpg' target='_blank'><img src='../Coser-register/".$row['ID'].".jpg' width='200px' height='100px' /></a></td><td><input id='memberinput".$row['ID']."' type='checkbox' value='".$row['ID']."' onchange='MemberDelete(this.value);' style='width:20px;height:20px;margin-left:30%;'><br></td></tr>";
      }
    }
    if($type==4){     
      $statement = $connection->query("select * from coserregister where 認證狀態='' order by ID;");
      echo"<tr style='font-size:20px;'><td>使用者ID</td><td>使用者暱稱</td><td>審核相片</td><td>審核結果</td></tr>";
      foreach($statement as $row){  
      echo "<tr id='member".$row['ID']."'><td>".$row['ID']."</td><td>".$row['暱稱']."</td><td><a href='../Coser-register/".$row['ID'].".jpg' target='_blank'><img src='../Coser-register/".$row['ID'].".jpg' width='200px' height='100px' /></a></td><td><input id='memberinput".$row['ID']."' type='checkbox' value='".$row['ID']."' onchange='MemberConfirm(this.value);' style='width:20px;height:20px;margin-left:30%;'><br></td></tr>";
      }
    }

    if($type==5){     
      $statement = $connection->query("select * from coserregister where 暱稱 LIKE '%".$SearchKey."%';");
      foreach($statement as $row){
      echo "<tr style='font-size:20px;'><td>使用者ID</td><td>使用者暱稱</td><td>使用者認證狀態</td><td>審核相片</td><td>更改狀態</td></tr>";
      echo "<tr id='member".$row['ID']."'><td>".$row['ID']."</td><td>".$row['暱稱']."</td><td>".$row['認證狀態']."</td><td><a href='../Coser-register/".$row['ID'].".jpg' target='_blank'><img src='../Coser-register/".$row['ID'].".jpg' width='200px' height='100px' /></a></td><td><input id='memberinput".$row['ID']."' type='checkbox' value='".$row['ID'];
        if($row['認證狀態']=='T'){echo"'onchange='MemberDelete(this.value)'";}
        else{echo"'onchange='MemberConfirm(this.value)'";}
        echo "style='width:20px;height:20px;margin-left:30%;'><br></td></tr>";
      }
    }
  
  } 
?>