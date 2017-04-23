<?php
/**
 * Template Name: Two Columns
 *
 * @package Forge Saas
 */

get_header('alternate'); ?>

		
	<div class="row content-area">		

		<header class="entry-header large-12 columns">

			<h1 class="entry-title"><?php the_title(); ?></h1>

		</header><!-- .entry-header -->

		<div id="content" class="large-6 columns site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<div class="entry-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'forge_saas' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
			
				<?php edit_post_link( __( 'Edit', 'forge_saas' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
			
			</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

		<div class="large-6 columns">
		
			<?php the_field('second_col'); ?>
		
		</div>

	</div>

<?php get_footer(); ?>
