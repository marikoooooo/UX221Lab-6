var magcity = magcity || {};
function magcityDomReady(e) {
    if ("function" == typeof e) return "interactive" === document.readyState || "complete" === document.readyState ? e() : void document.addEventListener("DOMContentLoaded", e, !1);
}
function magcityToggleAttribute(e, t, o, n) {
    void 0 === o && (o = !0), void 0 === n && (n = !1), e.getAttribute(t) !== o ? e.setAttribute(t, o) : e.setAttribute(t, n);
}
(magcity.createEvent = function (e) {
    var t;
    return "function" == typeof window.Event ? (t = new Event(e)) : (t = document.createEvent("Event")).initEvent(e, !0, !1), t;
}),
    (magcity.coverModals = {
        init: function () {
            document.querySelector(".cover-modal") && (this.onToggle(), this.closeOnEscape(), this.hideAndShowModals(), this.keepFocusInModal());
        },
        onToggle: function () {
            document.querySelectorAll(".cover-modal").forEach(function (e) {
                e.addEventListener("toggled", function (e) {
                    e = e.target;
                    var t = document.body;
                    e.classList.contains("active")
                        ? t.classList.add("showing-modal")
                        : (t.classList.remove("showing-modal"),
                          t.classList.add("hiding-modal"),
                          setTimeout(function () {
                              t.classList.remove("hiding-modal");
                          }, 500));
                });
            });
        },
        closeOnEscape: function () {
            document.addEventListener(
                "keydown",
                function (e) {
                    27 === e.keyCode &&
                        (e.preventDefault(),
                        document.querySelectorAll(".cover-modal.active").forEach(
                            function (e) {
                                this.untoggleModal(e);
                            }.bind(this)
                        ));
                }.bind(this)
            );
        },
        hideAndShowModals: function () {
            var e = document,
                t = window,
                o = e.querySelectorAll(".cover-modal"),
                n = e.documentElement.style,
                a = e.querySelector("#wpadminbar");
            function i(e) {
                var o,
                    n = t.pageYOffset;
                return a ? ((o = n + a.getBoundingClientRect().height), e ? -o : o) : 0 === n ? 0 : -n;
            }
            function l() {
                return { "overflow-y": t.innerHeight > e.documentElement.getBoundingClientRect().height ? "hidden" : "scroll", position: "fixed", width: "100%", top: i(!0) + "px", left: 0 };
            }
            o.forEach(function (o) {
                o.addEventListener("toggle-target-before-inactive", function (c) {
                    var s = l(),
                        r = t.pageYOffset,
                        d = Math.abs(i()) - r + "px",
                        g = t.matchMedia("(max-width: 600px)");
                    c.target === o &&
                        (Object.keys(s).forEach(function (e) {
                            n.setProperty(e, s[e]);
                        }),
                        (t.magcity.scrolled = parseInt(s.top, 10)),
                        a && (e.body.style.setProperty("padding-top", d), g.matches && (r >= i() ? o.style.setProperty("top", 0) : o.style.setProperty("top", i() - r + "px"))),
                        o.classList.add("show-modal"));
                }),
                    o.addEventListener("toggle-target-after-inactive", function (c) {
                        c.target === o &&
                            setTimeout(function () {
                                var c = magcity.toggles.clickedEl;
                                o.classList.remove("show-modal"),
                                    Object.keys(l()).forEach(function (e) {
                                        n.removeProperty(e);
                                    }),
                                    a && (e.body.style.removeProperty("padding-top"), o.style.removeProperty("top")),
                                    !1 !== c && (c.focus(), (c = !1)),
                                    t.scrollTo(0, Math.abs(t.magcity.scrolled + i())),
                                    (t.magcity.scrolled = 0);
                            }, 500);
                    });
            });
        },
        keepFocusInModal: function () {
            var e = document;
            e.addEventListener("keydown", function (t) {
                var o,
                    n,
                    a,
                    i,
                    l,
                    c,
                    s = magcity.toggles.clickedEl;
                s &&
                    e.body.classList.contains("showing-modal") &&
                    ((a = s.dataset.toggleTarget),
                    (c = "input, a, button"),
                    (i = e.querySelector(a)),
                    (o = i.querySelectorAll(c)),
                    (o = Array.prototype.slice.call(o)),
                    ".menu-modal" === a &&
                        ((n = (n = window.matchMedia("(min-width: 768px)").matches) ? ".expanded-menu" : ".mobile-menu"),
                        (o = o.filter(function (e) {
                            return null !== e.closest(n) && null !== e.offsetParent;
                        })).unshift(e.querySelector(".close-nav-toggle")),
                        (l = e.querySelector(".menu-bottom > nav")) &&
                            l.querySelectorAll(c).forEach(function (e) {
                                o.push(e);
                            })),
                    ".main-menu-modal" === a &&
                        ((n = (n = window.matchMedia("(min-width: 1025px)").matches) ? ".expanded-menu" : ".mobile-menu"),
                        (o = o.filter(function (e) {
                            return null !== e.closest(n) && null !== e.offsetParent;
                        })).unshift(e.querySelector(".close-main-nav-toggle")),
                        (l = e.querySelector(".menu-bottom > nav")) &&
                            l.querySelectorAll(c).forEach(function (e) {
                                o.push(e);
                            })),
                    (s = o[o.length - 1]),
                    (i = o[0]),
                    (a = e.activeElement),
                    (l = 9 === t.keyCode),
                    !(c = t.shiftKey) && l && s === a && (t.preventDefault(), i.focus()),
                    c && l && i === a && (t.preventDefault(), s.focus()));
            });
        },
    }),
    (magcity.toggles = {
        clickedEl: !1,
        init: function () {
            this.toggle();
        },
        performToggle: function (e, t) {
            var o,
                n,
                a = this,
                i = document,
                l = e,
                c = l.dataset.toggleTarget,
                s = "active";
            i.querySelectorAll(".show-modal").length || (a.clickedEl = i.activeElement),
                (o = "next" === c ? l.nextSibling : i.querySelector(c)).classList.contains(s) ? o.dispatchEvent(magcity.createEvent("toggle-target-before-active")) : o.dispatchEvent(magcity.createEvent("toggle-target-before-inactive")),
                (n = l.dataset.classToToggle || s),
                (e = 0),
                o.classList.contains("cover-modal") && (e = 10),
                setTimeout(function () {
                    var e,
                        r = o.classList.contains("sub-menu") ? l.closest(".menu-item").querySelector(".sub-menu") : o,
                        d = l.dataset.toggleDuration;
                    "slidetoggle" !== l.dataset.toggleType || t || "0" === d ? r.classList.toggle(n) : magcityMenuToggle(r, d),
                        ("next" === c || o.classList.contains("sub-menu") ? l : i.querySelector('*[data-toggle-target="' + c + '"]')).classList.toggle(s),
                        magcityToggleAttribute(l, "aria-expanded", "true", "false"),
                        a.clickedEl && -1 !== l.getAttribute("class").indexOf("close-") && magcityToggleAttribute(a.clickedEl, "aria-expanded", "true", "false"),
                        l.dataset.toggleBodyClass && i.body.classList.toggle(l.dataset.toggleBodyClass),
                        l.dataset.setFocus && (e = i.querySelector(l.dataset.setFocus)) && (o.classList.contains(s) ? e.focus() : e.blur()),
                        o.dispatchEvent(magcity.createEvent("toggled")),
                        o.classList.contains(s) ? o.dispatchEvent(magcity.createEvent("toggle-target-after-active")) : o.dispatchEvent(magcity.createEvent("toggle-target-after-inactive"));
                }, e);
        },
        toggle: function () {
            var e = this;
            document.querySelectorAll("*[data-toggle-target]").forEach(function (t) {
                t.addEventListener("click", function (o) {
                    o.preventDefault(), e.performToggle(t);
                });
            });
        },
    }),
    magcityDomReady(function () {
        magcity.toggles.init(), magcity.coverModals.init();
    });
