$(window).scroll(function () {
    var st = $(this).scrollTop();
    $(".page-heading, .site-heading").css({
       "transform": "translate(0%, "+ st / 6 + "%)"
    });
});
