var fi = {}; 
$(function(){
        var fi = n = window.fi;
        fi.floatUI = {
            MousePosition: function(n) {
                n = n || window.event;
                var i = n.pageX || n.clientX + document.body.scrollLeft,
                t = n.pageY || n.clientY + document.body.scrollTop;
                return {
                    positionX: i,
                    positionY: t
                }
            },
            ModeWindow: function() {
            function i() {
                function h(n) {
                    var t = n.ID,
                    i;
                    return t ? $("#" + t).length > 0 ? $("#" + t) : (i = n.Parent == null || $(n.Parent).length == 0 ? $("body") : $(n.Parent), i.append($("<div>").attr("id", n.ID).css(n.CSS)), $("#" + t)) : null
                }
                function f(n, t, i) {
                    return i = typeof i == "boolean" ? i: !1,
                    n.isSet = n.obj.html() == "" ? !1 : !0,
                    n && n.isSet && !i ? n: (i && (n.obj.html(""), n.obj.css(t.CSS)), n.obj.append($("<div>").attr("id", "w_uuid_" + t.ID).css(t.TitleCSS).html(t.Title)), n.obj.append($("<div>").attr("id", "content_uuid_" + t.ID).css(t.ContentCSS).html(t.Content)), n.obj.append($("<div>").css(t.StatusbarCSS).html(t.Statusbar)), n.isSet = !0, n.ID = t.ID, n.UUID = "w_uuid_" + t.ID, n.Option = t, n.Backover = c(n), n.Frameover = l(n), n.CloseIcon = r(n), n.Drag = s(n), n.IsShow = !1, n)
                }
                function r(n) {
                    var t, r, i;
                    if (n.Option.CloseIcon == null) return;
                    return t = n.Option.CloseIcon,
                    t.ImageSrc == null ? void 0 : (r = t.ImageSrc == "default" ? "static/images/main/close.gif": t.ImageSrc, i = "5px", $("#" + n.UUID).append($("<div>").attr("id", n.UUID + "_closeicon").css({
                        width: t.Width + "px",
                        height: t.Height + "px",
                        position: "absolute",
                        right: i,
                        top: i,
                        cursor: "pointer",
                        background: "url(" + r + ") no-repeat 0 0"
                    }).hover(function() {
                        $(this).css({
                            "background-position": "0 -42"
                        })
                    },
                    function() {
                        $(this).css({
                            "background-position": "0 0"
                        })
                    }).bind("click",
                    function() {
                        u(n, undefined, t.func)
                    })), $("#" + n.UUID + "_closeicon"))
                }
                function c(n) {
                    if (n.Option.Backover == !1) return null;
                    if ($("#MW_BACKOVER").length == 0) {
                        $("body").append($("<div>").attr("id", "MW_BACKOVER").css({
                            "background-color": "#ddd",
                            position: "fixed",
                            top: "0",
                            left: "0",
                            width: "100%",
                            height: "100%",
                            display: "none",
                            opacity: .3
                        }));
                        var i = !!indow.ActiveXObject,
                        t = i && !window.XMLHttpRequest;
                        t && $("#MW_BACKOVER").css({
                            position: "absolute"
                        })
                    }
                    return {
                        obj: $("#MW_BACKOVER"),
                        Show: function() {
                            var i = parseInt( + new Date / 1e3),
                            t = $(window).width() > $(document).width() ? $(window).width() : $(document).width(),
                            n = $(window).height() > $(document).height() ? $(window).height() : $(document).height();
                            $("#MW_BACKOVER").css({
                                width: t + "px",
                                height: n + "px",
                                "z-index": i,
                                display: "block"
                            })
                        },
                        Hide: function() {
                            $("#MW_BACKOVER").hide()
                        }
                    }
                }
                function l(n) {
                    return n.Option.Frameover == !1 ? null: ($("#MW_FRAMEOVER").length == 0 && $("body").append($("<div>").attr("id", "MW_FRAMEOVER").css({
                        "background-color": "#fff",
                        position: "absolute",
                        display: "none",
                        top: "0",
                        left: "0",
                        overflow: "hidden"
                    }).html('<iframe border="0" style="border:0;margin:0;"></iframe>')), {
                        obj: $("#MW_FRAMEOVER"),
                        Show: function() {
                            var f = 1,
                            t = n.obj,
                            e = t.outerWidth(),
                            u = t.outerHeight(),
                            i = t.offset().top,
                            r = t.offset().left;
                            $("#MW_FRAMEOVER").css({
                                width: e + "px",
                                height: u + "px",
                                "z-index": f,
                                top: i + "px",
                                left: r + "px",
                                display: "block"
                            })
                        },
                        Hide: function() {
                            $("#MW_FRAMEOVER").hide()
                        }
                    })
                }
                function e(n, t, i, r) {
                    var u = $.extend({},
                    o, t),
                    f,
                    l;
                    n.Backover != null && n.Backover.obj.css("display") == "none" && n.Backover.Show();
                    var s = "auto",
                    e = "auto",
                    c = "auto",
                    h = "auto";
                    if (u.reshow) return u.showType == "fade" ? n.obj.fadeIn("slow") : n.obj.show(),
                    n;
                    f = n.obj;
                    switch (u.position) {
                    case "center":
                        s = $(window).height() / 2 - f.height() / 2 + $(document).scrollTop() + u.relativeTop,
                        e = $(document).width() / 2 - f.width() / 2 + $(document).scrollLeft() + u.relativeLeft;
                        break;
                    case "abscenter":
                        s = $(document).height() / 2 - f.height() / 2 + $(document).scrollTop() + u.relativeTop,
                        e = $(document).width() / 2 - f.width() / 2 + $(document).scrollLeft() + u.relativeLeft;
                        break;
                    case "left-top-corner":
                        s = 0,
                        e = 0;
                        break;
                    case "left-bottom-corner":
                        e = 0,
                        h = 0;
                        break;
                    case "right-top-corner":
                        c = 0,
                        s = 0;
                        break;
                    case "right-bottom-corner":
                        c = 0,
                        h = 0;
                        break;
                    case "bindto":
                        u.bindObject.length != 0 ? (s = u.bindObject.offset().top + u.relativeTop, e = u.bindObject.offset().left + u.relativeLeft) : (s = $(window).height() / 2 - f.height() / 2 + $(document).scrollTop() + u.relativeTop, e = $(document).width() / 2 - f.width() / 2 + $(document).scrollLeft() + u.relativeLeft);
                        break;
                    default:
                        s = $(window).height() / 2 - f.height() / 2 + $(document).scrollTop() + u.relativeTop,
                        e = $(document).width() / 2 - f.width() / 2 + $(document).scrollLeft() + u.relativeLeft
                    }
                    return l = parseInt( + new Date / 1e3 + 1),
                    f.css({
                        top: s == "auto" ? s: s + "px",
                        left: e == "auto" ? e: e + "px",
                        right: c == "auto" ? c: c + "px",
                        bottom: h == "auto" ? h: h + "px",
                        "z-index": l
                    }),
                    u.showType == "fade" ? f.fadeIn("slow", r) : f.show(r),
                    n.Frameover != null && n.Frameover.obj.css("display") == "none" && n.Frameover.Show(),
                    n.IsShow = !0,
                    n
                }
                function u(n, t, r) {
                    n.obj.hide(0, r),
                    n.Frameover != null && n.Frameover.Hide(),
                    n.IsShow = !1;
                    if (i.length > 0) {
                        for (var u = 0; u < i.length; u++) if (n != i[u] && i[u].IsShow && i[u].Backover != null) return n; (typeof t == "undefined" || t && typeof t == "boolean" && t == !1) && n.Backover != null && n.Backover.Hide()
                    }
                    return n
                }
                function s(t) {
                    if (!t.Option.Drag) return ! 1;
                    var u = $("#" + t.UUID),
                    r = window._IS_WINDOW_MOVING || !1,
                    i = t.Option.Parent == null || $(t.Option.Parent).length == 0 ? $("body") : $(t.Option.Parent);

                    return t.obj.bind("mousedown", function() {
                        var i = parseInt( + new Date / 1e3) + 1,
                        t = $(this).position().left + "px",
                        n = $(this).position().top + "px";
                        $(this).css({
                            "z-index": i,
                            left: t,
                            top: n,
                            right: "auto",
                            bottom: "auto"
                        })
                    }),
                    u.bind("mousedown", function(u) {
                        if (r) return ! 1;
                        r = !0;
                        var o = n.floatUI.MousePosition(u),
                        s = o.positionX,
                        h = o.positionY,
                        f = t.obj.position().top,
                        e = t.obj.position().left,
                        c = parseInt( + new Date / 1e3);
                        t.obj.css({
                            opacity: .5
                        }),
                        $(document).mousemove(function(u) {
                            var l, a;
                            if (!r) return ! 1;
                            window.getSelection ? window.getSelection().removeAllRanges() : document.selection.empty();
                            var y = n.floatUI.MousePosition(u),
                            w = y.positionX,
                            b = y.positionY,
                            v = w - s,
                            p = b - h,
                            o = f + p <= i.offset().top && !t.Option.ContainOut ? i.offset().top: f + p,
                            c = e + v <= i.offset().left && !t.Option.ContainOut ? i.offset().left: e + v;
                            return t.Option.ContainOut || (t.Option.Parent == null || $(t.Option.Parent).length == 0 ? (l = $(window).width() < $(document).width() ? $(window).width() : $(document).width(), a = $(window).height() < $(document).height() ? $(window).height() : $(document).height()) : (l = i.outerWidth(), a = i.outerHeight()), o = o >= a - t.obj.outerHeight() + i.offset().top ? a - t.obj.outerHeight() + i.offset().top: o, c = c >= l - t.obj.outerWidth() + i.offset().left ? l - t.obj.outerWidth() + i.offset().left: c),
                            t.obj.css({
                                left: c + "px",
                                top: o + "px"
                        }),

                            !1
                        }),
                        $(document).mouseup(function() {
                            return r = !1,
                            t.obj.css({
                                opacity: 1
                            }),
                            $(this).unbind("mousemove").unbind("mouseup"),
                            !1
                        })
                    }),
                    t
                }
                var t = {
                    ID: null,
                    Title: "ModeWindow - MacroX",
                    Content: "Text in content",
                    Statusbar: null,
                    Parent: null,
                    CloseIcon: {
                        ImageSrc: "default",
                        Width: 16,
                        Height: 16,
                        func: null
                    },
                    Backover: !0,
                    Frameover: !1,
                    Drag: !1,
                    ContainOut: !1,
                    CSS: {
                        border: "1px solid #ddd",
                        display: "none",
                        padding: "1px",
                        position: "absolute",
                        "background-color": "#fff"
                    },
                    TitleCSS: {
                        "text-indent": "20px",
                        "font-size": "14px",
                        color: "#fff",
                        "background-color": "#aaa",
                        "line-height": "22px",
                        height: "22px",
                        position: "relative"
                    },
                    ContentCSS: {
                        padding: "16px 20px",
                        "line-height": "18px"
                    },
                    StatusbarCSS: {}
                },
                o = {
                    reshow: !1,
                    showType: "fade",
                    position: "center",
                    relativeTop: 0,
                    relativeLeft: 0,
                    bindObject: null
                },
                i = [];
                return function(n) {
                    var o = null,
                    s = $.extend({},
                    t, n),
                    c;
                    s.CSS = $.extend({},
                    t.CSS, n.CSS),
                    s.TitleCSS = $.extend({},
                    t.TitleCSS, n.TitleCSS),
                    s.ContentCSS = $.extend({},
                    t.ContentCSS, n.ContentCSS),
                    s.CloseIcon = $.extend({},
                    t.CloseIcon, n.CloseIcon),
                    c = null,
                    o = h(s);
                    if (!o) {
                        throw new Error("Error : [fi.floatUI.ModeWindow] Option.ID is undefined");
                        return ! 1
                    }
                    o = {
                        obj: o,
                        isSet: !1
                    },
                    o = f(o, s, !1);
                    if (!o.isSet) {
                        throw new Error("Error : [fi.floatUI.ModeWindow] Window Object is unconstructed");
                        return ! 1
                    }
                    return i.push(o),
                    {
                        GetObject: function() {
                            return o
                        },
                        Show: function(n, t) {
                            typeof t != "function" && (t = null),
                            o = e(o, n, c, t),
                            c == null && (c = n)
                        },
                        Close: function(n, t) {
                            typeof t != "function" && (t = null),
                            o = u(o, n, t)
                        },
                        Reload: function(n, i) {
                            var r = $.extend({},
                            t, n);
                            r.CSS = $.extend({},
                            t.CSS, n.CSS),
                            r.TitleCSS = $.extend({},
                            t.TitleCSS, n.TitleCSS),
                            r.ContentCSS = $.extend({},
                            t.ContentCSS, n.ContentCSS),
                            o = f(o, r, !0),
                            o = this.Show(i)
                        },
                        SetContent: function(n) {
                            var t = "content_uuid_" + o.ID;
                            $("#" + t).length == 1 && $("#" + t).html(n)
                        },
                        SetTitle: function(n) {
                            var t = "w_uuid_" + o.ID;
                            $("#" + t).length == 1 && ($("#" + t).html(n), r(o))
                        }
                    }
                }
            }
            var t = null;
            return function(n) {
                return t == null && (t = i()),
                t(n);
            }
        } ()
    }
});
