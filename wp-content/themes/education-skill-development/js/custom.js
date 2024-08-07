function education_skill_development_navigation_open() {
    jQuery(".side_gb_nav").addClass('show');
}
function education_skill_development_navigation_close() {
    jQuery(".side_gb_nav").removeClass('show');
}

jQuery(function($){
    $('.gb_toggle').click(function () {
        education_skill_development_keyboard_navigation_loop($('.side_gb_nav'));
    });
});

jQuery(document).ready(function($) {
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});

jQuery('document').ready(function(){
  var owl = jQuery('#home_slider .owl-carousel');
    owl.owlCarousel({
    margin:0,
    nav: false,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: true,
    dots:false,
    rtl:true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

    window.addEventListener('load', (event) => {
    jQuery(".loading").delay(2000).fadeOut("slow");
});