<?php
//code by mrnhan108@gmail.com
require_once(dirname(__FILE__). '/app.php');// die('--');
global $count_timer;
$count_timer = 1000;
$daytime = strtotime(date('Y-m-d H:i:s'));
$left = array();
$now = time();
$diff_time = array();
$condition = array(
	'team_type' => 'normal',
	'city_id' => array(0, abs(intval($city['id']))),
);
$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 200);
$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => $idteam.' ORDER BY  sort_order DESC, begin_time DESC, id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
foreach($teams AS $id=>$team){
	team_state($team);
	if (!$team['close_time']) $team['picclass'] = 'isopen';
	if ($team['state']=='soldout') $team['picclass'] = 'soldout';
	if($team['end_time']<$team['begin_time']){$team['end_time']=$team['begin_time'];}
$diff_time = $left_time = $team['end_time']-$now;
if ( $team['team_type'] == 'seconds' && $team['begin_time'] >= $now ) {
	$diff_time = $left_time = $team['begin_time']-$now;
}
	$team['diff_time']=$diff_time;
	$team['left_time']=$left_time;
//	$team['url']=$INI['system']['wwwprefix']."/".ThietKeTrangChu_SEO($city['name'])."/".ThietKeTrangChu_SEO($team['product'])."-".$team['id'].".html";
//	$team['buy']=$INI['system']['wwwprefix']."/".ThietKeTrangChu_SEO($city['name'])."/".ThietKeTrangChu_SEO($team['product'])."-".$team['id']."/buy.html";
//	$team['comment']=$INI['system']['wwwprefix']."/".ThietKeTrangChu_SEO($city['name'])."/".ThietKeTrangChu_SEO($team['product'])."-".$team['id']."/binh-luan.html";
	$bix = DB::LimitQuery('partner', array(
		'condition' => array(
			'id' => $team['partner_id'],
		),
		'one' => true,
	));
	$partner['title']=$bix['title'];
	$partner['image']=$bix['image'];
	$partner['other']=$bix['other'];
	$teams[$id] = $team;
}
$pagetitle = 'Deal giá tốt hôm nay';
$page_type = 'home';
include template('main');

