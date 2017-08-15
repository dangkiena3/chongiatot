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
                    $("#frdost2 #npage").val(t), $(".ls_deal_of_category .ls_cate_product2").append($(n).find(".ls_cate_product2").html()), $(".ls_deal_of_category .loading_more").hide(), _xdealcate.pause = !1
                }), $("#frdost2").attr("target", "ifrdost2"), $("#frdost2").submit(), !1)
            }
        })
    }
};
$(function () {
    var n = new FrontEndMenu;
    n.Selectmenu(0), _glbInitLazyLoad.init(".ls_deal_of_category img"), _xdealcate.init()
}),
function (n) {
    n.fn.easySlider = function (t) {
        var i = {
            prevId: "prevBtn",
            prevText: "Previous",
            nextId: "nextBtn",
            nextText: "Next",
            controlsShow: !0,
            controlsBefore: "",
            controlsAfter: "",
            controlsFade: !0,
            firstId: "firstBtn",
            firstText: "First",
            firstShow: !1,
            lastId: "lastBtn",
            lastText: "Last",
            lastShow: !1,
            vertical: !1,
            speed: 800,
            auto: !1,
            pause: 2e3,
            continuous: !1
        }, t = n.extend(i, t);
        this.each(function () {
            function f(u, c) {
                var v = i,
                    l, a;
                switch (u) {
                    case "next":
                        i = v >= e ? t.continuous ? 0 : e : i + 1;
                        break;
                    case "prev":
                        i = i <= 0 ? t.continuous ? e : 0 : i - 1;
                        break;
                    case "first":
                        i = 0;
                        break;
                    case "last":
                        i = e
                }
                l = Math.abs(v - i), a = l * t.speed, t.vertical ? (p = i * h * -1, n(">ul", r).animate({
                    marginTop: p
                }, a)) : (p = i * s * -1, n(">ul", r).animate({
                    marginLeft: p
                }, a)), !t.continuous && t.controlsFade && (i == e ? (n("#" + t.nextId).hide(), n("a", "#" + t.lastId).hide()) : (n("#" + t.nextId).show(), n("a", "#" + t.lastId).show()), i == 0 ? (n("#" + t.prevId).hide(), n("a", "#" + t.firstId).hide()) : (n("#" + t.prevId).show(), n("a", "#" + t.firstId).show())), c && clearTimeout(o), t.auto && (o = setTimeout(function () {
                    f("next", !1)
                }, l * t.speed + t.pause))
            }
            var r = n(this),
                c = n(">ul>li", r).length,
                s = n(">ul>li", r).width(),
                h = n(">ul>li", r).height(),
                e, i, u, o;
            r.width(s), r.height(h), r.css("overflow", "hidden"), e = c - 1, i = 0, n(">ul", r).css("width", c * s), t.vertical || n(">ul>li", r).css("float", "left"), t.controlsShow && (u = t.controlsBefore, t.firstShow && (u += '<span id="' + t.firstId + '"><a href="javascript:void(0);">' + t.firstText + "</a></span>"), u += ' <span id="' + t.prevId + '"><a href="javascript:void(0);">' + t.prevText + "</a></span>", u += ' <span id="' + t.nextId + '"><a href="javascript:void(0);">' + t.nextText + "</a></span>", t.lastShow && (u += ' <span id="' + t.lastId + '"><a href="javascript:void(0);">' + t.lastText + "</a></span>"), u += t.controlsAfter, n(r).after(u)), n("#" + t.nextId).click(function () {
                f("next", !0)
            }), n("#" + t.prevId).click(function () {
                f("prev", !0)
            }), n("a", "#" + t.firstId).click(function () {
                f("first", !0)
            }), n("a", "#" + t.lastId).click(function () {
                f("last", !0)
            }), t.auto && (o = setTimeout(function () {
                f("next", !1)
            }, t.pause)), !t.continuous && t.controlsFade && (n("#" + t.prevId).hide(), n("a", "#" + t.firstId).hide())
        })
    }
}(jQuery)