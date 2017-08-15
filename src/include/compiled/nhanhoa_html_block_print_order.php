<div id="printOrderDetail" style="display:none">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #999999;border-top:1px solid #999999;border-left:1px solid #999999;border-right:1px solid #999999;">
    <tbody><tr bgcolor="#FFFFFF">
      <td align="left" valign="top" style="padding-top:3px; padding-bottom:10px;"><img src="http://lunglinhshop.net/include/template/nhanhoa/css/images/v2/logo.png" border="0" width="200px"></td>
      <td align="right" valign="top"><img src="/img/qrcode.png" border="0" alt="" height="70px"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td align="center" valign="top" colspan="2" style="margin: 10px 0px 5px 5px; text-align: center; font-weight: bold; font-size: 30px;">HÓA ĐƠN</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td style="padding-left:5px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999;border-left:none">Mã đơn hàng</td>
      <td style="padding-left:5px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999; border-left:none; border-right:none"><strong><?php echo $order['order_code']; ?></strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td style="padding-left:5px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999; border-top:none;border-left:none">Ngày đặt hàng</td>
      <td style="padding-left:5px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999; border-top:none; border-left:none; border-right:none"><strong><?php echo date('d/m/Y H:i',$order['create_time']); ?></strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td style="padding-left:5px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999; border-top:none;border-left:none;">Trạng thái</td>
      <td style="padding-left:5px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999; border-top:none; border-left:none; border-right:none"><strong><?php echo $tracking[$team_order['track']]; ?></strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td style="padding-left:5px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999; border-top:none;border-left:none">Phương thức thanh toán</td>
      <td style="padding-left:5px; padding-right:5px; padding-bottom:3px; padding-top:3px; border-bottom:1px solid #999999;"><strong></strong></td>
    </tr>
     
    <tr bgcolor="#53BBF0">
      <td colspan="2" style="padding-left:5px; padding-right:5px; padding-bottom:3px; padding-top:3px;border-right:1px solid #999999;border-bottom:1px solid #999999; color:#FFFFFF"><strong>Thông tin nhận hàng</strong><strong></strong></td>
      </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2" style="padding-left:10px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999; border-top:none;border-left:none">Họ tên: <?php echo $order['fullname']; ?></td>
      </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2" style="padding-left:10px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999; border-top:none; border-left:none">Địa chỉ: <?php echo $order['address'].', '.get_name_local($order['ward_id']).', '.get_name_local($order['district_id']).', '.get_name_local($order['province_id']); ?></td>
      </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2" style="padding-left:10px; padding-right:5px; padding-bottom:3px; padding-top:3px; border:1px solid #999999; border-top:none; border-left:none">Điện thoại: <?php echo $order['mobile']; ?></td>
      </tr>
    <tr>
      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td align="left" valign="top" style="background-color:#FDFA9D;border-right:solid 1px #999999; border-bottom:solid 1px #999999; border-left:none;color:#07519a;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold;line-height:16px;padding:8px;text-align:left;white-space:nowrap;">Mã</td>
            <td align="left" valign="top" style="background-color:#FDFA9D;border-right:solid 1px #999999; border-bottom:solid 1px #999999; border-left:none;color:#07519a;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold;line-height:16px;padding:8px;text-align:left;white-space:nowrap;">Tên Deal</td>
            <td align="left" valign="top" style="background-color:#FDFA9D;border-right:solid 1px #999999; border-bottom:solid 1px #999999; border-left:none;color:#07519a;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold;line-height:16px;padding:8px;text-align:left;white-space:nowrap;">Số lượng</td>
            <td align="left" valign="top" style="background-color:#FDFA9D;border-right:solid 1px #999999; border-bottom:solid 1px #999999; border-left:none;color:#07519a;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold;line-height:16px;padding:8px;text-align:left;white-space:nowrap;">Trọng lượng (gr)</td>
            <td align="left" valign="top" style="background-color:#FDFA9D;border-right:solid 1px #999999; border-bottom:solid 1px #999999; border-left:none;color:#07519a;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold;line-height:16px;padding:8px;text-align:left;white-space:nowrap;">Đơn giá (VNĐ)</td>
            <td align="left" valign="top" style="background-color:#FDFA9D;color:#07519a; border-bottom:solid 1px #999999;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold;line-height:16px;padding:8px;text-align:left;white-space:nowrap;">Thành tiền (VNĐ)</td>
          </tr>
          <tr bgcolor="#FFFFFF"><td align="left" valign="top" style="padding:5px;border-bottom:solid 1px #999999;border-right:solid 1px #999999;"><?php echo $order['order_code']; ?></td>
			  <td align="left" valign="top" style="padding:5px;border-bottom:solid 1px #999999;border-right:solid 1px #999999;"><?php echo $team['product']; ?></td>
			  <td align="center" valign="top" style="padding:5px;border-bottom:solid 1px #999999;border-right:solid 1px #999999;"><?php echo $quantity; ?></td>
			  <td align="center" valign="top" style="padding:5px;border-bottom:solid 1px #999999;border-right:solid 1px #999999;"><?php echo $team['weight']; ?></td>
			  <td align="right" valign="top" style="padding:5px;border-bottom:solid 1px #999999;border-right:solid 1px #999999;"><?php echo formatMoney($team['team_price']); ?></td>
			  <td align="right" valign="top" style="padding:5px;border-bottom:solid 1px #999999;"><?php echo formatMoney($price_sum); ?></td>
			</tr>          <tr bgcolor="#f6fcff">
            
            <td align="right" valign="top" style="padding:3px;">&nbsp;</td>
            <td align="right" valign="top" style="padding:3px;">&nbsp;</td>
            <td align="right" valign="top" style="padding:3px;">&nbsp;</td>
            <td align="left" valign="top" style="padding:3px;"><strong>Tổng TL:</strong> <?php echo $team['weight']*$quantity; ?> gr</td>
            <td align="right" valign="top" style="padding:3px;" colspan="2">&nbsp;</td>
          </tr>
          <tr bgcolor="#f6fcff">
            <td colspan="5" align="right" valign="top" style="padding:3px;">Phí vận chuyển</td>
            <td align="right" valign="top" style="padding:3px;" colspan="2">+<?php echo formatMoney(getVat($team['id'],$order['district_id'])); ?> VNĐ</td>
          </tr>
          <tr bgcolor="#f6fcff">
            <td colspan="5" align="right" valign="top" style="padding:3px;">Tổng tiền</td>
            <td align="right" valign="top" style="padding:3px;" nowrap="nowrap" colspan="2"><font size="+1"><strong><?php echo formatMoney(getVat($team['id'],$order['district_id'])+$price_sum); ?> VNĐ</strong></font></td>
          </tr>
          <tr bgcolor="#f6fcff">
            <td colspan="5" align="right" valign="top" style="padding:3px;">Số dư tài khoản:</td>
            <td align="right" valign="top" style="padding:3px;" nowrap="nowrap" colspan="2"><font size="+1"><strong>
            <?php echo formatMoney($one['paymoney']); ?> VNĐ</strong></font></td>
          </tr>
      </tbody></table></td>
    </tr>
    <tr bgcolor="#f6fcff">
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr bgcolor="#f6fcff">
    <td colspan="2" align="left" style="padding:0px 0px 5px 5px; "><strong>&nbsp;Ghi chú:</strong> <?php echo $order['remark']; ?></td>
  </tr>
  </tbody></table>
</div>