<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
$page = Table::Fetch('page', 'help_payment');
$pagetitle = 'Hướng dẫn thanh toán dịch vụ tại ' . $INI['system']['abbreviation'];
include template('help_payment');
