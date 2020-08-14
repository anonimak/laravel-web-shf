jQuery(document).ready(function () {

    $('.carousel').on('slide.bs.carousel', function (event) {
        var height = $(event.relatedTarget).height();
        var $innerCarousel = $(event.target).find('.carousel-inner');
        $innerCarousel.animate({
            height: height
        });
    });

    AOS.init();
    // {
    //   disable: function () {
    //     var maxWidth = 1200;
    //     return window.innerWidth < maxWidth;
    //   }
    // }

    $(window).scroll(function () {
        // $('.topnav').toggleClass('bg-light fixed-top py-0', $(this).scrollTop() > 50);

        if ($(this).scrollTop() > 50) {
            $('.topnav-brand')
                .removeClass('d-none')
            $('.topnav')
                .addClass('bg-light fixed-top')
                .removeClass('bg-secondary')
            $('.navbar-bottom-nav')
                .removeClass('mr-auto')
                .addClass('ml-auto')
        } else {
            $('.topnav-brand')
                .addClass('d-none')
            $('.topnav')
                .removeClass('bg-light fixed-top')
                .addClass('bg-secondary')
            $('.navbar-bottom-nav')
                .removeClass('ml-auto')
                .addClass('mr-auto')
        }
    });

    $('#modal_newsletter').on('show.bs.modal', function () {
        $('.downloadzip')[0].click();
    });

});
