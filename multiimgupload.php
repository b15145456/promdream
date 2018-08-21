<?php
if(isset($_FILES['files'])){
  $errors= array();
  $imglimitnum=3;//最多上傳三張
  $limit=0;//已經上傳的張數
  foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    $limit++;
    if($limit>$imglimitnum){
      break;
    }
    $file_name = $key.$_FILES['files']['name'][$key];
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key]; 
    if($file_size > 2097152){
      $errors[]='File size must be less than 2 MB';
    }  
    // $query="INSERT into upload_data (`USER_ID`,`FILE_NAME`,`FILE_SIZE`,`FILE_TYPE`) VALUES('$user_id','$file_name','$file_size','$file_type'); ";
    $desired_dir="user_data";
    if(empty($errors)==true){
        if(is_dir($desired_dir)==false){
            mkdir("$desired_dir", 0700);  // Create directory if it does not exist
        }
        if(is_dir("$desired_dir/".$file_name)==false){
            move_uploaded_file($file_tmp,"user_data/".iconv('utf-8','big5', $file_name));
        }else{         //rename the file if another one exist
        $new_dir="user_data/".$file_name.time();
          rename($file_tmp,$new_dir) ;    
        }
        // mysql_query($query);   
    }
    else{
       print_r($errors);
    }
  }
 if(empty($error)){
  echo "Success";
 }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
 <label class="upload_cover">
   <input id="upload_input" type="file" name="files[]" multiple/>
   <span class="upload_icon">➕</span>
 </label>
 <input type="submit" style="margin-left: 10vw;" />
</form>

<style>
.upload_cover {
position: absolute;
width: 100px;
height: 100px;
text-align: center;
cursor: pointer;
background: #efefef;
border: 1px solid #595656;
}
#upload_input {
display: none;
}
.upload_icon {
font-weight: bold;
margin-top: 8px;
font-size: 180%;
position: absolute;
left: 0;
width: 100%;
top: 20%;
}
</style>