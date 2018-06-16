
(function ($){


        $('ul.tabs li').click(function(){
            var tabID = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');

            $(this).addClass('curent');
            $('#'+tabID).addClass('current');
        })


})(jQuery);