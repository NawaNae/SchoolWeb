<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
//include("mysql_connect.inc.php");
include ('recaptchalib.php');
include('recaptcha.inc.php');
function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$pw = clean_input($_POST['pw']);
$id= clean_input($_POST['id']);
//搜尋資料庫資料
$sql = "SELECT * FROM Member_Table where account = '$id'";
/*$result = mysql_query($sql);
$row = @mysql_fetch_row($result);
*/
$row[1]="ltue2129";
$row[2]="NawaNawaisME";
//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
/*if(isset($_POST['g-recaptcha-response']))
{
			// 建立一個物件
			$reCaptcha = new ReCaptcha($secret);
			// 將 recaptcha->verify 的值給 resp
			$resp = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'],$_POST['g-recaptcha-response']);
			 // 判斷 resp->isSuccess 是 true 或 false
  		   if($resp->success == true)
		   {*/
					if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)
					{
       					 //將帳號寫入session，方便驗證使用者身份
      					  $_SESSION['account'] = $row[1];
      					  echo '登入成功!';
       					if (isset($COOKIE['href']))
						{
						//echo '<meta http-equiv=REFRESH CONTENT=1;url='.$COOKIE["href"].'>';}
							echo '<meta http-equiv="refresh" content="1" />';
						}
						else
						{
							echo '<meta http-equiv="refresh" content="1" />';
						}
						
				}
				else
				{
        			echo '登入失敗!';
       				
				}
	 
		/*	}
			else
			{
			echo "點一下驗證碼，很難? GOOGLE驗證失敗";
	 		//echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
			}
}*/

		

?>
