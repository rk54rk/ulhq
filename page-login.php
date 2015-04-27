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
        	<?php 
            $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;  
            if ( $login === "failed" ) {  
            echo '<p class="login-msg"><strong>ERROR:</strong> Your account email address or password is incorrect.</p>';  
        } elseif ( $login === "empty" ) {  
            echo '<p class="login-msg"><strong>ERROR:</strong> Please enter both your email address and password.</p>';  
        } elseif ( $login === "false" ) {  
            echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';  
        }  ?>
        
        
        <div class="col-md-6">
            Welcome to the Boardroom, here is where the share holders of the Unlimited Limited decide what the next move of the company is. please login or sign up.
        </div>
        
        
        <div class="login-form">
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
        </div>
    </div>  
</div>