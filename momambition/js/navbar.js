jQuery(document).ready(function( $ ) {
  if ($(window).width() > 992) {
    $(window).scroll(function(){  
       if ($(this).scrollTop() > 40) {
          $('#navbar-small').addClass("fixed-top");
          // add padding top to show content behind navbar
          $('body').css('padding-top', $('#navbar-small').outerHeight() + 'px');
        } else {
          $('#navbar-small').removeClass("fixed-top");
           // remove padding top from body
          $('body').css('padding-top', '0');
        }   
    });
  } else {
    $(window).scroll(function(){  
      if ($(this).scrollTop() > 40) {
         $('#navbar-large').addClass("fixed-top");
         // add padding top to show content behind navbar
         $('body').css('padding-top', $('#navbar-large').outerHeight() + 'px');
       } else {
         $('#navbar-large').removeClass("fixed-top");
          // remove padding top from body
         $('body').css('padding-top', '0');
       }   
   });
  }
});