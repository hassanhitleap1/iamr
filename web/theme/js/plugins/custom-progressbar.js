$(document).ready(function(){ "use strict";
        var executed = false;
           $('.progress-bar-warp').waypoint(function() {
            if (!executed) {
              executed = true;
                 $('.progress .progress-bar').progressbar({
                    update: function(current_percentage, $this) {
                        $this.parent().parent().find(".update-h .box-percentage-inner").html(current_percentage  + '%');
                        $this.parent().parent().find(".update-h").css("left", (current_percentage) + '%'); 
                        
                    }
                  });
              }
          },{offset: '40%' })

      // =====================================================
       });