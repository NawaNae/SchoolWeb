<?php
	function updir($path)
{
	 $path=explode('/',$path);
	$npath=$path[0];
	for($i=1;$i<count($path)-1;$i++)
	{
		$npath.='/'.$path[$i];
	}
	return $npath;
}
$FolderIco='http://icones.gratuites.web.free.fr/data/Folder%20Concept%20Icons/Folder%20Concept%20Icons%2007.ico';
$FileIco='http://www.cc.ntut.edu.tw/~t105590029/Images/file_empty.png';
$UpIco='https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Circle-icons-arrow-up.svg/2000px-Circle-icons-arrow-up.svg.png';
	if($_POST['path']=='')
		{$path='pages';}
	else
		{$path=$_POST['path'];}
if ($handle = opendir('../'.$path)) {  //開啟現在的資料夾
	echo '<div class="pathtext">' .$path.'</div>';
	if($path!=='pages')
	{
		echo "<div class='icon' onclick=' POSTRequestToObjHtml(\"php/menu.php\", \"path=".updir($path)."\", document.querySelector(\".menu>.content\"));'>";
		echo "<img src='$UpIco'/>";
		echo "<div class='text' >上層文件</div><br>";
		echo "</div>\n";
	}
	while (false !== ($file = readdir($handle))) {//避免搜尋到的資料夾名稱是false,像是0
		if ($file != "." && $file != "..") 
		{//去除掉..跟.
			if(is_dir('../'.$path.'/'.$file))
				{
					echo "<div class='icon' onclick=' POSTRequestToObjHtml(\"php/menu.php\", \"path=$path/$file\", document.querySelector(\".menu>.content\"));'>";
					echo "<img src='$FolderIco'/>";
					echo "<div class='text'   >$file</div><br>";
					echo "</div>\n";
				}
			else
				{
					echo "<div class='icon file'  data-hash='main=$path/$file'>";
					echo "<img src='$FileIco'/>";
					echo "<div  class='text'>$file</div><br>";
					echo "</div>\n";
				}            
        }
      }
      closedir($handle);
}

?>
