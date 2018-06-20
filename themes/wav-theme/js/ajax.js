(function($) {

//JS for Front-end Submission of Events. Original code by J.B, instructor @RED.
  /**
   * DOM Selectors
   */
  var $eventForm = $('#event-submission-form');

  var allTags = [];
  var filteredTags = [];
  var tagIds = [];

  /**
   * Check if post form exists before running scripts
   */
  if ($eventForm.length) {
    getTags();
    submitEventBtn();
  }

  /**
   * Get Tags
   */
  function getTags() {
    $.ajax({
      method: 'get',
      url: api_vars.root_url + 'wp/v2/tags?per_page=99'
    })
      .done(function(data) {
        // get all tags and push
        $.each(data, function(index, value) {
          allTags.push({
            id: value.id,
            name: value.name
          });
          console.log(value, 'values')
        });
        console.log(allTags, 'wpv2');
      })
      .fail(function(err) {
        console.log(err);
      });
  }

  /**
   * Check Tags
   * @param {*} tags
   */
  function checkTags(tags) {
    tags = tags.toString();
    tags = tags.trim();
    var tag = tags.split(',');

    // search filter tags
    $.each(tag, function(index, value) {
      
      var trimTag = tag[index].trim().toLowerCase();

      console.log(trimTag)
      var tagFilter = allTags.filter(function(obj) {
        console.log(obj.name.toLowerCase(), trimTag, 'matching??');
        return obj.name.toLowerCase().indexOf(trimTag) > -1;
      });
      if (!tagFilter.length) {
        createNewTag(trimTag);
      }
      filteredTags.push(tagFilter);
      
    });

    console.log(filteredTags);

    $.each(filteredTags, function(index, value) {
      if (value[0] != 'undefined' && value[0] != null) {
        tagIds.push(value[0].id);
       
      }
    });

    console.log(tagIds, 'these are tags');
  }

  /**
   * Post Content, page-post-tags.php
   */
  function submitEventBtn() {
    $('#event-submission-form').on('submit', function(evt) {
      evt.preventDefault();

      var eventType = $('input[name="eventType"]:checked').val();
      var eventTitle = $('#event-name').val();
      var eventTags = $('#event-tags').val() + ' ,' + eventType;
      var eventDescription = $('#event-description').val();
      var minVal = 5;

      checkTags(eventTags);

      // timeout to help avoid posting before creating a new tag
      setTimeout(function() {
        if (eventDescription.length >= minVal) {
          if (!eventTags.length) {
            eventTags = 1;
          }
          postAjax(eventTitle, eventDescription, tagIds);
        } else {
          $('#event-submission-form').append('<p>More characters please</p>');
        }
      }, 7000);
    });

    /**
     * Post Content
     * @param {*} eventTitle
     * @param {*} eventDescription
     * @param {*} tagIds
     */
    function postAjax(eventTitle, eventDescription, tagIds) {
     console.log(tagIds, 'preAJAX');
     var authorName = $('#event-author-firstName').val() + ' ' + $('#event-author-lastName').val();
     var startTime= $('#event_startDate').val() + ' ' +  $('#event_startTime').val();
     var endTime = $('#event_endDate').val() + ' ' +  $('#event_endTime').val();
 
     var description = $('#event-description').val();
      var phoneNumber = $('#event-author-phoneNumber').val()
      var email = $('#event-author-email').val();
      var venue = $('#event_location').val();

      var data = {
        title: eventTitle,
        content: eventDescription,
        tags: tagIds,
        start_date: startTime,
        end_date: endTime,
        organizer: [{
          organizer: authorName,
          phone: phoneNumber,
          email: email
        }],
        venue: {
          venue: venue
        },
        description: description,
        status: 'pending'

      };

      $.ajax({
        method: 'post',
        url: api_vars.root_url + 'tribe/events/v1/events',
        data: data,
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-WP-Nonce', api_vars.nonce);
        }
      })
        .done(function() {
          $('#event-submission-form').slideUp();
          $('#event-submission-form').after(
            '<p>Thanks for your event submission! Stay tuned while a moderator adds your event! </p>'
          );
        })
        .fail(function(err) {
          // alert(api_vars.failure);
          console.log(err);
        });
    }
  }

  /**
   * Create New Tag
   * @param {*} tag
   */
  function createNewTag(tag) {
    $.ajax({
      method: 'post',
      url: api_vars.root_url + 'wp/v2/tags',
      data: {
        name: tag
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', api_vars.nonce);
      }
    })
      .done(function(response) {
        tagIds.push(response.id);
        console.log(response.id,'whtthis');
      })
      .fail(function(err) {
        // alert(api_vars.failure);
        console.log(err);
        console.log(tag);
      });
  }
})(jQuery);




//this is a js file for ajax request for events, tribe_events

// (function ($){
//   console.log('Hello World')
//        /**
//      * Ajax-based front-end post submissions
//      */
  
//      $('#event-submission-form').submit(function(event){
//       event.preventDefault();
      
//       var authorName;
//       authorName = $('#event-author-firstName').val() + ' ' + $('#event-author-lastName').val();
    
//       // var userSubmittedTags=[];
//       userSubmittedTags1 = $('#event-tags').val().replace(/\s+/g, '').split(',')
//       eventType = $('input[name="eventType"]:checked').val();
  
//       userSubmittedTags1.push(eventType)
//       // console.log(userSubmittedTags2, "user submited tags2");
//       console.log(userSubmittedTags1, eventType)
      
//       startTime= $('#event_startDate').val() + ' ' +  $('#event_startTime').val();
//       endTime = $('#event_endDate').val() + ' ' +  $('#event_endTime').val();
  
//       description = $('#event-description').val() + ' &nbsp; User suggested tags: ' + userSubmittedTags1;
//       console.log(description);
  
//       $.ajax({
//         method: 'POST',
//         url: api_vars.root_url+'tribe/events/v1/events',
//         // url: functions.php,
//         data: {
      
//           title: $('#event-name').val(),
//           start_date: '2018-06-20 11:30:00',
//           end_date: '2018-06-21 12:00:00',
//           organizer: [{
//             organizer: authorName,
//             phone: $('#event-author-phoneNumber').val(),
//             email: $('#event-author-email').val()
//           },
//         {
//           organizer:'testtest'
//         }],
//           venue: {
//             venue: $('#event_location').val()
//             // venue: 'Vancouver'
//           },
    
          
//           start_date: startTime,
//           end_date: endTime,
      
//         // NTS: Can't post tags. Added to description for moderator to add manually
//           description: description,
//           // tags: document.querySelector('input[name="eventType"]:checked').value + $('#event-tags').val(),
//           // _qod_quote_source_url: $('#event-ticket').val(),
  
//           status: 'pending'
      
//         },
//         beforeSend: function(xhr) {
//           xhr.setRequestHeader( 'X-WP-Nonce', api_vars.nonce );
//        }
//       })
//       .done(function(){
//         $('#event-submission-form').slideUp('slow');
//         $('.event-submission-wrapper').append('<p>'+api_vars.success+'</p>');
  
//       //   $.ajax({
//       //     method: 'POST',
//       //     url: api_vars.root_url+'tribe/events/v1/tags',
//       //     // url: functions.php,
//       //     data: {
//       //       name: 'benjamin',
//       //       name: 'jane'
//       //     },
//       //     beforeSend: function(xhr) {
//       //       xhr.setRequestHeader( 'X-WP-Nonce', api_vars.nonce );
//       //    }
//       //   })
//       //   .done(function(){
//       //     console.log('tags added');
//       //   })
//       //   .fail(function(){
//       //     console.log('tags failjor');
//       //   });
//       })
//       .fail(function(){
//         $('#event-submission-form').append('<p>'+api_vars.failure+'</p>');
//       })
    
  
     
//     });
//       //Widnow Pop State //when you click arrows
//       $(window).on('popstate', function(){
//           window.location.replace(lastPage);
//       })
  
      // })(jQuery);