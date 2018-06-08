<?php include 'scenephp.php'; ?>
<?php  
        header("Content-Type:text/html; charset=utf-8");
 		$type= $_POST['type'];
    	$regstration = $_POST['registration'];
    	if($regstration=="success"){
 			// some action goes here under php
 			$myArr =  sceneinfoinquire(1,3,$type);
			//$myJSON = json_encode($myArr,JSON_UNESCAPED_UNICODE);編碼中文要這樣寫
        	//echo $myJSON;單純用ajax取得資料,不回傳
        }	
 ?>  