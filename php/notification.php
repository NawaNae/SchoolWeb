
<meta charset="UTF-8" />
<?php
echo $_GET["from"];
echo $_GET["to"];
header('Access-Control-Allow-Origin: https://nawanae.github.io');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');
$src_dir =  dirname(dirname(__FILE__))."/pages/notification/";;

$array = Sort_Files_By_Date($src_dir, "descending", "Y-m-d H:i:s");

$info = $array[0];

$sort_type = $array[1];
/*


echo "目錄：".$src_dir."<br>";

echo "排序by：檔案最後修改日 (".$sort_type.")<br />";*/
$i=0;
foreach($info as $key => $detail)
{
	if($_GET["from"]!=null)
		if($_GET["from"]>$i)
			continue;
	if($_GET["to"]!=null)
		if($_GET["to"]<$i)
			break;

	date_default_timezone_set('Asia/Taipei');
	echo "<a class'notification' href='".$src_dir.$detail['file']."'>".$detail['file']."</a><span class='lastChangeTime'>".$detail['date']."</span><br>";

	//echo "最後修改日：".$detail['date']."---";



	$time_passed = '';

	$i++;
}



function Sort_Files_By_Date($dir, $sort_type, $date_format)

{

	$files = scandir($dir);

	$array = array();

	foreach($files as $file)

	{

		if($file != '.' && $file != '..')

		{

			$now = time();

			$last_modified = filemtime($dir.$file);

			$time_passed_array = array();

			$diff = $now - $last_modified;

			$days = floor($diff / (3600 * 24));

			if($days)

			{

				$time_passed_array['days'] = $days;

			}

			$diff = $diff - ($days * 3600 * 24);

			$hours = floor($diff / 3600);

			if($hours)

			{

				$time_passed_array['hours'] = $hours;

			}

			$diff = $diff - (3600 * $hours);

			$minutes = floor($diff / 60);

			if($minutes)

			{

				$time_passed_array['minutes'] = $minutes;

			}

			$seconds = $diff - ($minutes * 60);

			$time_passed_array['seconds'] = $seconds;

			$array[] = array('file'=> $file,

'timestamp'=> $last_modified,

'date'=> date ($date_format, $last_modified),

'time_passed'=> $time_passed_array,

'size'=> filesize($dir.$file));

		}

	}

	usort($array, create_function('$a, $b', 'return strcmp($a["timestamp"], $b["timestamp"]);'));

	if($sort_type == 'descending')

	{

		krsort($array);

	}

	return array($array, $sort_type);

}


?>