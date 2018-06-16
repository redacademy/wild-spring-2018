//this is a js file for ajax request for events, tribe_events

(function ($){
    //    $('body').append('hello'); 

    var lastPage = '';
    $('#get-category').on('click', function(e){
      e.preventDefault();
  
      lastPage = document.URL;
  
      $.ajax({
        method:'get',
        url:'http://localhost:8888/wav/wp-json/tribe/events/v1/events',
        cache:false,
  
      }).done(function(data){
        //   history.pushState(null, null, data[0].slug);
        console.log(data);

        //   $('#get-category').html(data);

      }).fail(function(){
  
        return 'There was an error';
  
      });
  
    });

     /**
   * Ajax-based front-end post submissions
   */

   $('#event-submission-form').submit(function(event){
    event.preventDefault();

    

    $.ajax({
      method: 'POST',
      url: api_vars.root_url + 'tribe/events/v1/events/',
      data: {
        organizer: $('#event-author-firstName').val() + $('#event-author-lastName').val(),
        // _qod_quote_source: $('#event-author-phoneNumber').val(),
        // _qod_quote_source_url: $('#event-author-email').val(),
        // _qod_quote_source_url: $('#event-name').val(),
        start_date: $('#event-startDate').val() + $('#event-startTime').val(),
        end_date: $('#event-endDate').val() + $('#event-endTime').val(),
        address: $('#event-location').val(),
        description: $('#event-description').val(),
        tags: document.querySelector('input[name="eventType"]:checked').value + $('#event-tags').val(),
        // _qod_quote_source_url: $('#event-ticket').val(),

        status: 'pending'
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader( 'X-WP-Nonce', api_vars.nonce );
     }
    })
    .done(function(){
      $('#event-submission-form').slideUp('slow');
      $('.event-submission-wrapper').append('<p>'+api_vars.success+'</p>');
    })
    .fail(function(){
      $('#event-submission-form').append('<p>'+api_vars.failure+'</p>');
    })
   });


    //Widnow Pop State //when you click arrows
    $(window).on('popstate', function(){
        window.location.replace(lastPage);
    })
    })(jQuery);