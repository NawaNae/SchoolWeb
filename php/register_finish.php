<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include("mysql_connect.inc.php");
include ('recaptchalib.php');
include ('recaptcha.inc.php');
$id = clean_input($_POST['id']);
$pw = clean_input($_POST['pw']);
$pw2 = clean_input($_POST['pw2']);
$username = clean_input($_POST['username']);
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['g-recaptcha-response'])){

// 建立一個物件
$reCaptcha = new ReCaptcha($secret);

// 將 recaptcha->verify 的值給 resp
$resp = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'],$_POST['g-recaptcha-response']);

	 // 判斷 resp->isSuccess 是 true 或 false
     if($resp->success == true){
 
 if($username!=null &&$id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        $sql = "SELECT * FROM Member_Table where account='$id'";
		 $result=mysql_query($sql);
		if(mysql_num_rows($result)!=0)
			{
			echo "已有相同帳號";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
			}
			else
			{
				 $sql = "SELECT * FROM Member_Table where username='$username'";
				 $result=mysql_query($sql);
				 if(mysql_num_rows($result)!=0){
					 echo "已有人使用這個使用者名稱(暱稱)";
					 echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
				   //新增資料進資料庫語法
				 }
				 else
				 {
      			  $sql = "insert into Member_Table (account, password,username) values ('$id', '$pw','$username')";
     			    if(mysql_query($sql))
    			    {
        				        echo '新增成功!';
     				           echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
   			   		 }
   			 	    else
    			    {
       				        echo '新增失敗!';
     			          echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
    		 	    }
				 }
			}
			
	 
}
else
{
        echo '填寫錯誤!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
}
     }else{

         echo '<p><strong><font color="red">按一下驗證碼，很難?</font></strong></p>';
		 echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
     }
}


?>