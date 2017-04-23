<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Forge Saas
 */
?>
	<div id="secondary" class="large-4 columns widget-area" role="complementary">
		
		<div class="panel">

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'features' ) ) : ?>

			

			<?php endif; // end sidebar widget area ?>
			
		</div>
		
	</div><!-- #secondary -->
