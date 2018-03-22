/* global require */
/* global window */
/* global site_data */
/* jshint -W097 */
"use-strict";

// (function() {
//     const pop = document.getElementsByClassName("map-popup");
//     const marker = document.getElementsByClassName("marker");
//     const mapItem = document.getElementsByClassName("map-item");

//     function hasClass(element, className) {
//         return (
//             element.className &&
//             new RegExp("(^|\\s)" + className + "(\\s|$)").test(
//                 element.className
//             )
//         );
//     }

//     for (i = 0; i < pop.length; i++) {
//         pop[i].addEventListener("click", function(e) {
//             e.stopPropagation();
//         });

//         document.addEventListener("click", function() {
//             pop[i].hasClass("open", function() {
//                 console.log("has class");
//             });
//             // if (hasClass(pop, "open")) {
//             //     console.log("has class");
//             // } else {
//             //     console.log("No class");
//             // }
//         });
//     }

//     for (i = 0; i < marker.length; i++) {
//         marker[i].addEventListener("click", function(e) {
//             e.preventDefault();
//             e.stopPropagation();

//             for (i = 0; i < mapItem.length; i++) {
//                 //mapItem[i].classList.remove("open");
//                 //this.parentElement.classList.toggle("open");
//             }

//             this.parentElement.classList.toggle("open");

//             // for (i = 0; i < mapItem.length; i++) {
//             //     if (mapItem[i].classList.contains("open")) {
//             //         mapItem[i].classList.remove("open");
//             //     }
//             //     mapItem[i].classList.remove("open");
//             // }
//         });
//     }
// })();

(function($) {
    var pop = $(".map-popup");
    var $document = $(document);
    var $close = $(".close");

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

    $close.on("click", function(e) {
        pop.removeClass("open");
        $("a.marker")
            .parent()
            .removeClass("open");

        e.preventDefault();
    });

    $document.on("click", function() {
        pop.removeClass("open");
        $("a.marker")
            .parent()
            .removeClass("open");
    });

    // $close.pop.each(function() {
    //     var w = $(window).outerWidth(),
    //         edge = Math.round($(this).offset().left + $(this).outerWidth());
    //     if (w < edge) {
    //         $(this).addClass("edge");
    //     }
    // });
})(jQuery);
