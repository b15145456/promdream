<?php
include_once("../loginstate.php");
$connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
$statement = $connection->query("select * from coserregister where 認證狀態='' order by ID;");
echo"<div id='Funcbt' onclick=javascript:location.href='../main-coser.php'>回首頁</div><div id='Funcbt' onclick='ChangeMemDelete()'>會員審核</div><div id='Funcbt' onclick='ChangeMemConfirm()'>會員查封</div>";
echo"
<div style='margin-left:10vw;margin-top:5vw; position:absolute'>
  <div>暱稱搜尋&nbsp&nbsp:&nbsp</div><br>
  <input id='keysearch' type = 'text' size ='20' />
  <div id='managersearchsubmit'>
    <button type='button' style='width:50px;height:25px;' onclick=SortbyKey(document.getElementById('keysearch').value)>搜尋</button>
  </div>  
</div>
";
echo"<table  id='maintable' style='margin-left:20vw; margin-top:200px;'><tr style='font-size:20px;'><td>使用者ID</td><td>使用者暱稱</td><td>審核相片</td><td>審核結果</td></tr>";
foreach($statement as $row){
  echo "<tr id='member".$row['ID']."'><td>".$row['ID']."</td><td>".$row['暱稱']."</td><td><a href='../Coser-register/".$row['ID'].".jpg' target='_blank'><img src='../Coser-register/".$row['ID'].".jpg' width='200px' height='100px' /></a></td><td><input id='memberinput".$row['ID']."' type='checkbox' value='".$row['ID']."' onchange='MemberConfirm(this.value);' style='width:20px;height:20px;margin-left:30%;'><br></td></tr>";
}
echo"</table>";


echo"
<style>
table {
    border-collapse: collapse;
}

table, td, th {
	padding:10px;
    border: 1px solid black;
}
</style>";


echo"
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
<script src='../jquery-3.2.1.js'></script>
<script>
function MemberConfirm(ID) {
          var resbonse=$.ajax({
            url:'manager_Coserregisterajax.php', //the page containing php script
            type: 'post', //request type,
            dataType: 'text',
            async:false, 
            data: {registration: 'success', MemberID:ID, type:'1'},
            success:function(result){
                    $('#memberinput'+ID).parent().parent().fadeOut();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
                  console.log(xhr.responseText);  
            }

         });
 }
 function MemberDelete(ID) {
          var resbonse=$.ajax({
            url:'manager_Coserregisterajax.php', //the page containing php script
            type: 'post', //request type,
            dataType: 'text',
            async:false, 
            data: {registration: 'success', MemberID:ID, type:'2'},
            success:function(result){
                    $('#memberinput'+ID).parent().parent().fadeOut();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
                  console.log(xhr.responseText);  
            }

         });
 }
 function ChangeMemConfirm() {
          var resbonse=$.ajax({
            url:'manager_Coserregisterajax.php', //the page containing php script
            type: 'post', //request type,
            dataType: 'text',
            async:false, 
            data: {registration: 'success', type:'3'},
            success:function(result){
                    document.getElementById('maintable').innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
                  console.log(xhr.responseText);  
            }

         });
 }
 function ChangeMemDelete() {
          var resbonse=$.ajax({
            url:'manager_Coserregisterajax.php', //the page containing php script
            type: 'post', //request type,
            dataType: 'text',
            async:false, 
            data: {registration: 'success', type:'4'},
            success:function(result){
                    document.getElementById('maintable').innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
                  console.log(xhr.responseText);  
            }

         });
 }
 function SortbyKey(Key) {
          var resbonse=$.ajax({
            url:'manager_Coserregisterajax.php', //the page containing php script
            type: 'post', //request type,
            dataType: 'text',
            async:false, 
            data: {registration: 'success', type:'5',SearchKey:Key},
            success:function(result){
                    document.getElementById('maintable').innerHTML=result;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){ 
                  console.log(xhr.responseText);  
            }

         });
 }

</script>
";
echo"
<style>
#Funcbt{
  width:100px;
  height:30px;
  border:1px solid black; 
  display:inline-block; 
  padding:10px; 
  text-align:center; 
  padding-top:20px; 
  cursor:pointer; 
  margin-left:30px;
  font-size:16px;
  letter-spacing:3px;
}

#Funcbt:hover{
  font-weight:bold;
  border-bottom:thick solid #7FB2F0;
  cursor: pointer;
}
#managersearchsubmit{
  position:relative;
  display:inline-block;
  margin-top:-10px;
}
</style>
";
?>