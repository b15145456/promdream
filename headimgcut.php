<!DOCTYPE>
<?php
	include("loginstate.php");
	if(!is_dir('Coserfile/'.$ID)){
		mkdir('Coserfile/'.$ID);
	} 
	move_uploaded_file($_FILES['file']['tmp_name'], 'Coserfile/'.$ID.'/tempheadimg.jpg');//修改儲存位置的地方
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charsset=utf-8">
<script src="Jcrop/js/jquery.min.js"></script>
<script src="Jcrop/js/jquery.Jcrop.min.js"></script>
<link rel="stylesheet" href="Jcrop/css/jquery.Jcrop.min.css" rel="external nofollow" type="text/css" />
<style type="text/css">
</style>
<script language="Javascript">
jQuery(function(){
jQuery('#imghead').Jcrop({
aspectRatio: 1,
onSelect: updateCoords, //選中區域時執行對應的回撥函式
onChange: updateCoords, //選擇區域變化時執行對應的回撥函式
},function() {
  jcropApi = this;
  jcropApi.setSelect([100,100,400,400]);
});
});
function updateCoords(c)
{
jQuery('#x').val(c.x); //選中區域左上角橫
jQuery('#y').val(c.y); //選中區域左上角縱座標
jQuery('#w').val(c.w); //選中區域的寬度
jQuery('#h').val(c.h); //選中區域的高度
};
function checkCoords()
{
if (parseInt(jQuery('#w').val())>0) return true;
alert('請選擇需要裁切的圖片區域.');
return false;
};


</script>
</head>
<body>
<div style="margin-left:200px;">
	<img id="imghead" border=0 src= <?php echo'Coserfile/'.$ID.'/tempheadimg.jpg';?> width="500px" height="auto"/>
</div>	
<form action="crop.php" method="post" onsubmit="return checkCoords();" style="display:inline-block; margin-left:50vw;position:relative;">
<input type="hidden" id="x" name="x" />
<input type="hidden" id="y" name="y" />
<input type="hidden" id="w" name="w" />
<input type="hidden" id="h" name="h" />
<input style="width:100px; height:50px;" type="submit" value="確認裁切">
</form>


</body>
</html>

