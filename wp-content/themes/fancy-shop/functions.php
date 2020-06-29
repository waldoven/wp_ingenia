<?php
/*This file is part of shopping mart child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet, leave it in place unless you know what you are doing.
*/

//add new settings
require  get_stylesheet_directory().'/inc/settings.php';

add_action( 'wp_enqueue_scripts', 'fancy_shop_styles' );

function fancy_shop_styles() {
	//enqueue parent styles
	wp_enqueue_style( 'fancy-shop-parent-styles', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'fancy-shop-styles', get_stylesheet_directory_uri(). '/style.css', array('fancy-shop-parent-styles'));
}

add_action( 'after_setup_theme', 'fancy_shop_default_header' );
/**
 * Add Default Custom Header Image To Twenty Fourteen Theme
 * 
 * @return void
 */
function fancy_shop_default_header() {

    add_theme_support(
        'custom-header',
        apply_filters(
            'fancy_shop_custom_header_args',
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

// get_parent theme settings and override with child theme settings
$fancy_shop_settings = new new_york_business_settings();
$fancy_shop_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $fancy_shop_settings->default_data()); 


/* allowed html tags */

$fancy_shop_allowed_html = array(
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
	
define('FANCY_SHOP_THEME_REVIEW_URL', 'https://wordpress.org/themes/fancy-shop/');
define('FANCY_SHOP_THEME_DOC', 'https://www.ceylonthemes.com/wp-tutorials/');
define('FANCY_SHOP_THEME_URI', 'https://www.ceylonthemes.com/product/wordpress-storefront-theme/');
define('FANCY_SHOP_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());

/**
 * override parent admin notice 
 **/
function new_york_business_general_admin_notice(){ }


function fancy_shop_general_admin_notice(){

         $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible" ><p>
             	<a href=%1$s target="_blank"  style="text-decoration: none;" class="button button-primary"> %2$s </a>
			 	<a href=%3$s target="_blank"  style="text-decoration: none; margin-left:10px;" class="button">%4$s</a>
			 	<a href="?fancy_shop_admin_notice" target="_self"  style="text-decoration: none; margin-left:10px;" class="button button-secondary">%5$s</a>
			 	</p><strong>%6$s</strong></p></div>',
				esc_url(FANCY_SHOP_THEME_REVIEW_URL),
				esc_html__('Rate','fancy-shop'),
				esc_url(FANCY_SHOP_THEME_DOC),
				esc_html__('Theme Tutorial','fancy-shop'),
				esc_html__('Dismiss', 'fancy-shop'),
				esc_html__(' Drag and drop Theme:Product Categories widget using page builder. Customize -> Theme Option customize Slider, Navigation, Banner sections, Header Widgets.', 'fancy-shop'));				
		 echo wp_kses_post($msg);
}

if ( isset( $_GET['fancy_shop_admin_notice'] ) ){
	$fancy_shop_option['admin_notice'] = false;
	update_option('new_york_business_option', $fancy_shop_option);
}

$fancy_shop_refreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');

if($fancy_shop_option['admin_notice'] && !$fancy_shop_refreshed){
	add_action('admin_notices', 'fancy_shop_general_admin_notice');
}

/* wp body open */
function fancy_shop_body_open(){
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
}

add_action('fancy_shop_wp_body_open', 'fancy_shop_body_open');

/**
 * override parent theme customize control
 */
if ( class_exists( 'WP_Customize_Control' )) {

	class new_york_business_pro_Control extends WP_Customize_Control {
	
		public function render_content() {
			?>
			<p style="padding:5px;background-color:#8080FF;color:#FFFFFF;text-align: center;"><a href="<?php echo esc_url(FANCY_SHOP_THEME_URI); ?>" target="_blank" style="color:#FFFFFF"><?php echo esc_html__('See Premium Features', 'fancy-shop'); ?></a></p>
			<?php
		}
	}
	
}

require   get_stylesheet_directory().'/inc/google-fonts.php';
require   get_stylesheet_directory().'/inc/woocommerce-functions.php';

/**
 * Override custom fonts functions of parent theme.
 */
 

function new_york_business_fonts_url() { 
	$fonts_url = '';
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by "Open Sans", sans-serif;, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$typography = _x( 'on', 'Open Sans font: on or off', 'fancy-shop' );

	if ( 'off' !== $typography ) {
		$font_families = array();
		
		$font_families[] = get_theme_mod('header_fontfamily','Oswald').':300,400,500';
		$font_families[] = get_theme_mod('body_fontfamily','Google Sans').':300,400,500';
		
 
		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);
        
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		
	}
   
	return esc_url( $fonts_url );

}
add_action('after_setup_theme', 'new_york_business_fonts_url');

//call custom fonts
add_action('after_setup_theme', 'new_york_business_custom_fonts_css');


//header_background

add_action( 'customize_register', 'fancy_shop_customizer_settings' ); 

function fancy_shop_customizer_settings( $wp_customize ) {

	
	//banner section	
	$wp_customize->add_section( 'top_banner' , array(
		'title'      => __( 'Hero Section', 'fancy-shop' ),
		'priority'   => 1,
		'panel' => 'theme_options',
	) );	
	
	//hero section
	$wp_customize->add_setting('new_york_business_option[hero_page]' , array(
		'default'    => 0,
		'sanitize_callback' => 'absint',
		'type'=>'option',

	));

	$wp_customize->add_control('new_york_business_option[hero_page]' , array(
		'label' => __('Select Hero (Page)', 'fancy-shop' ),
		'section' => 'top_banner',
		'type'=> 'dropdown-pages',
	) );	
				
}	

//override parent theme functions
function new_york_business_footer_foreground_css(){

	$color =  esc_attr(get_theme_mod( 'footer_foreground_color', '#fff')) ;
		
	/**
	 *
	 * @since fancy-shop 1.0
	 *
	 */

	$css                = '
	
	.footer-foreground {}
	.footer-foreground .widget-title, 
	.footer-foreground a, 
	.footer-foreground p, 
	.footer-foreground td,
	.footer-foreground th,
	.footer-foreground caption,
	.footer-foreground li,
	.footer-foreground h1,
	.footer-foreground h2,
	.footer-foreground h3,
	.footer-foreground h4,
	.footer-foreground h5,
	.footer-foreground h6,
	.footer-foreground .site-info a
	{
	  color:'.$color.';
	}
	
	.footer-foreground #today {
		font-weight: 600;	
		background-color: #3ba0f4;	
		padding: 5px;
	}
	
	.footer-foreground a:hover, 
	.footer-foreground a:active {
		color:#ccc ;
	}
	
	';

return $css;

}


//add child theme widget area

function fancy_shop_widgets_init(){

	/* header sidebar */
	global $fancy_shop_option;

	register_sidebar(
		array(
			'name'          => __( 'Header Ads', 'fancy-shop' ),
			'id'            => 'header-ad',
			'description'   => __( 'Add widgets to appear in Header.', 'fancy-shop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'fancy_shop_widgets_init' );




