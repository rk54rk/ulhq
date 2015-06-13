        var originalHeight = jQuery('#to-bottom').height();
        extendDivToBottom();
        
        jQuery( window ).resize(function() {
          extendDivToBottom();
        });
                             
        function extendDivToBottom(){
          //get the div to page bottom
          jQuery('#to-bottom').css("height", '9999px');
          var newHeight = 9999 - (jQuery(document).height() - jQuery(window).height());
          if(newHeight > originalHeight){
            jQuery('#to-bottom').css("height", newHeight);
          } else {
            jQuery('#to-bottom').css("height", originalHeight);
          }
        }