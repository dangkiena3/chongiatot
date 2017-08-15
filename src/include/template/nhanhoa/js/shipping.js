$(function () {
    _jsShippingCharge.InitShippingFunction();
});

var _jsShippingCharge = {
    P_ShippingCharge: function () {
        $(".div04 a").unbind("click").click(function () {
            $('#mask').fadeIn(100);
            $.ajax({
                url: "/ShippingCharge/GetShippingChargeTemplContent",
                type: "POST",
                dataType: "html",
                data: {},
                beforeSend: function () {
                },
                success: function (dataResponse, textStatus) {
                    $("#shipping_tpl_content").append($(dataResponse).find(".ship_content").html());

                    var winH = $(window).height();
                    var winW = $(window).width();
                    //Set the popup window to center
                    $(".shipping_box").css('top', winH / 2 - $(".shipping_box").height() / 2);
                    $(".shipping_box").css('left', winW / 2 - $(".shipping_box").width() / 2);
                    $(".shipping_box").fadeIn(100);
                    _jsShippingCharge.InitProvince();
                    _jsShippingCharge.InitShippingFunction();

                    $("#tbxWeight").val($("#dealWeight").val());


                    $(".btnGopyclose", ".shipping_box").unbind("click").click(function () {
                        $(".shipping_box").hide();
                        CloseMark();
                        $("#shipping_tpl_content").html("");
                    });
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                },
                complete: function (XMLHttpRequest, textStatus) {

                }
            });

            return false;
        });
    },

    EscapeKeyPress: function () {
        $(document).keypress(function (e) {
            if (e.keyCode == 27) {
                $(".shipping_box").hide();
                CloseMark();
                $("#shipping_tpl_content").html("");
            }
        });
    },

    InitProvince: function () {
        $.ajax({
            url: "/ShippingCharge/GetProvince",
            type: "POST",
            dataType: "html",
            data: {},
            beforeSend: function () {
            },
            success: function (dataResponse, textStatus) {
                $("#slShipProvince").find("option").remove().end();
                $("#slShipProvince").append(dataResponse);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
            },
            complete: function (XMLHttpRequest, textStatus) {

            }
        });

        return false;
    },

    ShippingQuantityUp: function () {
        $(".shipping_q_up").unbind("click").click(function () {
            var currVl = parseInt($("#tbxQuantity").val());
            var _dealWeight = parseInt($("#dealWeight").val());
            if (currVl < 99) {
                currVl++;
                $("#tbxQuantity").val(currVl);
                $("#tbxWeight").val(currVl * _dealWeight);
            }
        });
    },
    ShippingQuantityDown: function () {
        $(".shipping_q_down").unbind("click").click(function () {
            var currVl = parseInt($("#tbxQuantity").val());
            var _dealWeight = parseInt($("#dealWeight").val());
            if (currVl > 1) {
                currVl--;
                $("#tbxQuantity").val(currVl);
                $("#tbxWeight").val(currVl * _dealWeight);
            }
        });
    },
    QuantityTextChange: function () {
        $("#tbxQuantity").keyup(function () {
            var _dealWeight = parseInt($("#dealWeight").val());
            if (parseInt($(this).val()) >= 0) {
                var newVL = parseInt($(this).val());
                $("#tbxWeight").val(newVL * _dealWeight);
            }
        });
    },
    ProvinceChange: function () {
        $("#slShipProvince").change(function () {
            $.ajax({
                url: "/District/DDLProvinceChange/",
                type: "POST",
                dataType: "html",
                data: { proviceID: $("#slShipProvince option:selected").val() },
                beforeSend: function () {

                },
                success: function (dataResponse, textStatus) {
                    $("#slShipDistrict").find("option").remove().end();
                    $("#slShipDistrict").append(dataResponse);
                    $("#slShipPayment").find("option").remove().end();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet");
                },
                complete: function (XMLHttpRequest, textStatus) {

                }
            });
            return false;
        });
    },
    DistrictChange: function () {
        $("#slShipDistrict").change(function () {
            var _district = $("#slShipDistrict").val();
            $.ajax({
                url: "/District/GetPaymentMenthodByDistrict/",
                type: "POST",
                dataType: "html",
                data: { districtID: _district },
                beforeSend: function () {

                },
                success: function (dataResponse, textStatus) {
                    $("#slShipPayment").find("option").remove().end();
                    $("#slShipPayment").append(dataResponse);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet");
                },
                complete: function (XMLHttpRequest, textStatus) {

                }
            });
            return false;
        });
    },
    CheckInputField: function () {
        if ($("#tbxWeight").val() == "") {
            alert("Nhập trọng lượng tính cước.");
            return false;
        }
        if ($("#slShipProvince").val() == "0") {
            alert("Vui lòng chọn  tỉnh thành.");
            return false;
        }
        if ($("#slShipDistrict").val() == "0") {
            alert("Vui lòng chọn quận huyện");
            return false;
        }
        if ($("#slShipPayment").val() == "0") {
            alert("Vui lòng chọn phương thức thanh toán");
            return false;
        }
        return true;
    },
    CalcChippingCharge: function () {
        $("#calc_byweight").unbind("click").click(function () {
            if (_jsShippingCharge.CheckInputField()) {
                var _weight = $("#tbxWeight").val();
                var _district = $("#slShipDistrict").val();
                var _paymentMenthod = $("#slShipPayment").val();
                $.ajax({
                    url: "/ShippingCharge/CalcShippingCharge/",
                    type: "POST",
                    dataType: "html",
                    data: { paymentMenthod: _paymentMenthod, districtID: _district, weight: _weight },
                    beforeSend: function () {

                    },
                    success: function (dataResponse, textStatus) {
                        var _result = dataResponse.split("**");
                        $(".byweight_result").show();
                        if (parseInt(_result[0]) == 1) {
                            $(".fee_content").html("Phí của bạn là: <b style='color:Red;'>" + _result[1] + "</b> đ");
                        }
                        else {
                            $(".fee_content").html(_result[1]);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet");
                    },
                    complete: function (XMLHttpRequest, textStatus) {

                    }
                });
                return false;
            }
        });
    },


    InitShippingFunction: function () {
        _jsShippingCharge.QuantityTextChange();
        _jsShippingCharge.ShippingQuantityUp();
        _jsShippingCharge.ShippingQuantityDown();
        _jsShippingCharge.P_ShippingCharge();
        _jsShippingCharge.ProvinceChange();
        _jsShippingCharge.DistrictChange();
        _jsShippingCharge.CalcChippingCharge();
        _jsShippingCharge.EscapeKeyPress();
    }
}

    