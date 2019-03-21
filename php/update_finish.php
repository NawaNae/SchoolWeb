<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$pw = clean_input( $_POST['pw']);
$pw2 =  clean_input($_POST['pw2']);
$username= clean_input($_POST['username']);
echo "username ". $username . "<br>account ". $id ;
//紅色字體為判斷密碼是否填寫正確
if($_SESSION['account'] != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        $id = $_SESSION['account'];
        echo $id."<br>";
        //更新資料庫資料語法
      $sql = "SELECT * FROM Member_Table where username='$username'";
		$result=mysql_query($sql);
		 if(mysql_num_rows($result)!=0){
			 echo "已有人使用這個使用者名稱(暱稱)";
			 echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';}
			 else
			 {
				 $sql = "update Member_Table set password='$pw',username='$username' where account='$id'";
				if(mysql_query($sql))
      			  {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
   		    	   }
   		  	   else
    		    {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
    	    }
	 }
}
else
{
        echo '尚未登入!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>