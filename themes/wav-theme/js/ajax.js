//this is a js file for ajax request for events, tribe_events

(function ($){
console.log('Hello World')
     /**
   * Ajax-based front-end post submissions
   */

   $('#event-submission-form').submit(function(event){
    event.preventDefault();
    
    var authorName;
    authorName = $('#event-author-firstName').val() + ' ' + $('#event-author-lastName').val();
  
    // var userSubmittedTags=[];
    userSubmittedTags = $('#event-tags').val().replace(/\s+/g, '').split(',')
    eventType = $('input[name="eventType"]:checked').val();

    eventType = eventType.push(userSubmittedTags)
    console.log(eventType)
    

    $.ajax({
      method: 'POST',
      url: api_vars.root_url+'tribe/events/v1/events',
      // url: functions.php,
      data: {
    
        title: $('#event-name').val(),
        start_date: '2018-06-20 11:30:00',
        end_date: '2018-06-21 12:00:00',
        organizer: [{
          organizer: authorName,
          phone: $('#event-author-phoneNumber').val(),
          email: $('#event-author-email').val()
        }],
        venue: {
          venue: $('#event_location').val()
          // venue: 'Vancouver'
        },
        tags: [{

        }],
        
        // start_date: $('#event-startDate').val() + $('#event-startTime').val(),
        // end_date: $('#event-endDate').val() + $('#event-endTime').val(),
    
        description: $('#event-description').val(),
        // tags: document.querySelector('input[name="eventType"]:checked').value + $('#event-tags').val(),
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