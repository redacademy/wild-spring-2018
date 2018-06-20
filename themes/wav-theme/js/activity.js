(function($) {
// 1st carousel, main
$('.carousel-main').flickity({
});
// 2nd carousel, navigation
$('.carousel-nav').flickity({
  asNavFor: '.carousel-main',
  contain: true,
  pageDots: false
});

})(jQuery);

