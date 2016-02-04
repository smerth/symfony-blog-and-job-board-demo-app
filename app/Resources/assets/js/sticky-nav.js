$(document).ready(function(){
    $(window).bind('scroll', function() {
        var navHeight = $("#bigbox").height();
        ($(window).scrollTop() > navHeight) ? $('#nav-header-sticky').addClass('go-to-top') : $('#nav-header-sticky').removeClass('go-to-top');
        ($(window).scrollTop() > navHeight) ? $('.navbar-brand').addClass('show') : $('.navbar-brand').removeClass('show');
    });
});
