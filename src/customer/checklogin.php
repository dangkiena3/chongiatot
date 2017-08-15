<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
if($login_user) echo '1'; else echo '0';
