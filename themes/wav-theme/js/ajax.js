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

    //Widnow Pop State //when you click arrows
    $(window).on('popstate', function(){
        window.location.replace(lastPage);
    })
    })(jQuery);