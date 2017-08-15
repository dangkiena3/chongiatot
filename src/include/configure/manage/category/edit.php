<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$id = abs(intval($_REQUEST['id']));
$category = Table::Fetch('category', $id);
$table = new Table('category', $_POST);
$table->letter = strtoupper($table->letter);
$uarray = array( 'zone', 'ename', 'letter', 'name', 'czone', 'display', 'sort_order'); 
$table->display = strtoupper($table->display)=='Y' ? 'Y' : 'N';

if (!$_POST['name'] || !$_POST['ename'] || !$_POST['letter']) {
	Session::Set('error', 'English name,English name Repeat,the initial letter must be typed');
	redirect(null);
}

if ( $category ) {
	if ( $flag = $table->update( $uarray ) ) {
		Session::Set('notice', 'Category edited successfully');
	} else {
		Session::Set('error', 'failure in the category edit');
	}
	option_category($category['zone'], true);
} else {
	if ( $flag = $table->insert( $uarray ) ) {
		Session::Set('notice', 'creating a new category was created successfully');
	} else {
		Session::Set('error', 'the creation of new category failed');
	}
}

option_category($table->zone, true);
redirect(null);
