(function($) {
    $('.wpcf7-form').on('submit', function(event) {
        event.preventDefault();

        setTimeout(function(){
            if( $('.wpcf7-form').hasClass('invalid')){
            } 
            else {
                $('.wpcf7-form').slideUp();
                $('.entry-title').after(
                    '<img src="./../../wav/wp-content/themes/wav-theme/assets/images/Checkmark.svg"/>',
                    '<h3> Thank you! </h3>',
                    '<p> A representative will be in contact with you shortly. ',
                    '<a href="../events");">Browse Events</a>'
                );
            }

        }, 1000);
        


    })

})(jQuery);



    