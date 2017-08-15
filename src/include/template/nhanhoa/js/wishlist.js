function hilightZebraCrossing(n) {
    n == null && (n = ".lstable"), $("tbody tr:odd", n)
        .removeClass("even")
        .addClass("odd"), $("tbody tr:even", n)
        .removeClass("odd")
        .addClass("even")
}
function OpenMark() {
    var t = $(document)
        .height(),
        n = $(window)
            .width();
    $("#mask")
        .css({
        width: n,
        height: t
    }), $("#mask")
        .fadeIn(100), $("#mask")
        .fadeTo("fast", .8)
}
var _JSPersonalPage, _JSWishList;
$(function () {
    _JSPersonalPage.Init()
}), _JSPersonalPage = {
    Init: function () {
        _JSPersonalPage.ViewOrderDetailClick(), _JSPersonalPage.CloseOrderDetailBox(), _JSPersonalPage.EscapeKeyPressed(".order-detail-box"), _JSPersonalPage.HilightTable(".table-content .lstable"), _JSPersonalPage.HilightTable(".orderdetail-table"), _JSPersonalPage.Selectmenu2(3), _JSPersonalPage.LookUpPaymentMethodClick(), _JSPersonalPage.NumberOnly("#tbxMobile")
    },
    HilightTable: function (n) {
        n == null && (n = ".lstable"), $(">tbody >tr:odd", n)
            .removeClass("even")
            .addClass("odd"), $(">tbody >tr:even", n)
            .removeClass("odd")
            .addClass("even")
    },
    NumberOnly: function (n) {
        $(n)
            .keyup(function () {
            this.value = this.value.replace(/[^0-9]/g, "")
        })
    },
    ViewOrderDetailClick: function () {
        $(".lstable tbody a.btnViewDetail")
            .click(function () {
            var r = $(this)
                .parent(),
                n = $(".detail-box .order-detail-box", r),
                t, i;
            OpenMark(), t = $(window)
                .height(), i = $(window)
                .width(), $(n)
                .css("top", t / 2 - $(n)
                .height() / 2 - 100), $(n)
                .css("left", i / 2 - $(n)
                .width() / 2), $(n)
                .fadeIn(100)
        })
    },
    CloseOrderDetailBox: function () {
        $(".btnClose")
            .click(function () {
            $(".detail-box .order-detail-box")
                .hide(), CloseMark()
        })
    },
    EscapeKeyPressed: function (n) {
        $(document)
            .keypress(function (t) {
            t.keyCode == 27 && ($(n)
                .hide(), CloseMark())
        })
    },
    Selectmenu: function (n) {
        $("#navMenu .navbar ul li a")
            .removeClass("selected"), $(".rightContent .personal .content ul li")
            .removeClass("selected"), $(".rightContent .personal .content ul li:eq(" + n + ")")
            .addClass("selected")
    },
    Selectmenu2: function (n) {
        $("#navMenu .navbar ul li a")
            .removeClass("selected"), $(".leftContent .personal-nav .personal-bar ul li")
            .removeClass("selected"), $(".leftContent .personal-nav .personal-bar ul li:eq(" + n + ")")
            .addClass("selected")
    },
    LookUpPaymentMethodClick: function () {
        $(".lstable tbody td .btnLookupTT")
            .click(function () {
            var n = $(this)
                .attr("posit");
            $.scrollTo(".pttt-index-" + n, 500)
        })
    }
}, $(function () {
    _JSWishList.Init()
}), _JSWishList = {
    Init: function () {
        _JSWishList.LikeClick(), _JSWishList.WishListPageIndexClick(), _JSWishList.RemoveItem()
    },
    LikeClick: function () {
        $(".ilikeit")
            .unbind("click")
            .click(function () {
            var n = $(this).attr("likeId");
            return $.ajax({
                url: "/jquery/likedeal.php?id=" + n,
                type: "GET",
                dataType: "html",
                data: {},
                beforeSend: function () {},
                success: function (n) {
                    n == "-1" ? _login.ShowFormLoginNoScroll(_JSWishList.callback) : (n == "1" || n == "2") && $(".divWishList")
                        .html("<span class='liked'>Đã thêm thành công</span>")
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
    LoadWishList: function (n) {
        $.ajax({
            url: "/jquery/favourite_list.php",
            type: "POST",
            dataType: "html",
            data: {
                page: n
            },
            beforeSend: function () {
                $("#back-top .scrolltop")
                    .click()
            },
            success: function (n) {
                $(".wishlist-content").html($(n).find(".wishlist-content").html()), _JSWishList.WishListPageIndexClick(), _JSWishList.RemoveItem()
            },
            error: function () {},
            complete: function () {}
        })
    },
    RemoveItem: function () {
        $(".buttonRemoveItem")
            .unbind("click")
            .click(function () {
            var n = $(this)
                .attr("remove");
            $.ajax({
                url: "/jquery/dellikedeal.php?id=" + n,
                type: "GET",
                dataType: "html",
                data: {},
                beforeSend: function () {
                    $("#back-top .scrolltop")
                        .click()
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
    }
}