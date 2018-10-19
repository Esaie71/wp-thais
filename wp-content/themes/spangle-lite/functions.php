<?php        
/**
 * Spangle Lite functions and definitions
 *
 * @package Spangle Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'spangle_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function spangle_lite_setup() {		
	global $content_width;   
    if ( ! isset( $content_width ) ) {
        $content_width = 680; /* pixels */
    }	

	load_theme_textdomain( 'spangle-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support('html5');
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'title-tag' );
	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'spangle-lite' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );	
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
	) );
	
	add_editor_style( 'editor-style.css' );
} 
endif; // spangle_lite_setup
add_action( 'after_setup_theme', 'spangle_lite_setup' );
function spangle_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'spangle-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'spangle-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header info Widget', 'spangle-lite' ),
		'description'   => __( 'Appears on the site header', 'spangle-lite' ),
		'id'            => 'headertopwidget',
		'before_widget' => '<aside id="%1$s" class="headerwidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="header-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'spangle_lite_widgets_init' );


function spangle_lite_font_url(){
		$font_url = '';	
		
		/* Translators: If there are any character that are not
		* supported by Assistant, trsnalate this to off, do not
		* translate into your own language.
		*/
		$assistant = _x('on','Assistant:on or off','spangle-lite');		
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','roboto:on or off','spangle-lite');	
		
		    if('off' !== $roboto || 'off' !== $assistant ){
			    $font_family = array();
			
			if('off' !== $assistant){
				$font_family[] = 'Assistant:300,400,600';
			}
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,900';
			}			
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function spangle_lite_scripts() {
	wp_enqueue_style('spangle-lite-font', spangle_lite_font_url(), array());
	wp_enqueue_style( 'spangle-lite-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'spangle-lite-default-style', get_template_directory_uri()."/css/default.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'fontawesome-all-style', get_template_directory_uri().'/fontsawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'spangle-lite-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'spangle-lite-editable', get_template_directory_uri() . '/js/editable.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spangle_lite_scripts' );

function spangle_lite_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('spangle-lite-ie', get_template_directory_uri().'/css/ie.css', array( 'spangle-lite-style' ), '20160928' );
	wp_style_add_data('spangle-lite-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'spangle-lite-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'spangle-lite-style' ), '20160928' );
	wp_style_add_data( 'spangle-lite-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'spangle-lite-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'spangle-lite-style' ), '20160928' );
	wp_style_add_data( 'spangle-lite-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','spangle_lite_ie_stylesheet');

define('SPANGLE_LITE_THEME_DOC','https://gracethemes.com/documentation/spangle-doc/#homepage-lite','spangle-lite');
define('SPANGLE_LITE_PROTHEME_URL','https://gracethemes.com/themes/interior-design-wordpress-theme/','spangle-lite');
define('SPANGLE_LITE_LIVE_DEMO','https://gracethemes.com/demo/spangle/','spangle-lite');

if ( ! function_exists( 'spangle_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function spangle_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';