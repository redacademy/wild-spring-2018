(function($){ //tells wordpress that we are taking '$' and it means 'jQuery

//Function to add dark-banner once user has scrolled past hero-banner
var bannerHeight= $('.banner').height();

if($('body').hasClass('home') || $('body').hasClass('page-template-contact')||$('body').hasClass('page-template-involved')){

$(window).scroll(function(){
    var yPos=$(window).scrollTop();

    if (yPos<bannerHeight, width>1060){
        $('.site-header').addClass('light-header').removeClass('dark-header');
        $('.logo-wav2').css('display','none');
        $('.logo-wav1').css('display','block');
        $('.light-header').css('background-color', 'transparent');
        
    }
    
    else{
        $('.site-header').removeClass('light-header').addClass('dark-header');
        $('.logo-wav2').css('display','block');
        $('.logo-wav1').css('display','none');
        $('.dark-header').css('background-color', 'hsla(0,0%,100%,.85)');
   
    }
});

}

//this will default load the dark-banner on pages that are not 'about.php' or 'front-page'.php
else{
    $('.site-header').removeClass('light-header').addClass('dark-header');
    $('.logo-wav2').css('display','block');
    $('.logo-wav1').css('display','none');
    $('.dark-header').css('background-color', 'hsla(0,0%,100%,.85)');
  
}
})(jQuery);

