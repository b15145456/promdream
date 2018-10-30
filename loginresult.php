<meta charset="utf-8">
<?php
    session_start();
	include_once("pdo_connect.php");
	$account=$_POST["account"];
	$pwd=$_POST["pwd"];
    $statement = $connection->query("select * from coserRegister where 信箱 = '$account'");
    $nums=0;
    foreach($statement as $row){
        $nums++;
    }
    if($nums==0){
        echo "<script>alert('你484想混進來(╬ﾟдﾟ)▄︻┻┳═一'); location.href = 'http://localhost/promdream/login.php'</script>";
    }
    else{
        $statement = $connection->query("select * from coserRegister where 信箱 = '$account'");
        foreach($statement as $row){
            $verifyPwd=$row['密碼'];
            if($verifyPwd==$pwd){
                 $username=$row['暱稱'];
                 $_SESSION['username']=$username;
                 $id=$row['ID'];
                 $_SESSION['ID']=$id;
                 $contribution=$row['貢獻度'];
                 $_SESSION['contribution']=$contribution;
                 $Manager=$row['Manager'];
                 $_SESSION['Manager']=$Manager; 
                 $VerifyState=$row['認證狀態'];
                 if($VerifyState=="T"){
                    $_SESSION['loginstate']=1;
                 }
                 else{
                    echo "<script>alert('$username! 您的帳號尚未通過認證!請回吧(」・ω・)」うー！(／・ω・)／'); location.href = 'http://localhost/promdream/main-coser.php'</script>";
                 }
                 echo "<script>alert('$username! 歡迎光臨夢之舞會(」・ω・)」うー！(／・ω・)／'); location.href = 'http://localhost/promdream/main-coser.php'</script>";  
            }
            else{echo "<script>alert('密碼錯囉，再檢查一下(・ω・)'); location.href = 'http://localhost/promdream/login.php'</script>";}

        }
    }    
?>