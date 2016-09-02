<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Template email</title>
</head>

<body>
<?php
require_once('../app.php');
$groups = DB::LimitQuery('cate', array(
			'condition' => array( 'type' => 'root', ),
			));
$now = time();
$num = date("w");
if ($num == 0)
{ $sub = 6; }
else { $sub = ($num-1); }
$WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("Y", $now));    //monday week begin calculation
$todayh = getdate($WeekMon); //monday week begin reconvert

$d = $todayh[mday];
$m = $todayh[mon];
$y = $todayh[year];
$_root=$INI['system']['wwwprefix'];

$daytime = strtotime(date('Y-m-d H:i:s'));
if(!$_REQUEST['id']) {
$condition = array(
	'team_type' => 'normal',
);
}
$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 100);
$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => ' ORDER BY begin_time DESC, sort_order DESC, id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));


?>
<div><form method="get" name="frm" action="">Xuất template gửi mail khách hàng:
<select name="id">
<option value="">---------Chọn DEAL HOT ---------</option>
<?php
foreach($teams AS $id=>$team){
?>
<option value="<?php echo $team['id']?>" <?php echo $_REQUEST['id']==$team['id']?'selected="selected"':''?>><?php echo $team['id']?>.<?php echo $team['product']?></option>
<?php }?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp; 
<select name="cate">
<option value="">---------DEAL cùng thể loại ---------</option>
<?php
foreach($groups AS $id=>$team){
?>
<option value="<?php echo $team['id']?>" <?php echo $_REQUEST['cate']==$team['id']?'selected="selected"':''?>><?php echo $team['name']?></option>
<?php }?>
</select>

&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" value="OK" />
</form>
</div>

<hr />
<div style="text-align:center;background:#FFF;margin:0px"><center> 
<div style="width:100%;background:#FFF;font-family:Arial,Helvetica,sans-serif">  <table width="584" cellspacing="0" cellpadding="0">   <tbody>
<tr style="background:#FFDA33">    <td width="219" align="left" style="text-align:left;padding:8px"><a target="_blank" title="lunglinhshop.net" href="http://lunglinhshop.net" style="text-decoration:none"><img width="189"  border="0" title="lunglinhshop.net" style="display:block;padding:7px" alt="lunglinhshop.net" src="http://lunglinhshop.net/include/template/nhanhoa/css/images/v2/logo_top.png"></a><a target="_blank" title="lunglinhshop.net" href="#" style="text-decoration:none"></a></td>    
<td width="321" align="left"><font size="  4pt" color="#333333">    <p style="border-left:solid #545454 1.0pt;min-height:50px;padding-left:10px">Các khuyến mãi tại<br>     <strong>
<font size="5">HỒ CHÍ MINH</font></strong></p>    </font></td>    <td width="121" align="left" style="font-size:13px;color:#fff;text-align:right;padding-right:10px;color:#333333;vertical-align:middle"><? echo "".date("d", $now)."/".date("m", $now)."/".date("Y", $now);?></td>   </tr> 
  <tr>    <td align="center" style="border-top:5px solid #FF6600;background:#fff" colspan="3">&nbsp;</td>   </tr>  
  
   <tr>    <td align="center" style="background:#fff" colspan="3">    <table width="100%" cellspacing="0" cellpadding="0" border="0">     <tbody>

<?php

$daytime = strtotime(date('Y-m-d H:i:s'));
if($_REQUEST['id']) {
$team = Table::Fetch('team',$_REQUEST['id']);

$_href=rewrite_team_id($team['id']);
?>
   
      
			 
<?php }?>			 
			        <tr>     </tr>  
					<tr>                   
<?php
if($_REQUEST['id']) {
$condition2 = array(
	'team_type' => 'normal',
	"id   <> '{$team[id]}'",
);
$cateid = $_REQUEST['cate'];
if($_REQUEST['cate']) $condition2[]="group_pid IN (select id from cate where pid=".$cateid.")";
$count = Table::Count('team', $condition);
$daytime = strtotime(date('Y-m-d H:i:s'));
list($pagesize, $offset, $pagestring) = pagestring($count, 60);
$teams = DB::LimitQuery('team', array(
	'condition' => $condition2,
	'order' => ' ORDER by RAND()',
	'size' => $pagesize,
	'offset' => $offset,
));
foreach($teams AS $id=>$team){
if (($id+1)%3==0) {
$alg="left2";

} else {
$alg="right";

}
$_href=rewrite_team_id($team['id']);
?>
               <?php echo $id2?>
			   <td align="<?php echo $alg?>" style="padding-<?php echo $alg?>:15px;"><table width="180" cellspacing="0" cellpadding="0" border="0" style="background:#CFEAF3;margin-bottom:15px">       <tbody><tr>        <td align="center" style="padding:10px 20px 10px 23px; overflow:hidden; height:30px" scope="col"><a target="_blank" title="<?php echo $team['title']?>" href="<?php echo $_href?>" style="text-decoration:none"><span style="color:#FF6600;text-decoration:none;font-size:14px"><strong><?php echo substr($team['product'],0,20);?></strong></span></a></td>       
    </tr>       <tr>        <td align="center" style="padding:0px 3px"><a target="_blank" title="<?php echo $team['title']?>" href="<?php echo $_href?>" style="text-decoration:none"><img src="<?php echo $INI['system']['wwwprefix']?>/static/<?php echo $team['image']?>" alt="<?php echo $team['title']?>" width="175" height="175" border="0" style="padding:3px;border:#939598 solid 1px;display:block;background:#fff" title="<?php echo $team['title']?>"></a></td>       
    </tr>       <tr>        <td align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0">         <tbody><tr style="background:#0099FF;font-size:10px">          <td width="30%" align="center" scope="col" style="padding:3px">Giảm giá</td>          <td width="70%" align="center" scope="col" style="padding:3px;border-left:1px #666 solid">Giá bán</td>         </tr>         <tr style="background:#0099FF;font-size:16px;font-weight:bolder">          <td align="center" scope="col" style="padding:3px;color:#FFFFFF"><?php echo round(moneyit((100*($team['market_price'] - $team['team_price'])/$team['market_price'])))?>%</td>          <td align="center" scope="col" style="padding:3px;border-left:1px #666 solid;color:#FFFFFF"><?php echo number_format(moneyit($team['team_price']),0,'.','.')?>đ</td>         </tr>        </tbody></table></td>       </tr>             </tbody></table>      </td>     
	
	              
		
<?php if (($id+1)%3==0) echo '</tr>'; }}?>		

<tr>      <td height="15" align="center" style="background:#fff" colspan="3">&nbsp;</td>     </tr>   

   
  
           <tr>      <td align="center" style="font-size:10px;line-height:18px;background:#66C;color:#fff" colspan="3"><p style="border-top:1px solid #fff;padding:6px 0px 5px 0px;margin:0px;width:100%;text-align:center;line-height:15PX"><strong>Cửa hàng quà tặng sắc màu lung linh</strong></p>
             <p style="border-top:1px solid #fff;padding:6px 0px 5px 0px;margin:0px;width:100%;text-align:center;line-height:15PX"> <strong>Thôn 4 - Yên Sở - Hoài Đức - Hà Nội (Đối diện mầm non Yên Sở)</strong>  <br/><br/><span style="font-size:20px"> Hotline: 0975.408.329</span>     </p></td>     
           </tr>    </tbody></table>    </td>   </tr>  </tbody></table> </div></center>
</div>
</body>
</html>
