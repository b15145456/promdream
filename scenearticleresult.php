<?php
if(isset($_FILES['files'])){
  $errors= array();
  $imglimitnum=5;//最多上傳三張
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