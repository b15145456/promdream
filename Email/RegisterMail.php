<?php
include("../loginstate.php");
use PHPMailer\PHPMailer\PHPMailer;
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php'; 
function SendMail($Gmail_name){
    global $ID;
    echo $Gmail_name;
    $connection = new PDO('mysql:host=localhost;dbname=promdream;charset=utf8', 'root', '');
    $stmt = $connection->query("select * from coserregister where ID = '$ID';");
    foreach($stmt as $row){
        $password = md5(trim($row['密碼'])); //加密密碼
        $email = $row['信箱']; //郵箱
    }    

    $regtime = time();
    $token = md5($Gmail_name.$password.$regtime); //創建用於驗證識別碼
    
    $token_exptime = time()+60*15;//過期時間為15分鐘後

    $data = [
        'EmailVerifyCode' => $token,
        'EmailVerifyTime' => $token_exptime,
        'ID' => $ID,
    ];
    $sql = "UPDATE `coserregister` SET `信箱驗證碼` = :EmailVerifyCode , `信箱驗證有效期` = :EmailVerifyTime WHERE `ID` = :ID";
    $stmt= $connection->prepare($sql);
    $stmt->execute($data);


    $mail= new PHPMailer();                             //建立新物件
    $mail->SMTPDebug = 2;                        
    $mail->IsSMTP();                                    //設定使用SMTP方式寄信
    $mail->SMTPAuth = true;                        //設定SMTP需要驗證
    $mail->SMTPSecure = "ssl";                    // Gmail的SMTP主機需要使用SSL連線
    $mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機
    $mail->Port = 465;                                 //Gamil的SMTP主機的埠號(Gmail為465)。
    $mail->CharSet = "utf-8";                       //郵件編碼
    $mail->Username = "promdreamOfficialwebsite@gmail.com";       //Gamil帳號
    $mail->Password = "spa20ce18for10coser8";                 //Gmail密碼
    $mail->From = "promdreamOfficialwebsite@gmail.com";        //寄件者信箱
    $mail->FromName = "promdream官方網站";                  //寄件者姓名
    $mail->Subject ="promdream官方網站註冊信"; //郵件標題
    $mail->Body = "親愛的 ".$Gmail_name."，您好：<br /><br />歡迎您註冊promdream請先點擊激活您的帳號，在審核完畢後我們將會寄信通知您!<br /> <a href='http://localhost/promdream/Email/active.php?verify=".$token."' target='_blank'>http://localhost/promdream/Email/active.php?verify=".$token."</a><br/>如果以上連結無法點擊，請將它複製到你的瀏覽器網址欄中進入訪問，該連結15分鐘內有效。"; //郵件內容
    $mail->IsHTML(true);                             //郵件內容為html
    $mail->AddAddress($email);            //收件者郵件及名稱
    $mail->Send();
}
SendMail($username);
echo "<script>location.href = 'http://localhost/promdream/Email/EmailVerifyResult.html'</script>";
?>