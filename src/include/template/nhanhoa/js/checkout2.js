// JavaScript Document

$(function () {
	_jsThanhToan.InitThanhToanJs();
});

var _jsThanhToan = {
	FinishOrder: function () {
		$(".btn_finish_o").click(function () {
			_jsThanhToan.UpdateUserAddress();
			if (_jsThanhToan.CheckDataSubmit()) {
				_jsThanhToan.CheckCaptchaText();
			}
		});
	},
	PaymentRowHover: function () {
		$(".thanhtoan_list li").hover(function () {
			$(this).addClass("thanhtoan_hover");
		},
	function () {
		$(this).removeClass("thanhtoan_hover");
	}
);
	},
	PaymentRowClick: function () {
		$(".thanhtoan_list li").click(function () {
			$(this).find("input:radio").attr("checked", true);
			$(".thanhtoan_list li").removeClass("thanhtoan_yellow");
			$(this).addClass("thanhtoan_yellow");
			var _paymentMenthod = $(this).find("input:radio").val();
			var _district = $("#District").val();
			_jsThanhToan.UpdateShippingCharge(_paymentMenthod, _district);
			//_jsThanhToan.UpdateCmoneyPayment(_paymentMenthod);
		});
	},
	PaymentMenthodChange: function () {
		$("input[name='PayMenthod']").click(function () {
			var _paymentMenthod = $(this).val();
			var _district = $("#District").val();

		});
	},
	PaymentMenthodDetailTip: function () {
		$('.toolTip').hover(
			function () {
				this.tip = this.title;
				$(this).append(
				'<div class="toolTipWrapper">'
					+ '<div class="toolTipTop"></div>'
					+ '<div class="toolTipMid">'
						+ this.tip
					+ '</div>'
					+ '<div class="toolTipBtm"></div>'
				+ '</div>'
			);
				this.title = "";
				this.width = $(this).width();
				$(this).find('.toolTipWrapper').css({ left: this.width - 22 })
				$('.toolTipWrapper').fadeIn(300);
			},
			function () {
				$('.toolTipWrapper').fadeOut(100);
				$(this).children().remove();
				this.title = this.tip;
			}
			);
	},
	UpdateShippingCharge: function (paymentMenthod, district) {
		$.ajax({
			url: "/jquery/getshipping.php",
			type: "POST",
			dataType: "html",
			data: { paymentMenthodID: paymentMenthod, districtID: district },
			beforeSend: function () {

			},
			success: function (dataResponse, textStatus) {
				if (parseInt(dataResponse) >= 0) {
					$("#hdpaymentCost").val(dataResponse);
					$(".shipping_cost").html("<p>" + formatCurrency(dataResponse) + "</p>");
					_jsThanhToan.UpdateTotalPrice();
				}
				else {

				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet");
			},
			complete: function (XMLHttpRequest, textStatus) {

			}
		});
	},
	UpdateCmoneyPayment: function (paymentMenthod) {
		$.ajax({
			url: "/ThanhToan/UpdateDiscountOrder",
			type: "POST",
			dataType: "html",
			data: { paymentMenthodID: paymentMenthod },
			beforeSend: function () {

			},
			success: function (dataResponse, textStatus) {
				var result = dataResponse.split("**");
				if (parseInt(result[2]) == 1) {
					$(".total_cmoney p").html(formatCurrency(result[0]));
					$(".totalpayaf p").html(formatCurrency(result[1]));
					$(".cmoney_payment").fadeIn("fast");
				}
				else {
					$(".total_cmoney p").html("");
					$(".totalpayaf p").html("");
					$(".cmoney_payment").fadeOut("fast");
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet");
			},
			complete: function (XMLHttpRequest, textStatus) {

			}
		});
	},
	CheckCouponCode: function () {
		$(".check_coupon").click(function () {
			if ($("#tbccoupon_code").val() == "") {
				alert("Vui lòng nhập mã coupon để kiểm tra.");
				return false;
			}
			$.ajax({
				url: "/jquery/checkcoupon.php",
				type: "POST",
				dataType: "html",
				data: { coupon_code: $("#tbccoupon_code").val() },
				beforeSend: function () {

				},
				success: function (dataResponse, textStatus) {
					var result = dataResponse.split("**");
					if (parseInt(result[0]) == 1) {
						$(".notice_coupon").fadeIn();
						$(".content_cp_rs").html(result[1]);
					}
					else {
						$(".notice_coupon").fadeIn();
						$(".content_cp_rs").html(result[1]);
					}
					$("#tbccoupon_code").val("");
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet");
				},
				complete: function (XMLHttpRequest, textStatus) {

				}
			});
		});
		return false;
	},
	UpdateTotalPrice: function () {
		var _total = $("#hdTotalPrice").val();
		var _shipping = $("#hdpaymentCost").val();
		var _totalPrice = parseInt(_total) + parseInt(_shipping);
		$(".totalpaycost").html("<p>" + formatCurrency(_totalPrice) + "</p>");
	},
	ResetDeliveryCharge: function () {
		var _total = $("#hdTotalPrice").val();
		var _shipping = 0;
		var _totalPrice = parseInt(_total) + parseInt(_shipping);
		$(".shipping_cost").html("<p>0</p>");
		$(".totalpaycost").html("<p>" + formatCurrency(_totalPrice) + "</p>");
	},
	RefreshCaptchaImg: function () {
		$("#btnRefreshCaptcha").click(function () {
			$("#cpt_img").attr("src", "/captcha/captcha.php?" + new Date().getDate().toString() + new Date().getMilliseconds());
		});
	},
	CloseCouponNotice: function () {
		$(".close_noteice_cp").click(function () {
			$(".notice_coupon").fadeOut("slow");
		});
	},
	DistrictChange: function () {
		$("#District").change(function () {
			var _district = $("#District").val();
			$.ajax({
				url: "/jquery/getmethod.php",
				type: "POST",
				dataType: "html",
				data: { districtID: _district },
				beforeSend: function () {

				},
				success: function (dataResponse, textStatus) {
					$("ul.thanhtoan_list").html(dataResponse);
					_jsThanhToan.PaymentRowHover();
					_jsThanhToan.PaymentRowClick();
					_jsThanhToan.PaymentMenthodChange();
					_jsThanhToan.PaymentMenthodDetailTip();
					_jsThanhToan.ResetDeliveryCharge();
					_jsThanhToan.SelectDefaultPayment();
					$("#tbxAddressDelivery").focus();
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet");
				},
				complete: function (XMLHttpRequest, textStatus) {

				}
			});
		});
	},
	CheckDataSubmit: function () {
		if ($("#FullName").val() == "") {
			$("#FullName").focus();
			return false;
		}
		if ($("#tbxPhone").val() == "") {
			$("#tbxPhone").focus();
			return false;
		}
		if ($("#Province option:selected").val() == "0" || $("#hdProvinceSelected").val() == '0') {
			alert("Vui lòng chọn tỉnh thành");
			return false;
		}
		if ($("#District option:selected").val() == "0" || $("#hdProvinceSelected").val() == '0') {
			alert("Vui lòng chọn quận huyện.");
			return false;
		}
		if ($("#Ward option:selected").val() == "0" || $("#hdWardSelected").val() == '0') {
			alert("Vui lòng chọn phường xã.");
			return false;
		}
		if ($("#tbxAddress").val() == "") {
			$("#tbxAddress").focus();
			return false;
		}
		if ($("#tbxAddressDelivery").val() == "") {
			alert("Vui lòng nhập địa chỉ nhận hàng");
			$("#tbxAddressDelivery").focus();
			return false;
		}
		if ($("#tbxCaptchaOrder").val() == "") {
			alert("Vui lòng nhập mã an toàn");
			$("#tbxCaptchaOrder").focus();
			return false;
		}
		if ($("input:radio[name=PayMenthod]:checked").val() == undefined) {
			alert("Vui lòng chọn hình thức thanh toán");
			return false;
		}

		return true;
	},
	CheckCaptchaText: function () {
		$.ajax({
			url: "/jquery/checkcaptcha.php",
			type: "post",
			dataType: "html",
			data: { text: $("#tbxCaptchaOrder").val() },
			beforeSend: function () {
			},
			success: function (dataResponse, textStatus) {
				if (parseInt(dataResponse) == 1) {
					$("#frmOrder").submit();
				}
				else {
					alert("Vui lòng kiểm tra mã an toàn");
					$("#cpt_img").attr("src", "/captcha/captcha.php?" + new Date().getDate().toString() + new Date().getMilliseconds());
					$("#tbxCaptchaOrder").val(""); ;
					$("#tbxCaptchaOrder").focus();
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
			},
			complete: function (XMLHttpRequest, textStatus) {

			}
		});
		return;
	},
	SelectDefaultPayment: function () {
		$(".thanhtoan_list li:first").find("input[name=PayMenthod]:radio").trigger("click"); //attr("checked", true);
	},
	UpdateUserAddress: function () {
		$("#hdProvinceSelected").val($("#Province option:selected").val());
		$("#hdDistrictSelected").val($("#District option:selected").val());
	},
	InitThanhToanJs: function () {
		_jsThanhToan.PaymentRowHover();
		_jsThanhToan.PaymentRowClick();
		_jsThanhToan.PaymentMenthodChange();
		_jsThanhToan.DistrictChange();
		_jsThanhToan.RefreshCaptchaImg();
		_jsThanhToan.PaymentMenthodDetailTip();
		_jsThanhToan.FinishOrder();
		_jsThanhToan.CloseCouponNotice();
		_jsThanhToan.CheckCouponCode();
		_jsThanhToan.SelectDefaultPayment();
	}
}
function formatCurrency(num) {
	num = num.toString().replace(/\$|\,/g, '');
	if (isNaN(num))
		num = "0";
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num * 100 + 0.50000000001);
	cents = num % 100;
	num = Math.floor(num / 100).toString();
	if (cents < 10)
		cents = "0" + cents;
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
		num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));

	return num;
}
function blockNotNumber(e) {
	var e = window.event || e;
	if (window.event) {
		if (e.keyCode < 48 || e.keyCode > 57) e.returnValue = false;
	}
	else {
		if (e.which != 8 && (e.which < 48 || e.which > 57)) e.preventDefault(); // 8 : Back Space
	}
}