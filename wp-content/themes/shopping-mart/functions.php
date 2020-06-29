<?php
/*This file is part of shopping mart child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet, leave it in place unless you know what you are doing.
*/

add_action( 'wp_enqueue_scripts', 'shopping_mart_styles' );

function shopping_mart_styles() {
	//enqueue parent styles
	wp_enqueue_style( 'business-store-style', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'shopping-mart-styles', get_stylesheet_directory_uri(). '/style.css', array('business-store-style'));
}

add_action( 'after_setup_theme', 'shopping_mart_default_header' );
/**
 * Add Default Custom Header Image To Twenty Fourteen Theme
 * 
 * @return void
 */
function shopping_mart_default_header() {



    add_theme_support(
        'custom-header',
        apply_filters(
            'shopping_mart_custom_header_args',
            array(
                'default-text-color' => '#ffffff',
                'default-image' => get_stylesheet_directory_uri() . '/images/header.jpg',
				'width'              => 1280,
				'height'             => 300,
				'flex-width'         => true,
				'flex-height'        => true,				
            )
        )
    );
}

/* unique id for product slider */
$shopping_mart_uniqueue_id = 99;

/* allowed html tags */

$shopping_mart_allowed_html = array(
		'a'          => array(
			'href'  => true,
			'title' => true,
			'class'  => true,			
		),
		'option'          => array(
			'selected'  => true,
			'value' => true,
			'class'  => true,			
		),		
		'p'          => array(
			'class'  => true,
		),		
		'abbr'       => array(
			'title' => true,
		),
		'acronym'    => array(
			'title' => true,
		),
		'b'          => array(),
		'blockquote' => array(
			'cite' => true,
		),
		'cite'       => array(),
		'code'       => array(),
		'del'        => array(
			'datetime' => true,
		),
		'em'         => array(),
		'i'          => array(),
		'q'          => array(
			'cite' => true,
		),
		's'          => array(),
		'strike'     => array(),
		'strong'     => array(),
	);
	
define('shopping_mart_THEME_REVIEW_URL', 'https://wordpress.org/themes/');
define('shopping_mart_THEME_DOC', 'https://www.ceylonthemes.com/wp-tutorials/');
define('shopping_mart_THEME_URI', 'https://www.ceylonthemes.com/product/wordpress-storefront-theme/');

/**
 * overrride parent admin notice 
 **/

function business_store_general_admin_notice(){ }

function shopping_mart_general_admin_notice(){
	global $pagenow;
	if($pagenow == 'themes.php' || $pagenow == 'index.php'  || $pagenow == 'plugins.php' || $pagenow == 'options-general.php'){
	
			 $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible" >
					<p>
					<a href=%1$s target="_blank" class="button">%2$s</a>&nbsp;&nbsp;
					<strong><a href=%3$s target="_blank" class="button ">%4$s</a></strong>
					<strong><a href=%5$s target="_blank" class="button button-primary">%6$s</a></strong>
					&nbsp;&nbsp;&nbsp;<em><a href="?mart_notice_dismissed" target="_self" class="thickbox">%7$s</a></em>
					<br />
					<strong>%8$s</strong>					
					</p></div>',
					esc_url(shopping_mart_THEME_REVIEW_URL),
					esc_html__('If you like the theme Please Rate us','shopping-mart'),
					esc_url(shopping_mart_THEME_DOC),					
					esc_html__('Tutorial :- How to setup ?','shopping-mart'),
					esc_url(shopping_mart_THEME_URI),					
					esc_html__('Premium Features','shopping-mart'),					
					esc_html__('Always Hide this notice', 'shopping-mart'),					
					esc_html__('1. Use page builder such as elementor, beaver builder and drag and drop Theme:Product Categories widget to build WooCommerce content. 2. Customize theme:- Please Go, Customize -> Theme Options customize Slider, Navigation and Banner section.', 'shopping-mart')				
			 );
			 echo wp_kses_post($msg);
	}
}


if ( isset( $_GET['mart_notice_dismissed'] ) ){
	update_option('mart_notice_dismissed', false);
}

$shopping_mart_notice = absint(get_option('mart_notice_dismissed', true));

if($shopping_mart_notice){
	add_action('admin_notices', 'shopping_mart_general_admin_notice');
}

/**
 * override customize control
 */
if ( class_exists( 'WP_Customize_Control' )) {

	class business_store_pro_Control extends WP_Customize_Control {
	
		public function render_content() {
			?>
			<p style="padding:5px;background-color:#8080FF;color:#FFFFFF;text-align: center;"><a href="<?php echo shopping_mart_THEME_URI; ?>" target="_blank" style="color:#FFFFFF"><?php echo esc_html__('See Premium Features', 'shopping-mart'); ?></a></p>
			<?php
		}
	}
	
}
/**
 * Override custom fonts functions of parent theme.
 */

function business_store_fonts_url() {
	$fonts_url = '';
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by "Open Sans", sans-serif;, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$typography = _x( 'on', 'Open Sans font: on or off', 'shopping-mart' );

	if ( 'off' !== $typography ) {
		$font_families = array();
		
		$font_families[] = get_theme_mod('header_fontfamily','Google Sans').':300,400,500';
		$font_families[] = get_theme_mod('body_fontfamily','Lora').':300,400,500';
		
 
		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);
        
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		
	}
   
	return esc_url( $fonts_url );

}
add_action('after_setup_theme', 'business_store_fonts_url');


/**
 * Override custom fonts css functions of parent theme.
 */
function business_store_custom_fonts_css(){

    $header_font =  wp_strip_all_tags(get_theme_mod( 'header_fontfamily', 'Google Sans')) ;
	$body_font =  wp_strip_all_tags(get_theme_mod('body_fontfamily', 'Lora'));
    $css = '
	
	.site-header-background {
		background-image:url('.esc_url(get_header_image()).');
	}
	
	h1, h2, h3, h4, h5, h6,
	.start-button,
	.testimonial-title,
	#main_Carousel .slider-title,
	.site-title a,
	.sub-header .title {
		font-family:"'.$header_font.'",sans serif;
	}
	
	html {
		font-family:"'.$body_font.'",sans serif;
	}
	
	.main-navigation {
		font-family:"'.$header_font.'",sans serif;
	}
	
	.site-title, .custom-fonts .testimonial-title {
		font-family:"'.$header_font.'",sans serif;
	}
	
	#main_Carousel .slider-title {
		font-family:"'.$header_font.'",sans serif;
	}

	';

	return $css;

}

add_action('after_setup_theme', 'business_store_custom_fonts_css');


require   get_stylesheet_directory().'/inc/product-functions.php';
require   get_stylesheet_directory().'/inc/widget-product-categories.php';




