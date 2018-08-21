<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<meta name = "viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type = "text/css">
			header{
				padding: 1em;
				color: black;
				background-color: white;
				clear: left;
				text-align: center;
			}
			
			article{
				padding: 1em;
				overflow: hidden;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<header>
			<h2>Coser註冊</h2>
		</header>

			<div class = "container">
				  <form class = "form-horizontal"  enctype="multipart/form-data" method="post" name="registerupload" action = "PramDream_CoserRegisterResult.php" onsubmit="return testblank()">
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "name">姓名:</label>
					  <div class = "col-sm-10">
						<input type = "txt" class = "form-control" id = "name" placeholder = "輸入姓名" name = "name">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "nickname">暱稱:</label>
					  <div class = "col-sm-10">
						<input type = "txt" class = "form-control" id = "nickname" placeholder = "輸入姓名" name = "nickname">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "gender">性別:</label>
					  <div class = "col-sm-1">          
						<select name="gender">
  								<option value ="男">男</option>
  								<option value ="女">女</option>
						</select>
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "email">Email:</label>
					  <div class = "col-sm-10">
						<input type = "email" class="form-control" id = "email" placeholder = "輸入信箱" name = "email">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "phone">手機號碼:</label>
					  <div class = "col-sm-10">
						<input type = "phone" class="form-control" id = "phone" placeholder = "輸入手機號碼" name = "phone">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "address">住址:</label>
					  <div class = "col-sm-10">
					    <div id="addressall">
					    <div id=addressSel>
							<select name="city" size=4 onChange="resetSelect(this.selectedIndex);" style="font-size:15px;">
    							<option value="臺北市">臺北市</option>
								<option value="新北市">新北市</option>
								<option value="桃園市">桃園市</option>
								<option value="臺中市">臺中市</option>
								<option value="臺南市">臺南市</option>
								<option value="高雄市">高雄市</option>

								<option value="基隆市">基隆市</option>
								<option value="新竹市">新竹市</option>
								<option value="嘉義市">嘉義市</option>

								<option value="新竹縣">新竹縣</option>
								<option value="苗栗縣">苗栗縣</option>
								<option value="彰化縣">彰化縣</option>
								<option value="南投縣">南投縣</option>
								<option value="雲林縣">雲林縣</option>
								<option value="嘉義縣">嘉義縣</option>
								<option value="屏東縣">屏東縣</option>
								<option value="宜蘭縣">宜蘭縣</option>
								<option value="花蓮縣">花蓮縣</option>
								<option value="台東縣">台東縣</option>
							    <option value="澎湖縣">澎湖縣</option>
								<option value="金門縣">金門縣</option>
								<option value="連江縣">連江縣</option>
							</select>
						</div>
						<div id=addressSel>
							<select name="area" name="area" size=5 style="font-size:15px;">
								<option value=""></option>
							</select>
						</div>
						</div>

						<input type = "txt" class="form-control" id = "address" placeholder = "輸入住址" name = "address">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "pwd">密碼:</label>
					  <div class = "col-sm-10">          
						<input type = "password" class = "form-control" id = "pwd" placeholder = "輸入密碼" name = "pwd" onchange="CheckPwd()">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "pwdagain">確認密碼:</label>
					  <div class = "col-sm-10">          
						<input type = "password" class = "form-control" id = "pwdagain" placeholder = "再次輸入密碼" name = "pwdagain" onchange="CheckPwd()">
						<div id=pwdCheck></div>
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "file">個人cosplay照<br>以及角色比對圖:</label>
					  <div class = "col-sm-10">       
					  <input name = 'file' type = "file" id = "file">
					  </div>
					  	<div>
        				  	<img class="preview col-sm-4" style="max-width:auto; max-height:auto;">
       				      	<div class="size col-sm-2" id="photosize"></div>
    				   	</div>
    				   <!--圖片預覽區塊-->
					  </div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "confirmnum">驗證碼:</label>
					  <div class = "col-sm-6">
					    <img id="Verifyimg" class = "col-sm-4" src="verify_image.php" style="margin-left: -15px">
						<input class = "col-sm-2  form-inline" type="text" name="checknum" style="margin-top:10px">
					  </div>
					  <input class = "col-sm-1 form-inline" type="button" value="換一個" style="margin-top:10px; margin-left:0vw; position:relative;" onclick="ChangeVerify()">
					</div>
					<div class = "form-group">        
					  <div class = "col-sm-offset-2 col-sm-10">
						<button id="registerSubmit" type = "submit" class = "btn btn-default">送出</button>
					  </div>
					</div>
				  </form>
				</div>
	</body>
</html>

<script language="JavaScript" type="text/javascript">

 
   //start of 預覽圖片
   $(function (){
   /**
 	* 格式化
	* @param   num 要轉換的數字
 	* @param   pos 指定小數第幾位做四捨五入
	*/
    function format_float(num, pos)
    {
        var size = Math.pow(10, pos);
        return Math.round(num * size) / size;
    }
 
    function preview(input) {
        
        // 若有選取檔案
    if (input.files && input.files[0]) {
    	 var phototype = true;
         var photoname =  input.files[0].name;
         var re = /\.(jpg|gif)$/i;  //允許的圖片副檔名


        // 建立一個物件，使用 Web APIs 的檔案讀取器(FileReader 物件) 來讀取使用者選取電腦中的檔案
        var reader = new FileReader();
 
        // 事先定義好，當讀取成功後會觸發的事情
        reader.onload = function (e) {
            
            console.log(e);
 
            // 這裡看到的 e.target.result 物件，是使用者的檔案被 FileReader 轉換成 base64 的字串格式，
            // 在這裡我們選取圖檔，所以轉換出來的，會是如 『data:image/jpeg;base64,.....』這樣的字串樣式。
            // 我們用它當作圖片路徑就對了。
            $('.preview').attr('src', e.target.result);
 
            // 檔案大小，把 Bytes 轉換為 KB
            var KB = format_float(e.total / 1024, 2);
            $('.size').text("檔案大小：" + KB + " KB");

            if(!re.test(photoname)){
         		phototype=false;
         		document.getElementById('photosize').innerHTML="檔案格式不對!";
         		document.getElementById('photosubmit').disabled=true;
            }
            if(phototype==true){
            	testsize(KB);
            }
        }
 
        // 因為上面定義好讀取成功的事情，所以這裡可以放心讀取檔案
        reader.readAsDataURL(input.files[0]);
       }
   }
 
    $("body").on("change", "#file", function (){
        preview(this);
    })
    
   })
   //end of 預覽圖片
   
   function testsize(size){
   	   var MB = size/1000;
   	   		if(MB>6){
   	   	   		document.getElementById('registerSubmit').disabled=true;
   	   	   		document.getElementById('photosize').innerHTML="檔案大於6MB!<br>請上傳較小的檔案";
   	   		}
   	   		else{
   	   	   		document.getElementById('registerSubmit').disabled=false;
   	   		}
   }

   function testblank(){
		if(registerupload.name.value == "" || registerupload.nickname.value == "" || registerupload.gender.value == "" || registerupload.email.value == "" || registerupload.phone.value == "" || registerupload.address.value == "" || registerupload.pwd.value == ""){
	  		 alert("還有資訊尚未填寫");
       		 return(false);
		}
		return(true);
    }//檢測空白

    function CheckPwd(){
    	var pwdAgain=document.getElementById("pwdagain").value;
    	var pwd=document.getElementById("pwd").value;
    	if (pwd!=pwdAgain){
             document.getElementById("pwdCheck").innerHTML="密碼不相符<img src='background-img/cross.png' height='20px' width='20px'>";
             document.getElementById('registerSubmit').disabled=true;
    	}
        else{
        	document.getElementById("pwdCheck").innerHTML="密碼相同<img src='background-img/circle.png' height='20px' width='20px'>";
        	document.getElementById('registerSubmit').disabled=false;
        }
    }
    function ChangeVerify(){
        document.getElementById("Verifyimg").src='verify_image.php';
    }

    department=new Array();
	department[0]=["張隆紋", "黃能富", "王炳豐", "張世杰", "張智星"];	// 資訊系
	department[1]=["黃瑞星", "黃仲陵", "呂忠津", "鄭博泰", "盧向成"];	// 電機系
	department[2]=["楊敬堂", "王培仁", "葉銘權", "宋鎮國"];			// 動機系
	department[3]=["王天戈", "開執中", "梁正宏"];				// 工科系

	function renew(index){
		for(var i=0;i<department[index].length;i++)
			document.myForm.member.options[i]=new Option(department[index][i], department[index][i]);	// 設定新選項
		document.myForm.member.length=department[index].length;	// 刪除多餘的選項
	}


</script>

<style>
 #addressSel{
        width: 200px;
        height: 50px;
        border-radius: 5px;
        box-shadow: 0 0 5px #ccc;
        font-size: 10px;
        position: relative;
        display: inline-block;
        margin-left: 20px;
    }
#addressSel select{
	    appearance: none;
        -webkit- appearance: none;
        -moz- appearance: none;
        border: none;
        outline: none;
        width: 100%;
        height: 100%;
        line-height: 40px;
       }
#addressall{
	margin-left: -1vw;
	margin-bottom: 10px;
}       
</style>

<script language="JavaScript" type="text/javascript">
city= new Array();

city[0]=["中正區","大同區","中山區","松山區","大安區","萬華區","信義區","士林區","北投區","內湖區","南港區","文山區"]; //台北

city[1]=["板橋區","新莊區","中和區","永和區","土城區","樹林區","三峽區","鶯歌區","三重區","蘆洲區","五股區","泰山區","林口區","八里區","淡水區","三芝區","石門區","金山區","萬里區","汐止區","瑞芳區","貢寮區","平溪區","雙溪區","新店區","深坑區","石碇區","坪林區","烏來區"];//新北


city[2]=["桃園區","中壢區","平鎮區","八德區","楊梅區","蘆竹區","大溪區","龍潭區","龜山區","大園區","觀音區","新屋區","復興區"];//桃園

city[3]=["中區","東區","南區","西區","北區","北屯區","西屯區","南屯區","太平區","大里區","霧峰區","烏日區","豐原區","后里區","石岡區","東勢區","新社區","潭子區","大雅區","神岡區","大肚區","沙鹿區","龍井區","梧棲區","清水區","大甲區","外埔區","大安區","和平區"];//台中

city[4]=["中西區","東區","南區","北區","安平區","安南區","永康區","歸仁區","新化區","左鎮區","玉井區","楠西區","南化區","仁德區","關廟區","龍崎區","官田區","麻豆區","佳里區","西港區","七股區","將軍區","學甲區","北門區","新營區","後壁區","白河區","東山區","六甲區","下營區","柳營區","鹽水區","善化區","大內區","山上區","新市區","安定區"];//台南

city[5]=["楠梓區","左營區","鼓山區","三民區","鹽埕區","前金區","新興區","苓雅區","前鎮區","旗津區","小港區","鳳山區","大寮區","鳥松區","林園區","仁武區","大樹區","大社區","岡山區","路竹區","橋頭區","梓官區","彌陀區","永安區","燕巢區","田寮區","阿蓮區","茄萣區","湖內區","旗山區","美濃區","內門區","杉林區","甲仙區","六龜區","茂林區","桃源區","那瑪夏區"];//高雄

city[6]=["仁愛區","中正區","信義區","中山區","安樂區","暖暖區","七堵區"];//基隆市

city[7]=["東區","北區","香山區"];//新竹市

city[8]=["東區","西區"];//嘉義市

city[9]=["竹北市","竹東鎮","新埔鎮","關西鎮","湖口鄉","新豐鄉","峨眉鄉","寶山鄉","北埔鄉","芎林鄉","橫山鄉","尖石鄉","五峰鄉"];//新竹縣

city[10]=["苗栗市","頭份市","竹南鎮","後龍鎮","通霄鎮","苑裡鎮","卓蘭鎮","造橋鄉","西湖鄉","頭屋鄉","公館鄉","銅鑼鄉","三義鄉","大湖鄉","獅潭鄉","三灣鄉","南庄鄉","泰安鄉"];//苗栗縣

city[11]=["彰化市","員林市","和美鎮","鹿港鎮","溪湖鎮","二林鎮","田中鎮","北斗鎮","花壇鄉","園鄉","大村鄉","永靖鄉","伸港鄉","線西鄉","福興鄉","秀水鄉","埔心鄉","埔鹽鄉","大城鄉","苑鄉","竹塘鄉","社頭鄉","二水鄉","田尾鄉","埤頭鄉","溪州鄉"];//彰化縣

city[12]=["南投市","埔里鎮","草屯鎮","竹山鎮","集集鎮","名間鄉","鹿谷鄉","中寮鄉","魚池鄉","國姓鄉","水里鄉","信義鄉","仁愛鄉"];//南投縣

city[13]=["斗六市","斗南鎮","虎尾鎮","西螺鎮","土庫鎮","北港鎮","林內鄉","古坑鄉","大埤鄉","莿桐鄉","褒忠鄉","二崙鄉","崙背鄉","麥寮鄉","臺西鄉","東勢鄉","元長鄉","四湖鄉","口湖鄉","水林鄉"];//雲林縣
city[14]=["太保市","朴子市","布袋鎮","大林鎮","民雄鄉","溪口鄉","新港鄉","六腳鄉","東石鄉","義竹鄉","鹿草鄉","水上鄉","中埔鄉","竹崎鄉","梅山鄉","番路鄉","大埔鄉","阿里山鄉"];//嘉義縣

city[15]=["屏東市","潮州鎮","東港鎮","恆春鎮","萬丹鄉","長治鄉","麟洛鄉","九如鄉","里港鄉","鹽埔鄉","高樹鄉","萬巒鄉","內埔鄉","竹田鄉","新埤鄉","枋寮鄉","新園鄉","崁頂鄉","林邊鄉","南州鄉","佳冬鄉","琉球鄉","車城鄉","滿州鄉","枋山鄉","霧臺鄉","瑪家鄉","泰武鄉","來義鄉","春日鄉","獅子鄉","牡丹鄉","三地門鄉"];//屏東縣
city[16]=["宜蘭市","頭城鎮","羅東鎮","蘇澳鎮","礁溪鄉","壯圍鄉","員山鄉","冬山鄉","五結鄉","三星鄉","大同鄉","南澳鄉"];//宜蘭縣
city[17]=["花蓮市","鳳林鎮","玉里鎮","新城鄉","吉安鄉","壽豐鄉","光復鄉","豐濱鄉","瑞穗鄉","富里鄉","秀林鄉","萬榮鄉","卓溪鄉"];//花蓮縣
city[18]=["臺東市","成功鎮","關山鎮","長濱鄉","池上鄉","東河鄉","鹿野鄉","卑南鄉","大武鄉","綠島鄉","太麻里鄉","海端鄉","延平鄉","金峰鄉","達仁鄉","蘭嶼鄉"];//臺東縣
city[19]=["馬公市","湖西鄉","白沙鄉","西嶼鄉","望安鄉","七美鄉"];//澎湖縣
city[20]=["金城鎮","金湖鎮","金沙鎮","金寧鄉","烈嶼鄉","烏坵鄉"];//金門縣
city[21]=["南竿鄉","北竿鄉","莒光鄉","東引鄉"];//連江縣	

function resetSelect(index){
	for(var i=0;i<city[index].length;i++){
		document.registerupload.area.options[i]=new Option(city[index][i], city[index][i]);	// 設定新選項
	}
	document.registerupload.area.length=city[index].length;	// 刪除多餘的選項
}
</script>