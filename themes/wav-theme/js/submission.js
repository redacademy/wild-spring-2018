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

      
        if($('body').hasClass('tribe_community_edit') && ($('.tribe-community-notice-update'))){
           

            $('.tribe-community-notice').empty();
            $('.event-submission-faq').css('display','none');
            $('.my-events-header').css('display','none')

            var successMessage='';
            successMessage+= '<section class="submission-success-message">';
            successMessage+= '<h1 class="submission-header">Create Your Event</h1>';
            successMessage+= '<div class="submission-thank-you">'
            successMessage+= '<img src="./../../../wp-content/themes/wav-theme/assets/images/Checkmark.svg"/>'
            successMessage+= '<h3> Thank you for submitting your event! </h3>'
            successMessage+= '<p> We will upload your event to our calendar as soon as we can.</p> '
            successMessage+= ' <a class="blue-button button" href="../../../events");">Browse upcoming events</a>'
            successMessage+= '<a class="yellow-button button" href="../../../get-involved");">Become a volunteer</a>'
            successMessage+= '</div>'
            successMessage+= '</section>'

            $('.tribe-community-notice').append(successMessage);
              
            $('.tribe-community-notice-update').addClass('submission-success-desktop');
            $('.tribe-events-after-html').addClass('submission-success-desktop');
        
        }

        // tribe_community_edit + tribe-community-notice-update is true
        // then load stuff and tribe-community-events display none;

        

})(jQuery);



    