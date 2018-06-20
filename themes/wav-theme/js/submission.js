(function($) {
    $('.wpcf7-form').on('submit', function() {

        setTimeout(function(){
            if( $('.wpcf7-form').hasClass('invalid')){
            } 
            else {
                $('.wpcf7-form').slideUp();
                $('.form-wrapper').prepend('Success ! Thank you for submission');
            }

        }, 1000);
        


    })

})(jQuery);



    