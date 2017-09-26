$(document).ready(function(){
    $('.parallax').parallax();
    $('.dropdown-button').dropdown({hover: true});
    $('.materialboxed').materialbox();
    $('.button-collapse').sideNav({
        menuWidth: 300,
        closeOnClick: true,
        draggable: true
    });
});

var $root = $('html, body');
$('a.hsbc-scroll').click(function() {
    var href = $.attr(this, 'href');
    // TODO: Fix scrolling offset on devices with small navbar
    $root.animate({
        scrollTop: $(href).offset().top - 88
    }, 500, function () {
        window.location.hash = href;
    });
    return false;
});