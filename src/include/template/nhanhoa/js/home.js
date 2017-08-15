function FrontEndMenu() {
    return {
        Selectmenu: function (n) {
            $("#navMenu .navbar ul li a").removeClass("selected"), $("#navMenu .navbar ul li a:eq(" + n + ")").addClass("selected")
        }
    }
}
$(function () {
    var n = new FrontEndMenu;
    n.Selectmenu(0), _homexdeal.init()
});
var _homexdeal = {
    init: function () {
        _homexdeal.display_size(), _homexdeal.lazyload()
    },
    display_size: function () {
        var n = $("#divDealNoibat .dealItem").size();
        n == 0 && (n = $("#divDealNoibat .hotItem").size()), $("#_hometotalitem").text(n)
    },
    lazyload: function () {
        _glbInitLazyLoad.init(".ls_cate_home_product img")
    }
};
(function (n) {
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
})(jQuery)