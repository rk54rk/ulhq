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
            <h4>Dear sir/madamn <?php global $current_user;get_currentuserinfo();echo $current_user->user_lastname; ?>, welcome back to the headquaters of the Unlimited Ltd. Today is <?php echo date('j F Y'); ?>, a good day to do business as it always is. </h4>
        </div>
        
        <div class="col-sm-6">
        </div>
    </div>
    
	<div class="row">
        <div class="col-sm-12" style="padding-top:30px">
            <h3 style="margin-top:0;border-top:1px solid #444">Financial summary</h3>
        </div>
        <div class="col-sm-4" style="padding-top:15px">
            The company as of now worth:
            <h2 style="margin-top:0;border-bottom:1px solid #444">120.00</h2>
        </div>
        
        <div class="col-sm-4" style="padding-top:15px">
            Total number of Business Associates:
            <h2 style="margin-top:0;border-bottom:1px solid #444">12</h2>
        </div>
        
        <div class="col-sm-4" style="padding-top:15px">
            Your share of the company worth:
            <h2 style="margin-top:0;border-bottom:1px solid #444">10.00</h2>
        </div>
        
        <div class="col-sm-12" style="margin-top:30px">
            <?php echo do_shortcode( '[bbp-forum-index]' )?>
        </div>       
        
    </div>  
</div>