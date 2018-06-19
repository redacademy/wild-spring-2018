(function($) {
    $('.wpcf7-form ').on('submit', function(event) {
        event.preventDefault();

        $('.wpcf7-form ').slideUp();
        $('.form-wrapper').append('Success ! Thank you for submission');


    })

    
})(jQuery);



    