<?php
/**
 * Cozymartrevo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage cozymart_revo
 * @since 1.0
 */

add_filter( 'jetpack_development_mode', '__return_true' );
/**
 * rent car bams only works in WordPress 4.7 or later.
 */

/**
 * thumbnail support
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'banner-thumb', 500, 400 ); //500 pixels wide (and unlimited height)
add_image_size( 'product-thumb', 300, 9999 ); //500 pixels wide (and unlimited height)

/**
 * Add theme support for infinite scroll.
 *
 * @uses add_theme_support
 * @return void
 */
function bams_infinite_scroll_init() {
	add_theme_support( 'infinite-scroll', array(
		'type'           => 'scroll',
		'container'      => 'content',
		'render'         => true,
		'posts_per_page' => 4,
	) );
}

add_action( 'after_setup_theme', 'bams_infinite_scroll_init' );

/**
 * Ajax pagination
 *
 */

add_action( 'wp_ajax_nopriv_ajax_mobil', 'load_mobil' );
add_action( 'wp_ajax_ajax_mobil', 'load_mobil' );

function load_mobil() {
	//$paged = $_POST['page'];
	$cat = $_POST['cat'];
	$args = array(
		'cat' => $cat,
		 'posts_per_page'=> -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);
	// it is always better to use WP_Query but not here
	query_posts( $args );
	if ( have_posts() ) {
		$title = get_the_title();
		while ( have_posts() ) {
			the_post();
			echo " <option value=\" " . get_the_title() . " \">" . get_the_title() .  "</option>";
		}
	}

	die();
}

/**
 * Ajax pagination
 *
 */

add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {
	$paged = $_POST['page'];
	$cat = $_POST['cat'];
	$args = array(
		'cat' => $cat,
		'posts_per_page' => 4,
		'paged' => $paged,
		'orderby' => 'title',
		'order' => 'ASC'
	);
	// it is always better to use WP_Query but not here
	query_posts( $args );
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	}

	die();
}

/**
 * Enqueue scripts and styles.
 */
function bams_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'bams-fonts', bams_fonts_url(), array(), null );

	// Bootstrap core CSS  https://getbootstrap.com/docs/3.3/
	wp_enqueue_style( 'bootstrap-style',
		get_theme_file_uri( '/library/bootstrap/scss/bootstrap.css' ), array(),
		'4.0.0-beta', 'all' );
	wp_enqueue_style( 'bootstrap-style2',
		get_theme_file_uri( '/library/bootstrap/css/bootstrap-grid.css' ),
		array(), '4.0.0-beta', 'all' );
	wp_enqueue_style( 'bootstrap-style3',
		get_theme_file_uri( '/library/bootstrap/css/bootstrap-reboot.min.css' ),
		array(), '', 'all' );
	wp_enqueue_style( 'bootstrap-style4',
		get_theme_file_uri( '/library/bootsrap-datepicker/css/bootstrap-datepicker3.css' ),
		array(), '', 'all' );

	// Theme stylesheet.
	wp_enqueue_style( 'bams-style', get_stylesheet_uri(), array(), 1.0, 'all' );


	// library css
	wp_enqueue_style( 'social-icons',
		get_theme_file_uri( '/library/socicon/css/styles.css' ), array(), 1.0 );
	wp_enqueue_style( 'iconic',
		get_theme_file_uri( '/library/iconic/css/open-iconic-bootstrap.css' ),
		array(), 1.0 );

	//JS
	//wp_deregister_script( 'jquery' );
	//wp_register_script('jquery', get_template_directory_uri().'/library/jquery-3.2.1.js', __FILE__, '3.2.1',true); // register the local file
	//wp_enqueue_script('jquery'); // enqueue the jquery here
	wp_enqueue_script( 'bams_scripts3',
		get_theme_file_uri( '/library/bootstrap/vendor/popper.min.js' ),
		array( 'jquery' ), '0', true );
	wp_enqueue_script( 'bams_scripts1',
		get_theme_file_uri( '/library/bootstrap/js/bootstrap.js' ),
		array( 'jquery' ), '4.2.0', true );
	wp_enqueue_script( 'bams_scripts2',
		get_theme_file_uri( '/library/bootstrap/js/ie10-viewport-bug-workaround.js' ),
		array( 'jquery' ), '0', true );
	wp_enqueue_script( 'bams_scripts4',
		get_theme_file_uri( '/library/bootsrap-datepicker/js/bootstrap-datepicker.js' ),
		array( 'jquery' ), '1', true );
	//wp_enqueue_script( 'bams_scripts5', get_theme_file_uri( '/library/bootsrap-datepicker/bootstrap-datepicker.id.min.js' ), array( 'jquery' ), '1', true );

	//Smooth parallax scrolling effect https://github.com/nk-o/jarallax
	wp_enqueue_script( 'jarallax', get_theme_file_uri( '/library/jarallax/jarallax.js' ), array('jquery'), '1.8.0', true );
	wp_enqueue_script( 'bams_scripts',
		get_theme_file_uri( '/assets/js/bams-script.js' ), array( 'jquery' ),
		'1', true );

	wp_localize_script( 'bams_scripts', 'ajaxpagination', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ) //wp ajax
	) );
	wp_localize_script( 'bams_scripts', 'ajaxmobil', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ) //wp ajax
	) );

}
add_action( 'wp_enqueue_scripts', 'bams_scripts' );

/**
 * Register custom fonts.
 */
function bams_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$Rubik = _x( 'on', 'Rubik font: on or off', 'cozymartrevo' );

	if ( 'off' !== $Rubik ) {
		$font_families = array();

		$font_families[] = 'Rubik:300,300i,400,400i,500,500i,700,700i,900,900i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Register menu
 *
 */

function register_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'primary' ),
			'extra-menu' => __( 'Extra Menu' )
		)
	);
}

add_action( 'init', 'register_menus' );


//function create_bootstrap_menu( $theme_location ) {
//	if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
//		$home = get_site_url();
//		$menu_list  = '<nav class="navbar nav">' ."\n";
//		$menu_list .= '<li class="nav-item"><a class="nav-link" href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a></li>';
//		$menu_list .= '</div>' ."\n";
//		$menu_list .= '<!-- Collect the nav links, forms, and other content for toggling -->';
//
//		$menu = get_term( $locations[$theme_location], 'nav_menu' );
//		$menu_items = wp_get_nav_menu_items($menu->term_id);
//		$menu_list .= '<ul class="navbar nav">' ."\n";
//
//
//	} else {
//		$menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
//	}
//
//	echo $menu_list;
//}
//

/**
 * Register sidebar
 *
 */

function bams_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'bams' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'cloudie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'bams' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cloudie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'bams' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cloudie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'bams' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cloudie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'bams' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cloudie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bams_widgets_init' );
