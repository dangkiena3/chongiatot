<?php

//code by mrnhan108@gmail.com

require_once(dirname(dirname(__FILE__)) . '/app.php');

$id = $_POST['deleteDealOptionID'];

unset($_SESSION['cart'][$id]);

echo '1';
