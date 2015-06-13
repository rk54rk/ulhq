<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ul
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Bootstrap from CDN -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/inc/bootstrap.min.css">
<!-- Google fonts -->
<link href='<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/trocchi/stylesheet.css' rel='stylesheet' type='text/css'>
<link href='<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/texgyreheros/stylesheet.css' rel='stylesheet' type='text/css'>
<!-- UL pictograms font -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/inc/fonts/ul_pictograms/css/ul_pictograms.css">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon.png" />
    
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">        
        <nav class="navbar-top navbar navbar-default navbar-static-top" style="z-index:9999;">
          <div class="container">
            <div class="navbar-header navbar-block">
			  <a href="http://unlimitedltd.co"><?php bloginfo( 'name' ); ?></a>
            </div>
              
            <span class="nav navbar-nav navbar-left navbar-block" style="margin-left:15px;"><a class="ulhq-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Headquarters</a></span>
              
            <ul id="navbar-menu" class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    
                  <a href="#" class="dropdown-toggle with-border" data-toggle="dropdown" role="button" style="border:2px solid #444;padding:3px 6px;margin-top:-3px;margin-left:30px;" aria-expanded="false">
                      <span>Menu</span>
                  </a>
                    
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="http://unlimitedltd.co/buy">Buy an ad</a></li>
                    <li><a href="<?php echo site_url( '/signup', 'http' ); ?>">Join the company</a></li>
                    <li><a href="#">Boardroom</a></li>
                  </ul>
                </li>
              </ul>
              
              <?php get_template_part( 'parts/header-topbar-menu' );?>
              
          </div>
        </nav>        
            
	</header><!-- #masthead -->


	<div id="content" class="site-content">
