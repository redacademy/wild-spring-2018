<?php
/**
 * WAV Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wav_starter_Theme
 */
/* functions.php */
include('faq/faq.php');
if ( ! function_exists( 'wav_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */


function wav_starter_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );
	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
endif; // wav_starter_setup
add_action( 'after_setup_theme', 'wav_starter_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function wav_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wav_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'wav_starter_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wav_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Social media icons' ),
		'id'            => 'sidebar-1',
		'description'   => 'Widget area for social media icons in the footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html( 'Social media feeds' ),
		'id'            => 'sidebar-front-page',
		'description'   => 'Widget area for social media feeds on the front-page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html( 'Secondary menu on about page' ),
		'id'            => 'sidebar-about-nav',
		'description'   => 'Widget area for custom links in secondary navigation on about us page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wav_starter_widgets_init' );
add_action( 'widgets_init', 'child_register_sidebar' );
function child_register_sidebar(){
    register_sidebar(array(
        'name' => 'Sidebar 2',
        'id' => 'sidebar-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
}
/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function wav_starter_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}
	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'wav_starter_minified_css', 10, 2 );
/**
 * Enqueue scripts and styles.
 */

function wav_starter_scripts() {
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Oswald', false );
	wp_enqueue_style( 'font-awesome-cdn', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css', array(), '5.0.6' );
	wp_enqueue_style( 'wav-starter-style', get_stylesheet_uri() );
	wp_enqueue_script( 'wav-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );
	wp_enqueue_script('flickity', 'https://npmcdn.com/flickity@2/dist/flickity.pkgd.js', true);
	wp_enqueue_style( 'flickity-css', 'https://npmcdn.com/flickity@2/dist/flickity.css', false );
	wp_enqueue_script('smoothscroll_script', get_template_directory_uri() . '/build/js/smoothscroll.min.js', array('jquery'),'20180615', true);
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/build/js/carousel.min.js', array('jquery'), '20180613', true );
	wp_enqueue_script( 'front-page-tab', get_template_directory_uri() . '/build/js/front-page-tab.min.js', array('jquery'), '20180615', true );
	wp_enqueue_script( 'activity', get_template_directory_uri() . '/build/js/activity.min.js', array('jquery'), '20180616', true );
	wp_enqueue_script( 'hamburger-script', get_template_directory_uri() . '/build/js/hamburger.min.js', array('jquery'), '20180618', true );
	wp_enqueue_script( 'submission', get_template_directory_uri() . '/build/js/submission.min.js', array('jquery'), '20180619', true );
	wp_enqueue_script( 'header-script', get_template_directory_uri() . '/build/js/header.min.js', array('jquery'), '20180621', true );
	wp_enqueue_script( 'archive-activity', get_template_directory_uri() . '/build/js/archive-activity.min.js', array('jquery'), '20180622', true );
	wp_enqueue_script( 'faq', get_template_directory_uri() . '/build/js/faq.min.js', array('jquery'), '20180625', true );
	wp_enqueue_script( 'back-button', get_template_directory_uri() . '/build/js/back-button.min.js', array('jquery'), '20180626', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/**
	 *  add localize script rest api JavaScript
	 */
	if(function_exists('rest_url') ){
		//script for ajax get
		wp_enqueue_script( 'ajax', get_template_directory_uri() . '/build/js/ajax.min.js' , array('jquery'), '20180615', true );
		wp_localize_script( 'ajax', 'api_vars', array(
			'root_url' => esc_url_raw(rest_url()),
			'home_url'=> esc_url_raw(home_url()),
			'nonce'=> wp_create_nonce('wp_rest'),
			'success'=>'Thanks, your event submission was received',
			'failure'=>'Sorry, your submission could not be processed',
		));
	}
}
add_action( 'wp_enqueue_scripts', 'wav_starter_scripts' );
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


