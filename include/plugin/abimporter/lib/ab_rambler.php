<?php
/********************************************************************************
DO NOT EDIT THIS FILE!

Rambler.ru contacts importer

You may not reprint or redistribute this code without permission from Lunarsys Solutions.

Copyright 2009 Lunarsys Solutions. All Rights Reserved
WWW: http://www.lunarsys.com
********************************************************************************/
//include_once(dirname(__FILE__).'/abimporter.php');
if (!defined('__ABI')) die('Please include abi.php to use this importer!');

global $_OZ_SERVICES;
$_OZ_SERVICES['rambler'] = array('type'=>'abi', 'label'=>'Rambler', 'class'=>'RamblerImporter');

/////////////////////////////////////////////////////////////////////////////////////////
//RamblerImporter
/////////////////////////////////////////////////////////////////////////////////////////
//@api
class RamblerImporter extends WebRequestor {

 	var $CONTACT_REGEX = "/<a\\s+href=\"#\"\\s+onclick=\"opener.add_email[^>]*>([^<]*)<\/a>\\s*<\/td>\\s*<td>([^<]*)<\/td>/ims";

	//@api
	function fetchContacts ($loginemail, $password) {

	 	$parts = $this->getEmailParts ($loginemail);
	 	$login = $parts[0];

		$form = new HttpForm;
		$form->addField("back", "http://mail.rambler.ru/");
		$form->addField("url","7");
		$form->addField("icqscreen", "");
		$form->addField("login", $login);
		$form->addField("passw", $password);
		$form->addField("Submit", "1");	//Should be some russian char here
		$form->addField("_authtrkcde", "{#TRKCDE#}");
		$postData = $form->buildPostData();
		$html = $this->httpPost("http://mail.rambler.ru/script/auth.cgi", $postData);
		if (strpos($html, '<FONT COLOR=red>')!=false) {
		 	$this->close();
			return abi_set_error(_ABI_AUTHENTICATION_FAILED,'Bad user name or password');
		}

		$html = $this->httpPost("http://mail.rambler.ru/mail/contacts.cgi?mode=popup");

        /////////////////////////////////////////////////////
        //EXTRACT!
        /////////////////////////////////////////////////////
		$al = array();	
        preg_match_all($this->CONTACT_REGEX, $html, $matches, PREG_SET_ORDER);
		foreach ($matches as $val) {
		 	$email = htmlentities2utf8(trim($val[1]));
		 	$name = htmlentities2utf8(trim($val[2]));
		 	if (!empty($email)) {
				$contact = new Contact($name, $email);
				$al[] = $contact;
			}
		}
		$this->close();
		return $al;
	}	
}


// rambler.ru
global $_DOMAIN_IMPORTERS;
$_DOMAIN_IMPORTERS["rambler.ru"] = 'RamblerImporter';

?>