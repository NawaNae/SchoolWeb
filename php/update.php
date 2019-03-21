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
include("mysql_connect.inc.php");

if($_SESSION['account'] != null)
{
        //將$_SESSION['account']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['account'];
        //若以下$id直接用$_SESSION['account']將無法使用
        $sql = "SELECT * FROM Member_Table where account='$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
    
        echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
        echo "使用者名稱(暱稱)：<input type=\"text\" name=\"username\" value=\"$row[3]\" /> ";
	    echo "  使用者階級：".$row[4]."<br>";
		echo "帳號：".$row[1]."<br>";
		echo "密碼：<input type=\"password\" name=\"pw\" value=\"\" /> <br>";
        echo "再一次輸入密碼：<input type=\"password\" name=\"pw2\" value=\"\" /> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
		echo '<input type="button" name="cancel" value="取消" onclick="location.href=backhref;" />';
        echo "</form>";
}
else
{
        echo '尚未登入!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>