(function($) { 
    $('.faq-item .question').click(function() {
      var parent = $(this).parent();
      parent.children("div").slideToggle();
    });
})(jQuery);


jQuery( document ).ready(function( $ ) {
  
  $(document).ready(function($) {
    $("#accordion").hide('.accordion-content')
    $('#accordion').find('.accordion-toggle').click(function(){

      //Expand or collapse this panel
      $(this).next().slideToggle('fast');

      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });
  });
  
  });