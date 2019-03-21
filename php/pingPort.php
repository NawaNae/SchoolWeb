<head>
	<meta charset="UTF-8" />

</head>
<span style="color:black">
	<?php

function pingDomain($domain,$port){
    $starttime = microtime(true);
	// Turn off all error reporting
	error_reporting(0);
    $file=fsockopen ($domain, $port, $errno, $errstr, 10);

    $stoptime  = microtime(true);
    $status    = 0;
	error_reporting(E_ERROR | E_WARNING);
    if (!$file) $status = -1;  // Site is down
    else {
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}
$_POST['ip']="114.35.249.195";//測試用
if(isset($_POST['ip']))
	$serverIP=$_POST['ip'];
else
	$serverIP="127.0.0.1";
if(isset($_POST['port']))
	$port=$_POST['port'];
else
	$port="25565";
if(($ping=pingDomain($serverIP,$port))==-1)
	echo "Minecraft Server $serverIP\t <span style='color:red'>X</span>";
else
{
	echo "Minecraft Server $serverIP\t <span style='color:green'>";
	$pingMaxTime=500;
	if($ping>$pingMaxTime)
		echo"</span><span style='color:gray'>▁▂▃▅▇</span>";
	else
	{
		$green=round(($pingMaxTime-$ping)/($pingMaxTime/5));
		$i=0;
		$signal=array("▁","▂","▃","▅","▇");
		for(;$i<$green;$i++)
			echo $signal[$i];
		echo "</span><span style='color:gray'>";
		for(;$i<5;$i++)
			echo $signal[$i];
		echo "</span>\t$ping ms";
	}
	echo'<br>';

}
    ?>
</span>