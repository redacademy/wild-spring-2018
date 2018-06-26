(function($) { 
    if($('body').hasClass('single')){
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
    })


(jQuery);
