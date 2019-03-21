<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if($_SESSION['account'] != null)
{
        echo "<form name=\"form\" method=\"post\" action=\"delete_finish.php\">";
        echo "確定要刪除的帳號： ".$_SESSION['account']."? <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"刪除\" />";
		echo "<input type=\"button\" name=\"button\" value=\"取消\" onclick='location.href=\"member.php\"' />";
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>