(function ($) {

    // Main Menu mobile work
    Drupal.behaviors.mainMenuMobileToggler = {
        attach: function (context, settings) {
            $('.js-menu-toggler').click(function () {
                $(this).next('.menu').toggleClass('open');
            })
        }
    };


}(jQuery));