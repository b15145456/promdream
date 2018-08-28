<?php

session_start();
error_reporting(0);
if(!isset($_SESSION)){$loginstate = 0;}
else{
    $loginstate=$_SESSION['loginstate'];
    $username=$_SESSION['username'];
    $ID=$_SESSION['ID'];
}

$name=$_POST["name"];
$scenetype=$_POST["scenetype"];
$type=$_POST["type"];
$content=$_POST["content"];

$connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');

$statement = $connection->query("select MAX(ID) from scenecomment;");
$row=$statement->fetchAll();   
$ArticleID=$row[0]['MAX(ID)'];
$id= $ArticleID+1;

$statement = $connection->prepare("INSERT INTO scenecomment (ID, 使用者ID ,暱稱 ,文章主題 ,棚名, 文章類型, 評論, photo1, photo2, photo3, photo4, photo5) VALUES (?, ?, ? , ? , ?, ?, ?, ?, ?, ?, ?, ?)");
$statement->bindParam(1, $id);
$statement->bindParam(2, $ID);
$statement->bindParam(3, $username);
$statement->bindParam(4, $name);
$statement->bindParam(5, $scenetype);
$statement->bindParam(6, $type);
$statement->bindParam(7, $content);

if(isset($_FILES['files'])){
  $errors= array();
  $imglimitnum=5;//最多上傳三張
  $limit=0;//已經上傳的張數

  $filearray=$_POST["filearray"];
  $file_sec = explode(",",$filearray);

  $upload_img_count=8;
  foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    if(!in_array($key, $file_sec)){
      continue;
    }
    $limit++;
    if($limit>$imglimitnum){
      break;
    }
    $file_name = $key.$_FILES['files']['name'][$key];
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key]; 
    

    $desired_dir="article_img/".$ID;
    if(empty($errors)==true){
        if(is_dir($desired_dir)==false){
            mkdir("$desired_dir", 0700);  // Create directory if it does not exist
        }
        if(is_dir("$desired_dir/".$file_name)==false){
            move_uploaded_file($file_tmp,"article_img/".$ID."/".$id."_".($upload_img_count-7).".jpg");
            $file_position="article_img/".$ID."/".$id."_".($upload_img_count-7).".jpg";
            $statement->bindValue($upload_img_count,$file_position);
            $upload_img_count++;
        }else{         //rename the file if another one exist
          $new_dir="article_img/".$ID."/".$file_name.time();
          rename($file_tmp,$new_dir);    
        }
        // mysql_query($query);   
    }
    else{
       print_r($errors);
    }
  }
  while($upload_img_count<=12){
    $statement->bindValue($upload_img_count,"");
    $upload_img_count++;
  }
  if(empty($error)){
    $statement->execute(); 
    echo "<script>alert('文章已發佈'); location.href = 'http://localhost/promdream/Photoscenes.php'</script>";
  }
}
?>