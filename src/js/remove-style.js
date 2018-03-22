/* global require */
/* global window */
/* global site_data */
/* jshint -W097 */

"use-strict";

/**
 * Remove style
 * @author Errol Sidelsky
 */

// debounce function - https://davidwalsh.name/javascript-debounce-function
function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

var $markerPos = $(".map-item"),
    $window = $(window);

function init() {
    windowWidth();
}

function windowWidth() {
    width = $window.width();

    if (width < 768) {
        $markerPos.removeAttr("style");
    }
}

// window resize
$window.on(
    "resize orientationchange",
    debounce(function() {
        windowWidth();
        //location.reload();
    }, 500)
);

init();
