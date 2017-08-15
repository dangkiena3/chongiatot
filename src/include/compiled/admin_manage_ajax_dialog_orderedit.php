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
<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:600px;">
	<h3>Chỉnh sửa đơn hàng số <?php echo $order['order_code']; ?><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Đóng</span></h3>
	<form method="post" action="" enctype="multipart/form-data" class="validator" onsubmit="return check();" name="frmEdit">
	<input type="hidden" name="id" value="<?php echo $order['id']; ?>" />
	<div style="overflow-x:hidden;padding:10px;" id="dialog-order-id" oid="<?php echo $order['id']; ?>">	
	<table width="96%" align="center" class="coupons-table" style="line-height:22px;">
		<tbody>
        	<tr class="forum_title_tr">
            	<th>STT</th><th>Tên sản phẩm / Dịch vụ</th>
                <th>Đơn giá</th><th>Số lượng</th><th>Thành tiền</th>
          	</tr>
            <?php if(is_array($team_orders)){foreach($team_orders AS $index=>$team_order) { ?>
            <?php 
            	$team = Table::Fetch('team', $team_order['team_id']);
                $info = 'infop'.$team_order['info_id'];
                $team[$info] =  $team[$info]?$team[$info]:'Chọn ngẩu nhiên'; 
                $quantity = $team_order['quantity'];
                $price_sum = $quantity * $team['team_price'];		

            ; ?>
            <?php if($index%2==0){?>
            <tr class="alt">
            <?php } else { ?>
            <tr>
            <?php }?>
            	<td><?php echo ++$index; ?></td>
                <td>
                	<a target="_blank" title="Xem chi tiết" href="<?php echo rewrite_team_id($team['id']); ?>"><?php echo $team['product']; ?></a>
                    [<i style="color: #E7433C;"><?php echo $team[$info]; ?></i>]<br/><?php echo Opt($team_order['team_id'],$team_order['info_id']); ?>
                </td>
                <td><?php echo formatMoney($team['team_price']); ?></td>
                <td><input type="text" value="<?php echo $quantity; ?>" name="quantity" class="h-input" style="width:20px"></td>
                <td style="text-align:right"><?php echo formatMoney($price_sum); ?></td>
            </tr>
				<input type="hidden" name="order_id" value="<?php echo $team_order['id']; ?>">
            <?php }}?>
            
            <tr class="alt">
                <td style="text-align:right" colspan="4">Tổng giá trị đơn hàng</td>
                <td style="font-size: 100%; text-align:right; font-weight:bold"><?php echo formatMoney(getVat($team['id'],$order['district_id']) + $price_sum); ?></td>
            </tr>
          
           
        </tbody>
	</table>
	
    <table width="96%" class="coupons-table" style="line-height:22px;">
        <tbody>
            <tr class="forum_title_tr"><th colspan="2" width="50%"><b>Thông tin người nhận</b></th></tr>
            <tr>
            	<td width="5%"><b>Họ tên</b></td><td><input type="text" value="<?php echo $order['fullname']; ?>" name="txtName" class="h-input" style="width:120px"/></td>
                
            </tr>
            <tr class="alt">
            	<td width="15%"><b>Địa chỉ</b></td>
                <td><input type="text" value="<?php echo $order['address']; ?>" name="txtAddress" class="h-input" style="width:150px"/>
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
            	<td>
				<input type="submit" value="Cập nhật" name="edit" class="formbutton" style="margin-left:15px;"/>
				</td>
                
           	</tr>
        </tbody>
    </table>
	</form>
	</div>
</div>
