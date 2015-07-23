<?php
/**
 * Quidus functions and definitions
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

if ( ! function_exists( 'quidus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 */
function quidus_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on quidus, use a find and replace
	 * to change 'quidus' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'quidus', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'quidus' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'video', 'quote', 'link', 'gallery', 'audio'
	) );
	

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'quidus_custom_background_args', array(
		'default-attachment' => 'fixed'
	) ) );
}
endif; // quidus_setup
add_action( 'after_setup_theme', 'quidus_setup' );

global $excerpt_length_quidus; 
if ( get_theme_mod('quidus_excerpt_length') == '' ) : 
$excerpt_length_quidus = 55; 
else : 
$excerpt_length_quidus = esc_attr(get_theme_mod('quidus_excerpt_length')); 
endif;

function quidus_custom_excerpt_length( $length ) {
global $excerpt_length_quidus;
	return $excerpt_length_quidus;
}
add_filter( 'excerpt_length', 'quidus_custom_excerpt_length', 999 );

/**
 * Register widget area.
 *
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function quidus_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'quidus' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'quidus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	
	if ( get_theme_mod('quidus_enable_footer_widgets') == 1) {
	
		if ( get_theme_mod('quidus_footer_widgets_count') == 'twocolumn') {
		
			register_sidebar( array(
				'name'          => __( 'Footer Widget One', 'quidus' ),
				'id'            => 'footer-widget-1',
				'description'   => __( 'Add widgets here to appear in your footer.', 'quidus' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			
			register_sidebar( array(
				'name'          => __( 'Footer Widget Two', 'quidus' ),
				'id'            => 'footer-widget-2',
				'description'   => __( 'Add widgets here to appear in your footer.', 'quidus' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
		
		}
		
		if ( get_theme_mod('quidus_footer_widgets_count') == 'threecolumn') {
		
			register_sidebar( array(
				'name'          => __( 'Footer Widget One', 'quidus' ),
				'id'            => 'footer-widget-1',
				'description'   => __( 'Add widgets here to appear in your footer.', 'quidus' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			
			register_sidebar( array(
				'name'          => __( 'Footer Widget Two', 'quidus' ),
				'id'            => 'footer-widget-2',
				'description'   => __( 'Add widgets here to appear in your footer.', 'quidus' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			
			register_sidebar( array(
				'name'          => __( 'Footer Widget Three', 'quidus' ),
				'id'            => 'footer-widget-3',
				'description'   => __( 'Add widgets here to appear in your footer.', 'quidus' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
		
		}
	}
	
	if ( get_theme_mod('quidus_right_sidebar_enable') == 1) {
	
		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'quidus' ),
			'id'            => 'right-sidebar',
			'description'   => __( 'Add widgets here to appear in your right sidebar.', 'quidus' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	
	}
	
}
add_action( 'widgets_init', 'quidus_widgets_init' );



if ( ! function_exists( 'quidus_fonts_url' ) ) :
/**
 * Register Google fonts.
 *
 *
 * @return string Google fonts URL for the theme.
 */
function quidus_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'quidus' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'quidus' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'quidus' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'quidus' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

function quidus_load_fonts() {
	if ( get_theme_mod('quidus_body_font_custom_enable') == 1) : 
		$body_font = esc_html(get_theme_mod('quidus_body_font_custom')); 
	else :
		$body_font = esc_html(get_theme_mod('quidus_body_font')); 
	endif;
 
	if ( get_theme_mod('quidus_header_font_custom_enable') == 1) : 
		$headings_font = esc_html(get_theme_mod('quidus_header_font_custom')); 
	else :
		$headings_font = esc_html(get_theme_mod('quidus_header_font'));
	endif;
	
	if( $headings_font != '') {
		wp_enqueue_style( 'quidus_header_font', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'quidus-raleway', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900');  
	}	
	if( $body_font != '') {
		wp_enqueue_style( 'quidus_body_font', '//fonts.googleapis.com/css?family='. $body_font );	
	} else {
		wp_enqueue_style( 'quidus-titillium-web', '//fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900');
	} 

	wp_enqueue_style('quidus-pacifico', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic');
    }
	
add_action('wp_enqueue_scripts', 'quidus_load_fonts');

/**
 * Import scripts & styles
 */

function quidus_scripts() {
	
	// Custom fonts
	wp_enqueue_style( 'quidus-fonts', quidus_fonts_url(), array(), null );
	
	// Main stylesheet.
	wp_enqueue_style( 'quidus-style', get_stylesheet_uri() );
	
	// Font awesome
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome-4.3.0/css/font-awesome.css');
	
	// Genericons
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	wp_enqueue_script( 'quidus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'quidus-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20141212', true );
	wp_localize_script( 'quidus-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'quidus' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'quidus' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'quidus_scripts' );

/**
* Enqueue Font Awesome Stylesheet from MaxCDN
*
*/

/**
 * Display descriptions in main navigation.
**/
 
function quidus_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'quidus_nav_description', 10, 4 );

/**
 * Custom template tags for this theme.
 *
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Customizer additions.
 *
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Configuration sample for the Kirki Customizer
 */

function quidus_demo_configuration_sample() {

    $args = array(

        'description'  => __( 'The theme description.', 'quidus' ),
        'color_accent' => '#3f3f40',
        'color_back'   => '#d5574d',
        'textdomain'   => 'quidus'
    );

    return $args;

}
add_filter( 'kirki/config', 'quidus_demo_configuration_sample' );

function quidus_javascript_detection() 
{ 
 		    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n"; 
} 
		
add_action( 'wp_head', 'quidus_javascript_detection', 0 ); 

/**
 * Include additional custom admin panel features. 
 */
require get_template_directory() . '/panel/quidus-theme-documentaion.php'; 
require get_template_directory() . '/inc/TGM/quidus-tgm-activate.php';