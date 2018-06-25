(function ($){
    $('ul.tabs li').click(function(){
        var tabID = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');
        $('.tab-content').hide();

        $(this).addClass('curent');
        $('#'+tabID).addClass('current');
        $('#'+tabID).show();
    });
    var hidden = false;
    function onResize() {
        var win = $(window);
        if (win.width() < 820) {
            if (!hidden) {
                $('#tab-1').show();
                $('#tab-2').hide();
                $('#tab-3').hide();
                hidden = true;
            }
        } else {
            if (hidden) {
                $('#tab-1').show();
                $('#tab-2').show();
                $('#tab-3').show();
                hidden = false;
            }
        }
    }
    $(window).resize(onResize);
    onResize();
})(jQuery);