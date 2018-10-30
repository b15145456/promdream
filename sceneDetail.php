<?php   
    include("loginstate.php");
    $type= $_POST['type']; 
    $regstration = $_POST['registration'];
    $Likevalue = $_POST['Likevalue'];    
    
    if($regstration=="success"){
      if($Likevalue!=""&&$loginstate!=0){
        $CommentID=$_POST['CommentID'];
        LikeCommentajax($Likevalue,$CommentID);
      }
 			else{
        $sceneID= $_POST['sceneID'];
        sceneinfoinquire($type);
      }  
    }	
   //查詢Query的結果

    //第pagenum頁顯示displaynum條資料   
   function sceneinfoinquire($type){
      global $ID;
   	  global $sceneID;
   		include 'pdo_connect.php';
        $headnum=$displaynum*($pagenum-1);//前面顯示的資料筆數
        if ($type==1){
			$statement = $connection->query("select * from scenecomment where 棚名='$sceneID' order by ID;");
		}
        if ($type==2){
			$statement = $connection->query("select * from scenecomment order by 評論評價 Limit $headnum,$displaynum;");
		}

   
    echo '<div style="margin-left:-90%; cursor:pointer;" onclick="SortbyCommentNum()"><img src="background-img/leftarrow.png" width="80px" height="80px"/></div>';
		foreach($statement as $row){
      $likestr=$row["likecomment"];
      $likearr=explode(",",$likestr);
      if(count($likearr)==0){
         $likenum=0;
      }
      else{
        $likenum=count($likearr)-1;
      }
      $src="./background-img/unlike.png";
      foreach($likearr as $value){
        if($value==$ID){
          $src="./background-img/enlike.png";
        }
      }
			echo '<div class="scenedetail" style="padding:15px; box-shadow:3px 3px 5px 6px #cccccc;">  
          <h3>'.$row['暱稱'].'</h3>
          <h5>'.$sceneID.'</h5>
          <img id="likeimg'.$row['ID'].'" class="likediv" src="'.$src.'" width="25px" height="25px" onclick="LikeComment(this.id)"/><!--讓使用者按喜歡-->
          <div id="likenum'.$row['ID'].'" class="likediv" style="margin-left:30px; margin-top:131px;">'.$likenum.'</div>
          <div id="scenedetailphoto">
            <table>
              <tr>
                <td><a href="'.$row['photo1'].'" target="_blank"><img src="'.$row['photo1'].'"></a></td>
                <td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="'.$row['photo2'].'" target="_blank"><img src="'.$row['photo2'].'" ></a> </td>
                <td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="'.$row['photo3'].'" target="_blank"><img src="'.$row['photo3'].'" ></a> </td>
              </tr>
            </table>
          </div>
          <div id="scenecomment'.$row["ID"].'" style="font-size:16px; font-family:微軟正黑體;"><p>'.$row['評論'].'</p></div>
          ';
        if(strlen($row['評論'])<=465){
          echo'</div><style>#scenecomment'.$row["ID"].'{height:auto;}</style>';
        }
        else{
          echo'<div id="readmore'.$row["ID"].'" onclick="readmore(\'scenecomment'.$row["ID"].'\',this.id)" style="cursor:pointer; color:blue;">顯示更多</div>
        </div><style>#scenecomment'.$row["ID"].'{height:120px;}</style>';
        }  
        echo'
        <style>
          #scenecomment'.$row["ID"].'{
            margin-left:200px;
            width:500px;
            overflow:hidden;
            text-align:left;
          }
        </style>
        '; 
		}
    }

    function LikeCommentajax($Likevalue,$CommentID){
          global $ID;
          $commentID = substr($CommentID,7);
          include 'pdo_connect.php';
          $statement = $connection->query("select likecomment from scenecomment where ID='$commentID';");
          foreach($statement as $row){
            $likestr=$row["likecomment"];
            $likearr=explode(",",$likestr);
          }
          $findlike=0;
          if($Likevalue==1){
             foreach($likearr as $value){
               if($value==$ID){
                 $findlike++;
               }
             }
             if($findlike==0||count($likearr)==0){
                $likestr.=','.$ID;
             }
          }//喜歡的狀態
          else{
            $newlike=="";
            foreach($likearr as $value){
                if($value==$ID||$value==""){
                }
                else{
                  $newlike.=",".$value;
                }  
            }
            $likestr=$newlike;
          }
          $data = [
            'ID' => $commentID,
            'likestr' => $likestr,
          ];
          $sql = "UPDATE `scenecomment` SET `likecomment` = :likestr WHERE `ID` = :ID";
          $stmt= $connection->prepare($sql);
          $stmt->execute($data);
    }
 ?>  