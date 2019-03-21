<?php
/*header('Access-Control-Allow-Origin: https://nawanae.github.io');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');*/
header('Access-Control-Allow-Origin: *');

if($_SERVER["REQUEST_METHOD"] == "GET" )
{
	$text=$_GET["Text"];
	if(empty($text))
		$text=$_GET["text"];
	$lang=$_GET["Lang"];
	if(empty($lang))
		$lang=$_GET["Lang"];
}
if($_SERVER["REQUEST_METHOD"] == "POST" )
{
	$text=$_POST["Text"];
	if(empty($text))
		$text=$_POST["text"];
	$lang=$_POST["Lang"];
	if(empty($lang))
		$lang=$_POST["Lang"];
}
function get_web_page( $url, $cookiesIn = '' ){
	$options = array(
		CURLOPT_RETURNTRANSFER => true,     // return web page
		CURLOPT_HEADER         => true,     //return headers in addition to content
		CURLOPT_FOLLOWLOCATION => true,     // follow redirects
		CURLOPT_ENCODING       => "",       // handle all encodings
		CURLOPT_AUTOREFERER    => true,     // set referer on redirect
		CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
		CURLOPT_TIMEOUT        => 120,      // timeout on response
		CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
		CURLINFO_HEADER_OUT    => true,
		CURLOPT_SSL_VERIFYPEER => true,     // Validate SSL Cert
		CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
		CURLOPT_COOKIE         => $cookiesIn
	);
	$ch      = curl_init( $url );
	curl_setopt_array( $ch, $options );
	$rough_content = curl_exec( $ch );
	$err     = curl_errno( $ch );
	$errmsg  = curl_error( $ch );
	$header  = curl_getinfo( $ch );
	curl_close( $ch );
	$header_content = substr($rough_content, 0, $header['header_size']);
	$body_content = trim(str_replace($header_content, '', $rough_content));
	$pattern = "#Set-Cookie:\\s+(?<cookie>[^=]+=[^;]+)#m"; 
	preg_match_all($pattern, $header_content, $matches); 
	$cookiesOut = implode("; ", $matches['cookie']);
	$header['errno']   = $err;
	$header['errmsg']  = $errmsg;
	$header['headers']  = $header_content;
	$header['content'] = $body_content;
	$header['cookies'] = $cookiesOut;
return $body_content;
}
echo get_web_page("http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=32&client=tw-ob&q=".urlencode($text)."&tl=".$lang);
?>