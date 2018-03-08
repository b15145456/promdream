<meta charset="utf-8">
<?php   
        include("db_connect.php");
		$name=$_POST["name"];
		$photodetail=$_POST["photodetail"];
		$tag=$_POST["tag"];
         
    $file_name = iconv('utf-8','big5', $_FILES["file"]["name"]);
    //處理中文問題
    if($_FILES['file']['error']>0){
        echo "檔案上傳失敗<br />";
        echo "Error: " . $_FILES['file']['error'];
    }
    else if(file_exists("uploadfile/".$file_name)){
        echo "<br>檔案已存在，請勿重複上傳相同檔案<br><br>";
    }
    //檔案檢查
    else{
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploadfile/'.$file_name);//修改儲存位置的地方
            echo "檔案連結：".'<a href="file/'.$_FILES['file']['name'].'">'.$_FILES["file"]["name"].'</a>';
            echo "<br />";
            echo "副檔名：".pathinfo('file/'.$_FILES['file']['name'], PATHINFO_EXTENSION)."<br />";
            echo "類型：".$_FILES['file']['type']."<br />";
            echo "大小：".iconv('utf-8','big5',(round($_FILES['file']['size']/1024000,2)))."MB<br />";
    }
    //檔案資訊


    echo("圖片主題 &nbsp&nbsp:".$name."<br><br>");
 	echo("圖片描述 &nbsp&nbsp:".$photodetail."<br><br>");
 	echo("標籤 &nbsp&nbsp:".$tag."<br><br>");
 	echo("檔案位置 &nbsp&nbsp:".'promdream/uploadfile/'.$file_name."<br><br>");

    $sql = " SELECT photoID FROM image where photoID = MAX(photoID) ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $photoID=$row[0];
    //先取出目前最大的圖片ID
    //將圖片ID++設為新圖片ID
    //存入圖片
?>