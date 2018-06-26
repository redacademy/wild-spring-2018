(function($) { 
    var width = $('body').width();
    if($('body').hasClass('single') && width < 1060){
        $('.logo a').css('display','none'),
        $('.back-button').css('display', 'block'),
        $('.main-navigation ul').css('top', '3rem');
    }
        $('.back-button').click(function(e) {
            e.preventDefault();
            if($('body').hasClass('single')){
                window.history.back(-1);
            }
        });
  })(jQuery);