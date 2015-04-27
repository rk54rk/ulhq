<?php
/**
 * ul functions and definitions
 *
 * @package ul
 */


/**
 * Including modules.
 */
require get_template_directory() . '/functions/redirect.php';
require get_template_directory() . '/functions/ad-uploader.php';
require get_template_directory() . '/functions/functions.php';
require get_template_directory() . '/functions/paypal-balance.php';
require get_template_directory() . '/functions/login-email-validation.php';


//include dependencies
function wpbootstrap_scripts_with_jquery()
{
    // Register the script like this for a theme:
    wp_enqueue_script( 'bootstrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'auto-scroll', get_template_directory_uri() . '/js/autoscroll.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

// Hide admin bar
add_filter('show_admin_bar', '__return_false');


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'ul_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ul_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ul, use a find and replace
	 * to change 'ul' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ul', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ul' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ul_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ul_setup
add_action( 'after_setup_theme', 'ul_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ul_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ul' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ul_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ul_scripts() {
	wp_enqueue_style( 'ul-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ul-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ul-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ul_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
