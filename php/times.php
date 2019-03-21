<?php
error_reporting(0);
$times_file=fopen("txt/times.txt","r");
$times=fread($times_file,filesize("txt/times.txt"));
fclose($times_file);
if (isset($_COOKIE["Login_times"]))
        {
            setcookie("Login_times",$_COOKIE["Login_times"]+1,time() + 86400*730) ;
}
else
        {
            if ($times==NULL)
            {
                $times=1;
            }
            else
            {
                $times++;
            }
            $times_file=fopen("txt/times.txt","w");
            fwrite($times_file,$times);
            fclose($times_file );
            setcookie("Login_times","1",time()+ 86400*730) ;
       }
echo  $times ;
error_reporting(E_ERROR | E_WARNING);
?>