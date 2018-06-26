(function($) { 
    $('.faq-item .question').click(function() {
      var parent = $(this).parent();
      parent.children("div").slideToggle();
    });
})(jQuery);


jQuery( document ).ready(function( $ ) {
  
    var question = $('.accordion .question');
    var answer = $('.accordion .answer');
    
   $(question).click(function(){
      $(answer).slideToggle();
      $(this).next().slideToggle('fast');
    });
     
  });