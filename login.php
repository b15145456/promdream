<!DOCTYPE html>
<?php
   error_reporting(0);
   session_start();
   if(!isset($_SESSION)){$loginstate = 0;}
   $loginstate=$_SESSION['loginstate'];
   if($loginstate==1){
      echo "<script>alert('您已經登入囉!'); location.href = 'http://localhost/promdream/main-coser.php'</script>";
   }
?>
<html>
	<head>
		<meta charset = "utf-8">
		<meta name = "description" content = "">
		<!--上述為網址外部描述-->
		<title>Login</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="left-reload.css" rel="stylesheet">
		
		<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"  type="text/css">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet"  type="text/css">
		<link href="Gallery-2.25.1/css/blueimp-gallery.css" rel="stylesheet"  type="text/css">
		
		<script src="jquery-3.2.1.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="main-coser.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<script src="Gallery-2.25.1/js/blueimp-gallery-video.js"></script>

		<!--響應式套用 p.s 這裡有一個小問題，根據你的行位 若將18行的引進js移到16行，將無法造成輪播效果，請各位注意-->
	</head>

	<body id=body>
      <div class = "loginbox">
    	<div class="logintoregister">
    		<h3>尚未註冊&nbsp?</h3>
    		<input type="button" value="按此註冊" onclick="javascript:location.href='PramDream_MemberRegister.html'"></input>
    	</div>    	    
	   		<div class = "form-horizontal">
	   			<form class = "LoginForm" method="post" name="loginform" action = "loginresult.php" onsubmit="return testblank()">
					<div class = "form-group">
					  		<label class = "control-label col-sm-2" for = "account"><div class=acttext>帳號&nbsp:&nbsp&nbsp</div></label>
					  	<div class = "col-sm-1">          
							<input type = "text" class = "form-control" id = "account" placeholder = "輸入帳號或信箱" name = "account">
					  	</div>
					</div>

					<div class = "form-group pwd">
					  		<label class = "control-label col-sm-2" for = "pwd"><div class=pwdtext>密碼&nbsp:&nbsp&nbsp</div></label>
					 	<div class = "col-sm-1">          
							<input type = "password" class = "form-control" id = "pwd" placeholder = "輸入密碼" name = "pwd">
						</div>
					</div>
					<div class = "form-group loginsubmit">        
					  	<div class = "col-sm-1">
							<button type = "submit" class = "btn btn-default">送出</button>
						    <div class = forgetpwd>忘記密碼&nbsp?</div>
					  	</div>
				    </div>						   		 	
	   		  	</form>
	   		</div>
	   	</div>
	<!--登入介面區-->

		<div class = "otheraccountlogin col-sm-6">
	   		<div class = facebooklogin>
	   	</div>
	   		<div class = googlelogin>       
	   	</div>
		</div>		   
		<!--登入介面區-->
	</body>

<style type="text/css">
.LoginForm{
  position: absolute;
  margin-top:10%;
  margin-left:30%;
}

.pwd{
  position: absolute;
  margin-top:4%;
}

.loginsubmit{
   position:relative;
   margin-top: 25%;
   margin-left:64%;
   display: inline-block;
}

.loginbox{
  background-color:#ffffff; 
  left:30vw;
  margin-top:10%;
  border-style:solid;
  border-color: #7FB2F0;
  border-width:3px;
  height:40vh;
  width: 30vw;
  border-radius:10px;
  position:absolute;
}

.acttext{
  margin-top: 4%;
  margin-left: -30%;
  position: absolute;
}
.pwdtext{
  margin-top: 4%;
  margin-left: -30%;
  position: absolute;
}
.forgetpwd{
  position: absolute;
  margin-top:-40%;
  margin-left:-400%;
  color:#0066FF;
  cursor: pointer; 
}

.otheraccountlogin{
  background-color:#ffffff; 
  left:30vw;
  margin-top:68vh;
  border-style:solid;
  border-color: #ffffff;
  border-width:3px;
  height:5vh;
  width: 30vw;
  border-radius:10px;
  position: absolute;
}
.facebooklogin{
  background-image:url(background-img/facebook登錄.jpg);
  background-size: 100% 100%;
  background-repeat: no-repeat;
  width:40%;
  height:100%;
  border-style:solid;
  border-color: #7FB2F0;
  border-radius:30px;
  position:relative;
  cursor: pointer;
  opacity: 0.5;
  display: inline-block;
}
.facebooklogin:hover{
  opacity: 1;
}

.googlelogin{
  background-image:url(background-img/google登錄.jpg);
  background-size: 100% 100%;
  background-repeat: no-repeat;
  width:40%;
  height:100%;
  border-style:solid;
  border-color: #7FB2F0;
  border-radius:30px;
  position: relative;
  cursor: pointer;
  opacity: 0.5;
  display: inline-block;
  margin-left: 5%;
}

.googlelogin:hover{
  opacity: 1;
}

.logintoregister{
  position: relative;
  margin-top:0%;
  margin-left: 0%;
}

.logintoregister h3{
  font-family: 微軟正黑體;
}		

</style>>

</html>