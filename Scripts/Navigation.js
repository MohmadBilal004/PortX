$(window).scroll(function(event){
    if($(this).scrollTop() > 1){
        $('header').addClass('shrink');
    }else{
        $('header').removeClass('shrink');
    }
});