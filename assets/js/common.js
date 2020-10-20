app.common = {
    mainInit: () => {
        let text = 'ES6 is working';

        $('.nav-icon1').click(function(e){

            e.preventDefault();
            e.stopPropagation();

            $(this).toggleClass('open');
            $('.topMenu').toggleClass('opened');
            // $('.desc-wrapper, .footer-sign').toggleClass('hidden');

            $(document).on('click', function closeMenu (){
                if($('.topMenu').hasClass('opened')){
                    $('.topMenu').removeClass('opened');
                    $('.menuToggle').removeClass('open');
                    // $('.desc-wrapper, .footer-sign').removeClass('hidden');

                } else {
                    $(document).on('click', closeMenu);
                    // $('.nav-el').removeClass('active');
                }
            });
        });

        $('.topMenu ul li a').each(function() {
            if (this.href == window.location.href) {
                $(this).toggleClass("checked");
            }
        });

        $('.nav-el').on('click', function(e) {
            $('.nav-el').removeClass('active');
            $(this).addClass('active');
        });

        $('.text-carousel').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: true,
            dots: true
        });
    }
}

function checkScroll() {
    if( $(window).scrollTop() > 20 ) { //abuse 0 == false :)
        if( !$('.header-scroll').hasClass('scrolled') ) {
            $('.header-scroll').addClass('scrolled');
        }
    } else {
        if( $('.header-scroll').hasClass('scrolled') ) {
            $('.header-scroll').removeClass('scrolled');
        }
    }
}

$(function () {
    $(document).ready(() => {
        app.common.mainInit();
    })
});
