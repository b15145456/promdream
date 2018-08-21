<meta charset="utf-8">
<?php   
    session_start();
    if(!isset($_SESSION)){$SEC = "";}
    else {$rightcheck = $_SESSION['checkNum'];}

    include("db_connect.php");
	$name=$_POST["name"];
    $nickname=$_POST["nickname"];
    $pwd=$_POST["pwd"];
	$gender=$_POST["gender"];
	$email=$_POST["email"];
    $phone=$_POST["phone"];
    $city=$_POST["city"];
    $area=$_POST["area"];
    $address=$_POST["address"];
    $checknum = $_POST['checknum'];
    $file_name = iconv('utf-8','big5', $_FILES["file"]["name"]);//處理中文問題
    $key = 0;//確認用 4是都成功
    checkVerifyCode($rightcheck,$checknum);
    if($key!=1){
        echo "<script>alert('警告：認證碼錯誤!!'); location.href = 'PramDream_CoserRegister.php'</script>";
    }

    $sql = " SELECT MAX(ID) FROM coserRegister";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $row = mysqli_fetch_array($result);
    $CoserID=$row[0];
    $id= $row[0]+1;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        $key++;
    } 
    //先取出目前最大的使用者ID
    //將ID++
    //設為新使用者ID

    $finaladdress=$city.$area.$address;
    
    if($key==2){ 
        $sql = "INSERT INTO coserRegister (ID, 名字, 暱稱, 密碼, 性別, 信箱, 電話, 地址)
        VALUES ('".$id."', '".$name."', '".$nickname."', '".$pwd."' ,'".$gender."','".$email."','".$phone."','".$finaladdress."')"; 

        if ($conn->query($sql) === TRUE) {
            $key++;
            echo "<br>資料庫連接成功<br>";
        } else {
            echo "<br>資料庫連接失敗<br>";
        }
    }
    if($key==3){
        if($_FILES['file']['error']>0){
            echo "檔案上傳失敗，請嘗試重新註冊<br/>";
            echo "Error: " . $_FILES['file']['error'];
            // 设置编码，防止中文乱码
            mysqli_query($conn , "set names utf8");
            $sql = " DELETE FROM coserRegister WHERE  ID = $id";
            mysqli_select_db( $conn, 'coserRegister' );
            $delete = mysqli_query( $conn, $sql );
            if(!$delete)
            {
                die('无法删除数据: ' . mysqli_error($conn));
            }
            echo '数据删除成功！';
            mysqli_close($conn);//如果照片刪除失敗就刪除資料庫資料(尚未測試)
        }
        else if(file_exists("Coser-register/".$file_name)){
            echo "<br>檔案已存在，請勿重複上傳相同檔案<br><br>";
        }
        else{  
            $key++;
            move_uploaded_file($_FILES['file']['tmp_name'], 'Coser-register/'.$id.".jpg");//修改儲存位置的地方
        }
    }    

    $conn->close();
    
    if($key==4){
        echo "<br>註冊成功!請靜待審核<br>";
    }


    function checkVerifyCode($rightcheck, $checknum){
        //如果驗證碼為空
        if($rightcheck == ""){}

        //如果驗證碼不是空白但輸入錯誤
        else if($rightcheck !=  $checknum && $rightcheck !=""){
            }

        else{
            $GLOBALS['key']++;
            //驗證碼輸入正確
            //這邊可以做任何事情，像是寄信等等的東西
        }
    }
?>