/* global require */
/* global window */
/* global site_data */
/* jshint -W097 */

"use strict";
var $ = require("jquery");

(function() {
    var $chevron = $("[data-chevron]"),
        speed = 1000,
        $doc = $("html, body"),
        $map = $("#map"),
        $welcome = $("#welcome"),
        $document = $(document);

    $document.on("ready", function() {
        $doc.animate(
            {
                scrollTop: $welcome.offset().top
            },
            speed,
            "easeInOutQuart"
        );
    });

    $.extend($.easing, {
        def: "easeInOutQuart",
        easeInOutQuart: function(x, t, b, c, d) {
            if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
            return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
        }
    });

    // On buton click
    $chevron.on("click", scrollToElem);

    // Scroll function
    function scrollToElem(e) {
        e.preventDefault();
        history.pushState(null, null, "");
        $doc.animate(
            {
                scrollTop: $map.offset().top
            },
            speed,
            "easeInOutQuart"
        );
    }
})();
