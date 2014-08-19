<?php
define('GTPHP_PATH', 'front');
define('DIR_SEP', DIRECTORY_SEPARATOR); 
define ('__ROOT__', dirname(__FILE__) . DIR_SEP);				// 网站根目录
define ('__GSYS__', __ROOT__ . 'Gsys' . DIR_SEP);				// 系统目录
include(__GSYS__ . 'Gsystem.php');