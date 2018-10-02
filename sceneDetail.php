<style>
	<?php include 'left-reload.css'; ?>
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php   
        error_reporting(0);
        session_start();
        if(!isset($_SESSION)){$loginstate = 0;}
        else{	
          $loginstate=$_SESSION['loginstate'];
          $username=$_SESSION['username'];
          $ID=$_SESSION['ID'];
        } 
       $type= $_POST['type']; 
 		   $sceneID= $_POST['sceneID'];
    	 $regstration = $_POST['registration'];
        

    	if($regstration=="success"){
 			$myArr =  sceneinfoinquire($type);
        }	
   //查詢Query的結果

    //第pagenum頁顯示displaynum條資料   
   function sceneinfoinquire($type){
   	    global $sceneID;
   		$connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
        $headnum=$displaynum*($pagenum-1);//前面顯示的資料筆數
        if ($type==1){
			$statement = $connection->query("select * from scenecomment where 棚名='$sceneID' order by ID;");
		}
        if ($type==2){
			$statement = $connection->query("select * from scenecomment order by 評論評價 Limit $headnum,$displaynum;");
		}
        echo '<div style="margin-left:-90%" onclick="SortbyName()"><img src="background-img/leftarrow.png" width="80px" height="80px"/></div>';
		foreach($statement as $row){
			echo '<div class="scenedetail" style="box-shadow:3px 3px 5px 6px #cccccc;">  
          <h3>'.$row['暱稱'].'</h3>
          <h5>'.$sceneID.'</h5>
          <p><img src="background-img/if_relationships_101822.png" width="25px" height="25px" />&nbsp85</p><!--讓使用者按喜歡-->
          <div id="scenedetailphoto">
          <table>
            <tr>
                <td><a href="'.$row['photo1'].'" target="_blank"><img src="'.$row['photo1'].'"></a></td>
                <td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="'.$row['photo2'].'" target="_blank"><img src="'.$row['photo2'].'" ></a> </td>
                <td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="'.$row['photo3'].'"><img src="'.$row['photo3'].'" ></a> </td>
            </tr>
          </table>
          <div id="scenecomment">'.$row['評論'].'</div>
          </div>

          <div  class="scenecommentmore" onclick="">
            <div>（查看更多)</div>
          </div>
        </div>';
		}
    }
 ?>  