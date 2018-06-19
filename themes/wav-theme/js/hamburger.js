(function($) {
    var $menuToggle = $('.menu-toggle');
    var $mainNavigation = $('.main-navigation');
    var $hamburgerMenu = $('.hamburger');
    var $siteheader = $('.site-header');
  
    $menuToggle.on('click', function(evt) {
      evt.preventDefault();
      $mainNavigation.toggleClass('toggled');
      $hamburgerMenu.toggleClass('is-active');
      $siteheader.addClass('head2');
    });
  
  })(jQuery);
  