<?php
/**
 * fervor functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fervor
 */

if ( ! function_exists( 'fervor_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fervor_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fervor, use a find and replace
	 * to change 'fervor' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fervor', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'fervor' ),
		'footer' => esc_html__( 'Footer', 'fervor' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fervor_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'fervor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fervor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fervor_content_width', 640 );
}
add_action( 'after_setup_theme', 'fervor_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fervor_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Footer-Sidebar', 'fervor' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'fervor' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fervor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fervor_scripts() {
	wp_enqueue_style( 'fervor-style', get_stylesheet_uri());

	wp_enqueue_script( 'fervor-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'fervor-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	
		wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBMByNVBSQul61a69kdhQd6sovGVEsm2dw', array(), '1', true );
		wp_enqueue_script( 'fervor-vendor-js', get_template_directory_uri() . '/assets/js/vendors.min.js', array('google-maps'), '1', true );

	//wp_enqueue_script( 'gsap-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/jquery.gsap.min.js', array('jquery'), '1', false );
	//wp_enqueue_script( 'tween-max', get_template_directory_uri() . '/assets/js/direct/TweenMax.min.js', array('gsap-jquery'), '1', false );
	//wp_enqueue_script( 'scrollmagic', get_template_directory_uri() . '/assets/js/direct/ScrollMagic.min.js', array('tween-max'), '1', false );
	//wp_enqueue_script( 'animation-gsap', get_template_directory_uri() . '/assets/js/direct/animation.gsap.min.js', array('scrollmagic'), '1', false );
	wp_enqueue_script( 'fervor-custom-js', get_template_directory_uri() . '/assets/js/custom.min.js', array('jquery'), '1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fervor_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom Post Types for this theme.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Editor Styles.
 */
require get_template_directory() . '/inc/editor-styles.php';

/**
 * Custom Image sizes for this theme.
 */
require get_template_directory() . '/inc/images.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Check to see if post is the most recent.
 */
require get_template_directory() . '/inc/latest-posts.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Google Maps Integration for ACF.
 */
require get_template_directory() . '/inc/google-maps.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
