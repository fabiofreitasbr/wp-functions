$(document).ready(function () {
    $(".title-links").on('click', function () {
        $(".fast-links").toggleClass('active-nav', '');
        $(".title-links").toggleClass('fastlinks-active', '');
        $(".title-links i").toggleClass('fa-angle-double-down', 'fa-angle-double-up');
    });
    var posicaoLinksRapidos = function () {
        var cabecalho = $("header").height();
        var menu = $(".main-menu").height();
        var header = $(".header-page").height();
        var alturaMinima = cabecalho + menu + header;
        var posicaoTela = $(window).scrollTop();
        if (posicaoTela < alturaMinima) {
            var posicaoAtual = alturaMinima + 50;
        }
        else {
            var posicaoAtual = posicaoTela + 50;
        }
            $(".fast-links").css({'top': posicaoAtual + 'px'});;
    }
    posicaoLinksRapidos();
    $(window).on('scroll', function () {
        posicaoLinksRapidos();
    });
    $(window).on('resize', function () {
        posicaoLinksRapidos();
    });
});