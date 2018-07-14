jQuery(document).ready(function( $ ) {
            $("#menu").mmenu({
               "extensions": [
                  "pagedim-black",
                  "theme-dark"
               ],
               "offCanvas": {
                  "position": "right"
               },
               "counters": true,
               "navbars": [
                  {
                     "position": "top",
                     "content": [
                        "searchfield"
                     ]
                  },
                  {
                     "position": "top"
                  },
                  {
                     "position": "bottom",
                     "content": [
                        "<a class='fa fa-envelope' href='#/'></a>",
                        "<a class='fa fa-twitter' href='#/'></a>",
                        "<a class='fa fa-facebook' href='#/'></a>"
                     ]
                  }
               ]
            });
         });