function LogInBuy() {
    if ($("#tbxEmail")
        .val()
        .trim() == "") {
        $(".error_email")
            .html("* Vui lòng nhập email"), $("#tbxEmail")
            .focus();
        return
    }
    if (checkEmail($("#tbxEmail")
        .val()) == !1) {
        $(".error_email")
            .html("* Địa chỉ email không hợp lệ"), $("#tbxEmail")
            .focus();
        return
    }
    if ($(".error_email")
        .html(""), $("#tbxPass")
        .val()
        .trim() == "") {
        $(".error_pass")
            .html("* Vui lòng nhập mật khẩu"), $("#tbxPass")
            .focus();
        return
    }
    $(".error_pass")
        .html("");
    var n = "?u=" + $("#tbxEmail")
        .val() + "&p=" + $("#tbxPass")
        .val();
    $.ajax({
        type: "GET",
        url: "/Customer/DoLogIn" + n,
        data: "",
        success: function (n) {
            var t;
            parseInt(n) == 0 ? ($(".error_email")
                .html("&#187; Đăng nhập không thành công.Vui lòng thử lại !!!"), $("#tbxEmail")
                .val(""), $("#tbxPass")
                .val("")) : parseInt(n) == -1 ? ($(".error_email")
                .html("&#187; Tài khoản của bạn tạm thời bị khóa"), $("#tbxEmail")
                .val(""), $("#tbxPass")
                .val("")) : (t = "", parseInt(n) == 1 && (t = "/ThanhToan/"), window.location.href = t)
        }
    })
}
function RegistBuy() {
    if (checkInput()) $(".regist_note")
        .css("display", "none");
    else {
        $(".regist_note")
            .css("display", "inline");
        return
    }
    $(".fb_loading")
        .html("<img alt='' src='/Content/DefaultTheme/images/ajax-loader.gif' />"), $.ajax({
        type: "POST",
        url: "/Customer/DoRegist",
        data: {
            fullName: $("#tbxFullName")
                .val(),
            email: $("#tbxEmailRegist")
                .val(),
            pass: $("#tbxPassRegist")
                .val(),
            province: $("select#Province option:selected")
                .val(),
            district: $("select#District option:selected")
                .val(),
            Address: $("#tbxAddress")
                .val(),
            Phone: $("#tbxPhone")
                .val(),
            gioitinh: $("select#ddlRegistSex option:selected")
                .val(),
            ngaysinh: $("select#ddlRegistBirthday option:selected")
                .val(),
            thangsinh: $("select#ddlRegistBirthMonth option:selected")
                .val(),
            namsinh: $("select#ddlRegistBirthYear option:selected")
                .val()
        },
        success: function (n) {
            n == "0" ? alert("Đăng ký không thành công, Vui lòng kiểm tra lại thông tin vừa nhập !!!") : n == "1" ? window.location.href = "../../ThanhToan/" : n == "3" ? ($(".regist_note")
                .css("display", "inline"), $(".regist_note")
                .html("<span style='float:left;margin-top:3px;margin-left:3px;'>&#187; Email này đã được dùng để đăng ký.Bạn nên dùng chức năng quên mật khẩu để lấy lại.</span>")) : window.location.href = "../../", $(".fb_loading")
                .html("")
        }
    })
}
function checkInput() {
    if ($("#tbxFullName")
        .val()
        .trim() == "") return $("#tbxFullName")
        .focus(), $(".regist_note")
        .html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập họ tên của bạn.</span>"), !1;
    if ($("#tbxEmailRegist")
        .val() == "") {
        $(".regist_note")
            .html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập địa chỉ email.</span>"), $("#tbxEmailRegist")
            .focus();
        return
    }
    return checkEmailPattern($("#tbxEmailRegist")
        .val()) == !1 ? (alert("Email không đúng định dạng"), $("#tbxEmailRegist")
        .focus(), $("#tbxEmailRegist")
        .select(), !1) : $("#tbxPassRegist")
        .val() == "" ? ($(".regist_note")
        .html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập mật khẩu của bạn.</span>"), $("#tbxPassRegist")
        .focus(), !1) : $("#tbxPassRegist")
        .val()
        .length < 4 ? (alert("Mật khẩu tối thiểu phải 4 ký tự"), $("#tbxPassRegist")
        .focus(), !1) : $("#tbxRePassRegist")
        .val() == "" ? ($(".regist_note")
        .html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng xác nhận lại mật khẩu.</span>"), $("#tbxRePassRegist")
        .focus(), !1) : $("#tbxPassRegist")
        .val() != $("#tbxRePassRegist")
        .val() ? ($(".regist_note")
        .html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Mật khẩu bạn nhập vào không khớp.</span>"), $("#tbxRePassRegist")
        .focus(), $("#tbxRePassRegist")
        .select(), !1) : $("#ddlRegistSex option:selected")
        .val() == "3" ? (alert("Vui lòng chọn giới tính"), !1) : $("#ddlRegistBirthday option:selected")
        .val() == "0" ? (alert("Vui lòng chọn ngày sinh"), !1) : $("#ddlRegistBirthMonth option:selected")
        .val() == "0" ? (alert("Vui lòng chọn tháng sinh"), !1) : $("#ddlRegistBirthYear option:selected")
        .val() == "0" ? (alert("Vui lòng chọn năm sinh"), !1) : $("#Province option:selected")
        .val() == "0" ? (alert("Vui lòng chọn tỉnh thành"), !1) : $("#District option:selected")
        .val() == "0" || $("#District option:selected")
        .val() == undefined ? (alert("Vui lòng chọn quận huyện."), !1) : $("#Ward option:selected")
        .val() == "0" || $("#Ward option:selected")
        .val() == undefined ? (alert("Vui lòng chọn phường xã."), !1) : $("#tbxAddress")
        .val()
        .trim() == "" ? ($(".regist_note")
        .html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập địa chỉ khách hàng.</span>"), $("#tbxAddress")
        .focus(), !1) : $("#tbxPhone")
        .val() == "" ? ($(".regist_note")
        .html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập số điện thoại liên lạc.</span>"), $("#tbxPhone")
        .focus(), !1) : !0
}
function checkEmailPattern(n) {
    return n.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1 ? !0 : !1
}
$(function () {
    _add.init()
});
var _add = {
    a_DangNhap_click: function () {
        $(".loginbtn a")
            .unbind("click")
            .click(function () {
            LogInBuy()
        })
    },
    a_DangKy_click: function () {
        $(".regist_btn a")
            .click(function () {
            RegistBuy()
        })
    },
    EnterLoginBuy: function () {
        $("#tbxEmail,#tbxPass")
            .keypress(function (n) {
            n.which == 13 && LogInBuy()
        })
    },
    EnterRegistBuy: function () {
        $("#tbxFullName,#tbxEmailRegist,#tbxPassRegist,#tbxRePassRegist,#tbxAddress,#tbxPhone")
            .keypress(function (n) {
            n.which == 13 && RegistBuy()
        })
    },
    Other_script: function () {
        $("#Province")
            .change(function () {
            $("select#Province option:selected")
                .val() == 0 ? $("select#District")
                .attr("disabled", "disabled") : $("select#District")
                .removeAttr("disabled"), $.ajax({
                type: "POST",
                url: "../../District/DDLProvinceChange/",
                data: {
                    proviceID: $("select#Province option:selected")
                        .val()
                },
                success: function (n) {
                    $("#District")
                        .find("option")
                        .remove()
                        .end(), $("#District")
                        .append(n)
                }
            })
        })
    },
    init: function () {
        _add.a_DangNhap_click(), _add.a_DangKy_click(), _add.EnterLoginBuy(), _add.EnterRegistBuy(), _add.Other_script()
    }
}