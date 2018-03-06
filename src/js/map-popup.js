/* global require */
/* global window */
/* global site_data */
/* jshint -W097 */
"use-strict";

(function($) {
    const pop = $(".map-popup");

    pop.click(function(e) {
        e.stopPropagation();
    });

    $("a.marker").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this)
            .next(".map-popup")
            .toggleClass("open");

        $(this)
            .parent()
            .toggleClass("open");

        $(this)
            .parent()
            .siblings()
            .children(".map-popup")
            .removeClass("open");

        $("a.marker")
            .not(this)
            .parent()
            .removeClass("open");

        //$(this)
        //.parent()
        //.removeClass("open");
    });

    $(document).click(function() {
        pop.removeClass("open");
        $("a.marker")
            .parent()
            .removeClass("open");
    });

    pop.each(function() {
        var w = $(window).outerWidth(),
            edge = Math.round($(this).offset().left + $(this).outerWidth());
        if (w < edge) {
            $(this).addClass("edge");
        }
    });
})(jQuery);
