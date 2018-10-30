<?php
  include_once('loginstate.php');
  error_reporting(0);
  $regstration = $_POST['registration'];
  $SearchKey=$_POST['SearchKey'];
  $type=$_POST['type'];
  $NewsID=$_POST['NewsID'];
  if($regstration=="success"){
    if($type==""){
       MainnewsDetail($NewsID);
    }
    else if($SearchKey==""){
      MainCoserinfoinquire($type);
    }
    else{
      MainSearch($SearchKey,$type);
      // some action goes here under php
    }  
  }
  function MainSearch($SearchKey,$type){
  include('pdo_connect.php');
  $statement = $connection->query("select * from mainnews where name LIKE '%".$SearchKey."%' AND 活動類型='$type';");
  foreach($statement as $row){
      $begin_time = explode("T",$row['開始時間']);
      $end_time = explode("T",$row['結束時間']);
      echo '<div class="Mainnews">
                      <span style="font-size:26px; margin-left:20%">'.$row['name'].'</span>
                      <a href="'.$row['ActiveLink'].'" >
                      <div class="mainphoto"><img src="'.$row['photo1'].'"/></div>
                      </a>
                      <div style="font-size:15px;">活動地點:'.$row['活動地點'].'</div>
                      <div style="font-size:15px;">'.$begin_time[0].' '.$begin_time[1].' ~ '.$end_time[0].' '.$end_time[1].'</div>
                      <div id="MaincoserContent'.$row['NewsID'].'" style="font-size:16px; font-family:微軟正黑體;"><p>'.$row['content'].'</p></div>
            ';


      echo'<div id="readmore'.$row["NewsID"].'" onclick="MainnewsDetail(\''.$row["NewsID"].'\',\''.$row['活動類型'].'\')" style="cursor:pointer; color:blue;">顯示更多</div>
      </div><style>#MaincoserContent'.$row["NewsID"].'{height:60px;}</style>';
          

      echo'
      <style>
      #MaincoserContent'.$row["NewsID"].'{
        margin-left:-5px;
        overflow:hidden;
        width:300px;
      }
      </style>
      ';
    }
  }
  function MainnewsDetail($NewsID){
    include('pdo_connect.php');
    $statement = $connection->query("select * from mainnews where NewsID ='$NewsID';");
    foreach($statement as $row){
      $begin_time = explode("T",$row['開始時間']);
      $end_time = explode("T",$row['結束時間']);
      echo 
      '<div style="width:800px;height:1000px;">
        <div style="font-size:26px;">'.$row['name'].'</div><br><br>
              <div id="maindetailphoto">
              <table>
              <tr>
                <td><a href="'.$row['photo1'].'" target="_blank"><img src="'.$row['photo1'].'" height="50px" width="auto"></a></td>
                <td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="'.$row['photo2'].'" target="_blank"><img src="'.$row['photo2'].'" ></a> </td>
                <td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="'.$row['photo3'].'" target="_blank"><img src="'.$row['photo3'].'" ></a> </td>
              </tr>
              </table>
              </div>
              <div id="maindetailinfo">
                <ul>
                  <li>主辦單位 : '.$row['hostname'].'</li>
                  <li>活動連結 : '.$row['活動連結'].'</li>
                  <li>活動時間 : '.$begin_time[0].' '.$begin_time[1].' ~ '.$end_time[0].' '.$end_time[1].'</li>
                  <li>內容 : <br><br>'.$row['content'].'</li>
                  <li><div style="position:relative; margin-left:45%"><input type="button" value="返回" onclick="MainnewsReturn(\''.$row['活動類型'].'\');"></div></li>
                </ul>
              </div>
      </div>';
      echo 
      '
      <style>
        #maindetailinfo{
          padding:50px;
        }
        #maindetailinfo li{
           margin:50px;
        }
        #maindetailinfo ul{
           border:solid 1px gray;
        }
      </style>
      ';
    }
  }

  function MainCoserinfoinquire($type){
  include('pdo_connect.php');
  $statement = $connection->query("select * from mainnews where 活動類型='$type' order by NewsID;");
  foreach($statement as $row){
        $begin_time = explode("T",$row['開始時間']);
        $end_time = explode("T",$row['結束時間']);
      echo '<div class="Mainnews">
                      <span style="font-size:26px; margin-left:20%">'.$row['name'].'</span>
                      <a href="'.$row['ActiveLink'].'" >
                      <div class="mainphoto"><img src="'.$row['photo1'].'"/></div>
                      </a>
                      <div style="font-size:15px;">活動地點:'.$row['活動地點'].'</div>
                      <div style="font-size:15px;">'.$begin_time[0].' '.$begin_time[1].' ~ '.$end_time[0].' '.$end_time[1].'</div>
                      <div id="MaincoserContent'.$row['NewsID'].'" style="font-size:16px; font-family:微軟正黑體;"><p>'.$row['content'].'</p></div>
            ';

      echo'<div id="readmore'.$row["NewsID"].'" onclick="MainnewsDetail(\''.$row["NewsID"].'\',\''.$row['活動類型'].'\')" style="cursor:pointer; color:blue;">顯示更多</div>
            </div><style>#MaincoserContent'.$row["NewsID"].'{height:60px;}</style>';
          

      echo'
      <style>
      #MaincoserContent'.$row["NewsID"].'{
        margin-left:-5px;
        overflow:hidden;
        width:300px;
      }
      </style>
      ';               
    }
    }
?>