<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
$CKEditor = new CKEditor();

// Do not print the code directly to the browser, return it instead.
$CKEditor->returnOutput = true;

// Path to the CKEditor directory, ideally use an absolute path instead of a relative dir.
//   $CKEditor->basePath = '/ckeditor/'
// If not set, CKEditor will try to detect the correct path.
//$CKEditor->basePath = '../../';

// Set global configuration (will be used by all instances of CKEditor).
$width	=	"100"."%";
$CKEditor->config['width'] = $width;
// Change default textarea attributes.
//$CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);
CKFinder::SetupCKEditor( $CKEditor,'../../include/plugin/ckfinder/' ) ;
// The initial value to be displayed in the editor.

$location = $CKEditor->editor("location", $location_content);
$orderinfo	=	$CKEditor->editor("other", $orderinfo_content);
//----------------end-----------------------------------------------

if ( $_POST ) {
	$table = new Table('partner', $_POST);
	$table->SetStrip('location', 'other');
	$table->create_time = time();
	$table->user_id = $login_user_id;
	$table->password = ZPartner::GenPassword($table->password);
	$table->group_id = abs(intval($table->group_id));
	$table->city_id = abs(intval($table->city_id));
	$table->open = (strtoupper($table->open)=='Y') ? 'Y' : 'N';
	$table->display = (strtoupper($table->display)=='Y') ? 'Y' : 'N';
	$table->image = upload_image('upload_image', null, 'team', true);
	$table->image1 = upload_image('upload_image1', null, 'team');
	$table->image2 = upload_image('upload_image2', null, 'team');
	$table->insert(array(
		'username', 'user_id', 'city_id', 'title', 'group_id',
		'bank_name', 'bank_user', 'bank_no', 'create_time',
		'location', 'other', 'homepage', 'contact', 'mobile', 'phone',
		'password', 'address', 'open', 'display',
		'image', 'image1', 'image2', 'longlat',
	));
	redirect( WEB_ROOT . '/manage/partner/index.php');
}

include template('manage_partner_create');
