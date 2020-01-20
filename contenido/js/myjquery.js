$(document).ready(function() {
    
    /*$('.text_desc2').mouseover(function(){
            $(this).addClass('text_desc2__acitve').animate(2000);
    })
    $('.text_desc2').mouseout(function(){
            $(this).removeClass('text_desc2__acitve').animate(2000);
    })*/
    $('.top__cerrar').click(function(){
        $('.contenedor__llamamos').remove();
    })
    
    $('.acordeon__titulo').click(function(){
        let padre = $('.acordeon');
        let t = $(this);
        let tP = t.next();
        let oP = $('.acordeon__titulo').parent().siblings().find('p');
        
        tP.slideToggle();
        oP.slideUp();
    });
    
})