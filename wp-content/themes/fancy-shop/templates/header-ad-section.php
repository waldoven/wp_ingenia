<?php
if ( is_active_sidebar( 'header-ad' ) ) {
?>
<div class="header-ad">
<div class="container"> 
<div class="row">

	<br />
<?php	
 dynamic_sidebar( 'header-ad' );
?>
	</div>
</div>
</div>
<?php
}
