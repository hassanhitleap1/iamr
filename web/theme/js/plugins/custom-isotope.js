$(window).load(function(){
    "use strict";

    
            var $container = $('.cases-warp');
            $container.isotope({
                filter: '*',

                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false

                }
            });
            
            $('.casesFilter a').click(function(){
                $('.casesFilter .current').removeClass('current');
                $(this).addClass('current');
         
                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                 });
                 return false;
            }); 
            // End isotope Home 1

});