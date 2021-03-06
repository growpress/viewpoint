<?php
/**
 * Functions and definitions
 *
 * @package viewpoint
 */

if ( ! function_exists( 'viewpoint_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function viewpoint_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on viewpoint, use a find and replace
	 * to change 'viewpoint' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'viewpoint', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails' );
	//add_image_size( 'post-featured', 465, 360, true ); // Home page first post image
	//add_image_size( 'home-posts', 220, 160, true ); // Home page next post images
	//add_image_size( 'pages-posts', 635, 485, true ); // Single Pages & Posts
	//add_image_size( 'full-width', 960, 485, true ); // Full Width Template

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'viewpoint' ),
		//'social' => __( 'Social Menu', 'viewpoint' )
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
	add_theme_support( 'custom-background', apply_filters( 'viewpoint_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // viewpoint_setup
add_action( 'after_setup_theme', 'viewpoint_setup' );


function viewpoint_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'viewpoint_add_editor_styles' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function viewpoint_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'viewpoint_content_width', 1000 );
}
add_action( 'after_setup_theme', 'viewpoint_content_width', 0 );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function viewpoint_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer First', 'viewpoint' ),
		'id'            => 'footer-first',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Second', 'viewpoint' ),
		'id'            => 'footer-second',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Third', 'viewpoint' ),
		'id'            => 'footer-third',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'viewpoint_widgets_init' );

/**
 * Load Foundation file.
 */
require get_template_directory() . '/inc/foundation.php';

/**
 * Enqueue scripts and styles.
 */
function viewpoint_scripts() {

	wp_enqueue_script( 'jquery-effects-core' );

	/**
	 * For getting the theme version number to cache bust
	 */
	$viewpoint = wp_get_theme();

	/**
	 * Font Awesome Handle based on the standardized set
	 *
	 * @link https://github.com/grappler/wp-standard-handles
	 */
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0', 'all' );
	wp_enqueue_style( 'viewpoint-style', get_stylesheet_uri(), array(), $viewpoint['Version'], 'all' );

	wp_enqueue_script( 'viewpoint-slick-nav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array(), '1.0.4', true );

	wp_enqueue_script( 'viewpoint-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'viewpoint-init', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'viewpoint_scripts' );

/**
 * Load default Google fonts
 */
require get_template_directory() . '/inc/fonts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Customizer Library
 */
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

/**
 * Load recommended plugins
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/plugins.php';

/**
 * Load Customized Default Widgets
 */
require get_template_directory() . '/inc/default-widgets.php';

/**
 * Load Theme Info screen
 */
require get_template_directory() . '/inc/theme-info/welcome-screen.php';