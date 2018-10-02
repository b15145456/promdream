<div id="personinfo">個人資訊</div>
<div id="personinfodetail">
  <div id='presonframe'>
    <div id="presondetail">
      <div id="minipersonimg"></div>
      <div id="personminiinfo">歡迎! </div>
      <ul><li>個人資料</li><li>文章管理</li><li>每日任務</li><li>登出</li></ul> 
    </div>
   </div>
</div>

<script>
$(document).ready(function(){
    $("#personinfo").click(function(){
        $("#personinfodetail").toggle(
          function(){$("#presonframe").css("height","330px");}
        );
    });
});
</script>

<style type="text/css">
body{
  background-color:white;
}
#personinfo{
  cursor: pointer;
  width:150px;
  height:30px;
  background-color:#2F4858;
  color:white;
  letter-spacing:10px;
  text-align:center;
  padding-top:10px;
  padding-bottom:10px;
  font-size:20px
}

#personinfo:hover{
  color:black;
  background-color:white;
  border:solid 1px black;
  font-weight:bold;
  border-bottom:thick solid #7FB2F0;
}

#persondetail{
  margin-top:-35px;
  margin-left:-40px;
  position:relative;
}


#personinfodetail li{
  padding-top:10px;
  margin-left:-30px;
  width:110px;
  height:40px;
  color:#2F4858;
  letter-spacing:5px;
  text-align:left;
  font-size:20px;
  font-weight:bold;
  cursor: pointer;
}

#personinfodetail li:hover{
  color:black;
  background-color:white;
  border-bottom:solid 1px black;
}

li{
  list-style-type:none;
  margin-top:10px;
}
#presonframe{
 margin-top:20px; 
 margin-left:10px;
 width:250px;
 border:solid 2px black;
 border-radius:10px;
 padding-bottom:20px;
}

#personinfodetail{
  display:none;
}

#minipersonimg{
  cursor:pointer;
  background-image:url('http://i.imgur.com/oFAcVQ5.png');
  background-repeat:no-repeat;
  background-size:100%;
  margin-left:8px;
  margin-top:10px;
  height:80px;
  width:80px;
  background-color:white;
  border:solid 2px black;
  border-radius:80px;
}

#personminiinfo{
  margin-top:-60px;
  margin-left:110px;
  font-family:微軟正黑體;
  font-size:20px;
  position:absolute;
} 
</style>