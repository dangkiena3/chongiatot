<?php
/**
 * Cung cap lop chuyen tiep den trang cung cap OpenID cua nguoi dung
 * @author Nguyen Tan Toan
 */
include 'ZOpenid.class.php';
class ZForward extends LightOpenID {
	var $google;
	var $yahoo;
	var $openid;
	var $myspace;
	var $aol;
	var $wordpress;
	var $urlReturn;
	function __customers(){
		return array('contact/email','namePerson');
	}
	function foward($openID){
		$google		=	'https://www.google.com/accounts/o8/id';
		$yahoo		=	'https://me.yahoo.com';
		$openid		=	'http://myopenid.com';
		$myspace	=	'http://www.myspace.com/username';
		$aol		=	'http://openid.aol.com';
		$wordpress	=	'http://wordpress.com';
		//$urlReturn	=	'http://localhost/forward.php';
		$objopenID	=	new LightOpenID();
		switch ($openID) {
			case 'google':
			if(!$objopenID->mode){
				$objopenID->identity	=	$google;
				$objopenID->required	=	$this->__customers();
				header('Location: ' . $objopenID->authUrl());
			}
			break;

			case 'yahoo':
			if(!$objopenID->mode){
				$objopenID->identity	=	$yahoo;
				$objopenID->required	=	$this->__customers();
				header('Location: ' . $objopenID->authUrl());
			}
			break;

			case 'openid':
			if(!$objopenID->mode){
				$objopenID->identity	=	$openid;
				$objopenID->required	=	$this->__customers();
				header('Location: ' . $objopenID->authUrl());
			}
			break;			
						
			case 'myspace':
			if(!$objopenID->mode){
				$objopenID->identity	=	$myspace;
				$objopenID->required	=	$this->__customers();
				header('Location: ' . $objopenID->authUrl());
			}
			break;			
			
			case 'aol':
			if(!$objopenID->mode){
				$objopenID->identity	=	$aol;
				$objopenID->required	=	$this->__customers();
				header('Location: ' . $objopenID->authUrl());
			}
			break;			
			
			case 'wordpress':
			if(!$objopenID->mode){
				$objopenID->identity	=	$wordpress;
				$objopenID->required	=	$this->__customers();
				header('Location: ' . $objopenID->authUrl());
			}
			break;
						
			default:
				header("location: ../");
				;
			break;
		} 
	}
}
?>