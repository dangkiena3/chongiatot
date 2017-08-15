<?php
//for rewrite or iis rewrite
if (isset($_SERVER['HTTP_X_ORIGINAL_URL'])) {
	$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_ORIGINAL_URL'];
} else if (isset($_SERVER['HTTP_X_REWRITE_URL'])) {
	$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_REWRITE_URL'];
}

require 'plugin/ckeditor/ckeditor.php';
require 'plugin/ckfinder/ckfinder.php';

error_reporting(E_ALL^E_WARNING^E_NOTICE);
define('SYS_VERSION', '1.0');
define('SYS_SUBVERSION', '1602');
define('SYS_TIMESTART', microtime(true));
define('SYS_REQUEST', isset($_SERVER['REQUEST_URI']));
define('DIR_SEPERATOR', strstr(strtoupper(PHP_OS), 'WIN')?'\\':'/');
define('DIR_ROOT', str_replace('\\','/',dirname(__FILE__)));
define('DIR_LIBARAY', DIR_ROOT . '/library');
define('DIR_CLASSES', DIR_ROOT . '/classes');
define('DIR_COMPILED', DIR_ROOT . '/compiled');
define('DIR_TEMPLATE', DIR_ROOT . '/template');
define('DIR_FUNCTION', DIR_ROOT . '/function');
define('DIR_CONFIGURE', DIR_ROOT . '/configure');
define('SYS_MAGICGPC', get_magic_quotes_gpc());
define('SYS_PHPFILE', DIR_ROOT . '/configure/system.php');
define('REG_PHPFILE', DIR_ROOT . '/configure/register.php');
define('WWW_ROOT', rtrim(dirname(DIR_ROOT),'/'));
define('IMG_ROOT', dirname(DIR_ROOT) . '/static');
define('LICENSE_LOOP','28');
define('DOMAIN_NAME','http://thietketrangchu.com');
define('BETA_NAME','http://dealsaigon.com');

/* encoding */
mb_internal_encoding('UTF-8');
/* end */

/* important function */
function __autoload($class_name) {
	$file_name = trim(str_replace('_','/',$class_name),'/').'.class.php';
	$file_path = DIR_LIBARAY. '/' . $file_name;
	if ( file_exists( $file_path ) ) {
		return require_once( $file_path );
	}
	$file_path = DIR_CLASSES. '/' . $file_name;
	if ( file_exists( $file_path ) ) {
		return require_once( $file_path );
	}
	return false;
}
function getRecord($table,$id,$file){
	$files=Table::Fetch($table, $id);
	return $files[$file];
}
function GetDomain($url)
{
$nowww = ereg_replace('www\.','',$url);
$domain = parse_url($nowww);
if(!empty($domain["host"]))
    {
     return $domain["host"];
     } else
     {
     return $domain["path"];
     }
}
function xacthucKEY(){
	if (!file_exists('./serial.php')) return die();
	else{
		include('./serial.php');
		if(KEY == mahoaKEY()) return true;
		else return die();
	}
}
function mahoaKEY(){
	$_key=strtoupper(md5(md5(GetDomain($_SERVER['HTTP_HOST'])."0972660089")));
	$_key=substr(strtoupper(md5(substr($_key,9))),15);
	$_key=trim(substr($_key,0,3)."-".substr($_key,3,6)."-".strtoupper(substr(md5($_key),8,9))."-".substr($_key,-3));
	return $_key;
}
function import($funcpre) {
	$file_path = DIR_FUNCTION. '/' . $funcpre . '.php';
	if (file_exists($file_path) ) {
		require_once( $file_path );
	}
}
$tracking = array(
			'0'=>'Mới đặt',
			'1'=>'Đã xác nhận',
			'5'=>'Chờ thanh toán',
			'2'=>'Đang giao',
			'3'=>'Đã giao',
			'4'=>'Đã hủy'
			);
function Opt($id,$oid,$mid=0){
	$team = Table::Fetch('team', $id);
	$str ="";
	if($mid) $ptid = "_".$mid; else $ptid ="";
	for($i=1; $i<6; $i++){
	if($team['infop'.$i]!=''){	
		if($oid==$i) $chk = " checked=\"checked\""; else $chk="";
		$str.= '<input type="radio" name="clrOpt'.$ptid.'[]" value="'.$i.'"'.$chk.'/>'.$team['infop'.$i].'&nbsp;&nbsp;&nbsp;';
	}	
	}
	return $str;
}			
/* json */
if (!function_exists('json_encode')){function json_encode($v){$js = new JsonService(); return $js->encode($v);}}
if (!function_exists('json_decode')){function json_decode($v,$t){$js = new JsonService($t?16:0); return $js->decode($v);}}
/* end json */

/* date_zone */
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(function_exists('date_default_timezone_set')) { date_default_timezone_set('Asia/Ho_Chi_Minh'); }
/* end date_zone */

/* import */
import('template');
import('common');

/* ob_handler */
if(SYS_REQUEST){ ob_get_clean(); ob_start(); }
/* end ob */

