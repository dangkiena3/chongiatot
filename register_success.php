<?php

//code by mrnhan108@gmail.com

require_once(dirname(__FILE__). '/app4ls.php');

$license_reg = Table::Fetch('license', '1');
if (empty($license_reg)) redirect( WEB_ROOT . '/register.php' );
include template('manage_license_register_success');

