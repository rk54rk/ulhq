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

get_header(); ?>

<div class="container">
    
    <div class="row">
        <div class="col-sm-6">
            <h4>Welcome to the headquarters of the Unlimited Ltd, here is where the shareholders of the Unlimited Limited decide what the next move of the company is. You can sign in if you are already a shareholder, or <a href="/signup">sign up</a> for free.</h4>
        </div>
        
        <div class="col-sm-6">
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top:30px;padding-bottom:100px;margin-bottom:0;background-color:white;box-shadow:4px 0px 36px rgba(0,0,0,0.3);">
  <div class="container">
	<div class="row">
        	<?php 
            $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;  
            if ( $login === "failed" ) {  
            echo '<p class="login-msg"><strong>ERROR:</strong> Your account email address or password is incorrect.</p>';  
        } elseif ( $login === "empty" ) {  
            echo '<p class="login-msg"><strong>ERROR:</strong> Please enter both your email address and password.</p>';  
        } elseif ( $login === "false" ) {  
            echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';  
        }  ?>

        <div id="to-bottom" class="col-sm-4 col-sm-offset-0" style="padding-top:30px">
            <h3 style="margin-top:0;">Shareholder sign in</h3>
            
            <div class="login">
                  <?php  
                    $args = array(  
                        'redirect' => home_url(),   
                        'id_username' => 'user',  
                        'id_password' => 'pass',  
                        'label_username' => __( 'Email' ),
                       )   
                    ;?>
                  <?php wp_login_form( $args ); ?>
                <a href="<?php echo get_bloginfo('url'); ?>/wp-login.php?action=lostpassword">Forgot password?
                </a>
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
    </div>  
  </div>
</div>