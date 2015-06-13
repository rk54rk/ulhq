<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ul
 */

if ( !is_user_logged_in()) {
	wp_redirect('reception'); 
    exit;}

get_header(); ?>

<div class="container">
	<div class="row">
        <div class="col-sm-6">
            <h4>Dear <?php 

                    echo bp_get_profile_field_data( array(
                        'field'   => 'Title',
                        'user_id' => bp_loggedin_user_id()
                    ));
                    
                    echo '. ';

                    global $current_user;
                    get_currentuserinfo();
                    echo $current_user->user_lastname; 

                    echo ',';
                ?> welcome back to the headquaters of the Unlimited Ltd. Today is <?php echo date('j F Y'); ?>, a good day to do business as usual. </h4>
        </div>
        
        <div class="col-sm-4 col-sm-offset-2" style="text-align:left">
            <p>
                <a target='_blank' href="<?php bloginfo('template_directory'); ?>/parts/ul-pdf/ul_share_certificate.php">
                    <i class="icon-award" style="margin-left:-2px"></i>Download share certificate</a><br>
                <a target='_blank' href="<?php bloginfo('template_directory'); ?>/parts/ul-pdf/ul_business_card.php">
                    <i class="icon-vcard" style="margin-left:-2px"></i>Download my business card</a><br>
                <a target='_blank' href="">
                    <i class="icon-doc-text" style="margin-left:-2px"></i>Download letterhead
                </a>
            </p>
            
        </div>
    </div>
</div>

<div id="to-bottom" class="container-fluid" style="margin-top:30px;background-color:white;box-shadow: 4px 0px 36px rgba(0,0,0,0.3);">
  <div class="container">
      <div class="row">
        <div class="col-sm-12" style="padding-top:30px">
            <h3 style="margin-top:0;">Financial summary</h3>
        </div>
        <div class="col-sm-4" style="padding-top:15px">
            The company today worth:
            <h2 style="margin-top:0;">
                <?php 

                    if( function_exists( 'ulplus_init' ) ) {
                        $total_value = ul_get_company_worth(); 
                        echo '£'.$total_value;
                    } else {
                        echo 'Ulplus is not active.';
                    }

                ?>
            </h2>
        </div>
        
        <div class="col-sm-4" style="padding-top:15px">
            Total number of shareholders:
            <h2 style="margin-top:0;">
                <?php
                    $result = count_users();
                    $subscriber_count = $result["avail_roles"]["subscriber"];
                    echo $subscriber_count;
                ?>
            </h2>
        </div>
        
        <div class="col-sm-4" style="padding-top:15px">
            Your share of the company:
            <h2 style="margin-top:0;">
                <?php 

                    if( function_exists( 'ulplus_init' ) ) {
                        $share_value = ($total_value / $subscriber_count);
                        echo '£' . number_format((float)$share_value, 2, '.', '');
                    } else {
                        echo 'Ulplus is not active.';
                    }

                ?>
            </h2>
        </div>
        
        <div class="col-sm-12" style="margin-top:30px">
            <?php echo do_shortcode( '[bbp-forum-index]' )?>
        </div>       
      </div>
    </div>

      <script>
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
      </script>