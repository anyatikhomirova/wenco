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

	<?php 
		/* for sites that require full width title banner uncomment this template part and removed title from content area */ 
		//get_template_part('title', 'page'); 
	?>

	<div class="row content-area">

		<div id="content" class="large-8 columns site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

		<?php get_sidebar(); ?>

	</div>
		
<?php get_footer(); ?>
