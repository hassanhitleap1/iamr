$( document ).ready(function() {"use strict";
              $('.lang').fancySelect(
                {
                triggerTemplate: function(optionEl) {
                    return '<div class="flags' + ' ' + optionEl.data('class') + '"></div>' + optionEl.text();
                },
                optionTemplate: function(optionEl) {
                     return '<div class="flags' + ' ' + optionEl.data('class') + '"></div>' + optionEl.text();
                }
                });
});
