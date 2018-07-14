$( document ).ready(function() {"use strict";

    /* 
      Intializing Navigation Effect
    ========================================================================== */
      $('ul.navi-level-1 li').on('mouseenter', function(){
            $(this).children('ul.navi-level-2').addClass("open-navi-2 animated fadeInUp");
        });
      $('ul.navi-level-1 li').on('mouseleave', function(){
           $(this).children('ul.navi-level-2').removeClass("open-navi-2 animated fadeInUp");
        });
      $('ul.navi-level-2 li').on('mouseenter', function(){
          $(this).addClass("active");
          $(this).children('ul.navi-level-3').addClass("open-navi-3 animated fadeInUp");
      });
      $('ul.navi-level-2 li').on('mouseleave', function(){
         $(this).children('ul.navi-level-3').removeClass("open-navi-3 animated fadeInUp");
                 $(this).removeClass("active");
      });
  /* 
     Home Search
     ========================================================================== */
    $('.btn-search-navi').on ('click',function()
      {
          $('.search-popup').toggleClass("open-search-input animated fadeInUp");
          $('.btn-search-navi .fa-search').toggleClass("fa-remove");
          $('.btn-search-navi').toggleClass("active");
          return false;
    });
  
  

  /* 
   Backtotop
   ========================================================================== */
    var offset = 450;
    var duration = 500;   
    $(window).on('scroll', function(){
         if ($(this).scrollTop() > offset) {
                $('#to-the-top').fadeIn(duration);
            } else {
                $('#to-the-top').fadeOut(duration);
            }
    });

    $('#to-the-top').on('click', function(event){
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    });

    /* 
       tooltip
       ========================================================================== */
    
      $('[data-toggle="tooltip"]').tooltip()
    

    
    


});

  /*Preload*/
  (function($) { "use strict";
      Royal_Preloader.config({
          mode:           'logo',
          logo:           'images/Logo-on-dark.png',
          timeout:       1,
          showInfo:       false,
          opacity:        1,
          background:     ['#0a2c4e']
      });
  })(jQuery);