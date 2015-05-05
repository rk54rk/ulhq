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
            <h4>Welcome to the headquarters of the Unlimited Ltd, here is where the shareholders of the Unlimited Limited decide what the next move of the company is. You can sign in if you are already a shareholder, or sign up for free.</h4>
        </div>
        
        <div class="col-sm-6">
        </div>
    </div>
    
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
        
        
        <div class="col-sm-6" style="padding-top:30px">
            <h3 style="margin-top:0;border-top:1px solid #444">Sign up as a shareholder</h3>
            <p>Owning a share of the Unlimited Limited doensn't mean you can get some cash immediately, but you will have a say in how to use the money the company has.</p>
            <a href="/signup">Sign up</a>
        </div>
        
        
        <div class="col-sm-6" style="padding-top:30px">
            <h3 style="margin-top:0;border-top:1px solid #444">Shareholder sign in</h3>
            
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
    </div>  
</div>