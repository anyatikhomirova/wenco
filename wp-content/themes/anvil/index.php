<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Forge Saas
 */

get_header(); ?>
		
	<div class="row content-area">		

	<header class="entry-header large-12 columns ">
		
		<h1 class="entry-title"><?php echo get_the_title(12); ?></h1>
	
	</header><!-- .entry-header -->

		<div id="content" class="large-8 columns site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php if (function_exists('forge_page_navi')) { // if expirimental feature is active ?>
				
				<?php forge_page_navi(); // use the page navi function ?>
				
			<?php } else { // if it is disabled, display regular wp prev & next links ?>

				<?php forge_saas_content_nav( 'nav-below' ); ?>

			<?php } ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

		</div><!-- #content -->

		<?php get_sidebar('blog'); ?>
		
	</div>


<?php get_footer(); ?>
