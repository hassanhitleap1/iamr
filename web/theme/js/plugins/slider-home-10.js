$( document ).ready(function() {"use strict";
              var tpj = jQuery;

                var revapi8;
                tpj(document).ready(function() {
                    if (tpj("#slider_10").revolution == undefined) {
                        revslider_showDoubleJqueryError("#slider_10");
                    } else {
                        revapi8 = tpj("#slider_10").show().revolution({
                            sliderType: "standard",
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
                                bullets: {
                                    enable: true,
                                    hide_onmobile: false,
                                    style: "custom",
                                    hide_onleave: false,
                                    direction: "horizontal",
                                    h_align: "left",
                                    v_align: "bottom",
                                    h_offset: 0,
                                    v_offset: 0,
                                    space: 5,
                                    tmp: ''
                                },
                            },

                            responsiveLevels:[1920,1024,768,481],
                            gridwidth:[1170,768,481,300],
                            gridheight:[689,689,689,689]                           
                            
                        });
                    }
                }); /*ready*/
});
