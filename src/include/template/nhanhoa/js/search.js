function FrontEndMenu() {
    return {
        Selectmenu: function (n) {
            $("#navMenu .navbar ul li a").removeClass("selected"), $("#navMenu .navbar ul li a:eq(" + n + ")").addClass("selected")
        }
    }
}
var _xdealcate = {
    init: function () {
        this.loadbestseller(), this.loadMore()
    },
    loadbestseller: function () {
        $("#ifrdost").unbind("load").load(function () {
            var n = $("#ifrdost").contents().find("body").html();
            $("#slider").html($(n).find("#slider").html()), $("#slider").easySlider({
                auto: !0,
                continuous: !0,
                pause: 4e3,
                speed: 500,
                prevId: "bob_prev",
                prevText: "",
                nextId: "bob_next",
                nextText: ""
            })
        }), $("#frdost").attr("target", "ifrdost"), $("#frdost").submit()
    },
    pause: !1,
    loadMore: function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() + 200 >= $(document).height() - $(window).height() && _xdealcate.pause == !1) {
                _xdealcate.pause = !0;
                var n = $("#frdost2 #npage").val();
                return n == 0 ? !1 : ($(".ls_deal_of_category .loading_more").show(), $("#ifrdost2").unbind("load").load(function () {
                    var n = $("#ifrdost2").contents().find("body").html(),
                        t = $(n).find("#npage").val();
                    $("#frdost2 #npage").val(t), $(".ls_deal_of_category .ls_cate_product").append($(n).find(".ls_cate_product").html()), $(".ls_deal_of_category .loading_more").hide(), _xdealcate.pause = !1
                }), $("#frdost2").attr("target", "ifrdost2"), $("#frdost2").submit(), !1)
            }
        })
    }
};
$(function () {
    var n = new FrontEndMenu;
    n.Selectmenu(0), _glbInitLazyLoad.init(".ls_deal_of_category img"), _xdealcate.init()
})