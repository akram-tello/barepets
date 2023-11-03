<?php
/**
 * starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package starter
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'starter_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function starter_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on starter, use a find and replace
		 * to change 'starter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'starter', get_template_directory() . '/languages' );

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
				'primary' => esc_html__( 'Primary', 'starter' ),
				'button' => esc_html__( 'Button Menu', 'starter' ),
				'mobile' => esc_html__( 'Mobile', 'starter' ),
				'footer' => esc_html__( 'Footer', 'starter' ),
				'copyright' => esc_html__( 'Copyright', 'starter' ),
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
		add_theme_support(
			'custom-background',
			apply_filters(
				'starter_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

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
endif;
add_action( 'after_setup_theme', 'starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'starter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'starter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function starter_scripts() {
	wp_enqueue_style( 'starter-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	wp_enqueue_style( 'starter-owl-css', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'starter-main', get_template_directory_uri() . '/main.css', array(), _S_VERSION );

	wp_style_add_data( 'starter-style', 'starter-main', 'rtl', 'replace' );

	wp_enqueue_script( 'starter-jquery', '//code.jquery.com/jquery-3.6.3.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'starter-owl-js', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'starter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'starter-custom-js', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

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
 * Load ACF.
 */
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/acf_block.php';
require get_template_directory() . '/inc/acf_templates.php';

/**
 * Detect plugin. For frontend only.
 */
add_action( 'admin_notices', 'my_theme_dependencies' );

function my_theme_dependencies() {
	
	$plugins = array(
		array(
			'slug' => 'contact-form-7/wp-contact-form-7.php',
			'link' => 'https://wordpress.org/plugins/contact-form-7',
			'name' => 'Contact Form 7'
		),
		array(
			'slug' => 'wps-hide-login/wps-hide-login.php',
			'link' => 'https://wordpress.org/plugins/wps-hide-login/',
			'name' => 'WPS Hide Login'
		),
		array(
			'slug' => 'wps-limit-login',
			'link' => 'https://wordpress.org/plugins/wps-limit-login/limit-login-attempts.php',
			'name' => 'WPS Limit Login'
		),
		array(
			'slug' => 'wordpress-seo/wp-seo.php',
			'link' => 'https://wordpress.org/plugins/wordpress-seo/',
			'name' => 'Yoast SEO Plugin'
		),
		array(
			'slug' => 'redirect-404-error-page-to-homepage-or-custom-page/redirect-404-error-page-to-homepage-or-custom-page.php',
			'link' => 'https://wordpress.org/plugins/redirect-404-error-page-to-homepage-or-custom-page/',
			'name' => '404 Redirect'
		),
		array(
			'slug' => 'aryo-activity-log/aryo-activity-log.php',
			'link' => 'https://wordpress.org/plugins/aryo-activity-log/',
			'name' => 'Activity Monitor'
		),
		
	);

	foreach( $plugins as $plugin ) {
		echo !is_plugin_active( $plugin['slug'] ) ? '<p><b>Install <a href="' . $plugin['link'] . '">' . $plugin['name'] . '</a> once the theme is published to LIVE Server.</b></p>' : null;
	}

	
}


function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );