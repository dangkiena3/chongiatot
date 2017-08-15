function IsValidEmail(n) {
    var t = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return t.test(n)
}
function FocusAndSelect(n) {
    $(n).focus(), $(n).select()
}
function CheckEmptyInput(n) {
    return $(n).val() == "" ? ($(n).focus(), $(n).select(), !1) : !0
}
function ClearInputValue(n) {
    $(n).val("")
}
function PutDataBeforeSend() {
    return ($("#tbxDay").val($("#ddlDay option:selected").val()), $("#tbxMonth").val($("#ddlMonth option:selected").val()), $("#tbxYear").val($("#ddlYear option:selected").val()), $("#hdProvinceSelected").val($("#Province option:selected").val()), $("#hdDistrictSelected").val($("#District option:selected").val()),$("#hdWardSelected").val($("#Ward option:selected").val()), $("#hdProvinceSelected").val() == "0") ? (alert("Vui lòng chọn tỉnh thành !!!"), !1) : $("#hdDistrictSelected").val() == "0" || $("#hdDistrictSelected").val() == undefined ? (alert("Vui lòng chọn quận huyện !!!"), !1) : $("#hdWardSelected").val() == "0" || $("#hdWardSelected").val() == undefined ? (alert("Vui lòng chọn phường xã !!!"), !1) : !0
}
function checkInputReg() {
    return $("#tbxFullName1").val() == "" ? ($("#tbxFullName1").focus(), !1) : $("#tbxEmailRegist1").val() == "" ? ($("#tbxEmailRegist1").focus(), !1) : checkEmail($("#tbxEmailRegist1").val()) == !1 ? (alert("Email không đúng định dạng"), $("#tbxEmailRegist1").focus(), $("#tbxEmailRegist1").select(), !1) : $("#tbxPassRegist1").val() == "" ? ($("#tbxPassRegist1").focus(), !1) : $("#tbxPassRegist1").val().length < 4 ? (alert("Mật khẩu tối thiểu phải 4 ký tự"), $("#tbxPassRegist1").focus(), !1) : $("#tbxRePassRegist1").val() == "" ? ($("#tbxRePassRegist1").focus(), !1) : $("#tbxPassRegist1").val() != $("#tbxRePassRegist1").val() ? (alert("Nhập lại mật khẩu không đúng"), $("#tbxRePassRegist1").focus(), $("#tbxRePassRegist1").select(), !1) : $("#ddlRegistSex1 option:selected").val() == "3" ? (alert("Vui lòng chọn giới tính"), !1) : $("#ddlRegistBirthday1 option:selected").val() == "0" ? (alert("Vui lòng chọn ngày sinh"), !1) : $("#ddlRegistBirthMonth1 option:selected").val() == "0" ? (alert("Vui lòng chọn tháng sinh"), !1) : $("#ddlRegistBirthYear1 option:selected").val() == "0" ? (alert("Vui lòng chọn năm sinh"), !1) : $("#Province1 option:selected").val() == "0" ? (alert("Vui lòng chọn tỉnh thành"), !1) : $("#District1 option:selected").val() == "0" || $("#District1 option:selected").val() == undefined ? (alert("Vui lòng chọn quận huyện."), !1) : $("#Ward1 option:selected").val() == "0" || $("#Ward1 option:selected").val() == undefined ? (alert("Vui lòng chọn phường xã."), !1) : $("#tbxAddress1").val() == "" ? ($("#tbxAddress1").focus(), !1) : $("#tbxPhone1").val() == "" ? ($("#tbxPhone1").focus(), !1) : !0
}
function checkInputRegBus() {
    return $("#FullName").val() == "" ? ($("#FullName").focus(), !1) : $("#Mobile").val() == "" ? ($("#Mobile").focus(), !1) : $("#Position").val() == "" ? ($("#Position").focus(), !1) : $("#CompanyName").val() == "" ? ($("#CompanyName").focus(), !1) : $("#Address").val() == "" ? ($("#Address").focus(), !1) : $("#CityId option:selected").val() == "0" ? (alert("Vui lòng thành phố"), !1) : !0
}
function checkEmail(n) {
    return n.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1 ? !0 : !1
}

var _customer, _JSRegister;
$(function () {
    _customer.DoLogOn(), _customer.DoLogOut(), _customer.DoForGotPass(), _customer.RequestPass(), _customer.UpdatePassword(), _customer.UpdateProfile(), _customer.UpdateAvata(), _customer.UploadAvata(), _customer.DeleteAvatar(), _customer.ProvinceChange()
}), _customer = {
    DoLogOn: function () {
        $("#emailLogin,#passwordLogin").keypress(function (n) {
            if (n.which == 13) return _customer.LogInNow()
        }), $("a.btnLogon", "#frLogin").unbind("click").click(function () {
            return _customer.LogInNow()
        })
        $("#emailsub").keypress(function (n) {
            if (n.which == 13) return _customer.SubEmail()
        }),$("a.btn-sub", "#frsubemail").unbind("click").click(function () {
            return _customer.SubEmail()
        }), $("#pop_fail .close_fail").unbind("click").click(function () {
            return $("#pop_fail .popfail-log").hide(), !1
        }), $(".trang-ca-nhan", ".userCart").unbind("click").click(function () {
            if ($("#userLogDiv").is(":hidden")) return $(".popfail-log span").html("Bạn hãy thực hiện đăng nhập trước nhé!"), $("#pop_fail .popfail-log").hide().slideDown(300), FocusAndSelect($("#emailLogin")), !1
        }), $(".dangtin", ".vcontent").unbind("click").click(function () {
            if ($("#userLogDiv").is(":hidden")) return $(".popfail-log span").html("Bạn hãy thực hiện đăng nhập trước nhé!"), $("#pop_fail .popfail-log").hide().slideDown(300), FocusAndSelect($("#emailLogin")), !1
        }),$(".vlogin", ".vcontent").unbind("click").click(function () {
            if ($("#userLogDiv").is(":hidden")) return FocusAndSelect($("#emailLogin")), !1
        }),$(".vregist", ".vcontent").unbind("click").click(function () {
            if ($("#userLogDiv").is(":hidden")) return FocusAndSelect($("#emailLogin")), !1
        })
    },
    LogInNow: function () {
        return $("#emailLogin").val() == "" ? (alert("Vui lòng nhập địa chỉ Email"), FocusAndSelect($("#emailLogin")), !1) : IsValidEmail($("#emailLogin").val()) ? $("#passwordLogin").val() == "" ? (alert("Vui lòng nhập mật khẩu"), FocusAndSelect($("#passwordLogin")), !1) : ($.ajax({
            url: "/jquery/login.php",
            type: "POST",
            dataType: "html",
            data: $("#frLogin").serialize(),
            beforeSend: function () {
                $(".login_loading").css("display", "block")
            },
            success: function (n) {
                if (n == "0") $(".popfail-log span").html("Tài khoản đăng nhập không khớp."), $("#pop_fail .popfail-log").hide().slideDown(300), $("#userNotLogDiv").css("display", "block"), $("#userLogDiv").css("display", "none"), FocusAndSelect($("#emailLogin"));
                else if (n == "-1") $(".popfail-log span").html("Tài khoản của bạn tạm thời bị khóa."), $("#pop_fail .popfail-log").hide().slideDown(300), $("#userNotLogDiv").css("display", "block"), $("#userLogDiv").css("display", "none");
                else {
                    var i = n.split("*");
                    $("#userNotLogDiv").css("display", "none"), $("#userLogDiv").css("display", "block"), i[0] != null && $("#ctm_email").html(i[0]), i[1] != null && i[1] * 1 > 0 && ($(".mail-note").attr("title", "Bạn có " + i[1] + " tin nhắn mới"), $(".mail-note .number").html(i[1]), $(".mail-note").attr("style", "display:inline-block;")), $("#pop_fail .popfail-log").css("display", "none"), $(location).attr("href").indexOf("gio-hang") != -1 && (window.location.href = "/gio-hang")
                }
            },
            error: function () {
                alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
            },
            complete: function () {
                $(".login_loading").hide()
            }
        }), !1) : (alert("Địa chỉ email không đúng định dạng"), FocusAndSelect($("#emailLogin")), !1)
    },
    DoLogOut: function () {
        $("a.btnLogOut").click(function () {
            $.ajax({
                url: "/jquery/logout.php",
                type: "POST",
                dataType: "html",
                data: "",
                beforeSend: function () {
                    $(".login_loading").css("display", "block")
                },
                success: function (n) {
                    n == "1" ? ($("#userNotLogDiv").css("display", "block"), $("#userLogDiv").css("display", "none"), FocusAndSelect($("#emailLogin")), $(location).attr("href").indexOf("gio-hang") != -1 && (window.location.href = "/gio-hang"), $(location).attr("href").indexOf("ThanhToan") != -1 && (window.location.href = "/gio-hang"), $(location).attr("href").indexOf("trang-ca-nhan") != -1 && (window.location.href = "/")) : 
					($("#frLogin").css("display", "none"),$("#frbinhluan").css("display", "none"), $(".customer_control").css("display", "inline"), $("#ctm_email").html("Chào bạn:<b>" + n + "</b>"))
                },
                error: function () {},
                complete: function () {
                    $(".login_loading").css("display", "none")
                }
            })
        })
    },
    DoForGotPass: function () {
        $("a.forgotpass").click(function (n) {
            n.preventDefault(), $("#mask").fadeIn(100);
            var i = $(window).height(),
                t = $(window).width();
            $("#dialog").css("top", i / 2 - $("#dialog").height() / 2), $("#dialog").css("left", t / 2 - $("#dialog").width() / 2), $("#dialog").fadeIn(100)
        }), $(".window .close").click(function (n) {
            n.preventDefault(), CloseMark()
        })
    },
    SubEmail: function () {
        return $("#emailsub").val() == "" ? (alert("Vui lòng nhập địa chỉ Email"), 
		FocusAndSelect($("#emailsub")), !1) : IsValidEmail($("#emailsub").val()) ? ($.ajax({
            url: "/jquery/emailsub.php",
            type: "POST",
            dataType: "html",
            data: $("#frsubemail").serialize(),
            beforeSend: function () {
                $(".subscribe_loading").css("display", "block")
            },
            success: function (n) {
				var i = n.split("*");
                if (i[0] == "1") alert("Đăng ký thành công địa chỉ email "+i[1]+"!");
                else if (i[0] == "-1") alert("Địa chỉ email "+i[1]+" đã tồn tại trong hệ thống!");
                else alert("Đăng ký thất bại vui lòng kiểm tra lại!");
            },
            error: function () {
                alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
            },
            complete: function () {$(".subscribe_loading").hide(); $("#emailsub").attr("value","Nhập email của bạn")}
        }), !1) : (alert("Địa chỉ email không đúng định dạng"), FocusAndSelect($("#emailsub")), !1)
    },
    RequestPass: function () {
        $(".forgot-item-btn").unbind("click").click(function () {
            return $("#tbxForGotEmail").val() == "" ? (alert("Vui lòng nhập địa chỉ Email"), FocusAndSelect($("#tbxForGotEmail")), !1) : IsValidEmail($("#tbxForGotEmail").val()) ? $("#tbxForGotCaptcha").val() == "" ? (alert("Vui lòng nhập mã xác nhận"), FocusAndSelect($("#tbxForGotCaptcha")), !1) : ($.ajax({
                url: "/jquery/forgotpassword.php",
                type: "POST",
                dataType: "html",
                data: $("#frmgetpass").serialize(),
                beforeSend: function () {
                    $(".fwaiting").css("display", "inline")
                },
                success: function (n) {
                    n == "0" ? alert("Tác vụ không thành công, bạn thử kiểm tra lại thông tin nhập vào !!!") : (alert("Thông tin yêu cầu đã được gửi về địa chỉ email.\n Bạn hãy kiểm tra email để lấy thông tin mật khẩu."), CloseMark())
                },
                error: function () {
                    alert("Tác vụ không thành công, bạn thử kiểm tra lại thông tin nhập vào"), window.location.reload(!0)
                },
                complete: function () {
                    $("#tbxForGotEmail").val(""), $("#tbxForGotCaptcha").val(""), $(".fwaiting").hide()
                }
            }), !1) : (alert("Địa chỉ email không đúng định dạng"), FocusAndSelect($("#tbxForGotEmail")), !1)
        })
    },
    UpdatePassword: function () {
        $(".item_r_changepass").unbind("click").click(function () {
            if (CheckEmptyInput($("#tbxOldPass")) && CheckEmptyInput($("#tbxNewPass"))) {
                if ($("#tbxNewPass").val().length < 4) {
                    alert("Mật khẩu phải lớn hơn 4 ký tự.");
                    return
                }
                if (CheckEmptyInput($("#tbxReNewPass"))) {
                    if ($("#tbxNewPass").val() != $("#tbxReNewPass").val()) {
                        alert("Mật khẩu xác nhận không chính xác."), FocusAndSelect($("#tbxReNewPass"));
                        return
                    }
                    return $.ajax({
                        url: "/jquery/changepassword.php",
                        type: "POST",
                        dataType: "html",
                        data: $("#frmChangePass").serialize(),
                        beforeSend: function () {
                            $(".waiting_updatepass").css("display", "inline")
                        },
                        success: function (n) {
                            n == "0" ? alert("Mật khẩu cũ không đúng.\nBạn hãy kiểm tra lại.") : (n == "-1" ? alert("Bạn hãy đăng nhập lại để thực hiện thao tác.") : alert("Bạn đã cập nhật thông tin mật khẩu thành công !!!"), window.location.href = window.location.href)
                        },
                        error: function () {
                            alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
                        },
                        complete: function () {
                            $(".waiting_updatepass").css("display", "none")
                        }
                    }), !1
                }
            }
        })
    },
    UpdateProfile: function () {
        $(".item_r_update").unbind("click").click(function () {
            if (CheckEmptyInput($("#tbxFullName"))) return CheckEmptyInput($("#tbxAddress")) ? CheckEmptyInput($("#tbxMobile")) ? PutDataBeforeSend() ? ($.ajax({
                url: "/jquery/updateprofile.php",
                type: "POST",
                dataType: "html",
                data: $("#frmUpdateProfile").serialize(),
                beforeSend: function () {
                    $(".waiting_updateprofile").css("display", "inline")
                },
                success: function (n) {
                    n == "0" ? alert("Cập nhật không thành công. Bạn hãy thử lại") : (alert("Cập nhật thông tin cá nhân thành công !!!"), window.location.href = window.location.href)
                },
                error: function () {
                    alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
                },
                complete: function () {
                    $(".waiting_updateprofile").css("display", "none")
                }
            }), !1) : void 0 : void 0 : void 0
        })
    },
    UpdateAvata: function () {
        $(".item_ava_update").click(function () {
            if ($("input:radio[name=rdAvataChoice]:checked").val() == undefined) {
                alert("Vui lòng chọn hình đại diện mặc định trong danh sách");
                return
            }
            return $.ajax({
                url: "/jquery/update_defalt_image.php",
                type: "POST",
                dataType: "html",
                data: $("#frmChangeAvata").serialize(),
                beforeSend: function () {
                    $(".change_img_waitting").css("display", "block")
                },
                success: function (n) {
                    var r = n.split("**"),
                        i;
                    r[0] == "1" && (i = "/static/user/default/" + r[1], $(".c_img img").attr("src", i), $(".del_img").css("display", "inline"))
                },
                error: function () {
                    alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
                },
                complete: function () {
                    $(".change_img_waitting").css("display", "none")
                }
            }), !1
        })
    },
    UploadAvata: function () {
        $("#btnUploadAvata").click(function () {
            return $("#fileAvata").val() == "" ? (alert("Vui lòng chọn một hình ảnh để tải lên"), !1) : ($(".change_img_waitting").css("display", "block"), $("#hiddenUpload").unbind("load").load(function () {
                var r = $(this),
                    n = $("#hiddenUpload").contents().find("body").html().split("**"),
                    t, i;
                n[0] == "1" ? (t = "/static/" + n[1], $(".c_img img").attr("src", t), $("#fileAvata").val(""), $(".del_img").css("display", "inline")) : (i = "<img style='float:left;margin-top:3px;margin-left:10px;margin-right:10px;' alt='' src='/Content/Theme-02-2012/images/ava_error.png'/>" + n[1], $(".up_erro_msg").html(i), $(".up_erro_msg").fadeIn(), setTimeout(function () {
                    $(".up_erro_msg").fadeOut(), $("#fileAvata").val("")
                }, 3e3)), $(".change_img_waitting").css("display", "none")
            }), $("#frmChangeAvata").attr("target", "hiddenUpload"), $("#frmChangeAvata").submit(), !1)
        })
    },
    DeleteAvatar: function () {
        $(".del_img a").click(function () {
            return confirm("Bạn có chắc chắn xóa hình đại diện của mình không ???") ? ($.ajax({
                url: "/jquery/del_avatar.php",
                type: "POST",
                dataType: "html",
                data: "",
                beforeSend: function () {
                    $(".change_img_waitting").css("display", "block")
                },
                success: function (n) {
                    var r = n.split("**"),
                        i;
                    r[0] == "1" && (i = "/static/user/default/" + r[1], $(".c_img img").attr("src", i), $(".del_img").css("display", "none"))
                },
                error: function () {
                    alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
                },
                complete: function () {
                    $(".change_img_waitting").css("display", "none")
                }
            }), !1) : !1
        })
    },
    ProvinceChange: function () {
        $("#Province").change(function () {
    		$("select#Province option:selected").val() == 0 ? $("select#District").attr("disabled", "disabled") : $("select#District").removeAttr("disabled"), $.ajax({
                type: "POST",
                url: "/jquery/changeprovince.php",
                data: {
                    provinceID: $("select#Province option:selected").val()
                },
                success: function (n) {
                    $("#District").find("option").remove().end(), $("#District").append(n)
                }
            })
        });
		$("#District").change(function () {
			$("select#District option:selected").val() == 0 ? $("select#Ward").attr("disabled", "disabled") : $("select#Ward").removeAttr("disabled"), $.ajax({
                type: "POST",
                url: "/jquery/changedistrict.php",
                data: {
                    DistrictID: $("select#District option:selected").val()
                },
                success: function (n) {
                    $("#Ward").find("option").remove().end(), $("#Ward").append(n)
                }
            })
		
		})
    }
}, $(function () {
    _JSRegister.Init()
}), _JSRegister = {
    Init: function () {
        _JSRegister.ClickDangKy(), _JSRegister.ProvinceChange(), _JSRegister.SubmitRegisterPopup(), _JSRegister.SubmitRegisterBus(), _JSRegister.CloseRegisterBox(), _JSRegister.EscapeKeyPressed(".register-popup"), _JSRegister.NumberOnly("#tbxPhone1")
    },
    NumberOnly: function (n) {
        $(n).keyup(function () {
            this.value = this.value.replace(/[^0-9]/g, "")
        })
    },
    SubmitRegisterPopup: function () {
        $("form#RegisterForm .regist_btn1 a").unbind("click").click(function () {
            if (checkInputReg()) $(".reg-note").css("display", "none");
            else {
                $(".reg-note").css("display", "inline"), $(".reg-note").html("<span style='float:left;margin-top:3px;margin-left:3px;color:red;'>&#187; Vui lòng nhập đầy đủ thông tin bên dưới.</span>");
                return
            }
            $.ajax({
                type: "POST",
                url: "/jquery/memberregister.php",
                dataType: "html",
                data: $("#RegisterForm").serialize(),
				beforeSend: function () {$(".reg_loading").css("display", "block")},
                success: function (n) {
                    var i = n,
                        r = $("#RegisterPoint").val();
                    i == "1" ? ($(".mem-register .register-message").html("<b style='color:red'>Đăng ký thành công, bạn có thể tiến hàng MUA HÀNG và trò chuyện với mọi người!</b>"), alert("Đăng ký thành công, bạn có thể tiến hàng MUA HÀNG và trò chuyện với mọi người!"), $(".mem-register .register-message").css("display", "block"), $(".mem-register .register-message").css("color", "#292929"), _JSRegister.CloseRegisterBox(), location.href = location.href.replace("#", "")) : i == "3" ? ($(".mem-register .register-message").html("Email đã được sử dụng, hãy nhập email khác hoặc dùng chức năng quên mật khẩu."), $(".mem-register .register-message").css("display", "block")) : ($(".mem-register .register-message").html("Đăng ký không thành công, vui lòng kiểm tra lại thông tin."), $(".mem-register .register-message").css("display", "block"))
                },
				complete: function () {
                    $(".reg_loading").css("display", "none")
                }

            })
        })
    },
	SubmitRegisterBus: function () {
        $("form#RegisterForm .regist_bus a").unbind("click").click(function () {
            if (checkInputRegBus()) $(".reg-note").css("display", "none");
            else {
                $(".reg-note").css("display", "inline"), $(".reg-note").html("<span style='float:left;margin-top:3px;margin-left:3px;color:red;'>&#187; Vui lòng nhập đầy đủ thông tin bên dưới.</span>");
                return
            }
            $.ajax({
                type: "POST",
                url: "/jquery/regbus.php",
                dataType: "html",
                data: $("#RegisterForm").serialize(),
				beforeSend: function () {$(".reg_loading").css("display", "block")},
                success: function (n) {
                    var i = n,
                        r = $("#RegisterPoint").val();
                    i == "1" ? ($(".mem-register .register-message").html("<b style='color:red'>Cảm ơn quý khách, Chúng tôi sẽ phản hồi trong thời gian sớm nhất!</b>"), alert("Cảm ơn quý khách, Chúng tôi sẽ phản hồi trong thời gian sớm nhất!"), $(".mem-register .register-message").css("display", "block"), $(".mem-register .register-message").css("color", "#292929"), _JSRegister.CloseRegisterBox(), location.href = location.href.replace("#", "")) : ($(".mem-register .register-message").html("Đăng ký không thành công, vui lòng kiểm tra lại thông tin."),  alert("Đăng ký không thành công, vui lòng kiểm tra lại thông tin."),$(".mem-register .register-message").css("display", "block"))
                },
				complete: function () {
                    $(".reg_loading").css("display", "none")
                }

            })
        })
    },
    ProvinceChange: function () {
        $("#Province1").change(function () {
            $("select#Province1 option:selected").val() == 0 ? $("select#District1").attr("disabled", "disabled") : $("select#District1").removeAttr("disabled"), $.ajax({
                type: "POST",
                url: "/jquery/changeprovince.php",
                data: {
                    provinceID: $("select#Province1 option:selected").val()
                },
                success: function (n) {
                    $("#District1").find("option").remove().end(), $("#District1").append(n)
                }
            })
        });
		$("#District1").change(function () {
			$("select#District1 option:selected").val() == 0 ? $("select#Ward1").attr("disabled", "disabled") : $("select#Ward1").removeAttr("disabled"), $.ajax({
                type: "POST",
                url: "/jquery/changedistrict.php",
                data: {
                    DistrictID: $("select#District1 option:selected").val()
                },
                success: function (n) {
                    $("#Ward1").find("option").remove().end(), $("#Ward1").append(n)
                }
            })
		
		})
    },
    ClickDangKy: function () {
        $(".btnDangKy").unbind("click").click(function () {
            _JSRegister.ResetRegForm(), _JSRegister.CheckLogin()
        })
    },
    ShowRegisterBox: function () {
        var n, i, t;
        $("#userLogDiv").css("display") == "none" ? (n = $(".register-popup"), OpenMark(), i = $(window).height(), t = $(window).width(), $(n).css("top", i / 2 - $(n).height() / 2), $(n).css("left", t / 2 - $(n).width() / 2), $(n).fadeIn(100), $(n).css("display", "inline-block")) : alert("Bạn đã đăng ký tài khoản tại Cungre.vn")
    },
    CloseRegisterBox: function () {
        $(".btnClose").click(function () {
            $(".register-popup").hide(), CloseMark()
        })
    },
    EscapeKeyPressed: function (n) {
        $(document).keypress(function (t) {
            t.keyCode == 27 && ($(n).hide(), CloseMark())
        })
    },
    CheckLogin: function () {
        return $.ajax({
            type: "POST",
            url: "/jquery/checklogin.php",
            data: {},
            success: function (n) {
                n == "0" ? _JSRegister.ShowRegisterBox() : window.location = "/"
            },
            error: function () {
                return !1
            }
        }), !1
    },
    ResetRegForm: function () {
        $(".register-popup input, select").val(""), $(".mem-register .register-message").html("")
    }
}