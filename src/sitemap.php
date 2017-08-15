<?php
//code by mrnhan108@gmail.com
require_once(dirname(__FILE__). '/app.php');
header ("content-type: text/xml");
$xml	=	"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n
<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n
	<url>\n
		<loc>http://lunglinhshop.net/</loc>\n
		<changefreq>always</changefreq>\n
		<priority>1.0</priority>\n
	</url>\n";

//danh muc
$conditioncat = array(
	//	'type' => 'root',
		);
		$cates = DB::LimitQuery('cate', array(
		'condition' => $conditioncat,
		'order' => ' ORDER BY  sort_order',
		));
foreach($cates AS $id=>$cate){
	$url_cat	=	'http://lunglinhshop.net/'.friendly_link($cate['name']).'.html';
	$xml	.=	"<url>\n
					<loc>$url_cat</loc>\n
					<changefreq>always</changefreq>\n
					<priority>0.2</priority>\n
				</url>\n";
}		
$daytime = strtotime(date('Y-m-d H:i:s'));
$left = array();
$now = time();
$diff_time = array();
$condition = array(
	'active' => '0',
);
$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 500);
$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => $idteam.' ORDER BY  sort_order DESC, begin_time DESC, id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
foreach($teams AS $id=>$team){
	$url_team	=	'http://lunglinhshop.net'.rewrite_team_id($team['id']);
	$xml	.=	"<url>\n
					<loc>$url_team</loc>\n
					<changefreq>always</changefreq>\n
					<priority>0.2</priority>\n
				</url>\n";
}
$xml	.=	"</urlset>";
echo $xml;
exit();
?>