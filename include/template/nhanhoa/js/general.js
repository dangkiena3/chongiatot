/*! jQuery license by Thietketrangchu.com */

function CloseMark() {
    $(".login_box").length != 0 ? $(".login_box").css("display") == "none" && $("#mask").hide() : $("#mask").hide(), $(".window").hide()
}
function SmoothMenu() {
    var i = function () {
        var n = $(window).width();
        n > 1255 && $(".divAdsBanner").show(), $(window).resize(function () {
            n = $(window).width(), n < 1255 ? $(".divAdsBanner").hide() : $(".divAdsBanner").show("slow")
        })
    }, t = function () {
        jQuery.fn.extend({
            smoothscroll: function () {
                var r = this,
                    u = 1,
                    t = !0,
                    i;
                jQuery(window).bind("scroll", function () {
                    var t = jQuery(document).scrollTop(),
                        i;
                    t > 145 && (t = parseInt(t), i = t + "px", jQuery(".divAdsBanner").css({
                        position: "absolute"
                    }).stop().animate({
                        top: i
                    }, 1, function () {
                        var n = jQuery(document).scrollTop();
                        n < 145 && jQuery(".divAdsBanner").animate({
                            top: 145
                        })
                    }))
                })
            }
        })
    }, n = function () {
        jQuery.browser.msie && jQuery.browser.version == "6.0" ? jQuery(".divAdsBanner").smoothscroll(jQuery(".divAdsBanner").offset().top) : jQuery(window).bind("scroll", function () {
            var t = jQuery(document).scrollTop();
            t > 145 ? jQuery(".divAdsBanner").addClass("fixedside").css({
                top: 0
            }) : jQuery(".divAdsBanner").removeClass("fixedside").css({
                top: 145
            })
        })
    };
    return {
        InitAllFunctions: function () {
            t(), n(), i()
        }
    }
}
function IsValidEmail(n) {
    var t = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return t.test(n)
}
function OpenMark() {
    $("#mask").fadeIn(100)
}
function blockNotPhoneNumber(n) {
    var n = window.event || n;
    window.event ? (n.keyCode < 48 || n.keyCode > 57) && (n.returnValue = !1) : n.which != 8 && (n.which < 48 || n.which > 57) && n.preventDefault()
}
function IsValidEmail(n) {
    var t = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return t.test(n)
}
var _glbInitLazyLoad, _checkBrowser, _gopy, _registmail;
(function (n, t) {
    function ct(n) {
        return i.isWindow(n) ? n : n.nodeType === 9 ? n.defaultView || n.parentWindow : !1
    }
    function at(n) {
        if (!ot[n]) {
            var e = r.body,
                t = i("<" + n + ">").appendTo(e),
                u = t.css("display");
            t.remove(), (u === "none" || u === "") && (f || (f = r.createElement("iframe"), f.frameBorder = f.width = f.height = 0), e.appendChild(f), a && f.createElement || (a = (f.contentWindow || f.contentDocument).document, a.write((r.compatMode === "CSS1Compat" ? "<!doctype html>" : "") + "<html><body>"), a.close()), t = a.createElement(n), a.body.appendChild(t), u = i.css(t, "display"), e.removeChild(f)), ot[n] = u
        }
        return ot[n]
    }
    function v(n, t) {
        var r = {};
        return i.each(or.concat.apply([], or.slice(0, t)), function () {
            r[this] = n
        }), r
    }
    function gu() {
        g = t
    }
    function bt() {
        return setTimeout(gu, 0), g = i.now()
    }
    function nf() {
        try {
            return new n.ActiveXObject("Microsoft.XMLHTTP")
        } catch (t) {}
    }
    function er() {
        try {
            return new n.XMLHttpRequest
        } catch (t) {}
    }
    function ku(n, r) {
        n.dataFilter && (r = n.dataFilter(r, n.dataType));
        for (var v = n.dataTypes, s = {}, l, p = v.length, a, f = v[0], h, y, u, o, e, c = 1; c < p; c++) {
            if (c === 1) for (l in n.converters) typeof l == "string" && (s[l.toLowerCase()] = n.converters[l]);
            if (h = f, f = v[c], f === "*") f = h;
            else if (h !== "*" && h !== f) {
                if (y = h + " " + f, u = s[y] || s["* " + f], !u) {
                    e = t;
                    for (o in s) if (a = o.split(" "), (a[0] === h || a[0] === "*") && (e = s[a[1] + " " + f], e)) {
                        o = s[o], o === !0 ? u = e : e === !0 && (u = o);
                        break
                    }
                }!u && !e && i.error("No conversion from " + y.replace(" ", " to ")), u !== !0 && (r = u ? u(r) : e(o(r)))
            }
        }
        return r
    }
    function du(n, i, r) {
        var h = n.contents,
            f = n.dataTypes,
            c = n.responseFields,
            o, u, e, s;
        for (u in c) u in r && (i[c[u]] = r[u]);
        while (f[0] === "*") f.shift(), o === t && (o = n.mimeType || i.getResponseHeader("content-type"));
        if (o) for (u in h) if (h[u] && h[u].test(o)) {
            f.unshift(u);
            break
        }
        if (f[0] in r) e = f[0];
        else {
            for (u in r) {
                if (!f[0] || n.converters[u + " " + f[0]]) {
                    e = u;
                    break
                }
                s || (s = u)
            }
            e = e || s
        }
        if (e) return e !== f[0] && f.unshift(e), r[e]
    }
    function ut(n, t, r, u) {
        if (i.isArray(t)) i.each(t, function (t, f) {
            r || uu.test(n) ? u(n, f) : ut(n + "[" + (typeof f == "object" || i.isArray(f) ? t : "") + "]", f, r, u)
        });
        else if (r || t == null || typeof t != "object") u(n, t);
        else for (var f in t) ut(n + "[" + f + "]", t[f], r, u)
    }
    function tr(n, r) {
        var u, f, e = i.ajaxSettings.flatOptions || {};
        for (u in r) r[u] !== t && ((e[u] ? n : f || (f = {}))[u] = r[u]);
        f && i.extend(!0, n, f)
    }
    function tt(n, i, r, u, f, e) {
        f = f || i.dataTypes[0], e = e || {}, e[f] = !0;
        for (var h = n[f], c = 0, l = h ? h.length : 0, s = n === et, o; c < l && (s || !o); c++) o = h[c](i, r, u), typeof o == "string" && (!s || e[o] ? o = t : (i.dataTypes.unshift(o), o = tt(n, i, r, u, o, e)));
        return (s || !o) && !e["*"] && (o = tt(n, i, r, u, "*", e)), o
    }
    function yi(n) {
        return function (t, r) {
            if (typeof t != "string" && (r = t, t = "*"), i.isFunction(r)) for (var s = t.toLowerCase().split(hi), e = 0, h = s.length, u, o, f; e < h; e++) u = s[e], f = /^\+/.test(u), f && (u = u.substr(1) || "*"), o = n[u] = n[u] || [], o[f ? "unshift" : "push"](r)
        }
    }
    function pi(n, t, r) {
        var u = t === "width" ? n.offsetWidth : n.offsetHeight,
            f = t === "width" ? pr : wr;
        return u > 0 ? (r !== "border" && i.each(f, function () {
            r || (u -= parseFloat(i.css(n, "padding" + this)) || 0), r === "margin" ? u += parseFloat(i.css(n, r + this)) || 0 : u -= parseFloat(i.css(n, "border" + this + "Width")) || 0
        }), u + "px") : (u = l(n, t, t), (u < 0 || u == null) && (u = n.style[t] || 0), u = parseFloat(u) || 0, r && i.each(f, function () {
            u += parseFloat(i.css(n, "padding" + this)) || 0, r !== "padding" && (u += parseFloat(i.css(n, "border" + this + "Width")) || 0), r === "margin" && (u += parseFloat(i.css(n, r + this)) || 0)
        }), u + "px")
    }
    function tf(n, t) {
        t.src ? i.ajax({
            url: t.src,
            async: !1,
            dataType: "script"
        }) : i.globalEval((t.text || t.textContent || t.innerHTML || "").replace(af, "/*$0*/")), t.parentNode && t.parentNode.removeChild(t)
    }
    function ai(n) {
        var t = (n.nodeName || "").toLowerCase();
        t === "input" ? di(n) : t !== "script" && typeof n.getElementsByTagName != "undefined" && i.grep(n.getElementsByTagName("input"), di)
    }
    function di(n) {
        (n.type === "checkbox" || n.type === "radio") && (n.defaultChecked = n.checked)
    }
    function d(n) {
        return typeof n.getElementsByTagName != "undefined" ? n.getElementsByTagName("*") : typeof n.querySelectorAll != "undefined" ? n.querySelectorAll("*") : []
    }
    function ki(n, t) {
        var r;
        t.nodeType === 1 && (t.clearAttributes && t.clearAttributes(), t.mergeAttributes && t.mergeAttributes(n), r = t.nodeName.toLowerCase(), r === "object" ? t.outerHTML = n.outerHTML : r !== "input" || n.type !== "checkbox" && n.type !== "radio" ? r === "option" ? t.selected = n.defaultSelected : (r === "input" || r === "textarea") && (t.defaultValue = n.defaultValue) : (n.checked && (t.defaultChecked = t.checked = n.checked), t.value !== n.value && (t.value = n.value)), t.removeAttribute(i.expando))
    }
    function bi(n, t) {
        if (t.nodeType === 1 && !! i.hasData(n)) {
            var f, u, o, s = i._data(n),
                e = i._data(t, s),
                r = s.events;
            if (r) {
                delete e.handle, e.events = {};
                for (f in r) for (u = 0, o = r[f].length; u < o; u++) i.event.add(t, f + (r[f][u].namespace ? "." : "") + r[f][u].namespace, r[f][u], r[f][u].data)
            }
            e.data && (e.data = i.extend({}, e.data))
        }
    }
    function ff(n) {
        return i.nodeName(n, "table") ? n.getElementsByTagName("tbody")[0] || n.appendChild(n.ownerDocument.createElement("tbody")) : n
    }
    function wi(n) {
        var i = gt.split(" "),
            t = n.createDocumentFragment();
        if (t.createElement) while (i.length) t.createElement(i.pop());
        return t
    }
    function nr(n, t, r) {
        if (t = t || 0, i.isFunction(t)) return i.grep(n, function (n, i) {
            var u = !! t.call(n, i, n);
            return u === r
        });
        if (t.nodeType) return i.grep(n, function (n) {
            return n === t === r
        });
        if (typeof t == "string") {
            var u = i.grep(n, function (n) {
                return n.nodeType === 1
            });
            if (df.test(t)) return i.filter(t, u, !r);
            t = i.filter(t, u)
        }
        return i.grep(n, function (n) {
            return i.inArray(n, t) >= 0 === r
        })
    }
    function gi(n) {
        return !n || !n.parentNode || n.parentNode.nodeType === 11
    }
    function p() {
        return !0
    }
    function h() {
        return !1
    }
    function li(n, t, r) {
        var e = t + "defer",
            o = t + "queue",
            u = t + "mark",
            f = i._data(n, e);
        f && (r === "queue" || !i._data(n, o)) && (r === "mark" || !i._data(n, u)) && setTimeout(function () {
            !i._data(n, o) && !i._data(n, u) && (i.removeData(n, e, !0), f.fire())
        }, 0)
    }
    function st(n) {
        for (var t in n) if ((t !== "data" || !i.isEmptyObject(n[t])) && t !== "toJSON") return !1;
        return !0
    }
    function ci(n, r, u) {
        if (u === t && n.nodeType === 1) {
            var f = "data-" + r.replace(ur, "-$1").toLowerCase();
            if (u = n.getAttribute(f), typeof u == "string") {
                try {
                    u = u === "true" ? !0 : u === "false" ? !1 : u === "null" ? null : i.isNumeric(u) ? parseFloat(u) : hr.test(u) ? i.parseJSON(u) : u
                } catch (e) {}
                i.data(n, r, u)
            } else u = t
        }
        return u
    }
    function ef(n) {
        var r = vi[n] = {}, t, i;
        for (n = n.split(/\s+/), t = 0, i = n.length; t < i; t++) r[n[t]] = !0;
        return r
    }
    var r = n.document,
        rf = n.navigator,
        uf = n.location,
        i = function () {
            function b() {
                if (!i.isReady) {
                    try {
                        r.documentElement.doScroll("left")
                    } catch (n) {
                        setTimeout(b, 1);
                        return
                    }
                    i.ready()
                }
            }
            var i = function (n, t) {
                return new i.fn.init(n, t, y)
            }, g = n.jQuery,
                it = n.$,
                y, tt = /^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,
                p = /\S/,
                v = /^\s+/,
                w = /\s+$/,
                vt = /\d/,
                ot = /^<(\w+)\s*\/?>(?:<\/\1>)?$/,
                st = /^[\],:{}\s]*$/,
                et = /\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,
                ut = /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,
                ft = /(?:^|:|,)(?:\s*\[)+/g,
                ht = /(webkit)[ \/]([\w.]+)/,
                nt = /(opera)(?:.*version)?[ \/]([\w.]+)/,
                yt = /(msie) ([\w.]+)/,
                at = /(mozilla)(?:.*? rv:([\w.]+))?/,
                ct = /-([a-z]|[0-9])/ig,
                lt = /^-ms-/,
                rt = function (n, t) {
                    return (t + "").toUpperCase()
                }, k = rf.userAgent,
                e, o, u, d = Object.prototype.toString,
                h = Object.prototype.hasOwnProperty,
                s = Array.prototype.push,
                f = Array.prototype.slice,
                l = String.prototype.trim,
                a = Array.prototype.indexOf,
                c = {};
            return i.fn = i.prototype = {
                constructor: i,
                init: function (n, u, f) {
                    var o, s, e, h;
                    if (!n) return this;
                    if (n.nodeType) return this.context = this[0] = n, this.length = 1, this;
                    if (n === "body" && !u && r.body) return this.context = r, this[0] = r.body, this.selector = n, this.length = 1, this;
                    if (typeof n == "string") {
                        if (o = n.charAt(0) !== "<" || n.charAt(n.length - 1) !== ">" || n.length < 3 ? tt.exec(n) : [null, n, null], o && (o[1] || !u)) {
                            if (o[1]) return u = u instanceof i ? u[0] : u, h = u ? u.ownerDocument || u : r, e = ot.exec(n), e ? i.isPlainObject(u) ? (n = [r.createElement(e[1])], i.fn.attr.call(n, u, !0)) : n = [h.createElement(e[1])] : (e = i.buildFragment([o[1]], [h]), n = (e.cacheable ? i.clone(e.fragment) : e.fragment).childNodes), i.merge(this, n);
                            if (s = r.getElementById(o[2]), s && s.parentNode) {
                                if (s.id !== o[2]) return f.find(n);
                                this.length = 1, this[0] = s
                            }
                            return this.context = r, this.selector = n, this
                        }
                        return !u || u.jquery ? (u || f).find(n) : this.constructor(u).find(n)
                    }
                    return i.isFunction(n) ? f.ready(n) : (n.selector !== t && (this.selector = n.selector, this.context = n.context), i.makeArray(n, this))
                },
                selector: "",
                jquery: "1.7",
                length: 0,
                size: function () {
                    return this.length
                },
                toArray: function () {
                    return f.call(this, 0)
                },
                get: function (n) {
                    return n == null ? this.toArray() : n < 0 ? this[this.length + n] : this[n]
                },
                pushStack: function (n, t, r) {
                    var u = this.constructor();
                    return i.isArray(n) ? s.apply(u, n) : i.merge(u, n), u.prevObject = this, u.context = this.context, t === "find" ? u.selector = this.selector + (this.selector ? " " : "") + r : t && (u.selector = this.selector + "." + t + "(" + r + ")"), u
                },
                each: function (n, t) {
                    return i.each(this, n, t)
                },
                ready: function (n) {
                    return i.bindReady(), o.add(n), this
                },
                eq: function (n) {
                    return n === -1 ? this.slice(n) : this.slice(n, + n + 1)
                },
                first: function () {
                    return this.eq(0)
                },
                last: function () {
                    return this.eq(-1)
                },
                slice: function () {
                    return this.pushStack(f.apply(this, arguments), "slice", f.call(arguments).join(","))
                },
                map: function (n) {
                    return this.pushStack(i.map(this, function (t, i) {
                        return n.call(t, i, t)
                    }))
                },
                end: function () {
                    return this.prevObject || this.constructor(null)
                },
                push: s,
                sort: [].sort,
                splice: [].splice
            }, i.fn.init.prototype = i.fn, i.extend = i.fn.extend = function () {
                var s, e, u, r, h, c, n = arguments[0] || {}, f = 1,
                    l = arguments.length,
                    o = !1;
                for (typeof n == "boolean" && (o = n, n = arguments[1] || {}, f = 2), typeof n != "object" && !i.isFunction(n) && (n = {}), l === f && (n = this, --f); f < l; f++) if ((s = arguments[f]) != null) for (e in s)(u = n[e], r = s[e], n !== r) && (o && r && (i.isPlainObject(r) || (h = i.isArray(r))) ? (h ? (h = !1, c = u && i.isArray(u) ? u : []) : c = u && i.isPlainObject(u) ? u : {}, n[e] = i.extend(o, c, r)) : r !== t && (n[e] = r));
                return n
            }, i.extend({
                noConflict: function (t) {
                    return n.$ === i && (n.$ = it), t && n.jQuery === i && (n.jQuery = g), i
                },
                isReady: !1,
                readyWait: 1,
                holdReady: function (n) {
                    n ? i.readyWait++ : i.ready(!0)
                },
                ready: function (n) {
                    if (n === !0 && !--i.readyWait || n !== !0 && !i.isReady) {
                        if (!r.body) return setTimeout(i.ready, 1);
                        if (i.isReady = !0, n !== !0 && --i.readyWait > 0) return;
                        o.fireWith(r, [i]), i.fn.trigger && i(r).trigger("ready").unbind("ready")
                    }
                },
                bindReady: function () {
                    if (!o) {
                        if (o = i.Callbacks("once memory"), r.readyState === "complete") return setTimeout(i.ready, 1);
                        if (r.addEventListener) r.addEventListener("DOMContentLoaded", u, !1), n.addEventListener("load", i.ready, !1);
                        else if (r.attachEvent) {
                            r.attachEvent("onreadystatechange", u), n.attachEvent("onload", i.ready);
                            var t = !1;
                            try {
                                t = n.frameElement == null
                            } catch (f) {}
                            r.documentElement.doScroll && t && b()
                        }
                    }
                },
                isFunction: function (n) {
                    return i.type(n) === "function"
                },
                isArray: Array.isArray || function (n) {
                    return i.type(n) === "array"
                },
                isWindow: function (n) {
                    return n && typeof n == "object" && "setInterval" in n
                },
                isNumeric: function (n) {
                    return n != null && vt.test(n) && !isNaN(n)
                },
                type: function (n) {
                    return n == null ? String(n) : c[d.call(n)] || "object"
                },
                isPlainObject: function (n) {
                    if (!n || i.type(n) !== "object" || n.nodeType || i.isWindow(n)) return !1;
                    try {
                        if (n.constructor && !h.call(n, "constructor") && !h.call(n.constructor.prototype, "isPrototypeOf")) return !1
                    } catch (u) {
                        return !1
                    }
                    var r;
                    for (r in n);
                    return r === t || h.call(n, r)
                },
                isEmptyObject: function (n) {
                    for (var t in n) return !1;
                    return !0
                },
                error: function (n) {
                    throw n;
                },
                parseJSON: function (t) {
                    if (typeof t != "string" || !t) return null;
                    if (t = i.trim(t), n.JSON && n.JSON.parse) return n.JSON.parse(t);
                    if (st.test(t.replace(et, "@").replace(ut, "]").replace(ft, ""))) return new Function("return " + t)();
                    i.error("Invalid JSON: " + t)
                },
                parseXML: function (r) {
                    var u, f;
                    try {
                        n.DOMParser ? (f = new DOMParser, u = f.parseFromString(r, "text/xml")) : (u = new ActiveXObject("Microsoft.XMLDOM"), u.async = "false", u.loadXML(r))
                    } catch (e) {
                        u = t
                    }
                    return (!u || !u.documentElement || u.getElementsByTagName("parsererror").length) && i.error("Invalid XML: " + r), u
                },
                noop: function () {},
                globalEval: function (t) {
                    t && p.test(t) && (n.execScript || function (t) {
                        n.eval.call(n, t)
                    })(t)
                },
                camelCase: function (n) {
                    return n.replace(lt, "ms-").replace(ct, rt)
                },
                nodeName: function (n, t) {
                    return n.nodeName && n.nodeName.toUpperCase() === t.toUpperCase()
                },
                each: function (n, r, u) {
                    var e, f = 0,
                        o = n.length,
                        s = o === t || i.isFunction(n);
                    if (u) {
                        if (s) {
                            for (e in n) if (r.apply(n[e], u) === !1) break
                        } else for (; f < o;) if (r.apply(n[f++], u) === !1) break
                    } else if (s) {
                        for (e in n) if (r.call(n[e], e, n[e]) === !1) break
                    } else for (; f < o;) if (r.call(n[f], f, n[f++]) === !1) break;
                    return n
                },
                trim: l ? function (n) {
                    return n == null ? "" : l.call(n)
                } : function (n) {
                    return n == null ? "" : (n + "").replace(v, "").replace(w, "")
                },
                makeArray: function (n, t) {
                    var u = t || [],
                        r;
                    return n != null && (r = i.type(n), n.length == null || r === "string" || r === "function" || r === "regexp" || i.isWindow(n) ? s.call(u, n) : i.merge(u, n)), u
                },
                inArray: function (n, t, i) {
                    var r;
                    if (t) {
                        if (a) return a.call(t, n, i);
                        for (r = t.length, i = i ? i < 0 ? Math.max(0, r + i) : i : 0; i < r; i++) if (i in t && t[i] === n) return i
                    }
                    return -1
                },
                merge: function (n, i) {
                    var u = n.length,
                        r = 0,
                        f;
                    if (typeof i.length == "number") for (f = i.length; r < f; r++) n[u++] = i[r];
                    else while (i[r] !== t) n[u++] = i[r++];
                    return n.length = u, n
                },
                grep: function (n, t, i) {
                    var f = [],
                        e, r, u;
                    for (i = !! i, r = 0, u = n.length; r < u; r++) e = !! t(n[r], r), i !== e && f.push(n[r]);
                    return f
                },
                map: function (n, r, u) {
                    var o, h, f = [],
                        s = 0,
                        e = n.length,
                        c = n instanceof i || e !== t && typeof e == "number" && (e > 0 && n[0] && n[e - 1] || e === 0 || i.isArray(n));
                    if (c) for (; s < e; s++) o = r(n[s], s, u), o != null && (f[f.length] = o);
                    else for (h in n) o = r(n[h], h, u), o != null && (f[f.length] = o);
                    return f.concat.apply([], f)
                },
                guid: 1,
                proxy: function (n, r) {
                    var e, o, u;
                    return (typeof r == "string" && (e = n[r], r = n, n = e), !i.isFunction(n)) ? t : (o = f.call(arguments, 2), u = function () {
                        return n.apply(r, o.concat(f.call(arguments)))
                    }, u.guid = n.guid = n.guid || u.guid || i.guid++, u)
                },
                access: function (n, r, u, f, e, o) {
                    var c = n.length,
                        h, s;
                    if (typeof r == "object") {
                        for (h in r) i.access(n, h, r[h], f, e, u);
                        return n
                    }
                    if (u !== t) {
                        for (f = !o && f && i.isFunction(u), s = 0; s < c; s++) e(n[s], r, f ? u.call(n[s], s, e(n[s], r)) : u, o);
                        return n
                    }
                    return c ? e(n[0], r) : t
                },
                now: function () {
                    return +new Date
                },
                uaMatch: function (n) {
                    n = n.toLowerCase();
                    var t = ht.exec(n) || nt.exec(n) || yt.exec(n) || n.indexOf("compatible") < 0 && at.exec(n) || [];
                    return {
                        browser: t[1] || "",
                        version: t[2] || "0"
                    }
                },
                sub: function () {
                    function n(t, i) {
                        return new n.fn.init(t, i)
                    }
                    i.extend(!0, n, this), n.superclass = this, n.fn = n.prototype = this(), n.fn.constructor = n, n.sub = this.sub, n.fn.init = function (r, u) {
                        return u && u instanceof i && !(u instanceof n) && (u = n(u)), i.fn.init.call(this, r, u, t)
                    }, n.fn.init.prototype = n.fn;
                    var t = n(r);
                    return n
                },
                browser: {}
            }), i.each("Boolean Number String Function Array Date RegExp Object".split(" "), function (n, t) {
                c["[object " + t + "]"] = t.toLowerCase()
            }), e = i.uaMatch(k), e.browser && (i.browser[e.browser] = !0, i.browser.version = e.version), i.browser.webkit && (i.browser.safari = !0), p.test(" ") && (v = /^[\s\xA0]+/, w = /[\s\xA0]+$/), y = i(r), r.addEventListener ? u = function () {
                r.removeEventListener("DOMContentLoaded", u, !1), i.ready()
            } : r.attachEvent && (u = function () {
                r.readyState === "complete" && (r.detachEvent("onreadystatechange", u), i.ready())
            }), typeof define == "function" && define.amd && define.amd.jQuery && define("jquery", [], function () {
                return i
            }), i
        }(),
        vi = {}, k, hr, ur, wt, y, w, ar, c, sr, ft;
    i.Callbacks = function (n) {
        n = n ? vi[n] || ef(n) : {};
        var r = [],
            f = [],
            u, s, c, h, e, l = function (t) {
                for (var u, e, h, f = 0, s = t.length; f < s; f++) u = t[f], e = i.type(u), e === "array" ? l(u) : e === "function" && (!n.unique || !o.has(u)) && r.push(u)
            }, a = function (t, i) {
                for (i = i || [], u = !n.memory || [t, i], s = !0, e = c || 0, c = 0, h = r.length; r && e < h; e++) if (r[e].apply(t, i) === !1 && n.stopOnFalse) {
                    u = !0;
                    break
                }
                s = !1, r && (n.once ? u === !0 ? o.disable() : r = [] : f && f.length && (u = f.shift(), o.fireWith(u[0], u[1])))
            }, o = {
                add: function () {
                    if (r) {
                        var n = r.length;
                        l(arguments), s ? h = r.length : u && u !== !0 && (c = n, a(u[0], u[1]))
                    }
                    return this
                },
                remove: function () {
                    var t;
                    if (r) for (var u = arguments, i = 0, f = u.length; i < f; i++) for (t = 0; t < r.length; t++) if (u[i] === r[t] && (s && t <= h && (h--, t <= e && e--), r.splice(t--, 1), n.unique)) break;
                    return this
                },
                has: function (n) {
                    if (r) for (var t = 0, i = r.length; t < i; t++) if (n === r[t]) return !0;
                    return !1
                },
                empty: function () {
                    return r = [], this
                },
                disable: function () {
                    return r = f = u = t, this
                },
                disabled: function () {
                    return !r
                },
                lock: function () {
                    return f = t, (!u || u === !0) && o.disable(), this
                },
                locked: function () {
                    return !f
                },
                fireWith: function (t, i) {
                    return f && (s ? n.once || f.push([t, i]) : (!n.once || !u) && a(t, i)), this
                },
                fire: function () {
                    return o.fireWith(this, arguments), this
                },
                fired: function () {
                    return !!u
                }
            };
        return o
    }, k = [].slice, i.extend({
        Deferred: function (n) {
            var u = i.Callbacks("once memory"),
                o = i.Callbacks("once memory"),
                e = i.Callbacks("memory"),
                s = "pending",
                h = {
                    resolve: u,
                    reject: o,
                    notify: e
                }, f = {
                    done: u.add,
                    fail: o.add,
                    progress: e.add,
                    state: function () {
                        return s
                    },
                    isResolved: u.fired,
                    isRejected: o.fired,
                    then: function (n, i, r) {
                        return t.done(n).fail(i).progress(r), this
                    },
                    always: function () {
                        return t.done.apply(t, arguments).fail.apply(t, arguments)
                    },
                    pipe: function (n, r, u) {
                        return i.Deferred(function (f) {
                            i.each({
                                done: [n, "resolve"],
                                fail: [r, "reject"],
                                progress: [u, "notify"]
                            }, function (n, r) {
                                var e = r[0],
                                    o = r[1],
                                    u;
                                i.isFunction(e) ? t[n](function () {
                                    u = e.apply(this, arguments), u && i.isFunction(u.promise) ? u.promise().then(f.resolve, f.reject, f.notify) : f[o + "With"](this === t ? f : this, [u])
                                }) : t[n](f[o])
                            })
                        }).promise()
                    },
                    promise: function (n) {
                        if (n == null) n = f;
                        else for (var t in f) n[t] = f[t];
                        return n
                    }
                }, t = f.promise({}),
                r;
            for (r in h) t[r] = h[r].fire, t[r + "With"] = h[r].fireWith;
            return t.done(function () {
                s = "resolved"
            }, o.disable, e.lock).fail(function () {
                s = "rejected"
            }, u.disable, e.lock), n && n.call(t, t), t
        },
        when: function (n) {
            function h(n) {
                return function (i) {
                    s[n] = arguments.length > 1 ? k.call(arguments, 0) : i, t.notifyWith(o, s)
                }
            }
            function c(n) {
                return function (i) {
                    r[n] = arguments.length > 1 ? k.call(arguments, 0) : i, --e || t.resolveWith(t, r)
                }
            }
            var r = k.call(arguments, 0),
                u = 0,
                f = r.length,
                s = Array(f),
                e = f,
                l = f,
                t = f <= 1 && n && i.isFunction(n.promise) ? n : i.Deferred(),
                o = t.promise();
            if (f > 1) {
                for (; u < f; u++) r[u] && r[u].promise && i.isFunction(r[u].promise) ? r[u].promise().then(c(u), t.reject, h(u)) : --e;
                e || t.resolveWith(t, r)
            } else t !== n && t.resolveWith(t, f ? [n] : []);
            return o
        }
    }), i.support = function () {
        var n = r.createElement("div"),
            d = r.documentElement,
            k, h, p, y, f, s, t, b, e, w, u, a, l, nt, v, c, o;
        if (n.setAttribute("className", "t"), n.innerHTML = "   <link/><table></table><a href='/a' style='top:1px;float:left;opacity:.55;'>a</a><input type='checkbox'/><nav></nav>", k = n.getElementsByTagName("*"), h = n.getElementsByTagName("a")[0], !k || !k.length || !h) return {};
        p = r.createElement("select"), y = p.appendChild(r.createElement("option")), f = n.getElementsByTagName("input")[0], t = {
            leadingWhitespace: n.firstChild.nodeType === 3,
            tbody: !n.getElementsByTagName("tbody").length,
            htmlSerialize: !! n.getElementsByTagName("link").length,
            style: /top/.test(h.getAttribute("style")),
            hrefNormalized: h.getAttribute("href") === "/a",
            opacity: /^0.55/.test(h.style.opacity),
            cssFloat: !! h.style.cssFloat,
            unknownElems: !! n.getElementsByTagName("nav").length,
            checkOn: f.value === "on",
            optSelected: y.selected,
            getSetAttribute: n.className !== "t",
            enctype: !! r.createElement("form").enctype,
            submitBubbles: !0,
            changeBubbles: !0,
            focusinBubbles: !1,
            deleteExpando: !0,
            noCloneEvent: !0,
            inlineBlockNeedsLayout: !1,
            shrinkWrapBlocks: !1,
            reliableMarginRight: !0
        }, f.checked = !0, t.noCloneChecked = f.cloneNode(!0).checked, p.disabled = !0, t.optDisabled = !y.disabled;
        try {
            delete n.test
        } catch (g) {
            t.deleteExpando = !1
        }!n.addEventListener && n.attachEvent && n.fireEvent && (n.attachEvent("onclick", function () {
            t.noCloneEvent = !1
        }), n.cloneNode(!0).fireEvent("onclick")), f = r.createElement("input"), f.value = "t", f.setAttribute("type", "radio"), t.radioValue = f.value === "t", f.setAttribute("checked", "checked"), n.appendChild(f), b = r.createDocumentFragment(), b.appendChild(n.lastChild), t.checkClone = b.cloneNode(!0).cloneNode(!0).lastChild.checked, n.innerHTML = "", n.style.width = n.style.paddingLeft = "1px", e = r.getElementsByTagName("body")[0], u = r.createElement(e ? "div" : "body"), a = {
            visibility: "hidden",
            width: 0,
            height: 0,
            border: 0,
            margin: 0,
            background: "none"
        }, e && i.extend(a, {
            position: "absolute",
            left: "-999px",
            top: "-999px"
        });
        for (c in a) u.style[c] = a[c];
        if (u.appendChild(n), w = e || d, w.insertBefore(u, w.firstChild), t.appendChecked = f.checked, t.boxModel = n.offsetWidth === 2, "zoom" in n.style && (n.style.display = "inline", n.style.zoom = 1, t.inlineBlockNeedsLayout = n.offsetWidth === 2, n.style.display = "", n.innerHTML = "<div style='width:4px;'></div>", t.shrinkWrapBlocks = n.offsetWidth !== 2), n.innerHTML = "<table><tr><td style='padding:0;border:0;display:none'></td><td>t</td></tr></table>", l = n.getElementsByTagName("td"), o = l[0].offsetHeight === 0, l[0].style.display = "", l[1].style.display = "none", t.reliableHiddenOffsets = o && l[0].offsetHeight === 0, n.innerHTML = "", r.defaultView && r.defaultView.getComputedStyle && (s = r.createElement("div"), s.style.width = "0", s.style.marginRight = "0", n.appendChild(s), t.reliableMarginRight = (parseInt((r.defaultView.getComputedStyle(s, null) || {
            marginRight: 0
        }).marginRight, 10) || 0) === 0), n.attachEvent) for (c in {
            submit: 1,
            change: 1,
            focusin: 1
        }) v = "on" + c, o = v in n, o || (n.setAttribute(v, "return;"), o = typeof n[v] == "function"), t[c + "Bubbles"] = o;
        return i(function () {
            var f, s, n, p, a, o, v = 1,
                h = "position:absolute;top:0;left:0;width:1px;height:1px;margin:0;",
                c = "visibility:hidden;border:0;",
                l = "style='" + h + "border:5px solid #000;padding:0;'",
                y = "<div " + l + "><div></div></div><table " + l + " cellpadding='0' cellspacing='0'><tr><td></td></tr></table>";
            e = r.getElementsByTagName("body")[0], !e || (f = r.createElement("div"), f.style.cssText = c + "width:0;height:0;position:static;top:0;margin-top:" + v + "px", e.insertBefore(f, e.firstChild), u = r.createElement("div"), u.style.cssText = h + c, u.innerHTML = y, f.appendChild(u), s = u.firstChild, n = s.firstChild, a = s.nextSibling.firstChild.firstChild, o = {
                doesNotAddBorder: n.offsetTop !== 5,
                doesAddBorderForTableAndCells: a.offsetTop === 5
            }, n.style.position = "fixed", n.style.top = "20px", o.fixedPosition = n.offsetTop === 20 || n.offsetTop === 15, n.style.position = n.style.top = "", s.style.overflow = "hidden", s.style.position = "relative", o.subtractsBorderForOverflowNotVisible = n.offsetTop === -5, o.doesNotIncludeMarginInBodyOffset = e.offsetTop !== v, e.removeChild(f), u = f = null, i.extend(t, o))
        }), u.innerHTML = "", w.removeChild(u), u = b = p = y = e = s = n = f = null, t
    }(), i.boxModel = i.support.boxModel, hr = /^(?:\{.*\}|\[.*\])$/, ur = /([A-Z])/g, i.extend({
        cache: {},
        uuid: 0,
        expando: "jQuery" + (i.fn.jquery + Math.random()).replace(/\D/g, ""),
        noData: {
            embed: !0,
            object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
            applet: !0
        },
        hasData: function (n) {
            return n = n.nodeType ? i.cache[n[i.expando]] : n[i.expando], !! n && !st(n)
        },
        data: function (n, r, u, f) {
            if ( !! i.acceptData(n)) {
                var l, s, h, y = i.expando,
                    a = typeof r == "string",
                    c = n.nodeType,
                    o = c ? i.cache : n,
                    e = c ? n[i.expando] : n[i.expando] && i.expando,
                    v = r === "events";
                return (!e || !o[e] || !v && !f && !o[e].data) && a && u === t ? void 0 : (e || (c ? n[i.expando] = e = ++i.uuid : e = i.expando), o[e] || (o[e] = {}, c || (o[e].toJSON = i.noop)), (typeof r == "object" || typeof r == "function") && (f ? o[e] = i.extend(o[e], r) : o[e].data = i.extend(o[e].data, r)), l = s = o[e], f || (s.data || (s.data = {}), s = s.data), u !== t && (s[i.camelCase(r)] = u), v && !s[r]) ? l.events : (a ? (h = s[r], h == null && (h = s[i.camelCase(r)])) : h = s, h)
            }
        },
        removeData: function (n, t, r) {
            if ( !! i.acceptData(n)) {
                var e, o, h, c = i.expando,
                    s = n.nodeType,
                    u = s ? i.cache : n,
                    f = s ? n[i.expando] : i.expando;
                if (!u[f]) return;
                if (t && (e = r ? u[f] : u[f].data, e)) {
                    for (i.isArray(t) ? t = t : (t in e) ? t = [t] : (t = i.camelCase(t), t = t in e ? [t] : t.split(" ")), o = 0, h = t.length; o < h; o++) delete e[t[o]];
                    if (!(r ? st : i.isEmptyObject)(e)) return
                }
                if (!r && (delete u[f].data, !st(u[f]))) return;
                i.support.deleteExpando || !u.setInterval ? delete u[f] : u[f] = null, s && (i.support.deleteExpando ? delete n[i.expando] : n.removeAttribute ? n.removeAttribute(i.expando) : n[i.expando] = null)
            }
        },
        _data: function (n, t, r) {
            return i.data(n, t, r, !0)
        },
        acceptData: function (n) {
            if (n.nodeName) {
                var t = i.noData[n.nodeName.toLowerCase()];
                if (t) return t !== !0 && n.getAttribute("classid") === t
            }
            return !0
        }
    }), i.fn.extend({
        data: function (n, r) {
            var u, s, e, f = null,
                o, h;
            if (typeof n == "undefined") {
                if (this.length && (f = i.data(this[0]), this[0].nodeType === 1 && !i._data(this[0], "parsedAttrs"))) {
                    for (s = this[0].attributes, o = 0, h = s.length; o < h; o++) e = s[o].name, e.indexOf("data-") === 0 && (e = i.camelCase(e.substring(5)), ci(this[0], e, f[e]));
                    i._data(this[0], "parsedAttrs", !0)
                }
                return f
            }
            return typeof n == "object" ? this.each(function () {
                i.data(this, n)
            }) : (u = n.split("."), u[1] = u[1] ? "." + u[1] : "", r === t) ? (f = this.triggerHandler("getData" + u[1] + "!", [u[0]]), f === t && this.length && (f = i.data(this[0], n), f = ci(this[0], n, f)), f === t && u[1] ? this.data(u[0]) : f) : this.each(function () {
                var f = i(this),
                    t = [u[0], r];
                f.triggerHandler("setData" + u[1] + "!", t), i.data(this, n, r), f.triggerHandler("changeData" + u[1] + "!", t)
            })
        },
        removeData: function (n) {
            return this.each(function () {
                i.removeData(this, n)
            })
        }
    }), i.extend({
        _mark: function (n, t) {
            n && (t = (t || "fx") + "mark", i._data(n, t, (i._data(n, t) || 0) + 1))
        },
        _unmark: function (n, t, r) {
            if (n !== !0 && (r = t, t = n, n = !1), t) {
                r = r || "fx";
                var u = r + "mark",
                    f = n ? 0 : (i._data(t, u) || 1) - 1;
                f ? i._data(t, u, f) : (i.removeData(t, u, !0), li(t, r, "mark"))
            }
        },
        queue: function (n, t, r) {
            var u;
            if (n) return t = (t || "fx") + "queue", u = i._data(n, t), r && (!u || i.isArray(r) ? u = i._data(n, t, i.makeArray(r)) : u.push(r)), u || []
        },
        dequeue: function (n, t) {
            t = t || "fx";
            var u = i.queue(n, t),
                r = u.shift(),
                f = {};
            r === "inprogress" && (r = u.shift()), r && (t === "fx" && u.unshift("inprogress"), i._data(n, t + ".run", f), r.call(n, function () {
                i.dequeue(n, t)
            }, f)), u.length || (i.removeData(n, t + "queue " + t + ".run", !0), li(n, t, "queue"))
        }
    }), i.fn.extend({
        queue: function (n, r) {
            return (typeof n != "string" && (r = n, n = "fx"), r === t) ? i.queue(this[0], n) : this.each(function () {
                var t = i.queue(this, n, r);
                n === "fx" && t[0] !== "inprogress" && i.dequeue(this, n)
            })
        },
        dequeue: function (n) {
            return this.each(function () {
                i.dequeue(this, n)
            })
        },
        delay: function (n, t) {
            return n = i.fx ? i.fx.speeds[n] || n : n, t = t || "fx", this.queue(t, function (t, i) {
                var r = setTimeout(t, n);
                i.stop = function () {
                    clearTimeout(r)
                }
            })
        },
        clearQueue: function (n) {
            return this.queue(n || "fx", [])
        },
        promise: function (n, r) {
            function c() {
                --s || h.resolveWith(u, [u])
            }
            typeof n != "string" && (r = n, n = t), n = n || "fx";
            for (var h = i.Deferred(), u = this, f = u.length, s = 1, e = n + "defer", l = n + "queue", a = n + "mark", o; f--;)(o = i.data(u[f], e, t, !0) || (i.data(u[f], l, t, !0) || i.data(u[f], a, t, !0)) && i.data(u[f], e, i.Callbacks("once memory"), !0)) && (s++, o.add(c));
            return c(), h.promise()
        }
    });
    var ir = /[\n\t\r]/g,
        b = /\s+/,
        bu = /\r/g,
        cu = /^(?:button|input)$/i,
        lu = /^(?:button|input|object|select|textarea)$/i,
        su = /^a(?:rea)?$/i,
        cr = /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,
        fr = i.support.getSetAttribute,
        e, rr, lr;
    i.fn.extend({
        attr: function (n, t) {
            return i.access(this, n, t, !0, i.attr)
        },
        removeAttr: function (n) {
            return this.each(function () {
                i.removeAttr(this, n)
            })
        },
        prop: function (n, t) {
            return i.access(this, n, t, !0, i.prop)
        },
        removeProp: function (n) {
            return n = i.propFix[n] || n, this.each(function () {
                try {
                    this[n] = t, delete this[n]
                } catch (i) {}
            })
        },
        addClass: function (n) {
            var u, e, s, t, f, r, o;
            if (i.isFunction(n)) return this.each(function (t) {
                i(this).addClass(n.call(this, t, this.className))
            });
            if (n && typeof n == "string") for (u = n.split(b), e = 0, s = this.length; e < s; e++) if (t = this[e], t.nodeType === 1) if (t.className || u.length !== 1) {
                for (f = " " + t.className + " ", r = 0, o = u.length; r < o; r++)~f.indexOf(" " + u[r] + " ") || (f += u[r] + " ");
                t.className = i.trim(f)
            } else t.className = n;
            return this
        },
        removeClass: function (n) {
            var o, e, h, r, u, f, s;
            if (i.isFunction(n)) return this.each(function (t) {
                i(this).removeClass(n.call(this, t, this.className))
            });
            if (n && typeof n == "string" || n === t) for (o = (n || "").split(b), e = 0, h = this.length; e < h; e++) if (r = this[e], r.nodeType === 1 && r.className) if (n) {
                for (u = (" " + r.className + " ").replace(ir, " "), f = 0, s = o.length; f < s; f++) u = u.replace(" " + o[f] + " ", " ");
                r.className = i.trim(u)
            } else r.className = "";
            return this
        },
        toggleClass: function (n, t) {
            var r = typeof n,
                u = typeof t == "boolean";
            return i.isFunction(n) ? this.each(function (r) {
                i(this).toggleClass(n.call(this, r, this.className, t), t)
            }) : this.each(function () {
                if (r === "string") for (var e, h = 0, o = i(this), f = t, s = n.split(b); e = s[h++];) f = u ? f : !o.hasClass(e), o[f ? "addClass" : "removeClass"](e);
                else(r === "undefined" || r === "boolean") && (this.className && i._data(this, "__className__", this.className), this.className = this.className || n === !1 ? "" : i._data(this, "__className__") || "")
            })
        },
        hasClass: function (n) {
            for (var r = " " + n + " ", t = 0, i = this.length; t < i; t++) if (this[t].nodeType === 1 && (" " + this[t].className + " ").replace(ir, " ").indexOf(r) > -1) return !0;
            return !1
        },
        val: function (n) {
            var r, u, e, f = this[0];
            return arguments.length ? (e = i.isFunction(n), this.each(function (u) {
                var o = i(this),
                    f;
                this.nodeType === 1 && (f = e ? n.call(this, u, o.val()) : n, f == null ? f = "" : typeof f == "number" ? f += "" : i.isArray(f) && (f = i.map(f, function (n) {
                    return n == null ? "" : n + ""
                })), r = i.valHooks[this.nodeName.toLowerCase()] || i.valHooks[this.type], r && "set" in r && r.set(this, f, "value") !== t || (this.value = f))
            })) : f ? (r = i.valHooks[f.nodeName.toLowerCase()] || i.valHooks[f.type], r && "get" in r && (u = r.get(f, "value")) !== t) ? u : (u = f.value, typeof u == "string" ? u.replace(bu, "") : u == null ? "" : u) : t
        }
    }), i.extend({
        valHooks: {
            option: {
                get: function (n) {
                    var t = n.attributes.value;
                    return !t || t.specified ? n.value : n.text
                }
            },
            select: {
                get: function (n) {
                    var o, e, h, t, r = n.selectedIndex,
                        s = [],
                        u = n.options,
                        f = n.type === "select-one";
                    if (r < 0) return null;
                    for (e = f ? r : 0, h = f ? r + 1 : u.length; e < h; e++) if (t = u[e], t.selected && (i.support.optDisabled ? !t.disabled : t.getAttribute("disabled") === null) && (!t.parentNode.disabled || !i.nodeName(t.parentNode, "optgroup"))) {
                        if (o = i(t).val(), f) return o;
                        s.push(o)
                    }
                    return f && !s.length && u.length ? i(u[r]).val() : s
                },
                set: function (n, t) {
                    var r = i.makeArray(t);
                    return i(n).find("option").each(function () {
                        this.selected = i.inArray(i(this).val(), r) >= 0
                    }), r.length || (n.selectedIndex = -1), r
                }
            }
        },
        attrFn: {
            val: !0,
            css: !0,
            html: !0,
            text: !0,
            data: !0,
            width: !0,
            height: !0,
            offset: !0
        },
        attr: function (n, r, u, f) {
            var s, o, c, h = n.nodeType;
            return !n || h === 3 || h === 8 || h === 2 ? t : f && r in i.attrFn ? i(n)[r](u) : "getAttribute" in n ? (c = h !== 1 || !i.isXMLDoc(n), c && (r = r.toLowerCase(), o = i.attrHooks[r] || (cr.test(r) ? rr : e)), u !== t) ? u === null ? (i.removeAttr(n, r), t) : o && "set" in o && c && (s = o.set(n, u, r)) !== t ? s : (n.setAttribute(r, "" + u), u) : o && "get" in o && c && (s = o.get(n, r)) !== null ? s : (s = n.getAttribute(r), s === null ? t : s) : i.prop(n, r, u)
        },
        removeAttr: function (n, t) {
            var u, e, r, o, f = 0;
            if (n.nodeType === 1) for (e = (t || "").split(b), o = e.length; f < o; f++) r = e[f].toLowerCase(), u = i.propFix[r] || r, i.attr(n, r, ""), n.removeAttribute(fr ? r : u), cr.test(r) && u in n && (n[u] = !1)
        },
        attrHooks: {
            type: {
                set: function (n, t) {
                    if (cu.test(n.nodeName) && n.parentNode) i.error("type property can't be changed");
                    else if (!i.support.radioValue && t === "radio" && i.nodeName(n, "input")) {
                        var r = n.value;
                        return n.setAttribute("type", t), r && (n.value = r), t
                    }
                }
            },
            value: {
                get: function (n, t) {
                    return e && i.nodeName(n, "button") ? e.get(n, t) : t in n ? n.value : null
                },
                set: function (n, t, r) {
                    if (e && i.nodeName(n, "button")) return e.set(n, t, r);
                    n.value = t
                }
            }
        },
        propFix: {
            tabindex: "tabIndex",
            readonly: "readOnly",
            "for": "htmlFor",
            "class": "className",
            maxlength: "maxLength",
            cellspacing: "cellSpacing",
            cellpadding: "cellPadding",
            rowspan: "rowSpan",
            colspan: "colSpan",
            usemap: "useMap",
            frameborder: "frameBorder",
            contenteditable: "contentEditable"
        },
        prop: function (n, r, u) {
            var o, f, s, e = n.nodeType;
            return !n || e === 3 || e === 8 || e === 2 ? t : (s = e !== 1 || !i.isXMLDoc(n), s && (r = i.propFix[r] || r, f = i.propHooks[r]), u !== t ? f && "set" in f && (o = f.set(n, u, r)) !== t ? o : n[r] = u : f && "get" in f && (o = f.get(n, r)) !== null ? o : n[r])
        },
        propHooks: {
            tabIndex: {
                get: function (n) {
                    var i = n.getAttributeNode("tabindex");
                    return i && i.specified ? parseInt(i.value, 10) : lu.test(n.nodeName) || su.test(n.nodeName) && n.href ? 0 : t
                }
            }
        }
    }), i.attrHooks.tabindex = i.propHooks.tabIndex, rr = {
        get: function (n, r) {
            var f, u = i.prop(n, r);
            return u === !0 || typeof u != "boolean" && (f = n.getAttributeNode(r)) && f.nodeValue !== !1 ? r.toLowerCase() : t
        },
        set: function (n, t, r) {
            var u;
            return t === !1 ? i.removeAttr(n, r) : (u = i.propFix[r] || r, u in n && (n[u] = !0), n.setAttribute(r, r.toLowerCase())), r
        }
    }, fr || (lr = {
        name: !0,
        id: !0
    }, e = i.valHooks.button = {
        get: function (n, i) {
            var r;
            return r = n.getAttributeNode(i), r && (lr[i] ? r.nodeValue !== "" : r.specified) ? r.nodeValue : t
        },
        set: function (n, t, i) {
            var u = n.getAttributeNode(i);
            return u || (u = r.createAttribute(i), n.setAttributeNode(u)), u.nodeValue = t + ""
        }
    }, i.attrHooks.tabindex.set = e.set, i.each(["width", "height"], function (n, t) {
        i.attrHooks[t] = i.extend(i.attrHooks[t], {
            set: function (n, i) {
                if (i === "") return n.setAttribute(t, "auto"), i
            }
        })
    }), i.attrHooks.contenteditable = {
        get: e.get,
        set: function (n, t, i) {
            t === "" && (t = "false"), e.set(n, t, i)
        }
    }), i.support.hrefNormalized || i.each(["href", "src", "width", "height"], function (n, r) {
        i.attrHooks[r] = i.extend(i.attrHooks[r], {
            get: function (n) {
                var i = n.getAttribute(r, 2);
                return i === null ? t : i
            }
        })
    }), i.support.style || (i.attrHooks.style = {
        get: function (n) {
            return n.style.cssText.toLowerCase() || t
        },
        set: function (n, t) {
            return n.style.cssText = "" + t
        }
    }), i.support.optSelected || (i.propHooks.selected = i.extend(i.propHooks.selected, {
        get: function (n) {
            var t = n.parentNode;
            return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
        }
    })), i.support.enctype || (i.propFix.enctype = "encoding"), i.support.checkOn || i.each(["radio", "checkbox"], function () {
        i.valHooks[this] = {
            get: function (n) {
                return n.getAttribute("value") === null ? "on" : n.value
            }
        }
    }), i.each(["radio", "checkbox"], function () {
        i.valHooks[this] = i.extend(i.valHooks[this], {
            set: function (n, t) {
                if (i.isArray(t)) return n.checked = i.inArray(i(n).val(), t) >= 0
            }
        })
    });
    var fe = /\.(.*)$/,
        it = /^(?:textarea|input|select)$/i,
        he = /\./g,
        se = / /g,
        oe = /[^\w\s.|`]/g,
        dt = /^([^\.]*)?(?:\.(.+))?$/,
        hu = /\bhover(\.\S+)?/,
        au = /^key/,
        pu = /^(?:mouse|contextmenu)|click/,
        wu = /^(\w*)(?:#([\w\-]+))?(?:\.([\w\-]+))?$/,
        vu = function (n) {
            var t = wu.exec(n);
            return t && (t[1] = (t[1] || "").toLowerCase(), t[3] = t[3] && new RegExp("(?:^|\\s)" + t[3] + "(?:\\s|$)")), t
        }, yu = function (n, t) {
            return (!t[1] || n.nodeName.toLowerCase() === t[1]) && (!t[2] || n.id === t[2]) && (!t[3] || t[3].test(n.className))
        }, oi = function (n) {
            return i.event.special.hover ? n : n.replace(hu, "mouseenter$1 mouseleave$1")
        };
    i.event = {
        add: function (n, r, u, f, e) {
            var a, c, v, y, p, o, w, s, b, k, l, h;
            if (!(n.nodeType === 3 || n.nodeType === 8 || !r || !u || !(a = i._data(n)))) {
                for (u.handler && (b = u, u = b.handler), u.guid || (u.guid = i.guid++), v = a.events, v || (a.events = v = {}), c = a.handle, c || (a.handle = c = function (n) {
                    return typeof i != "undefined" && (!n || i.event.triggered !== n.type) ? i.event.dispatch.apply(c.elem, arguments) : t
                }, c.elem = n), r = oi(r).split(" "), y = 0; y < r.length; y++) p = dt.exec(r[y]) || [], o = p[1], w = (p[2] || "").split(".").sort(), h = i.event.special[o] || {}, o = (e ? h.delegateType : h.bindType) || o, h = i.event.special[o] || {}, s = i.extend({
                    type: o,
                    origType: p[1],
                    data: f,
                    handler: u,
                    guid: u.guid,
                    selector: e,
                    namespace: w.join(".")
                }, b), e && (s.quick = vu(e), !s.quick && i.expr.match.POS.test(e) && (s.isPositional = !0)), l = v[o], l || (l = v[o] = [], l.delegateCount = 0, h.setup && h.setup.call(n, f, w, c) !== !1 || (n.addEventListener ? n.addEventListener(o, c, !1) : n.attachEvent && n.attachEvent("on" + o, c))), h.add && (h.add.call(n, s), s.handler.guid || (s.handler.guid = u.guid)), e ? l.splice(l.delegateCount++, 0, s) : l.push(s), i.event.global[o] = !0;
                n = null
            }
        },
        global: {},
        remove: function (n, t, r, u) {
            var v = i.hasData(n) && i._data(n),
                a, y, s, f, w, h, l, o, p, e, c;
            if ( !! v && !! (l = v.events)) {
                for (t = oi(t || "").split(" "), a = 0; a < t.length; a++) {
                    if (y = dt.exec(t[a]) || [], s = y[1], f = y[2], !s) {
                        f = f ? "." + f : "";
                        for (h in l) i.event.remove(n, h + f, r, u);
                        return
                    }
                    if (o = i.event.special[s] || {}, s = (u ? o.delegateType : o.bindType) || s, e = l[s] || [], w = e.length, f = f ? new RegExp("(^|\\.)" + f.split(".").sort().join("\\.(?:.*\\.)?") + "(\\.|$)") : null, r || f || u || o.remove) for (h = 0; h < e.length; h++) c = e[h], r && r.guid !== c.guid || (!f || f.test(c.namespace)) && (!u || u === c.selector || u === "**" && c.selector) && (e.splice(h--, 1), c.selector && e.delegateCount--, o.remove && o.remove.call(n, c));
                    else e.length = 0;
                    e.length === 0 && w !== e.length && ((!o.teardown || o.teardown.call(n, f) === !1) && i.removeEvent(n, s, v.handle), delete l[s])
                }
                i.isEmptyObject(l) && (p = v.handle, p && (p.elem = null), i.removeData(n, ["events", "handle"], !0))
            }
        },
        customEvent: {
            getData: !0,
            setData: !0,
            changeData: !0
        },
        trigger: function (r, u, f, e) {
            if (!f || f.nodeType !== 3 && f.nodeType !== 8) {
                var o = r.type || r,
                    w = [],
                    p, k, c, s, h, a, l, v, y, b;
                if (o.indexOf("!") >= 0 && (o = o.slice(0, - 1), k = !0), o.indexOf(".") >= 0 && (w = o.split("."), o = w.shift(), w.sort()), (!f || i.event.customEvent[o]) && !i.event.global[o]) return;
                if (r = typeof r == "object" ? r[i.expando] ? r : new i.Event(o, r) : new i.Event(o), r.type = o, r.isTrigger = !0, r.exclusive = k, r.namespace = w.join("."), r.namespace_re = r.namespace ? new RegExp("(^|\\.)" + w.join("\\.(?:.*\\.)?") + "(\\.|$)") : null, a = o.indexOf(":") < 0 ? "on" + o : "", (e || !f) && r.preventDefault(), !f) {
                    p = i.cache;
                    for (c in p) p[c].events && p[c].events[o] && i.event.trigger(r, u, p[c].handle.elem, !0);
                    return
                }
                if (r.result = t, r.target || (r.target = f), u = u != null ? i.makeArray(u) : [], u.unshift(r), l = i.event.special[o] || {}, l.trigger && l.trigger.apply(f, u) === !1) return;
                if (y = [
                    [f, l.bindType || o]
                ], !e && !l.noBubble && !i.isWindow(f)) {
                    for (b = l.delegateType || o, h = null, s = f.parentNode; s; s = s.parentNode) y.push([s, b]), h = s;
                    h && h === f.ownerDocument && y.push([h.defaultView || h.parentWindow || n, b])
                }
                for (c = 0; c < y.length; c++) if (s = y[c][0], r.type = y[c][1], v = (i._data(s, "events") || {})[r.type] && i._data(s, "handle"), v && v.apply(s, u), v = a && s[a], v && i.acceptData(s) && v.apply(s, u), r.isPropagationStopped()) break;
                return r.type = o, r.isDefaultPrevented() || (!l._default || l._default.apply(f.ownerDocument, u) === !1) && (o !== "click" || !i.nodeName(f, "a")) && i.acceptData(f) && a && f[o] && (o !== "focus" && o !== "blur" || r.target.offsetWidth !== 0) && !i.isWindow(f) && (h = f[a], h && (f[a] = null), i.event.triggered = o, f[o](), i.event.triggered = t, h && (f[a] = h)), r.result
            }
        },
        dispatch: function (r) {
            r = i.event.fix(r || n.event);
            var v = (i._data(this, "events") || {})[r.type] || [],
                y = v.delegateCount,
                b = [].slice.call(arguments, 0),
                d = !r.exclusive && !r.namespace,
                k = (i.event.special[r.type] || {}).handle,
                w = [],
                f, p, e, l, a, h, c, u, s, o, g;
            if (b[0] = r, r.delegateTarget = this, y && !r.target.disabled && (!r.button || r.type !== "click")) for (e = r.target; e != this; e = e.parentNode || this) {
                for (a = {}, c = [], f = 0; f < y; f++) u = v[f], s = u.selector, o = a[s], u.isPositional ? o = (o || (a[s] = i(s))).index(e) >= 0 : o === t && (o = a[s] = u.quick ? yu(e, u.quick) : i(e).is(s)), o && c.push(u);
                c.length && w.push({
                    elem: e,
                    matches: c
                })
            }
            for (v.length > y && w.push({
                elem: this,
                matches: v.slice(y)
            }), f = 0; f < w.length && !r.isPropagationStopped(); f++) for (h = w[f], r.currentTarget = h.elem, p = 0; p < h.matches.length && !r.isImmediatePropagationStopped(); p++) u = h.matches[p], (d || !r.namespace && !u.namespace || r.namespace_re && r.namespace_re.test(u.namespace)) && (r.data = u.data, r.handleObj = u, l = (k || u.handler).apply(h.elem, b), l !== t && (r.result = l, l === !1 && (r.preventDefault(), r.stopPropagation())));
            return r.result
        },
        props: "attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function (n, t) {
                return n.which == null && (n.which = t.charCode != null ? t.charCode : t.keyCode), n
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement wheelDelta".split(" "),
            filter: function (n, i) {
                var s, f, u, e = i.button,
                    o = i.fromElement;
                return n.pageX == null && i.clientX != null && (s = n.target.ownerDocument || r, f = s.documentElement, u = s.body, n.pageX = i.clientX + (f && f.scrollLeft || u && u.scrollLeft || 0) - (f && f.clientLeft || u && u.clientLeft || 0), n.pageY = i.clientY + (f && f.scrollTop || u && u.scrollTop || 0) - (f && f.clientTop || u && u.clientTop || 0)), !n.relatedTarget && o && (n.relatedTarget = o === n.target ? i.toElement : o), !n.which && e !== t && (n.which = e & 1 ? 1 : e & 2 ? 3 : e & 4 ? 2 : 0), n
            }
        },
        fix: function (n) {
            if (n[i.expando]) return n;
            var e, o, u = n,
                f = i.event.fixHooks[n.type] || {}, s = f.props ? this.props.concat(f.props) : this.props;
            for (n = i.Event(u), e = s.length; e;) o = s[--e], n[o] = u[o];
            return n.target || (n.target = u.srcElement || r), n.target.nodeType === 3 && (n.target = n.target.parentNode), n.metaKey === t && (n.metaKey = n.ctrlKey), f.filter ? f.filter(n, u) : n
        },
        special: {
            ready: {
                setup: i.bindReady
            },
            focus: {
                delegateType: "focusin",
                noBubble: !0
            },
            blur: {
                delegateType: "focusout",
                noBubble: !0
            },
            beforeunload: {
                setup: function (n, t, r) {
                    i.isWindow(this) && (this.onbeforeunload = r)
                },
                teardown: function (n, t) {
                    this.onbeforeunload === t && (this.onbeforeunload = null)
                }
            }
        },
        simulate: function (n, t, r, u) {
            var f = i.extend(new i.Event, r, {
                type: n,
                isSimulated: !0,
                originalEvent: {}
            });
            u ? i.event.trigger(f, null, t) : i.event.dispatch.call(t, f), f.isDefaultPrevented() && r.preventDefault()
        }
    }, i.event.handle = i.event.dispatch, i.removeEvent = r.removeEventListener ? function (n, t, i) {
        n.removeEventListener && n.removeEventListener(t, i, !1)
    } : function (n, t, i) {
        n.detachEvent && n.detachEvent("on" + t, i)
    }, i.Event = function (n, t) {
        if (!(this instanceof i.Event)) return new i.Event(n, t);
        n && n.type ? (this.originalEvent = n, this.type = n.type, this.isDefaultPrevented = n.defaultPrevented || n.returnValue === !1 || n.getPreventDefault && n.getPreventDefault() ? p : h) : this.type = n, t && i.extend(this, t), this.timeStamp = n && n.timeStamp || i.now(), this[i.expando] = !0
    }, i.Event.prototype = {
        preventDefault: function () {
            this.isDefaultPrevented = p;
            var n = this.originalEvent;
            !n || (n.preventDefault ? n.preventDefault() : n.returnValue = !1)
        },
        stopPropagation: function () {
            this.isPropagationStopped = p;
            var n = this.originalEvent;
            !n || (n.stopPropagation && n.stopPropagation(), n.cancelBubble = !0)
        },
        stopImmediatePropagation: function () {
            this.isImmediatePropagationStopped = p, this.stopPropagation()
        },
        isDefaultPrevented: h,
        isPropagationStopped: h,
        isImmediatePropagationStopped: h
    }, i.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }, function (n, t) {
        i.event.special[n] = i.event.special[t] = {
            delegateType: t,
            bindType: t,
            handle: function (n) {
                var e = this,
                    r = n.relatedTarget,
                    t = n.handleObj,
                    o = t.selector,
                    u, f;
                return r && t.origType !== n.type && (r === e || i.contains(e, r)) || (u = n.type, n.type = t.origType, f = t.handler.apply(this, arguments), n.type = u), f
            }
        }
    }), i.support.submitBubbles || (i.event.special.submit = {
        setup: function () {
            if (i.nodeName(this, "form")) return !1;
            i.event.add(this, "click._submit keypress._submit", function (n) {
                var u = n.target,
                    r = i.nodeName(u, "input") || i.nodeName(u, "button") ? u.form : t;
                r && !r._submit_attached && (i.event.add(r, "submit._submit", function (n) {
                    this.parentNode && i.event.simulate("submit", this.parentNode, n, !0)
                }), r._submit_attached = !0)
            })
        },
        teardown: function () {
            if (i.nodeName(this, "form")) return !1;
            i.event.remove(this, "._submit")
        }
    }), i.support.changeBubbles || (i.event.special.change = {
        setup: function () {
            if (it.test(this.nodeName)) return (this.type === "checkbox" || this.type === "radio") && (i.event.add(this, "propertychange._change", function (n) {
                n.originalEvent.propertyName === "checked" && (this._just_changed = !0)
            }), i.event.add(this, "click._change", function (n) {
                this._just_changed && (this._just_changed = !1, i.event.simulate("change", this, n, !0))
            })), !1;
            i.event.add(this, "beforeactivate._change", function (n) {
                var t = n.target;
                it.test(t.nodeName) && !t._change_attached && (i.event.add(t, "change._change", function (n) {
                    this.parentNode && !n.isSimulated && i.event.simulate("change", this.parentNode, n, !0)
                }), t._change_attached = !0)
            })
        },
        handle: function (n) {
            var t = n.target;
            if (this !== t || n.isSimulated || n.isTrigger || t.type !== "radio" && t.type !== "checkbox") return n.handleObj.handler.apply(this, arguments)
        },
        teardown: function () {
            return i.event.remove(this, "._change"), it.test(this.nodeName)
        }
    }), i.support.focusinBubbles || i.each({
        focus: "focusin",
        blur: "focusout"
    }, function (n, t) {
        var f = 0,
            u = function (n) {
                i.event.simulate(t, n.target, i.event.fix(n), !0)
            };
        i.event.special[t] = {
            setup: function () {
                f++ == 0 && r.addEventListener(n, u, !0)
            },
            teardown: function () {
                --f == 0 && r.removeEventListener(n, u, !0)
            }
        }
    }), i.fn.extend({
        on: function (n, r, u, f, e) {
            var o, s;
            if (typeof n == "object") {
                typeof r != "string" && (u = r, r = t);
                for (s in n) this.on(s, r, u, n[s], e);
                return this
            }
            if (u == null && f == null ? (f = r, u = r = t) : f == null && (typeof r == "string" ? (f = u, u = t) : (f = u, u = r, r = t)), f === !1) f = h;
            else if (!f) return this;
            return e === 1 && (o = f, f = function (n) {
                return i().off(n), o.apply(this, arguments)
            }, f.guid = o.guid || (o.guid = i.guid++)), this.each(function () {
                i.event.add(this, n, f, u, r)
            })
        },
        one: function (n, t, i, r) {
            return this.on.call(this, n, t, i, r, 1)
        },
        off: function (n, r, u) {
            var f, e;
            if (n && n.preventDefault && n.handleObj) return f = n.handleObj, i(n.delegateTarget).off(f.namespace ? f.type + "." + f.namespace : f.type, f.selector, f.handler), this;
            if (typeof n == "object") {
                for (e in n) this.off(e, r, n[e]);
                return this
            }
            return (r === !1 || typeof r == "function") && (u = r, r = t), u === !1 && (u = h), this.each(function () {
                i.event.remove(this, n, u, r)
            })
        },
        bind: function (n, t, i) {
            return this.on(n, null, t, i)
        },
        unbind: function (n, t) {
            return this.off(n, null, t)
        },
        live: function (n, t, r) {
            i(this.context).on(n, this.selector, t, r);
            return this
        },
        die: function (n, t) {
            return i(this.context).off(n, this.selector || "**", t), this
        },
        delegate: function (n, t, i, r) {
            return this.on(t, n, i, r)
        },
        undelegate: function (n, t, i) {
            return arguments.length == 1 ? this.off(n, "**") : this.off(t, n, i)
        },
        trigger: function (n, t) {
            return this.each(function () {
                i.event.trigger(n, t, this)
            })
        },
        triggerHandler: function (n, t) {
            if (this[0]) return i.event.trigger(n, t, this[0], !0)
        },
        toggle: function (n) {
            var r = arguments,
                f = n.guid || i.guid++,
                t = 0,
                u = function (u) {
                    var f = (i._data(this, "lastToggle" + n.guid) || 0) % t;
                    return i._data(this, "lastToggle" + n.guid, f + 1), u.preventDefault(), r[f].apply(this, arguments) || !1
                };
            for (u.guid = f; t < r.length;) r[t++].guid = f;
            return this.click(u)
        },
        hover: function (n, t) {
            return this.mouseenter(n).mouseleave(t || n)
        }
    }), i.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function (n, t) {
        i.fn[t] = function (n, i) {
            return i == null && (i = n, n = null), arguments.length > 0 ? this.bind(t, n, i) : this.trigger(t)
        }, i.attrFn && (i.attrFn[t] = !0), au.test(t) && (i.event.fixHooks[t] = i.event.keyHooks), pu.test(t) && (i.event.fixHooks[t] = i.event.mouseHooks)
    }),
    function () {
        function b(t, i, r, u, f, e) {
            for (var s, c, h = 0, l = u.length; h < l; h++) if (s = u[h], s) {
                for (c = !1, s = s[t]; s;) {
                    if (s[o] === r) {
                        c = u[s.sizset];
                        break
                    }
                    if (s.nodeType === 1) if (e || (s[o] = r, s.sizset = h), typeof i != "string") {
                        if (s === i) {
                            c = !0;
                            break
                        }
                    } else if (n.filter(i, [s]).length > 0) {
                        c = s;
                        break
                    }
                    s = s[t]
                }
                u[h] = c
            }
        }
        function d(n, t, i, r, u, f) {
            for (var e, h, s = 0, c = r.length; s < c; s++) if (e = r[s], e) {
                for (h = !1, e = e[n]; e;) {
                    if (e[o] === i) {
                        h = r[e.sizset];
                        break
                    }
                    if (e.nodeType === 1 && !f && (e[o] = i, e.sizset = s), e.nodeName.toLowerCase() === t) {
                        h = e;
                        break
                    }
                    e = e[n]
                }
                r[s] = h
            }
        }
        var w = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,
            o = "sizcache" + (Math.random() + "").replace(".", ""),
            p = 0,
            g = Object.prototype.toString,
            l = !1,
            k = !0,
            e = /\\/g,
            it = /\r\n/g,
            c = /\W/,
            n, h, f, a, s, y;
        [0, 0].sort(function () {
            return k = !1, 0
        }), n = function (t, i, e, o) {
            var it;
            if (e = e || [], i = i || r, it = i, i.nodeType !== 1 && i.nodeType !== 9) return [];
            if (!t || typeof t != "string") return e;
            var v, a, h, d, l, p, b, c, rt = !0,
                k = n.isXML(i),
                s = [],
                tt = t;
            do if (w.exec(""), v = w.exec(tt), v && (tt = v[3], s.push(v[1]), v[2])) {
                d = v[3];
                break
            }
            while (v);
            if (s.length > 1 && nt.exec(t)) if (s.length === 2 && u.relative[s[0]]) a = y(s[0] + s[1], i, o);
            else for (a = u.relative[s[0]] ? [i] : n(s.shift(), i); s.length;) t = s.shift(), u.relative[t] && (t += s.shift()), a = y(t, a, o);
            else if (!o && s.length > 1 && i.nodeType === 9 && !k && u.match.ID.test(s[0]) && !u.match.ID.test(s[s.length - 1]) && (l = n.find(s.shift(), i, k), i = l.expr ? n.filter(l.expr, l.set)[0] : l.set[0]), i) for (l = o ? {
                expr: s.pop(),
                set: f(o)
            } : n.find(s.pop(), s.length === 1 && (s[0] === "~" || s[0] === "+") && i.parentNode ? i.parentNode : i, k), a = l.expr ? n.filter(l.expr, l.set) : l.set, s.length > 0 ? h = f(a) : rt = !1; s.length;) p = s.pop(), b = p, u.relative[p] ? b = s.pop() : p = "", b == null && (b = i), u.relative[p](h, b, k);
            else h = s = [];
            if (h || (h = a), h || n.error(p || t), g.call(h) === "[object Array]") if (rt) if (i && i.nodeType === 1) for (c = 0; h[c] != null; c++) h[c] && (h[c] === !0 || h[c].nodeType === 1 && n.contains(i, h[c])) && e.push(a[c]);
            else for (c = 0; h[c] != null; c++) h[c] && h[c].nodeType === 1 && e.push(a[c]);
            else e.push.apply(e, h);
            else f(h, e);
            return d && (n(d, it, e, o), n.uniqueSort(e)), e
        }, n.uniqueSort = function (n) {
            if (a && (l = k, n.sort(a), l)) for (var t = 1; t < n.length; t++) n[t] === n[t - 1] && n.splice(t--, 1);
            return n
        }, n.matches = function (t, i) {
            return n(t, null, null, i)
        }, n.matchesSelector = function (t, i) {
            return n(i, null, null, [t]).length > 0
        }, n.find = function (n, t, i) {
            var f, s, c, r, o, h;
            if (!n) return [];
            for (s = 0, c = u.order.length; s < c; s++) if (o = u.order[s], (r = u.leftMatch[o].exec(n)) && (h = r[1], r.splice(1, 1), h.substr(h.length - 1) !== "\\" && (r[1] = (r[1] || "").replace(e, ""), f = u.find[o](r, t, i), f != null))) {
                n = n.replace(u.match[o], "");
                break
            }
            return f || (f = typeof t.getElementsByTagName != "undefined" ? t.getElementsByTagName("*") : []), {
                set: f,
                expr: n
            }
        }, n.filter = function (i, r, f, e) {
            for (var o, c, h, v, y, b, p, l, w, k = i, a = [], s = r, d = r && r[0] && n.isXML(r[0]); i && r.length;) {
                for (h in u.filter) if ((o = u.leftMatch[h].exec(i)) != null && o[2]) {
                    if (b = u.filter[h], p = o[1], c = !1, o.splice(1, 1), p.substr(p.length - 1) === "\\") continue;
                    if (s === a && (a = []), u.preFilter[h]) if (o = u.preFilter[h](o, s, f, a, e, d), o) {
                        if (o === !0) continue
                    } else c = v = !0;
                    if (o) for (l = 0;
                    (y = s[l]) != null; l++) y && (v = b(y, o, l, s), w = e ^ v, f && v != null ? w ? c = !0 : s[l] = !1 : w && (a.push(y), c = !0));
                    if (v !== t) {
                        if (f || (s = a), i = i.replace(u.match[h], ""), !c) return [];
                        break
                    }
                }
                if (i === k) if (c == null) n.error(i);
                else break;
                k = i
            }
            return s
        }, n.error = function (n) {
            throw "Syntax error, unrecognized expression: " + n;
        };
        var v = n.getText = function (n) {
            var r, u, t = n.nodeType,
                i = "";
            if (t) {
                if (t === 1) {
                    if (typeof n.textContent == "string") return n.textContent;
                    if (typeof n.innerText == "string") return n.innerText.replace(it, "");
                    for (n = n.firstChild; n; n = n.nextSibling) i += v(n)
                } else if (t === 3 || t === 4) return n.nodeValue
            } else for (r = 0; u = n[r]; r++) u.nodeType !== 8 && (i += v(u));
            return i
        }, u = n.selectors = {
            order: ["ID", "NAME", "TAG"],
            match: {
                ID: /#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
                CLASS: /\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
                NAME: /\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,
                ATTR: /\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(?:(['"])(.*?)\3|(#?(?:[\w\u00c0-\uFFFF\-]|\\.)*)|)|)\s*\]/,
                TAG: /^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,
                CHILD: /:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/,
                POS: /:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,
                PSEUDO: /:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/
            },
            leftMatch: {},
            attrMap: {
                "class": "className",
                "for": "htmlFor"
            },
            attrHandle: {
                href: function (n) {
                    return n.getAttribute("href")
                },
                type: function (n) {
                    return n.getAttribute("type")
                }
            },
            relative: {
                "+": function (t, i) {
                    var s = typeof i == "string",
                        e = s && !c.test(i),
                        o = s && !e,
                        u, f, r;
                    for (e && (i = i.toLowerCase()), u = 0, f = t.length; u < f; u++) if (r = t[u]) {
                        while ((r = r.previousSibling) && r.nodeType !== 1);
                        t[u] = o || r && r.nodeName.toLowerCase() === i ? r || !1 : r === i
                    }
                    o && n.filter(i, t, !0)
                },
                ">": function (t, i) {
                    var u, e = typeof i == "string",
                        r = 0,
                        o = t.length,
                        f;
                    if (e && !c.test(i)) for (i = i.toLowerCase(); r < o; r++) u = t[r], u && (f = u.parentNode, t[r] = f.nodeName.toLowerCase() === i ? f : !1);
                    else {
                        for (; r < o; r++) u = t[r], u && (t[r] = e ? u.parentNode : u.parentNode === i);
                        e && n.filter(i, t, !0)
                    }
                },
                "": function (n, t, i) {
                    var u, f = p++,
                        r = b;
                    typeof t == "string" && !c.test(t) && (t = t.toLowerCase(), u = t, r = d), r("parentNode", t, f, n, u, i)
                },
                "~": function (n, t, i) {
                    var u, f = p++,
                        r = b;
                    typeof t == "string" && !c.test(t) && (t = t.toLowerCase(), u = t, r = d), r("previousSibling", t, f, n, u, i)
                }
            },
            find: {
                ID: function (n, t, i) {
                    if (typeof t.getElementById != "undefined" && !i) {
                        var r = t.getElementById(n[1]);
                        return r && r.parentNode ? [r] : []
                    }
                },
                NAME: function (n, t) {
                    var u, r, i, f;
                    if (typeof t.getElementsByName != "undefined") {
                        for (u = [], r = t.getElementsByName(n[1]), i = 0, f = r.length; i < f; i++) r[i].getAttribute("name") === n[1] && u.push(r[i]);
                        return u.length === 0 ? null : u
                    }
                },
                TAG: function (n, t) {
                    if (typeof t.getElementsByTagName != "undefined") return t.getElementsByTagName(n[1])
                }
            },
            preFilter: {
                CLASS: function (n, t, i, r, u, f) {
                    if (n = " " + n[1].replace(e, "") + " ", f) return n;
                    for (var s = 0, o;
                    (o = t[s]) != null; s++) o && (u ^ (o.className && (" " + o.className + " ").replace(/[\t\n\r]/g, " ").indexOf(n) >= 0) ? i || r.push(o) : i && (t[s] = !1));
                    return !1
                },
                ID: function (n) {
                    return n[1].replace(e, "")
                },
                TAG: function (n) {
                    return n[1].replace(e, "").toLowerCase()
                },
                CHILD: function (t) {
                    if (t[1] === "nth") {
                        t[2] || n.error(t[0]), t[2] = t[2].replace(/^\+|\s*/g, "");
                        var i = /(-?)(\d*)(?:n([+\-]?\d*))?/.exec(t[2] === "even" && "2n" || t[2] === "odd" && "2n+1" || !/\D/.test(t[2]) && "0n+" + t[2] || t[2]);
                        t[2] = i[1] + (i[2] || 1) - 0, t[3] = i[3] - 0
                    } else t[2] && n.error(t[0]);
                    return t[0] = p++, t
                },
                ATTR: function (n, t, i, r, f, o) {
                    var s = n[1] = n[1].replace(e, "");
                    return !o && u.attrMap[s] && (n[1] = u.attrMap[s]), n[4] = (n[4] || n[5] || "").replace(e, ""), n[2] === "~=" && (n[4] = " " + n[4] + " "), n
                },
                PSEUDO: function (t, i, r, f, e) {
                    if (t[1] === "not") if ((w.exec(t[3]) || "").length > 1 || /^\w/.test(t[3])) t[3] = n(t[3], null, null, i);
                    else {
                        var o = n.filter(t[3], i, r, !0 ^ e);
                        return r || f.push.apply(f, o), !1
                    } else if (u.match.POS.test(t[0]) || u.match.CHILD.test(t[0])) return !0;
                    return t
                },
                POS: function (n) {
                    return n.unshift(!0), n
                }
            },
            filters: {
                enabled: function (n) {
                    return n.disabled === !1 && n.type !== "hidden"
                },
                disabled: function (n) {
                    return n.disabled === !0
                },
                checked: function (n) {
                    return n.checked === !0
                },
                selected: function (n) {
                    return n.parentNode && n.parentNode.selectedIndex, n.selected === !0
                },
                parent: function (n) {
                    return !!n.firstChild
                },
                empty: function (n) {
                    return !n.firstChild
                },
                has: function (t, i, r) {
                    return !!n(r[3], t).length
                },
                header: function (n) {
                    return /h\d/i.test(n.nodeName)
                },
                text: function (n) {
                    var i = n.getAttribute("type"),
                        t = n.type;
                    return n.nodeName.toLowerCase() === "input" && "text" === t && (i === t || i === null)
                },
                radio: function (n) {
                    return n.nodeName.toLowerCase() === "input" && "radio" === n.type
                },
                checkbox: function (n) {
                    return n.nodeName.toLowerCase() === "input" && "checkbox" === n.type
                },
                file: function (n) {
                    return n.nodeName.toLowerCase() === "input" && "file" === n.type
                },
                password: function (n) {
                    return n.nodeName.toLowerCase() === "input" && "password" === n.type
                },
                submit: function (n) {
                    var t = n.nodeName.toLowerCase();
                    return (t === "input" || t === "button") && "submit" === n.type
                },
                image: function (n) {
                    return n.nodeName.toLowerCase() === "input" && "image" === n.type
                },
                reset: function (n) {
                    var t = n.nodeName.toLowerCase();
                    return (t === "input" || t === "button") && "reset" === n.type
                },
                button: function (n) {
                    var t = n.nodeName.toLowerCase();
                    return t === "input" && "button" === n.type || t === "button"
                },
                input: function (n) {
                    return /input|select|textarea|button/i.test(n.nodeName)
                },
                focus: function (n) {
                    return n === n.ownerDocument.activeElement
                }
            },
            setFilters: {
                first: function (n, t) {
                    return t === 0
                },
                last: function (n, t, i, r) {
                    return t === r.length - 1
                },
                even: function (n, t) {
                    return t % 2 == 0
                },
                odd: function (n, t) {
                    return t % 2 == 1
                },
                lt: function (n, t, i) {
                    return t < i[3] - 0
                },
                gt: function (n, t, i) {
                    return t > i[3] - 0
                },
                nth: function (n, t, i) {
                    return i[3] - 0 === t
                },
                eq: function (n, t, i) {
                    return i[3] - 0 === t
                }
            },
            filter: {
                PSEUDO: function (t, i, r, f) {
                    var o = i[1],
                        c = u.filters[o],
                        s, e, h;
                    if (c) return c(t, r, i, f);
                    if (o === "contains") return (t.textContent || t.innerText || v([t]) || "").indexOf(i[3]) >= 0;
                    if (o === "not") {
                        for (s = i[3], e = 0, h = s.length; e < h; e++) if (s[e] === t) return !1;
                        return !0
                    }
                    n.error(o)
                },
                CHILD: function (n, t) {
                    var r, e, s, u, l, c, f, h = t[1],
                        i = n;
                    switch (h) {
                    case "only":
                    case "first":
                        while (i = i.previousSibling) if (i.nodeType === 1) return !1;
                        if (h === "first") return !0;
                        i = n;
                    case "last":
                        while (i = i.nextSibling) if (i.nodeType === 1) return !1;
                        return !0;
                    case "nth":
                        if (r = t[2], e = t[3], r === 1 && e === 0) return !0;
                        if (s = t[0], u = n.parentNode, u && (u[o] !== s || !n.nodeIndex)) {
                            for (c = 0, i = u.firstChild; i; i = i.nextSibling) i.nodeType === 1 && (i.nodeIndex = ++c);
                            u[o] = s
                        }
                        return f = n.nodeIndex - e, r === 0 ? f === 0 : f % r == 0 && f / r >= 0
                    }
                },
                ID: function (n, t) {
                    return n.nodeType === 1 && n.getAttribute("id") === t
                },
                TAG: function (n, t) {
                    return t === "*" && n.nodeType === 1 || !! n.nodeName && n.nodeName.toLowerCase() === t
                },
                CLASS: function (n, t) {
                    return (" " + (n.className || n.getAttribute("class")) + " ").indexOf(t) > -1
                },
                ATTR: function (t, i) {
                    var o = i[1],
                        s = n.attr ? n.attr(t, o) : u.attrHandle[o] ? u.attrHandle[o](t) : t[o] != null ? t[o] : t.getAttribute(o),
                        f = s + "",
                        e = i[2],
                        r = i[4];
                    return s == null ? e === "!=" : !e && n.attr ? s != null : e === "=" ? f === r : e === "*=" ? f.indexOf(r) >= 0 : e === "~=" ? (" " + f + " ").indexOf(r) >= 0 : r ? e === "!=" ? f !== r : e === "^=" ? f.indexOf(r) === 0 : e === "$=" ? f.substr(f.length - r.length) === r : e === "|=" ? f === r || f.substr(0, r.length + 1) === r + "-" : !1 : f && s !== !1
                },
                POS: function (n, t, i, r) {
                    var e = t[2],
                        f = u.setFilters[e];
                    if (f) return f(n, i, t, r)
                }
            }
        }, nt = u.match.POS,
            tt = function (n, t) {
                return "\\" + (+t + 1)
            };
        for (h in u.match) u.match[h] = new RegExp(u.match[h].source + /(?![^\[]*\])(?![^\(]*\))/.source), u.leftMatch[h] = new RegExp(/(^(?:.|\r|\n)*?)/.source + u.match[h].source.replace(/\\(\d+)/g, tt));
        f = function (n, t) {
            return (n = Array.prototype.slice.call(n, 0), t) ? (t.push.apply(t, n), t) : n
        };
        try {
            Array.prototype.slice.call(r.documentElement.childNodes, 0)[0].nodeType
        } catch (rt) {
            f = function (n, t) {
                var i = 0,
                    r = t || [],
                    u;
                if (g.call(n) === "[object Array]") Array.prototype.push.apply(r, n);
                else if (typeof n.length == "number") for (u = n.length; i < u; i++) r.push(n[i]);
                else for (; n[i]; i++) r.push(n[i]);
                return r
            }
        }
        r.documentElement.compareDocumentPosition ? a = function (n, t) {
            return n === t ? (l = !0, 0) : !n.compareDocumentPosition || !t.compareDocumentPosition ? n.compareDocumentPosition ? -1 : 1 : n.compareDocumentPosition(t) & 4 ? -1 : 1
        } : (a = function (n, t) {
            var i;
            if (n === t) return l = !0, 0;
            if (n.sourceIndex && t.sourceIndex) return n.sourceIndex - t.sourceIndex;
            var o, c, f = [],
                u = [],
                h = n.parentNode,
                e = t.parentNode,
                r = h;
            if (h === e) return s(n, t);
            if (!h) return -1;
            if (!e) return 1;
            while (r) f.unshift(r), r = r.parentNode;
            for (r = e; r;) u.unshift(r), r = r.parentNode;
            for (o = f.length, c = u.length, i = 0; i < o && i < c; i++) if (f[i] !== u[i]) return s(f[i], u[i]);
            return i === o ? s(n, u[i], - 1) : s(f[i], t, 1)
        }, s = function (n, t, i) {
            if (n === t) return i;
            for (var r = n.nextSibling; r;) {
                if (r === t) return -1;
                r = r.nextSibling
            }
            return 1
        }),
        function () {
            var i = r.createElement("div"),
                f = "script" + +new Date,
                n = r.documentElement;
            i.innerHTML = "<a name='" + f + "'/>", n.insertBefore(i, n.firstChild), r.getElementById(f) && (u.find.ID = function (n, i, r) {
                if (typeof i.getElementById != "undefined" && !r) {
                    var u = i.getElementById(n[1]);
                    return u ? u.id === n[1] || typeof u.getAttributeNode != "undefined" && u.getAttributeNode("id").nodeValue === n[1] ? [u] : t : []
                }
            }, u.filter.ID = function (n, t) {
                var i = typeof n.getAttributeNode != "undefined" && n.getAttributeNode("id");
                return n.nodeType === 1 && i && i.nodeValue === t
            }), n.removeChild(i), n = i = null
        }(),
        function () {
            var n = r.createElement("div");
            n.appendChild(r.createComment("")), n.getElementsByTagName("*").length > 0 && (u.find.TAG = function (n, t) {
                var r = t.getElementsByTagName(n[1]),
                    u, i;
                if (n[1] === "*") {
                    for (u = [], i = 0; r[i]; i++) r[i].nodeType === 1 && u.push(r[i]);
                    r = u
                }
                return r
            }), n.innerHTML = "<a href='#'></a>", n.firstChild && typeof n.firstChild.getAttribute != "undefined" && n.firstChild.getAttribute("href") !== "#" && (u.attrHandle.href = function (n) {
                return n.getAttribute("href", 2)
            }), n = null
        }(), r.querySelectorAll && function () {
            var e = n,
                t = r.createElement("div"),
                o = "__sizzle__",
                i;
            if (t.innerHTML = "<p class='TEST'></p>", !t.querySelectorAll || t.querySelectorAll(".TEST").length !== 0) {
                n = function (t, i, s, h) {
                    var c, l;
                    if (i = i || r, !h && !n.isXML(i)) {
                        if (c = /^(\w+$)|^\.([\w\-]+$)|^#([\w\-]+$)/.exec(t), c && (i.nodeType === 1 || i.nodeType === 9)) {
                            if (c[1]) return f(i.getElementsByTagName(t), s);
                            if (c[2] && u.find.CLASS && i.getElementsByClassName) return f(i.getElementsByClassName(c[2]), s)
                        }
                        if (i.nodeType === 9) {
                            if (t === "body" && i.body) return f([i.body], s);
                            if (c && c[3]) {
                                if (l = i.getElementById(c[3]), !l || !l.parentNode) return f([], s);
                                if (l.id === c[3]) return f([l], s)
                            }
                            try {
                                return f(i.querySelectorAll(t), s)
                            } catch (k) {}
                        } else if (i.nodeType === 1 && i.nodeName.toLowerCase() !== "object") {
                            var w = i,
                                v = i.getAttribute("id"),
                                a = v || o,
                                y = i.parentNode,
                                p = /^\s*[+~]/.test(t);
                            v ? a = a.replace(/'/g, "\\$&") : i.setAttribute("id", a), p && y && (i = i.parentNode);
                            try {
                                if (!p || y) return f(i.querySelectorAll("[id='" + a + "'] " + t), s)
                            } catch (b) {} finally {
                                v || w.removeAttribute("id")
                            }
                        }
                    }
                    return e(t, i, s, h)
                };
                for (i in e) n[i] = e[i];
                t = null
            }
        }(),
        function () {
            var i = r.documentElement,
                t = i.matchesSelector || i.mozMatchesSelector || i.webkitMatchesSelector || i.msMatchesSelector,
                e, f;
            if (t) {
                e = !t.call(r.createElement("div"), "div"), f = !1;
                try {
                    t.call(r.documentElement, "[test!='']:sizzle")
                } catch (o) {
                    f = !0
                }
                n.matchesSelector = function (i, r) {
                    if (r = r.replace(/\=\s*([^'"\]]*)\s*\]/g, "='$1']"), !n.isXML(i)) try {
                        if (f || !u.match.PSEUDO.test(r) && !/!=/.test(r)) {
                            var o = t.call(i, r);
                            if (o || !e || i.document && i.document.nodeType !== 11) return o
                        }
                    } catch (s) {}
                    return n(r, null, null, [i]).length > 0
                }
            }
        }(),
        function () {
            var n = r.createElement("div");
            if (n.innerHTML = "<div class='test e'></div><div class='test'></div>", !! n.getElementsByClassName && n.getElementsByClassName("e").length !== 0) {
                if (n.lastChild.className = "e", n.getElementsByClassName("e").length === 1) return;
                u.order.splice(1, 0, "CLASS"), u.find.CLASS = function (n, t, i) {
                    if (typeof t.getElementsByClassName != "undefined" && !i) return t.getElementsByClassName(n[1])
                }, n = null
            }
        }(), n.contains = r.documentElement.contains ? function (n, t) {
            return n !== t && (n.contains ? n.contains(t) : !0)
        } : r.documentElement.compareDocumentPosition ? function (n, t) {
            return !!(n.compareDocumentPosition(t) & 16)
        } : function () {
            return !1
        }, n.isXML = function (n) {
            var t = (n ? n.ownerDocument || n : 0).documentElement;
            return t ? t.nodeName !== "HTML" : !1
        }, y = function (t, i, r) {
            for (var s, h = [], c = "", e = i.nodeType ? [i] : i, f, o; s = u.match.PSEUDO.exec(t);) c += s[0], t = t.replace(u.match.PSEUDO, "");
            for (t = u.relative[t] ? t + "*" : t, f = 0, o = e.length; f < o; f++) n(t, e[f], h, r);
            return n.filter(c, h)
        }, n.attr = i.attr, n.selectors.attrMap = {}, i.find = n, i.expr = n.selectors, i.expr[":"] = i.expr.filters, i.unique = n.uniqueSort, i.text = n.getText, i.isXMLDoc = n.isXML, i.contains = n.contains
    }();
    var te = /Until$/,
        ie = /^(?:parents|prevUntil|prevAll)/,
        ne = /,/,
        df = /^.[^:#\[\.,]*$/,
        gf = Array.prototype.slice,
        ni = i.expr.match.POS,
        re = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    i.fn.extend({
        find: function (n) {
            var s = this,
                t, e, r, o, u, f;
            if (typeof n != "string") return i(n).filter(function () {
                for (t = 0, e = s.length; t < e; t++) if (i.contains(s[t], this)) return !0
            });
            for (r = this.pushStack("", "find", n), t = 0, e = this.length; t < e; t++) if (o = r.length, i.find(n, this[t], r), t > 0) for (u = o; u < r.length; u++) for (f = 0; f < o; f++) if (r[f] === r[u]) {
                r.splice(u--, 1);
                break
            }
            return r
        },
        has: function (n) {
            var t = i(n);
            return this.filter(function () {
                for (var n = 0, r = t.length; n < r; n++) if (i.contains(this, t[n])) return !0
            })
        },
        not: function (n) {
            return this.pushStack(nr(this, n, !1), "not", n)
        },
        filter: function (n) {
            return this.pushStack(nr(this, n, !0), "filter", n)
        },
        is: function (n) {
            return !!n && (typeof n == "string" ? ni.test(n) ? i(n, this.context).index(this[0]) >= 0 : i.filter(n, this).length > 0 : this.filter(n).length > 0)
        },
        closest: function (n, t) {
            var f = [],
                u, s, r = this[0],
                e, o;
            if (i.isArray(n)) {
                for (e = 1; r && r.ownerDocument && r !== t;) {
                    for (u = 0; u < n.length; u++) i(r).is(n[u]) && f.push({
                        selector: n[u],
                        elem: r,
                        level: e
                    });
                    r = r.parentNode, e++
                }
                return f
            }
            for (o = ni.test(n) || typeof n != "string" ? i(n, t || this.context) : 0, u = 0, s = this.length; u < s; u++) for (r = this[u]; r;) {
                if (o ? o.index(r) > -1 : i.find.matchesSelector(r, n)) {
                    f.push(r);
                    break
                }
                if (r = r.parentNode, !r || !r.ownerDocument || r === t || r.nodeType === 11) break
            }
            return f = f.length > 1 ? i.unique(f) : f, this.pushStack(f, "closest", n)
        },
        index: function (n) {
            return n ? typeof n == "string" ? i.inArray(this[0], i(n)) : i.inArray(n.jquery ? n[0] : n, this) : this[0] && this[0].parentNode ? this.prevAll().length : -1
        },
        add: function (n, t) {
            var u = typeof n == "string" ? i(n, t) : i.makeArray(n && n.nodeType ? [n] : n),
                r = i.merge(this.get(), u);
            return this.pushStack(gi(u[0]) || gi(r[0]) ? r : i.unique(r))
        },
        andSelf: function () {
            return this.add(this.prevObject)
        }
    }), i.each({
        parent: function (n) {
            var t = n.parentNode;
            return t && t.nodeType !== 11 ? t : null
        },
        parents: function (n) {
            return i.dir(n, "parentNode")
        },
        parentsUntil: function (n, t, r) {
            return i.dir(n, "parentNode", r)
        },
        next: function (n) {
            return i.nth(n, 2, "nextSibling")
        },
        prev: function (n) {
            return i.nth(n, 2, "previousSibling")
        },
        nextAll: function (n) {
            return i.dir(n, "nextSibling")
        },
        prevAll: function (n) {
            return i.dir(n, "previousSibling")
        },
        nextUntil: function (n, t, r) {
            return i.dir(n, "nextSibling", r)
        },
        prevUntil: function (n, t, r) {
            return i.dir(n, "previousSibling", r)
        },
        siblings: function (n) {
            return i.sibling(n.parentNode.firstChild, n)
        },
        children: function (n) {
            return i.sibling(n.firstChild)
        },
        contents: function (n) {
            return i.nodeName(n, "iframe") ? n.contentDocument || n.contentWindow.document : i.makeArray(n.childNodes)
        }
    }, function (n, t) {
        i.fn[n] = function (r, u) {
            var f = i.map(this, t, r),
                e = gf.call(arguments);
            return te.test(n) || (u = r), u && typeof u == "string" && (f = i.filter(u, f)), f = this.length > 1 && !re[n] ? i.unique(f) : f, (this.length > 1 || ne.test(u)) && ie.test(n) && (f = f.reverse()), this.pushStack(f, n, e.join(","))
        }
    }), i.extend({
        filter: function (n, t, r) {
            return r && (n = ":not(" + n + ")"), t.length === 1 ? i.find.matchesSelector(t[0], n) ? [t[0]] : [] : i.find.matches(n, t)
        },
        dir: function (n, r, u) {
            for (var e = [], f = n[r]; f && f.nodeType !== 9 && (u === t || f.nodeType !== 1 || !i(f).is(u));) f.nodeType === 1 && e.push(f), f = f[r];
            return e
        },
        nth: function (n, t, i) {
            t = t || 1;
            for (var u = 0; n; n = n[i]) if (n.nodeType === 1 && ++u === t) break;
            return n
        },
        sibling: function (n, t) {
            for (var i = []; n; n = n.nextSibling) n.nodeType === 1 && n !== t && i.push(n);
            return i
        }
    });
    var gt = "abbr article aside audio canvas datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",
        ue = / jQuery\d+="(?:\d+|null)"/g,
        rt = /^\s+/,
        ii = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,
        ri = /<([\w:]+)/,
        kf = /<tbody/i,
        cf = /<|&#?\w+;/,
        lf = /<(?:script|style)/i,
        hf = /<(?:script|object|embed|option|style)/i,
        of = new RegExp("<(?:" + gt.replace(" ", "|") + ")", "i"),
        ui = /checked\s*(?:[^=]|=\s*.checked.)/i,
        sf = /\/(java|ecma)script/i,
        af = /^\s*<!(?:\[CDATA\[|\-\-)/,
        u = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            area: [1, "<map>", "</map>"],
            _default: [0, "", ""]
        }, wf = wi(r);
    u.optgroup = u.option, u.tbody = u.tfoot = u.colgroup = u.caption = u.thead, u.th = u.td, i.support.htmlSerialize || (u._default = [1, "div<div>", "</div>"]), i.fn.extend({
        text: function (n) {
            return i.isFunction(n) ? this.each(function (t) {
                var r = i(this);
                r.text(n.call(this, t, r.text()))
            }) : typeof n != "object" && n !== t ? this.empty().append((this[0] && this[0].ownerDocument || r).createTextNode(n)) : i.text(this)
        },
        wrapAll: function (n) {
            if (i.isFunction(n)) return this.each(function (t) {
                i(this).wrapAll(n.call(this, t))
            });
            if (this[0]) {
                var t = i(n, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && t.insertBefore(this[0]), t.map(function () {
                    for (var n = this; n.firstChild && n.firstChild.nodeType === 1;) n = n.firstChild;
                    return n
                }).append(this)
            }
            return this
        },
        wrapInner: function (n) {
            return i.isFunction(n) ? this.each(function (t) {
                i(this).wrapInner(n.call(this, t))
            }) : this.each(function () {
                var r = i(this),
                    t = r.contents();
                t.length ? t.wrapAll(n) : r.append(n)
            })
        },
        wrap: function (n) {
            return this.each(function () {
                i(this).wrapAll(n)
            })
        },
        unwrap: function () {
            return this.parent().each(function () {
                i.nodeName(this, "body") || i(this).replaceWith(this.childNodes)
            }).end()
        },
        append: function () {
            return this.domManip(arguments, !0, function (n) {
                this.nodeType === 1 && this.appendChild(n)
            })
        },
        prepend: function () {
            return this.domManip(arguments, !0, function (n) {
                this.nodeType === 1 && this.insertBefore(n, this.firstChild)
            })
        },
        before: function () {
            if (this[0] && this[0].parentNode) return this.domManip(arguments, !1, function (n) {
                this.parentNode.insertBefore(n, this)
            });
            if (arguments.length) {
                var n = i(arguments[0]);
                return n.push.apply(n, this.toArray()), this.pushStack(n, "before", arguments)
            }
        },
        after: function () {
            if (this[0] && this[0].parentNode) return this.domManip(arguments, !1, function (n) {
                this.parentNode.insertBefore(n, this.nextSibling)
            });
            if (arguments.length) {
                var n = this.pushStack(this, "after", arguments);
                return n.push.apply(n, i(arguments[0]).toArray()), n
            }
        },
        remove: function (n, t) {
            for (var u = 0, r;
            (r = this[u]) != null; u++)(!n || i.filter(n, [r]).length) && (!t && r.nodeType === 1 && (i.cleanData(r.getElementsByTagName("*")), i.cleanData([r])), r.parentNode && r.parentNode.removeChild(r));
            return this
        },
        empty: function () {
            for (var t = 0, n;
            (n = this[t]) != null; t++) for (n.nodeType === 1 && i.cleanData(n.getElementsByTagName("*")); n.firstChild;) n.removeChild(n.firstChild);
            return this
        },
        clone: function (n, t) {
            return n = n == null ? !1 : n, t = t == null ? n : t, this.map(function () {
                return i.clone(this, n, t)
            })
        },
        html: function (n) {
            if (n === t) return this[0] && this[0].nodeType === 1 ? this[0].innerHTML.replace(ue, "") : null;
            if (typeof n != "string" || lf.test(n) || !i.support.leadingWhitespace && rt.test(n) || u[(ri.exec(n) || ["", ""])[1].toLowerCase()]) i.isFunction(n) ? this.each(function (t) {
                var r = i(this);
                r.html(n.call(this, t, r.html()))
            }) : this.empty().append(n);
            else {
                n = n.replace(ii, "<$1></$2>");
                try {
                    for (var r = 0, f = this.length; r < f; r++) this[r].nodeType === 1 && (i.cleanData(this[r].getElementsByTagName("*")), this[r].innerHTML = n)
                } catch (e) {
                    this.empty().append(n)
                }
            }
            return this
        },
        replaceWith: function (n) {
            return this[0] && this[0].parentNode ? i.isFunction(n) ? this.each(function (t) {
                var r = i(this),
                    u = r.html();
                r.replaceWith(n.call(this, t, u))
            }) : (typeof n != "string" && (n = i(n).detach()), this.each(function () {
                var t = this.nextSibling,
                    r = this.parentNode;
                i(this).remove(), t ? i(t).before(n) : i(r).append(n)
            })) : this.length ? this.pushStack(i(i.isFunction(n) ? n() : n), "replaceWith", n) : this
        },
        detach: function (n) {
            return this.remove(n, !0)
        },
        domManip: function (n, r, u) {
            var c, o, f, h, e = n[0],
                a = [];
            if (!i.support.checkClone && arguments.length === 3 && typeof e == "string" && ui.test(e)) return this.each(function () {
                i(this).domManip(n, r, u, !0)
            });
            if (i.isFunction(e)) return this.each(function (f) {
                var o = i(this);
                n[0] = e.call(this, f, r ? o.html() : t), o.domManip(n, r, u)
            });
            if (this[0]) {
                if (h = e && e.parentNode, c = i.support.parentNode && h && h.nodeType === 11 && h.childNodes.length === this.length ? {
                    fragment: h
                } : i.buildFragment(n, this, a), f = c.fragment, o = f.childNodes.length === 1 ? f = f.firstChild : f.firstChild, o) {
                    r = r && i.nodeName(o, "tr");
                    for (var s = 0, l = this.length, v = l - 1; s < l; s++) u.call(r ? ff(this[s], o) : this[s], c.cacheable || l > 1 && s < v ? i.clone(f, !0, !0) : f)
                }
                a.length && i.each(a, tf)
            }
            return this
        }
    }), i.buildFragment = function (n, t, u) {
        var o, h, s, e, f = n[0];
        return t && t[0] && (e = t[0].ownerDocument || t[0]), e.createDocumentFragment || (e = r), n.length === 1 && typeof f == "string" && f.length < 512 && e === r && f.charAt(0) === "<" && !hf.test(f) && (i.support.checkClone || !ui.test(f)) && !i.support.unknownElems && of.test(f) && (h = !0, s = i.fragments[f], s && s !== 1 && (o = s)), o || (o = e.createDocumentFragment(), i.clean(n, e, o, u)), h && (i.fragments[f] = s ? o : 1), {
            fragment: o,
            cacheable: h
        }
    }, i.fragments = {}, i.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function (n, t) {
        i.fn[n] = function (r) {
            var o = [],
                u = i(r),
                s = this.length === 1 && this[0].parentNode,
                f, h, e;
            if (s && s.nodeType === 11 && s.childNodes.length === 1 && u.length === 1) return u[t](this[0]), this;
            for (f = 0, h = u.length; f < h; f++) e = (f > 0 ? this.clone(!0) : this).get(), i(u[f])[t](e), o = o.concat(e);
            return this.pushStack(o, n, u.selector)
        }
    }), i.extend({
        clone: function (n, t, r) {
            var o = n.cloneNode(!0),
                f, e, u;
            if ((!i.support.noCloneEvent || !i.support.noCloneChecked) && (n.nodeType === 1 || n.nodeType === 11) && !i.isXMLDoc(n)) for (ki(n, o), f = d(n), e = d(o), u = 0; f[u]; ++u) e[u] && ki(f[u], e[u]);
            if (t && (bi(n, o), r)) for (f = d(n), e = d(o), u = 0; f[u]; ++u) bi(f[u], e[u]);
            return f = e = null, o
        },
        clean: function (n, t, f, e) {
            var p, s, l, h, o, y, a, w, k;
            for (t = t || r, typeof t.createElement == "undefined" && (t = t.ownerDocument || t[0] && t[0].ownerDocument || r), s = [], h = 0;
            (o = n[h]) != null; h++) if (typeof o == "number" && (o += ""), o) {
                if (typeof o == "string") if (cf.test(o)) {
                    o = o.replace(ii, "<$1></$2>");
                    var b = (ri.exec(o) || ["", ""])[1].toLowerCase(),
                        v = u[b] || u._default,
                        d = v[0],
                        c = t.createElement("div");
                    for (t === r ? wf.appendChild(c) : wi(t).appendChild(c), c.innerHTML = v[1] + o + v[2]; d--;) c = c.lastChild;
                    if (!i.support.tbody) for (y = kf.test(o), a = b === "table" && !y ? c.firstChild && c.firstChild.childNodes : v[1] === "<table>" && !y ? c.childNodes : [], l = a.length - 1; l >= 0; --l) i.nodeName(a[l], "tbody") && !a[l].childNodes.length && a[l].parentNode.removeChild(a[l]);
                    !i.support.leadingWhitespace && rt.test(o) && c.insertBefore(t.createTextNode(rt.exec(o)[0]), c.firstChild), o = c.childNodes
                } else o = t.createTextNode(o);
                if (!i.support.appendChecked) if (o[0] && typeof (w = o.length) == "number") for (l = 0; l < w; l++) ai(o[l]);
                else ai(o);
                o.nodeType ? s.push(o) : s = i.merge(s, o)
            }
            if (f) for (p = function (n) {
                return !n.type || sf.test(n.type)
            }, h = 0; s[h]; h++) e && i.nodeName(s[h], "script") && (!s[h].type || s[h].type.toLowerCase() === "text/javascript") ? e.push(s[h].parentNode ? s[h].parentNode.removeChild(s[h]) : s[h]) : (s[h].nodeType === 1 && (k = i.grep(s[h].getElementsByTagName("script"), p), s.splice.apply(s, [h + 1, 0].concat(k))), f.appendChild(s[h]));
            return s
        },
        cleanData: function (n) {
            for (var r, f, o = i.cache, s = i.event.special, h = i.support.deleteExpando, t, u, e = 0;
            (t = n[e]) != null; e++) if ((!t.nodeName || !i.noData[t.nodeName.toLowerCase()]) && (f = t[i.expando], f)) {
                if (r = o[f], r && r.events) {
                    for (u in r.events) s[u] ? i.event.remove(t, u) : i.removeEvent(t, u, r.handle);
                    r.handle && (r.handle.elem = null)
                }
                h ? delete t[i.expando] : t.removeAttribute && t.removeAttribute(i.expando), delete o[f]
            }
        }
    });
    var ht = /alpha\([^)]*\)/i,
        bf = /opacity=([^)]*)/,
        pf = /([A-Z]|^ms)/g,
        kt = /^-?\d+(?:px)?$/i,
        vf = /^-?\d/,
        yf = /^([\-+])=([\-+.\de]+)/,
        yr = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        }, pr = ["Left", "Right"],
        wr = ["Top", "Bottom"],
        l, yt, vt;
    i.fn.css = function (n, r) {
        return arguments.length === 2 && r === t ? this : i.access(this, n, r, !0, function (n, r, u) {
            return u !== t ? i.style(n, r, u) : i.css(n, r)
        })
    }, i.extend({
        cssHooks: {
            opacity: {
                get: function (n, t) {
                    if (t) {
                        var i = l(n, "opacity", "opacity");
                        return i === "" ? "1" : i
                    }
                    return n.style.opacity
                }
            }
        },
        cssNumber: {
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            float: i.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function (n, r, u, f) {
            if ( !! n && n.nodeType !== 3 && n.nodeType !== 8 && !! n.style) {
                var s, o, h = i.camelCase(r),
                    c = n.style,
                    e = i.cssHooks[h];
                if (r = i.cssProps[h] || h, u === t) return e && "get" in e && (s = e.get(n, !1, f)) !== t ? s : c[r];
                if (o = typeof u, o === "string" && (s = yf.exec(u)) && (u = +(s[1] + 1) * +s[2] + parseFloat(i.css(n, r)), o = "number"), u == null || o === "number" && isNaN(u)) return;
                if (o === "number" && !i.cssNumber[h] && (u += "px"), !e || !("set" in e) || (u = e.set(n, u)) !== t) try {
                    c[r] = u
                } catch (l) {}
            }
        },
        css: function (n, r, u) {
            var e, f;
            return (r = i.camelCase(r), f = i.cssHooks[r], r = i.cssProps[r] || r, r === "cssFloat" && (r = "float"), f && "get" in f && (e = f.get(n, !0, u)) !== t) ? e : l ? l(n, r) : void 0
        },
        swap: function (n, t, i) {
            var u = {}, r;
            for (r in t) u[r] = n.style[r], n.style[r] = t[r];
            i.call(n);
            for (r in t) n.style[r] = u[r]
        }
    }), i.curCSS = i.css, i.each(["height", "width"], function (n, t) {
        i.cssHooks[t] = {
            get: function (n, r, u) {
                var f;
                if (r) return n.offsetWidth !== 0 ? pi(n, t, u) : (i.swap(n, yr, function () {
                    f = pi(n, t, u)
                }), f)
            },
            set: function (n, t) {
                return kt.test(t) ? (t = parseFloat(t), t >= 0 ? t + "px" : void 0) : t
            }
        }
    }), i.support.opacity || (i.cssHooks.opacity = {
        get: function (n, t) {
            return bf.test((t && n.currentStyle ? n.currentStyle.filter : n.style.filter) || "") ? parseFloat(RegExp.$1) / 100 + "" : t ? "1" : ""
        },
        set: function (n, t) {
            var f = n.style,
                u = n.currentStyle,
                e = i.isNumeric(t) ? "alpha(opacity=" + t * 100 + ")" : "",
                r = u && u.filter || f.filter || "";
            (f.zoom = 1, t >= 1 && i.trim(r.replace(ht, "")) === "" && (f.removeAttribute("filter"), u && !u.filter)) || (f.filter = ht.test(r) ? r.replace(ht, e) : r + " " + e)
        }
    }), i(function () {
        i.support.reliableMarginRight || (i.cssHooks.marginRight = {
            get: function (n, t) {
                var r;
                return i.swap(n, {
                    display: "inline-block"
                }, function () {
                    r = t ? l(n, "margin-right", "marginRight") : n.style.marginRight
                }), r
            }
        })
    }), r.defaultView && r.defaultView.getComputedStyle && (yt = function (n, r) {
        var u, e, f;
        return (r = r.replace(pf, "-$1").toLowerCase(), !(e = n.ownerDocument.defaultView)) ? t : ((f = e.getComputedStyle(n, null)) && (u = f.getPropertyValue(r), u === "" && !i.contains(n.ownerDocument.documentElement, n) && (u = i.style(n, r))), u)
    }), r.documentElement.currentStyle && (vt = function (n, t) {
        var e, u, f, i = n.currentStyle && n.currentStyle[t],
            r = n.style;
        return i === null && r && (f = r[t]) && (i = f), !kt.test(i) && vf.test(i) && (e = r.left, u = n.runtimeStyle && n.runtimeStyle.left, u && (n.runtimeStyle.left = n.currentStyle.left), r.left = t === "fontSize" ? "1em" : i || 0, i = r.pixelLeft + "px", r.left = e, u && (n.runtimeStyle.left = u)), i === "" ? "auto" : i
    }), l = yt || vt, i.expr && i.expr.filters && (i.expr.filters.hidden = function (n) {
        var r = n.offsetWidth,
            t = n.offsetHeight;
        return r === 0 && t === 0 || !i.support.reliableHiddenOffsets && (n.style && n.style.display || i.css(n, "display")) === "none"
    }, i.expr.filters.visible = function (n) {
        return !i.expr.filters.hidden(n)
    });
    var vr = /%20/g,
        uu = /\[\]$/,
        ti = /\r?\n/g,
        ru = /#.*$/,
        fu = /^(.*?):[ \t]*([^\r\n]*)\r?$/mg,
        ou = /^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,
        iu = /^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,
        dr = /^(?:GET|HEAD)$/,
        gr = /^\/\//,
        si = /\?/,
        tu = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
        nu = /^(?:select|textarea)/i,
        hi = /\s+/,
        kr = /([?&])_=[^&]*/,
        fi = /^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+))?)?/,
        ei = i.fn.load,
        et = {}, lt = {}, o, s, pt = ["*/"] + ["*"];
    try {
        o = uf.href
    } catch (ee) {
        o = r.createElement("a"), o.href = "", o = o.href
    }
    s = fi.exec(o.toLowerCase()) || [], i.fn.extend({
        load: function (n, r, u) {
            var f, s, o, e;
            return typeof n != "string" && ei ? ei.apply(this, arguments) : this.length ? (f = n.indexOf(" "), f >= 0 && (s = n.slice(f, n.length), n = n.slice(0, f)), o = "GET", r && (i.isFunction(r) ? (u = r, r = t) : typeof r == "object" && (r = i.param(r, i.ajaxSettings.traditional), o = "POST")), e = this, i.ajax({
                url: n,
                type: o,
                dataType: "html",
                data: r,
                complete: function (n, t, r) {
                    r = n.responseText, n.isResolved() && (n.done(function (n) {
                        r = n
                    }), e.html(s ? i("<div>").append(r.replace(tu, "")).find(s) : r)), u && e.each(u, [r, t, n])
                }
            }), this) : this
        },
        serialize: function () {
            return i.param(this.serializeArray())
        },
        serializeArray: function () {
            return this.map(function () {
                return this.elements ? i.makeArray(this.elements) : this
            }).filter(function () {
                return this.name && !this.disabled && (this.checked || nu.test(this.nodeName) || ou.test(this.type))
            }).map(function (n, t) {
                var r = i(this).val();
                return r == null ? null : i.isArray(r) ? i.map(r, function (n) {
                    return {
                        name: t.name,
                        value: n.replace(ti, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: r.replace(ti, "\r\n")
                }
            }).get()
        }
    }), i.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "), function (n, t) {
        i.fn[t] = function (n) {
            return this.bind(t, n)
        }
    }), i.each(["get", "post"], function (n, r) {
        i[r] = function (n, u, f, e) {
            return i.isFunction(u) && (e = e || f, f = u, u = t), i.ajax({
                type: r,
                url: n,
                data: u,
                success: f,
                dataType: e
            })
        }
    }), i.extend({
        getScript: function (n, r) {
            return i.get(n, t, r, "script")
        },
        getJSON: function (n, t, r) {
            return i.get(n, t, r, "json")
        },
        ajaxSetup: function (n, t) {
            return t ? tr(n, i.ajaxSettings) : (t = n, n = i.ajaxSettings), tr(n, t), n
        },
        ajaxSettings: {
            url: o,
            isLocal: iu.test(s[1]),
            global: !0,
            type: "GET",
            contentType: "application/x-www-form-urlencoded",
            processData: !0,
            async: !0,
            accepts: {
                xml: "application/xml, text/xml",
                html: "text/html",
                text: "text/plain",
                json: "application/json, text/javascript",
                "*": pt
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText"
            },
            converters: {
                "* text": n.String,
                "text html": !0,
                "text json": i.parseJSON,
                "text xml": i.parseXML
            },
            flatOptions: {
                context: !0,
                url: !0
            }
        },
        ajaxPrefilter: yi(et),
        ajaxTransport: yi(lt),
        ajax: function (n, r) {
            function w(n, r, s, l) {
                if (e !== 2) {
                    e = 2, k && clearTimeout(k), c = t, nt = l || "", f.readyState = n > 0 ? 4 : 0;
                    var y, g, w, a = r,
                        ut = s ? du(u, f, s) : t,
                        it, tt;
                    if (n >= 200 && n < 300 || n === 304) if (u.ifModified && ((it = f.getResponseHeader("Last-Modified")) && (i.lastModified[o] = it), (tt = f.getResponseHeader("Etag")) && (i.etag[o] = tt)), n === 304) a = "notmodified", y = !0;
                    else try {
                        g = ku(u, ut), a = "success", y = !0
                    } catch (ft) {
                        a = "parsererror", w = ft
                    } else w = a, (!a || n) && (a = "error", n < 0 && (n = 0));
                    f.status = n, f.statusText = "" + (r || a), y ? b.resolveWith(h, [g, a, f]) : b.rejectWith(h, [f, a, w]), f.statusCode(p), p = t, v && d.trigger("ajax" + (y ? "Success" : "Error"), [f, u, y ? g : w]), rt.fireWith(h, [f, a]), v && (d.trigger("ajaxComplete", [f, u]), --i.active || i.event.trigger("ajaxStop"))
                }
            }
            var it, g;
            typeof n == "object" && (r = n, n = t), r = r || {};
            var u = i.ajaxSetup({}, r),
                h = u.context || u,
                d = h !== u && (h.nodeType || h instanceof i) ? i(h) : i.event,
                b = i.Deferred(),
                rt = i.Callbacks("once memory"),
                p = u.statusCode || {}, o, ut = {}, ft = {}, nt, y, c, k, l, e = 0,
                v, a, f = {
                    readyState: 0,
                    setRequestHeader: function (n, t) {
                        if (!e) {
                            var i = n.toLowerCase();
                            n = ft[i] = ft[i] || n, ut[n] = t
                        }
                        return this
                    },
                    getAllResponseHeaders: function () {
                        return e === 2 ? nt : null
                    },
                    getResponseHeader: function (n) {
                        var i;
                        if (e === 2) {
                            if (!y) for (y = {}; i = fu.exec(nt);) y[i[1].toLowerCase()] = i[2];
                            i = y[n.toLowerCase()]
                        }
                        return i === t ? null : i
                    },
                    overrideMimeType: function (n) {
                        return e || (u.mimeType = n), this
                    },
                    abort: function (n) {
                        return n = n || "abort", c && c.abort(n), w(0, n), this
                    }
                };
            if (b.promise(f), f.success = f.done, f.error = f.fail, f.complete = rt.add, f.statusCode = function (n) {
                if (n) {
                    var t;
                    if (e < 2) for (t in n) p[t] = [p[t], n[t]];
                    else t = n[f.status], f.then(t, t)
                }
                return this
            }, u.url = ((n || u.url) + "").replace(ru, "").replace(gr, s[1] + "//"), u.dataTypes = i.trim(u.dataType || "*").toLowerCase().split(hi), u.crossDomain == null && (l = fi.exec(u.url.toLowerCase()), u.crossDomain = !(!l || l[1] == s[1] && l[2] == s[2] && (l[3] || (l[1] === "http:" ? 80 : 443)) == (s[3] || (s[1] === "http:" ? 80 : 443)))), u.data && u.processData && typeof u.data != "string" && (u.data = i.param(u.data, u.traditional)), tt(et, u, r, f), e === 2) return !1;
            v = u.global, u.type = u.type.toUpperCase(), u.hasContent = !dr.test(u.type), v && i.active++ == 0 && i.event.trigger("ajaxStart"), u.hasContent || (u.data && (u.url += (si.test(u.url) ? "&" : "?") + u.data, delete u.data), o = u.url, u.cache === !1 && (it = i.now(), g = u.url.replace(kr, "$1_=" + it), u.url = g + (g === u.url ? (si.test(u.url) ? "&" : "?") + "_=" + it : ""))), (u.data && u.hasContent && u.contentType !== !1 || r.contentType) && f.setRequestHeader("Content-Type", u.contentType), u.ifModified && (o = o || u.url, i.lastModified[o] && f.setRequestHeader("If-Modified-Since", i.lastModified[o]), i.etag[o] && f.setRequestHeader("If-None-Match", i.etag[o])), f.setRequestHeader("Accept", u.dataTypes[0] && u.accepts[u.dataTypes[0]] ? u.accepts[u.dataTypes[0]] + (u.dataTypes[0] !== "*" ? ", " + pt + "; q=0.01" : "") : u.accepts["*"]);
            for (a in u.headers) f.setRequestHeader(a, u.headers[a]);
            if (u.beforeSend && (u.beforeSend.call(h, f, u) === !1 || e === 2)) return f.abort(), !1;
            for (a in {
                success: 1,
                error: 1,
                complete: 1
            }) f[a](u[a]);
            if (c = tt(lt, u, r, f), c) {
                f.readyState = 1, v && d.trigger("ajaxSend", [f, u]), u.async && u.timeout > 0 && (k = setTimeout(function () {
                    f.abort("timeout")
                }, u.timeout));
                try {
                    e = 1, c.send(ut, w)
                } catch (ot) {
                    e < 2 ? w(-1, ot) : i.error(ot)
                }
            } else w(-1, "No Transport");
            return f
        },
        param: function (n, r) {
            var f = [],
                e = function (n, t) {
                    t = i.isFunction(t) ? t() : t, f[f.length] = encodeURIComponent(n) + "=" + encodeURIComponent(t)
                }, u;
            if (r === t && (r = i.ajaxSettings.traditional), i.isArray(n) || n.jquery && !i.isPlainObject(n)) i.each(n, function () {
                e(this.name, this.value)
            });
            else for (u in n) ut(u, n[u], r, e);
            return f.join("&").replace(vr, "+")
        }
    }), i.extend({
        active: 0,
        lastModified: {},
        etag: {}
    }), wt = i.now(), y = /(\=)\?(&|$)|\?\?/i, i.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function () {
            return i.expando + "_" + wt++
        }
    }), i.ajaxPrefilter("json jsonp", function (t, r, u) {
        var l = t.contentType === "application/x-www-form-urlencoded" && typeof t.data == "string";
        if (t.dataTypes[0] === "jsonp" || t.jsonp !== !1 && (y.test(t.url) || l && y.test(t.data))) {
            var o, f = t.jsonpCallback = i.isFunction(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback,
                c = n[f],
                e = t.url,
                s = t.data,
                h = "$1" + f + "$2";
            return t.jsonp !== !1 && (e = e.replace(y, h), t.url === e && (l && (s = s.replace(y, h)), t.data === s && (e += (/\?/.test(e) ? "&" : "?") + t.jsonp + "=" + f))), t.url = e, t.data = s, n[f] = function (n) {
                o = [n]
            }, u.always(function () {
                n[f] = c, o && i.isFunction(c) && n[f](o[0])
            }), t.converters["script json"] = function () {
                return o || i.error(f + " was not called"), o[0]
            }, t.dataTypes[0] = "json", "script"
        }
    }), i.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /javascript|ecmascript/
        },
        converters: {
            "text script": function (n) {
                return i.globalEval(n), n
            }
        }
    }), i.ajaxPrefilter("script", function (n) {
        n.cache === t && (n.cache = !1), n.crossDomain && (n.type = "GET", n.global = !1)
    }), i.ajaxTransport("script", function (n) {
        if (n.crossDomain) {
            var i, u = r.head || r.getElementsByTagName("head")[0] || r.documentElement;
            return {
                send: function (f, e) {
                    i = r.createElement("script"), i.async = "async", n.scriptCharset && (i.charset = n.scriptCharset), i.src = n.url, i.onload = i.onreadystatechange = function (n, r) {
                        (r || !i.readyState || /loaded|complete/.test(i.readyState)) && (i.onload = i.onreadystatechange = null, u && i.parentNode && u.removeChild(i), i = t, r || e(200, "success"))
                    }, u.insertBefore(i, u.firstChild)
                },
                abort: function () {
                    i && i.onload(0, 1)
                }
            }
        }
    }), w = n.ActiveXObject ? function () {
        for (var n in c) c[n](0, 1)
    } : !1, ar = 0, i.ajaxSettings.xhr = n.ActiveXObject ? function () {
        return !this.isLocal && er() || nf()
    } : er,
    function (n) {
        i.extend(i.support, {
            ajax: !! n,
            cors: !! n && "withCredentials" in n
        })
    }(i.ajaxSettings.xhr()), i.support.ajax && i.ajaxTransport(function (r) {
        if (!r.crossDomain || i.support.cors) {
            var u;
            return {
                send: function (f, e) {
                    var o = r.xhr(),
                        h, s;
                    if (r.username ? o.open(r.type, r.url, r.async, r.username, r.password) : o.open(r.type, r.url, r.async), r.xhrFields) for (s in r.xhrFields) o[s] = r.xhrFields[s];
                    r.mimeType && o.overrideMimeType && o.overrideMimeType(r.mimeType), !r.crossDomain && !f["X-Requested-With"] && (f["X-Requested-With"] = "XMLHttpRequest");
                    try {
                        for (s in f) o.setRequestHeader(s, f[s])
                    } catch (l) {}
                    o.send(r.hasContent && r.data || null), u = function (n, f) {
                        var l, v, y, s, a;
                        try {
                            if (u && (f || o.readyState === 4)) if (u = t, h && (o.onreadystatechange = i.noop, w && delete c[h]), f) o.readyState !== 4 && o.abort();
                            else {
                                l = o.status, y = o.getAllResponseHeaders(), s = {}, a = o.responseXML, a && a.documentElement && (s.xml = a), s.text = o.responseText;
                                try {
                                    v = o.statusText
                                } catch (b) {
                                    v = ""
                                }!l && r.isLocal && !r.crossDomain ? l = s.text ? 200 : 404 : l === 1223 && (l = 204)
                            }
                        } catch (p) {
                            f || e(-1, p)
                        }
                        s && e(l, v, s, y)
                    }, !r.async || o.readyState === 4 ? u() : (h = ++ar, w && (c || (c = {}, i(n).unload(w)), c[h] = u), o.onreadystatechange = u)
                },
                abort: function () {
                    u && u(0, 1)
                }
            }
        }
    });
    var ot = {}, f, a, eu = /^(?:toggle|show|hide)$/,
        br = /^([+\-]=)?([\d+.\-]+)([a-z%]*)$/i,
        nt, or = [
            ["height", "marginTop", "marginBottom", "paddingTop", "paddingBottom"],
            ["width", "marginLeft", "marginRight", "paddingLeft", "paddingRight"],
            ["opacity"]
        ],
        g;
    i.fn.extend({
        show: function (n, t, r) {
            var u, e, f, o;
            if (n || n === 0) return this.animate(v("show", 3), n, t, r);
            for (f = 0, o = this.length; f < o; f++) u = this[f], u.style && (e = u.style.display, !i._data(u, "olddisplay") && e === "none" && (e = u.style.display = ""), e === "" && i.css(u, "display") === "none" && i._data(u, "olddisplay", at(u.nodeName)));
            for (f = 0; f < o; f++) u = this[f], u.style && (e = u.style.display, (e === "" || e === "none") && (u.style.display = i._data(u, "olddisplay") || ""));
            return this
        },
        hide: function (n, t, r) {
            if (n || n === 0) return this.animate(v("hide", 3), n, t, r);
            for (var f, e, u = 0, o = this.length; u < o; u++) f = this[u], f.style && (e = i.css(f, "display"), e !== "none" && !i._data(f, "olddisplay") && i._data(f, "olddisplay", e));
            for (u = 0; u < o; u++) this[u].style && (this[u].style.display = "none");
            return this
        },
        _toggle: i.fn.toggle,
        toggle: function (n, t, r) {
            var u = typeof n == "boolean";
            return i.isFunction(n) && i.isFunction(t) ? this._toggle.apply(this, arguments) : n == null || u ? this.each(function () {
                var t = u ? n : i(this).is(":hidden");
                i(this)[t ? "show" : "hide"]()
            }) : this.animate(v("toggle", 3), n, t, r), this
        },
        fadeTo: function (n, t, i, r) {
            return this.filter(":hidden").css("opacity", 0).show().end().animate({
                opacity: t
            }, n, i, r)
        },
        animate: function (n, t, r, u) {
            function e() {
                f.queue === !1 && i._mark(this);
                var u = i.extend({}, f),
                    y = this.nodeType === 1,
                    v = y && i(this).is(":hidden"),
                    e, t, r, s, c, o, h, l, a;
                u.animatedProperties = {};
                for (r in n) {
                    if (e = i.camelCase(r), r !== e && (n[e] = n[r], delete n[r]), t = n[e], i.isArray(t) ? (u.animatedProperties[e] = t[1], t = n[e] = t[0]) : u.animatedProperties[e] = u.specialEasing && u.specialEasing[e] || u.easing || "swing", t === "hide" && v || t === "show" && !v) return u.complete.call(this);
                    y && (e === "height" || e === "width") && (u.overflow = [this.style.overflow, this.style.overflowX, this.style.overflowY], i.css(this, "display") === "inline" && i.css(this, "float") === "none" && (!i.support.inlineBlockNeedsLayout || at(this.nodeName) === "inline" ? this.style.display = "inline-block" : this.style.zoom = 1))
                }
                u.overflow != null && (this.style.overflow = "hidden");
                for (r in n) s = new i.fx(this, u, r), t = n[r], eu.test(t) ? (a = i._data(this, "toggle" + r) || (t === "toggle" ? v ? "show" : "hide" : 0), a ? (i._data(this, "toggle" + r, a === "show" ? "hide" : "show"), s[a]()) : s[t]()) : (c = br.exec(t), o = s.cur(), c ? (h = parseFloat(c[2]), l = c[3] || (i.cssNumber[r] ? "" : "px"), l !== "px" && (i.style(this, r, (h || 1) + l), o = (h || 1) / s.cur() * o, i.style(this, r, o + l)), c[1] && (h = (c[1] === "-=" ? -1 : 1) * h + o), s.custom(o, h, l)) : s.custom(o, t, ""));
                return !0
            }
            var f = i.speed(t, r, u);
            return i.isEmptyObject(n) ? this.each(f.complete, [!1]) : (n = i.extend({}, n), f.queue === !1 ? this.each(e) : this.queue(f.queue, e))
        },
        stop: function (n, r, u) {
            return typeof n != "string" && (u = r, r = n, n = t), r && n !== !1 && this.queue(n || "fx", []), this.each(function () {
                function e(n, t, r) {
                    var f = t[r];
                    i.removeData(n, r, !0), f.stop(u)
                }
                var t, o = !1,
                    r = i.timers,
                    f = i._data(this);
                if (u || i._unmark(!0, this), n == null) for (t in f) f[t].stop && t.indexOf(".run") === t.length - 4 && e(this, f, t);
                else f[t = n + ".run"] && f[t].stop && e(this, f, t);
                for (t = r.length; t--;) r[t].elem === this && (n == null || r[t].queue === n) && (u ? r[t](!0) : r[t].saveState(), o = !0, r.splice(t, 1));
                (!u || !o) && i.dequeue(this, n)
            })
        }
    }), i.each({
        slideDown: v("show", 1),
        slideUp: v("hide", 1),
        slideToggle: v("toggle", 1),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function (n, t) {
        i.fn[n] = function (n, i, r) {
            return this.animate(t, n, i, r)
        }
    }), i.extend({
        speed: function (n, t, r) {
            var u = n && typeof n == "object" ? i.extend({}, n) : {
                complete: r || !r && t || i.isFunction(n) && n,
                duration: n,
                easing: r && t || t && !i.isFunction(t) && t
            };
            return u.duration = i.fx.off ? 0 : typeof u.duration == "number" ? u.duration : u.duration in i.fx.speeds ? i.fx.speeds[u.duration] : i.fx.speeds._default, (u.queue == null || u.queue === !0) && (u.queue = "fx"), u.old = u.complete, u.complete = function (n) {
                i.isFunction(u.old) && u.old.call(this), u.queue ? i.dequeue(this, u.queue) : n !== !1 && i._unmark(this)
            }, u
        },
        easing: {
            linear: function (n, t, i, r) {
                return i + r * n
            },
            swing: function (n, t, i, r) {
                return (-Math.cos(n * Math.PI) / 2 + .5) * r + i
            }
        },
        timers: [],
        fx: function (n, t, i) {
            this.options = t, this.elem = n, this.prop = i, t.orig = t.orig || {}
        }
    }), i.fx.prototype = {
        update: function () {
            this.options.step && this.options.step.call(this.elem, this.now, this), (i.fx.step[this.prop] || i.fx.step._default)(this)
        },
        cur: function () {
            if (this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null)) return this.elem[this.prop];
            var t, n = i.css(this.elem, this.prop);
            return isNaN(t = parseFloat(n)) ? !n || n === "auto" ? 0 : n : t
        },
        custom: function (n, r, u) {
            function e(n) {
                return f.step(n)
            }
            var f = this,
                o = i.fx;
            this.startTime = g || bt(), this.end = r, this.now = this.start = n, this.pos = this.state = 0, this.unit = u || this.unit || (i.cssNumber[this.prop] ? "" : "px"), e.queue = this.options.queue, e.elem = this.elem, e.saveState = function () {
                f.options.hide && i._data(f.elem, "fxshow" + f.prop) === t && i._data(f.elem, "fxshow" + f.prop, f.start)
            }, e() && i.timers.push(e) && !nt && (nt = setInterval(o.tick, o.interval))
        },
        show: function () {
            var n = i._data(this.elem, "fxshow" + this.prop);
            this.options.orig[this.prop] = n || i.style(this.elem, this.prop), this.options.show = !0, n !== t ? this.custom(this.cur(), n) : this.custom(this.prop === "width" || this.prop === "height" ? 1 : 0, this.cur()), i(this.elem).show()
        },
        hide: function () {
            this.options.orig[this.prop] = i._data(this.elem, "fxshow" + this.prop) || i.style(this.elem, this.prop), this.options.hide = !0, this.custom(this.cur(), 0)
        },
        step: function (n) {
            var r, e, f, o = g || bt(),
                s = !0,
                u = this.elem,
                t = this.options;
            if (n || o >= t.duration + this.startTime) {
                this.now = this.end, this.pos = this.state = 1, this.update(), t.animatedProperties[this.prop] = !0;
                for (r in t.animatedProperties) t.animatedProperties[r] !== !0 && (s = !1);
                if (s) {
                    if (t.overflow != null && !i.support.shrinkWrapBlocks && i.each(["", "X", "Y"], function (n, i) {
                        u.style["overflow" + i] = t.overflow[n]
                    }), t.hide && i(u).hide(), t.hide || t.show) for (r in t.animatedProperties) i.style(u, r, t.orig[r]), i.removeData(u, "fxshow" + r, !0), i.removeData(u, "toggle" + r, !0);
                    f = t.complete, f && (t.complete = !1, f.call(u))
                }
                return !1
            }
            return t.duration == Infinity ? this.now = o : (e = o - this.startTime, this.state = e / t.duration, this.pos = i.easing[t.animatedProperties[this.prop]](this.state, e, 0, 1, t.duration), this.now = this.start + (this.end - this.start) * this.pos), this.update(), !0
        }
    }, i.extend(i.fx, {
        tick: function () {
            for (var r, t = i.timers, n = 0; n < t.length; n++) r = t[n], !r() && t[n] === r && t.splice(n--, 1);
            t.length || i.fx.stop()
        },
        interval: 13,
        stop: function () {
            clearInterval(nt), nt = null
        },
        speeds: {
            slow: 600,
            fast: 200,
            _default: 400
        },
        step: {
            opacity: function (n) {
                i.style(n.elem, "opacity", n.now)
            },
            _default: function (n) {
                n.elem.style && n.elem.style[n.prop] != null ? n.elem.style[n.prop] = n.now + n.unit : n.elem[n.prop] = n.now
            }
        }
    }), i.each(["width", "height"], function (n, t) {
        i.fx.step[t] = function (n) {
            i.style(n.elem, t, Math.max(0, n.now))
        }
    }), i.expr && i.expr.filters && (i.expr.filters.animated = function (n) {
        return i.grep(i.timers, function (t) {
            return n === t.elem
        }).length
    }), sr = /^t(?:able|d|h)$/i, ft = /^(?:body|html)$/i, i.fn.offset = "getBoundingClientRect" in r.documentElement ? function (n) {
        var t = this[0],
            r, e, u;
        if (n) return this.each(function (t) {
            i.offset.setOffset(this, n, t)
        });
        if (!t || !t.ownerDocument) return null;
        if (t === t.ownerDocument.body) return i.offset.bodyOffset(t);
        try {
            r = t.getBoundingClientRect()
        } catch (y) {}
        if (e = t.ownerDocument, u = e.documentElement, !r || !i.contains(u, t)) return r ? {
            top: r.top,
            left: r.left
        } : {
            top: 0,
            left: 0
        };
        var f = e.body,
            o = ct(e),
            l = u.clientTop || f.clientTop || 0,
            a = u.clientLeft || f.clientLeft || 0,
            v = o.pageYOffset || i.support.boxModel && u.scrollTop || f.scrollTop,
            s = o.pageXOffset || i.support.boxModel && u.scrollLeft || f.scrollLeft,
            h = r.top + v - l,
            c = r.left + s - a;
        return {
            top: h,
            left: c
        }
    } : function (n) {
        var t = this[0];
        if (n) return this.each(function (t) {
            i.offset.setOffset(this, n, t)
        });
        if (!t || !t.ownerDocument) return null;
        if (t === t.ownerDocument.body) return i.offset.bodyOffset(t);
        for (var f, h = t.offsetParent, a = t, l = t.ownerDocument, c = l.documentElement, o = l.body, s = l.defaultView, e = s ? s.getComputedStyle(t, null) : t.currentStyle, u = t.offsetTop, r = t.offsetLeft;
        (t = t.parentNode) && t !== o && t !== c;) {
            if (i.support.fixedPosition && e.position === "fixed") break;
            f = s ? s.getComputedStyle(t, null) : t.currentStyle, u -= t.scrollTop, r -= t.scrollLeft, t === h && (u += t.offsetTop, r += t.offsetLeft, i.support.doesNotAddBorder && (!i.support.doesAddBorderForTableAndCells || !sr.test(t.nodeName)) && (u += parseFloat(f.borderTopWidth) || 0, r += parseFloat(f.borderLeftWidth) || 0), a = h, h = t.offsetParent), i.support.subtractsBorderForOverflowNotVisible && f.overflow !== "visible" && (u += parseFloat(f.borderTopWidth) || 0, r += parseFloat(f.borderLeftWidth) || 0), e = f
        }
        return (e.position === "relative" || e.position === "static") && (u += o.offsetTop, r += o.offsetLeft), i.support.fixedPosition && e.position === "fixed" && (u += Math.max(c.scrollTop, o.scrollTop), r += Math.max(c.scrollLeft, o.scrollLeft)), {
            top: u,
            left: r
        }
    }, i.offset = {
        bodyOffset: function (n) {
            var r = n.offsetTop,
                t = n.offsetLeft;
            return i.support.doesNotIncludeMarginInBodyOffset && (r += parseFloat(i.css(n, "marginTop")) || 0, t += parseFloat(i.css(n, "marginLeft")) || 0), {
                top: r,
                left: t
            }
        },
        setOffset: function (n, t, r) {
            var s = i.css(n, "position");
            s === "static" && (n.style.position = "relative");
            var h = i(n),
                c = h.offset(),
                l = i.css(n, "top"),
                a = i.css(n, "left"),
                v = (s === "absolute" || s === "fixed") && i.inArray("auto", [l, a]) > -1,
                u = {}, e = {}, f, o;
            v ? (e = h.position(), f = e.top, o = e.left) : (f = parseFloat(l) || 0, o = parseFloat(a) || 0), i.isFunction(t) && (t = t.call(n, r, c)), t.top != null && (u.top = t.top - c.top + f), t.left != null && (u.left = t.left - c.left + o), "using" in t ? t.using.call(n, u) : h.css(u)
        }
    }, i.fn.extend({
        position: function () {
            if (!this[0]) return null;
            var u = this[0],
                r = this.offsetParent(),
                n = this.offset(),
                t = ft.test(r[0].nodeName) ? {
                    top: 0,
                    left: 0
                } : r.offset();
            return n.top -= parseFloat(i.css(u, "marginTop")) || 0, n.left -= parseFloat(i.css(u, "marginLeft")) || 0, t.top += parseFloat(i.css(r[0], "borderTopWidth")) || 0, t.left += parseFloat(i.css(r[0], "borderLeftWidth")) || 0, {
                top: n.top - t.top,
                left: n.left - t.left
            }
        },
        offsetParent: function () {
            return this.map(function () {
                for (var n = this.offsetParent || r.body; n && !ft.test(n.nodeName) && i.css(n, "position") === "static";) n = n.offsetParent;
                return n
            })
        }
    }), i.each(["Left", "Top"], function (n, r) {
        var u = "scroll" + r;
        i.fn[u] = function (r) {
            var e, f;
            return r === t ? (e = this[0], !e) ? null : (f = ct(e), f ? "pageXOffset" in f ? f[n ? "pageYOffset" : "pageXOffset"] : i.support.boxModel && f.document.documentElement[u] || f.document.body[u] : e[u]) : this.each(function () {
                f = ct(this), f ? f.scrollTo(n ? i(f).scrollLeft() : r, n ? r : i(f).scrollTop()) : this[u] = r
            })
        }
    }), i.each(["Height", "Width"], function (n, r) {
        var u = r.toLowerCase();
        i.fn["inner" + r] = function () {
            var n = this[0];
            return n ? n.style ? parseFloat(i.css(n, u, "padding")) : this[u]() : null
        }, i.fn["outer" + r] = function (n) {
            var t = this[0];
            return t ? t.style ? parseFloat(i.css(t, u, n ? "margin" : "border")) : this[u]() : null
        }, i.fn[u] = function (n) {
            var f = this[0],
                s, h, e, o;
            return f ? i.isFunction(n) ? this.each(function (t) {
                var r = i(this);
                r[u](n.call(this, t, r[u]()))
            }) : i.isWindow(f) ? (s = f.document.documentElement["client" + r], h = f.document.body, f.document.compatMode === "CSS1Compat" && s || h && h["client" + r] || s) : f.nodeType === 9 ? Math.max(f.documentElement["client" + r], f.body["scroll" + r], f.documentElement["scroll" + r], f.body["offset" + r], f.documentElement["offset" + r]) : n === t ? (e = i.css(f, u), o = parseFloat(e), i.isNumeric(o) ? o : e) : this.css(u, typeof n == "string" ? n : n + "px") : n == null ? null : this
        }
    }), n.jQuery = n.$ = i
})(window), $(function () {
    var t = window.location.href,
        n;
    if (t.indexOf("https") == 0) return n = t.replace("https", "http"), window.location.href = n, !1;
    $("a", ".view-mode").unbind("click").click(function () {
        return $("#formhhvchangemodevin").submit(), !1
    })
}), _glbInitLazyLoad = {
    init: function (n) {
        $(n).lazyload({
            placeholder: "/img/grey.gif",
            effect: "fadeIn"
        })
    }
}, $(function () {
    var n = new SmoothMenu;
    n.InitAllFunctions()
}), $(function () {
    _checkBrowser.checkNow(), _gopy.ShowFormGopY(), _gopy.EscapeKeyPress(), _gopy.SendFeedBack(), _gopy.CloseGopYClick(), _gopy.RefreshGopYCaptcha()
}), _checkBrowser = {
    checkNow: function () {
        var n = $.browser.version * 1;
        $.browser.msie && n <= 7 && ($("#mask").fadeIn(100), $.ajax({
            url: "/FeedBack/CheckBrowser",
            type: "POST",
            dataType: "html",
            data: {},
            beforeSend: function () {},
            success: function (n) {
                $("body").append(n);
                var r = $(window).height(),
                    i = $(window).width();
                $("#checkBrowser").css("top", r / 2 - $("#checkBrowser").height() / 2), $("#checkBrowser").css("left", i / 2 - $("#checkBrowser").width() / 2), $("#checkBrowser").fadeIn(100), $(".btnGopyclose", "#checkBrowser").unbind("click").click(function () {
                    $("#checkBrowser").hide(), CloseMark()
                })
            },
            error: function () {},
            complete: function () {}
        }))
    }
}, _gopy = {
    ShowFormGopY: function () {
        $(".gopyfrm").click(function () {
            return OpenMark(this), _gopy.OpenFormGopY(), !1
        })
    },
    SendFeedBack: function () {
        $("#btnGopY").click(function () {
            if ($("#tbxGopyFullName").val().length == 0) {
                _gopy.NoticeBind("Vui lòng nhập họ tên của bạn"), _gopy.ClearNotice();
                return
            }
            if ($("#tbxGopyEmail").val().length == 0) {
                _gopy.NoticeBind("Vui lòng nhập địa chỉ email"), _gopy.ClearNotice();
                return
            }
            if (!IsValidEmail($("#tbxGopyEmail").val())) {
                _gopy.NoticeBind("Địa chỉ email không hợp lệ"), _gopy.ClearNotice();
                return
            }
			 if ($("#tbxGopyPhone").val().length == 0) {
                _gopy.NoticeBind("Vui lòng nhập số điện thoại"), _gopy.ClearNotice();
                return
            }
            if ($("#tbxGopYContent").val().length == 0) {
                _gopy.NoticeBind("Vui lòng nhập địa chỉ"), _gopy.ClearNotice();
                return
            }
            $.ajax({
                url: "/jquery/redeal.php",
                type: "POST",
                dataType: "html",
                data: $("#frmgopy").serialize(),
                beforeSend: function () {},
                success: function (n) {
                    n == "1" ? (alert("Chúng tôi sẽ thông báo cho bạn sau khi sản phẩm này có hàng!"), _gopy.ClearFormGopY(), _gopy.ClearNotice(), _gopy.CloseFormGopY(), CloseMark()) : (_gopy.NoticeBind("Gửi không thành công. Vui lòng thử lại."), _gopy.ChangeGopYCaptcha())
                },
                error: function () {
                    alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
                },
                complete: function () {}
            })
        })
    },
    RefreshGopYCaptcha: function () {
        $("#btnRefreshFeedBackCaptcha").click(function () {
            _gopy.ChangeGopYCaptcha()
        })
    },
    ChangeGopYCaptcha: function () {
        $("#cptGopYImg").attr("src", "/captcha/captcha.php?" + (new Date).getDate().toString() + (new Date).getMilliseconds())
    },

    NoticeBind: function (n) {
        $(".gopy_notice").html(n), $(".gopy_notice").css("display", "inline")
    },
    ClearNotice: function () {
        setTimeout(function () {
            $(".gopy_notice").html(""), $(".gopy_notice").fadeOut("slow")
        }, 2e3)
    },
    OpenFormGopY: function () {
        var t = $(window).height(),
            n = $(window).width();
        $(".gopy_box").css("top", t / 2 - $(".gopy_box").height() / 2), $(".gopy_box").css("left", n / 2 - $(".gopy_box").width() / 2), $(".gopy_box").fadeIn(100), _gopy.ChangeGopYCaptcha()
    },
    CloseFormGopY: function () {
        $(".gopy_box").css("display", "none")
    },
    ClearFormGopY: function () {
        $("#tbxGopyFullName").val(""), $("#tbxGopyEmail").val(""), $("#tbxGopyPhone").val(""), $("#tbxGopYContent").val(""), $("#tbxGopYCaptcha").val("")
    },
    PressEnterKey: function () {},
    CloseGopYClick: function () {
        $(".btnGopyclose").click(function () {
            _gopy.ClearFormGopY(), _gopy.CloseFormGopY(), CloseMark()
        })
    },
    EscapeKeyPress: function () {
        $(document).keypress(function (n) {
            n.keyCode == 27 && (_gopy.CloseFormGopY(), CloseMark())
        })
    }
}, $(function () {
    _registmail.SendRegistEmail()
}), _registmail = {
    SendRegistEmail: function () {
        return $(".subscribeEmail .btnSubscribe").click(function () {
            if ($("#subscribeEmail").val().trim().length == 0) return alert("Vui lòng nhập địa chỉ email"), !1;
            if (!IsValidEmail($("#subscribeEmail").val())) return alert("Địa chỉ email không hợp lệ"), !1;
            $.ajax({
                url: "/Customer/RegistEmail",
                type: "GET",
                dataType: "html",
                data: {
                    email: $("#subscribeEmail").val()
                },
                beforeSend: function () {},
                success: function (n) {
                    n == "1" ? alert("Email của bạn đã được đăng ký thành công.") : alert("Xin lỗi, đăng ký của bạn không thành công, \n bạn vui lòng kiểm tra lại email nhé.")
                },
                error: function () {
                    alert("Kết nối không thành công, bạn thử kiểm tra lại kết nối internet")
                },
                complete: function () {}
            })
        }), !1
    }
}, $(function () {
    $(function () {
        $(window).scroll(function () {
            $(this).scrollTop() > 100 ? $("#back-top").show() : $("#back-top").hide()
        }), $("#back-top .scrolltop").click(function () {
            return $("body,html").animate({
                scrollTop: 0
            }, 800), !1
        })
    })
}), eval(function (n, t, i, r, u, f) {
    if (u = function (n) {
        return (n < t ? "" : u(parseInt(n / t))) + ((n = n % t) > 35 ? String.fromCharCode(n + 29) : n.toString(36))
    }, !"".replace(/^/, String)) {
        while (i--) f[u(i)] = r[i] || u(i);
        r = [function (n) {
            return f[n]
        }], u = function () {
            return "\\w+"
        }, i = 1
    }
    while (i--) r[i] && (n = n.replace(new RegExp("\\b" + u(i) + "\\b", "g"), r[i]));
    return n
}('(7($){$.Q.P=7(t){8 1={d:0,G:0,e:"o",B:"S",3:5};6(t){$.J(1,t)}8 p=c;6("o"==1.e){$(1.3).v("o",7(e){8 F=0;p.C(7(){6($.s(c,1)||$.x(c,1)){}f 6(!$.n(c,1)&&!$.m(c,1)){$(c).w("u")}f{6(F++>1.G){h E}}});8 H=$.N(p,7(9){h!9.k});p=$(H)})}c.C(7(){8 2=c;6(j==$(2).b("r")){$(2).b("r",$(2).b("i"))}6("o"!=1.e||j==$(2).b("i")||1.z==$(2).b("i")||($.s(2,1)||$.x(2,1)||$.n(2,1)||$.m(2,1))){6(1.z){$(2).b("i",1.z)}f{$(2).Z("i")}2.k=E}f{2.k=D}$(2).11("u",7(){6(!c.k){$("<Y />").v("U",7(){$(2).V().b("i",$(2).b("r"))[1.B](1.W);2.k=D}).b("i",$(2).b("r"))}});6("o"!=1.e){$(2).v(1.e,7(e){6(!2.k){$(2).w("u")}})}});$(1.3).w(1.e);h c};$.n=7(9,1){6(1.3===j||1.3===5){8 4=$(5).y()+$(5).I()}f{8 4=$(1.3).g().q+$(1.3).y()}h 4<=$(9).g().q-1.d};$.m=7(9,1){6(1.3===j||1.3===5){8 4=$(5).A()+$(5).M()}f{8 4=$(1.3).g().l+$(1.3).A()}h 4<=$(9).g().l-1.d};$.s=7(9,1){6(1.3===j||1.3===5){8 4=$(5).I()}f{8 4=$(1.3).g().q}h 4>=$(9).g().q+1.d+$(9).y()};$.x=7(9,1){6(1.3===j||1.3===5){8 4=$(5).M()}f{8 4=$(1.3).g().l}h 4>=$(9).g().l+1.d+$(9).A()};$.J($.10[\':\'],{"T-L-4":"$.n(a, {d : 0, 3: 5})","R-L-4":"!$.n(a, {d : 0, 3: 5})","O-K-4":"$.m(a, {d : 0, 3: 5})","l-K-4":"!$.m(a, {d : 0, 3: 5})"})})(X);', 62, 64, "|settings|self|container|fold|window|if|function|var|element||attr|this|threshold|event|else|offset|return|src|undefined|loaded|left|rightoffold|belowthefold|scroll|elements|top|original|abovethetop|options|appear|bind|trigger|leftofbegin|height|placeholder|width|effect|each|true|false|counter|failurelimit|temp|scrollTop|extend|of|the|scrollLeft|grep|right|lazyload|fn|above|show|below|load|hide|effectspeed|jQuery|img|removeAttr|expr|one".split("|"), 0, {}))


