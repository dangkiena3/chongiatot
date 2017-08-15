<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$id = abs(intval($_GET['id']));
$user = Table::Fetch('user', $id);

if ( $_POST && $id==$_POST['id'] ) {
	$table = new Table('user', $_POST);
	$up_array = array(
			'username', 'realname', 
			'mobile', 'zipcode', 'address',
			'secret', 'ym',
			);

	// unique email per user
	if (strpos($email, '@')) {
		$eu = Table::Fetch('user', $email, 'email');
		if ($eu && $eu['id'] != $id ) {
			Session::Set('notice', 'Email address already exists, can not be modified');
			redirect( WEB_ROOT . "/manage/user/index.php");
		}
	}


	if ( $login_user_id == 1 && $id > 1 ) { $up_array[] = 'manager'; }
	if ( $id == 1 && $login_user_id > 1 ) {
		Session::Set('notice', 'You have no right to modify the information super administrator');
		redirect( WEB_ROOT . "/manage/user/index.php");
	}
	$table->manager = (strtoupper($table->manager)=='Y') ? 'Y' : 'N';
	if ($table->password ) {
		$table->password = ZUser::GenPassword($table->password);
		$up_array[] = 'password';
	}
	$flag = $table->update( $up_array );
	if ( $flag ) {
		Session::Set('notice', 'Modify user information successfully');
		redirect( WEB_ROOT . "/manage/user/edit.php?id={$id}");
	}
	Session::Set('error', 'Failed to modify user information');
	$user = $_POST;
}

include template('manage_user_edit');
