(function() {"use strict";
    
	/* 
	   Main Portfolio
	   ========================================================================== */
				$('.single-img-popup').magnificPopup({
				  type: 'image'
				  // other options
				});

				$('.gallery-feature-img').magnificPopup({
		          delegate: 'a',
		          type: 'image',
		          tLoading: 'Loading image #%curr%...',
		          mainClass: 'mfp-img-mobile',
		          gallery: {
		            enabled: true,
		            navigateByImgClick: true,
		            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		          },
		          image: {
		            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
		            titleSrc: function(item) {
		              return item.el.attr('title') + '<small>by Dotted Wordpress Template</small>';
		            }
		          }
		        });

		        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		          disableOn: 0,
		          type: 'iframe',
		          mainClass: 'mfp-fade',
		          removalDelay: 160,
		          preloader: false,

		          fixedContentPos: false
		        });
	
	

  })(jQuery);		