<<<<<<< HEAD
// (function(){ 
//     jQuery("#wptuts-accordion").accordion({
//     collapsible: true,
//     active: false
//     }); 
//     })();
=======
(function($) { 
    $('.faq-item .question').click(function() {
    	var parent = $(this).parent();
    	parent.children("div").slideToggle();
    });
})(jQuery);

>>>>>>> 519a99c62c7f1cc5a6331e99a7b6e153bf431aa0
