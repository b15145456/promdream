<!DOCTYPE>
<?php
	include("loginstate.php");
    rename('Coserfile/'.$ID.'/tempheadimgcut.jpg','Coserfile/'.$ID.'/headimg.jpg');
	if(file_exists('Coserfile/'.$ID.'/tempheadimg.jpg')){
       unlink('Coserfile/'.$ID.'/tempheadimg.jpg');//將檔案刪除
	}
	if(file_exists('Coserfile/'.$ID.'/tempheadimgcut.jpg')){
       unlink('Coserfile/'.$ID.'/tempheadimgcut.jpg');//將檔案刪除
	}
	echo "<script>alert('頭像變更成功'); location.href = 'main-coser.php'</script>";
?>