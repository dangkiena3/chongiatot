<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
$id = abs(intval($_GET['id']));
$team = $eteam = Table::Fetch('team', $id);
if(empty($id) || empty($team['id'])) redirect( WEB_ROOT . '/index.php' );
include template('account_send2group_success');