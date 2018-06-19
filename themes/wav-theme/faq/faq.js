(function($) { 
    $('.faq-item .question').click(function() {
    	var parent = $(this).parent();
    	parent.children("div").slideToggle();
    });
})(jQuery);


