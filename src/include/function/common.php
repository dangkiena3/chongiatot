<?php



/* import other */



import('configure');



import('current');



import('utility');



import('mailer');



import('sms');



import('upgrade');



import('uc');



import('cron');







function template($tFile) {



	global $INI;



	if ( 0===strpos($tFile, 'manage') ) {



		return __template('admin/'.$tFile);



	}



	if ($INI['skin']['template']) {



		$templatedir = DIR_TEMPLATE. '/' . $INI['skin']['template'] . '/html';



		$checkfile = $templatedir . '/html_header.html';



		if ( file_exists($checkfile) ) {



			return __template($INI['skin']['template'].'/html/'.$tFile);



		}



	}



	return __template($tFile);



}



function render($tFile, $vs=array()) {



    ob_start();



    foreach($GLOBALS AS $_k=>$_v) {



        ${$_k} = $_v;



    }



	foreach($vs AS $_k=>$_v) {



		${$_k} = $_v;



	}



	include template($tFile);



    return render_hook(ob_get_clean());



}







function render_hook($c) {



	global $INI;



	$c = preg_replace('#href="/#i', 'href="'.WEB_ROOT.'/', $c);



	$c = preg_replace('#src="/#i', 'src="'.WEB_ROOT.'/', $c);



	$c = preg_replace('#action="/#i', 'action="'.WEB_ROOT.'/', $c);







	/* theme */



	$page = strval($_SERVER['REQUEST_URI']);



	if($INI['skin']['theme'] && !preg_match('#/manage/#i',$page)) {



		$themedir = WWW_ROOT. '/static/theme/' . $INI['skin']['theme'];



		$checkfile = $themedir. '/css/index.css';



		if ( file_exists($checkfile) ) {



			$c = preg_replace('#/static/css/#', "/static/theme/{$INI['skin']['theme']}/css/", $c);



			$c = preg_replace('#/static/img/#', "/static/theme/{$INI['skin']['theme']}/img/", $c);



		}



	}



	if (strtolower(cookieget('locale','zh_cn'))=='zh_tw') {



		require_once(DIR_FUNCTION  . '/tradition.php');



		$c = str_replace(explode('|',$_charset_simple), explode('|',$_charset_tradition),$c);



	}



	/* encode id */



	$c = obscure_rep($c);



	return $c;



}







function output_hook($c) {



	global $INI;



	if ( 0==abs(intval($INI['system']['gzip'])))  die($c);



	$HTTP_ACCEPT_ENCODING = $_SERVER["HTTP_ACCEPT_ENCODING"]; 



	if( strpos($HTTP_ACCEPT_ENCODING, 'x-gzip') !== false ) 



		$encoding = 'x-gzip'; 



	else if( strpos($HTTP_ACCEPT_ENCODING,'gzip') !== false ) 



		$encoding = 'gzip'; 



	else $encoding == false;



	if (function_exists('gzencode')&&$encoding) {



		$c = gzencode($c);



		header("Content-Encoding: {$encoding}"); 



	}



	$length = strlen($c);



	header("Content-Length: {$length}");



	die($c);



}







$lang_properties = array();



function I($key) { 



    global $lang_properties, $LC;



    if (!$lang_properties) {



        $ini = DIR_ROOT . '/i18n/' . $LC. '/properties.ini';



        $lang_properties = Config::Instance($ini);



    }



    return isset($lang_properties[$key]) ?



        $lang_properties[$key] : $key;



}







function json($data, $type='eval') {



    $type = strtolower($type);



    $allow = array('eval','alert','updater','dialog','mix', 'refresh');



    if (false==in_array($type, $allow))



        return false;



    Output::Json(array( 'data' => $data, 'type' => $type,));



}







function redirect($url=null, $notice=null, $error=null) {



	$url = $url ? obscure_rep($url) : $_SERVER['HTTP_REFERER'];



	$url = $url ? $url : '/';



	if ($notice) Session::Set('notice', $notice);



	if ($error) Session::Set('error', $error);



    header("Location: {$url}");



    exit;



}



function write_php_file($array, $filename=null){



	$v = "<?php\r\n\$INI = ";



	$v .= var_export($array, true);



	$v .=";\r\n?>";



	return file_put_contents($filename, $v);



}







function write_ini_file($array, $filename=null){   



	$ok = null;   



	if ($filename) {



		$s =  ";;;;;;;;;;;;;;;;;;\r\n";



		$s .= ";; SYS_INIFILE\r\n";



		$s .= ";;;;;;;;;;;;;;;;;;\r\n";



	}



	foreach($array as $k=>$v) {   



		if(is_array($v))   { 



			if($k != $ok) {   



				$s  .=  "\r\n[{$k}]\r\n";



				$ok = $k;   



			} 



			$s .= write_ini_file($v);



		}else   {   



			if(trim($v) != $v || strstr($v,"["))



				$v = "\"{$v}\"";   



			$s .=  "$k = \"{$v}\"\r\n";



		} 



	}







	if(!$filename) return $s;   



	return file_put_contents($filename, $s);



}   







function save_config($type='ini') {



	return configure_save();



	global $INI; $q = ZSystem::GetSaveINI($INI);



	if ( strtoupper($type) == 'INI' ) {



		if (!is_writeable(SYS_INIFILE)) return false;



		return write_ini_file($q, SYS_INIFILE);



	} 



	if ( strtoupper($type) == 'PHP' ) {



		if (!is_writeable(SYS_PHPFILE)) return false;



		return write_php_file($q, SYS_PHPFILE);



	} 



	return false;



}







function save_system($ini) {



	$system = Table::Fetch('system', 1);



	$ini = ZSystem::GetUnsetINI($ini);



	$value = Utility::ExtraEncode($ini);



	$table = new Table('system', array('value'=>$value));



	if ( $system ) $table->SetPK('id', 1);



	return $table->update(array( 'value'));



}







/* user relative */



function need_login($wap=false) {



	if ( isset($_SESSION['user_id']) ) {



		if (is_post()) {



			unset($_SESSION['loginpage']);



			unset($_SESSION['loginpagepost']);



		}



		return $_SESSION['user_id'];



	}



	if ( is_get() ) {



		Session::Set('loginpage', $_SERVER['REQUEST_URI']);



	} else {



		Session::Set('loginpage', $_SERVER['HTTP_REFERER']);



		Session::Set('loginpagepost', json_encode($_POST));



	}



	if (true===$wap) {



		return redirect(WEB_ROOT . '/wap/login.php');	



	}



	return redirect(WEB_ROOT . '/user/dang-nhap.html');	



}



function check_login(){



	if ( isset($_SESSION['user_id']) ) {



		if (is_post()) {



			unset($_SESSION['loginpage']);



			unset($_SESSION['loginpagepost']);



		}



		return $_SESSION['user_id'];



	}



	if ( is_get() ) {



		Session::Set('loginpage', $_SERVER['REQUEST_URI']);



	} else {



		Session::Set('loginpage', $_SERVER['HTTP_REFERER']);



		Session::Set('loginpagepost', json_encode($_POST));



	}



	return redirect(WEB_ROOT . '/');	



}



function need_post() {



	return is_post() ? true : redirect(WEB_ROOT . '/index.php');



}



function need_manager($super=false) {



	if ( ! is_manager() ) {



		redirect( WEB_ROOT . '/manage/login.php' );



	}



	if ( ! $super ) return true;



	if ( abs(intval($_SESSION['user_id'])) == 1||abs(intval($_SESSION['user_id'])) == 2 ) return true;



	return redirect( WEB_ROOT . '/manage/misc/index.php');



}



function need_license(){



	if(($_SERVER['SERVER_NAME']=="demo.thietkewebdeal.com")||($_SERVER['SERVER_NAME']=="www.demo.thietkewebdeal.com")){}



	else{



		//redirect('http://www.demo.thietkewebdeal.com');



	}



}







function need_partner() {



	return is_partner() ? true : redirect( WEB_ROOT . '/biz/login.php');



}







function need_open($b=true) {



	if (true===$b) {



		return true;



	}



	if ($AJAX) json('Feature is not open', 'alert');



	Session::Set('error', 'Features page that you visit is Do not open');



	redirect( WEB_ROOT . '/index.php');



}







function need_auth($b=true) {



	global $AJAX, $INI, $login_user;



	if (is_string($b)) {



		$auths = $INI['authorization'][$login_user['id']];



		$b = is_manager(true)||in_array($b, $auths);



	}



	if (true===$b) {



		return true;



	}



	if ($AJAX) json('æ— æ�ƒæ“�ä½œ', 'alert');



	die(include template('manage_misc_noright'));



}







function is_manager($super=false, $weak=false) {



	global $login_user;



	if ( $weak===false && 



			( !$_SESSION['admin_id'] 



			  || $_SESSION['admin_id'] != $login_user['id']) ) {



		return false;



	}



	if ( ! $super ) return ($login_user['manager'] == 'Y');



	return $login_user['id'] == 1;



}



function is_partner() {



	return ($_SESSION['partner_id']>0);



}







function is_newbie(){ return (cookieget('newbie')!='N'); }



function is_get() { return ! is_post(); }



function is_post() {



	return strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';



}







function is_login() {



	return isset($_SESSION['user_id']);



}







function get_loginpage($default=null) {



	$loginpage = Session::Get('loginpage', true);



	if ($loginpage)  return $loginpage;



	if ($default) return $default;



	return WEB_ROOT . '/index.php';



}







function cookie_city($city) {



	global $hotcities;



	if($city) { 



		cookieset('city', $city['id']);



		return $city;



	} 



	$city_id = cookieget('city'); 



	$city = Table::Fetch('category', $city_id);



	if (!$city) $city = get_city();



	if (!$city) $city = array_shift($hotcities);



	if ($city) return cookie_city($city);



	return $city;



}







function ename_city($ename=null) {



	return DB::LimitQuery('category', array(



		'condition' => array(



			'zone' => 'city',



			'ename' => $ename,



		),



		'one' => true,



	));



}







function cookieset($k, $v, $expire=0) {



	$pre = substr(md5($_SERVER['HTTP_HOST']),0,4);



	$k = "{$pre}_{$k}";



	if ($expire==0) {



		$expire = time() + 365 * 86400;



	} else {



		$expire += time();



	}



	setCookie($k, $v, $expire, '/');



}







function cookieget($k, $default='') {



	$pre = substr(md5($_SERVER['HTTP_HOST']),0,4);



	$k = "{$pre}_{$k}";



	return isset($_COOKIE[$k]) ? strval($_COOKIE[$k]) : $default;



}







function moneyit($k) {



	return rtrim(rtrim(sprintf('%.2f',$k), '0'), '.');



}



function formatMoney($number, $fractional=true) {



    if ($fractional) {



        $number = sprintf('%.0f', $number);



    }



    while (true) {



        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);



        if ($replaced != $number) {



            $number = $replaced;



        } else {



            break;



        }



    }



    return $number;



} 



function debug($v, $e=false) {



	global $login_user_id;



	if ($login_user_id==100000) {



		echo "<pre>";



		var_dump( $v);



		if($e) exit;



	}



}







function getparam($index=0, $default=0) {



	if (is_numeric($default)) {



		$v = abs(intval($_GET['param'][$index]));



	} else $v = strval($_GET['param'][$index]);



	return $v ? $v : $default;



}



function getpage() {
	if($_REQUEST['gid'])
	$c=end(explode("page=", $_SERVER['REQUEST_URI']));
	else
	$c = abs(intval($_GET['page']));
	return $c ? $c : 1;
}


function pagestring($count, $pagesize, $wap=false) {



	$p = new Pager($count, $pagesize, 'page');



	if ($wap) {



		return array($pagesize, $p->offset, $p->genWap());



	}



	return array($pagesize, $p->offset, $p->genBasic());



}







function uencode($u) {



	return base64_encode(urlEncode($u));



}



function udecode($u) {



	return urlDecode(base64_decode($u));



}



function share_facebook($team) {



	global $login_user_id;



	global $INI;



	if ($team)  {



		$query = array(



				'u' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",



				't' => $team['title'],



				);



	}



	else {



		$query = array(



				'u' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",



				't' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',



				);



	}







	$query = http_build_query($query);



	return 'http://www.facebook.com/sharer.php?'.$query;



}







/* twitter @Harry */



function share_twitter($team) {



	global $login_user_id;



	global $INI;



	if ($team)  {



		$query = array(



				'status' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}" . ' ' . $team['title'],



				);



	}



	else {



		$query = array(



				'status' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}" . ' ' . $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',



				);



	}







	$query = http_build_query($query);



	return 'http://twitter.com/?'.$query;



}







/* share link */



function share_renren($team) {



	global $login_user_id;



	global $INI;



	if ($team)  {



		$query = array(



				'link' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",



				'title' => $team['title'],



				);



	}



	else {



		$query = array(



				'link' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",



				'title' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',



				);



	}







	$query = http_build_query($query);



	return 'http://share.renren.com/share/buttonshare.do?'.$query;



}







function share_kaixin($team) {



	global $login_user_id;



	global $INI;



	if ($team)  {



		$query = array(



				'rurl' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",



				'rtitle' => $team['title'],



				'rcontent' => strip_tags($team['summary']),



				);



	}



	else {



		$query = array(



				'rurl' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",



				'rtitle' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',



				'rcontent' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',



				);



	}



	$query = http_build_query($query);



	return 'http://www.kaixin001.com/repaste/share.php?'.$query;



}







function share_douban($team) {



	global $login_user_id;



	global $INI;



	if ($team)  {



		$query = array(



				'url' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",



				'title' => $team['title'],



				);



	}



	else {



		$query = array(



				'url' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",



				'title' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',



				);



	}



	$query = http_build_query($query);



	return 'http://www.douban.com/recommend/?'.$query;



}







function share_sina($team) {



	global $login_user_id;



	global $INI;



	if ($team)  {



		$query = array(



				'url' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",



				'title' => $team['title'],



				);



	}



	else {



		$query = array(



				'url' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",



				'title' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',



				);



	}



	$query = http_build_query($query);



	return 'http://v.t.sina.com.cn/share/share.php?'.$query;



}







function share_mail($team) {



	global $login_user_id;



	global $INI;



	if (!$team) {



		$team = array(



				'title' => $INI['system']['sitename'] . '(' . $INI['system']['wwwprefix'] . ')',



				);



	}



	$pre[] = "Found a good site--{$INI['system']['sitename']}ï¼ŒEvery day is a New deal!";



	if ( $team['id'] ) {



		$pre[] = "Customers today are:{$team['title']}";



		$pre[] = "I think you will be interested in:";



		$pre[] = $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}";



		$pre = mb_convert_encoding(join("\n\n", $pre), 'GBK', 'UTF-8');



		$sub = "You are interested inï¼š{$team['title']}";



	} else {



		$sub = $pre[] = $team['title'];



	}



	$sub = mb_convert_encoding($sub, 'GBK', 'UTF-8');



	$query = array( 'subject' => $sub, 'body' => $pre, );



	$query = http_build_query($query);



	return 'mailto:?'.$query;



}







function domainit($url) {



	if(strpos($url,'//')) { preg_match('#[//]([^/]+)#', $url, $m);



} else { preg_match('#[//]?([^/]+)#', $url, $m); }



return $m[1];



}







// that the recursive feature on mkdir() is broken with PHP 5.0.4 for



function RecursiveMkdir($path) {



	if (!file_exists($path)) {



		RecursiveMkdir(dirname($path));



		@mkdir($path, 0777);

	

	}



}







function upload_image($input, $image=null, $type='team', $scale=false) {



	$year = date('Y'); $day = date('md'); $n = time()."_".$_FILES[$input]['name'];

	$mrnhan108 = $year.'/'.$day;
//	$mrnhan108 = $year.'/dealsaigon';

	$z = $_FILES[$input];



	if ($z && strpos($z['type'], 'image')===0 && $z['error']==0) {



		if (!$image) { 



			RecursiveMkdir( IMG_ROOT . '/' . "{$type}/{$mrnhan108}" );



			$image = "{$type}/{$mrnhan108}/{$n}";



			$path = IMG_ROOT . '/' . $image;



		} else {



			RecursiveMkdir( dirname(IMG_ROOT .'/' .$image) );



			$path = IMG_ROOT . '/' .$image;



		}



		if ($type=='user') {



			Image::Convert($z['tmp_name'], $path, 60, 60, Image::MODE_CUT);



		}



		else if ($type=='bank'){



			Image::Convert($z['tmp_name'], $path, 120, 50, Image::MODE_CUT);



		}



		else if ($type=='cate'){



			move_uploaded_file($z['tmp_name'], $path);



		}



		else if($type=='team') {



			move_uploaded_file($z['tmp_name'], $path);



		}



		else if($type=='adsense') {



			move_uploaded_file($z['tmp_name'], $path);



		}



		else if($type=='news') {



			move_uploaded_file($z['tmp_name'], $path);



		}



		else if($type=='slider') {



			move_uploaded_file($z['tmp_name'], $path);



		}



		if($type=='team' && $scale) {



			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_index.\\2", $path); 



			Image::Convert($path, $npath, 200, 120, Image::MODE_CUT);



		}



		return $image;



	} 



	return $image;



}







function user_image($image=null) {



	global $INI;



	if (!$image) { 



		return $INI['system']['imgprefix'] . '/static/img/user-no-avatar.gif';



	}



	return $INI['system']['imgprefix'] . '/static/' .$image;



}





function slide_image($image=null, $index=false) {
	global $INI;
	if (!$image) return null;
	if ($index) {
		$path = WWW_ROOT . '/static/' . $image;
		$image = preg_replace('#(\d+)\.(\w+)$#', "\\1_thietketrangchu.\\2", $image); 
		$dest = WWW_ROOT . '/static/' . $image;
		if (!file_exists($dest) && file_exists($path) ) {
			Image::Convert($path, $dest, 643, 397, Image::MODE_SCALE);
		}
}
	return $INI['system']['imgprefix'] . '/static/' .$image;
}

function team_image($image=null, $index=false) {
	global $INI;
	if (!$image) return null;
	if ($index) {
		$path = WWW_ROOT . '/static/' . $image;
		$image = preg_replace('#(\d+)\.(\w+)$#', "\\1_index.\\2", $image); 
		$dest = WWW_ROOT . '/static/' . $image;
		if (!file_exists($dest) && file_exists($path) ) {
			Image::Convert($path, $dest, 210, 135, Image::MODE_SCALE);
		}
}
	return $INI['system']['imgprefix'] . '/static/' .$image;
}
function team_image_beta($image=null, $index=false) {
	global $INI;
	if (!$image) return null;
	if ($index) {
		$path = WWW_ROOT . '/static/' . $image;
		$image = preg_replace('#(\d+)\.(\w+)$#', "\\1_index.\\2", $image); 
		$dest = WWW_ROOT . '/static/' . $image;
		if (!file_exists($dest) && file_exists($path) ) {
			Image::Convert($path, $dest, 210, 135, Image::MODE_SCALE);
		}
}
	return BETA_NAME . '/static/' .$image;
}







function userreview($content) {



	$line = preg_split("/[\n\r]+/", $content, -1, PREG_SPLIT_NO_EMPTY);



	$r = '<ul>';



	foreach($line AS $one) {



		$c = explode('|', htmlspecialchars($one));



		$c[2] = $c[2] ? $c[2] : '/';



		$r .= "<li>{$c[0]}<span><a href=\"{$c[2]}\" target=\"_blank\">{$c[1]}</a>";



		$r .= ($c[3] ? "ï¼ˆ{$c[3]}":'') . "</span></li>\n";



	}



	return $r.'</ul>';



}







function invite_state($invite) {



	if ('Y' == $invite['pay']) return 'Rebate paid';



	if ('C' == $invite['pay']) return 'Unapproved';



	if ('N' == $invite['pay'] && $invite['buy_time']) return 'Rebate to be paid';



	if (time()-$invite['create_time']>7*86400) return 'Expired';



	return 'Not bought';



}







function team_state(&$team) {



	if ( $team['now_number'] >= $team['min_number'] ) {



		if ($team['max_number']>0) {



			if ( $team['now_number']>=$team['max_number'] ){



				if ($team['close_time']==0) {



					$team['close_time'] = $team['end_time'];



				}



				return $team['state'] = 'soldout';



			}



		}



		if ( $team['end_time'] <= time() ) {



			$team['close_time'] = $team['end_time'];



		}



		return $team['state'] = 'success';



	} else {



		if ( $team['end_time'] <= time() ) {



			$team['close_time'] = $team['end_time'];



			return $team['state'] = 'failure';



		}



	}



	return $team['state'] = 'none';



}







function current_team($city_id=0) {



	$today = strtotime(date('Y-m-d'));



	$cond = array(



			'city_id' => array(0, abs(intval($city_id))),



			'team_type' => 'normal',



			"begin_time <= {$today}",



			"end_time > {$today}",



			);



	$order = 'ORDER BY sort_order DESC, begin_time DESC, id DESC';







	/* normal team */



	$team = DB::LimitQuery('team', array(



				'condition' => $cond,



				'one' => true,



				'order' => $order,



				));



	if ($team) return $team;







	/* seconds team */



	$cond['team_type'] = 'seconds';



	unset($cond['begin_time']);	



	$order = 'ORDER BY sort_order DESC, begin_time ASC, id DESC';



	$team = DB::LimitQuery('team', array(



				'condition' => $cond,



				'one' => true,



				'order' => $order,



				));







	return $team;



}







function state_explain($team, $error='false') {



	$state = team_state($team);



	$state = strtolower($state);



	switch($state) {



		case 'none': return 'Đang mở';



		case 'soldout': return 'Đã bán hết';



		case 'failure': if($error) return 'Thất bại';



		case 'success': return 'Thành công';



		default: return 'Đã kết thúc';



	}



}







function get_zones($zone=null) {



	$zones = array(



			'city' => 'Thành phố',



		//	'group' => 'Deal',



			'news' => 'Tin tức',



		//	'public' => 'Diễn đàn',



		//	'grade' => 'Cấp thành viên',



		//	'express' => 'Giao hàng',



			'partner' => 'Đối tác',



			);



	if ( !$zone ) return $zones;



	if (!in_array($zone, array_keys($zones))) {



		$zone = 'city';



	}



	return array($zone, $zones[$zone]);



}







function get_locals($local=null) {



	$locals = array(



			'province' => 'Tỉnh thành',



			'district' => 'Quận huyện',



			'ward' => 'Phường xã',



			);



	if ( !$local ) return $locals;



	if (!in_array($local, array_keys($locals))) {



		$local = 'Province';



	}



	return array($local, $locals[$local]);



}







function get_types($type=null) {



	$types = array(



		'root' => 'Danh mục cha',



		'child' => 'Danh mục cấp 1',

		

	//	'subchild' => 'Danh mục cấp 2'



	);



	if ( !$type ) return $types;



	if (!in_array($local, array_keys($types))) {



		$type = 'root';



	}



	return array($type, $types[$type]);



}







function down_xls($data, $keynames, $name='dataxls') {



	$xls[] = "<html><meta http-equiv=content-type content=\"text/html; charset=UTF-8\"><body><table border='1'>";



	$xls[] = "<tr><td>ID</td><td>" . implode("</td><td>", array_values($keynames)) . '</td></tr>';



	foreach($data As $o) {



		$line = array(++$index);



		foreach($keynames AS $k=>$v) {



			$line[] = $o[$k];



		}



		$xls[] = '<tr><td>'. implode("</td><td>", $line) . '</td></tr>';



	}



	$xls[] = '</table></body></html>';



	$xls = join("\r\n", $xls);



	header('Content-Disposition: attachment; filename="'.$name.'.xls"');



	die(mb_convert_encoding($xls,'UTF-8','UTF-8'));



}







function option_hotcategory($zone='city', $force=false, $all=false) {



	$cates = option_category($zone, $force, true);



	$r = array();



	foreach($cates AS $id=>$one) {



		if ('Y'==strtoupper($one['display'])) $r[$id] = $one;



	}



	return $all ? $r: Utility::OptionArray($r, 'id', 'name');



}







function option_category($zone='city', $force=false, $all=false) {



	$cache = $force ? 0 : 86400*30;



	$cates = DB::LimitQuery('category', array(



		'condition' => array( 'zone' => $zone, ),



		'order' => 'ORDER BY sort_order DESC, id DESC',



		'cache' => $cache,



	));



	$cates = Utility::AssColumn($cates, 'id');



	return $all ? $cates : Utility::OptionArray($cates, 'id', 'name');



}







function option_yes($n, $default=false) {



	global $INI;



	if (false==isset($INI['option'][$n])) return $default;



	$flag = trim(strval($INI['option'][$n]));



	return abs(intval($flag)) || strtoupper($flag) == 'Y';



}







function option_yesv($n, $default='N') {



	return option_yes($n, $default=='Y') ? 'Y' : 'N';



}







function magic_gpc($string) {



	if(SYS_MAGICGPC) {



		if(is_array($string)) {



			foreach($string as $key => $val) {



				$string[$key] = magic_gpc($val);



			}



		} else {



			$string = stripslashes($string);



		}



	}



	return $string;



}







function team_discount($team, $save=false) {



	if ($team['market_price']<0 || $team['team_price']<0 ) {



		return '?';



	}



	return moneyit((10*$team['team_price']/$team['market_price']));



}







function team_origin($team, $quantity=0) {



	$origin = $quantity * $team['team_price'];



	if ($team['delivery'] == 'express'



			&& ($team['farefree']==0 || $quantity < $team['farefree'])



		) {



			$origin += $team['fare'];



		}



	return $origin;



}







function error_handler($errno, $errstr, $errfile, $errline) {



	switch ($errno) {



		case E_PARSE:



		case E_ERROR:



			echo "<b>Fatal ERROR</b> [$errno] $errstr<br />\n";



			echo "Fatal error on line $errline in file $errfile";



			echo "PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";



			exit(1);



			break;



		default: break;



	}



	return true;



}



/* for obscureid */



function obscure_rep($u) {



	if(!option_yes('encodeid')) return $u;



	if(preg_match('#/manage/#', $_SERVER['REQUEST_URI'])) return $u;



	return preg_replace_callback('#(\?|&)id=(\d+)(\b)#i', obscure_cb, $u);



}



function obscure_did() {



	$gid = strval($_GET['id']);



	if ($gid && strpos($gid, 'WR')===0) {



		$_GET['id'] = base64_decode(substr($gid,2))>>2;



	}



}



function obscure_cb($m) {



	$eid = obscure_eid($m[2]);



	return "{$m[1]}id={$eid}{$m[3]}";



}



function obscure_eid($id) {



	return 'WR'.base64_encode($id<<2);



}



obscure_did();



/* end */







/* for post trim */



function trimarray($o) {



	if (!is_array($o)) return trim($o);



	foreach($o AS $k=>$v) { $o[$k] = trimarray($v); }



	return $o;



}



$_POST = trimarray($_POST);



/* end */



//----- cat chuoi



function cstr($text, $start=0, $limit=12)



    {



        if (function_exists('mb_substr')) {



            $more = (mb_strlen($text) > $limit) ? TRUE : FALSE;



            $text = mb_substr($text, 0, $limit, 'UTF-8');



            return array($text, $more);



        } elseif (function_exists('iconv_substr')) {



            $more = (iconv_strlen($text) > $limit) ? TRUE : FALSE;



            $text = iconv_substr($text, 0, $limit, 'UTF-8');



            return array($text, $more);



        } else {



              preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/",  $text, $ar);   



            if(func_num_args() >= 3) {   



                if (count($ar[0])>$limit) {



                    $more = TRUE;



                    $text = join("",array_slice($ar[0],0,$limit))."..."; 



                }



                $more = TRUE;



                $text = join("",array_slice($ar[0],0,$limit)); 



            } else {



                $more = FALSE;



                $text =  join("",array_slice($ar[0],0)); 



            }



            return array($text, $more);



        } 



}



function sub_str($text, $limit=25)



{



    $val = cstr($text, 0, $limit);



    return $val[1] ? $val[0]."..." : $val[0];



} 







function yahoo_invisible($id) {



	$file = @file("http://opi.yahoo.com/online?u=" . urlencode($id) . "&m=t&t=1");



	if (is_array($file)) {



		return (bool) ($file[0]=="01");



	}



	return null;



}







//Function location







function get_name_local($id=0){
	$name_local = "";
	if($id==0){
		$name_local = "";
	}
	else{
		$locations = Table::Fetch('vncountry', $id);
		$name_local = $locations['name'];
	}
	return $name_local;
}



function get_name_method($id=0){



	$name_method = "";



	if($id==0){



		$name_methods = "";



	}



	else{



		$methods = Table::Fetch('shipping_method', $id);



		$name_method = $methods['name'];



	}



	return $name_method;



}



function get_img_method($id=0){



	$img_method = "";



	if($id==0){



		$img_methods = "";



	}



	else{



		$methods = Table::Fetch('shipping_method', $id);



		$img_method = $methods['linkimg'];



	}



	return $img_method;



}







function get_name_cate($id=0){



	$name_cate = "";



	if($id==0){



		$name_cate = "";



	}



	else{



		$cates = Table::Fetch('cate', $id);



		$name_cate = $cates['name'];



	}



	return $name_cate;



}







function get_name_cates($id=0){







	$cates = Table::Fetch('category', $id);







	$name_cates = $cates['name'];







	return $name_cates;



}

function WeightProduct(){
	$carts = $_SESSION['cart'];
	foreach ($carts as $one)
	{
					$hdOptionValue = $one['deal_info'];
                    $info_id = intval(substr($hdOptionValue,-1));
                    $deal_id = intval(substr($hdOptionValue,0,-1));
                	$teams = Table::Fetch('team', $deal_id);
                    $info = 'infop'.$info_id;
                    $max_quantity = $teams['max_number'] - $teams['now_number'];
                    $quantity = $one['quantity'];
					$wgt_sum = $quantity * $teams['weight'];
                    $weight_total += $wgt_sum;
	}
	return $weight_total;
}

function Gram_km($gr,$km){
	$i = intval($gr);
	if($km > 1) //km2
	$price = array( 1 => '15000',2=>'18000',3=>'25000',4=>'34000',5=>'51000',6=>'65000',7=>'81000',8=>'10500');
	else        //km1
	$price = array( 1 => '0',2=>'16000',3=>'22000',4=>'30000',5=>'42000',6=>'53000',7=>'72000',8=>'5000');
	if ($i <= 50) {
		$price = $price[1];
	} elseif (($i > 50) && ($i <= 100)) {
		$price = $price[2];
	} elseif (($i > 100) && ($i <= 250)) {
		$price = $price[3];
	} elseif (($i > 250) && ($i <= 500)) {
		$price = $price[4];
	} elseif (($i > 500) && ($i <= 1000)) {
		$price = $price[5];
	} elseif (($i > 1000) && ($i <= 1500)) {
		$price = $price[6];
	} elseif (($i > 1500) && ($i <= 2000)) {
		$price = $price[7];
	} elseif ($i > 2000) {
		$tmp = ceil(($i-2000)/500);
		$price = $price[7] + ($price[8]*$tmp);
	}
	return $price;
}

function getVat($team,$districtID){
	$cost = Table::Fetch('vncountry', $districtID);
	$team = Table::Fetch('team', $team);
	$wght = $team['weight'];
	if($cost['parent_id']==15355){
		$vats =  intval($cost['vat']);
	}else{
		$costs = Table::Fetch('vncountry', $cost['parent_id']);
		if($costs['vat']>1){ // >300KM
			$vats = Gram_km($wght,2);
		}else{
			$vats =  Gram_km($wght,1);
		}

	}
	return $vats;
}

function get_pid_local($id=0){







	$locations = Table::Fetch('vncountry', $id);







	$pid_local = $locations['parent'];







	return $pid_local;



}



function get_pid_cate($id=0){







	$cates = Table::Fetch('cate', $id);







	$pid_cate = $cates['pid'];







	return $pid_cate;



}



function get_type_cate($id=0){



	



	$cates = Table::Fetch('cate', $id);







	$type_cate = $cates['type'];







	return $type_cate;



}







//End function location







function convertVN($text = NULL){



	$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",



	"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"



	,"ế","ệ","ể","ễ",



	"ì","í","ị","ỉ","ĩ",



	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"



	,"ờ","ớ","ợ","ở","ỡ",



	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",



	"ỳ","ý","ỵ","ỷ","ỹ",



	"đ",



	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"



	,"Ằ","Ắ","Ặ","Ẳ","Ẵ",



	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",



	"Ì","Í","Ị","Ỉ","Ĩ",



	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"



	,"Ờ","Ớ","Ợ","Ở","Ỡ",



	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",



	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",



	"Đ", " ");







	$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"



	,"a","a","a","a","a","a",



	"e","e","e","e","e","e","e","e","e","e","e",



	"i","i","i","i","i",



	"o","o","o","o","o","o","o","o","o","o","o","o"



	,"o","o","o","o","o",



	"u","u","u","u","u","u","u","u","u","u","u",



	"y","y","y","y","y",



	"d",



	"A","A","A","A","A","A","A","A","A","A","A","A"



	,"A","A","A","A","A",



	"E","E","E","E","E","E","E","E","E","E","E",



	"I","I","I","I","I",



	"O","O","O","O","O","O","O","O","O","O","O","O"



	,"O","O","O","O","O",



	"U","U","U","U","U","U","U","U","U","U","U",



	"Y","Y","Y","Y","Y",



	"D", "-");



	$text = str_replace($marTViet,$marKoDau,$text);



	return $text;



}







function friendly_link($str=''){



	$str = strtolower(convertVN(trim($str)));



	$str = preg_replace('/[^a-z0-9]+/i','-',$str);



	return $str;



}



function count_team_cate($gpid){
	
	global $city;
    $daytime = time();
	$condition = array(
		
		'city_id' => array(0, abs(intval($city['id']))),
		
		'group_pid' => $gpid,
		
		"begin_time <= '$daytime'",

		"end_time > '$daytime'",

	);

	return Table::Count('team', $condition);	

}

function total_team_count(){
	
	global $city;
	
    $daytime = time();

	$condition = array(
		
		'city_id' => array(0, abs(intval($city['id']))),

		"begin_time <= '$daytime'",

		"end_time > '$daytime'",

	);

	return Table::Count('team', $condition);

}





//-------------------------------



//Rewrite



function rewrite_cate($cate_id){



	global $city;



    $city_name = friendly_link($city['ename']);



	$cates = Table::Fetch('category', $cate_id);



	$cate_name = friendly_link($cates['name']);



	$link = '/'.$city_name.'/'.$cate_name.'-'.$cate_id;



	return $link;



}



function rewrite_cate_shop($cate_id){



	$cates = Table::Fetch('cate', $cate_id);



	$cate_name = friendly_link($cates['name']);



	$link = '/'.$cate_name.'.html';



	return $link;



}



function rewrite_cate_recent($cate_id){



	global $city;



    $city_name = friendly_link($city['ename']);



	$cates = Table::Fetch('category', $cate_id);



	$cate_name = friendly_link($cates['name']);



	$link = '/'.$city_name.'/deal-gan-day/'.$cate_name.'-'.$cate_id;



	return $link;



}



function rewrite_team($team_id, $city_id, $pro_name){



	global $city;



	$teamcity = Table::Fetch('category', $teams['city_id']);



    $city = $teamcity ? $teamcity : $city;



    $city = $city ? $city : array('id'=>0, 'name'=>'All');



    $city_name = friendly_link($city['ename']);



    $deal_name = friendly_link($pro_name);



    $link ="/".$city_name."/deal-".$team_id."-".$deal_name.".html"; 



	return $link;



}
function ThietKeTrangChu_SEO($str){
	return friendly_link($str);
}


function rewrite_team_id($team_id){
	global $city,$gid;
	$teams = Table::Fetch('team', $team_id);
	$cats = Table::Fetch('cate', $teams['group_id']);
	$catname = $cats['name'] ? $cats['name'] : 'sản phẩm giá gốc';
    $deal_name = friendly_link($teams['product']);
    $link = $INI['system']['wwwprefix']."/".friendly_link($catname)."/".$deal_name."-".$team_id.".html"; 
	return $link;
}

//check link SEO - only
function check_link($id){
	$lnk = $_SERVER['REQUEST_URI'];
	$lnk = explode(".html",$lnk);
	$lnk = $lnk[0];
	$tmp = rewrite_team_id($id);
	$tmp = explode("/",$tmp);
	$tmp = '/'.$tmp[1].'/'.$tmp[2];
	$tmp = explode(".html",$tmp);
	$tmp = $tmp[0];
	$int = strcmp($lnk,$tmp);
	if($int) return redirect(rewrite_team_id($id));
	else
	return;
	//return $lnk.'IĐ:'.$int.'<br/>'.$tmp;
}

function check_link_news($id){
	$lnk = $_SERVER['REQUEST_URI'];
	$lnk = explode(".html",$lnk);
	$lnk = $lnk[0];
	$tmp = rewrite_news_id($id);
	$tmp = explode(".html",$tmp);
	$tmp = $tmp[0];
	$int = strcmp($lnk,$tmp);
	if($int) return redirect(rewrite_news_id($id));
	else
	return;
}
function rewrite_vmarket_id($vmarket_id){



	$vm = Table::Fetch('vmarket', $vmarket_id);



    $vmarket_name = friendly_link($vm['name']);



    $link ="/Cho-Voucher/Chi-Tiet/".$vmarket_id."/".$vmarket_name; 



	return $link;



}







function rewrite_news_cat($id){
	$newscates = Table::Fetch('category', $id);
	$link = '/tin-tuc/'.friendly_link($newscates['name']).'.html';
	return $link;
}



function rewrite_news_id($news_id){



	$news = Table::Fetch('news', $news_id);



	$newscates = Table::Fetch('category', $news['cate_id']);



	$cates_name = friendly_link($newscates['name']);



	$create_date = date('Y',$news['create_time']);



	$news_title = friendly_link($news['title']);



	$link ="/tin-tuc/".$cates_name."/".$news_title."-".$news['id'].".html";



	return $link;



}











function chk_license_server($file, $domain, $serial){



	$chk = $domain.$serial;



	$chkaccess = false;



	$licenses = file($file);



	foreach($licenses as $ls){



		if($chk == trim($ls)){



			$chkaccess = true;



			break;



		}



	}



	return $chkaccess;



}







function rand_array($a=array(),$s=8){



	for($i = 0; $i < $s; $i++){



  		$str .= $a[rand(0, strlen($a) - 1)];



	}



	return $str;



}



function rand_order_code($cons = 'DEAL', $size_c=8, $size_n=5){



	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";



	$numbers = "0123456789";



	return $cons.rand_array($chars,$size_c).rand_array($numbers,$size_n);



}



//when sate pay



function accept_pay($order_id, $team_id){



	$team = Table::Fetch('team',$team_id);



	$order = Table::Fetch('order',$order_id);



	$user = Table::Fetch('user',$order['user_id']);



	if ($team['now_number']>=$team['min_number'])



		$save_money = $user['money'] + $team['bonus'] + $team['save_money'];



	else 



		$save_money = $user['money'] + $team['bonus'];



	$state = 'pay';



	Table::UpdateCache('order', $order_id, array('state'=>$state,));



	Table::UpdateCache('user', $order['user_id'], array('money'=>$save_money,));



}
////////////MODULE TAG - Creat by MR.NHÂN 0972660089
// ký tực đặc biệt
function un_htmlchars($str) {
	return str_replace(array('&lt;', '&gt;', '&quot;', '&amp;', '&#92;', '&#39','&#039;'), array('<', '>', '"', '&', chr(92), chr(39), chr(39)), $str);
}
function htmlchars($str) {
	return str_replace(
		array('&', '<', '>', '"', chr(92), chr(39)),
		array('&amp;', '&lt;', '&gt;', '&quot;', '&#92;', '&#39'),
		$str
	);
}
// không dấu
function get_ascii($st){
		$vietChar 	= 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ó|ò|ỏ|õ|ọ|ơ|ớ|ờ|ở|ỡ|ợ|ô|ố|ồ|ổ|ỗ|ộ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|í|ì|ỉ|ĩ|ị|ý|ỳ|ỷ|ỹ|ỵ|đ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ó|Ò|Ỏ|Õ|Ọ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Í|Ì|Ỉ|Ĩ|Ị|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Đ';
		$engChar	= 'a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|e|e|e|e|e|e|e|e|e|e|e|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|u|u|u|u|u|u|u|u|u|u|u|i|i|i|i|i|y|y|y|y|y|d|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|E|E|E|E|E|E|E|E|E|E|E|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|U|U|U|U|U|U|U|U|U|U|U|I|I|I|I|I|Y|Y|Y|Y|Y|D';
		$arrVietChar 	= explode("|", $vietChar);
		$arrEngChar		= explode("|", $engChar);
		return str_replace($arrVietChar, $arrEngChar, $st);
	}
function replaceNHANHOA($string) {
	$string = strtolower(get_ascii($string));
    $string = preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
        array('', '-', ''), htmlspecialchars_decode($string));
    return $string;
}
// install tag
function install_tags($code) {
	$code 	= str_replace(",,,,",",",$code);
	$code 	= str_replace(",,,",",",$code);
	$code 	= str_replace(",,",",",$code);
	$tags 	= get_ascii($code);
	return $tags;
}
// tags html
function get_tags($name,$list,$z=0) {
	if($list) {
		 $list = str_replace(",  ",",",$list);
		 $list = str_replace(", ",",",$list);
		 $s = explode(',',$list);
		 if($z == 0)	$cbxz	= "";	
		 foreach($s as $x=>$val) {
			$tname		=	replaceNHANHOA($s[$x]);
			$url_tags	=	$INI['system']['wwwprefix']."/$name/".str_replace("-","+",$tname).".html";
			$html_cat  .=	"<a href=\"".$url_tags."\" title=\"".$s[$x]."\" class=\"nhTag\">".$s[$x]."</a>$cbxz";
		 }
		//  if($z == 0) 
		 // 	$html_cat 		= substr($html_cat,0,-2);
		return $html_cat;
	}else {
		return false;
	}
}


set_error_handler('error_handler');



