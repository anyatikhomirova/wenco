<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Forge Saas
 */

get_header(); ?>

	<div id="primary" class="content-area">
		
		<div class="row">
	
			<div id="content" class="large-8 columns site-content" role="main">
	
				<?php woocommerce_content(); ?>
	
			</div><!-- #content -->
	
			<?php get_sidebar(); ?>

		</div>
		
	</div><!-- #primary -->

<?php get_footer(); ?>
