//this is a js file for ajax request for events, tribe_events

(function ($){
  console.log('Hello World')
       /**
     * Ajax-based front-end post submissions
     */

     $eventForm = $('#event-submission-form');

     var allTags =[];
     

     if($eventForm.length) {
       getTags();
     }

     
  /**
   * Get Tags
   */
  function getTags() {
    $.ajax({
      method: 'get',
      url: api_vars.root_url + 'wp/v2/tags'
    })
      .done(function(data) {
        // get all tags and push
        $.each(data, function(index, value) {
          allTags.push({
            id: value.id,
            name: value.name
          });
        });
        console.log(data);
      })
      .fail(function(err) {
        console.log(err);
      });
  }

  /**
   * Check Tags
   * @param {*} tags
   */

 
  
    // var userSubmittedTags=[];
    // userSubmittedTags = $('#event-tags').val();
    // .val().replace(/\s+/g, '').split(',')
    // var eventType = $('input[name="eventType"]:checked').val();

    // userSubmittedTags1.push(eventType)
    // console.log(userSubmittedTags2, "user submited tags2");
    // console.log(userSubmittedTags1)
    
    // startTime= $('#event_startDate').val() + ' ' +  $('#event_startTime').val();
    // endTime = $('#event_endDate').val() + ' ' +  $('#event_endTime').val();

    // description = $('#event-description').val() + ' &nbsp; User suggested tags: ' + userSubmittedTags1;
    // console.log(description);

    // console.log(tags,'whatami');

      startTime= $('#event_startDate').val() + ' ' +  $('#event_startTime').val();
      endTime = $('#event_endDate').val() + ' ' +  $('#event_endTime').val();
  
      description = $('#event-description').val() + ' &nbsp; User suggested tags: ' + userSubmittedTags1;
      console.log(description);
  
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
          },
        {
          organizer:'testtest'
        }],
          venue: {
            venue: $('#event_location').val()
            // venue: 'Vancouver'
          },
    
          
          start_date: startTime,
          end_date: endTime,
      
        // NTS: Can't post tags. Added to description for moderator to add manually
          description: description,
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
  
        
        // start_date: startTime,
        // end_date: endTime,
    
      // NTS: Can't post tags. Added to description for moderator to add manually
        // description: description,
        // tags: document.querySelector('input[name="eventType"]:checked').value + $('#event-tags').val(),
        // _qod_quote_source_url: $('#event-ticket').val(),

        status: 'pending'
    
  
     
    });
      //Widnow Pop State //when you click arrows
      $(window).on('popstate', function(){
          window.location.replace(lastPage);
      })
  
      })(jQuery);