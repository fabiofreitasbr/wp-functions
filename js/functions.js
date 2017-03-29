$(document).ready(function () {
    $('#bloco-slide').unslider({
        animation: 'horizontal',
        autoplay: true,
        arrow: true,
        arrows: {
            prev: '<div class="container"><div class="slide-arrow arrow-left"><img src="' + themeAdress + '/images/arrow-left.png" alt=""></div></div>',
            next: '<div class="container"><div class="slide-arrow arrow-right"><img src="' + themeAdress + '/images/arrow-right.png" alt=""></div></div>'
        },
        speed: 1 * 1000,
        delay: 5 * 1000,
        infinite: true
    });
});