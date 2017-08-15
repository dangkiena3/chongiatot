<?php
/********************************************************************************
DO NOT EDIT THIS FILE!

Main include file

You may not reprint or redistribute this code without permission from Lunarsys Solutions.

Copyright 2009 Lunarsys Solutions. All Rights Reserved
WWW: http://www.lunarsys.com
********************************************************************************/

define('__ABI',1);

//Legacy return codes
define('_ABI_SUCCESS',0);				//Successful retrieval
define('_ABI_AUTHENTICATION_FAILED',1);	//Authentication failed (bad user name or password)
define('_ABI_FAILED',2);				//Connection to server failed
define('_ABI_UNSUPPORTED',3);			//Unsupported mail provider
define('_ABI_CAPTCHA_RAISED',4);		//Captcha challenge was raised
define('_ABI_USER_INPUT_REQUIRED',5);	//A general user input is required. Cannot proceed
define('_ABI_BLOCKED',6);				//Message/Action was blocked by server (due to some censorship, etc)


function abi_include ($file) {$path = dirname(__FILE__).'/'.$file;if (file_exists($path)) include_once($path);}
function abi_include_either ($file1,$file2) {$path1 = dirname(__FILE__).'/'.$file1;$path2 = dirname(__FILE__).'/'.$file2;if (file_exists($path1)) include_once($path1);else if (file_exists($path2)) include_once($path2);}

//Include config file (required))
//include(dirname(__FILE__)."/abiconfig.php");

global $_DOMAIN_IMPORTERS;
$_DOMAIN_IMPORTERS = array();
global $_DOMAIN_IMPORTERSX;
$_DOMAIN_IMPORTERSX = array();

$_OZ_SERVICES = array();

if (FALSE/*OBFUSCATED*/) {
	require('lib_base.php');
	abi_include('lib_abige.php');
	abi_include('lib_abi1.php');
	abi_include('lib_abi2.php');
	abi_include('lib_abi3.php');
	abi_include('lib_abi4.php');
	abi_include('lib_is1.php');
	abi_include('lib_is2.php');
}
else {
	//Include common codes
	abi_include("ls_ldif.php");
	abi_include("ls_vcard.php");
	abi_include("ls_csv.php");
	abi_include("ls_json.php");
	include(dirname(__FILE__)."/ls_base.php");

	//Experimental
	abi_include("ls_abcontact.php");
	abi_include("ab_portablecontacts.php");

	//Contacts Importer Bundle Great Essentials & Bundle 1
	abi_include("ab_hotmail.php");
	//abi_include("ab_hotmail2.php");
	abi_include("ab_hotmail3.php");
	abi_include("ab_gmail.php");
	abi_include("ab_gmail2.php");

	abi_include_either("ab_yahoo2.php","ab_yahoo.php");
	//abi_include("ab_yahoo.php");
	abi_include("ab_yahoojp.php");
	//abi_include_either("ab_aol2.php","ab_aol.php");
	abi_include("ab_aol.php");
	//abi_include_either("ab_lycos2.php","ab_lycos.php");
	abi_include("ab_lycos.php");
	abi_include("ab_maildotcom.php");
	abi_include("ab_rediff.php");
	abi_include("ab_indiatimes.php");
	//abi_include("icq.php");

	//Contacts Importer Bundle 1
	abi_include("ab_fastmail.php");
	abi_include("ab_gmx.php");
	abi_include("ab_webde.php");
	abi_include("ab_linkedin.php");
	abi_include("ab_mynet.php");
	//abi_include_either("ab_macmail2.php","ab_macmail.php");
	abi_include("ab_macmail.php");

	//Contacts Importer Bundle 2
	abi_include("ab_mailru.php");
	//abi_include_either("ab_freenetde2.php","ab_freenetde.php");
	abi_include('ab_freenetde.php');
	abi_include("ab_libero.php");
	abi_include("ab_interia.php");
	abi_include("ab_rambler.php");
	abi_include("ab_yandex.php");
	abi_include("ab_onet.php");
	abi_include("ab_wppl.php");
	abi_include("ab_sapo.php");
	abi_include("ab_o2.php");
	abi_include("ab_tonline.php");

	//Contacts Importer Bundle 3
	abi_include("ab_terra.php");
	abi_include("ab_emailit.php");
	abi_include("ab_orangees.php");
	abi_include("ab_aliceit.php");
	abi_include("ab_plaxo.php");
	abi_include("ab_daumnet.php");
	abi_include("ab_naver.php");
	abi_include("ab_orkut.php");
	abi_include("ab_myspace.php");
	abi_include("ab_virgilioit.php");


	//Invite Sender Bundle 1
	abi_include("sn_friendster.php");
	//Facebook importer has been removed on request by Facebook
	abi_include("sn_facebook.php");
	abi_include("sn_orkut.php");
	//abi_include_either("sn_myspace2.php", "sn_myspace.php");
	abi_include("sn_myspace.php");
	abi_include("sn_myspace2.php");	//experimental
	abi_include("sn_hi5.php");

	//Invite Sender Bundle 2
	abi_include("sn_bebo.php");
	abi_include("sn_blackplanet.php");
	abi_include("sn_xing.php");
	abi_include("sn_meinvz.php");
	abi_include("sn_hyves.php");
	abi_include("sn_twitter.php");
	abi_include("sn_studivz.php");

	//Misc	
	abi_include("ab_arcorde.php");
}


//Experimental/Development version, if any
abi_include("ls_main2.php");
abi_include("ls_main3.php");
abi_include("ls_mainx.php");
abi_include("ls_main_int.php");

//abi_include("ls_http.php");

include(dirname(__FILE__)."/ls_inviter.php");

