<?php

$fancy_shop_default_settings = new new_york_business_settings();
$fancy_shop_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $fancy_shop_default_settings->default_data());

$fancy_shop_class = '';
$fancy_shop_bottom_color = esc_attr( $fancy_shop_option['footer_section_bottom_background_color'] );

$fancy_shop_class = $fancy_shop_class. ' footer-foreground';

$fancy_shop_option['footer_section_background_color'] = '#0c3a80';
$fancy_shop_option['footer_section_bottom_color'] = '#fff';
$fancy_shop_option['footer_section_bottom_background_color'] = '#0c3a80';

?>
</div> <!--end of content div-->

<footer id="colophon" role="contentinfo" class="site-footer  <?php echo esc_attr( $fancy_shop_class );?>" style="background:<?php echo esc_attr( $fancy_shop_option['footer_section_background_color'] ); ?>;">
  <div class="footer-section <?php echo esc_attr( $fancy_shop_class );?>" >
    <div class="container">
	<!--widgets area-->
	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'fancy-shop' ); ?>">
		<?php
		if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
			</div>
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
			</div>			
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
			</div>
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-4' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
			</div>
        <?php }	?>
	</aside><!-- .widget-area -->
	
	<div class="row">
	
      <div class="col-md-12">
	  
        <center>
          <ul id="footer-social" class="header-social-icon animate fadeInRight" >
            <?php if($fancy_shop_option['social_facebook_link']!=''){?>
            <li><a href="<?php echo esc_url($fancy_shop_option['social_facebook_link']); ?>" target="<?php if($fancy_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook','fancy-shop'); ?>"><i class="fa fa-facebook"></i></a></li>
            <?php } ?>
            <?php if($fancy_shop_option['social_twitter_link']!=''){?>
            <li><a href="<?php echo esc_url($fancy_shop_option['social_twitter_link']); ?>" target="<?php if($fancy_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter','fancy-shop'); ?>"><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if($fancy_shop_option['social_skype_link']!=''){?>
            <li><a href="<?php echo esc_url($fancy_shop_option['social_skype_link']); ?>" target="<?php if($fancy_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype','fancy-shop'); ?>"><i class="fa fa-skype"></i></a></li>
            <?php } ?>
            <?php if($fancy_shop_option['social_pinterest_link']!=''){?>
            <li><a href="<?php echo esc_url($fancy_shop_option['social_pinterest_link']); ?>" target="<?php if($fancy_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="pinterest" data-toggle="tooltip" title="<?php esc_attr_e('Google-Plus','fancy-shop'); ?>"><i class="fa fa-pinterest"></i></a></li>
            <?php } ?>				
          </ul>
        </center>
      </div>
	  
	  </div> 
	  
	  <div class="row">	  
	  <div class="vertical-center footer-bottom-section">
	  
		<!-- bottom footer -->
		<div class="col-md-6 site-info">
		  <p align="center" style="color:#fff;" > <a href="<?php echo esc_url(new_york_business_THEME_AUTHOR_URL); ?>"> <?php echo wp_kses_post($fancy_shop_option['footer_section_bottom_text']); ?> </a> </p>
		</div>
		<!-- end of bottom footer -->
	  
		  <div class="col-md-6 bottom-menu">
			<center>         
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'container_class' => 'bottom-menu'
					)
				);
				?>
			</center>
		  </div>
		</div>
	</div>			
	
	</div><!-- .container -->
	
  </div>
  <a id="scroll-btn" href="#" class="scroll-top"><i class="fa fa fa-arrow-up"></i></a>
</footer>
<!-- #colophon -->
<?php 
global $fancy_shop_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $fancy_shop_default_settings = new new_york_business_settings();
   $fancy_shop_option = wp_parse_args(  get_option( 'fancy_shop_option', array() ) , $fancy_shop_default_settings->default_data());  
}
if($fancy_shop_option['box_layout']){
	// end of wrapper div
	echo '</div>';
}

wp_footer(); 
?>
</body>
</html>
