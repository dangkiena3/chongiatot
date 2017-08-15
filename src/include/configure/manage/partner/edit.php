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
CKFinder::SetupCKEditor( $CKEditor,'../../include/plugin/ckfinder/' ) ;

$id = abs(intval($_GET['id']));
$partner = Table::Fetch('partner', $id);

$location_content = $partner['location'];
$orderinfo_content	=	$partner['other'];

$location = $CKEditor->editor("location", $location_content);
$orderinfo	=	$CKEditor->editor("other", $orderinfo_content);

if ( $_POST && $id==$_POST['id'] && $partner) {
	$table = new Table('partner', $_POST);
	//$table->SetStrip('location', 'other');
	ZPartner::nl2n('location', 'other');
	$table->group_id = abs(intval($table->group_id));
	$table->city_id = abs(intval($table->city_id));
	$table->open = (strtoupper($table->open)=='Y') ? 'Y' : 'N';
	$table->display = (strtoupper($table->display)=='Y') ? 'Y' : 'N';
	$table->image = upload_image('upload_image', $partner['image'], 'team', true);
	$table->image1 = upload_image('upload_image1', $partner['image1'], 'team');
	$table->image2 = upload_image('upload_image2', $partner['image2'], 'team');

	$up_array = array(
			'username', 'title', 'bank_name', 'bank_user', 'bank_no',
			'location', 'other', 'homepage', 'contact', 'mobile', 'phone',
			'address', 'group_id', 'open', 'city_id', 'display',
			'image', 'image1', 'image2', 'longlat',
			);

	if ($table->password ) {
		$table->password = ZPartner::GenPassword($table->password);
		$up_array[] = 'password';
	}
	$flag = $table->update( $up_array );
	if ( $flag ) {
		Session::Set('notice', 'Modify Business Information Success');
		redirect( WEB_ROOT . "/manage/partner/edit.php?id={$id}");
	}
	Session::Set('error', 'Falha na modificação da informação');
	$partner = $_POST;
}

include template('manage_partner_edit');
