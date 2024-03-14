<?php 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'skt_restara_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_restara_setup() {
	$GLOBALS['content_width'] = apply_filters( 'skt_restara_content_width', 640 );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 46,
		'width'       => 151,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'skt-restara' )				
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
} 
endif; // skt_restara_setup
add_action( 'after_setup_theme', 'skt_restara_setup' );

function skt_restara_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'skt-restara' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-restara' ),
		'id'            => 'fc-1-phy',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'skt-restara' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-restara' ),
		'id'            => 'fc-2-phy',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'skt-restara' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-restara' ),
		'id'            => 'fc-3-phy',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'skt-restara' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-restara' ),
		'id'            => 'fc-4-phy',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );	
}
add_action( 'widgets_init', 'skt_restara_widgets_init' );


add_action( 'wp_enqueue_scripts', 'skt_restara_enqueue_styles' );
function skt_restara_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

add_action( 'wp_enqueue_scripts', 'skt_restara_child_styles', 99);
function skt_restara_child_styles() {
  wp_enqueue_style( 'skt-restara-child-style', get_stylesheet_directory_uri()."/css/responsive.css" );
} 

function skt_restara_admin_style() {
  wp_enqueue_script('skt-restara-admin-script', get_stylesheet_directory_uri()."/js/skt-restara-admin-script.js");
}
add_action('admin_enqueue_scripts', 'skt_restara_admin_style');

function skt_restara_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_skt_restara_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'skt-restara-about-page-style', get_stylesheet_directory_uri() . '/css/skt-restara-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'skt_restara_admin_about_page_css_enqueue' );

/**
 * Show notice on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'skt_restara_activation_notice' );
}
function skt_restara_activation_notice(){
    ?>
    <div class="notice notice-info is-dismissible"> 
        <div class="skt-pizzeria-notice-container">
        	<div class="skt-pizzeria-notice-img"><img src="<?php echo esc_url( SKT_RESTARA_SKTTHEMES_THEME_URI . 'images/icon-skt-templates.png' ); ?>" alt="<?php echo esc_attr('SKT Templates');?>" ></div>
            <div class="skt-pizzeria-notice-content">
            <div class="skt-pizzeria-notice-heading"><?php echo esc_html__('Thank you for installing SKT Restara!', 'skt-restara'); ?></div>
            <p class="largefont"><?php echo esc_html__('SKT Restara comes with 150+ ready to use Elementor templates. Install the SKT Templates plugin to get started.', 'skt-restara'); ?></p>
            </div>
            <div class="skt-pizzeria-clear"></div>
        </div>
    </div>
    <?php
}

if ( ! function_exists( 'skt_restara_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_restara_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


define('SKT_RESTARA_SKTTHEMES_URL','https://www.sktthemes.org');
define('SKT_RESTARA_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.org/shop/food-restaurant-wordpress-theme/');
define('SKT_RESTARA_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/free-cafe-restaurant-wordpress-theme/');
define('SKT_RESTARA_SKTTHEMES_THEME_DOC','https://www.sktthemesdemo.net/documentation/skt-pizzeria-doc/');
define('SKT_RESTARA_SKTTHEMES_LIVE_DEMO','https://sktperfectdemo.com/demos/restara/');
define('SKT_RESTARA_SKTTHEMES_THEMES','https://www.sktthemes.org/themes');
define('SKT_RESTARA_SKTTHEMES_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

function skt_restara_remove_parent_function(){	 
	remove_action( 'admin_notices', 'skt_pizzeria_activation_notice');
	remove_action( 'admin_menu', 'skt_pizzeria_abouttheme');
	remove_action( 'customize_register', 'skt_pizzeria_customize_register');
	remove_action( 'wp_enqueue_scripts', 'skt_pizzeria_custom_css');
}
add_action( 'init', 'skt_restara_remove_parent_function' );

function skt_restara_remove_parent_theme_stuff() {
    remove_action( 'after_setup_theme', 'skt_pizzeria_setup' );
}
add_action( 'after_setup_theme', 'skt_restara_remove_parent_theme_stuff', 0 );

function skt_restara_unregister_widgets_area(){
	unregister_sidebar( 'fc-1' );
	unregister_sidebar( 'fc-2' );
	unregister_sidebar( 'fc-3' );
	unregister_sidebar( 'fc-4' );
}
add_action( 'widgets_init', 'skt_restara_unregister_widgets_area', 11 );

require_once get_stylesheet_directory() . '/inc/about-themes.php';  
require_once get_stylesheet_directory() . '/inc/customizer.php';