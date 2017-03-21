<?php
/**
 * kurama functions and definitions
 *
 * @package kurama
 */



if ( ! function_exists( 'kurama_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kurama_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kurama, use a find and replace
	 * to change 'kurama' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kurama', get_template_directory() . '/languages' );

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	 global $content_width;
	 if ( ! isset( $content_width ) ) {
		$content_width = 731; /* pixels */
	 }
	 
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 *
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kurama' ),
		'top' => __( 'Top Menu', 'kurama' ),
		'mobile' => __( 'Smartphone Menu', 'kurama' ),
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
	add_theme_support( 'custom-background', apply_filters( 'kurama_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_image_size('kurama-pop-thumb',542, 383, true );
	add_image_size('kurama-pop-thumb-half',592, 225, true );
	add_image_size('kurama-poster-thumb',542, 680, true );
	add_image_size('kurama-sq-thumb', 600,600, true );
	
	//Declare woocommerce support
	add_theme_support('woocommerce');
	
}
endif; // kurama_setup
add_action( 'after_setup_theme', 'kurama_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kurama_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kurama' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'kurama' ), 
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'kurama' ), 
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'kurama' ), 
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'kurama' ), 
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kurama_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kurama_scripts() {
	wp_enqueue_style( 'kurama-style', get_stylesheet_uri() );
	
	wp_enqueue_style('kurama-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('kurama_title_font', 'Open Sans') )).':100,300,400,700' );
	
	if (get_theme_mod('kurama_title_font') != get_theme_mod('kurama_body_font') ) :
		wp_enqueue_style('kurama-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('kurama_body_font', 'Open Sans') )).':100,300,400,700' );
	endif;
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'hover-css', get_template_directory_uri() . '/assets/css/hover.min.css' );
	
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css' );
	
	wp_enqueue_style( 'kurama-main-theme-style', get_template_directory_uri() . '/assets/css/'.get_theme_mod('kurama_skin', 'default').'.css', array(), filemtime( get_template_directory() . '/assets/css/'.get_theme_mod('kurama_skin', 'default').'.css' ) );

	wp_enqueue_script( 'kurama-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'kurama-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'kurama-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'kurama-custom-js', get_template_directory_uri() . '/js/custom.js', array('kurama-externaljs') );
	
	// Localize the script with new data
	$translation_array = array(
		'menu_text' => get_theme_mod('kurama_menu_text','Browse...'),
	);
	wp_localize_script( 'kurama-externaljs', 'menu_obj', $translation_array );

}
add_action( 'wp_enqueue_scripts', 'kurama_scripts' );


//Backwards Compatibility FUnction
function kurama_logo() {	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

function kurama_has_logo() {
	if (function_exists( 'has_custom_logo')) {
		if ( has_custom_logo() ) {
			return true;
		}
	} else {
		return false;
	}
}

/**
 * Enqueue Scripts for Customizer Preview screen
 */
function kurama_custom_wp_admin_style() {
	
        wp_enqueue_style( 'kurama-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
        wp_enqueue_style( 'kurama-fontawesome-style', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
}
add_action( 'admin_enqueue_scripts', 'kurama_custom_wp_admin_style' );


/**
 * Include the Custom Functions of the Theme.
 */
require get_template_directory() . '/framework/theme-functions.php';

/**
 * Include the Custom Functions of the Theme.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom CSS Mods.
 */
require get_template_directory() . '/inc/css-mods.php';


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
require get_template_directory() . '/framework/customizer/init.php';

/**
 * Load Designer
 */
require get_template_directory() . '/framework/designer/designer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Auto Update file.
 */

require get_template_directory() . '/framework/theme_update_check.php';
$MyUpdateChecker = new ThemeUpdateChecker(
    'kurama-pro',
    'https://kernl.us/api/v1/theme-updates/58937ddfa0d3135942d51a14/'
);


