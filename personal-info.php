<?php
    include("loginstate.php");
    include("db_connect.php");
    $sql = " SELECT * FROM coserRegister WHERE ID = '$ID' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    echo'<div style="width:100vw; height:5vw; background-color:#2F4858; color:white; font-family:微軟正黑體; font-size:30px; padding-top:5px; padding-left:5px;opacity: 0.8;"><p>用戶資料</p></div><div style="position:absolute;margin-left:8vw;margin-top:50px;">
        <img id="imghead" src=Coserfile/'.$ID.'/headimg.jpg width="200px" height="auto"/></div>
        <button type="button" style="width:200px;height:25px;margin-left:8vw; margin-top:260px; position:absolute;" onclick=javascript:location.href="headimg_upload.php">編輯頭像</button>
        <div><ul><li>名字:'.$row['名字'].'</li><li>暱稱:'.$row['暱稱'].'</li><li>性別:'.$row['性別'].'</li><li>密碼:'.$row['密碼'].'</li><li>信箱:'.$row['信箱'].'</li>
<li>電話:0'.$row['電話'].'</li><li>地址:'.$row['地址'].'</li></ul></div>
        <style>li{list-style-type: none; margin-top:50px; margin-left:35vw; letter-spacing:5px;
  font-size:15px; font-family:微軟正黑體;}</style> 
  <button type="button" style="width:50px;height:25px;margin-left:45vw; margin-top:20px;" onclick="history.back()">返回</button>';
?>