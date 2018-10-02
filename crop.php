<?php
	include("loginstate.php");	
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$targ_w = $targ_h = 500;
$jpeg_quality = 100;
$src = 'Coserfile/'.$ID.'/tempheadimg.jpg';
$img_r = imagecreatefromjpeg($src);

// 獲取新的尺寸
list($width, $height) = getimagesize($src);
$new_width = 500;
$new_height = $height * (500/$width);

// 重新取樣
$image_p = imagecreatetruecolor($new_width, $new_height);
imagecopyresampled($image_p, $img_r, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
imagecopyresampled($dst_r,$image_p,0,0,$_POST['x'],$_POST['y'],
$targ_w,$targ_h,$_POST['w'],$_POST['h']);
imagejpeg($dst_r,'Coserfile/'.$ID.'/tempheadimgcut.jpg',$jpeg_quality);
//echo "<script>location.href = 'http://localhost/promdream/main-coser.php'</script>";
}
?>

<html>
  <div style="margin-left:10vw; margin-top:5vw; position:relative;display: inline-block;">
  	<div>預覽裁切</div>
  	<div id="minipersonimg" style="position:relative";">
  		<img id="imghead" src='<?php if($headimg!=""){echo 'Coserfile/'.$ID.'/tempheadimgcut.jpg';} else{echo 'Coserfile/'.$ID.'/tempheadimgcut.jpg';}?>' width="200px" height="auto"/>
  	</div>
  </div>
  
  <div style="margin-left:10vw; margin-top:5vw; position:relative;display: inline-block;">
  	<div>先前的大頭照</div>
  	<div id="minipersonimg" style="position:relative";">
  		<img id="imghead" src=<?php if(file_exists('Coserfile/'.$ID.'/headimg.jpg')){echo'Coserfile/'.$ID.'/headimg.jpg';}else{echo'';}?> width="200px" height="auto"/>
  	</div>
  </div>
  <div style="margin-left:22vw; margin-top:5vw;">
  	<button type="button" style="width:100px;height:25px;" onclick="history.back()">返回裁切</button>
  	<button type="button" style="width:100px;height:25px;" onclick="javascript:location.href='imgcutresult.php'">確認使用</button>
  </div>			
</html>
<style>
#minipersonimg{
  overflow:hidden;
  background-repeat:no-repeat;
  background-size:100%;
  margin-left:8px;
  margin-top:10px;
  height:200px;
  width:200px;
  background-color:white;
  border:solid 2px black;
  border-radius:200px;
}
</style>