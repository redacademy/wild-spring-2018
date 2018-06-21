(function($) {
// // 1st carousel, main
// $('.carousel-main').flickity({
//   asNavFor: '.carousel-nav',
// });
// // 2nd carousel, navigation
// $('.carousel-nav').flickity({
//   asNavFor: '.carousel-main',
//   contain: true,
//   pageDots: false
// });



// external js: flickity.pkgd.js

var $carousel = $('.carousel').flickity({
  wrapAround: true
});

var $carouselNav = $('.carousel-nav');
var $carouselNavCells = $carouselNav.find('.carousel-cell');

$carouselNav.on( 'click', '.carousel-cell', function( event ) {
  var index = $( event.currentTarget ).index();
  $carousel.flickity( 'select', index );
});

var flkty = $carousel.data('flickity');
var navCellHeight = $carouselNavCells.height();
var navHeight = $carouselNav.height();

$carousel.on( 'select.flickity', function() {
  // set selected nav cell
  $carouselNav.find('.is-nav-selected').removeClass('is-nav-selected');
  var $selected = $carouselNavCells.eq( flkty.selectedIndex )
    .addClass('is-nav-selected');
  // scroll nav
  var scrollY = $selected.position().top +
    $carouselNav.scrollTop() - ( navHeight + navCellHeight ) / 2;
  $carouselNav.animate({
    scrollTop: scrollY
  });
});


})(jQuery);

