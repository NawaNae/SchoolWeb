<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
        <!--
		@import url(../css/input.css);
        -->
    </style>
      <script src="../js/cookie.js"></script>
    <script>var backhref=getCookie("href");</script>
<?php
//include("mysql_connect.inc.php");
echo'<input name="logout" type="button" onClick="location.href=\'logout.php\'" value="登出" />';
//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['account'] != null)
{
		$id = $_SESSION['account'];
        //若以下$id直接用$_SESSION['account']將無法使用
        //$sql = "SELECT * FROM Member_Table where account='$id'";
       // $result = mysql_query($sql);
     //   $row = mysql_fetch_row($result); 
		if($id=="ltue2129")
		{
		//if($row[4]>=1){
			//echo '<input name="modify" type="button" onClick="location.href=\'update.php\'" value="尋找公會" />';
			//echo '<input name="modify" type="button" onClick="location.href=\'update.php\'" value="創立公會" />';
			//if($row[4]>=900)
			echo '<input name="creatpage" type="button" onClick="location.href=\'edit.php\'" value="創建頁面" />';
			echo '<input name="editpage" type="button" onClick="var page = prompt(\'輸入要載入的頁面\');if(page!=null){location.href=\'edit.php?LoadPath=\'+page;}" value="編輯頁面" />';
			
		}
		
      //  echo '<input name="modify" type="button" onClick="location.href=\'update.php\'" value="修改" />';
       // echo '<input name="delete" type="button" onClick="location.href=\'delete.php\'" value="刪除帳號" />';
        echo '<input type="button" name="cancel" value="回我來的地方" onclick="location.href=backhref;" />';
        //將資料庫裡的所有會員資料顯示在畫面上
       echo '<br>歡迎 : 繩繩大人';
    
       // echo "<br>歡迎：".$row[3]."(".$row[1].")" ;
	  //  echo "  使用者階級：".$row[4]."<br>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>