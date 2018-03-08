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
			<h2>上傳照片</h2>
		</header>
		<article>
			<div class = "container">
				  <form method="post" name="photoupload" class = "form-horizontal" enctype="multipart/form-data" action = "PramDream_uploadresult.php" onsubmit="return testblank()">
				    <div class = "form-group">
					  <label class = "control-label col-sm-2" for = "file">上傳照片(檔案需大於3MB並且小於6MB):</label>
					  <div class = "col-sm-10">          
						<input type = "file" name="file" id = "file" accept="image/*">
					  </div>
					      <!--圖片預覽區塊-->
					      <div>
        				  	<img class="preview col-sm-4" style="max-width: auto; max-height: auto;">
       				      	<div class="size col-sm-2" id="photosize"></div>
    					  </div>
    					  <!--圖片預覽區塊-->
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "photoname">圖片主題:</label>
					  <div class = "col-sm-10">
						<input type = "text" class = "form-control" id = "photoname" placeholder = "圖片主題" name = "name">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "photodetail">圖片描述:</label>
					  <div class = "col-sm-10">          
						<input type = "text" class = "form-control" id = "photodetail" placeholder = "圖片描述" name = "photodetail">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "photodetail">標籤:</label>
					  <div class = "col-sm-10">          
						<input type = "text" class = "form-control" id = "tag" placeholder = "標籤" name = "tag">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "confirmnum">所屬相簿:</label>
					  <div class = "col-sm-1">
							<select name="YourAlbum">
　								<option value="A">相簿A</option>
　								<option value="B">相簿B</option>
　								<option value="C">相簿C</option>
　								<option value="D">相簿D</option>
							</select>
					  </div>
					</div>
					<div class = "form-group">        
					  <div class = "col-sm-offset-2 col-sm-10">
						<button id="photosubmit" type = "submit" class = "btn btn-default" disabled="true">上傳</button>
					  </div>
					</div>
				  </form>
				</div>
		</article>
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
   	   		if(MB<3){
           		document.getElementById('photosubmit').disabled=true;
           		document.getElementById('photosize').innerHTML="檔案小於3MB!";
   	   		}
   	   		else if(MB>6){
   	   	   		document.getElementById('photosubmit').disabled=true;
   	   	   		document.getElementById('photosize').innerHTML="檔案大於6MB!";
   	   		}
   	   		else{
   	   	   		document.getElementById('photosubmit').disabled=false;
   	   		}
   }

   function testblank(){
		if(photoupload.name.value == "" || photoupload.photodetail.value == ""){
	  		 alert("還有資訊尚未填寫");
       		 return(false);
		}
		return(true);
    }//檢測空白
</script>

<?php

?>