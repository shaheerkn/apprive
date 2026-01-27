<?php
/**
 * arprive functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package arprive
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ar_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on arprive, use a find and replace
		* to change 'ar' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ar', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'ar' ),
			'footer-menu-destinations' => esc_html__( 'Footer Menu Destinations', 'ar' ),
			'footer-menu-discover' => esc_html__( 'Footer Menu Discover', 'ar' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	// add_theme_support(
	// 	'custom-background',
	// 	apply_filters(
	// 		'ar_custom_background_args',
	// 		array(
	// 			'default-color' => 'ffffff',
	// 			'default-image' => '',
	// 		)
	// 	)
	// );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ar_content_width', 640 );
}
add_action( 'after_setup_theme', 'ar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ar_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ar' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ar_scripts() {
	wp_enqueue_style( 'ar-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ar-style', 'rtl', 'replace' );

	wp_enqueue_style( 'ar-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'ar-main', get_template_directory_uri() . '/css/main.css', array(), _S_VERSION );

	wp_enqueue_script( 'ar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ar-color-scheme', get_template_directory_uri() . '/js/color-scheme.js', array(), _S_VERSION, true );

	// Swiper Slider
	wp_enqueue_script( 'ar-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ar-chalet-about', get_template_directory_uri() . '/js/chalet-about.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ar-chalet-featured', get_template_directory_uri() . '/js/chalet-featured.js', array('ar-swiper-js'), _S_VERSION, true );
	wp_enqueue_script( 'ar-single-chalet-gallery', get_template_directory_uri() . '/js/single-chalet-gallery.js', array('ar-swiper-js'), _S_VERSION, true );
	wp_enqueue_script( 'ar-filter', get_template_directory_uri() . '/js/filter.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ar_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Enable SVG upload support for ACF icon fields
 *
 * Adds SVG MIME type to WordPress allowed upload types.
 * SVGs are sanitized on upload by ACF Pro.
 *
 * @param array $mimes Existing MIME types.
 * @return array Modified MIME types with SVG support.
 */
function ar_enable_svg_upload( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'ar_enable_svg_upload' );

/**
 * Fix SVG thumbnail display in WordPress media library
 *
 * @param array  $response   Attachment response data.
 * @param object $attachment Attachment object.
 * @param array  $meta       Attachment metadata.
 * @return array Modified response with SVG dimensions.
 */
function ar_fix_svg_thumb_display( $response, $attachment, $meta ) {
	if ( $response['type'] === 'image' && $response['subtype'] === 'svg+xml' && class_exists( 'SimpleXMLElement' ) ) {
		try {
			$path = get_attached_file( $attachment->ID );
			if ( @file_exists( $path ) ) {
				$svg = @simplexml_load_file( $path );
				if ( $svg !== false ) {
					$attributes = $svg->attributes();
					$width      = (string) $attributes->width;
					$height     = (string) $attributes->height;
					if ( $width && $height ) {
						$response['sizes'] = array(
							'full' => array(
								'url' => $response['url'],
								'width' => intval( $width ),
								'height' => intval( $height ),
								'orientation' => intval( $width ) > intval( $height ) ? 'landscape' : 'portrait',
							),
						);
					}
				}
			}
		} catch ( Exception $e ) {
			// Silently fail - SVG will still be uploadable
		}
	}
	return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'ar_fix_svg_thumb_display', 10, 3 );

/**
 * Google Map API Key
 *
 * @param string $map Google Map iframe code.
 * @return string Google Map iframe code.
 */
function my_acf_google_map_api( $api ){
	// TODO: Remove this Google API key before production and Ask client to provide their own.
	$api['key'] = 'AIzaSyBJihoxYNCcTDP0oPyFnYWKOLyDiBweRwo';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
