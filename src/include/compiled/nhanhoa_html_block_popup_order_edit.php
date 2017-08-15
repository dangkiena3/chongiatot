<?php 
    $team_orders = DB::LimitQuery('team_order', array(
    	'condition' => array('id'=>$one['id']),
        'order' => 'ORDER BY id DESC',
    ));
; ?>
<script language=Javascript>
function Inint_AJAX() {
	try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
	try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
	try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
	alert("XMLHttpRequest not supported");
	return null;
};

function dochange(src, val) {
 	var req = Inint_AJAX();
 	req.onreadystatechange = function () {
      if (req.readyState==4) {
           if (req.status==200) {
                document.getElementById(src).innerHTML=req.responseText;
           }
      }
 };
 req.open("GET", "/ajax/cate.php?type="+src+"&id="+val);
 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
 req.send(null);
}
function check()
	{ 
		var doc = document.frmEdit;
		if(doc.quantity.value==""){
		alert('Nhập số lượng');doc.quantity.focus();return false;
		}
		if(doc.txtName.value==""){
		alert('Nhập họ tên');doc.txtName.focus();return false;
		}
		if(doc.txtAddress.value==""){
		alert('Nhập địa chỉ');doc.txtAddress.focus();return false;
		}
		if(doc.thanhpho.value==0){
		alert('Chọn thành phố');doc.thanhpho.focus();return false;
		}
		if(doc.quan.value==""){
		alert('Chọn quận huyện');doc.quan.focus();return false;
		}
		if(doc.phuong.value==""){
		alert('Chọn phường xã');doc.phuong.focus();return false;
		}
		if(doc.txtPhone.value==""){
		alert('Nhập điện thoại');doc.txtPhone.focus();return false;
		}
		
	}
</script>
<script language="javascript">
 $(document).ready(function() {
  $('#thanhpho').change(function(){
   	giatri = this.value;
   	$('#quan').load('/ajax/city.php?type=child&id=' + giatri);
   	$('#phuong').load('/ajax/city.php?type=none&id=' + giatri);
  });
  $('#quan').change(function(){
   	giatri = this.value; 
   	$('#phuong').load('/ajax/city.php?type=subchild&id=' + giatri);
  });
 });
</script>
<div class="detail-box-edit">
    <div class="order-detail-box">
        <div class="btnClose"></div>
        <div class="clear"></div>
<form id="frmupdate" name="frmupdate" method="POST" action="#">		
        <div class="order-table">
		<h2 class="title_info_setting">Chỉnh sửa đơn hàng</h2>
            <table width="100%" cellspacing="0" cellpadding="0" class="orderdetail-table">
                <thead>
                    <tr>
                        <th width="4%">STT</th>
                        <th width="50%">Tên sản phẩm / Dịch vụ</th>
                        <th width="15%">Đơn giá</th>
                        <th width="10%">Số lượng</th>
                        <th width="15%">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($team_orders)){foreach($team_orders AS $index=>$team_order) { ?>
                    <?php 
                    	$team = Table::Fetch('team', $team_order['team_id']);
                    	$order = Table::Fetch('order', $team_order['order_id']);
                        $info = 'infop'.$team_order['info_id'];
                        $team[$info] =  $team[$info]?$team[$info]:'Chọn ngẩu nhiên'; 
                        $quantity = $team_order['quantity'];
                        $price_sum = $quantity * $team['team_price'];
						$provinces = DB::LimitQuery('vncountry', array('condition' => array('level' => '0'),));
						$opt_provinces = Utility::OptionArray($provinces, 'id', 'name');

						$districts = DB::LimitQuery('vncountry', array('condition' => array('level' => '1','parent_id'=>$order['province_id']),));
						$opt_districts = Utility::OptionArray($districts, 'id', 'name');

						$wards = DB::LimitQuery('vncountry', array('condition' => array('level' => '2','parent_id'=>$order['district_id']),));
						$opt_wards = Utility::OptionArray($wards, 'id', 'name');
                    ; ?>
					<input type="hidden" name="idd" value="<?php echo $order['id']; ?>" />
					<input type="hidden" name="myorder_id" value="<?php echo $team_order['id']; ?>" />
                    <tr class="even">
                        <td class="center"><?php echo ++$index; ?></td>
                        <td>
                        	<a target="_blank" title="Xem chi tiết" href="<?php echo rewrite_team_id($team['id']); ?>"><?php echo $team['product']; ?></a>
                            [<i style="color: #E7433C;"><?php echo $team[$info]; ?></i>]
							<br/><?php echo Opt($team_order['team_id'],$team_order['info_id'],$team_order['id']); ?>
                        </td>
                        <td class="right dongia"><?php echo formatMoney($team['team_price']); ?></td>
                        <td class="center soluong"><input type="text" value="<?php echo $quantity; ?>" name="quantity" class="h-input" style="width:20px"></td>
                        <td class="right thanhtien"><?php echo formatMoney($price_sum); ?></td>
                    </tr>
                    <?php }}?>
                    <tr class="odd">
                        <td class="right" colspan="4">Phí vận chuyển</td>
                        <td class="right">+<?php echo formatMoney(getVat($team['id'],$order['district_id'])); ?></td>
                    </tr>
                    <tr class="even">
                        <td class="right" colspan="4">Tổng giá trị đơn hàng</td>
                        <td style="font-size: 100%;" class="right bold"><?php echo formatMoney(getVat($team['id'],$order['district_id'])+$price_sum); ?></td>
                    </tr>
                    
                    <tr class="odd">
                        <td class="right bold" colspan="4">Thanh toán bằng tiền tích lũy</td>
                        <td class="right boldOrange"><?php echo formatMoney($one['paymoney']); ?></td>
                    </tr>
                    <tr class="even">
                        <td class="right bold" colspan="4">Thanh toán bằng tiền mặt</td>
                        <td style="font-size: 120%;color:red;" class="right bold"><?php echo formatMoney($one['fare']+$one['total_price']-$one['paymoney']); ?></td>
                    </tr>
                    
                </tbody>
            </table>
			<table width="100%" class="orderdetail-table">
        <tbody>
            <tr class="forum_title_tr"><th colspan="2" width="50%"><b>Thông tin người nhận</b></th></tr>
            <tr>
            	<td width="5%"><b>Họ tên</b></td><td><input type="text" value="<?php echo $order['fullname']; ?>" name="txtName" class="h-input" style="width:240px"/></td>
                
            </tr>
            <tr class="alt">
            	<td width="15%"><b>Địa chỉ</b></td>
                <td><input type="text" value="<?php echo $order['address']; ?>" name="txtAddress" class="h-input" style="width:240px"/>
				<select name="thanhpho" id="thanhpho" class="f-input" style="width:160px;"><?php echo Utility::Option($opt_provinces,$order['province_id'],'Chọn Thành Phố'); ?></select>
				<select name="quan" id="quan" class="f-input" style="width:160px;"><?php echo Utility::Option($opt_districts,$order['district_id'],'Chọn Quận Huyện'); ?></select>
				<select name="phuong" id="phuong" class="f-input" style="width:160px;"><?php echo Utility::Option($opt_wards,$order['ward_id'],'Chọn Phường'); ?></select>
				</td>
             
            </tr>
            <tr>
            	<td width="5%"><b>Điện thoại</b></td><td><input type="text" value="<?php echo $order['mobile']; ?>" name="txtPhone" class="h-input" style="width:120px"/></td>
                
           	</tr>
            <tr class="alt">
            	<td width="5%"><b>Lời nhắn</b></td><td>
				<textarea rows="3" style="width:400px" name="remark"><?php echo $order['remark']; ?></textarea>
				</td>
               
         	</tr>
			<tr>
            	<td>
            	</td>
            	<td><span class="fb_loading"></span>
						<span class="update_order"><a href="javascript:" class="btnv5 btn_update"></a></span>
						<span class="reg_loading">
                    <img alt="" src="/img/loading.gif">
					</span>
				</td>
                
           	</tr>
        </tbody>
    </table>			
        </div>
		</form>
        <div class="clear">
        </div>
    </div>
</div>
