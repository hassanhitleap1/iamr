$( document ).ready(function() {"use strict";
              

    if (window.screen.width >= 768) {
      // resolution is below 10 x 7

      var tpj = jQuery;

                var revapi8;
                tpj(document).ready(function() {
                    if (tpj("#slider_1").revolution == undefined) {
                        revslider_showDoubleJqueryError("#slider_1");
                    } else {
                        revapi8 = tpj("#slider_1").show().revolution({
                            sliderType: "standard",
                            jsFileLocation: "../../revolution/js/",
                            sliderLayout: "auto",
                            
                            delay: 9000,
                            navigation: {
                                arrows: {
                                    style: "hermes",
                                    enable: true,
                                    hide_onmobile: false,
                                    hide_onleave: true,
                                    tmp: '<div class="tp-arr-allwrapper"> <div class="tp-arr-imgholder "></div> <div class="tp-arr-titleholder title-thumb-home1">{{title}}</div> </div>',
                                    left: {
                                        h_align: "left",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0
                                    },
                                    right: {
                                        h_align: "right",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0
                                    }
                                },
                            },
                            responsiveLevels:[1920,1024,768,481],
                            gridwidth:[1170,768,481,320],
                            gridheight:[745,745,745,745]                         
                            
                        });
                    }
                }); /*ready*/
    }
    else
    {
        var tpj = jQuery;

                var revapi8;
                tpj(document).ready(function() {
                    if (tpj("#slider_1").revolution == undefined) {
                        revslider_showDoubleJqueryError("#slider_1");
                    } else {
                        revapi8 = tpj("#slider_1").show().revolution({
                            sliderType: "standard",
                            jsFileLocation: "../../revolution/js/",
                            sliderLayout: "fullscreen",
                            
                            delay: 9000,
                            navigation: {
                                arrows: {
                                    style: "hermes",
                                    enable: true,
                                    hide_onmobile: false,
                                    hide_onleave: true,
                                    tmp: '<div class="tp-arr-allwrapper"> <div class="tp-arr-imgholder "></div> <div class="tp-arr-titleholder title-thumb-home1">{{title}}</div> </div>',
                                    left: {
                                        h_align: "left",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0
                                    },
                                    right: {
                                        h_align: "right",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0
                                    }
                                },
                            },
                            responsiveLevels:[1920,1024,768,481],
                            gridwidth:[1170,768,481,320],
                            gridheight:[745,745,745,745]                         
                            
                        });
                    }
                }); /*ready*/
    }


});

