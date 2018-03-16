/* global require */
/* global window */
/* global site_data */
/* jshint -W097 */

/**
 * Background paralax
 * @author Errol Sidelsky
 */

(function($) {
    function homeParallax() {
        var top = $(this).scrollTop(),
            $titleGroup = $("[data-welcome-message]"),
            $welcomeBackground = $("#welcome"),
            $powerLogo = $(".power-logo"),
            $chev = $("[data-chevron]");

        $powerLogo.css({
            opacity: 0
        });

        $titleGroup.css({
            opacity: 1 - top / 600,
            transform: "translateY(" + top / 8 + "px)"
        });

        $welcomeBackground.css({
            "background-position": "center " + top / 2 + "px"
            //height: 100 - top / 100 + "vh"
        });

        $chev.css({
            opacity: 1 - top / 600
        });

        $powerLogo.css({
            opacity: 0 + top / 800
        });
    }

    //Scroll events
    function isMobile() {
        return (
            navigator.userAgent.match(/Android/i) ||
            navigator.userAgent.match(/webOS/i) ||
            navigator.userAgent.match(/iPhone/i) ||
            navigator.userAgent.match(/iPod/i) ||
            navigator.userAgent.match(/iPad/i) ||
            navigator.userAgent.match(/BlackBerry/)
        );
    }

    if (!isMobile() && $(window).width() > 768) {
        homeParallax();
    }

    //Scroll events
    $(window).scroll(function() {
        if (!isMobile() && $(window).width() > 768) {
            homeParallax();
        }
    });
})(jQuery);
