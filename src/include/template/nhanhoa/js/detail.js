function ShowReplyTopic(id){ 
	if(document.getElementById("dSubCommentCont_"+id).style.display=="none"){									
	jQuery('#dSubCommentCont_'+id).show();
	return;
	}else{
	jQuery('#dSubCommentCont_'+id).hide();
	}
}
function ws_blinds(n, t, i) {
    var u = jQuery,
        e = 3,
        f, r, o;
    for (t.each(function (n) {
        n && u(this).hide()
    }), f = u("<div></div>"), f.css({
        position: "absolute",
        width: n.width + "px",
        height: n.height + "px",
        left: (n.outWidth - n.width) / 2 + "px",
        top: (n.outHeight - n.height) / 2 + "px"
    }), i.append(f), r = [], o = 0; o < e; o++) r[o] = u("<div></div>");
    u(r).each(function (n) {
        u(this).css({
            position: "absolute",
            "z-index": 2,
            "background-repeat": "no-repeat",
            height: "100%",
            border: "none",
            margin: 0,
            top: 0,
            left: Math.round(100 / e) * n + "%",
            width: (n < e - 1 ? Math.round(100 / e) : 100 - Math.round(100 / e) * (e - 1)) + "%"
        }), f.append(this), f.hide()
    }), this.go = function (i, e, o) {
        function l(f, e) {
            var o = r[f],
                c = o.width(),
                s = t.get(i);
            o.css({
                "background-position": (h ? u(s).width() - o.position().left : -u(s).width()) + "px 0",
                "background-image": "url(" + s.src + ")"
            }), o.animate({
                "background-position": -o.position().left + "px 0"
            }, n.duration / (r.length + 1) * (h ? r.length - f + 1 : f + 2), e)
        }
        function c() {
            t.hide(), u(t.get(i)).show(), f.hide(), u(r).each(function () {
                u(this).css({
                    "background-image": "none"
                })
            })
        }
        var h = e > i ? 1 : 0,
            s;
        if (o) if (o <= -1) i = (e + 1) % t.length, h = 0;
        else if (o >= 1) i = (e - 1 + t.length) % t.length, h = 1;
        else return -1;
        for (s = 0; s < r.length; s++) r[s].stop(!0, !0);
        for (f.show(), s = 0; s < r.length; s++) l(s, !h && s == r.length - 1 || h && !s ? c : null);
        return i
    }
}
function ws_basic(n, t, i) {
    var u = jQuery,
        f = i.children(),
        r = u('<div style="position:relative;"></div>');
    i.append(r), r.append(f), i.css({
        position: "relative",
        overflow: "hidden"
    }), r.css({
        position: "relative",
        width: n.outWidth * t.length * 1.1 + "px",
        left: 0,
        top: 0
    }), t.css({
        position: "static"
    }), this.go = function (i) {
        return r.stop(!0).animate({
            left: -u(t.get(i)).position().left
        }, n.duration, "easeInOutExpo"), i
    }
}
function QuantityDow() {
     var curquantity = $('#prosl').val();
     if (curquantity != null && parseInt(curquantity) > 1) {
         $('#prosl').val(parseInt(curquantity) - 1);
     }
 }

 function QuantityUp() {
     var curquantity = $('#prosl').val();
     if (curquantity != null && parseInt(curquantity) >= 1) {
         $('#prosl').val(parseInt(curquantity) + 1);
     }
 }
function ws_fade(n, t) {
    var i = jQuery;
    t.each(function (n) {
        n ? i(this).hide() : i(this).show()
    }), this.go = function (r, u) {
        return i(t.get(r)).fadeIn(n.duration), i(t.get(u)).fadeOut(n.duration), r
    }
}
function FrontEndMenu() {
    return {
        Selectmenu: function (n) {
            $("#navMenu .navbar ul li a").removeClass("selected"), $("#navMenu .navbar ul li a:eq(" + n + ")").addClass("selected")
        }
    }
}
function JsDealDetail() {
    var o = function () {
        $("#btnGopYSanPham").click(function () {
            var n = $.trim($("#txtCommentContent").val());
            n.length > 10 ? $("#userNotLogDiv").css("display") != "none" ? _login.ShowFormlogin() : t() : alert("Vui lòng nhập nội dung bình luận nhiều hơn 10 ký tự")
        })
    }, p = function () {
        $(".btnsendComment").click(function () {
		var id = this.id;
        var n = $.trim($("#txtSubComment_"+id).val());
        n.length > 10 ? $("#userNotLogDiv").css("display") != "none" ? _login.ShowFormlogin() : s(id) : alert("Vui lòng nhập nội dung bình luận nhiều hơn 10 ký tự")
        })
    }, s = function (id) {
        $("#ifpostReply").unbind("load").load(function () { 
            var n = $("#ifpostReply").contents().find("body").html(),
                r = "<span>Cảm ơn bạn đã gửi bình luận. Hệ thống sẽ kiểm tra nội dung trước khi hiển thị.</span>",
                i = "<span>Xin lỗi, Server đang bận nên bạn không thể gửi góp ý vào lúc này!</span>",
                t = "<span>Xin lỗi, chúng tôi nghi ngại rằng đây là nội dung SPAM. Vui lòng gửi lại sau!</span>";
            n.indexOf("-1") == -1 ? n.indexOf("-2") == -1 ? ($("form#formCommentReply"+id)[0].reset(), $(".divReplyNoteSuccess").html(r), $(".divReplyNoteSuccess").show(), $(".divReplyNoteError").hide()) : ($("form#formCommentReply"+id)[0].reset(), $(".divReplyNoteError").html(t), $(".divReplyNoteSuccess").hide(), $(".divReplyNoteError").show()) : ($(".divReplyNoteError").html(i), $(".divReplyNoteSuccess").hide(), $(".divReplyNoteError").show())
        }), $("#formCommentReply"+id).attr("target", "ifpostReply"), $("#formCommentReply"+id).submit()
    }, t = function () {
        $("#ifpost").unbind("load").load(function () {
            var n = $("#ifpost").contents().find("body").html(),
                r = "<span>Cảm ơn bạn đã gửi bình luận. Hệ thống sẽ kiểm tra nội dung trước khi hiển thị.</span>",
                i = "<span>Xin lỗi, Server đang bận nên bạn không thể gửi góp ý vào lúc này!</span>",
                t = "<span>Xin lỗi, chúng tôi nghi ngại rằng đây là nội dung SPAM. Vui lòng gửi lại sau!</span>";
            n.indexOf("-1") == -1 ? n.indexOf("-2") == -1 ? ($("form#formComment")[0].reset(), $(".divCommentNoteSuccess").html(r), $(".divCommentNoteSuccess").show(), $(".divCommentNoteError").hide()) : ($("form#formComment")[0].reset(), $(".divCommentNoteError").html(t), $(".divCommentNoteSuccess").hide(), $(".divCommentNoteError").show()) : ($(".divCommentNoteError").html(i), $(".divCommentNoteSuccess").hide(), $(".divCommentNoteError").show())
        }), $("#formComment").attr("target", "ifpost"), $("#formComment").submit()
    }, e = function () {
        var t, n;
        $(".hotdealMenu li a").unbind("click").click(function () {
            $(".hotdealMenu li a.active").removeClass("active"), $(this).addClass("active");
            var r = $(this).attr("href"),
                t = $("#" + r, ".listHotDeal"),
                n = $(this).attr("id").replace("loadTabs_", "");
            return i(t, n), !1
        }), t = $("#loadTabs_1", ".hotdealMenu"), t.addClass("active"), n = $("#cung-danh-muc", ".listHotDeal"), i(n, 1)
    }, i = function (t, i) {
        $(".cate_product_item", t).size() == 0 ? ($(".hotdealMenu .loading").show(), $("#frdostpid").val("1"), $("#frdosttid").val(i), $("#ifrdost").unbind("load").load(function () {
            var i = $("#ifrdost").contents().find("body").html();
            $(".listdeals", ".listHotDeal").hide(), t.html($(i).find(".listHotDeal").html()), t.show(), _glbInitLazyLoad.init($("img", t)), $(".hotdealMenu .loading").hide(), n()
        }), $("#frdost").attr("target", "ifrdost"), $("#frdost").submit()) : ($(".listdeals", ".listHotDeal").hide(), t.show())
    }, n = function () {
        $(".divLoadingMore", ".listdeals").unbind("click").click(function () {
            var r = $(".hotdealMenu li a.active").attr("id").replace("loadTabs_", ""),
                i = $(this),
                u = $(this).attr("npage"),
                t;
            return $(".imgLoading img", i).show(), t = i.parents(".listdeals"), $("#frdostpid").val(u), $("#frdosttid").val(r), $("#ifrdost").unbind("load").load(function () {
                var r = $("#ifrdost").contents().find("body").html();
                $(".divLoadingMore", t).remove(), t.append($(r).find(".listHotDeal").html()), $(".imgLoading img", i).hide(), n()
            }), $("#frdost").attr("target", "ifrdost"), $("#frdost").submit(), !1
        })
    }, f = function () {
        $("#ifrdost2").unbind("load").load(function () {
            var n = $("#ifrdost2").contents().find("body").html();
            $(".divCommentContent").html($(n).find(".divCommentContent").html())
        }), $("#frdost2").attr("target", "ifrdost2"), $("#frdost2").submit(), $("#ifrdost3").unbind("load").load(function () {
            var n = $("#ifrdost3").contents().find("body").html();
            $(".thongtindeal_ads7").html($(n).find(".thongtindeal_ads7").html())
        }), $("#frdost3").attr("target", "ifrdost3"), $("#frdost3").submit()
    }, u = function () {
        _glbInitLazyLoad.init(".divDealDetail img")
    }, r = function () {
        $("#divdebar").appendTo("body")
    };
    return {
        InitAllFunctions: function () {
            e(), f(), o(), u(), r(), p()
        },
        AddNewCommentPL: function () {
            t(), s()
        }
    }
}
function OpenMark() {
    $("#mask").fadeIn(100)
}
function blockNotNumberInOptionQuantity(n) {
    var n = window.event || n;
    window.event ? (n.keyCode < 48 || n.keyCode > 57) && (n.returnValue = !1) : n.which != 8 && (n.which < 48 || n.which > 57) && n.preventDefault()
}
function sumQuantity(n) {
    return sumQuantt = 0, $(n).find(".option_item").each(function () {
        sumQuantt += $(this).find("#opQuantity").val()
    }), sumQuantt
}
var _login, effectName, indexEffect, opSlider, _jsOption, _JSWishList;
(function (n) {
    function i(n) {
        return typeof n == "object" ? n : {
            top: n,
            left: n
        }
    }
    var t = n.scrollTo = function (t, i, r) {
        n(window).scrollTo(t, i, r)
    };
    t.defaults = {
        axis: "xy",
        duration: parseFloat(n.fn.jquery) >= 1.3 ? 0 : 1
    }, t.window = function () {
        return n(window)._scrollable()
    }, n.fn._scrollable = function () {
        return this.map(function () {
            var t = this,
                r = !t.nodeName || n.inArray(t.nodeName.toLowerCase(), ["iframe", "#document", "html", "body"]) != -1,
                i;
            return r ? (i = (t.contentWindow || t).document || t.ownerDocument || t, n.browser.safari || i.compatMode == "BackCompat" ? i.body : i.documentElement) : t
        })
    }, n.fn.scrollTo = function (r, u, f) {
        return typeof u == "object" && (f = u, u = 0), typeof f == "function" && (f = {
            onAfter: f
        }), r == "max" && (r = 9e9), f = n.extend({}, t.defaults, f), u = u || f.speed || f.duration, f.queue = f.queue && f.axis.length > 1, f.queue && (u /= 2), f.offset = i(f.offset), f.over = i(f.over), this._scrollable().each(function () {
            function l(n) {
                c.animate(o, u, f.easing, n && function () {
                    n.call(this, r, f)
                })
            }
            var h = this,
                c = n(h),
                e = r,
                s, o = {}, a = c.is("html,body");
            switch (typeof e) {
            case "number":
            case "string":
                if (/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(e)) {
                    e = i(e);
                    break
                }
                e = n(e, this);
            case "object":
                (e.is || e.style) && (s = (e = n(e)).offset())
            }
            n.each(f.axis.split(""), function (n, i) {
                var y = i == "x" ? "Left" : "Top",
                    u = y.toLowerCase(),
                    r = "scroll" + y,
                    p = h[r],
                    w = t.max(h, i),
                    v;
                s ? (o[r] = s[u] + (a ? 0 : p - c.offset()[u]), f.margin && (o[r] -= parseInt(e.css("margin" + y)) || 0, o[r] -= parseInt(e.css("border" + y + "Width")) || 0), o[r] += f.offset[u] || 0, f.over[u] && (o[r] += e[i == "x" ? "width" : "height"]() * f.over[u])) : (v = e[u], o[r] = v.slice && v.slice(-1) == "%" ? parseFloat(v) / 100 * w : v), /^\d+$/.test(o[r]) && (o[r] = o[r] <= 0 ? 0 : Math.min(o[r], w)), !n && f.queue && (p != o[r] && l(f.onAfterFirst), delete o[r])
            }), l(f.onAfter)
        }).end()
    }, t.max = function (t, i) {
        var u = i == "x" ? "Width" : "Height",
            r = "scroll" + u;
        if (!n(t).is("html,body")) return t[r] - n(t)[u.toLowerCase()]();
        var o = "client" + u,
            e = t.ownerDocument.documentElement,
            f = t.ownerDocument.body;
        return Math.max(e[r], f[r]) - Math.min(e[o], f[o])
    }
})(jQuery), $(function () {
    _login.EscapeKeyPress(), _login.ButtonLoginClick(null), _login.CloseloginClick(), _login.KeyPressEvent()
}), _login = {
    KeyPressEvent: function () {
        $("#txtEmailPopup, #txtPasswordPopup, #cbPop_Remember").keypress(function (n) {
            n.which == 13 && $("#btnLoginPopup").trigger("click")
        })
    },
    ShowFormLoginNoScroll: function (n) {
        OpenMark(this), _login.OpenFormlogin(), _login.ButtonLoginClick(n)
    },
    ShowFormlogin: function () {
        OpenMark(this), _login.OpenFormlogin(), $.scrollTo(".divBuyBottom", 0)
    },
    ButtonLoginClick: function (n) {
        $("#btnLoginPopup").unbind("click").click(function () {
            _login.LogInNow(n)
        })
    },
    NoticeBind: function (n) {
        $(".login_notice").html(n), $(".login_notice").css("display", "inline")
    },
    ClearNotice: function () {
        setTimeout(function () {
            $(".login_notice").html(""), $(".login_notice").fadeOut("slow")
        }, 2e3)
    },
    OpenFormlogin: function () {
        var t = $(window).height(),
            n = $(window).width();
        $(".login_box").css("top", t / 2 - $(".login_box").height() / 2), $(".login_box").css("left", n / 2 - $(".login_box").width() / 2), $(".login_box").fadeIn(100), FocusAndSelect($("#txtEmailPopup"))
    },
    CloseFormlogin: function () {
        $(".login_box").css("display", "none")
    },
    ClearFormlogin: function () {
        $("#tbxloginFullName").val(""), $("#tbxloginEmail").val(""), $("#tbxloginPhone").val(""), $("#tbxloginContent").val(""), $("#tbxloginCaptcha").val("")
    },
    CloseloginClick: function () {
        $(".btnloginclose").click(function () {
            _login.ClearFormlogin(), _login.CloseFormlogin(), CloseMark()
        })
    },
    EscapeKeyPress: function () {
        $(document).keypress(function (n) {
            n.keyCode == 27 && (_login.CloseFormlogin(), CloseMark())
        })
    },
    LogInNow: function (n) {
        return $("#txtEmailPopup").val() == "" ? (alert("Vui lòng nhập địa chỉ Email"), FocusAndSelect($("#txtEmailPopup")), !1) : IsValidEmail($("#txtEmailPopup").val()) ? $("#txtPasswordPopup").val() == "" ? (alert("Vui lòng nhập mật khẩu"), FocusAndSelect($("#txtPasswordPopup")), !1) : ($.ajax({
            url: "/jquery/login.php",
            type: "POST",
            dataType: "html",
            data: $("#frmloginPopup").serialize(),
            beforeSend: function () {
                $(".login_loading_popup").css("display", "block")
            },
            success: function (t) {
                var r, u;
                t == "0" ? (alert("Tài khoản đăng nhập không đúng."), FocusAndSelect($("#txtEmailPopup"))) : window.location.href = './';
            },
            error: function () {
                alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
            },
            complete: function () {
			$(".login_loading_popup").hide()
            }
        }), !1) : (alert("Địa chỉ email không đúng định dạng"), FocusAndSelect($("#txtEmailPopup")), !1)
    }
}, this.imagePreview = function () {
    xOffset = 10, yOffset = 20, $("a.preview").hover(function (n) {
        this.t = this.title, this.title = "";
        var t = this.t != "" ? "<br/>" + this.t : "";
        $("body").append("<div id='preview'><span class='preview_title'><span class='title_prrr'>" + t + "</span></span><span class='preview_img'><img src='" + this.href + "' alt='ThietKeTrangChu Preview Deal Option' /></span></div>"), $("#preview").css("top", n.pageY - xOffset + "px").css("left", n.pageX + yOffset + "px").css("z-index", 9999).fadeIn("fast")
    }, function () {
        this.title = this.t, $("#preview").remove()
    }), $("a.preview").mousemove(function (n) {
        $("#preview").css("top", n.pageY - xOffset + "px").css("left", n.pageX + yOffset + "px")
    })
}, this.DealOptionSelect = function () {
    $("a.preview").click(function () {
        return $(this).parent().find("input[type=checkbox]").attr("checked") ? ($(this).parent().find("input[type=checkbox]").attr("checked", !1), $(this).parent().find("#hdOptionValue").val("0")) : ($(this).parent().find("input[type=checkbox]").attr("checked", !0), $(this).parent().find("#hdOptionValue").val($.trim($(this).attr("id").replace("dealopt_", "")))), $(this).parent().parent().parent().parent().find(".op_select_notice").html(""), !1
    })
}, this.CheckBoxClick = function () {
    $(".cb_select_opt input[type=checkbox]").click(function () {
        if ($(this).attr("checked")) {
            var n = $.trim($(this).attr("id").replace("cbOptionSelect_", ""));
            $(this).parent().find("#hdOptionValue").val(n)
        } else $(this).parent().find("#hdOptionValue").val("0");
        return
    })
}, this.LableCheckClick = function () {
    $(".label_check").click(function () {
        $(this).parent().parent().find("a.preview").trigger("click");
        return
    })
}, this.CheckChangeState = function () {
    $(".cb_select_opt input[type=checkbox]").change(function () {
        return $(this).attr("checked") ? ($(this).attr("checked", !1), $(this).parent().parent().find("#hdOptionValue").val($.trim($(this).parent().parent().find("a.preview").attr("id").replace("dealopt_", "")))) : ($(this).attr("checked", !0), $(this).parent().parent().find("#hdOptionValue").val("0")), !1
    })
}, $(document).ready(function () {
    imagePreview(), DealOptionSelect(), CheckBoxClick(), LableCheckClick()
}), $(function () {
    var t = new FrontEndMenu,
        n;
    t.Selectmenu(0), n = new JsDealDetail, n.InitAllFunctions()
}), $(function () {
    _jsOption.OptionInit()
}), _jsOption = {
    MuaNgayClick: function () {
        $(".divBtnBuy a.btnMuaNgay,.divBtnBuy a.btnMuaTang,a.btnMuaNgay").click(function () { 
            var n = $(".option_box:first"),
                f = _jsOption.CheckOption(n),
                r, i, qua;
			qua = $("#prosl").val();	
            /*if (parseInt(f) <= 1) r = $(n).find("#dealID").val(), i = $.trim($(n).find(".preview").attr("id").replace("dealopt_", "")), parseInt(r) > 0 && parseInt(i) > 0 && (window.location.href = "/dat-mua/" + r + "/" + i);*/
            if (parseInt(f) <= 1) r = $(n).find("#dealID").val(), i = $.trim($(n).find(".preview").attr("id").replace("dealopt_", "")), parseInt(r) > 0 && parseInt(i) > 0 && (window.location.href = "/dat-mua/" + i + "/" + qua);
            else {
                $("#divMain > .option_box").size() == 0 && $(n).appendTo("#divMain"), OpenMark(n);
                var u = $(window).height(),
                    e = $(window).width(),
                    t = u / 2 - $(".select_option").height() / 2 - 100;
                t = t < 0 ? 0 : t, $(n).find(".select_option").css("top", t), $(n).find(".select_option").css("left", e / 2 - $(".select_option").width() / 2), $(".select_option", n).height() > u ? $(".option_list", n).addClass("optionsOver") : $(".option_list", n).removeClass("optionsOver"), $(n).find(".select_option").fadeIn(100)
            }
            return !1
        })
    },
    CloseOptionForm: function () {
        $(".btnclose").click(function () {
            $(".select_option").hide(), CloseMark()
        })
    },
    SubmitFormAddCart: function () {
        $(".control_button").click(function () { 
            var n = !1;
            if ($(this).parent().parent().find(".option_list").find(".img_ls li").each(function () {
                parseInt($(this).find("#hdOptionValue").val()) != 0 && (n = !0)
            }), !n) { 
                $(this).parent().parent().find(".op_select_notice").html("<i>Vui lòng chọn một tùy chọn (click vào hình ảnh) để đặt mua</i>");
                return
            }
            return $.ajax({
                url: "/jquery/addcart.php",
                type: "POST",
                dataType: "html",
                data: $(this).parent().parent().parent().find("#AddToCart").serialize(),
                beforeSend: function () {},
                success: function (n) {
                   window.location.href = n == "0" ? "/" : "/gio-hang"
                },
                error: function () {
                    alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
                },
                complete: function () {}
            }), !1
        })
    },
    TextQuantityChange: function () {
        $(".select_option input:text").keyup(function () {
            $(this).parent().parent().parent().parent().find(".op_select_noticeop_select_notice").html(""), parseInt($(this).val()) > parseInt($(this).parent().find("#maxValue").val()) ? ($(this).val($(this).parent().find("#maxValue").val()), $(this).parent().parent().parent().parent().find(".op_select_notice").html("<i style='color:#E6572B;font-size:11px;'>Bạn không thể mua quá: <b>" + $(this).parent().find("#maxValue").val() + "</b> sản phẩm với lựa chọn đó</i>")) : parseInt($(this).val()) > 0 || $(this).val("0")
        })
    },
    CheckOption: function (n) {
        return $(n).find("ul.img_ls li").length
    },
    EscapeKeyPressed: function () {
        $(document).keypress(function (n) {
            n.keyCode == 27 && ($(".select_option").hide(), CloseMark())
        })
    },
    Reference_Click: function () {
        $(".xdeal_cart_now").unbind("click").click(function () {
            var n = $(this).parent("#divThongTinDeal");
            $("a.btnMuaNgay:first", n).trigger("click")
        })
    },
    OptionInit: function () {
        _jsOption.MuaNgayClick(), _jsOption.CloseOptionForm(), _jsOption.SubmitFormAddCart(), _jsOption.TextQuantityChange(), _jsOption.EscapeKeyPressed()
    }
}, $(function () {
    _JSWishList.Init()
}), _JSWishList = {
    Init: function () {
        _JSWishList.LikeClick(), _JSWishList.WishListPageIndexClick(), _JSWishList.RemoveItem()
    },
    LikeClick: function () {
        $(".ilikeit").unbind("click").click(function () {
            var n = $(this).attr("likeId");
            return $.ajax({
                url: "/jquery/likedeal.php?id=" + n,
                type: "GET",
                dataType: "html",
                data: {},
                beforeSend: function () {},
                success: function (n) {
                    n == "-1" ? _login.ShowFormLoginNoScroll(_JSWishList.callback) : (n == "1" || n == "2") && $(".divWishList").html("<span class='liked'>Đã thêm thành công</span>")
                },
                error: function () {},
                complete: function () {}
            }), !1
        })
    },
    callback: function () {
        return $(".ilikeit").trigger("click"), _login.ButtonLoginClick(null), !1
    },
    WishListPageIndexClick: function () {
        $("a", ".wishlist-content .divPager").unbind("click").click(function () {
            var n = $(this).attr("paging");
            return _JSWishList.LoadWishList(n), !1
        })
    },
    /*LoadWishList: function (n) {
        $.ajax({
            url: "/Customer/WishListIndex/",
            type: "POST",
            dataType: "html",
            data: {
                page: n
            },
            beforeSend: function () {
                $("#back-top .scrolltop").click()
            },
            success: function (n) {
                $(".wishlist-content").html($(n).find(".wishlist-content").html()), _JSWishList.WishListPageIndexClick(), _JSWishList.RemoveItem()
            },
            error: function () {},
            complete: function () {}
        })
    },
    RemoveItem: function () {
        $(".buttonRemoveItem").unbind("click").click(function () {
            var n = $(this).attr("remove");
            $.ajax({
                url: "/Customer/RemoveDealOutOfWishList?id=" + n,
                type: "GET",
                dataType: "html",
                data: {},
                beforeSend: function () {
                    $("#back-top .scrolltop").click()
                },
                success: function (n) {
                    if (n == "-1" && _login.ShowFormlogin(), n == "1") {
                        var r = $(".divPager span.selected"),
                            i = 1;
                        $(r).size() > 0 && (i = $.trim($(r).text())), _JSWishList.LoadWishList(i)
                    } else alert("Thao tác không thành công, vui lòng thử lại sau.")
                },
                error: function () {},
                complete: function () {}
            })
        })
    }*/
}
