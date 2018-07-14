 $(document).ready(function(){
  "use strict";
        $("#services-h1").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [979,3],
                itemsTablet       : [768,2],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });
        var owlServices1 = $("#services-h1");
        // Custom Navigation Events

        $("body").on("click",".next-services-h1",function(event){
          owlServices1.trigger("owl.next");
        });
        $("body").on("click",".prev-services-h1",function(event){
          owlServices1.trigger("owl.prev");
        });


        /* Offer h2 */
            $("#offer-h2").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [979,3],
                itemsTablet       : [768,2],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });
            var owlOfferh2 = $("#offer-h2");
            // Custom Navigation Events

            $("body").on("click",".next-offer-h2",function(event){
              owlOfferh2.trigger("owl.next");
            });
            $("body").on("click",".prev-offer-h2",function(event){
              owlOfferh2.trigger("owl.prev");
            });

        /* Partner h2 */
            $("#partner-h2").owlCarousel({
           
                autoPlay: true, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [979,3],
                itemsTablet       : [768,2],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });
            var owlPartner2 = $("#partner-h2");
            // Custom Navigation Events

            $("body").on("click",".next-partner-h2",function(event){
              owlPartner2.trigger("owl.next");
            });
            $("body").on("click",".prev-partner-h2",function(event){
              owlPartner2.trigger("owl.prev");
            });


        /* Testimonial h6 */
            $("#testimonial-h6").owlCarousel({
           
                autoPlay: true, //Set AutoPlay to 3 seconds
                items : 1,
                itemsDesktop      : [1199,1],
                itemsDesktopSmall     : [979,1],
                itemsTablet       : [768,1],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
                transitionStyle : "fade"
            });
            var owlTestimonial = $("#testimonial-h6");
            // Custom Navigation Events

            $("body").on("click",".next-testimonial-h6",function(event){
              owlTestimonial.trigger("owl.next");
            });
            $("body").on("click",".prev-testimonial-h6",function(event){
              owlTestimonial.trigger("owl.prev");
            });

        /* Tweets footer */
            var myVar2 = setInterval(myTimer2, 3000);

            function myTimer2() {
                $(function() {
                    $("#tweets-footer ul").owlCarousel({
               
                    autoPlay: false, //Set AutoPlay to 3 seconds
                    items : 1,
                    itemsDesktop      : [1199,1],
                    itemsDesktopSmall     : [979,1],
                    itemsTablet       : [768,1],
                    itemsMobile       : [479,1],
                    pagination:true,
                    navigation:false,
                    transitionStyle : "fade"
                    });
                });
            }


        /* What We Offer Home 7 */
                var sync1 = $("#sync3");
                var sync2 = $("#sync4");
                sync1.owlCarousel({
                    singleItem : true,
                    items : 1,
                    itemsDesktop      : [1199,1],
                    itemsDesktopSmall     : [979,1],
                    itemsTablet       : [768,1],
                    itemsMobile       : [479,1],
                    slideSpeed : 1000,
                    navigation: false,
                    pagination:true,
                    
                    afterAction : syncPosition,
                    responsiveRefreshRate : 200,
                    afterInit : progressBar,
                    afterMove : moved,
                    startDragging : pauseOnDragging,
                    
                });
              
                var time = 5; // time in seconds

                var $progressBar,
                  $bar, 
                  $elem, 
                  isPause, 
                  tick,
                  percentTime;

             
                //Init progressBar where elem is $("#owl-demo")
                function progressBar(elem){
                  $elem = elem;
                  //build progress bar elements
                  buildProgressBar();
                  //start counting
                  start();
                }
             
                //create div#progressBar and div#bar then prepend to $("#owl-demo")
                function buildProgressBar(){
                  $progressBar = $("<div>",{
                    id:"progressBar"
                  });
                  $bar = $("<div>",{
                    id:"bar"
                  });
                  $progressBar.append($bar).prependTo($elem);
                }
             
                function start() {
                  //reset timer
                  percentTime = 0;
                  isPause = false;
                  //run interval every 0.01 second
                  tick = setInterval(interval, 10);
                };
             
                function interval() {
                  if(isPause === false){
                    percentTime += 1 / time;
                    $bar.css({
                       width: percentTime+"%"
                     });
                    //if percentTime is equal or greater than 100
                    if(percentTime >= 100){
                      //slide to next item 
                      $elem.trigger('owl.next')
                    }
                  }
                }
             
                //pause while dragging 
                function pauseOnDragging(){
                  isPause = true;
                }
             
                //moved callback
                function moved(){
                  //clear interval
                  clearTimeout(tick);
                  //start again
                  start();
                }

                sync2.owlCarousel({
                    items : 1,
                    itemsDesktop      : [1199,1],
                    itemsDesktopSmall     : [979,1],
                    itemsTablet       : [768,1],
                    itemsMobile       : [479,1],
                    pagination:true,

                    responsiveRefreshRate : 100,
                    afterInit : function(el){
                      el.find(".owl-item").eq(0).addClass("synced");
                    }
                });
             
                function syncPosition(el){
                    var current = this.currentItem;
                    $("#sync4")
                      .find(".owl-item")
                      .removeClass("synced")
                      .eq(current)
                      .addClass("synced")
                    if($("#sync4").data("owlCarousel") !== undefined){
                      center(current)
                    }
                }
             
                $("#sync4").on("click", ".owl-item", function(e){
                    e.preventDefault();
                    var number = $(this).data("owlItem");
                    sync1.trigger("owl.goTo",number);
                });
             
                function center(number){
                        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                        var num = number;
                        var found = false;
                        for(var i in sync2visible){
                          if(num === sync2visible[i]){
                            var found = true;
                          }
                        }
                     
                        if(found===false){
                          if(num>sync2visible[sync2visible.length-1]){
                            sync2.trigger("owl.goTo", num - sync2visible.length+2)
                          }else{
                            if(num - 1 === -1){
                              num = 0;
                            }
                            sync2.trigger("owl.goTo", num);
                          }
                        } else if(num === sync2visible[sync2visible.length-1]){
                          sync2.trigger("owl.goTo", sync2visible[1])
                        } else if(num === sync2visible[0]){
                          sync2.trigger("owl.goTo", num-1)
                        }
                }
             

        /* Locaition Home 4 */
            $("#location-h4").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [979,3],
                itemsTablet       : [768,2],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });
        

         /* Owl Team Home 4 */
            $("#team").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [979,3],
                itemsTablet       : [768,2],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });
            var owlTeam = $("#team");
            // Custom Navigation Events

            $("body").on("click",".next-team",function(event){
              owlTeam.trigger("owl.next");
            });
            $("body").on("click",".prev-team",function(event){
              owlTeam.trigger("owl.prev");
            });

        /* Owl NEws Home 3 */
            $("#news-h3").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,3],
                itemsDesktopSmall     : [979,2],
                itemsTablet       : [768,1],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });
            var owlNewh3 = $("#news-h3");
            // Custom Navigation Events

            $("body").on("click",".next-new",function(event){
              owlNewh3.trigger("owl.next");
            });
            $("body").on("click",".prev-new",function(event){
              owlNewh3.trigger("owl.prev");
            });

        /* Owl NEws Home 6 */
            $("#news-h6").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 3,
                itemsDesktop      : [1199,3],
                itemsDesktopSmall     : [979,2],
                itemsTablet       : [768,1],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });
            var owlNewh6 = $("#news-h6");
            // Custom Navigation Events

            $("body").on("click",".next-new",function(event){
              owlNewh6.trigger("owl.next");
            });
            $("body").on("click",".prev-new",function(event){
              owlNewh6.trigger("owl.prev");
            });
        

        /* Owl What We Do Home 5 */
            $("#wwd-h5").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [991,2],
                itemsTablet       : [768,1],
                itemsMobile       : [479,1],
                pagination:false,
                navigation:false,
            });
            var owlWwdh5 = $("#wwd-h5");
            // Custom Navigation Events

            $("body").on("click",".next-wwd",function(event){
              owlWwdh5.trigger("owl.next");
            });
            $("body").on("click",".prev-wwd",function(event){
              owlWwdh5.trigger("owl.prev");
            });

        /* Owl Planning Home 5 */
            $("#plan-h5").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [979,2],
                itemsTablet       : [768,1],
                itemsMobile       : [479,1],
                pagination:false,
                navigation:false,
            });
            var owlWwdh5 = $("#plan-h5");
            // Custom Navigation Events

            $("body").on("click",".next-step",function(event){
              owlWwdh5.trigger("owl.next");
            });
            $("body").on("click",".prev-step",function(event){
              owlWwdh5.trigger("owl.prev");
            });

        /* Feature Post Gallery */
            $("#feature-gallery-post").owlCarousel({
           
                autoPlay: true, //Set AutoPlay to 3 seconds
                items : 1,
                itemsDesktop      : [1199,1],
                itemsDesktopSmall     : [979,1],
                itemsTablet       : [768,1],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });

         /* relate-cases */
            $("#relate-cases").owlCarousel({
           
                autoPlay: true, //Set AutoPlay to 3 seconds
                items : 3,
                itemsDesktop      : [1199,3],
                itemsDesktopSmall     : [979,2],
                itemsTablet       : [768,1],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });

        /* Services home 12 */
                $("#services-h12").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [979,3],
                itemsTablet       : [768,2],
                itemsMobile       : [479,1],
                pagination:false,
                navigation:false,
                });
                var owlServices12 = $("#services-h12");
                // Custom Navigation Events

                $("body").on("click",".next-services-h12",function(event){
                  owlServices12.trigger("owl.next");
                });
                $("body").on("click",".prev-services-h12",function(event){
                  owlServices12.trigger("owl.prev");
                });
        
        /* Services h8 */
            $("#services-h8").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [979,3],
                itemsTablet       : [768,2],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });
        
        /* Owl NEws Home 9 */
            $("#news-h9").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 2,
                itemsDesktop      : [1199,2],
                itemsDesktopSmall     : [979,2],
                itemsTablet       : [768,1],
                itemsMobile       : [479,1],
                pagination:true,
                navigation:false,
            });
        
        /* Owl Relate Product*/
            $("#relate-product").owlCarousel({
           
                autoPlay: false, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop      : [1199,4],
                itemsDesktopSmall     : [979,2],
                itemsTablet       : [768,1],
                itemsMobile       : [479,1],
                pagination:false,
                navigation:false,
            });    
 });