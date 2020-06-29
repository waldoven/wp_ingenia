<?php
/**
 * Template for displaying search forms in fancy-shop
 *
 * @package fancy-shop
 * @since 1.0

 */

?>

<?php $fancy_shop_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr($fancy_shop_id); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'fancy-shop' ); ?></span>
	</label>
	<input type="search" id="main-search-form" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'fancy-shop' ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s"  />
	<button type="submit" class="search-submit"><?php echo new_york_business_get_fo( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'fancy-shop' ); ?></span></button>
</form>
