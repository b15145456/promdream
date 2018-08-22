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
			<h2>發表文章</h2>
		</header>
		<article>
			<div class = "container">
				  <form class = "form-horizontal"  method="post" action = "scenearticleresult.php" name="sceneprovide" enctype="multipart/form-data" onsubmit="return testblank()">
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "name">文章主題</label>
					  <div class = "col-sm-10">
						<input type = "txt" class = "form-control" id = "name" placeholder = "輸入標題" name = "name">
					  </div>
					</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "scenetype">文章類型:</label>
					  <div class = "col-sm-1">          
						<select name="scenetype">
　								<option value="2.5D">2.5D</option>
　								<option value="Cos派對攝影基地">Cos派對攝影基地</option>
                                <option value="橋頭糖廠">橋頭糖廠</option>
						</select>
					  </div>
					</div>

					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "type">文章類型:</label>
					  <div class = "col-sm-1">          
						<select name="type">
　								<option value="閒聊">閒聊</option>
　								<option value="討論">討論</option>
                                <option value="黑特">黑特</option>
						</select>
					  </div>
					</div>
				<div class = "form-group">
					<label class = "control-label col-sm-2" for = "file">照片(最多五張):</label>	
					<div  id= "test" class = "col-sm-10">
					  <div id="preview_article_img"></div>
					  <div id=upimgmain>     
					  	<label class="upload_cover" id="imgla1">
   							<input id="imgid1" class="article_input" type="file" name="files[]" multiple/>
   							<span class="upload_icon">➕</span>
 					  	</label>
 					  </div>	
					</div>
       			    <div class="size col-sm-2" id="photosize"></div>
				</div>
					<div class = "form-group">
					  <label class = "control-label col-sm-2" for = "content">內文</label>
					  <div class = "col-sm-10">
						<input type = "txt" class="form-control" id = "content" placeholder = "輸入內容" name = "content">
						<input type = "hidden" class="form-control" id = "filearray" name = "filearray"><!-- 紀錄那些照片不用上傳 -->
					  </div>
					</div>
					<div class = "form-group">        
					  <div class = "col-sm-offset-2 col-sm-10">
						<button type = "submit" id="provideSubmit" class = "btn btn-default" onclick="finalArrNum()">送出</button>
					  </div>
					</div>
				  </form>
				</div>
		</article>
	</body>
</html>

<script language="JavaScript" type="text/javascript">

   var file_array=[];
   //start of 預覽圖片
   $(function (){
   /**
 	* 格式化
	* @param   num 要轉換的數字
 	* @param   pos 指定小數第幾位做四捨五入
	*/
	var img_num=0;
	var id_count=0;//用來計算laid用
	var file_num=0;
	var nextlaid;
	$('#upimgmain').on('change', '.article_input', function(){
    	readURL(this);
    	var thislaid="imgla"+id_count;
    	var temp=id_count+1;
    	nextlaid="imgla"+temp;

    	$("#"+thislaid).css("display","none");
    	if(file_num<5){
    		$("#upimgmain").append("<label class='upload_cover imgupdiv' id='"+nextlaid+"'><input id='imgid2' class='article_input' type='file' name='files[]' multiple/><span class='upload_icon'>➕</span></label>");
    	}	
  
	});

	$('#preview_article_img').on('click', '.cross', function(){
		var fadiv=document.getElementById(this.id).parentNode;
		removeArr(file_array,fadiv.id.slice(10));
		fadiv.parentNode.removeChild(fadiv);
		if(file_num==5){
    		$("#upimgmain").append("<label class='upload_cover imgupdiv' id='"+nextlaid+"'><input id='imgid2' class='article_input' type='file' name='files[]' multiple/><span class='upload_icon'>➕</span></label>");
    	}
		file_num--;
	});	
		function readURL(input){
  			if (input.files && input.files.length >= 0) {
  				id_count++;//用來計算laid用

  				file_count=input.files.length;//這個選擇器選擇的檔案數
    			if(file_num+file_count>5){
    				alert("選擇的照片數量超過上限");
    			}
    			else{
    				for(var i = 0; i < input.files.length; i++){
    					file_num++;
    					if(file_num>5){
    						file_num=5;
    						break;
    					}
    					var phototype = true;
         				var photoname =  input.files[i].name;
         				var re = /\.(jpg|gif)$/i;  //允許的圖片副檔名
      					var reader = new FileReader();
      					reader.onload = function (e) {
      						var imgstr = "articleimg"+img_num;
      						file_array.push(img_num.toString());
      						img_num++;
      						var div = $("<div id="+imgstr+" style='width:200px; height:220px; overflow:hidden; float:left; display:inline-block; position:relative;'></div>");
      						var cross = $("<img class='cross' id='cross"+imgstr+"' src='background-img/cross.png' width='20' height='20'>")
        					var img = $("<img height='100%'>").attr('src', e.target.result);
        					$("#preview_article_img").append(div);
        					$("#"+imgstr).append(cross);
        					$("#"+imgstr).append(img);
        					var KB = format_float(e.total / 1024, 2);

            				if(!re.test(photoname)){ 
         						phototype=false;
         						document.getElementById('photosize').innerHTML="檔案格式不對!";
         						document.getElementById('photosubmit').disabled=true;
            				}
            				if(phototype==true){
            					testsize(KB);
            				}
     					}
      					reader.readAsDataURL(input.files[i]);
    				}
    			}	
  			}
		}

    function format_float(num, pos)
    {
        var size = Math.pow(10, pos);
        return Math.round(num * size) / size;
    }
    
   })
   //end of 預覽圖片
   function finalArrNum(){
   	   var finalArrayStr="";
       for(var j=0;j<file_array.length;j++){
       	    if(j==file_array.length-1){
      	    	finalArrayStr+=file_array[j];
      	    }
      	    else{
      	    	finalArrayStr+=file_array[j]+",";
      	    }	
        }
        document.getElementById("filearray").value = finalArrayStr;
    }
   
   function testsize(size){
   	   var MB = size/1000;
   	   		if(MB>6){
   	   	   		document.getElementById('provideSubmit').disabled=true;
   	   	   		document.getElementById('photosize').innerHTML="有檔案大於6MB!<br>請上傳較小的檔案";
   	   		}
   	   		else{
   	   	   		document.getElementById('provideSubmit').disabled=false;
   	   		}
   }

   function testblank(){
		if(sceneprovide.name.value == "" || sceneprovide.type.value == "" || sceneprovide.link.value == ""){
	  		 alert("還有資訊尚未填寫");
       		 return(false);
		}
		return(true);
    }//檢測空白
  function removeArr(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
  } 
</script>

<style>
.upload_cover {
position: relative;
float: left;
margin-left: 0vw;
width: 200px;
height: 200px;
text-align: center;
cursor: pointer;
background: #efefef;
border: 1px solid #595656;
}
.article_input {
display: none;
}

#imgid1{
	display: none;
}
#imgid2{
	display: none;
}
#imgid3{
	display: none;
}
#imgid4{
	display: none;
}
#imgid5{
	display: none;
}

.upload_icon {
font-weight: bold;
margin-top: 20%;
font-size: 180%;
position: absolute;
left: 0;
width: 100%;
top: 20%;
}
.cross{
	cursor: pointer;
	position: relative;
	margin-left: 85%;
	z-index:2;
}
.imgupdiv{
	margin-top: 20px;
}

#filearray{
	display: none;
}
</style>    