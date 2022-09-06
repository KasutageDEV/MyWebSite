//jquery-click-scroll
//by syamsul'isul' Arifin

var sectionArray = [1, 2, 3, 4, 5, 6];

$.each(sectionArray, function(index, value){
          
     $(document).scroll(function(){
         var offsetSection = $('#' + 'section_' + value).offset().top;
         var docScroll = $(document).scrollTop();
         var docScroll1 = docScroll + 1;
         
        
         if ( docScroll1 >= offsetSection ){
             $('.navigation__link').removeClass('active');
             $('.navigation__link:link').addClass('inactive');  
             $('.navigation__link').eq(index).addClass('active');
             $('.navigation__link:link').eq(index).removeClass('inactive');
         }
         
     });
    
    $('.navigation__link').eq(index).click(function(e){
        var offsetClick = $('#' + 'section_' + value).offset().top;
        e.preventDefault();
        $('html, body').animate({
            'scrollTop':offsetClick
        }, 300)
        
        
    });
 
    
});

$(document).ready(function(){
    $('.navigation__link:link').addClass('inactive');    
    $('.navigation__link').eq(0).addClass('active');
    $('.navigation__link:link').eq(0).removeClass('inactive');
    


});