<?php   
require_once(dirname(__FILE__) . '/app.php');
if(!$INI['db']['host']) redirect( WEB_ROOT . '/install.php' ); 
//Check license
//need_license();
require_once(dirname(__FILE__) . '/twitteroauth/twitteroauth.php');
require_once(dirname(__FILE__) . '/tw_connect/config.php');		

$access_token = $_SESSION['access_token'];		
if(!$_SESSION['user_id']) 
{ 
		if($access_token!='')
		{
				$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
				 $Tlogin_user = ZUser::GetUserByTwitter_Id($_SESSION['access_token']['user_id']);
				if(!$Tlogin_user)
				{
						  $username = preg_replace("/[^a-z0-9]/i","",strtolower($_SESSION['access_token']['screen_name']));
						  $t['username'] = $username;
						  $t['realname'] = $username;
						  $t['password'] = "tw".rand(1000,2000);
						  $t['twitter_userid'] = $_SESSION['access_token']['user_id'];
						  $_SESSION['TWITTER_USER_LOGIN'] = $t;
						  Utility::Redirect( WEB_ROOT . '/account/signup_twitteremail.php');
				} 
				else 
				{
						Session::Set('user_id', $Tlogin_user['id']);
						ZLogin::Remember($login_user);
						($goto = Session::Get('loginpage', true)) || ($goto = WEB_ROOT.'/index.php');
						Utility::Redirect($goto);
				}
		}
}
	
$request_uri = 'index';
$team = current_team($city['id']);
	if($request_uri == 'index')
	die(require_once( dirname(__FILE__) . '/main.php'));
	$_GET['id'] = abs(intval($team['id']));
	die(require_once( dirname(__FILE__) . '/team.php'));


