<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$system = Table::Fetch('system', 1);

if ($_POST) {
	need_manager(true);
	unset($_POST['commit']);
	$INI = Config::MergeINI($INI, $_POST);
	$INI = ZSystem::GetUnsetINI($INI);
	save_config();

	$value = Utility::ExtraEncode($INI);
	$table = new Table('system', array('value'=>$value));
	if ( $system ) $table->SetPK('id', 1);
	$flag = $table->update(array( 'value'));

	Session::Set('notice', 'System successfully updated!');
	redirect( WEB_ROOT . '/manage/system/option.php');	
}

$cate_notify = DB::LimitQuery('category', array('condition' => array( 'zone' => 'news', ),));
$cate_notify = Utility::OptionArray($cate_notify, 'id', 'name');
$cate = DB::LimitQuery('cate', array('condition' => array( 'type' => 'root',),));
$cate = Utility::OptionArray($cate, 'id', 'name');

include template('manage_system_option');
