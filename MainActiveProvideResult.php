<?php

session_start();
error_reporting(0);
if(!isset($_SESSION)){$loginstate = 0;}
else{
    $loginstate=$_SESSION['loginstate'];
    $username=$_SESSION['username'];
    $ID=$_SESSION['ID'];
}

if($loginstate==0){
  $ID="guest";
}

$name=$_POST["name"];
$hostname=$_POST["hostname"];
$activetype=$_POST["activetype"];
$hostProvide=$_POST["hostProvide"];
$activelink=$_POST["activelink"];
$address=$_POST["address"];
$begintime=$_POST["begintime"];
$endtime=$_POST["endtime"];
$content=$_POST["content"];
$connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');

$statement = $connection->query("select MAX(NewsID) from mainnews;");
$row=$statement->fetchAll();   
$NewsID=$row[0]['MAX(NewsID)'];
$id= $NewsID+1;//要存入的本篇的ID

$statement = $connection->prepare("INSERT INTO mainnews (NewsID,name,hostname,hostProvide,ActiveLink,活動類型,活動地點,開始時間,結束時間,提供者ID,content, photo1, photo2, photo3, photo4, photo5) VALUES (?, ?, ? , ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$statement->bindParam(1, $id);
$statement->bindParam(2, $name);
$statement->bindParam(3, $hostname);
$statement->bindParam(4, $hostProvide);
$statement->bindParam(5, $activelink);
$statement->bindParam(6, $activetype);
$statement->bindParam(7, $address);
$statement->bindParam(8, $begintime);
$statement->bindParam(9, $endtime);
$statement->bindParam(10, $ID);
$statement->bindParam(11, $content);

if(isset($_FILES['files'])){
  $errors= array();
  $imglimitnum=5;//最多上傳張
  $limit=0;//已經上傳的張數

  $filearray=$_POST["filearray"];
  $file_sec = explode(",",$filearray);

  $upload_img_count=12;
  foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    if(!in_array($key, $file_sec)){
      continue;
    }
    $limit++;
    if($limit>$imglimitnum){
      break;
    }
    $file_name = $key.$_FILES['files']['name'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];    

    $desired_dir="mainnews_img/".$id;
    if(empty($errors)==true){
        if(is_dir($desired_dir)==false){
            mkdir("$desired_dir", 0700);  // Create directory if it does not exist
        }
        if(is_dir("$desired_dir/".$file_name)==false){
            move_uploaded_file($file_tmp,"mainnews_img/".$id."/".$ID."_".($upload_img_count-11).".jpg");
            $file_position="mainnews_img/".$id."/".$ID."_".($upload_img_count-11).".jpg";
            $statement->bindValue($upload_img_count,$file_position);
            $upload_img_count++;
        }else{         //rename the file if another one exist
          $new_dir="mainnews_img/".$id."/".$file_name.time();
          rename($file_tmp,$new_dir);    
        }
        // mysql_query($query);   
    }
    else{
       print_r($errors);
    }
  }
  while($upload_img_count<=16){
    $statement->bindValue($upload_img_count,"");
    $upload_img_count++;
  }
  if(empty($error)){
    $statement->execute(); 
    echo "<script>alert('資訊已提供'); location.href = 'http://localhost/promdream/main-coser.php'</script>";
  }
}
?>