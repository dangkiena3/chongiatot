﻿function FocusAndSelect(n) {
    $(n)
        .focus(), $(n)
        .select()
}
function CheckEmptyInput(n) {
    return $(n)
        .val() == "" ? ($(n)
        .focus(), $(n)
        .select(), !1) : !0
}
$(function () {
    _updateifo.UpdateForGot()
});
var _updateifo = {
    UpdateForGot: function () {
        $(".item_r_changeforgotpass")
            .unbind("click")
            .click(function () {
            if (CheckEmptyInput($("#tbxNewPass"))) {
                if ($("#tbxNewPass")
                    .val()
                    .length < 4) {
                    alert("Mật khẩu phải lớn hơn 4 ký tự."), FocusAndSelect($("#tbxNewPass"));
                    return
                }
                if (CheckEmptyInput($("#tbxReNewPass"))) {
                    if ($("#tbxNewPass")
                        .val() != $("#tbxReNewPass")
                        .val()) {
                        alert("Mật khẩu xác nhận không chính xác."), FocusAndSelect($("#tbxReNewPass"));
                        return
                    }
                    return $.ajax({
                        url: "/jquery/updatepass.php",
                        type: "POST",
                        dataType: "html",
                        data: $("#frmChangeForGotPass").serialize(),
                        beforeSend: function () {
                            $(".waiting_updatepass").css("display", "inline")
                        },
                        success: function (n) {
                            n == "0" ? (alert("Tác vụ không thành công !!!"), window.location.href = "../") : (alert("Tác vụ thành công !!!"), window.location.href = "../")
                        },
                        error: function () {
                            alert("Tác vụ không thành công. Vui lòng thử lại sau !!!")
                        },
                        complete: function () {
                            $(".waiting_updatepass")
                                .css("display", "none")
                        }
                    }), !1
                }
            }
        })
    }
}