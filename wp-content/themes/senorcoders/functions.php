<?php
/**
 * Senorcoders functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Senorcoders
 */

if ( ! function_exists( 'senorcoders_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function senorcoders_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Senorcoders, use a find and replace
		 * to change 'senorcoders' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'senorcoders', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'senorcoders' ),
		) );
    /**
     * Add a home link to your menu
     *
     * @since 4.0
     */
    function wpex_add_menu_home_link( $items, $args ) {

      // Only used for the main menu
      if ( 'menu-1' != $args->theme_location ) {
        return $items;
      }

      // Create home link
      $home_link = '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';

      // Add home link to the menu items
      $items = $home_link . $items;

      // Return menu items
      return $items;

    }
    add_filter( 'wp_nav_menu_items', 'wpex_add_menu_home_link', 10, 2 );
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
		add_theme_support( 'custom-background', apply_filters( 'senorcoders_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'senorcoders_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function senorcoders_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'senorcoders_content_width', 640 );
}
add_action( 'after_setup_theme', 'senorcoders_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function senorcoders_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'senorcoders' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'senorcoders' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'senorcoders_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function senorcoders_scripts() {
	//wp_enqueue_style('main-styles', get_template_directory_uri() . '/senorcoders.min.css', array(), filemtime(get_template_directory() . '/senorcoders.min.css'), false); //live
      wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css' );
    wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' ); 
        wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato:400,700' );
          wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,800,900' );
  		wp_enqueue_style( 'owlCSS', get_template_directory_uri(). '/css/owl.carousel.min.css' );
		wp_enqueue_style( 'owlTheme', get_template_directory_uri(). '/css/owl.theme.default.min.css' );



  wp_enqueue_style('main-styles', get_template_directory_uri() . '/src/css/senorcoders.css', array(), filemtime(get_template_directory() . '/src/css/senorcoders.css'), false); //dev
	
	wp_enqueue_style( 'senorcoders-style', get_stylesheet_uri() );

	wp_enqueue_script( 'senorcoders-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'senorcoders-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
     wp_enqueue_script( 'popperJs', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', array( 'jquery' ) );
    
    wp_enqueue_script( 'boostrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', array( 'jquery' ) );
	  wp_enqueue_script( 'select2js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js', array( 'jquery' ) );
      wp_enqueue_script( 'owlJs', get_template_directory_uri(). '/js/owl.carousel.js' , array( 'jquery' ) );

	wp_enqueue_script( 'senorcoders', get_template_directory_uri() . '/js/senorcoders.min.js', array('jquery'), null , true );
}
add_action( 'wp_enqueue_scripts', 'senorcoders_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom_acf.php';

require get_template_directory() . '/inc/widgets.php';

require get_template_directory() . '/inc/custom_shortcodes.php';

require get_template_directory() . '/inc/clubReady.php';