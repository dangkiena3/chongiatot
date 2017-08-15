<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$page = Table::Fetch('page', 'about_privacy');
$pagetitle = 'Chính sách bảo mật';
include template('about_privacy');
