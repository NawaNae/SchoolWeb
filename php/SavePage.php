<?php
session_start();
if($_SESSION['account'] == "ltue2129") {
		if(isset($_POST[SavePath]))
		{
      echo '<a href="../#'.substr($_POST[SavePath],strrpos($_POST[SavePath],'.')+1).'='.substr($_POST[SavePath],0,strpos($_POST[SavePath],'.')).'">This</a> is the HyperLink of the page which has been edited by you.<br>';
		echo stripslashes($_POST[editor]);
		$filept = fopen('../pages/'. $_POST[SavePath],'w' ) or die("Unable to connect to this page");
		fwrite($filept,stripslashes($_POST[editor]));
		fclose($filept);
	 echo '<br> save file successfully';

		}
}
else
{
	echo '你沒權限兒';
}


?>
