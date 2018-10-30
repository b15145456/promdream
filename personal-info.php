<?php
    include_once("./loginstate.php");
    include("db_connect.php");
    $sql = " SELECT * FROM coserRegister WHERE ID = '$ID' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Password = $row['密碼'];
    $Password_sec=str_split($Password);//根據每個字元切割
    $Password = $Password_sec[0];
    for($i=1;$i<count($Password_sec)-1;$i++){
      $Password.='*';
    }
    $Password.=$Password_sec[count($Password_sec)-1];
    echo'<div style="width:100vw; height:5vw; background-color:#2F4858; color:white; font-family:微軟正黑體; font-size:30px; padding-top:5px; padding-left:5px;opacity: 0.8;"><p>用戶資料</p></div>';

    echo'<div id="editicon" onclick="ChangePersoninfo()" style="position:absolute; margin-top:30px; margin-left:59vw; border:2px solid gray; border-radius:30px; overflow:hidden; cursor:pointer; padding-top:3px; display="";"><img src=background-img/editicon.png width="40px" height="40px"/></div>';//編輯圖示

    echo'<div style="position:absolute;margin-left:8vw;margin-top:50px;"><img id="imghead" src=Coserfile/'.$ID.'/headimg.jpg width="300px" height="auto"/></div>
        <button type="button" style="width:300px;height:25px;margin-left:8vw; margin-top:360px; position:absolute;" onclick=javascript:location.href="headimg_upload.php">編輯頭像</button>';

    echo'<div id= "mainpersoninfo"><div><ul>
        <li>名字:'.$row['名字'].'</li>
        <li>暱稱:'.$row['暱稱'].'</li>
        <li>性別:'.$row['性別'].'</li>
        <li>密碼:'.$Password.'</li>
        <li>信箱:'.$row['信箱'].'<div id= EmailConfirmBt style="display:inline; cursor:pointer; font-size:12px; letter-spacing:1px; border:solid 1px black; padding:5px; padding-right:10px; margin-left:10px;" onclick=javascript:location.href="Email/RegisterMail.php" >&nbsp&nbsp進行認證</div><div id= AlreadyConfirm style="display:none;font-size:12px; letter-spacing:3px; color:green; padding:5px; padding-right:10px; margin-left:10px; font-size:16px;">&nbsp&nbsp(已認證)</div></li>
        <li>電話:0'.$row['電話'].'</li>
        <li>地址:'.$row['地址'].'</li>
        </ul></div> 
        <button type="button" style="width:100px;height:25px;margin-left:45vw; margin-top:50px; font-size:16px;" onclick="history.back()">返回</button></div>';

  echo '<style>li{list-style-type: none; margin-top:50px; margin-left:35vw; letter-spacing:5px; font-size:15px; font-family:微軟正黑體;}</style>';
  if($row['信箱認證狀態']==T){
    echo "<script>document.getElementById('EmailConfirmBt').style.display='none'</script>";
    echo "<script>document.getElementById('AlreadyConfirm').style.display='inline'</script>";
  }

  echo"
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
<script src='./jquery-3.2.1.js'></script>
<script>
function ChangePersoninfo() {
          var resbonse=$.ajax({
            url:'personal-infoajax.php', //the page containing php script
            type: 'post', //request type,
            dataType: 'text',
            async:false, 
            data: {registration: 'success', type:'1'},
            success:function(result){
                    document.getElementById('mainpersoninfo').innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
                  console.log(xhr.responseText);  
            }

         });
 }

 function ConfirmPersoninfo() {
          var name= document.getElementById('namechange').value;
          var nickname= document.getElementById('nicknamechange').value;
          var address= document.getElementById('addresschange').value;
          var resbonse=$.ajax({
            url:'personal-infoajax.php', //the page containing php script
            type: 'post', //request type,
            dataType: 'text',
            async:false, 
            data: {registration: 'success', type:'2',name:name ,nickname:nickname ,address:address},
            success:function(result){
                    document.getElementById('mainpersoninfo').innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
                  console.log(xhr.responseText);  
            }

         });
 }

</script>
<style>
li{
  font-size:20px;
}
</style>
";
?>