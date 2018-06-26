(function($) { 
    $('.back-button').click(function(e) {
        e.preventDefault();
    	if($('body').hasClass('single')){
            window.history.back(-1);
        }
    });
})(jQuery);
