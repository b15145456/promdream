<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
  include_once("./loginstate.php");
  error_reporting(0);
  $type= $_POST['type'];
  $regstration = $_POST['registration'];

  if($regstration=="success"){
      // some action goes here under php
      if($type==1){
        PersoninfoChange();
      }
      else{
        $name = $_POST['name'];
        $nickname = $_POST['nickname'];
        $address = $_POST['address'];
        ChengeConfirm($name,$nickname,$address);
      }  
      //$myJSON = json_encode($myArr,JSON_UNESCAPED_UNICODE);編碼中文要這樣寫
      //echo $myJSON;單純用ajax取得資料,不回傳
  }

  function PersoninfoChange(){
      global $ID;    
      include_once('pdo_connect.php');
      $statement = $connection->query("select * from coserregister where ID= $ID;");
      foreach($statement as $row){
        $Password = $row['密碼'];
        $Password_sec=str_split($Password);//根據每個字元切割
        $Password = $Password_sec[0];
        for($i=1;$i<count($Password_sec)-1;$i++){
          $Password.='*';
        }
        $Password.=$Password_sec[count($Password_sec)-1];
        echo '<div><ul>
                <li>名字:<input id="namechange" type="text" value="'.$row['名字'].'"></li>
                <li>暱稱:<input id="nicknamechange" type="text" value="'.$row['暱稱'].'"></li>
                <li>性別:'.$row['性別'].'</li>
                <li>密碼:'.$Password.'</li>
                <li>信箱:'.$row['信箱'].'</li>
                <li>電話:0'.$row['電話'].'</li>
                <li>地址:<input id="addresschange" type="text" value="'.$row['地址'].'"></li>
                </ul></div> 
                <button type="button" style="width:100px;height:25px;margin-left:45vw; margin-top:50px;  font-size:16px;" onclick="ConfirmPersoninfo()">變更</button>';        
      }
  }

  function ChengeConfirm($name,$nickname,$address){
    global $ID;
    include_once('pdo_connect.php');
    $data = [
      'ID' => $ID,
      'name' => $name,
      'nickname' => $nickname,
      'address' => $address,
    ];

    $sql = "UPDATE `coserregister` SET `名字` = :name ,`暱稱` = :nickname ,`地址` = :address  WHERE `ID` = :ID";
    $stmt= $connection->prepare($sql);
    $stmt->execute($data);
    $stmt = $connection->query("select * from coserregister where ID= $ID;");
      foreach($stmt as $row){
        $Password = $row['密碼'];
        $Password_sec=str_split($Password);//根據每個字元切割
        $Password = $Password_sec[0];
        for($i=1;$i<count($Password_sec)-1;$i++){
          $Password.='*';
        }
        $Password.=$Password_sec[count($Password_sec)-1];
        echo '<div><ul>
                <li>名字:'.$row['名字'].'</li>
                <li>暱稱:'.$row['暱稱'].'</li>
                <li>性別:'.$row['性別'].'</li>
                <li>密碼:'.$Password.'</li>'; 
        if($row['信箱認證狀態']=='T'){
          echo  '<li>信箱:'.$row['信箱'].'<div id= EmailConfirmBt style="display:none; cursor:pointer; font-size:12px; letter-spacing:1px; border:solid 1px black; padding:5px; padding-right:10px; margin-left:10px;" onclick=javascript:location.href="Email/RegisterMail.php" >&nbsp&nbsp進行認證</div><div id= AlreadyConfirm style="display:inline;font-size:12px; letter-spacing:3px; color:green; padding:5px; padding-right:10px; margin-left:10px; font-size:16px;">&nbsp&nbsp(已認證)</div></li>';
        }
        else{
          echo  '<li>信箱:'.$row['信箱'].'<div id= EmailConfirmBt style="display:inline; cursor:pointer; font-size:12px; letter-spacing:1px; border:solid 1px black; padding:5px; padding-right:10px; margin-left:10px;" onclick=javascript:location.href="Email/RegisterMail.php" >&nbsp&nbsp進行認證</div><div id= AlreadyConfirm style="display:none;font-size:12px; letter-spacing:3px; color:green; padding:5px; padding-right:10px; margin-left:10px; font-size:16px;">&nbsp&nbsp(已認證)</div></li>';
        }
        echo   '<li>電話:0'.$row['電話'].'</li>
                <li>地址:'.$row['地址'].'</li>
                </ul></div> 
                <button type="button" style="width:100px;height:25px;margin-left:45vw; margin-top:50px;  font-size:16px;" onclick="history.back()">返回</button>';      
      }
  } 
?>