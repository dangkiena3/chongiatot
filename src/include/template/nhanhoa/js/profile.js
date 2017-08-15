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
$(function () {
    _JSPersonalPage.Init()
});
var _JSPersonalPage = {
    Init: function () {
        _JSPersonalPage.ViewOrderDetailClick(), _JSPersonalPage.CloseOrderDetailBox(), _JSPersonalPage.EscapeKeyPressed(".order-detail-box"), _JSPersonalPage.HilightTable(".table-content .lstable"), _JSPersonalPage.HilightTable(".orderdetail-table"), _JSPersonalPage.Selectmenu2(0), _JSPersonalPage.LookUpPaymentMethodClick(), _JSPersonalPage.NumberOnly("#tbxMobile")
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
    /*Selectmenu2: function (n) {
        $("#navMenu .navbar ul li a")
            .removeClass("selected"), $(".leftContent .personal-nav .personal-bar ul li")
            .removeClass("selected"), $(".leftContent .personal-nav .personal-bar ul li:eq(" + n + ")")
            .addClass("selected")
    },*/
    LookUpPaymentMethodClick: function () {
        $(".lstable tbody td .btnLookupTT")
            .click(function () {
            var n = $(this)
                .attr("posit");
            $.scrollTo(".pttt-index-" + n, 500)
        })
    }
}