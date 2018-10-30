<?php
	$verify = stripslashes(trim($_GET['verify']));
	$nowtime = time();
    $connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');//連接數據庫
    $stmt = $connection->query("select `ID`,`信箱驗證有效期` from coserregister where `信箱認證狀態`='' and `信箱驗證碼`='$verify'");
    foreach($stmt as $row){
		if($row){
 			if($nowtime>$row['信箱驗證有效期']){ //24hour
  				$msg = '<div style="margin-left:30vw; margin-top:40vh; font-size:20px">您的帳號認證有效期已過，請登錄您的帳號重新發送認證郵件！</div>';
 			}else{
 				$data = [
        			'EmailVerifyState' => "T",
        			'ID' => $row['ID'],
      			];
 				$sql = "UPDATE `coserregister` SET `信箱認證狀態` = :EmailVerifyState WHERE `ID` = :ID";
      			$stmt= $connection->prepare($sql);
      			$stmt->execute($data);
  				$msg = '<div style="margin-left:30vw; margin-top:40vh; font-size:20px; letter-spacing:5px;">帳號認證成功！再<div id="time" style="display:inline;"></div>秒跳轉到主頁面</div>';
 			}
		}else{
		 	$msg = 'error'; 
		}
		echo $msg;
		echo "
		<script>
		//設定倒數秒數
		var t = 5;

		//顯示倒數秒收
		function showTime()
		{
    		t -= 1;
    		document.getElementById('time').innerHTML=t;
    
    		if(t==0)
    		{
        		location.href='main-coser.php';
    		}
    
    		//每秒執行一次,showTime()
    		setTimeout('showTime()',1000);
		}
		//執行showTime()
		showTime();</script>";
    }
?>