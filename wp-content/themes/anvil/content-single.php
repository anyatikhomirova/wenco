<?php
/**
 * @package Forge Saas
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>

		<div class="entry-meta">
			<p class="post-meta"><?php forge_saas_posted_on(); ?></p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'forge_saas' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">

		<?php edit_post_link( __( 'Edit', 'forge_saas' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->
	
</article><!-- #post-## -->
