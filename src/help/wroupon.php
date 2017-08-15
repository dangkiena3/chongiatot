<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
$page = Table::Fetch('page', 'help_wroupon');
$pagetitle = $INI['system']['abbreviation'] . ' là gì?';
include template('help_wroupon');