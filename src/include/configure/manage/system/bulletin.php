<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('help');

$system = Table::Fetch('system', 1);

$CKEditor = new CKEditor();
// Do not print the code directly to the browser, return it instead.
$CKEditor->returnOutput = true;
$width	=	"100"."%";
$CKEditor->config['width'] = $width;
CKFinder::SetupCKEditor( $CKEditor,'../../include/plugin/ckfinder/' ) ;
// The initial value to be displayed in the editor.
$bulletin0 = $CKEditor->editor("bulletin[0]", $INI['bulletin'][0]);
$bulletin1 = $CKEditor->editor("bulletin[1]", $INI['bulletin'][1]);
if ($_POST) {
	unset($_POST['commit']);
	$INI = Config::MergeINI($INI, $_POST);
	$INI = ZSystem::GetUnsetINI($INI);
	/* end */

	foreach($INI['bulletin'] AS $bid=>$bv) {
		$INI['bulletin'][$bid] = stripslashes($bv);
	}
	save_config();

	$value = Utility::ExtraEncode($INI);
	$table = new Table('system', array('value'=>$value));
	if ( $system ) $table->SetPK('id', 1);
	$flag = $table->update(array( 'value'));

	Session::Set('notice', 'System updated successfully!');
	redirect( WEB_ROOT . '/manage/system/bulletin.php');	
}

include template('manage_system_bulletin');
