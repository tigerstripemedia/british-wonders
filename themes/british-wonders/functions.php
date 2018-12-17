<?php
/**
 * british-wonders functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package british-wonders
 */

if ( ! function_exists( 'british_wonders_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function british_wonders_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on british-wonders, use a find and replace
		 * to change 'british-wonders' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'british-wonders', get_template_directory() . '/languages' );

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
			'main-menu' => esc_html__( 'Primary', 'british-wonders' ),
			'footer-menu' => esc_html__( 'Footer', 'british-wonders' ),
		) );
		
		// Register Custom Navigation Walker
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

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
		add_theme_support( 'custom-background', apply_filters( 'british_wonders_custom_background_args', array(
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
add_action( 'after_setup_theme', 'british_wonders_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function british_wonders_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'british_wonders_content_width', 640 );
}
add_action( 'after_setup_theme', 'british_wonders_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function british_wonders_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'british-wonders' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'british-wonders' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'british_wonders_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function british_wonders_scripts() {
	wp_enqueue_style( 'british-wonders-style', get_stylesheet_uri() );

	wp_enqueue_script( 'british-wonders-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'british-wonders-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'british_wonders_scripts' );

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
 * Create custom taxonomies
 */
function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts 
  register_taxonomy('location', 'post', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Travel Categories', 'taxonomy general name' ),
      'singular_name' => _x( 'Travel Category', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Travel Categories' ),
      'all_items' => __( 'All Travel Categories' ),
      'parent_item' => __( 'Parent Category' ),
      'parent_item_colon' => __( 'Parent Category:' ),
      'edit_item' => __( 'Edit Category' ),
      'update_item' => __( 'Update Category' ),
      'add_new_item' => __( 'Add New Travel Category' ),
      'new_item_name' => __( 'New Travel Category Name' ),
      'menu_name' => __( 'Travel Categories' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'travel-category', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

// Create search form
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="form-inline nav-search" action="' . home_url( '/' ) . '">
				    	<label class="sr-only" for="s">' . __( 'Search for:' ) . '</label>
				      <input class="form-control" type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Search"/>
				      <button class="btn btn-nav-search" type="submit" value="'. esc_attr__( 'Search' ) .'" id="searchsubmit"><i class="fas fa-search"></i></button>
				     </form>
				  	';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );

// Moving comments form text area 
add_filter( 'comment_form_fields', 'move_comment_field' );
function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

// Setting a default profile icon
add_filter( 'avatar_defaults', 'bwavatar' );
function bwavatar ($avatar_defaults) {
    $myavatar = get_bloginfo('template_directory') . '/assets/img/bw-avatar.png';
    $avatar_defaults[$myavatar] = "British Wonders Avatar";
    return $avatar_defaults;
}

//Exclude pages from WordPress Search
if (!is_admin()) {
function wpb_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', array('travel_guide_posts', 'product_guide_posts'));
}
return $query;
}
add_filter('pre_get_posts','wpb_search_filter');
}

