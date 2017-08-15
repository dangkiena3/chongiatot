function Cart() {
    var s = function () {
        $(".title-soluong input:text").keyup(function () {
            var r = $(this).parent().parent().parent(),
                u, e, f, o;
            parseInt($(this).val()) > parseInt(r.find("#numAvalidable").val()) && (alert("Bạn chỉ mua được tối đa là: " + r.find("#numAvalidable").val()), $(this).val(r.find("#numAvalidable").val())), u = r.find("#IsDealService").val(), e = r.find("#price").val() * $(this).val(), parseInt(u) == 0 ? r.find(".tientratruoc").html(formatCurrency(e)) : r.find(".tientrasau").html(formatCurrency(e)), f = $("#shipping").val(), isNaN(f) && (f = 0), parseInt(u) == 0 ? $(".sum_item_value_price").html("<p>" + formatCurrency(n(u)) + "</p>") : $(".sum_item_value_trasau").html("<p>" + formatCurrency(n(u)) + "</p>"), o = n() + f, $(".sum_item_value_total").html("<p>" + formatCurrency(o) + "</p>"), i(r.find("#hdDealIfoID").val(), $(this).val()), t();
            parseInt(u) == 0 ? $(".sum_price_vnd").html("" + formatCurrency(n(u)) + "") : ''
        }), $(".title-soluong input:text").focus(function () {
            $(this).select()
        })
    }, c = function () {
        $(".title-soluong input:text").change(function () {})
    }, h = function () {
        $(".up_quantity").click(function () {
            var n = $(this).parent().parent().find("#tbxQuantity").val();
            parseInt(n) < 99 && ($(this).parent().parent().find("#tbxQuantity").val(parseInt(n) + 1), $(this).parent().parent().find("#tbxQuantity").trigger("keyup"));
            return
        })
    }, l = function () {
        $(".down_quantity").click(function () {
            var n = $(this).parent().parent().find("#tbxQuantity").val();
            parseInt(n) > 1 && ($(this).parent().parent().find("#tbxQuantity").val(parseInt(n) - 1), $(this).parent().parent().find("#tbxQuantity").trigger("keyup"));
            return
        })
    }, v = function () {
        $("#btn_Order").click(function () {
            return /*$(".cart_login").show(), */$(".cart_regist").show(), $.scrollTo(".cart_login", 500), $("#tbxEmail").focus(), !1
        })
    }, n = function (n) {
        var t = 0;
        return $(".cart_item").each(function () {
            var i = $(this).find("#IsDealService").val();
            parseInt(i) == parseInt(n) && (t += $(this).find("#price").val() * $(this).find("#tbxQuantity").val())
        }), t
    }, t = function () {
        var n = 0;
        $(".cart_item").each(function () {
            parseInt($(this).find("#tbxQuantity").val()) > 0 && (n += parseInt($(this).find("#tbxQuantity").val()))
        }), parseInt(n) > 0 ? $(".cart-quantity").html(n) : $(".cart-quantity").html("0")
    }, a = function () {
        $(".title-del a").click(function () {
            var i = confirm("Xóa sản phẩm vừa chọn ?"),
                n;
            i == !0 && (n = $(this).parent().parent().parent(), o($(n).find("#hdDealIfoID").val()), $(n).remove(), u(), t(), e(), r() == 0 && ($(".cart_listitem").html("<div style='width:100%;float:left;color:red;text-align:center;line-height:50px;'>Giỏ hàng trống</div>"), $(".sum_item").remove(), $(".finish_order").remove()))
        })
    }, y = function (n) {
        $.ajax({
            type: "POST",
            url: "../../GioHang/CheckEnableHotDeal/",
            data: {
                DealID: n
            },
            success: function (n) {
                return parseInt(n) == 0 ? (alert("Số lần đăng ký hot deal của bạn đã vượt giới hạn cho phép"), !1) : !0
            }
        })
    }, r = function () {
        return $(".cart_item").length
    }, u = function () {
        var r = 0,
            i = +$("#shipping").val(),
            t;
        $(".sum_item_value_price").html("<p>" + formatCurrency(n("0")) + "</p>"),$(".sum_price_vnd").html("" + formatCurrency(n("0")) + ""), $(".sum_item_value_trasau").html("<p>" + formatCurrency(n("1")) + "</p>"), t = n() + i, $(".sum_item_value_total").html("<p>" + formatCurrency(t) + "</p>")
    }, o = function (n) {
        $.ajax({
            type: "POST",
            url: "/cart/delitem.php",
            data: {
                deleteDealOptionID: n
            },
            success: function (n) {
                parseInt(n) == 1
            }
        })
    }, e = function () {
        $(".cart_item").each(function () {
            i($(this).find("#hdDealIfoID").val(), $(this).find("#tbxQuantity").val())
        })
    }, i = function (n, t) {
        parseInt(t) >= 0 && parseInt(n) > 0 && $.ajax({
            type: "POST",
            url: "/cart/updateitem.php",
            data: {
                dealOptionIdUpdate: n,
                quantity: t
            },
            success: function () {}
        })
    }, f = function () {
        $(".toolTip").hover(function () {
            this.tip = this.title, $(this).append('<div class="toolTipWrapper"><div class="toolTipTop"></div><div class="toolTipMid">' + this.tip + '</div><div class="toolTipBtm"></div></div>'), this.title = "", this.width = $(this).width(), $(this).find(".toolTipWrapper").css({
                left: this.width - 22
            }), $(".toolTipWrapper").fadeIn(300)
        }, function () {
            $(".toolTipWrapper").fadeOut(100), $(this).children().remove(), this.title = this.tip
        })
    };
    return {
        InitCartFunctions: function () {
            v(), s(), a(), h(), l(), c(), f()
        }
    }
}
function blockNotNumber(n) {
    var n = window.event || n;
    window.event ? (n.keyCode < 48 || n.keyCode > 57) && (n.returnValue = !1) : n.which != 8 && (n.which < 48 || n.which > 57) && n.preventDefault()
}
function formatCurrency(n) {
    n = n.toString().replace(/\$|\,/g, ""), isNaN(n) && (n = "0"), sign = n == (n = Math.abs(n)), n = Math.floor(n * 100 + .50000000001), cents = n % 100, n = Math.floor(n / 100).toString(), cents < 10 && (cents = "0" + cents);
    for (var t = 0; t < Math.floor((n.length - (1 + t)) / 3); t++) n = n.substring(0, n.length - (4 * t + 3)) + "." + n.substring(n.length - (4 * t + 3));
    return n
}
function checkEmail(n) {
    return n.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1 ? !0 : !1
}
function LogInBuy() {
    if ($("#tbxEmail").val().trim() == "") {
        $(".error_email").html("* Vui lòng nhập email"), $("#tbxEmail").focus();
        return
    }
    if (checkEmail($("#tbxEmail").val()) == !1) {
        $(".error_email").html("* Địa chỉ email không hợp lệ"), $("#tbxEmail").focus();
        return
    }
    if ($(".error_email").html(""), $("#tbxPass").val().trim() == "") {
        $(".error_pass").html("* Vui lòng nhập mật khẩu"), $("#tbxPass").focus();
        return
    }
    $(".error_pass").html("");
    var n = "?u=" + $("#tbxEmail").val() + "&p=" + $("#tbxPass").val();
    $.ajax({
        type: "GET",
        url: "/jquery/dologin.php" + n,
        data: "",
        success: function (n) {
            var t;
            parseInt(n) == 0 ? ($(".error_email").html("&#187; Đăng nhập không thành công.Vui lòng thử lại !!!"), $("#tbxEmail").val(""), $("#tbxPass").val("")) : parseInt(n) == -1 ? ($(".error_email").html("&#187; Tài khoản của bạn tạm thời bị khóa"), $("#tbxEmail").val(""), $("#tbxPass").val("")) : (t = "", parseInt(n) == 1 && (t = "/ThanhToan"), window.location.href = t)
        }
    })
}
function RegistBuy() {
    if (checkInput()) $(".regist_note").css("display", "none");
    else {
        $(".regist_note").css("display", "inline");
        return
    }
    $(".fb_loading").html("<img alt='' src='/include/template/{$INI['skin']['template']}/css/images/ajax-loader1.gif' />"), $.ajax({
        type: "POST",
        url: "/jquery/doregist.php",
        data: {
            fullName: $("#tbxFullName").val(),
            email: $("#tbxEmailRegist").val(),
            pass: $("#tbxPassRegist").val(),
            province: $("select#Province option:selected").val(),
            district: $("select#District option:selected").val(),
			ward: $("select#Ward option:selected").val(),
            Address: $("#tbxAddress").val(),
            Phone: $("#tbxPhone").val(),
            gioitinh: $("select#ddlRegistSex option:selected").val(),
            ngaysinh: $("select#ddlRegistBirthday option:selected").val(),
            thangsinh: $("select#ddlRegistBirthMonth option:selected").val(),
            namsinh: $("select#ddlRegistBirthYear option:selected").val()
        },
		beforeSend: function () {$(".reg_loading").css("display", "block")},
        success: function (n) {
            n == "0" ? alert("Đăng ký không thành công, Vui lòng kiểm tra lại thông tin vừa nhập !!!") : n == "1" ? window.location.href = "/ThanhToan" : n == "3" ? ($(".regist_note").css("display", "inline"), $(".regist_note").html("<span style='float:left;margin-top:3px;margin-left:3px;'>&#187; Email này đã được dùng để đăng ký. Bạn nên dùng chức năng quên mật khẩu để lấy lại.</span>")) : window.location.href = "/", $(".fb_loading").html(""),window.location.reload()
        },
		complete: function () {
			$(".reg_loading").css("display", "none")
		}
    })
}
function checkInput() {
    if ($("#tbxFullName").val().trim() == "") return $("#tbxFullName").focus(), $(".regist_note").html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập họ tên của bạn.</span>"), !1;
    if ($("#tbxEmailRegist").val() == "") {
        $(".regist_note").html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập địa chỉ email.</span>"), $("#tbxEmailRegist").focus();
        return
    }
    return checkEmailPattern($("#tbxEmailRegist").val()) == !1 ? (alert("Email không đúng định dạng"), $("#tbxEmailRegist").focus(), $("#tbxEmailRegist").select(), !1) : $("#tbxPassRegist").val() == "" ? ($(".regist_note").html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập mật khẩu của bạn.</span>"), $("#tbxPassRegist").focus(), !1) : $("#tbxPassRegist").val().length < 4 ? (alert("Mật khẩu tối thiểu phải 4 ký tự"), $("#tbxPassRegist").focus(), !1) : $("#tbxRePassRegist").val() == "" ? ($(".regist_note").html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng xác nhận lại mật khẩu.</span>"), $("#tbxRePassRegist").focus(), !1) : $("#tbxPassRegist").val() != $("#tbxRePassRegist").val() ? ($(".regist_note").html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Mật khẩu bạn nhập vào không khớp.</span>"), $("#tbxRePassRegist").focus(), $("#tbxRePassRegist").select(), !1) : $("#ddlRegistSex option:selected").val() == "N" ? (alert("Vui lòng chọn giới tính"), !1) : $("#ddlRegistBirthday option:selected").val() == "0" ? (alert("Vui lòng chọn ngày sinh"), !1) : $("#ddlRegistBirthMonth option:selected").val() == "0" ? (alert("Vui lòng chọn tháng sinh"), !1) : $("#ddlRegistBirthYear option:selected").val() == "0" ? (alert("Vui lòng chọn năm sinh"), !1) : $("#Province option:selected").val() == "0" ? (alert("Vui lòng chọn tỉnh thành"), !1) : $("#District option:selected").val() == "0" || $("#District option:selected").val() == undefined ? (alert("Vui lòng chọn quận huyện."), !1) : $("#Ward option:selected").val() == "0" || $("#Ward option:selected").val() == undefined ? (alert("Vui lòng chọn phường xã."), !1) : $("#tbxAddress").val().trim() == "" ? ($(".regist_note").html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập địa chỉ khách hàng.</span>"), $("#tbxAddress").focus(), !1) : $("#tbxPhone").val() == "" ? ($(".regist_note").html("<span style='float:left;line-height:25px;margin-left:5px;'>&#187; Vui lòng nhập số điện thoại liên lạc.</span>"), $("#tbxPhone").focus(), !1) : !0
}
function checkEmailPattern(n) {
    return n.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1 ? !0 : !1
}
function validatePassword(n, t) {
    var r = {
        lower: 0,
        upper: 0,
        alpha: 0,
        numeric: 0,
        special: 0,
        length: [0, Infinity],
        custom: [],
        badWords: [],
        badSequenceLength: 0,
        noQwertySequences: !1,
        noSequential: !1
    }, e, o, u, i;
    for (e in t) r[e] = t[e];
    if (o = {
        lower: /[a-z]/g,
        upper: /[A-Z]/g,
        alpha: /[A-Z]/gi,
        numeric: /[0-9]/g,
        special: /[\W_]/g
    }, n.length < r.length[0] || n.length > r.length[1]) return !1;
    for (u in o) if ((n.match(o[u]) || []).length < r[u]) return !1;
    for (i = 0; i < r.badWords.length; i++) if (n.toLowerCase().indexOf(r.badWords[i].toLowerCase()) > -1) return !1;
    if (r.noSequential && /([\S\s])\1/.test(n)) return !1;
    if (r.badSequenceLength) {
        var h = "abcdefghijklmnopqrstuvwxyz",
            l = h.toUpperCase(),
            c = "0123456789",
            a = "qwertyuiopasdfghjklzxcvbnm",
            s = r.badSequenceLength - 1,
            f = "_" + n.slice(0, s);
        for (i = s; i < n.length; i++) if (f = f.slice(1) + n.charAt(i), h.indexOf(f) > -1 || l.indexOf(f) > -1 || c.indexOf(f) > -1 || r.noQwertySequences && a.indexOf(f) > -1) return !1
    }
    for (i = 0; i < r.custom.length; i++) if (u = r.custom[i], u instanceof RegExp) {
        if (!u.test(n)) return !1
    } else if (u instanceof Function && !u(n)) return !1;
    return !0
}
var _cart08, _add;
$(function () {
    var n = new Cart;
    n.InitCartFunctions()
}),
function (n) {
    n.extend(n.fn, {
        validate: function (t) {
            if (!this.length) {
                t && t.debug && window.console && console.warn("nothing selected, can't validate, returning nothing");
                return
            }
            var i = n.data(this[0], "validator");
            return i ? i : (i = new n.validator(t, this[0]), n.data(this[0], "validator", i), i.settings.onsubmit && (this.find("input, button").filter(".cancel").click(function () {
                i.cancelSubmit = !0
            }), i.settings.submitHandler && this.find("input, button").filter(":submit").click(function () {
                i.submitButton = this
            }), this.submit(function (t) {
                function r() {
                    if (i.settings.submitHandler) {
                        if (i.submitButton) var t = n("<input type='hidden'/>").attr("name", i.submitButton.name).val(i.submitButton.value).appendTo(i.currentForm);
                        return i.settings.submitHandler.call(i, i.currentForm), i.submitButton && t.remove(), !1
                    }
                    return !0
                }
                return (i.settings.debug && t.preventDefault(), i.cancelSubmit) ? (i.cancelSubmit = !1, r()) : i.form() ? i.pendingRequest ? (i.formSubmitted = !0, !1) : r() : (i.focusInvalid(), !1)
            })), i)
        },
        valid: function () {
            if (n(this[0]).is("form")) return this.validate().form();
            var t = !0,
                i = n(this[0].form).validate();
            return this.each(function () {
                t &= i.element(this)
            }), t
        },
        removeAttrs: function (t) {
            var r = {}, i = this;
            return n.each(t.split(/\s/), function (n, t) {
                r[t] = i.attr(t), i.removeAttr(t)
            }), r
        },
        rules: function (t, i) {
            var r = this[0],
                e, u, s;
            if (t) {
                var o = n.data(r.form, "validator").settings,
                    h = o.rules,
                    f = n.validator.staticRules(r);
                switch (t) {
                case "add":
                    n.extend(f, n.validator.normalizeRule(i)), h[r.name] = f, i.messages && (o.messages[r.name] = n.extend(o.messages[r.name], i.messages));
                    break;
                case "remove":
                    return i ? (e = {}, n.each(i.split(/\s/), function (n, t) {
                        e[t] = f[t], delete f[t]
                    }), e) : (delete h[r.name], f)
                }
            }
            return u = n.validator.normalizeRules(n.extend({}, n.validator.metadataRules(r), n.validator.classRules(r), n.validator.attributeRules(r), n.validator.staticRules(r)), r), u.required && (s = u.required, delete u.required, u = n.extend({
                required: s
            }, u)), u
        }
    }), n.extend(n.expr[":"], {
        blank: function (t) {
            return !n.trim("" + t.value)
        },
        filled: function (t) {
            return !!n.trim("" + t.value)
        },
        unchecked: function (n) {
            return !n.checked
        }
    }), n.validator = function (t, i) {
        this.settings = n.extend(!0, {}, n.validator.defaults, t), this.currentForm = i, this.init()
    }, n.validator.format = function (t, i) {
        return arguments.length == 1 ? function () {
            var i = n.makeArray(arguments);
            return i.unshift(t), n.validator.format.apply(this, i)
        } : (arguments.length > 2 && i.constructor != Array && (i = n.makeArray(arguments).slice(1)), i.constructor != Array && (i = [i]), n.each(i, function (n, i) {
            t = t.replace(new RegExp("\\{" + n + "\\}", "g"), i)
        }), t)
    }, n.extend(n.validator, {
        defaults: {
            messages: {},
            groups: {},
            rules: {},
            errorClass: "error",
            validClass: "valid",
            errorElement: "div",
            focusInvalid: !0,
            errorContainer: n([]),
            errorLabelContainer: n([]),
            onsubmit: !0,
            ignore: [],
            ignoreTitle: !1,
            onfocusin: function (n) {
                this.lastActive = n, this.settings.focusCleanup && !this.blockFocusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, n, this.settings.errorClass, this.settings.validClass), this.errorsFor(n).hide())
            },
            onfocusout: function (n) {
                !this.checkable(n) && (n.name in this.submitted || !this.optional(n)) && this.element(n)
            },
            onkeyup: function (n) {
                (n.name in this.submitted || n == this.lastElement) && this.element(n)
            },
            onclick: function (n) {
                n.name in this.submitted ? this.element(n) : n.parentNode.name in this.submitted && this.element(n.parentNode)
            },
            highlight: function (t, i, r) {
                n(t).addClass(i).removeClass(r)
            },
            unhighlight: function (t, i, r) {
                n(t).removeClass(i).addClass(r)
            }
        },
        setDefaults: function (t) {
            n.extend(n.validator.defaults, t)
        },
        messages: {
            required: "This field is required.",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "Please enter a valid number.",
            digits: "Please enter only digits.",
            creditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            accept: "Please enter a value with a valid extension.",
            maxlength: n.validator.format("Please enter no more than {0} characters."),
            minlength: n.validator.format("Please enter at least {0} characters."),
            rangelength: n.validator.format("Please enter a value between {0} and {1} characters long."),
            range: n.validator.format("Please enter a value between {0} and {1}."),
            max: n.validator.format("Please enter a value less than or equal to {0}."),
            min: n.validator.format("Please enter a value greater than or equal to {0}.")
        },
        autoCreateRanges: !1,
        prototype: {
            init: function () {
                function i(t) {
                    var i = n.data(this[0].form, "validator"),
                        r = "on" + t.type.replace(/^validate/, "");
                    i.settings[r] && i.settings[r].call(i, this[0])
                }
                var r, t;
                this.labelContainer = n(this.settings.errorLabelContainer), this.errorContext = this.labelContainer.length && this.labelContainer || n(this.currentForm), this.containers = n(this.settings.errorContainer).add(this.settings.errorLabelContainer), this.submitted = {}, this.valueCache = {}, this.pendingRequest = 0, this.pending = {}, this.invalid = {}, this.reset(), r = this.groups = {}, n.each(this.settings.groups, function (t, i) {
                    n.each(i.split(/\s/), function (n, i) {
                        r[i] = t
                    })
                }), t = this.settings.rules, n.each(t, function (i, r) {
                    t[i] = n.validator.normalizeRule(r)
                }), n(this.currentForm).validateDelegate(":text, :password, :file, select, textarea", "focusin focusout keyup", i).validateDelegate(":radio, :checkbox, select, option", "click", i), this.settings.invalidHandler && n(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler)
            },
            form: function () {
                return this.checkForm(), n.extend(this.submitted, this.errorMap), this.invalid = n.extend({}, this.errorMap), this.valid() || n(this.currentForm).triggerHandler("invalid-form", [this]), this.showErrors(), this.valid()
            },
            checkForm: function () {
                this.prepareForm();
                for (var n = 0, t = this.currentElements = this.elements(); t[n]; n++) this.check(t[n]);
                return this.valid()
            },
            element: function (t) {
                t = this.clean(t), this.lastElement = t, this.prepareElement(t), this.currentElements = n(t);
                var i = this.check(t);
                return i ? delete this.invalid[t.name] : this.invalid[t.name] = !0, this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), i
            },
            showErrors: function (t) {
                if (t) {
                    n.extend(this.errorMap, t), this.errorList = [];
                    for (var i in t) this.errorList.push({
                        message: t[i],
                        element: this.findByName(i)[0]
                    });
                    this.successList = n.grep(this.successList, function (n) {
                        return !(n.name in t)
                    })
                }
                this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors()
            },
            resetForm: function () {
                n.fn.resetForm && n(this.currentForm).resetForm(), this.submitted = {}, this.prepareForm(), this.hideErrors(), this.elements().removeClass(this.settings.errorClass)
            },
            numberOfInvalids: function () {
                return this.objectLength(this.invalid)
            },
            objectLength: function (n) {
                var t = 0,
                    i;
                for (i in n) t++;
                return t
            },
            hideErrors: function () {
                this.addWrapper(this.toHide).hide()
            },
            valid: function () {
                return this.size() == 0
            },
            size: function () {
                return this.errorList.length
            },
            focusInvalid: function () {
                if (this.settings.focusInvalid) try {
                    n(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin")
                } catch (t) {}
            },
            findLastActive: function () {
                var t = this.lastActive;
                return t && n.grep(this.errorList, function (n) {
                    return n.element.name == t.name
                }).length == 1 && t
            },
            elements: function () {
                var i = this,
                    t = {};
                return n([]).add(this.currentForm.elements).filter(":input").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function () {
                    return (!this.name && i.settings.debug && window.console && console.error("%o has no name assigned", this), this.name in t || !i.objectLength(n(this).rules())) ? !1 : (t[this.name] = !0, !0)
                })
            },
            clean: function (t) {
                return n(t)[0]
            },
            errors: function () {
                return n(this.settings.errorElement + "." + this.settings.errorClass, this.errorContext)
            },
            reset: function () {
                this.successList = [], this.errorList = [], this.errorMap = {}, this.toShow = n([]), this.toHide = n([]), this.currentElements = n([])
            },
            prepareForm: function () {
                this.reset(), this.toHide = this.errors().add(this.containers)
            },
            prepareElement: function (n) {
                this.reset(), this.toHide = this.errorsFor(n)
            },
            check: function (t) {
                var u, f, i, r;
                t = this.clean(t), this.checkable(t) && (t = this.findByName(t.name)[0]), u = n(t).rules(), f = !1;
                for (method in u) {
                    i = {
                        method: method,
                        parameters: u[method]
                    };
                    try {
                        if (r = n.validator.methods[method].call(this, t.value.replace(/\r/g, ""), t, i.parameters), r == "dependency-mismatch") {
                            f = !0;
                            continue
                        }
                        if (f = !1, r == "pending") {
                            this.toHide = this.toHide.not(this.errorsFor(t));
                            return
                        }
                        if (!r) return this.formatAndAdd(t, i), !1
                    } catch (e) {
                        this.settings.debug && window.console && console.log("exception occured when checking element " + t.id + ", check the '" + i.method + "' method", e);
                        throw e;
                    }
                }
                if (!f) return this.objectLength(u) && this.successList.push(t), !0
            },
            customMetaMessage: function (t, i) {
                if (n.metadata) {
                    var r = this.settings.meta ? n(t).metadata()[this.settings.meta] : n(t).metadata();
                    return r && r.messages && r.messages[i]
                }
            },
            customMessage: function (n, t) {
                var i = this.settings.messages[n];
                return i && (i.constructor == String ? i : i[t])
            },
            findDefined: function () {
                for (var n = 0; n < arguments.length; n++) if (arguments[n] !== undefined) return arguments[n];
                return undefined
            },
            defaultMessage: function (t, i) {
                return this.findDefined(this.customMessage(t.name, i), this.customMetaMessage(t, i), !this.settings.ignoreTitle && t.title || undefined, n.validator.messages[i], "<strong>Warning: No message defined for " + t.name + "</strong>")
            },
            formatAndAdd: function (n, t) {
                var i = this.defaultMessage(n, t.method),
                    r = /\$?\{(\d+)\}/g;
                typeof i == "function" ? i = i.call(this, t.parameters, n) : r.test(i) && (i = jQuery.format(i.replace(r, "{$1}"), t.parameters)), this.errorList.push({
                    message: i,
                    element: n
                }), this.errorMap[n.name] = i, this.submitted[n.name] = i
            },
            addWrapper: function (n) {
                return this.settings.wrapper && (n = n.add(n.parent(this.settings.wrapper))), n
            },
            defaultShowErrors: function () {
                for (var t, i, n = 0; this.errorList[n]; n++) t = this.errorList[n], this.settings.highlight && this.settings.highlight.call(this, t.element, this.settings.errorClass, this.settings.validClass), this.showLabel(t.element, t.message);
                if (this.errorList.length && (this.toShow = this.toShow.add(this.containers)), this.settings.success) for (n = 0; this.successList[n]; n++) this.showLabel(this.successList[n]);
                if (this.settings.unhighlight) for (n = 0, i = this.validElements(); i[n]; n++) this.settings.unhighlight.call(this, i[n], this.settings.errorClass, this.settings.validClass);
                this.toHide = this.toHide.not(this.toShow), this.hideErrors(), this.addWrapper(this.toShow).show()
            },
            validElements: function () {
                return this.currentElements.not(this.invalidElements())
            },
            invalidElements: function () {
                return n(this.errorList).map(function () {
                    return this.element
                })
            },
            showLabel: function (t, i) {
                var r = this.errorsFor(t);
                r.length ? (r.removeClass().addClass(this.settings.errorClass), r.attr("generated") && r.html(i)) : (r = n("<" + this.settings.errorElement + "/>").attr({
                    "for": this.idOrName(t),
                    generated: !0
                }).addClass(this.settings.errorClass).html(i || ""), this.settings.wrapper && (r = r.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()), this.labelContainer.append(r).length || (this.settings.errorPlacement ? this.settings.errorPlacement(r, n(t)) : r.insertAfter(t))), !i && this.settings.success && (r.text(""), typeof this.settings.success == "string" ? r.addClass(this.settings.success) : this.settings.success(r)), this.toShow = this.toShow.add(r)
            },
            errorsFor: function (t) {
                var i = this.idOrName(t);
                return this.errors().filter(function () {
                    return n(this).attr("for") == i
                })
            },
            idOrName: function (n) {
                return this.groups[n.name] || (this.checkable(n) ? n.name : n.id || n.name)
            },
            checkable: function (n) {
                return /radio|checkbox/i.test(n.type)
            },
            findByName: function (t) {
                var i = this.currentForm;
                return n(document.getElementsByName(t)).map(function (n, r) {
                    return r.form == i && r.name == t && r || null
                })
            },
            getLength: function (t, i) {
                switch (i.nodeName.toLowerCase()) {
                case "select":
                    return n("option:selected", i).length;
                case "input":
                    if (this.checkable(i)) return this.findByName(i.name).filter(":checked").length
                }
                return t.length
            },
            depend: function (n, t) {
                return this.dependTypes[typeof n] ? this.dependTypes[typeof n](n, t) : !0
            },
            dependTypes: {
                boolean: function (n) {
                    return n
                },
                string: function (t, i) {
                    return !!n(t, i.form).length
                },
                "function": function (n, t) {
                    return n(t)
                }
            },
            optional: function (t) {
                return !n.validator.methods.required.call(this, n.trim(t.value), t) && "dependency-mismatch"
            },
            startRequest: function (n) {
                this.pending[n.name] || (this.pendingRequest++, this.pending[n.name] = !0)
            },
            stopRequest: function (t, i) {
                this.pendingRequest--, this.pendingRequest < 0 && (this.pendingRequest = 0), delete this.pending[t.name], i && this.pendingRequest == 0 && this.formSubmitted && this.form() ? (n(this.currentForm).submit(), this.formSubmitted = !1) : !i && this.pendingRequest == 0 && this.formSubmitted && (n(this.currentForm).triggerHandler("invalid-form", [this]), this.formSubmitted = !1)
            },
            previousValue: function (t) {
                return n.data(t, "previousValue") || n.data(t, "previousValue", {
                    old: null,
                    valid: !0,
                    message: this.defaultMessage(t, "remote")
                })
            }
        },
        classRuleSettings: {
            required: {
                required: !0
            },
            email: {
                email: !0
            },
            url: {
                url: !0
            },
            date: {
                date: !0
            },
            dateISO: {
                dateISO: !0
            },
            dateDE: {
                dateDE: !0
            },
            number: {
                number: !0
            },
            numberDE: {
                numberDE: !0
            },
            digits: {
                digits: !0
            },
            creditcard: {
                creditcard: !0
            }
        },
        addClassRules: function (t, i) {
            t.constructor == String ? this.classRuleSettings[t] = i : n.extend(this.classRuleSettings, t)
        },
        classRules: function (t) {
            var r = {}, i = n(t).attr("class");
            return i && n.each(i.split(" "), function () {
                this in n.validator.classRuleSettings && n.extend(r, n.validator.classRuleSettings[this])
            }), r
        },
        attributeRules: function (t) {
            var i = {}, u = n(t),
                r;
            for (method in n.validator.methods) r = u.attr(method), r && (i[method] = r);
            return i.maxlength && /-1|2147483647|524288/.test(i.maxlength) && delete i.maxlength, i
        },
        metadataRules: function (t) {
            if (!n.metadata) return {};
            var i = n.data(t.form, "validator").settings.meta;
            return i ? n(t).metadata()[i] : n(t).metadata()
        },
        staticRules: function (t) {
            var r = {}, i = n.data(t.form, "validator");
            return i.settings.rules && (r = n.validator.normalizeRule(i.settings.rules[t.name]) || {}), r
        },
        normalizeRules: function (t, i) {
            return n.each(t, function (r, u) {
                if (u === !1) {
                    delete t[r];
                    return
                }
                if (u.param || u.depends) {
                    var f = !0;
                    switch (typeof u.depends) {
                    case "string":
                        f = !! n(u.depends, i.form).length;
                        break;
                    case "function":
                        f = u.depends.call(i, i)
                    }
                    f ? t[r] = u.param !== undefined ? u.param : !0 : delete t[r]
                }
            }), n.each(t, function (r, u) {
                t[r] = n.isFunction(u) ? u(i) : u
            }), n.each(["minlength", "maxlength", "min", "max"], function () {
                t[this] && (t[this] = Number(t[this]))
            }), n.each(["rangelength", "range"], function () {
                t[this] && (t[this] = [Number(t[this][0]), Number(t[this][1])])
            }), n.validator.autoCreateRanges && (t.min && t.max && (t.range = [t.min, t.max], delete t.min, delete t.max), t.minlength && t.maxlength && (t.rangelength = [t.minlength, t.maxlength], delete t.minlength, delete t.maxlength)), t.messages && delete t.messages, t
        },
        normalizeRule: function (t) {
            if (typeof t == "string") {
                var i = {};
                n.each(t.split(/\s/), function () {
                    i[this] = !0
                }), t = i
            }
            return t
        },
        addMethod: function (t, i, r) {
            n.validator.methods[t] = i, n.validator.messages[t] = r != undefined ? r : n.validator.messages[t], i.length < 3 && n.validator.addClassRules(t, n.validator.normalizeRule(t))
        },
        methods: {
            required: function (t, i, r) {
                if (!this.depend(r, i)) return "dependency-mismatch";
                switch (i.nodeName.toLowerCase()) {
                case "select":
                    var u = n(i).val();
                    return u && u.length > 0;
                case "input":
                    if (this.checkable(i)) return this.getLength(t, i) > 0;
                default:
                    return n.trim(t).length > 0
                }
            },
            remote: function (t, i, r) {
                var f, u, e;
                return this.optional(i) ? "dependency-mismatch" : (f = this.previousValue(i), this.settings.messages[i.name] || (this.settings.messages[i.name] = {}), f.originalMessage = this.settings.messages[i.name].remote, this.settings.messages[i.name].remote = f.message, r = typeof r == "string" && {
                    url: r
                } || r, f.old !== t) ? (f.old = t, u = this, this.startRequest(i), e = {}, e[i.name] = t, n.ajax(n.extend(!0, {
                    url: r,
                    mode: "abort",
                    port: "validate" + i.name,
                    dataType: "json",
                    data: e,
                    success: function (r) {
                        var o, h, s, e;
                        u.settings.messages[i.name].remote = f.originalMessage, o = r === !0, o ? (h = u.formSubmitted, u.prepareElement(i), u.formSubmitted = h, u.successList.push(i), u.showErrors()) : (s = {}, e = f.message = r || u.defaultMessage(i, "remote"), s[i.name] = n.isFunction(e) ? e(t) : e, u.showErrors(s)), f.valid = o, u.stopRequest(i, o)
                    }
                }, r)), "pending") : this.pending[i.name] ? "pending" : f.valid
            },
            minlength: function (t, i, r) {
                return this.optional(i) || this.getLength(n.trim(t), i) >= r
            },
            maxlength: function (t, i, r) {
                return this.optional(i) || this.getLength(n.trim(t), i) <= r
            },
            rangelength: function (t, i, r) {
                var u = this.getLength(n.trim(t), i);
                return this.optional(i) || u >= r[0] && u <= r[1]
            },
            min: function (n, t, i) {
                return this.optional(t) || n >= i
            },
            max: function (n, t, i) {
                return this.optional(t) || n <= i
            },
            range: function (n, t, i) {
                return this.optional(t) || n >= i[0] && n <= i[1]
            },
            email: function (n, t) {
                return this.optional(t) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(n)
            },
            url: function (n, t) {
                return this.optional(t) || /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(n)
            },
            date: function (n, t) {
                return this.optional(t) || !/Invalid|NaN/.test(new Date(n))
            },
            dateISO: function (n, t) {
                return this.optional(t) || /^\d{4}[\/-]\d{1,2}[\/-]\d{1,2}$/.test(n)
            },
            number: function (n, t) {
                return this.optional(t) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(n)
            },
            digits: function (n, t) {
                return this.optional(t) || /^\d+$/.test(n)
            },
            creditcard: function (n, t) {
                var i, f, r;
                if (this.optional(t)) return "dependency-mismatch";
                if (/[^0-9-]+/.test(n)) return !1;
                var e = 0,
                    r = 0,
                    u = !1;
                for (n = n.replace(/\D/g, ""), i = n.length - 1; i >= 0; i--) f = n.charAt(i), r = parseInt(f, 10), u && (r *= 2) > 9 && (r -= 9), e += r, u = !u;
                return e % 10 == 0
            },
            accept: function (n, t, i) {
                return i = typeof i == "string" ? i.replace(/,/g, "|") : "png|jpe?g|gif", this.optional(t) || n.match(new RegExp(".(" + i + ")$", "i"))
            },
            equalTo: function (t, i, r) {
                var u = n(r).unbind(".validate-equalTo").bind("blur.validate-equalTo", function () {
                    n(i).valid()
                });
                return t == u.val()
            }
        }
    }), n.format = n.validator.format
}(jQuery),
function (n) {
    var i = n.ajax,
        t = {};
    n.ajax = function (r) {
        r = n.extend(r, n.extend({}, n.ajaxSettings, r));
        var u = r.port;
        return r.mode == "abort" ? (t[u] && t[u].abort(), t[u] = i.apply(this, arguments)) : i.apply(this, arguments)
    }
}(jQuery),
function (n) {
    jQuery.event.special.focusin || jQuery.event.special.focusout || !document.addEventListener || n.each({
        focus: "focusin",
        blur: "focusout"
    }, function (t, i) {
        function r(t) {
            return t = n.event.fix(t), t.type = i, n.event.handle.call(this, t)
        }
        n.event.special[i] = {
            setup: function () {
                this.addEventListener(t, r, !0)
            },
            teardown: function () {
                this.removeEventListener(t, r, !0)
            },
            handler: function (t) {
                return arguments[0] = n.event.fix(t), arguments[0].type = i, n.event.handle.apply(this, arguments)
            }
        }
    }), n.extend(n.fn, {
        validateDelegate: function (t, i, r) {
            return this.bind(i, function (i) {
                var u = n(i.target);
                if (u.is(t)) return r.apply(u, arguments)
            })
        }
    })
}(jQuery), $(function () {
    _cart08.validate(), _cart08.OrderNotLogIn(), _cart08.OpenInfoCart(), _cart08.CloseQuestForm(), _cart08.LoginToCart(), _cart08.NotLoginToCart()
}), _cart08 = {
    validate: function () {
        $("#fromOrderNotLogIn").validate({
            rules: {
                txtNotLoginFullName: "required",
                txtNotLogInEmail: {
                    required: !0,
                    email: !0
                },
                txtNotLogInPhone: {
                    required: !0,
                    number: !0
                }
            },
            messages: {
                txtNotLoginFullName: "Nhập họ tên bạn",
                txtNotLogInEmail: {
                    required: "Nhập địa chỉ email",
                    email: "Email sai định dạng"
                },
                txtNotLogInPhone: {
                    required: "Nhập số điện thoại",
                    number: "Vui lòng nhập số"
                }
            }
        })
    },
    OrderNotLogIn: function () {
        $(".btnOrderNotLogIn a").unbind("click").click(function () {
            if ($("#fromOrderNotLogIn").valid()) return $.ajax({
                url: "/jquery/quickregist.php",
                type: "POST",
                dataType: "html",
                data: $("#fromOrderNotLogIn").serialize(),
                beforeSend: function () {},
                success: function (n) {
                    var i = n.split("*");
                    i[0] == "1" ? window.location.href = "/ThanhToan" : i[0] == "2" ? _cart08.ShowCartChoicePopup() : alert(i[1])
                },
                error: function () {},
                complete: function () {}
            }), !1
        })
    },
    OpenInfoCart: function () {
        $(".cart_title").unbind("click").click(function () {
            $(".info_box").hide("fast"), $(this).parent().find(".info_box").fadeIn("fast")
        })
    },
    ShowCartChoicePopup: function () {
        var t = $(window).height(),
            n = $(window).width();
        $(".member_quest").css("top", t / 2 - $(".member_quest").height() / 2), $(".member_quest").css("left", n / 2 - $(".member_quest").width() / 2), $("#mask").fadeIn(100), $(".member_quest").fadeIn(100), $(".email_q").html($("#txtNotLogInEmail").val())
    },
    CloseQuestForm: function () {
        $(".btnQuestclose").unbind("click").click(function () {
            $(".member_quest").fadeOut("fast"), $("#mask").fadeOut("fast"), $(".email_q").html("")
        })
    },
    LoginToCart: function () {
        $("#btnRdrLogin").unbind("click").click(function () {
            $(".member_quest").fadeOut("fast"), $("#mask").fadeOut("fast"), $(".email_q").html(""), $(".info_box").hide("fast"), $(".cart_login").find(".info_box").fadeIn("fast"), $("#tbxEmail").focus(), $("#tbxEmail").val($("#txtNotLogInEmail").val())
        })
    },
    NotLoginToCart: function () {
        $("#btnNTMCart").unbind("click").click(function () {
            $("#fromOrderNotLogIn").valid() && ($("#fromOrderNotLogIn").attr("action", "/ThanhToan/OrderNotLogIn"), $("#fromOrderNotLogIn").submit())
        })
    }
}, $(function () {
    _add.init()
}), _add = {
    a_DangNhap_click: function () {
        $(".loginbtn a").unbind("click").click(function () {
            LogInBuy()
        })
    },
    a_DangKy_click: function () {
        $(".regist_btn a").click(function () {
            RegistBuy()
        })
    },
    EnterLoginBuy: function () {
        $("#tbxEmail,#tbxPass").keypress(function (n) {
            n.which == 13 && LogInBuy()
        })
    },
    EnterRegistBuy: function () {
        $("#tbxFullName,#tbxEmailRegist,#tbxPassRegist,#tbxRePassRegist,#tbxAddress,#tbxPhone").keypress(function (n) {
            n.which == 13 && RegistBuy()
        })
    },
    Other_script: function () {
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
        })
    },
    init: function () {
        _add.a_DangNhap_click(), _add.a_DangKy_click(), _add.EnterLoginBuy(), _add.EnterRegistBuy(), _add.Other_script()
    }
},
function (n) {
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
}(jQuery), this.imagePreview = function () {
    xOffset = 10, yOffset = 20, $("a.preview").hover(function (n) {
        this.t = this.title, this.title = "";
        var t = this.t != "" ? "<br/>" + this.t : "";
        $("body").append("<div id='preview'><span class='preview_title'><span class='title_prrr'>" + t + "</span></span><span class='preview_img'><img src='" + this.href + "' alt='Xdeal Preview Deal Option' /></span></div>"), $("#preview").css("top", n.pageY - xOffset + "px").css("left", n.pageX + yOffset + "px").css("z-index", 9999).fadeIn("fast")
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
})