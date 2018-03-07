/* global require */
/* global window */
/* global site_data */
/* jshint -W097 */
"use-strict";

// (function() {
//     const pop = document.getElementsByClassName("map-popup");
//     const marker = document.getElementsByClassName("marker");
//     const mapItem = document.getElementsByClassName("map-item");

//     for (i = 0; i < pop.length; i++) {
//         pop[i].addEventListener("click", function(e) {
//             e.stopPropagation();
//         });
//     }

//     for (i = 0; i < marker.length; i++) {
//         marker[i].addEventListener("click", function(e) {
//             e.preventDefault();
//             e.stopPropagation();

//             this.parentElement.classList.toggle("open");

//             for (i = 0; i < mapItem.length; i++) {
//                 // if (mapItem[i].classList.contains("open")) {
//                 //     mapItem[i].classList.remove("open");
//                 // }
//                 mapItem[i].classList.remove("open");
//             }
//         });
//     }
// })();

(function($) {
    const pop = $(".map-popup");

    pop.click(function(e) {
        e.stopPropagation();
    });

    $("a.marker").click(function(e) {
        e.preventDefault();
        e.stopPropagation();

        $(this)
            .parent()
            .toggleClass("open");

        $(this)
            .next(".map-popup")
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
