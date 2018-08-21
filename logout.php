<?php
	session_start();
   	$_SESSION['loginstate']=0;
   	$_SESSION['username']="";
    echo "<script>location.href ='http://localhost/promdream/main-coser.php'</script>";
?>