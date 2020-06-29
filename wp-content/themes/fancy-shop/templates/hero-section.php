<section id="hero-section">
	<div>
		<?php 
		$fancy_shop_settings = new new_york_business_settings();
		$fancy_shop_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $fancy_shop_settings->default_data()); 

		$fancy_shop_banner = $fancy_shop_option['hero_page'];
		if($fancy_shop_banner != 0 ) {
	
			$fancy_shop_args = array( 'post_type' => 'page','ignore_sticky_posts' => 1 , 'post__in' => array($fancy_shop_banner));
			$fancy_shop_result = new WP_Query($fancy_shop_args);
			while ( $fancy_shop_result->have_posts() ) :
				$fancy_shop_result->the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
		}
		 ?>
	</div>
</section> 

