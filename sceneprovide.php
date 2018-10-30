<meta charset="utf-8">
<?php   
    session_start();
    error_reporting(0);
    if(!isset($_SESSION)){$loginstate = 0;}
    else{
        $loginstate=$_SESSION['loginstate'];
        $username=$_SESSION['username'];
        $ID=$_SESSION['ID'];
    }

    $connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');


	$name=$_POST["name"];
    $type=$_POST["type"];
    $cost=$_POST["cost"];
	$link=$_POST["link"];
    $sceneaddress=$_POST["sceneaddress"];
	
    $file_name = iconv('utf-8','big5', $_FILES["file"]["name"]);//處理中文問題

    $statement = $connection->query("select MAX(ID) from photoscene;");
    $row=$statement->fetchAll();

    
    $SceneID=$row[0]['MAX(ID)'];
    $id= $SceneID+1;
    //先取出目前最大的ID
    //將ID++
    //設為新ID
    $zero=0;

    $statement = $connection->prepare("INSERT INTO photoscene (ID, name ,type,cost,網址,eval,position,留言數,評論數) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement->bindParam(1, $id);
    $statement->bindParam(2, $name);
    $statement->bindParam(3, $type);
    $statement->bindParam(4, $cost);
    $statement->bindParam(5, $link);
    $statement->bindParam(6, $zero);
    $statement->bindParam(7, $sceneaddress);
    $statement->bindParam(8, $zero);
    $statement->bindParam(9, $zero);
    $statement->execute();

    if($_FILES['file']['error']>0){
        echo "檔案上傳失敗，請嘗試重新註冊<br/>";
        echo "Error: " . $_FILES['file']['error'];
    }
    else if(file_exists("Coser-register/".$file_name)){
        echo "<br>檔案已存在，請勿重複上傳相同檔案<br><br>";
    }
    else{
        move_uploaded_file($_FILES['file']['tmp_name'], 'sceneimg/'.iconv('utf-8','big5', $name).'.jpg');//修改儲存位置的地方
        echo "<script>alert('棚資訊提交完成，感謝您的協助!!'); location.href = 'http://localhost/promdream/Photoscenes.php'</script>";
    }
?>