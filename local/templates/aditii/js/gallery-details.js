/* Для работы должны быть подключены slick и fancybox*/

$(document).ready(function(){
    $('.det-photo-main-slider').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        initialSlide: 1,
        arrows: true,
        asNavFor: '.det-photo-thumb-slider',
    });

    $('.det-photo-thumb-slider').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        focusOnSelect: false,
        asNavFor: '.det-photo-main-slider',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    swipe: true
                }
            }
        ]
    });

    $('[data-fancybox^="det-photo-"]').fancybox();
});