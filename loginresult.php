<meta charset="utf-8">
<?php
    session_start();
	include("db_connect.php");
	$account=$_POST["account"];
	$pwd=$_POST["pwd"];
   
	$sql = " SELECT 密碼 FROM coserRegister WHERE 信箱 = '$account' ";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $nums=mysqli_num_rows($result);
    if($nums==0){
    	echo "<script>alert('你484想混進來(╬ﾟдﾟ)▄︻┻┳═一'); location.href = 'http://localhost/promdream/login.php'</script>";
    }
    $row = mysqli_fetch_array($result);
    $verifyPwd=$row[0];
    if($verifyPwd==$pwd){
    	$sql = " SELECT 暱稱 FROM coserRegister WHERE 信箱 = '$account' ";
    	$result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    	$username=$row[0]; 
    	$_SESSION['loginstate']=1;
    	$_SESSION['username']=$username;

    	$sql = " SELECT ID FROM coserRegister WHERE 信箱 = '$account' ";
    	$result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $id=$row[0]; 
        $_SESSION['ID']=$id;

    	echo "<script>alert('$username! 歡迎光臨夢之舞會(」・ω・)」うー！(／・ω・)／'); location.href = 'http://localhost/promdream/main-coser.php'</script>";
    }
    else{
    	echo "<script>alert('密碼錯囉，再檢查一下(・ω・)'); location.href = 'http://localhost/promdream/login.php'</script>";
    }
?>