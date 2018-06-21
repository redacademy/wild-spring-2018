(function($){ //tells wordpress that we are taking '$' and it means 'jQuery

//Function to add dark-banner once user has scrolled past hero-banner
var bannerHeight= $('.banner').height();

if($('body').hasClass('home') || $('body').hasClass('page-template-contact')||$('body').hasClass('page-template-involved')){

$(window).scroll(function(){
    var yPos=$(window).scrollTop();

    if (yPos<bannerHeight){
        $('.site-header').addClass('light-header').removeClass('dark-header');
        $('.logo-wav2').css('display','none');
        $('.logo-wav1').css('display','block');
        $('.menu-main-menu-container a').css('color', 'white');
        $('.light-header').css('background-color', 'transparent');
        $('.menu a:hover').css('border-bottom', '2px solid #fff');
    }
    
    else{
        $('.site-header').removeClass('light-header').addClass('dark-header');
        $('.logo-wav2').css('display','block');
        $('.logo-wav1').css('display','none');
        $('.menu-main-menu-container a').css('color', 'black');
        $('.dark-header').css('background-color', 'hsla(0,0%,100%,.85)');
        $('.menu a:hover').css('border-bottom', '2px solid black');
    }
});

}

//this will default load the dark-banner on pages that are not 'about.php' or 'front-page'.php
else{
    $('.site-header').removeClass('light-header').addClass('dark-header');
    $('.dark-logo').css('display','block');
    $('.logo').css('display','none');
    $('.offset-placeholder').addClass('header-offset');
}
})(jQuery);

