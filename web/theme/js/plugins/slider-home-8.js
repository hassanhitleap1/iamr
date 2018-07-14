$( document ).ready(function() {"use strict";
              var tpj = jQuery;

                var revapi8;
                tpj(document).ready(function() {
                    if (tpj("#slider_8").revolution == undefined) {
                        revslider_showDoubleJqueryError("#slider_8");
                    } else {
                        revapi8 = tpj("#slider_8").show().revolution({
                            sliderType: "hero",
                            jsFileLocation: "../../revolution/js/",
                            sliderLayout: "auto",
                            delay: 9000,
                            navigation: {
                                arrows: {
                                    style: "custom",
                                    enable: true,
                                    hide_onmobile: false,
                                    hide_onleave: true,
                                    tmp:'<i class="fa fa-angle-left" aria-hidden="true"></i>',
                                    left: {
                                        h_align: "left",
                                        v_align: "center",
                                        h_offset: 10,
                                        v_offset: 0
                                    },
                                    right: {
                                        h_align: "right",
                                        v_align: "center",
                                        h_offset: 10,
                                        v_offset: 0
                                    }
                                },
                            },
                             responsiveLevels:[1920,1024,768,481],
                            gridwidth:[1170,768,481,300],
                            gridheight:[698,698,698,698]                           
                            
                        });
                    }
                }); /*ready*/
});
