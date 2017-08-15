<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');

//code by mrnhan108@gmail.com

$District = intval($_POST['districtID']);

$tmp = DB::LimitQuery('vncountry', array('condition' => array('id' => $District,'display' => 'Y',),'one' => true,));

$tmp2 = DB::LimitQuery('vncountry', array('condition' => array('id' => $tmp['parent_id'],'display' => 'Y',),'one' => true,));

$Province = $tmp2['id'];

if($Province == 1){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 2){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));
}
else if($Province == 4){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 6){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 8){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 10){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 11){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 12){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 14){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 15){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 17){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 19){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 20){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 22){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 24){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 25){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 26){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 27){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 30){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 31){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 33){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 34){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 35){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 36){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 37){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 38){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 40){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 42){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 44){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 45){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 46){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 48){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 49){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 51){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 52){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 54){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 56){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 58){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 60){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 62){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 64){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 66){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 67){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 68){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 70){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 72){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 74){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 75){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 77){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 79){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 80){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 82){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 83){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 84){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 86){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 87){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 89){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 91){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 92){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 93){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 94){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 95){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}

else if($Province == 96){

$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y'),

	));

}



else{

	$methods = DB::LimitQuery('shipping_method',array(

		'condition' => array('display'=>'Y', 'id' =>'4',),

	));

}

include template('block_method_list');

