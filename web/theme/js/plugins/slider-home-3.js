$( document ).ready(function() {"use strict";
              var tpj = jQuery;

                var revapi8;
                tpj(document).ready(function() {
                    if (tpj("#slider_3").revolution == undefined) {
                        revslider_showDoubleJqueryError("#slider_3");
                    } else {
                        revapi8 = tpj("#slider_3").show().revolution({
                            sliderType: "standard",
                            jsFileLocation: "../../revolution/js/",
                            sliderLayout: "auto",
                            delay: 9000,
                            navigation: {
                                arrows: {
                                    enable: false,
                                },
                            },
                            responsiveLevels:[1920,1024,768,481],
                            gridwidth:[1170,768,481,300],
                            gridheight:[745,745,745,745]                          
                            
                        });
                    }
                }); /*ready*/
});
