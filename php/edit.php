<?php //session_start();include("mysql_connect.inc.php");?>
<?php session_start();
/*if(($_SESSION['account'] != null ))
{
		$id = $_SESSION['account'];
		$sql = "SELECT * FROM Member_Table where account='$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result); 
	if($row[4]>=900){
		if (isset($_GET[LoadPath]))
		{*/

		if($_SESSION['account'] != "ltue2129") {
			echo '<meta http-equiv=REFRESH CONTENT=2;url=php/login.php>';
		}	$files=fopen('../pages/'.$_GET[LoadPath] ,'r');
			$filecontent=fread($files,filesize('../pages/'.$_GET[LoadPath]));
			fclose($files);
		/*}
	}
	else
	{
		echo '您無權限(>=900)觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
	}

}
else
{
	    echo '您未登入而無權限(>=900)觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}*/
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <form method="post" action="php/SavePage.php">
        <textarea name="editor" id="editor" style="text-align:left;min-height:90%;min-width:100%"><?php echo $filecontent?></textarea>
        <script>
           // CKEDITOR.replace('editor');
        </script>
    <input type="submit" value="Save" style="float:left;width:10% ;height :10%;margin:0 0 0 0;" />
	<input type="button" value="Load" style="float:left;width:10% ;height :10%;margin:0 0 0 0;" onclick="
	$.ajax
        ({
        type: 'POST',
        url: 'pages/' + document.querySelector('#SavePath').value,
        cache: false,
        success: function(response)
            {
                $('#editor').val(response);
            } 
        });" />
		<input style="float:left;height:10%;width:80%;" type="text" id="SavePath" name="SavePath" value="<?php if (isset($_GET[LoadPath])){echo $_GET[LoadPath];} ?>" />
    
        </form>
</body>
</html>
